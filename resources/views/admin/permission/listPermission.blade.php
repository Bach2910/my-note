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
<a href="{{route('roles.create')}}">New Role</a>
@foreach ($roles as $role)
    <p>{{ $role->name }}</p>
    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
    </form>
@endforeach</body>
</html>

