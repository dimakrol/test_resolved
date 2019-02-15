<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SearchableContract
{
    /**
     * @param null|string $keyword
     * @return SearchableContract
     */
    public function search(?string $keyword) : SearchableContract;

    /**
     * @return SearchableContract
     */
    public function active() : SearchableContract;

    /**
     * @return SearchableContract
     */
    public function inactive() : SearchableContract;

    /**
     * @return SearchableContract
     */
    public function alphabetically() : SearchableContract;

    /**
     * @return SearchableContract
     */
    public function latest() : SearchableContract;

    /**
     * @return Collection
     */
    public function fetch() : Collection;

    /**
     * @return string
     */
    public function sendNewPostSearchNotifications() : string;
}