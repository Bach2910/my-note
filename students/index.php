<?php
include __DIR__ . '/../config/db.php';

$sql = "SELECT students.*, classes.name AS class_name
        FROM students
        LEFT JOIN classes ON students.class_id = classes.id";
$result = $conn->query($sql);
?>

<h1>Danh sách sinh viên</h1>
<a href="add.php">Thêm sinh viên</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Tên</th><th>Email</th><th>Lớp</th><th>Hành động</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['class_name'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Sửa</a> |
                <a href="delete.php?id=<?= $row['id'] ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>