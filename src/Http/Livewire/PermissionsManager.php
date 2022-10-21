<?php

namespace Aquaro\LaravelPermissionsUi\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsManager extends Component
{
    /** Mostrar o no el form, tanto para crear como para editar */
    public $form = false;

    /** Objecto Permission */
    public Permission $permission;

    public $permissions_extra_columns;
    public $roles_extra_columns;

    protected function rules()
    {
        $rules = [
            'permission.name'        => 'required|min:3|max:100',
            'permission.guard_name'  => 'required',
        ];

        foreach(config('permission-ui.permissions_extra_columns') as $column)
        {
            $rules['permission.'.$column] = 'string';
        }
        return $rules;
    }

    protected $messages = [
        'permission.name.required'      => 'El nombre es requerido.',
        'permission.name.min'           => 'El nombre del permissione debe tener más de 3 caracteres.',
        'permission.name.max'           => 'El nombre del permissione no debe tener más de 100 caracteres.',
    ];

    /**
    * Mount config permissions_extra_columns
    */
    public function mount()
    {
        $this->roles_extra_columns = config('permission-ui.roles_extra_columns');
        $this->permissions_extra_columns = config('permission-ui.permissions_extra_columns');
    }

    public function index()
    {
        $this->resetErrorBag();
        $this->form = false;
    }

    public function form(Permission $permission)
    {
        $this->permission = Permission::firstOrNew([
            'name' => $permission->name, 
            'guard_name' => config('auth.defaults.guard')
        ]);
        $this->form = true;
    }

    public function save()
    {
        $this->validate();
        $this->permission->save();
        $this->index();
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
    }

    public function render()
    {
        $permissions = Permission::all();

        return view('permissions-ui::livewire.permissions-manager', [
            'permissions' => $permissions,
        ]);
    }
}
