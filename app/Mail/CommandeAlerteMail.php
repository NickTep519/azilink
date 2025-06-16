<?php

namespace App\Mail;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommandeAlerteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $sugjet, public $messageBody, public Commande $commande)
    {
        //
    }

      /**
     * Configure le contenu du mail.
     */
    public function build()
    {
        return $this->view('emails.alerte-commande')
                    ->subject($this->subject) 
                    ->with([
                        'commande' => $this->commande, 
                        'messageBody' => $this->messageBody
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
