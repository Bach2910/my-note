<?php
include __DIR__ .'/../config/db.php';
$id = $_GET['id'];
$conn->query("UPDATE students SET class_id = NULL WHERE class_id = $id");;
$conn -> query("DELETE FROM classes WHERE id = $id");
header("Location: index.php");
?>