<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up Page</h1>
        
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- content -->
        <form action="getData.php" method="post" id="signupform" name="signupform" >
        <!-- onsubmit="return validation()" -->
            <div id="signupError" class="form-text text-danger"></div>
            <!-- /signup-login_project/signup.php -->
            <div class="mb-3 my-4 col-6">
                <!-- <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="s_username" name="s_username"> -->
                <label for="s_username" class="form-label">Email address</label>
                <input type="email" class="form-control" id="s_username" name="s_username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="s_password" name="s_password">
            </div>
            <div class="mb-3 col-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="s_cpassword" name="s_cpassword">
            </div>
            <input type="submit" class="btn btn-primary" id="signUpBtn" value="sign up">
            <!-- onclick="return validate()" -->
            <!-- <button type="submit" class="btn btn-primary md-2"  id="loginBtn">Login</button> -->
        </form>
        <!-- content end -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->

      <!-- data-bs-dismiss="modal" -->
    </div>
  </div>
</div>