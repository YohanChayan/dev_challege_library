<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\NotifyMe;

class MessageSender
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $UserInfo; //Whatsapp, Telegram, Messenger
    // public $source; //Phone number, Url  --TESTED WITH 'email'
    
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(NotifyMe $User)
    {
        // $this->api = $api;
        // $this->source = $source;
        // $this->$user_id = $user_id;

        $this->UserInfo = $User;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
