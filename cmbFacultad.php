<?php
    include 'baseAjax.php';
    $query = "select * from facultad";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Query failed cmbFacultad list! '.mysqli_error($con));
    }
    else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'idFacultad' => $row['IdFacultad'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>