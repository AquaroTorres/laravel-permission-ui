<?php

use Aquaro\LaravelPermissionsUi\Http\Livewire\PermissionsManager;
use Aquaro\LaravelPermissionsUi\Http\Livewire\RolesManager;

Route::group(['middleware'=> config('permission-ui.middlewares') ], function(){
    Route::get('permissions',PermissionsManager::class)->name('permissions');
    Route::get('roles',RolesManager::class)->name('roles');
});