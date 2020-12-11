<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="assets/css/alertify.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/default.min.css" />
    <link rel="stylesheet" href="assets/css/estilos.css" />
    <script src="assets/js/alertify.min.js"></script>
</head>
<body>
<?php
    $con = mysqli_connect(
        'localhost',
        'root',
        '',
        'bdarchivos'
    );
    if (mysqli_connect_errno()) {
        echo "Failed to connect databaseAjax: " . mysqli_connect_error();
        exit();
    }
    mysqli_set_charset($con,"utf8");
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
        $url = mysqli_real_escape_string($con,str_replace('/','',trim(filter_var($_POST['url'],FILTER_SANITIZE_URL))));
        $uploadFileDir = 'uploads/' . $url . '/';
        if(!file_exists($uploadFileDir)){
            mkdir($uploadFileDir, 0777);
        }
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'pdf');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $dest_path = $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $message = "<script>alertify.success('File is successfully uploaded');</script>"; 
                }
                else
                {
                    $message = "<script>alertify.error('There was some error moving the file to upload directory Please make sure the upload directory is writable by web server');</script>";
                }
            }
            else
                $message = "<script>alertify.error('Sorry, only JPG, JPEG, PNG & PDF files are allowed');</script>";
        }
    }

?>
    <form method="POST" action="prueba.php" enctype="multipart/form-data">
        <br><span>Upload a File:</span>
        <input type="text" name="url"><br>
        <input type="file" name="uploadedFile" accept=".jpg,.jpeg,.png,.pdf"/><br>
        <input type="submit" name="uploadBtn" value="Upload" />
    </form>
    <?php if(!empty($message)): ?>
		<?= $message ?>
    <?php endif; ?>
</body>
</html>