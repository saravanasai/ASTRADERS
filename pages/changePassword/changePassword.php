<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once("./assets/css_links.php");
//adding a database config file
include_once("./config.php");






?>
<div class="content-wrapper" style="min-height: 1419.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="lockscreen-wrapper" id="oldpasswordform">
    <div class="lockscreen-logo">
      <a href="<?php echo '?status='; ?>"><b>AS</b>TRADERS</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">ADMIN</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="pages/changePassword/image/pngwing.com.png" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials">
        <div class="input-group">
          <input type="password" class="form-control" id="oldpassword" placeholder="enter old password">

          <div class="input-group-append">
            <button type="submit" class="btn" id="changePassword">
              <i class="fas fa-arrow-right text-muted"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
      Enter your old password to change Password
    </div>
    <br>
    <div class="text-center">
      <a href="<?php echo '?status='; ?>"><button class="btn btn-primary">back to home</button></a>
    </div>
    <div class="lockscreen-footer text-center">
      Copyright © 2021-2022 <b><a href="https://www.exciteon.com/" target="_blank" class="text-black">EXCITEON.COM</a></b><br>
      All rights reserved
    </div>
  </div>

  <!-- SECTION TO HANDLE IF THE OLD PASSWORD IS CORRECT -->

  <div class="container my-5" id="newpasswordform">
    <div class="row">
      <div class="col col-md-6 offset-md-2">
        <div class="card-body">
          <p class="login-box-msg">
          <h4>ENTER THE NEW PASSWORD</h4>
          </p>
          <form action="" method="post" id="newpasswordUpdateForm">
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password"  id="password1">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Confirm Password" id="password2">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success btn-block">Change password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>


  <!-- END SECTION TO HANDLE IF THE OLD PASSWORD IS CORRECT -->


  <!-- /.content -->
</div>
<?php
include_once("./assets/js_links.php");
?>