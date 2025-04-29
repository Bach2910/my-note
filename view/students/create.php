<?php require_once  'controller/ClassesController.php'?>
<h1>Thêm Sinh viên</h1>
<form action="index.php?action=store" method="POST" enctype="multipart/form-data">
    <label>Tên:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Lớp:</label><br>
    <select name="class_id" required>
        <?php foreach ($classes as $class): ?>
            <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['class_name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label>Ảnh (nhiều ảnh):</label><br>
    <input type="file" name="images[]" multiple><br><br>

    <button type="submit">Thêm mới</button>
</form>
<a href="index.php">Quay lại danh sách</a>
