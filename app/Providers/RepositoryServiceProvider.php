<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\EventRepository;
use App\Repositories\Contracts\EventRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(EventRepositoryInterface::class, EventRepository::class);
    }
}
