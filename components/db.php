<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "users";

    $con = mysqli_connect($server, $username, $password, $db);

    if(!$con){
        die("error " . mysqli_connect_error());
    }
    // echo "successfully connected";
?>