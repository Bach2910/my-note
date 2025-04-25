<?php
session_start();
if (!isset($_SESSION['student'])) {
    $_SESSION['student'] = [];
}
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['delete_id'])){
        $delete_id = $_POST['delete_id'];
        if($_SESSION['student'][$delete_id]){
            unset($_SESSION['student'][$delete_id]);
            $_SESSION['student'] = array_values($_SESSION['student']);
            $msg = "Delete success";
        }
    }
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : "";
    if (!empty($name) && !empty($student_id)) {
        $trung = false;
        foreach ($_SESSION['student'] as $student) {
            if ($student['student_id'] === $student_id) {
                $trung = true;
                break;
            }
        }
        if ($trung) {
            $msg = "Account are exist";
        } else {
            $_SESSION['student'][] = ['name' => $name, 'student_id' => $student_id];
            $msg = "Add success";
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
    <input type="text" name="name" id="name">
    <input type="text" name="student_id" id="student_id">
    <button type="submit">Add</button>
</form>
<ul>
    <?php foreach ($_SESSION['student'] as $index => $student): ?>
        <li><?php echo $student['name'] . "MSV" . $student['student_id']; ?>
        <form method="POST">
            <input type="hidden" name="delete_id" value="<?php echo $index; ?>">
            <button type="submit" onclick="return confirm('You delete this user <?php echo $student['name'] ?>')">Delete</button>
        </form>
        </li>
    <?php endforeach; ?>
</ul>
<form method="post" action="reset.php">
    <button type="submit" onclick="return confirm('You want delete all item in this list')">Delete all</button>
</form>
<script>
    function validate(){
        const name = document.getElementById('name').value.trim()
        const id = document.getElementById('student_id').value.trim()
        const msg = document.getElementById('result')
        if(!name || !id){
            msg.innerHTML = "please write full information"
            return false
        }
        return true
    }
</script>
</body>
</html>
