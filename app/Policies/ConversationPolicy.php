<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;

class ConversationPolicy
{
    /**
     * Détermine si l'utilisateur peut afficher une conversation.
     */
    public function view(User $user, Conversation $conversation)
    {
        // L'utilisateur peut voir la conversation s'il en fait partie
        return $conversation->users->contains($user);
    }

    /**
     * Détermine si l'utilisateur peut supprimer une conversation.
     */
    public function delete(User $user, Conversation $conversation)
    {
        // L'utilisateur peut supprimer une conversation uniquement s'il en fait partie
        return $conversation->users->contains($user);
    }

    /**
     * Détermine si l'utilisateur peut envoyer des messages dans une conversation.
     */
    public function sendMessage(User $user, Conversation $conversation)
    {
        // L'utilisateur peut envoyer un message uniquement s'il en fait partie
        return $conversation->users->contains($user);
    }
}
