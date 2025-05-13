<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Phân quyền cho từng Role</h1>
@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@foreach($roles as $role)
    <form action="{{ route('list.update') }}" method="POST">
        @csrf
        <h3>{{ $role->name }}</h3>
        <input type="hidden" name="role_id" value="{{ $role->id }}">

        @foreach($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                    {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                {{ $permission->name }}
            </label><br>
        @endforeach
        <button type="submit">Cập nhật quyền</button>
    </form>
    <hr>
@endforeach
</body>
</html>
