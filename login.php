<?php 

session_start();
include "includes/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Karwars Team</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="RoyalUI/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="RoyalUI/template/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="RoyalUI/template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="RoyalUI/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-4 px-4 px-sm-5">
              <div class="brand-logo">
                <img class="mx-auto d-block" src="images/karwarslogo.png" alt="logo">
              </div>
              <form class="pt-3" action="" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="fmr_email" id="fmr_email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="fmr_pass" id="fmr_pass" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="fmr_login">LOG IN</button>
                </div>
                <div class="mt-4 text-center">
                  <h4 class="mb-0"><a href="forget_pass.php" class="auth-link text-black">Forgot password?</a></h4>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>

<?php 

    if(isset($_POST['fmr_login'])){

        $fmr_email = $_POST['fmr_email'];

        $fmr_pass = $_POST['fmr_pass'];

        $get_fmr = "select * from fmr_users where fmr_email='$fmr_email'";

        $run_fmr = mysqli_query($con,$get_fmr);

        $row_fmr = mysqli_fetch_array($run_fmr);

        $fmr_pass_db = $row_fmr['fmr_pass'];

        $count = mysqli_num_rows($run_fmr);

        if(!password_verify($fmr_pass, $fmr_pass_db)){

            echo "<script>alert('your email or password id invalid')</script>";

            exit();
        }else{

          $_SESSION['fmr_email']=$fmr_email;

          echo "<script>alert('Logged in. Welcome Back')</script>";

          echo "<script>window.open('index.php?dashboard','_self')</script>";

        }

    }

?>
