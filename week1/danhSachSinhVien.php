<?php require __DIR__.'/../week1/data.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Student</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<p id="result"><?php echo $msg ?></p>
<form class="form" method="POST" onsubmit="return validate()">
    <label for="name">Nhap ten</label>
    <input type="text" name="name" id="name" placeholder="nhap ten vao">
    <label for="student_id">Nhap id</label>
    <input type="text" name=student_id id="student_id" placeholder="nhap id vao">
    <button type="submit">Add</button>
</form>
<div class="form_data">
    <ul>
        <?php foreach ($_SESSION['students'] as $index => $student): ?>
            <li><?php echo 'Tên sinh viên là:' .$student['name'] .'<br>'. 'ID:' .$student['student_id'] ?>
                <form method="post">
                    <input type="hidden" value="<?php echo $index ?>" name="delete_id">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
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
