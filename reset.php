<?php
session_start();
unset($_SESSION['students']);
header('location: danhSachSinhVien.php');
exit;