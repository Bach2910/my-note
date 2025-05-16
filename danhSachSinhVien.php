<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['delete_id'])){
        $delete_id = $_POST['delete_id'];
        if(isset($_SESSION['students'][$delete_id])){
            unset($_SESSION['students'][$delete_id]);
            $_SESSION['students'] = array_values($_SESSION['students']);
            $msg = "Delete success";
        }
    }
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    if (!empty($name) && !empty($student_id)) {
        $trung = false;
        foreach ($_SESSION['students'] as $student) {
            if ($student['student_id'] === $student_id) {
                $trung = true;
                break;
            }
        }
        if ($trung) {
            $msg = "account have been exits";
        } else {
            $_SESSION['students'][] = ['student_id' => $student_id, 'name' => $name];
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
    <title>Document</title>
</head>
<body>
<p id="result"><?php echo $msg ?></p>
<form method="POST" onsubmit="return validate()">
    <label for="name">Nhap ten</label>
    <input type="text" name="name" id="name" placeholder="nhap ten vao">
    <label for="student_id">Nhap id</label>
    <input type="text" name=student_id id="student_id" placeholder="nhap id vao">
    <button type="submit">Add</button>
</form>
<ul>
    <?php foreach ($_SESSION['students'] as $index => $student): ?>
        <li><?php echo $student['name'] . $student['student_id'] ?>
        <form method="post">
            <input type="hidden" value="<?php echo $index ?>" name="delete_id">
            <button type="submit">Delete</button>
        </form></li>
    <?php endforeach; ?>
</ul>
<form method="POST" action="reset.php">
    <button type="submit">Delete all</button>
</form>
</body>
</html>
<script>
    function validate() {
        const name = document.getElementById('name').value.trim()
        const id = document.getElementById('student_id').value.trim()
        const msg = document.getElementById('result')
        if (!name && !id) {
            msg.innerText = "Hay nhap day du gia tri";
            return false
        }
        return true
    }
</script>
