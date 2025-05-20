<?php
include __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if ($name == '') {
        $error = "Please enter class name";
    } else {
        $check = $conn->prepare("SELECT COUNT(*) FROM classes WHERE name = :name");
        $check->execute([':name' => $name]);
        $count = $check->fetchColumn();
        if ($count > 0) {
            echo "<p style='color: red;'>Tên lớp đã tồn tại!</p>";
        } else {
            $stmt = $conn->prepare("INSERT INTO classes (name) VALUES ('$name')");
            if ($stmt->execute()) {
                header('Location: index.php');
            } else {
                echo "Loi: " . implode(", ", $conn->errorInfo());

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
    <title>Thêm lớp</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <p style="color: red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<h1>Thêm lớp</h1>
<form method="POST">
    <div class="form_group">
        <label for="name">Class Name: </label>
        <input name="name" type="text" placeholder="Nhap ten class">
        <button class="button" type="submit">Add</button>
    </div>
</form>
<br>
<a href="index.php">Return Home</a>
</body>
</html>