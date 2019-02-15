<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewPostSearch extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The description of the notification.
     *
     * @var string
     */
    public $subject;

    /**
     * The url of the notification.
     *
     * @var string
     */
    public $posts;

    /**
     * @var int
     */
    public $count;

    /**
     * Create a new notification instance.
     *
     * @param array $ids
     * @param int $count
     */
    public function __construct(array $ids = [], int $count = 0)
    {
        $this->subject = 'A new post search occurred!';
        $this->posts = $ids;
        $this->count = $count;
    }

    // your code to make it happen
}
