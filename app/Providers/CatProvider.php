<?php

namespace App\Providers;

use App\Services\CatService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CatProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /**
         * I prefer singleton in this case, since I want one instance where I can control the requests to the API
         */
        $this->app->singleton(CatService::class, function (Application $app) {
            return new CatService($app['config']->get('services.cat_api.base_uri'), $app['config']->get('services.cat_api.key'));
        });
    }

}
