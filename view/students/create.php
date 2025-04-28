<h1>Thêm Sinh viên</h1>
<form action="index.php?action=store" method="POST" enctype="multipart/form-data">
    <label>Tên:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Lớp:</label><br>
    <select name="class_id" required>
        <option value="">--Chọn lớp--</option>
        <option value="1">CNTT 1</option>
        <option value="2">CNTT 2</option>
    </select><br><br>
    <label>Ảnh (nhiều ảnh):</label><br>
    <input type="file" name="images[]" multiple><br><br>

    <button type="submit">Thêm mới</button>
</form>
<a href="index.php">Quay lại danh sách</a>
