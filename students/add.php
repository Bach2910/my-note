<?php
include  '../config/db.php';

// Lấy danh sách lớp
$class_query = $conn->query("SELECT * FROM classes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO students (name, email, class_id) VALUES ('$name', '$email', $class_id)";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<h1>Thêm sinh viên</h1>
<form method="POST">
    Tên: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Lớp:
    <select name="class_id">
        <?php while($row = $class_query->fetch_assoc()) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select><br><br>
    <button type="submit">Lưu</button>
</form>
<a href="index.php">Quay lại</a>
