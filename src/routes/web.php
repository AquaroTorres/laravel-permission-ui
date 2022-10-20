<?php

use Aquaro\LaravelPermissionsUi\Http\Controllers\PermissionController;


Route::get('permissions',[PermissionController::class,'index']);