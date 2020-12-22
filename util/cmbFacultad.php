<?php
    include_once 'database.php';
    $query = "select * from facultad";
    $result = $con->query($query);
    if(!$result){
        die('Query failed cmbFacultad list! '.errorInfo());
    }
    else{
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'idFacultad' => $row['IdFacultad'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>