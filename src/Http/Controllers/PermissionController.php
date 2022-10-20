<?php

namespace Aquaro\LaravelPermissionsUi\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
    * index permissions
    */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions-ui::permissions',compact('permissions'));
    }
}
