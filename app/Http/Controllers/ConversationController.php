<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Mail\FirstMessageMail;
use App\Jobs\CheckExpectedMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewNotification;
use App\Notifications\MessageNotification;

class ConversationController extends Controller
{

    public function __construct() {}
    /**
     * Display a listing of the resource.
     */
    public function index(Conversation $conversation = null, Request $request)
    {

        if ($conversation->exists) {

            $this->authorize('view', $conversation);
        }

        $conversation->messages()
            ->where('user_id', auth()->id())
            ->where('is_read', false)
            ->where('conversation_id', $conversation->id)
            ->update(['is_read' => true]);



        /** @var User $auth_user */

        $auth_user = Auth::user();

        $conversations = $auth_user->conversations()->with(['users', 'lastMessage', 'unreadMessages'])->get() ;

        //dd($conversations) ; 

        return view('conversations.indexx', [
            'conversations' => $conversations,
            'conversation_active' => $conversation,
        ]);
    }

    public function iframe(Conversation $conversation, Request $request)
    {

        if ($conversation->exists) {

            $this->authorize('view', $conversation);
        }

        $conversation->messages()
            ->where('user_id', auth()->id())
            ->where('is_read', false)
            ->where('conversation_id', $conversation->id)
            ->update(['is_read' => true]);



        /** @var User $auth_user */

        $auth_user = Auth::user();

        $conversations = $auth_user->conversations()
                                    ->with(['users', 'lastMessage', 'unreadMessages'])
                                    ->get()
                                     ->sortByDesc(fn($conversation) => $conversation->lastMessage->created_at ?? '0000-00-00 00:00:00') ;

        //dd($conversations) ; 

        return view('conversations.iframeindex', [
            'conversations' => $conversations,
            'conversation_active' => $conversation,
        ]);
    }



    public function fetchMessages(Conversation $conversation)
    {
        $this->authorize('view', $conversation);

        $messages = $conversation->messages()->orderBy('created_at', 'asc')->with('user')->latest()->get();

        $recipientt = $conversation->users->where('id', '!=', auth()->id())->first() ;

        if ($conversation->annonce->type) {
            if ($conversation->annonce->creatorUser->id === auth()->user()->id ) {
                $canCreateOrder = 1 ; // 
                $recipient = $conversation->users->where('id', '!=', auth()->id())->first() ;
            }else {
                $canCreateOrder = 0 ; 
                $recipient = auth()->user() ; 
            }
        }else {
            if ($conversation->annonce->creatorUser->id === auth()->user()->id ) {
                $canCreateOrder = 0 ; 
                $recipient = auth()->user() ;
            }else {
                $canCreateOrder = 1 ; 
                $recipient = $conversation->users->where('id', '!=', auth()->id())->first() ;
            }
        }
        

        return response()->json([
            'messages' => $messages->map(function ($message) {
                return [
                    'id' => $message->id,
                    'content' => $message->content,
                    'created_at' => $message->created_at->format('H:i | d M Y'),
                    'user' => [
                        'id' => $message->user->id,
                        'name' => $message->user->name,
                        'avatar' => $message->user->avatar ?? 'default-avatar.png',
                        'auth_user_id' => auth()->user()->id
                    ],
                ];
            }),
            'headBox' => [
                'name' => $recipientt->name,
                'annonceTitle' => $conversation->annonce->title,
                'avatar' => asset('storage/' . $recipient->image ) ?? 'https://i.ibb.co/fCzfFJw/person.jpg',
                'canCreateOrder' => $canCreateOrder,
                // 'canCreateOrder' => $conversation->annonce->creatorUser->id === auth()->user()->id,
            ],
            'canSendMessage' => auth()->user()->can('sendMessage', $conversation),
            'conversationId' => $conversation->id,
            'annonceId' => $conversation->annonce->id,
            'recipientId' => $recipient->id,
            'sessionMessage' => ! $conversation->messages()->exists() ? session()->get('message', '') : ' ',
            'conversationId' => $conversation->id,
        ]);
    }


