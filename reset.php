<?php
session_start();
unset($_SESSION['student']);
header('location: danhSachSinhVien.php');
exit;