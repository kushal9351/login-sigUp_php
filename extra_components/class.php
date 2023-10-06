<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "formdb"; 
    
    $con = mysqli_connect($server, $username, $password, $db);
    
    if(!$con){
        die("error " . mysqli_connect_error());
    }
    // echo "successfully connected";

    $mid = $_POST['datapost']; 

    $sql = "SELECT * FROM classes WHERE mid = '$mid'";
    $result = $con->query($sql);

    while($row = $result->fetch_assoc()){
        ?>
        <option><?php echo $row['class']; ?></option>
        <?php
    }
?>