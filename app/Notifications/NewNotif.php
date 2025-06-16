<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewNotif extends Notification
{
    // use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $notif;
    protected $url ; 

    public function __construct($notif, $url)
    {
        $this->notif = $notif;
        $this->url = $url; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->notif,
            'url' => $this->url,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];
    }


    public function toBroadcast($notifiable)
    {
        // \Log::info("Notif broadcast déclenchée pour gdg " . $notifiable->id);
        return new BroadcastMessage([
            'message' => $this->notif,
            'url' => $this->url,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
