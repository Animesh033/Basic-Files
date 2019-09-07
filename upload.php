<?php
if (isset($_POST['submit'])) {
    // echo '<pre>';
    // print_r($_FILES['upload_file']);
    // echo '<pre>';

    $uploadErrors = array(
    UPLOAD_ERR_OK => 'There is no error',
    UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the upload_max_filesize directive that was specified in the HTML file',
    UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
    UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload',
    );
    
    $tmpName = $_FILES['upload_file']['tmp_name'];
    $fileName = $_FILES['upload_file']['name'];
    $directory = "uploads/";
    
    if (move_uploaded_file($tmpName, $directory.$fileName)) {
        $message = 'File uploaded successfully';
    }else{
        $error = $_FILES['upload_file']['error'];
    
        $message = $uploadErrors[$error];
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <h2>
            <?php
                if (!empty($uploadErrors)) {
                    echo $message;
                }
            ?>
        </h2>
        <input type="file" name="upload_file"><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>