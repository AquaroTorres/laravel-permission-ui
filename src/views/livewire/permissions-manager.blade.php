<div>
	@section('title', 'Permissions')

    <div class="row g-2">
        <div class="col">
            <h3 class="mb-3">{{ __('Permissions manager') }}</h3>
        </div>
        <div class="col text-end">
            <button class="btn btn-primary float-right" wire:click="form()">
                <i class="bi bi-plus-circle"></i> 
            </button>
        </div>
    </div>

    @if($form)
        <div class="card mb-3">
            <div class="card-body">

                <h4>{{ $permission->id ? 'Edit' : 'Create' }} permission</h4>

                <div class="row g-2 mb-3">

                    <div class="col-12 col-md-3">
                        <label for="for-name">{{ __('Name') }}*</label>
                        <input type="text" wire:model.lazy="permission.name" class="form-control">
                        @error('permission.name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    @foreach($extra_columns as $column)
                    <div class="col-12 col-md-4">
                        <label for="for-description">{{ ucfirst($column) }}</label>
                        <input type="text" wire:model.lazy="permission.{{ $column }}" class="form-control">
                        @error('permission.$column') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @endforeach


                    <div class="mt-3 col-12">
                        <button type="button" class="btn btn-success" 
                            wire:click="save()"><i class="bi bi-check-circle"></i></button>

                        <button type="button" class="btn btn-outline-secondary" 
                            wire:click="index()"><i class="bi bi-x-circle"></i></button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    
    <table class="table table-sm table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="40"></th>
                <th>id</th>
                <th>name</th>
                @foreach($extra_columns as $column)
                <th>{{ $column }}</th>
                @endforeach
                <th width="40"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" 
                        wire:click="form({{$permission}})"><i class="bi bi-pencil-square"></i></button>
                </td>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                @foreach($extra_columns as $column)
                <td>{{ $permission->$column }}</td>
                @endforeach
                <td>
                    <button type="button" class="btn btn-sm btn-danger" 
                        onclick="confirm('Are you shure want to delete permision: {{ $permission->name }}?') || event.stopImmediatePropagation()" 
                        wire:click="delete({{$permission}})">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>