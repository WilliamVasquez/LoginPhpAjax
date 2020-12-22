<?php
    include_once 'database.php';

        $carnet = sano($_POST['carnet']);
        $codigo = sano($_POST['codigo']);
        $priNombre = sano($_POST['priNombre']);
        $segNombre = sano($_POST['segNombre']);
        $priApellido = sano($_POST['priApellido']);
        $segApellido =sano( $_POST['segApellido']);
        $fecha = $_POST['inputCity'];
        $programa = sano($_POST['programa']);
        $facultad = sano($_POST['facultad']);
        $motivo = sano($_POST['motivo']);
        $observacion = sano($_POST['observacion']);
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
        $result = $con->prepare("CALL crud_expediente ('2', 0, :codigo, 'Ingresado', 'SIN UBICACION', 'COMENTARIOS', :observacion, :fecha, :carnet, :priNombre, :segNombre, :priApellido, :segApellido, :motivo, :programa,:facultad);");
        $result->bindValue(':codigo', $codigo);
        $result->bindValue(':observacion', $observacion);
        $result->bindValue(':fecha', $fecha);
        $result->bindValue(':carnet', $carnet);
        $result->bindValue(':priNombre', $priNombre);
        $result->bindValue(':segNombre', $segNombre);
        $result->bindValue(':priApellido', $priApellido);
        $result->bindValue(':segApellido', $segApellido);
        $result->bindValue(':motivo', $motivo);
        $result->bindValue(':programa', $programa);
        $result->bindValue(':facultad', $facultad);
		$result->execute();
        if(!$result){
            die('Query failed exp-add app! '.errorInfo());
        }
        else
            echo 'exp added successfully and uploaded';

?>
