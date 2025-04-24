
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
<h2>Thêm sinh viên</h2>

<!-- Hiển thị thông báo -->

<form method="POST">
    <label>Mã sinh viên:</label><br>
    <input type="text" name="student_id" id="name" ><br><br>

    <label>Họ tên:</label><br>
    <input type="text" name="name" id="student_id" ><br><br>

    <button type="submit">Lưu</button>
</form>

<h3>Danh sách sinh viên:</h3>
<ul>
    </ul>

<form method="POST" action="reset.php">
    <button type="submit">Xóa toàn bộ danh sách</button>
</form>
</body>
<script>
    function ValidForm(){
        const name = document.getElementById('name').innerHTML;
        const student_id = document.getElementById('student_id').innerHTML;

        if(!name || !student_id){
            alert("Hay nhap lai");
            return false;
        }
        return true;
    }
</script>
</html>