    public function getNewMessages($conversationId, Request $request)
    {
        $lastMessageId = $request->query('lastMessageId', 0); // Récupère l'ID du dernier message reçu

        $conversation = Conversation::findOrFail($conversationId) ; 

        $messages = $conversation->lastMessage?->content ?? '' ; 

        return response()->json([
            'messages' => $messages,
            'auth_user_id' => Auth::user()->id
        ]);
    }





    public function storeMessage(Request $request, Conversation $conversation)
    {


        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $authUser = auth()->user() ; 


        $this->authorize('sendMessage', $conversation);


        $message = $conversation->messages()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        $recipient = $conversation->users->firstWhere('id', '!=', $authUser->id);
       
        if ($recipient && $recipient->id !== $authUser->id) {
    
            $title = "{$authUser->name} vous a envoyé un message.";
            $link = route('conversations.index');
    
            $recipient->notify(new NewNotification($title, $link));
    
            Log::info("Notification envoyée à l'utilisateur {$recipient->id}");
        } else {
            Log::warning("Pas de destinataire valide trouvé pour la conversation {$conversation->id}");
        }

        if ($conversation->messages->isEmpty()) {   
            if ($recipient) {
                Mail::to($recipient->email)->send(new FirstMessageMail(auth()->user(), $conversation->annonce->title));
            }
        }


        return response()->json([
            'status' => 'success',
            'message' => [
                'id' => $message->id,
                'content' => $message->content,
                'created_at' => $message->created_at->format('H:i | d M Y'),
                'user' => [
                    'id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'avatar' => auth()->user()->avatar ?? 'default-avatar.png',
                ],

            ],
        ]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_ids' => 'required|array|min:2',
            'user_ids.*' => 'exists:users,id',
            'annonce_id' => 'required|exists:annonces,id',
        ]);

        $userIds = $validated['user_ids'];
        $annonceId = $validated['annonce_id'];


        /*$conversation = Conversation::whereHas('users', 
                            function ($query) use ($userIds) {
                                $query->whereIn('user_id', $userIds) ;
                            }, '=', count($userIds))
                            ->orWhereHas('annonce', 
                                function($query) use ($annonceIds) {
                                    $query->where('annonce_id', $annonceIds) ; 
                                }, '=', count($annonceIds))->first() ; */

        $conversation = Conversation::query()->whereHas('users', function ($query) use ($userIds) {

            $query->whereIn('user_id', $userIds);

        }, '=', count($userIds))
            ->where('annonce_id', $annonceId)
            ->first() ;


        $annonce = Annonce::find($validated['annonce_id']);

        // if ($conversation) {
        //     return redirect()->back()->with('warning', 'Vous avez déjà une conversation avec cet utilisateur concernant cette annonce. Consultez vos conversations !');
        // }

        if (!$conversation) {


            /** @var Conversation $conversation  */

            $conversation = Conversation::create([
                'title' => $annonce->title,
                'creator_id' => auth()->id(),
            ]);

            $conversation->users()->sync($userIds);

            $conversation->annonce()->associate($annonce);
            $conversation->save();

            session()->get('message', '');

            session()->put('message', 'Bonjour, je vous contacte à propos de l\'annonce : ' . $annonce->title . ' !');

            CheckExpectedMessage::dispatch($conversation)->delay(now()->addMinutes(3));



            // $conversation->messages()->create([
            //     'user_id' => auth()->id(),
            //     'content' => 'Bonjour, je vous contacte à propos de l\'annonce : '. $annonce->title,
            // ]);
        }

        // dd($conversation) ; 


        return redirect()->route('messenger.base');
    }


    public function saveMessage(Request $request, Conversation $conversation)
    {
        $this->authorize('sendMessage', $conversation);

        $request->validate(['content' => 'required|string']);

        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversation $conversation)
    {
        $this->authorize('delete', $conversation);
    }
}
