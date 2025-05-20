<?php
include __DIR__ . '/../config/db.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
$class_query = $conn->query("SELECT * FROM classes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class_id = $_POST['class_id'];
    $stmt = $conn->prepare("UPDATE students SET name='$name', email='$email', class_id=$class_id WHERE id=$id");
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Lỗi: " . implode(", ", $conn->errorInfo());
    }
}
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
<body>
<h1>Sửa sinh viên</h1>
<form method="POST" class="form_group">
    Tên: <input type="text" name="name" value="<?= $student['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $student['email'] ?>"><br><br>
    Lớp:
    <select name="class_id">
        <?php while ($row = $class_query->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $row['id'] ?>" <?= $row['id'] == $student['class_id'] ? 'selected' : '' ?>>
                <?= $row['name'] ?>
            </option>
        <?php } ?>
    </select><br><br>
    <button class="button" type="submit">Cập nhật</button>
</form>
<a href="index.php">Quay lại</a>
</body>
</html>

