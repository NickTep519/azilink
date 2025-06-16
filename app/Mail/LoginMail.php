<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public array $credentials)
    {
        //
    }


    public function build() {

        return $this->view('emails.login')
                    ->subject('Un nouvel appareil s\'est connecté à votre compte')
                    ->with([
                        'credentials' => $this->credentials,
                    ]) ; 
    }

   
}
