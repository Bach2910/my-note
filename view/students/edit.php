<h1>Sửa Sinh viên</h1>
<form action="index.php?action=update&id=<?= $student['id'] ?>" method="POST" enctype="multipart/form-data">
    <label>Tên:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>"><br><br>

    <label>Lớp:</label><br>
    <select name="class_id" required>
        <?php foreach ($classes as $class): ?>
            <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['class_name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Ảnh mới (upload lại nếu muốn):</label><br>
    <input type="file" name="images[]" multiple><br><br>

    <button type="submit">Cập nhật</button>
</form>

<a href="index.php">Quay lại danh sách</a>
