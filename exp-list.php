<?php
    require_once 'database.php';
    $query = "CALL crud_expediente (1, 0, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 5)";
    $result = $con->query($query);
    if(!$result){
        echo 'Query failed exp list! '.errorInfo();
    }
    else{
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'idDetalle' => $row['idDetalle'],
                'Expediente' => $row['Expediente'],
                'Carnet' => $row['Carnet'],
                'Nombres' => $row['Nombres'],
                'Apellidos' => $row['Apellidos'],
                'Programa' => $row['Programa'],
                'Motivo' => $row['Motivo'],
                'Estado' => $row['Estado'],
                'Facultad' => $row['Facultad']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>