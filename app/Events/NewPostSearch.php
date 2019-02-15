<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPostSearch
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Collection
     */
    public $posts;

    /**
     * Create a new event instance.
     *
     * @param Collection $posts
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }
}
