<?php

namespace App\Providers;

use App\Services\PkgStoreService;
use Illuminate\Support\ServiceProvider;

class PkgStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\PkgStoreService', function ($app) {
            return new PkgStoreService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
