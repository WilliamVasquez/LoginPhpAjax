<?php
    include_once 'database.php';
    if(isset($_POST['idExpediente'])){
        $IdDetalleExpediente = $_POST['idExpediente'];
        $query = "CALL crud_expediente ('4', '$IdDetalleExpediente', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0);";
        $result = $con->query($query);
        if(!$result)
            die('Query failed! exp single'.errorInfo());
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'idExpediente' => $row['IdDetalleExpediente'],
                'Expediente' => $row['expediente'],
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
