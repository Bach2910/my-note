<?php
include __DIR__ . '/../config/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id = $id");
header('Location: index.php');
?>
