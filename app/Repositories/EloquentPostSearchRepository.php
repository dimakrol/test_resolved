<?php

namespace App\Repositories;

use App\Contracts\SearchableContract;
use App\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentPostSearchRepository implements SearchableContract
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->query = Post::query();
    }

    /**
     * @param null|string $keyword
     * @return SearchableContract
     */
	public function search(?string $keyword = null) : SearchableContract
    {
        if ($keyword) {
            $this->query->whereLike($keyword);
        }

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function active() : SearchableContract
    {
        $this->query->onlyActive();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function inactive() : SearchableContract
    {
        $this->query->onlyInactive();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function alphabetically() : SearchableContract
    {
        $this->query->inAlphabeticalOrder();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function latest() : SearchableContract
    {
        $this->query->latest();

        return $this;
    }

    /**
     * @return Collection
     */
    public function fetch() : Collection
    {
        return $this->query->get();
    }

    /**
     * @return string
     */
    public function sendNewPostSearchNotifications() : string
    {
        return 'this is a dummy';
    }
}