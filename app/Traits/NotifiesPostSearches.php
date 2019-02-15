<?php

namespace App\Traits;

use App\Events\NewPostSearch;
use Illuminate\Database\Eloquent\Collection;

trait NotifiesPostSearches
{
    /**
     * Notify all users when a search happens.
     *
     * @param Collection $posts
     * @return void
     */
    public function sendNewPostSearchNotifications(Collection $posts) : void
    {
        event(new NewPostSearch($posts));
    }
}
