@extends('layout.home')
@section('content')
    <h1>Danh sách người dùng, role và quyền</h1>
    <button class="btn btn-primary"><a class="text-white" style="text-decoration: none" href="{{ route('list.permission')}}">Add New Permission for Role</a></button>
    <button class="btn btn-success"><a class="text-white" style="text-decoration: none" href="{{ route('roles.create')}}">Add New Role</a></button>
    @foreach($users as $user)
        <div style="margin-bottom: 20px;">
            <strong>User:</strong> {{ $user->name }} ({{ $user->email }}) <br>

            @php
                $userRoles = $user->getRoleNames();
            @endphp

            <strong>Roles:</strong> {{ $userRoles->implode(', ') }} <br>

            <form action="{{ route('users.changeRole', $user->id) }}" method="POST">
                @csrf
                <select name="role" class="form-select mb-2 mt-2">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Change Role</button>
            </form>
            <strong>Permissions:</strong>
            <ul>
                @foreach($user->roles as $role)
                    @foreach($role->permissions as $permission)
                        <li>{{ $permission->name }}</li>
                    @endforeach
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach
@endsection
