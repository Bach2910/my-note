<h2>Tạo vai trò mới</h2>
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tên vai trò" required>
    <button type="submit">Tạo</button>
</form>
