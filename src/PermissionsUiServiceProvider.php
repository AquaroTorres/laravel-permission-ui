<?php

namespace Aquaro\LaravelPermissionsUi;

use Illuminate\Support\ServiceProvider;

class PermissionsUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','permissions-ui');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
