<?php
    include 'baseAjax.php';
    $query = "select * from motivoCancelacion";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Query failed cmbMotivo list! '.mysqli_error($con));
    }
    else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'idMotivo' => $row['IdMotivoCancelacion'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>