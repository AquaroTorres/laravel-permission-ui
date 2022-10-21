<?php

namespace Aquaro\LaravelPermissionsUi\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesManager extends Component
{
    /** Mostrar o no el form, tanto para crear como para editar */
    public $form = false;

    /** Objecto Role */
    public Role $role;

    public $permissions_extra_columns;
    public $roles_extra_columns;
    public $permissions_selection;

    protected function rules()
    {
        $rules = [
            'role.name'        => 'required|min:3|max:100',
            'role.guard_name'  => 'required',
        ];

        foreach(config('permission-ui.roles_extra_columns') as $column)
        {
            $rules['role.'.$column] = 'string';
        }
        return $rules;
    }

    protected $messages = [
        'role.name.required'      => 'El nombre es requerido.',
        'role.name.min'           => 'El nombre del role debe tener más de 3 caracteres.',
        'role.name.max'           => 'El nombre del role no debe tener más de 100 caracteres.',
    ];

    /**
    * Mount config roles_extra_columns
    */
    public function mount()
    {
        //$this->role = Role::find(2);
        $this->roles_extra_columns = config('permission-ui.roles_extra_columns');
        $this->permissions_extra_columns = config('permission-ui.permissions_extra_columns');
    }

    public function index()
    {
        $this->resetErrorBag();
        $this->form = false;
    }

    public function form(Role $role)
    {
        $this->role = Role::firstOrNew([
            'name' => $role->name, 
            'guard_name' => config('auth.defaults.guard')
        ]);
        $this->permissions_selection = $this->role->permissions()->pluck('id')->toArray();
        $this->form = true;
    }

    public function save()
    {
        $this->validate();
        $this->role->save();
        $this->role->permissions()->sync($this->permissions_selection);
        $this->index();
    }

    public function delete(Role $role)
    {
        $role->delete();
    }

    public function render()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('permissions-ui::livewire.roles-manager', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
