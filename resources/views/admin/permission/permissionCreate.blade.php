<!DOCTYPE html>
<html>
<head>
    <title>Tạo quyền mới</title>
</head>
<body>
<h2>Tạo quyền mới</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('permissions.store') }}" method="POST">
    @csrf
    <label for="name">Tên quyền:</label>
    <input type="text" name="name" required>
    <button type="submit">Tạo quyền</button>
</form>
<a href="{{ route('list.permission')}}">← Quay lại</a>
</body>
</html>
