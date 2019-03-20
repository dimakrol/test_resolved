<?php

namespace App\Providers;

use App\Broadcasting\DatabaseChannel;
use App\Contracts\SearchableContract;
use App\Repositories\ElasticearchPostSearchRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SearchableContract::class, function() {
            return new ElasticearchPostSearchRepository();
        });

        $this->app->instance(IlluminateDatabaseChannel::class, new DatabaseChannel);
    }
}
