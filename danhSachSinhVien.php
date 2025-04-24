<?php
session_start();
if (!isset($_SESSION['student'])) {
    $_SESSION['student'] = [];
}
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        if (isset($_SESSION['student'][$delete_id])) {
            unset($_SESSION['student'][$delete_id]);
            $_SESSION['student'] = array_values($_SESSION['student']);
            $msg = "delete success";
        }
    }
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $student_id = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    if (!empty($name) && !empty($student_id)) {
        $trung = false;
        foreach ($_SESSION['student'] as $student) {
            if ($student['student_id'] === $student_id) {
                $trung = true;
                break;
            }
        }
        if ($trung) {
            $msg = "account have been exist";
        } else {
            $_SESSION['student'][] = ['name' => $name, 'student_id' => $student_id];
            $msg = "add student success";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="row container">
    <div class="right_side col-md-6 col-lg-6">
        <div class="alert alert-primary" role="alert">
            <?php echo $msg; ?>
        </div>
        <form method="POST" onsubmit="return validate()">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Your ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="left_side col-lg-6 mt-5 p-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['student'] as $index => $student): ?>
                <tr>
                    <th scope="row"><?php echo $index ?></th>
                    <td><?php echo $student['name'] ?></td>
                    <td><?php echo $student['student_id'] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="delete_id">
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <form method="POST" action="reset.php">
        <button type="submit" class="btn btn-danger mt-3" onclick="alert('ban chac la co muon xoa toan bo danh sach khong')">DELETE ALL ITEM</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script>
    function validate() {
        const name = document.getElementById('name').value.trim();
        const id = document.getElementById('student_id').value.trim();

        if (!name || !id) {
            alert('Hay nhap lai du lieu')
            return false
        }
        return true
    }
</script>
</html>
