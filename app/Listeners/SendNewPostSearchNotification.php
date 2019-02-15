<?php

namespace App\Listeners;

use App\Events\NewPostSearch;
use App\Notifications\NewPostSearch as NewPostSearchNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewPostSearchNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param NewPostSearch $event
     * @return void
     */
    public function handle(NewPostSearch $event)
    {
        $posts = $event->posts;

        User::all()->each(function ($user) use ($posts) {
            $user->notify(new NewPostSearchNotification(
                $posts->pluck('id')->toArray(), $posts->count()
            ));
        });
    }
}
