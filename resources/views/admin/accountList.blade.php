<!DOCTYPE html>
<html>
<head>
    <title>Users, Roles, and Permissions</title>
</head>
<body>
<h1>Danh sách người dùng, role và quyền</h1>
@foreach($users as $user)
    <div style="margin-bottom: 20px;">
        <strong>User:</strong> {{ $user->name }} ({{ $user->email }}) <br>

        @php
            $userRoles = $user->getRoleNames(); // 👈 Lấy tên các role của user (kiểu string)
        @endphp

        <strong>Roles:</strong> {{ $userRoles->implode(', ') }} <br>

        <form action="{{ route('users.changeRole', $user->id) }}" method="POST">
            @csrf
            <select name="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Cập nhật</button>
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
    <a href="{{ route('list.permission') }}">Add</a>
    <hr>
@endforeach
</body>
</html>
