<div>
	@section('title', 'User Permissions')
    
    <h3 class="mb-3">{{ $user->name }}</h3>
    
    <div class="row">
        <div class="col">
            <h3 class="mb-3">{{ __('Roles') }}</h3>
            <table class="table table-bordered">
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td width="40">
                            <input class="form-check-input" type="checkbox" 
                                wire:model.defer="roles_selection" 
                                value="{{ $role->id }}" 
                                id="role{{ $role->id }}">
                        </td>
                        <td>
                            <label class="form-check-label" for="role{{ $role->id }}">
                                <strong>{{ $role->name }}</strong> - 
                                @foreach($roles_extra_columns as $column)
                                {{ $role->$column }}
                                @endforeach
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <li>
                                    <strong>{{ $permission->name }}</strong> - 
                                    @foreach($permissions_extra_columns as $column)
                                    {{ $permission->$column }}
                                    @endforeach
                                </li>
                            @endforeach
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3 class="mb-3">{{ __('Permissions') }}</h3>
            <table class="table table-bordered">
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td width="40">
                            <input class="form-check-input" type="checkbox" 
                                wire:model.defer="permissions_selection" 
                                value="{{ $permission->id }}" 
                                id="permission_{{ $permission->id }}"
                                @disabled(in_array($permission->id, $userPermissionsViaRoles))
                            >
                        </td>
                        <td width="40">
                            {{ in_array($permission->id, $userPermissionsViaRoles) ? 'R':'' }}
                        </td>
                        <td>
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                <strong>{{ $permission->name }}</strong> - 
                                @foreach($permissions_extra_columns as $column)
                                {{ $permission->$column }}
                                @endforeach
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <button class="btn btn-success" wire:click='syncPermissions()'>
        <i class="bi bi-check-circle"></i>
    </button>

    @if($message)
    <span class="text-success pt-2 fw-bold">
        Sync Ok
    </span>
    @endif

</div>