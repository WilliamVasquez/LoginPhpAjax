<?php
    include 'database.php';
    if(isset($_POST['editExp'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $query = "update task set name='$name', description='$description' where id=$id";
        $result = mysqli_query($con,$query);
        if(!$result)
            die('Query failed task edit'.mysqli_error($con));
        else
            echo 'Update task successfully!';
    }
?>