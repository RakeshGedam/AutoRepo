<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<?php
if (isset($_GET['user_profile'])) {
        $edit_id = $_GET['user_profile'];
        $get_admin = "select * from admins where admin_id='$edit_id'";
        $run_admin = mysqli_query($con, $get_admin);
        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];
        $admin_email = $row_admin['admin_email'];
        $admin_image = $row_admin['admin_image'];
        $admin_country = $row_admin['admin_country'];
        $admin_job = $row_admin['admin_job'];
        $admin_contact = $row_admin['admin_contact'];
        $admin_about = $row_admin['admin_about'];
        $admin_pass = $row_admin['admin_pass'];
}
        ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Profile
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-user"></i> Edit Your Profile
                </h3>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_name; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email</label>
                        <div class="col-md-6">
                            <input type="email" name="admin_email" class="form-control" value="<?php echo $admin_email; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password</label>
                        <div class="col-md-6">
                            <input type="password" name="admin_pass" value="$admin_pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image</label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control">
                            <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control" value="<?php echo $admin_country; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Job</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control" value="<?php echo $admin_job; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" value="<?php echo $admin_contact; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User About</label>
                        <div class="col-md-6">
                            <textarea name="admin_about" class="form-control" rows="3" required><?php echo $admin_about; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="update" value="Update Profile" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <?php
        if (isset($_POST['update'])) {
            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_pass = $_POST['admin_pass'];
            $admin_image = $_FILES['admin_image']['name'];
            $temp_admin_image = $_FILES['admin_image']['tmp_name'];
            $admin_country = $_POST['admin_country'];
            $admin_job = $_POST['admin_job'];
            $admin_contact = $_POST['admin_contact'];
            $admin_about = $_POST['admin_about'];

            if (empty($admin_image)) {
                $admin_image = $row_admin['admin_image'];
            } else {
                move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
            }

            $update_admin = "update admins set admin_name='$admin_name', admin_email='$admin_email', admin_pass='$admin_pass', admin_image='$admin_image', admin_country='$admin_country', admin_job='$admin_job', admin_contact='$admin_contact', admin_about='$admin_about' where admin_id='$admin_id'";

            $run_admin = mysqli_query($con, $update_admin);

            if ($run_admin) {
                echo "<script>alert('User profile has been updated successfully')</script>";
                echo "<script>window.open('index.php?view_users','_self')</script>";
                session_destroy();
            }
        }
    
    
    ?>


<?php } ?>