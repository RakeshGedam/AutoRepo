<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css" media="all" />
    <!-- If you use:<link rel="stylesheet" href="styles/login.css" media="print" />then the styles in login.css will only apply when someone prints the webpage. These styles will not affect the screen view when browsing normally. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <!-- 13 -->
    <div class="container">
        <form action="" method="post" class="form-login">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" name="admin_email" placeholder="Email" class="form-control" required>
            <input type="password" name="admin_pass" id="admin_pass" placeholder="Password" class="form-control" required>
            <input type="checkbox" onclick="togglePassword()"> Show Password


            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Log In</button>
            <h4 class="forgot-password">
                <a href="forgot_password.php">Lost your password? Forgot Password</a>
            </h4>
        </form>
    </div>
    <script>
       function togglePassword() {
        let passwordField = document.getElementById("admin_pass");
        passwordField.type = passwordField.type === "password" ? "text" : "password";
    }
    
    
    </script>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
    $get_admin = "select * from admins where admin_email = '$admin_email' AND admin_pass = '$admin_pass'";

    $run_admin = mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if ($count == 1) {
        $_SESSION['admin_email'] = $admin_email;
        echo "<script>alert('You are Logged')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    } else {
        echo "<script>alert('Invalid Email Id or Password❗')</script>";
    }
}
?>