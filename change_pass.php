<?php 

$fmr_email = $_SESSION['fmr_email'];

$get_user_email = "select * from fmr_users where fmr_email='$fmr_email'";
$run_user_email = mysqli_query($con,$get_user_email);
$row_user_email = mysqli_fetch_array($run_user_email);

$fmr_id = $row_user_email['fmr_id'];
$fmr_pass = $row_user_email['fmr_pass'];

?>

<div class="col-12 grid-margin form_profile">
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Email</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_email" value="<?php echo $fmr_email; ?>" required/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Old Password</h4></label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="fmr_old_pass" placeholder="Enter Old Password" required/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">New Password</h4></label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="fmr_pass" placeholder="Enter New Password" required/>
            </div>
        </div>
        </div>
    </div>
    <button class="btn btn-primary btn-block" type="submit" name="submit">Update Change</button>
    </form>
</div>
<?php 

if(isset($_POST['submit'])){
    $fmr_new_email = $_POST['fmr_email'];
    $fmr_old_pass = $_POST['fmr_old_pass'];
    $fmr_new_pass = $_POST['fmr_pass'];

    $fmr_hash_pass = password_hash($fmr_new_pass, PASSWORD_DEFAULT);

    if(!password_verify($fmr_old_pass, $fmr_pass)){

        echo "<script>alert('Password do not match')</script>";

    }else{
        $update_password = "update fmr_users set fmr_email='$fmr_new_email',fmr_pass='$fmr_hash_pass' where fmr_id='$fmr_id'";
        $run_update_password = mysqli_query($con,$update_password);
    
              echo "<script>alert('Changes Updated')</script>";
              echo "<script>window.open('logout','_self')</script>";
    }
}

?>
