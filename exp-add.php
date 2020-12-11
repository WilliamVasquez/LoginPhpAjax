<?php
    include 'baseAjax.php';

        $carnet = $_POST['carnet'];
        $codigo = $_POST['codigo'];
        $priNombre = $_POST['priNombre'];
        $segNombre = $_POST['segNombre'];
        $priApellido = $_POST['priApellido'];
        $segApellido = $_POST['segApellido'];
        $fecha = $_POST['inputCity'];
        $programa = $_POST['programa'];
        $facultad = $_POST['facultad'];
        $motivo = $_POST['motivo'];
        $observacion = $_POST['observacion'];
        // $fileName = $_POST['fileName'];
        // $fileSize = $_POST['fileSize'];
        // $fileType = $_POST['fileType'];
        // $url = str_replace('/','',trim(filter_var($_POST['carnet'],FILTER_SANITIZE_URL)));
        // $uploadFileDir = 'uploads/' . $url . '/';
        // if(!file_exists($uploadFileDir)){
        //     mkdir($uploadFileDir, 0777);
        // }
        // $fileTmpPath = $fileName['tmp_name'];
        // $fileNameCmps = explode(".", $fileName);
        // $fileExtension = strtolower(end($fileNameCmps));
        // $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        // $allowedfileExtensions = array('jpg', 'png', 'jpeg', 'pdf');
        // if (in_array($fileExtension, $allowedfileExtensions)) {
        //     $dest_path = $uploadFileDir . $newFileName;
        //     if(move_uploaded_file($fileTmpPath, $dest_path))
        //     {
        //         $message = "<script>alertify.success('File is successfully uploaded');</script>";
        //     }
        //     else
        //     {
        //         $message = "<script>alertify.error('There was some error moving the file to upload directory Please make sure the upload directory is writable by web server');</script>";
        //     }
        // }
        // else
        // {
        //     $message = "<script>alertify.error('Sorry, only JPG, JPEG, PNG & PDF files are allowed');</script>";
        // }
        $query = "CALL crud_expediente ('2', '', '$codigo', 'Ingresado', '', '', '$observacion', '$fecha', '$carnet', '$priNombre', '$segNombre', '$priApellido', '$segApellido', '$motivo', '$programa','$facultad');";
        $result= mysqli_query($con,$query);
        if(!$result){
            die('Query failed exp-add app! '.mysqli_error($con));
        }
        else
            echo 'exp added successfully and uploaded';

?>
