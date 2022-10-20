<?php

use Aquaro\LaravelPermissionsUi\Http\Livewire\PermissionsManager;

Route::group(['middleware'=> config('permission-ui.middlewares') ], function(){
    Route::get('permissions',PermissionsManager::class)->name('permissions');
});