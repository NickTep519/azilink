<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Message;

class MessageReadEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $readerId;

    public function __construct(Message $message, $readerId)
    {
        $this->message = $message; 
        $this->readerId = $readerId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('conversations' . $this->message->conversation_id);
    }

    public function broadcastAs(): string
    {
        return 'read';
    }

    public function broadcastWith()
    {
        return [
            'message_id' => $this->message->id,
            'reader_id' => $this->readerId,
        ];
    }
}

