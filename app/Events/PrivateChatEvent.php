<?php

namespace App\Events;


use Illuminate\Broadcasting\Channel;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Broadcasting\PresenceChannel;

use App\Message ;
use App\Chat ;

class PrivateChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $chat;
    // public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $message, $chat)
    {
        $this->message = $message;
        // $this->user = $user;
        $this->chat = $chat;
        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->chat['session_id']);
    }
}
