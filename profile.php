<?php
  include('include/header.php');
  include('php/user_details.php');
?>
<link rel="stylesheet" href="assets/css/profile.css">

<div class="container emp-profile">
  <div class="row">
      <div class="col-md-4">
          <div class="profile-img">
              <img src="assets/img/profile-image.png" alt=""/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="profile-head">
                      <h5>
                          <?php echo $name ?>
                      </h5>
                      <h6>
                          <?php echo strtoupper($type) ?>
                      </h6>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="profile" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="true">About</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col-md-2">
        <button class="profile-edit-btn" onclick="showEditProfile()">Edit Profile</button>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-8">
          <div class="tab-content profile-tab">
              <div class="tab-pane fade show active" id="profile-tab" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                      <div class="col-md-6">
                          <label>Name</label>
                      </div>
                      <div class="col-md-6">
                          <p><?php echo $name ?></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Email</label>
                      </div>
                      <div class="col-md-6">
                          <p><?php echo $email ?></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Phone</label>
                      </div>
                      <div class="col-md-6">
                          <p><?php echo $phone ?></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Address</label>
                      </div>
                      <div class="col-md-6">
                          <p><?php echo $address ?></p>
                      </div>
                  </div>
              </div>

              <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile" style="display:none">
                <form id="update-profile">
                    <input type="hidden" name="id" value="<?php echo $user_id;?>">
                    <div class="row">
                      <div class="col-md-6">
                          <label>Name</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $name ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                          <label>Email</label>
                      </div>
                      <div class="col-md-6">
                          <input type="email" class="form-control" name="email" id="email"value="<?php echo $email ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                          <label>Phone</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                          <label>Address</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $address ?>">
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-block btn-success" type="submit">Update Profile</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-block btn-danger" type="button" onclick="cancelEditProfile()">Cancel</button>
                        </div>
                    </div>
                  </form>
              </div>
          </div>
        </div>
  </div>
</div>

<script src="assets/js/profile.js"></script>
<script>
///////////////update profile
$('#update-profile').submit(function(e) {
  e.preventDefault();
  console.log($(this).serialize());
  $.ajax({
    type: "POST",
    url: './php/update-profile.php',
    data: $(this).serialize(),
    success: function(response)
    {
        if (response == true) {
          Swal.fire(
            'Edited Successfully!',
            '',
            'success'
          );
          location.reload();
        }
        else {
          Swal.fire(response);
        }
    }
});
});
</script>
