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
<form method="POST" enctype="multipart/form-data">
    UPLOAD FILE <input name="uploadFile" type="file">
    <button type="submit">UP</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES["uploadFile"]["error"] > 0) {
        switch ($_FILES["uploadFile"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "";
                break;
        }
    } else {
        $filename = basename($_FILES['uploadFile']['name']);
        $uploadDir = "uploads/";
        $target_dir = $uploadDir . $filename;

        echo $filename;
        echo $_FILES["uploadFile"]["type"];
        echo $_FILES["uploadFile"]["size"];
        echo $_FILES["uploadFile"]["tmp_name"];

        if (!is_dir($target_dir)) {
            @mkdir($uploadDir, 0777, true);
        }
        if (file_exists($target_dir)) {
            echo "<h3>The file already exists.</h3>";
        } else {
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir . $filename)) {
                echo "The file " . basename($_FILES["uploadFile"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}