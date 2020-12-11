<?php
    include 'baseAjax.php';
    $query = "    select year(dex.FechaCancelacion) as Anio
    from detalle_expediente dex
    group by Anio
    order by Anio asc";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Query failed cmbFacultad list! '.mysqli_error($con));
    }
    else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'Anio' => $row['Anio']               
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>