
<?php
include __DIR__ . '/../config/db.php';

$sql = "SELECT students.*, classes.name AS class_name
        FROM students
        LEFT JOIN classes ON students.class_id = classes.id";
$result = $conn->query($sql);
//$result	                Là kết quả trả về sau khi chạy câu SQL (SELECT ...)
//fetch(PDO::FETCH_ASSOC)	Lấy 1 dòng dữ liệu từ $result, kiểu mảng kết hợp (key = tên cột)
//while(...) { }	        Lặp qua từng dòng dữ liệu (từng sinh viên) trong kết quả
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/../week2/assets/style.css">
    <title>Document</title>
</head>
<h1>Danh sách sinh viên</h1>
<a href="add.php">Thêm sinh viên</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Tên</th><th>Email</th><th>Lớp</th><th>Hành động</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= isset($row['class_name']) ? htmlspecialchars($row['class_name']) : 'No class'?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Sửa</a> |
                <a href="delete.php?id=<?= $row['id'] ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="/../week2/layout.php">Home</a>
</html>