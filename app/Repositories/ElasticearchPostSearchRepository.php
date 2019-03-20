<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 18.03.2019
 * Time: 22:41
 */

namespace App\Repositories;


use App\Contracts\SearchableContract;

use App\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Traits\NotifiesPostSearches;

class ElasticearchPostSearchRepository implements SearchableContract
{
    use NotifiesPostSearches;
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $query;
    private $posts;

    public function __construct()
    {
        $this->query = Post::query();
    }
    /**
     * @param null|string $keyword
     * @return SearchableContract
     */
    public function search(?string $keyword): SearchableContract
    {
        $this->query = Post::search($keyword);
        return $this;
    }

    /**
     * @return SearchableContract
     */
    public function active(): SearchableContract
    {
        $this->query->where('active', true);
        return $this;
    }

    /**
     * @return SearchableContract
     */
    public function inactive(): SearchableContract
    {
        $this->query->where('active', false);
        return $this;
    }

    /**
     * @return SearchableContract
     */
    public function alphabetically(): SearchableContract
    {
        $this->query->orderBy('name');
        return $this;
    }

    /**
     * @return SearchableContract
     */
    public function latest(): SearchableContract
    {
        $this->query->orderBy('create_at');
        return $this;
    }

    /**
     * @return Collection
     */
    public function fetch(): Collection
    {
        $this->posts = $this->query->get();
        $this->sendNewPostSearchNotifications();
        return $this->posts;
    }

    /**
     * @return string
     */
    public function sendNewPostSearchNotifications(): string
    {
        event(new \App\Events\NewPostSearch($this->posts));
        return 'success';
    }
}