<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
    // include("components/db.php");


    $successMessage = "";
    $errorMessage = "";

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // if(isset($_POST['s_username'])){


    //     $username = $_POST['s_username'];
    //     $password = md5($_POST['s_password']);
    //     $cpassword = md5($_POST['s_cpassword']);

    //     // echo "$username ";
    //     // echo "$password ";
    //     // echo "$cpassword ";



    //     // $exist = false;

    //     if($password == $cpassword ){

            


    //         // $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    //         $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
            
    //         // echo $sql;
    //         $result = $con->query($sql);

    //         if(!$result){
    //             $errorMessage = "error in query";
    //             // exit;
    //         }
    //         $successMessage = "Your account is now created and you can login.";
    //     }
    //     else if($password != $cpassword){
    //         $errorMessage = "password and confirm password are not same";
    //     }
    // }

    // else{
        // Get request

        // if(isset($_GET['username']) && $_GET['password']){
        // // if(isset($_GET['submit'])){
        //     $username = $_GET['username'];
        //     $password = md5($_GET['password']);

        //     $sql = "SELECT * FROM users";
        //     $result = $con->query($sql);


        //     while($row = $result->fetch_assoc()){   
        //         if($username == $row['username'] && $username == $row['username']){
        //             $successMessage = "you are logged in";
        //             break;
        //         }
        //     }

        //     $errorMessage = "your username and password was incorrect. try again";
            // echo "your username and password was incorrect. try again";
        // }



    // }


    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        // header('location : index.html');
        // echo "<script>
        // $(function(){
        //     $('#popUplogin').click();
        // });
        // </script>";
    }
    else{
        // echo "$_SESSION[username]";
    }
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- data table  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        include("components/navbar.php");

        if($successMessage != ""){
            echo "
                <div class='alert alert-success alert-dismissible fade show' id='errorMsg' role='alert'>
                    <strong>Success</strong> $successMessage
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
            $successMessage = "";
        }
        else if($errorMessage != ""){
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Error: </strong> $errorMessage
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
            $errorMessage = "";
        }


    ?>

    <?php
        
     
     ?>

    <div class="container">
        <?php
            include("components/signUpModel.php");
            include("components/loginModel.php");
            include("components/profileModel.php");

            
            // echo $sql;
            // echo $result;
            // print_r($result);


            if(isset($_SESSION['username'])){
            // if($_SESSION['username'] == "ravi"){

                include("components/db.php");
                $sql = "SELECT * FROM user WHERE username='$_SESSION[username]' AND role='1';";
                $result = $con->query($sql);
                $row = mysqli_num_rows($result);

            if($row > 0){
                mysqli_close($con);
                echo "<h1> welcome  $_SESSION[username] </h1>"; 

                echo '<table class="table table-success table-striped-columns text-center" id="myTable">
                    <thead> 
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Pasword</th>
                            <th scope="col">isactive</th>
                        </tr>
                    </thead>
                    <tbody id="TableID">';
                        // include("fetchData.php");

                        include("components/db.php");

                        $sql = "SELECT * FROM user";
                        $result = $con->query($sql);

                        $count = 1;
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td scope='row' id='row$count'>$count</td>
                            <td>$row[username]</td>
                            <td>$row[password]</td>
                            <td>";
                            if($row['isActive'] == 1){
                                // echo '<a href="status.php?s_no='.$row['s_no'].'&isActive=0" data-isAcivte=0 class="btn btn-success status">Yes</a>';  
                                echo '<a href="status.php?s_no='.$row['s_no'].'" data-isAcivte=0 id='.$row['s_no'].' class="btn btn-success status">';   echo " YES </a>";  
                            }
                            else{
                                // echo '<a href="status.php?s_no='.$row['s_no'].'&isActive=1" data-isAcivte=1 class="btn btn-danger status">NO</a>';
                                echo '<a href="status.php?s_no='.$row['s_no'].'" data-isAcivte=1 id='.$row['s_no'].' class="btn btn-danger status">'; echo " NO </a>";
                                // echo ($row['isActive'] == 1) ? "YES" : "NO";
                            }
                                
                            // </td>

                            // </tr>
                            $count++;


                        }
                    echo"<td> </tr> </tbody>
                </table>";
    
                
            }
            else{
                if(isset($_SESSION['username'])){
                    echo "<h1> welcome  $_SESSION[username] </h1>";
                }
            }
        
        }  
            else{
                // echo "<h1>index page</h1>";

                echo '
                <div class="container my-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/3tYZjGSBwbk/1600x900" alt="First slide">
    </div>
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://source.unsplash.com/WLUHO9A_xik/1600x900" alt="Second slide">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                </div>
                ';
            }

        ?>
    </div>   

    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    
</body>
</html>