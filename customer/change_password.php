<div class="box">
    <center>
        <h3>Change your Password <i class="fa-solid fa-unlock-keyhole"></i></h3>
    </center>
    <form method="post">
        <div class="form-group">
            <label>Enter Your Current Password</label>
            <input type="password" name="old_password" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter New Password</label>
            <input type="password" name="new_password" required="" class="form-control"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$"
                title="Password must be at least 6 characters long, contain an uppercase letter, a lowercase letter, a number.">
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="c_n_password" class="form-control">
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-lg" name="update" type="submit">
                Update Now
            </button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $c_email = $_SESSION['customer_email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $c_n_password = $_POST['c_n_password'];
    $select_cust = "select * from customers where customer_email = '$c_email' AND customer_pass = '$old_password'";
    $run_q = mysqli_query($con, $select_cust);
    $check_old_pass = mysqli_num_rows($run_q);
    if ($check_old_pass == 0) {
        echo "<script>alert('Please try again, Password entered is invalid❗')</script>";
        exit();
    }
    if ($new_password != $c_n_password) {
        echo "<script>alert('Please try again, New password`s does not match')</script>";
        exit();
    }

    $update_q = "update customers set customer_pass = '$new_password' where customer_email = '$c_email'";
    $run_q = mysqli_query($con, $update_q);
    echo "<script>alert('Password changed successfully!')</script>";
    echo "<script>window.open('logout.php','_self')</script>";
}
?>