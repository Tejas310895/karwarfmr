<?php 

$fmr_email = $_SESSION['fmr_email'];
$get_user_details = "select * from fmr_users where fmr_email='$fmr_email'";
$run_user_details = mysqli_query($con,$get_user_details);
$row_user_details = mysqli_fetch_array($run_user_details);

$fmr_name = $row_user_details['fmr_name'];
$fmr_contact = $row_user_details['fmr_contact'];
$fmr_dob = $row_user_details['fmr_dob'];
$fmr_address = $row_user_details['fmr_address'];
$fmr_city = $row_user_details['fmr_city'];
$fmr_pincode = $row_user_details['fmr_pincode'];
$fmr_state = $row_user_details['fmr_state'];
$fmr_pan_no = $row_user_details['fmr_pan_no'];
$fmr_addhar_no = $row_user_details['fmr_addhar_no'];
$fmr_status = $row_user_details['fmr_status'];


?>
<div class="col-12 grid-margin form_profile">
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Your Name</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_name" value="<?php echo $fmr_name; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Mobile No.</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_contact" value="<?php echo $fmr_contact; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Date of Birth</h4></label>
            <div class="col-sm-9">
            <input class="form-control" type="date" name="fmr_dob" value="<?php echo $fmr_dob; ?>"/>
            </div>
        </div>
        </div>
        </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Address</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_address" value="<?php echo $fmr_address; ?>"/>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">City</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_city" value="<?php echo $fmr_city; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Pincode</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_pincode" value="<?php echo $fmr_pincode; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">State</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_state" value="<?php echo $fmr_state; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">PAN No.</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_pan_no" value="<?php echo $fmr_pan_no; ?>"/>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><h4 class="mb-0">Addhar No.</h4></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="fmr_addhar_no" value="<?php echo $fmr_addhar_no; ?>"/>
            </div>
        </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg btn-block" name="update_profile">Update</button>
    </form>
</div>

<?php 

if(isset($_POST['update_profile'])){

    $fmr_name = $_POST['fmr_name'];
    $fmr_contact = $_POST['fmr_contact'];
    $fmr_dob = $_POST['fmr_dob'];
    $fmr_address = $_POST['fmr_address'];
    $fmr_city = $_POST['fmr_city'];
    $fmr_pincode = $_POST['fmr_pincode'];
    $fmr_state = $_POST['fmr_state'];
    $fmr_pan_no = $_POST['fmr_pan_no'];
    $fmr_addhar_no = $_POST['fmr_addhar_no'];

    $update_fmr_profile = "update fmr_users set fmr_name='$fmr_name',
                                                fmr_contact='$fmr_contact',
                                                fmr_dob='$fmr_dob',
                                                fmr_address='$fmr_address',
                                                fmr_city='$fmr_city',
                                                fmr_pincode='$fmr_pincode',
                                                fmr_state='$fmr_state',
                                                fmr_pan_no='$fmr_pan_no',
                                                fmr_addhar_no='$fmr_addhar_no'
                                                where fmr_email='$fmr_email'";
    $run_update_fmr_profile = mysqli_query($con,$update_fmr_profile);

    if($run_update_fmr_profile){

        echo "<script>alert('Details Updated')</script>";
        echo "<script>window.open('index.php?profile','_self')</script>";

    }else{

        echo "<script>alert('Update Failed Try Again')</script>";
        echo "<script>window.open('index.php?profile','_self')</script>";

    }
}

?>
