<?php
include __DIR__ . "/config/db.php";
$sql = "SELECT students.id as id, students.name as StudentName, classes.name as CLassName FROM students INNER JOIN classes ON students.class_id = classes.id ";
$result = $conn->query($sql);
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
<table border="1" cellpadding="10">
    <tr>
        <th>id</th>
        <th>name student</th>
        <th>name class</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['StudentName'] ?></td>
            <td><?php echo $row['CLassName'] ?></td>
            <td>
                <a href="/students/show.php?id=<?= $row['id'] ?>">Chi tiết</a>
            </td>
        </tr>
    <?php } ?>
</table>
<div class="menu">
    <a href="/week2/students/index.php">Danh sach hoc sinh</a>
    <a href="/week2/class/index.php">Danh sach lop</a>
</div>
</body>
</html>
