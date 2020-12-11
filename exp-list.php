<?php
    include 'baseAjax.php';
    $query = "CALL crud_expediente (1, 0, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0)";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Query failed task list! '.mysqli_error($con));
    }
    else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'idDetalle' => $row['idDetalle'],
                'Expediente' => $row['Expediente'],
                'Carnet' => $row['Carnet'],
                'Nombres' => $row['Nombres'],
                'Apellidos' => $row['Apellidos'],
                'Programa' => $row['Programa'],
                'Motivo' => $row['Motivo'],
                'Estado' => $row['Estado']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>