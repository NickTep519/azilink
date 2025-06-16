<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\MessageReadEvent;
use App\Events\MessengerSentEvent;
use App\Notifications\NewNotif;
use Illuminate\Support\Facades\Notification;

class MessengerController extends Controller
{

    public function base()
    {

        $user = auth()->user();

        $conversations = $user->conversations()
            ->with([
                'users',
                'messages' => fn($q) => $q->orderBy('created_at', 'asc'),
                'lastMessage'
            ])
            ->withCount([
                'messages as unread_messages_count' => fn($q) => $q->whereDoesntHave('readers', fn($q) => $q->where('user_id', $user->id))
            ])
            ->get()
            ->sortByDesc(
                fn($conversation) =>
                optional($conversation->lastMessage)->created_at ?? $conversation->created_at
            )
            ->values(); // Pour réindexer proprement

        // dd($conversations) ; 

        $totalUnread = Message::whereDoesntHave('readers', function ($query) {
            $query->where('user_id', auth()->id());
        })->whereHas('conversation.users', function ($query) {
            $query->where('users.id', auth()->id());
        })->count();


        return view('messenger.iframe', [
            'conversations' => $conversations,
            'totalUnread' => $totalUnread,
            // 'conversationId' => $conversationId ?? $request->query('conversation')
        ]);
    }

    public function show(Conversation $conversation)
    {

        $user = auth()->user();


        $conversations = $user->conversations()
            ->with([
                'users',
                'messages' => fn($q) => $q->orderBy('created_at', 'asc'),
                'lastMessage'
            ])
            ->withCount([
                'messages as unread_messages_count' => fn($q) => $q->whereDoesntHave('readers', fn($q) => $q->where('user_id', $user->id))
            ])
            ->get()
            ->sortByDesc(fn($conversation) => optional($conversation->lastMessage)->created_at)
            ->values(); // Pour réindexer proprement

        $totalUnread = Message::whereDoesntHave('readers', function ($query) {
            $query->where('user_id', auth()->id());
        })->whereHas('conversation.users', function ($query) {
            $query->where('users.id', auth()->id());
        })->count();

        return view('messenger.show', [
            'conversations' => $conversations,
            'totalUnread' => $totalUnread,
        ]);
    }

    public function index($conversationId)
    {

        $userId = auth()->id();

        $user = auth()->user();


        $conversation = Conversation::findOrFail($conversationId);

        foreach ($conversation->messages as $message) {
            if (!$message->readers->contains($user)) {
                $user->readMessages()->syncWithoutDetaching([
                    $message->id => ['read_at' => now()],
                ]);

                // Diffuse un événement de lecture
                broadcast(new MessageReadEvent($message, $userId))->toOthers();
            }
        }


        $conversation = Conversation::with([
            'users' => function ($query) use ($userId) {
                $query->where('users.id', '!=', $userId);
            },
            'messages' => function ($query) {
                $query->with([
                    'user' => function ($query) {
                        $query->select('id', 'pseudo', 'image');
                    }
                ])->orderBy('created_at', 'asc');
            },
            'annonce.creatorUser',
        ])->findOrFail($conversationId);

        return response()->json($conversation);

        // les messages non lus Par utilisateur et conversation :

        // $unreadMessages = Message::where('conversation_id', $conversationId)
        //     ->whereDoesntHave('readers', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     })
        //     ->get();

        // Nombre de messages non lus par conversation (optimisé)

        // $conversations = $user->conversations()->withCount(['messages as unread_messages_count' => function ($query) use ($user) {
        //     $query->whereDoesntHave('readers', function ($q) use ($user) {
        //         $q->where('user_id', $user->id);
        //     });
        // }])->get();

    }

    public function store(Request $request)
    {

        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'content' => 'required|string'
        ]);

        $message = Message::create([
            'conversation_id' => $request->conversation_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        $message->readers()->attach(auth()->id(), ['read_at' => now()]);

        broadcast(new MessengerSentEvent($message))->toOthers();

        $recipients = $message->conversation->users->filter(function ($user) {
            return $user->id !== auth()->id();
        });

        Notification::send($recipients, new NewNotif("Vous avez un nouveau message", route('messenger.base')));

        return response()->json($message);
    }
}
