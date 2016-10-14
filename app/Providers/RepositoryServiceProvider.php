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

    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        // 普通のルーティング
    }

    protected function mapApiRoutes()
    {
        Route::group([
            // Kernel.phpでapiに登録されているミドルウェアを適応
            'middleware' => 'api',
            // Controllers/Api以下にあるクラスに限定する
            'namespace' => "{$this->namespace}\Api",
            // エンドポイントを/api/somethingの形にする
            'prefix' => 'api',
        ], function ($router) {
            // api.phpを登録する
            require base_path('routes/api.php');
        });
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
