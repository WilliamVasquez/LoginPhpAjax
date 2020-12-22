<?php
    include_once 'database.php';
    $query = "select * from motivoCancelacion";
    $result = $con->query($query);
    if(!$result){
        die('Query failed cmbMotivo list! '.errorInfo());
    }
    else{
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'idMotivo' => $row['IdMotivoCancelacion'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>