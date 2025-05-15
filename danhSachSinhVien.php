<?php
session_start();
if(!isset($_SESSION['student'])){
    $_SESSION['student'] = [];
}
$msg = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['delete_id'])){
        $delete_id = $_POST['delete_id'];
        if(isset($_SESSION['student'][$delete_id])){
            unset($_SESSION['student'][$delete_id]);
            $_SESSION['student'] = array_values($_SESSION['student']);
            $msg = "Da xoa thanh cong";
        }
    }
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    if(!empty($name) && !empty($student_id)){
        $trung = false;
        foreach($_SESSION['student'] as $student) {
            if($student['student_id'] === $student_id) {
                $trung = true;
                break;
            }
        }
        if($trung) {
            $msg = "account is already taken";
        }
        else{
            $_SESSION['student'][] = ['name'=>$name, 'student_id'=>$student_id];
            $msg = "success";
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

        <form method="POST" onsubmit="return validate()">
            <input type="text" name="name" id="name">
            <input type="text" name="student_id" id="student_id">
            <button type="submit">Add</button>
        </form>
        <ul>
            <?php foreach($_SESSION['student'] as $index =>$student):?>
            <li><?php echo $student['name']."-----".$student['student_id']?>
            <form method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $index?>">
                <button type="submit" onclick="alert('ban co muon so <?php echo $student['name'] ?> nay chu')">Delete</button>
            </form></li>
            <?php endforeach;?>
        </ul>
        <form action="reset.php" method="POST">
            <button type="submit" >DELETE ALL</button>
        </form>
        <p id="result"></p>

</body>
<script>
    function validate() {

        const name = document.getElementById('name').value.trim()
        const id = document.getElementById('student_id').value.trim()
        if (!name || !id) {
            alert('Hay nahp lai cho du du lieu')
            return false
        }
        return true
    }
</script>
</html>
