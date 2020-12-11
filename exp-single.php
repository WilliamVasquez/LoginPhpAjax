<?php
    include 'baseAjax.php';
    if(isset($_POST['idExpediente'])){
        $IdDetalleExpediente = $_POST['idExpediente'];
        $query = "CALL crud_expediente ('4', '$IdDetalleExpediente', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0);";
        $result = mysqli_query($con,$query);
        if(!$result)
            die('Query failed!  single'.mysqli_error($con));
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'idExpediente' => $row['IdDetalleExpediente'],
                'Expediente' => $row['Expediente'],
                'Carnet' => $row['Carnet'],
                'Nombres' => $row['Nombres'],
                'Apellidos' => $row['Apellidos'],
                'FechaCancelacion' => $row['fechaCancelacion'],
                'Programa' => $row['idPrograma'],
                'Facultad' => $row['idFacultad'],
                'Motivo' => $row['idMotivo'],
                'Observacion' => $row['Observacion']
            );
        }
        $jsonString = json_encode($json[0]);
        echo $jsonString;
    }


?>
