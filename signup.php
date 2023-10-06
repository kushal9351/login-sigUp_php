<?php
    include("components/db.php");


    $errorAlert = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        echo "$username ";
        echo "$password ";
        echo "$cpassword ";

        $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
        echo $sql;
        $result = $con->query($sql);

        if(!$result){
            echo "error in query";
        }

        $errorAlert = true;
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
<?php
        include("components/navbar.php");

        if($errorAlert == true){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success</strong> Your account is now created and you can login.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    ?>

<div class="container">
    <!-- <div class="heading">
        <h1>Sign Up Page</h1>
    </div> -->
    

<!-- Modal -->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up Page</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- content -->
        <form id="myform" action="/signup-login_project/signup.php" method="post">
            <div class="mb-3 my-4 col-6">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3 col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 col-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
        </form>
        <!-- content end -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>