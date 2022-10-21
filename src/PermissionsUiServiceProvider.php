<?php

namespace Aquaro\LaravelPermissionsUi;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Aquaro\LaravelPermissionsUi\Http\Livewire\UserPermissions;
use Aquaro\LaravelPermissionsUi\Http\Livewire\RolesManager;
use Aquaro\LaravelPermissionsUi\Http\Livewire\PermissionsManager;

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
        $this->publishes([__DIR__. '/config/permission-ui.php' => config_path('permission-ui.php')]);

        Livewire::component('permissions-manager', PermissionsManager::class);
        Livewire::component('roles-manager', RolesManager::class);
        Livewire::component('user-permissions', UserPermissions::class);
    }
}
