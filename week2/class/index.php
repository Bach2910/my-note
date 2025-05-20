<?php
include __DIR__ . "/../config/db.php";

$sql = "SELECT classes.id AS id, classes.name AS className, students.name AS studentName
        FROM students
        RIGHT JOIN classes ON classes.id = students.class_id";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../week2/assets/style.css">
    <title>Danh sách lớp</title>
</head>
<body>
<h1>Danh sách lớp</h1>
<a href="add.php">Add Class</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Lớp</th>
        <th>Học sinh</th>
        <th>Chức năng</th>
    </tr>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['className']); ?></td>
            <td><?php echo isset($row['studentName']) ? htmlspecialchars($row['studentName']) : 'No student in this class'; ?></td>
            <td><a href="edit.php?id=<?= $row['id'] ?>">Sửa</a>
                <a onclick="return confirm('Do you want to delete class?')" href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="/../week2/layout.php">Home</a>
</body>
</html>
