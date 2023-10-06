<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "country";

    $con = mysqli_connect($server, $username, $password, $db);

    if(!$con){
        echo "not connected with db";
    }

    $id = $_POST['id'];
    $sql = "SELECT * FROM cities WHERE sid='$id';";
    $result = $con->query($sql);

    while($row = $result->fetch_assoc()){
        ?>
        <option><?php echo $row['city']; ?></option>
        <?php
    }
?>


    

