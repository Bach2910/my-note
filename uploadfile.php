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
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
</body>
</html>
<?php
if(isset($_FILES['file'])){
    $error = $_FILES['file']['error'];
    if($error === UPLOAD_ERR_OK){
        $filename= basename($_FILES['file']['name']);
        $uploadDir = 'uploads/';
        $targetFile = $uploadDir . $filename;

        if(!is_dir($uploadDir)){
            mkdir($uploadDir,0777,true);
        }
        else{
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)){
                echo " File successfully uploaded";
            }
            else{
                echo " File upload failed";
            }
        }
    }
    else{
        switch($error){
            case UPLOAD_ERR_PARTIAL:
                echo "Partial upload";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file sent";
                break;
        }
    }
}

