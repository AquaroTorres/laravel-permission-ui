<?php

namespace Aquaro\LaravelPermissionsUi\Http\Livewire;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use App\Models\User;

class UserPermissions extends Component
{
	public $user;

    public $permissions;
    public $roles;

    public $permissions_selection = [];
    public $roles_selection = [];
    public $userPermissionsViaRoles = [];

	public $message = false;
    
    public $permissions_extra_columns;
    public $roles_extra_columns;

    public function mount(User $user)
    {
        $this->roles_extra_columns = config('permission-ui.roles_extra_columns');
        $this->permissions_extra_columns = config('permission-ui.permissions_extra_columns');

        $this->permissions = Permission::orderBy('name')->get();
        $this->roles = Role::orderBy('name')->get();

        $this->getUserRolesAndPermission();
    }

    public function getUserRolesAndPermission()
    {
        $this->userPermissionsViaRoles = $this->user->getPermissionsViaRoles()->pluck('id')->toArray();
        $this->permissions_selection = $this->user->getAllPermissions()->pluck('id')->toArray();
        $this->roles_selection = $this->user->roles()->pluck('id')->toArray();
    }

    public function syncPermissions()
    {
        $this->user->permissions()->sync($this->permissions_selection);
        $this->user->roles()->sync($this->roles_selection);

		$this->message = true;
    }

    public function render()
    {
        return view('permissions-ui::livewire.user-permissions');
    }
}
