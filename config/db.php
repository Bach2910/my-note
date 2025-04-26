<?php
$servername = "localhost";
$username = "root";  // tùy cấu hình MySQL của bạn
$password = "";
$database = "student"; // tên DB bạn tạo

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>