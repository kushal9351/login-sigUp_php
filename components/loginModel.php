<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login page</h1>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="loginError" class="form-text text-danger text-center" ></div>
      <form id="loginform" action="getData.php" method="POST">
        <!-- signup-login_project/getData.php -->
            <div class="mb-3 my-4 col-6">
                <!-- <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="l_username" name="l_username"> -->
                <label for="l_username" class="form-label">Email address</label>
                <input type="email" class="form-control" id="l_username" name="l_username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="l_password" name="l_password">
            </div>
            <button type="submit" class="btn btn-primary md-2"  id="loginBtn">Login</button>
            <!-- <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#signup">sign Up</button> -->
            
            <!-- <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#signup">sign Up</button> -->
            <div>
            Don't have an account?<button type="button" class="btn btn-link text-info" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button>
            </div>
            <!-- data-bs-dismiss="modal" -->
        </form>
      </div>
    </div>
  </div>
</div>