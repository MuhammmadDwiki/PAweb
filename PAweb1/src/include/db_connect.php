<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "web_pancing";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Cannot connect to database: " . mysqli_connect_error());
    }
?>