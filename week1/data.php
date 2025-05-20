<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        if (isset($_SESSION['students'][$delete_id])) {
            unset($_SESSION['students'][$delete_id]);
            $_SESSION['students'] = array_values($_SESSION['students']);
            $msg = "Delete success";
        }
    }
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    if (!empty($name) && !empty($student_id)) {
        $trung = false;
        foreach ($_SESSION['students'] as $student) {
            if ($student['student_id'] === $student_id) {
                $trung = true;
                break;
            }
        }
        if ($trung) {
            $msg = "account have been exits";
        } else {
            $_SESSION['students'][] = ['student_id' => $student_id, 'name' => $name];
        }
    }
}
?>