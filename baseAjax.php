<?php
    $con = mysqli_connect(
        'localhost',
        'root',
        '1523',
        'bdarchivos'
    );
    if (mysqli_connect_errno()) {
        echo "Failed to connect databaseAjax: " . mysqli_connect_error();
        exit();
    }
    mysqli_set_charset($con,"utf8");
    //mysqli_close($con);
?>