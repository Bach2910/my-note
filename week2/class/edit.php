<?php
include __DIR__ . "/../config/db.php";

$id = $_GET["id"];
if (!isset($_GET['id'])) {
    echo "ID is not provided.";
    exit;
}
$class_query = $conn->query("SELECT * FROM classes WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";

    if ($name == '') {
        echo "<p style='color: red;'>Vui long nhap day du thong tin!</p>";
    } else {
        $check = $conn->prepare("SELECT COUNT(*) FROM classes WHERE name = :name");
        $check->execute([':name' => $name]);
        $count = $check->fetchColumn();
        if ($count > 0) {
            echo "<p style='color: red;'>Ten lop da ton tai!</p>";
        } else {
            $stmt = $conn->prepare("UPDATE classes SET name = '$name' WHERE id = $id");
            if ($stmt->execute()) {
                header("location: index.php");
            } else {
                echo "Something went wrong" . implode($conn->errorInfo());
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
    <title>Sửa lớp</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <p style="color: red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<h1>Sửa lớp</h1>
<form method="POST">
    <div class="form_group">
        Tên: <input type="text" name="name" value="<?= $class_query['name'] ?>" required><br><br>
        <button class="button" type="submit">Cập nhật</button>
    </div>
</form>
<a href="index.php">Quay lại</a>
</body>
</html>
