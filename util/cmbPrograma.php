<?php
    require_once 'database.php';
    $query = "select * from programa";
    $result = $con->query($query);
    if(!$result){
        die('Query failed cmbPrograma list! '.errorInfo());
    }
    else{
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'idPrograma' => $row['IdPrograma'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>