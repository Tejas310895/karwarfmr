<?php 

$fmr_email = $_SESSION['fmr_email'];
$get_user_email = "select * from fmr_users where fmr_email='$fmr_email'";
$run_user_email = mysqli_query($con,$get_user_email);
$row_user_email = mysqli_fetch_array($run_user_email);

$fmr_pass = $row_user_email['fmr_pass'];

?>

<div class="col-12 grid-margin form_profile">
<form action="">
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Email</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_email" value="<?php echo $fmr_email; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Old Password</h4></label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="fmr_pass" placeholder="Enter Old Password"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">New Password</h4></label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="fmr_pass" placeholder="Enter New Password"/>
            </div>
        </div>
        </div>
    </div>
    </form>
</div>
