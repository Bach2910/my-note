<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
</head>
<body>
<h1>Danh sách sinh viên</h1>
<a href="add.php">Thêm sinh viên</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Tuổi</th>
        <th>Lớp</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sinhvien as $sv): ?>
        <tr>
            <td><?= $sv['id'] ?></td>
            <td><?= $sv['ho_ten'] ?></td>
            <td><?= $sv['tuoi'] ?></td>
            <td><?= $sv['ten_lop'] ?></td>
            <td>
                <a href="edit.php?id=<?= $sv['id'] ?>">Sửa</a> |
                <a href="delete.php?id=<?= $sv['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
