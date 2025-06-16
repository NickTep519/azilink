<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase ; 

class VerifyEmailCustom extends VerifyEmailBase
{
    use Queueable;



    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Confirmation d\'email.')
            ->line('Nous avons bien reçu votre demande de création de compte. Pour confirmer votre email, cliquez sur le bouton ci-dessous.')
            ->action('Je confirme mon email.', $url);
    }

   

}