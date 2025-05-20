<?php
include __DIR__ . '/../config/db.php';
// Lấy ID từ URL
$id = (int)$_GET['id'];
// Lấy chi tiết sinh viên
$stmt = $conn->prepare("SELECT students.*, classes.name as className 
                        FROM students 
                        INNER JOIN classes ON students.class_id = classes.id 
                        WHERE students.id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die('Không tìm thấy sinh viên');
}

// Lấy danh sách tất cả lớp học
$class_stmt = $conn->query("SELECT * FROM classes");
$classes = $class_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/../week2/assets/style.css"
</head>
<body>
<h1>Chi tiết sinh viên</h1>
<form method="POST">

    <table width="400px" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>ID</th>
            <td><input class="input-style" type="text" name="id" value="<?= htmlspecialchars($student['id']) ?>" readonly required></td>
        </tr>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" readonly required>
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" readonly
                       required></td>
        </tr>
        <tr>
            <th>Lớp</th>
            <td>
                <select name="class_id" disabled required>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['id'] ?>" <?= $class['id'] == $student['class_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($class['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
</form>
<a href="/../week2/layout.php">Quay lại</a>
</body>
</html>
