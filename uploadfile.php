<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" multiple>
    <button type="submit">Upload</button>
</form>
</body>
</html>
<?php
if (isset($_FILES['file'])) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['file']['tmp_name'] as $key => $tmpName) {
        $error = $_FILES['file']['error'][$key];

        if ($error === UPLOAD_ERR_OK) {
            $filename = basename($_FILES['file']['name'][$key]);
            $targetFile = $uploadDir . $filename;

            if (move_uploaded_file($tmpName, $targetFile)) {
                echo "Upload thành công: $filename<br>";
            } else {
                echo "Không thể lưu file $filename<br>";
            }
        } else {
            switch ($error) {
                case UPLOAD_ERR_PARTIAL:
                    echo "Upload chưa hoàn tất: " . $_FILES['file']['name'][$key] . "<br>";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Không có file được chọn<br>";
                    break;
                default:
                    echo "Lỗi không xác định: $error<br>";
            }
        }
    }
}


