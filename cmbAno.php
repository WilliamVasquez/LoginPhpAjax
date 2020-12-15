<?php
    require_once 'database.php';
    $query = "select year(dex.FechaCancelacion) as Year
    from detalle_expediente dex
    group by Year
    order by Year asc";
    $result = $con->query($query);
    if(!$result){
        die('Query failed cmbAño list! '.errorInfo());
    }
    else{
        $json = array();
        while($row = $result->fetch()){
            $json[] = array(
                'Year' => $row['Year']               
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
?>