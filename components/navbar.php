<?php
  echo '<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/signup-login_project/index.php">login/signup</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/signup-login_project/index.php">Home</a>
        </li> -->';
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){ 
          echo '<li class="nav-item">
              <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#login" id="popUplogin">Login</button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup">sign Up</button>
          </li>';
        }
        else{
          // echo '<li class="nav-item" >
          //   <a class="nav-link active float-right" aria-current="page" href="logout.php" >logout</a>
          // </li>';

          // echo '
          //   <div class="btn-group dropstart">
          //     <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          //       <span class="visually-hidden">Toggle Dropstart</span>
          //     </button>
          //     <ul class="dropdown-menu">
          //       <li><a class="dropdown-item" href="#">Action</a></li>
          //       <li><a class="dropdown-item" href="#">Another action</a></li>
          //       <li><a class="dropdown-item" href="#">Something else here</a></li>
          //       <li><hr class="dropdown-divider"></li>
          //       <li><a class="dropdown-item" href="#">Separated link</a></li>
          //     </ul>
          //     <button type="button" class="btn btn-secondary">
          //       <img src="svg/gear-wide.svg" alt="">
          //     </button>
          //   </div>
          // ';

          echo '<div class="btn-group dropstart">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="svg/user-solid.svg" alt="Dropright">
            </button>

          <ul class="dropdown-menu text-bg-light p-3">
            <!-- Dropdown menu links -->
            <li><a style="cursor: pointer"  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile">Edit profile</a></li>
            <li><a class=" dropdown-item" aria-current="page" href="logout.php" >logout <img src="svg/sign-out-alt-solid.svg" alt=""></a></li>
              </ul>
              </div>
              ';
              // nav-link active
            //   <li class="nav-item" >
            // </li>

        }

      // }        
    echo '</div>
  </div>
</nav>';




// <img src="svg/box-arrow-right.svg" alt="Logout">

?>

