<?php
include '../config/db.php';

// Lấy danh sách lớp
$class_query = $conn->query("SELECT * FROM classes");

$name = '';
$email = '';
$class_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class_id = $_POST['class_id'];

    if ($name == '' || $email == '' || $class_id == '') {
        $error = "Vui long nhap day du thong tin!";
    } else {
        $check = $conn->prepare("SELECT COUNT(*) FROM students WHERE email = :email");
        $check->execute([':email' => $email]);
        $count = $check->fetchColumn();
        if ($count > 0) {
            echo "<p style='color: red;'>Email đã tồn tại!</p>";
        } else {
            $stmt = $conn->prepare("INSERT INTO students (name, email, class_id) VALUES ('$name', '$email', $class_id)");
            if ($stmt->execute()) {
                header('Location: index.php');
            } else {
                echo "Lỗi: " . implode(", ", $conn->errorInfo());
            }
        }
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
<h1>Thêm sinh viên</h1>
<?php if (!empty($error)): ?>
    <p style="color: red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST">
    <div class="form_group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br><br>
        <label for="name">Email: </label>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>
        <label for="name">Class: </label>
        <select name="class_id">
            <option value="__Class__" <?= $class_id == '__Class__' ? 'selected' : '' ?>>__Class__</option>
            <?php while ($row = $class_query->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $row['id'] ?>" <?= $class_id == $row['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['name']) ?>
                </option>
            <?php } ?>
        </select><br><br>
        <button type="submit">Lưu</button>
    </div>
</form>
<br>
<a href="index.php">Quay lại</a>
</html>