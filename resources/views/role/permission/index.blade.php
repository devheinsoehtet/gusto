@extends('role.index')

@section('permissions')
    <form method="POST" action="{{ route('roles.permissions.assign', Route::current()->parameter('role')) }}">
        @csrf
        @method('PUT')
        @foreach ($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input"
                @checked(in_array($permission->id, $rolePermissionIds))
                type="checkbox" id="{{ $permission->id }}"
                name="permission_ids[]" value="{{ $permission->id }}">
                <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name_alias }}</label>
            </div>
        @endforeach
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-warning btn-block">Edit</button>
        </div>
    </form>
@endsection
