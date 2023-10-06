<?php
    include("components/db.php");
    $s_no = $_GET['s_no'];
    $isActive = $_GET['isActive'];

    $sql = "update user SET isActive=$isActive where s_no=$s_no";
    $result = $con->query($sql);

    if($result){
        echo "success";
    }

    // header("location: index.php");
    // header("location: index.php");
?>