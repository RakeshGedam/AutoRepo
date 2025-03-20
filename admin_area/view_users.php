<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Users
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users"></i> View Users
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Image</th>
                                <th>User Country</th>
                                <th>User Job</th>
                                <th>User Contact</th>
                                <th>User About</th>
                                <th>Delete User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $get_users = "select * from admins";
                            $run_users = mysqli_query($con, $get_users);
                            while ($row_users = mysqli_fetch_array($run_users)) {
                                $admin_id = $row_users['admin_id'];
                                $admin_name = $row_users['admin_name'];
                                $admin_email = $row_users['admin_email'];
                                $admin_image = $row_users['admin_image'];
                                $admin_country = $row_users['admin_country'];
                                $admin_job = $row_users['admin_job'];
                                $admin_contact = $row_users['admin_contact'];
                                $admin_about = $row_users['admin_about'];
                            ?>
                                <tr>
                                    <td><?php echo $admin_id; ?></td>
                                    <td><?php echo $admin_name; ?></td>
                                    <td><?php echo $admin_email; ?></td>
                                    <td><img src="admin_images/<?php echo $admin_image; ?>" width="50" height="50"></td>
                                    <td><?php echo $admin_country; ?></td>
                                    <td><?php echo $admin_job; ?></td>
                                    <td><?php echo $admin_contact; ?></td>
                                    <td><?php echo $admin_about; ?></td>
                                    <td>
                                        <a onclick="return confirm('Are you sure you want to delete this User?');" href="delete_user.php?delete_user=<?php echo $admin_id; ?>">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>