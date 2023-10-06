<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "country";

  $conn = mysqli_connect($server, $username, $password, $db);

  if(!$conn){
    echo "not connected with database";
  }
  // echo "successfully connected";
?>
<?php 

include("components/db.php");
if(isset($_SESSION['username'])){
  $q = "SELECT * FROM user Where username = '$_SESSION[username]'";
$res = $con->query($q);


$userRow = $res->fetch_assoc();
}

?>;





<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profile</h1>
        
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- content -->
        
        <form id="form" action="getData.php" method="POST" enctype="multipart/form-data" onsubmit="return Edit_validation()">
        <div id="editProfileError" class="form-text text-danger text-center"></div>
          <div class="mb-3">
            <div id="preview" class="text-center"></div>
          </div>
          <div class="mb-3">
            <label for="uploadfile" class="form-label">Profile</label>
            <input class="form-control" type="file" name="uploadfile" id="uploadfile" value="<?php echo $userRow['profile']; ?>" onchange="getImagePreview(event)">
          </div>
          <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="p_name">Full Name</label>
            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Name" value="<?php echo $userRow['name']; ?>">
          </div>
          <!-- <div class="col-md-4 mb-3">
            <label for="validationDefault02">Last name</label>
            <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="" required>
          </div> -->
          <div class="col-md-8 mb-3">
            <label for="p_username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
              </div>
              <input type="text" class="form-control" id="p_username" name="p_username" placeholder="Username" value="<?php echo $userRow['u_name']; ?>" aria-describedby="inputGroupPrepend2">
            </div>
          </div>
         </div>

         <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="p_email" name="p_email" value="<?php echo $_SESSION['username'] ?>" placeholder="Email">
          </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="p_state">State</label>
            <!-- <input type="text" class="form-control" id="p_state" name="p_state" placeholder="State"> -->

            <select name="p_state" id="p_state" class="form-control" value="<?php echo $userRow['state']; ?>" onchange="depSel(this.value)">
              <option value="">Select any state</option>
              <?php 
                $sql = "SELECT * FROM states";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                  ?>
                  <option value="<?php echo $row['sid']; ?>"><?php echo $row['state']; ?></option>

                <?php
              } ?>

            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="p_city">City</label>
            <!-- <input type="text" class="form-control" id="p_city" name="p_city" placeholder="City"> -->
            <select name="p_city" id="p_city" class="form-control" value="<?php echo $userRow['city']; ?>">
              <option value="">Select any city</option>
            </select>
          </div>
          
          <!-- <div class="col-md-3 mb-3">
            <label for="validationDefault05">Zip</label>
            <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
          </div> -->
          <div class="col-md-4 mb-3">
            <label for="p_bio">Bio</label>
            <input type="text" class="form-control" id="p_bio" name="p_bio" placeholder="Bio" value="<?php echo $userRow['Bio']; ?>">
          </div>
    <div class="col-md-4 mb-3">
      <label for="p_addLink">Add link</label>
      <input type="text" class="form-control" id="p_addLink" name="p_addLink" placeholder="Add Link" value="<?php echo $userRow['Add_link']; ?>">
    </div>
    <!-- <div class="col-md-4 mb-3">
      <label for="validationDefault05">Gender</label>
      <input type="text" class="form-control" id="validationDefault06" placeholder="Gender" required>
    </div> -->
    <div class="col-md-4 mb-3">
    <label for="p_gender" class="form-label">Gender</label>
    <input class="form-control" list="genderDataList" id="p_gender" name="p_gender" placeholder="Gender" value="<?php echo $userRow['Gender']; ?>">
    <datalist id="genderDataList">
      <option value="Male">
      <option value="Female">
      <option value="Custom">
      <option value="Prefer not to say" selected>
    </datalist>
    </div>
  </div>
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div> -->
  


  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button class="btn btn-primary" type="submit" id="profileEditBtn">Submit form</button>
      </div>
</form>
        <!-- content end -->
      

      <!-- data-bs-dismiss="modal" -->
    </div>
  </div>
</div>

<!-- <script>
  function Edit_validation(){
    e.preventDefault();
    let name = $('#p_name').val();
    let u_name = $('#p_username').val();
    let userName = $('#p_email').val();

    let returnValue = true;

    console.log("here");
    if(name == ""){
        returnValue = false;
    }

    if(user === ""){
        $('#editProfileError').html('Please fill the Name');
        returnValue = false;
    }

    // length check
    if(userName.length <= 3){
        $('#editProfileError').text(`${userName} length is too short!`);
        returnValue = false;
    }

    return returnValue;
}
</script> -->

