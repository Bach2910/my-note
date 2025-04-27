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
        echo "Lỗi: " .implode("." ,$conn->errorInfo());
    }
}
?>

<h1>Sửa sinh viên</h1>
<form method="POST">
    Tên: <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $student['email'] ?>" required><br><br>
    Lớp:
    <select name="class_id">
        <?php while($row = $class_query->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $row['id'] ?>" <?= $row['id'] == $student['class_id'] ? 'selected' : '' ?>>
                <?= $row['name'] ?>
            </option>
        <?php } ?>
    </select><br><br>
    <button type="submit">Cập nhật</button>
</form>
<a href="index.php">Quay lại</a>
