<?php

use Aquaro\LaravelPermissionsUi\Http\Livewire\UserPermissions;
use Aquaro\LaravelPermissionsUi\Http\Livewire\RolesManager;
use Aquaro\LaravelPermissionsUi\Http\Livewire\PermissionsManager;

Route::group(['middleware'=> config('permission-ui.middlewares') ], function(){
    Route::get('permissions', PermissionsManager::class)->name('permissions');
    Route::get('roles', RolesManager::class)->name('roles');
    Route::get('users/{user}/permissions', UserPermissions::class)->name('users.permissions');
});