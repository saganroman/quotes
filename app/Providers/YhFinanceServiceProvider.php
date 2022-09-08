<?php

namespace App\Providers;

use App\Services\YhFinanceService;
use Illuminate\Support\ServiceProvider;

class YhFinanceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\YhFinanceService', function ($app) {
            return new YhFinanceService();
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
