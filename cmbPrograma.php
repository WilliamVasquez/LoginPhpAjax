<?php
    include 'baseAjax.php';
    $query = "select * from programa";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Query failed cmbPrograma list! '.mysqli_error($con));
    }
    else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'idPrograma' => $row['IdPrograma'],
                'Nombre' => $row['Nombre']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>