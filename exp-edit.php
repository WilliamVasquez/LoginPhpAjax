<?php
    require_once 'database.php';
    if(isset($_POST['editExp'])){
        $result = $con->prepare("update expediente set name=:name, description=:description where id=:id");
        $id = sano($_POST['id']);
        $name = sano($_POST['name']);
        $description = sano($_POST['description']);
        $result->bindValue(':name', $name);
        $result->bindValue(':description', $description);
        $result->bindValue(':id', $id);
        $result->execute();
        if(!$result)
            die('Query failed exp edit'.errorInfo());
        else
            echo 'Update task successfully!';
    }
?>