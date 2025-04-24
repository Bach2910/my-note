<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']['error']) == 0) {
        switch ($_FILES['file']['error']) {
            case 1:
            case 2:
                $msg = "File too large!";
                break;
        }
    } else {
        $filename = basename($_FILES['file']['name']);
        $uploadDir = "uploads/";
        $targetFile = $uploadDir . $filename;

        echo $filename;
        echo $_FILES['file']['type'];
        echo $_FILES['file']['size'] / 1024;
        echo $_FILES['file']['tmp_name'];

        if (!is_dir($uploadDir)) {
            @mkdir($uploadDir, 0777, true);
        }
        if (file_exists($targetFile)) {
            echo "File already exists.";
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                $msg = "File uploaded successfully";
            } else {
                $msg = "There was an error uploading your file.";
            }

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
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    upload file <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
<?php echo $msg ?>
</body>
</html>
