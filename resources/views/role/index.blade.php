@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <ul class="nav nav-tabs p-3">
                        @foreach ($roles as $role)
                            <li class="nav-item">
                                <a
                                @class([
                                    'nav-link',
                                    'active' => url()->current() == route('roles.permissions.index', $role->id),
                                ]) 
                                    href="{{ route('roles.permissions.index', $role->id) }}">{{ Str::ucfirst($role->title) }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                        @yield('permissions')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
