<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Grub_message;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    //CLASS INI MEMINTA DATA BERUPA USER DAN MESSAGE YANG AKAN DIBROADCAST
    public function __construct(User $user, Grub_message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    //KEMUDIAN BROADCASTNYA MENGGUNAKAN PRIVATECHANNEL DENGAN NAMA CHAT
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
