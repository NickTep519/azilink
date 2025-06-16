<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomPasswordReset extends ResetPasswordNotification
{
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Réinitialisation de mot de passe')
            ->greeting('Bonjour !')
            ->line('Vous avez demandé une réinitialisation de mot de passe. Appuyez sur le bouton si-dessous')
            ->action('Réinitialiser le mot de passe', $url)
            ->line('Si vous n\'avez pas demandé de réinitialisation, ignorez cet e-mail.')
            ->salutation('Cordialement, Team AZILINK');
    }
}
