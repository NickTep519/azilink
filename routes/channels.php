<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('conversation{conversationId}', function ($user, $conversationId) {

//      \Log::info('Tentative de rejoindre le canal', [
//         'user_id' => $user->id ?? 'non authentifié',
//         'conversation_id' => $conversationId
//     ]);
//     return $user->conversations()->where('conversations.id', $conversationId)->exists();
// });

Broadcast::channel('conversation{conversationId}', function ($user, $conversationId) {
    return $user->conversations()->where('conversations.id', $conversationId)->exists();
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});





