<?php
    // For get request 
    // echo "hello guys";


    // for post request 
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $city = $_POST['city'];
        echo "hello $name. i like your $city";
    }
?>