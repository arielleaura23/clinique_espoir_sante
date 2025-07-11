<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $message;
    public $from_id;
    public $to_id;
    public $chat_id;

    public function __construct($username, $message, $from_id, $to_id, $chat_id)
    {
        $this->username = $username;
        $this->message = $message;
        $this->from_id = $from_id;
        $this->to_id = $to_id;
        $this->chat_id = $chat_id;
    }

    public function broadcastOn()
    {
        return ['chat.' . $this->chat_id];
    }

    public function broadcastAs()
    {
        return 'message';
    }

    public function broadcastWith()
    {
        return [
            'username' => $this->username,
            'message' => $this->message,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'chat_id' => $this->chat_id,
        ];
    }
}
