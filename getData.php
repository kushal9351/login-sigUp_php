<?php
    include("components/db.php");

    // print_r($_POST); die;
    if(isset($_POST['l_username'])){
        $username = $_POST['l_username'];
        $password = md5($_POST['l_password']);
        
        if(empty($username) || empty($password)){
            echo "all field are required";
            exit;
        }

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        // echo $sql;
        $result = $con->query($sql);
        $num = mysqli_num_rows($result);
        

        if($num == 1){
            $row = $result->fetch_assoc();
            if($row['isActive'] == 1){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                echo "you are logged in";
            }
            else{
                echo "Your account is disabled";
            }
            
            // header('location: index.php');

            // $un = $result->fetch_assoc();
            // if($username == $un['username'] && $password == $un['password']){
            //     echo "you are logged in";
            // }
            // else if($username == $un['username'] && $password != $un['password']){
            //     echo "Your password was incorrect";
            // }
            // else{
            //     echo "$username does not exist";
            // }
        }
        else{
            echo "your username and password was incorrect. try again";
            // header('location: index.php');
        }

    }



    if(isset($_POST['s_username'])){
        $username = $_POST['s_username'];
        $password = md5($_POST['s_password']);
        $cpassword = md5($_POST['s_cpassword']);


        if(empty($username) || empty($password) || empty($cpassword)){
            echo "all field are required";
            exit;
        }

        // $exist = false;
        $sql = "SELECT * FROM user WHERE username='$username';";
        $result = $con->query($sql);

        $row = mysqli_num_rows($result);

        if($row > 0){
            echo "$username is already exist";
        }

        else{
            if($password == $cpassword ){

                // $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
                $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password');";
                
                // echo $sql;
                $result = $con->query($sql);
    
                if(!$result){
                    // $errorMessage = "error in query";
                    echo "error in query";
                    // exit;
                }
                echo "Your account is now created and you can login";
                // header('location : index.php');
            }
            else if($password != $cpassword){
                echo "password and confirm password are not same";
            }
        }
        
    }

    if(isset($_POST['p_name'])){
        $name = $_POST['p_name'];
        $u_name = $_POST['p_username'];
        $username = $_POST['p_email'];
        $state = $_POST['p_state'];
        $city = $_POST['p_city'];
        $bio = $_POST['p_bio'];
        $addLink = $_POST['p_addLink'];
        $gender = $_POST['p_gender'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname, $folder);

        if(empty($name)){
            echo "name field is required";
            exit;
        }
        if(empty($u_name)){
            echo "Username field is required";
            exit;
        }
        if(empty($username)){
            echo "email field is required";
            exit;
        }

        if(strlen($name) <= 3){
            echo "name length is too short!";
            exit;
        }
        if(strlen($u_name) <= 3){
            echo "Username length is too short!";
            exit;
        }

        if(empty($username)){
            echo "email field is required";
            exit;
        }

        // $userRegex  = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
            echo "Invalid email format";
            exit;
        }

        

        

        $server = "localhost";
        $dbusername = "root";
        $password = "";
        $cdb = "country";

        $conn = mysqli_connect($server, $dbusername, $password, $cdb);

        if(!$con){
            echo "not connected with database";
        }
        $sql = "SELECT * FROM states WHERE sid = '$state';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(isset($row['state'])){
            $state = $row['state'];
        }

        

        session_start();
        $sql = "UPDATE user
        SET profile = '$filename', name = '$name', u_name = '$u_name', username = '$username', state = '$state', city = '$city', Bio = '$bio', Add_link = '$addLink', Gender = '$gender'
        WHERE username = '$_SESSION[username]';";
        $result = $con->query($sql);
        // echo "$sql";
        // print_r($result);

        if(!$result){
            echo "Error in query";
            
        }

        echo "successfully profile updated";
        // header("location: index.php");
        
    }


?>