<?php
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    $admin_session = $_SESSION['admin_email'];
    
    $get_admin = "select * from admins where admin_email='$admin_session'";
    $run_admin = mysqli_query($con, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_eamil = $row_admin['admin_email'];
    $admin_image = $row_admin['admin_image'];
    $admin_country = $row_admin['admin_country'];
    $admin_job = $row_admin['admin_job'];
    $admin_contact = $row_admin['admin_contact'];
    $admin_about = $row_admin['admin_about'];

    $get_pro = "select * from products";
    $run_pro = mysqli_query($con, $get_pro);
    $count_pro = mysqli_num_rows($run_pro);

    $get_cust = "select * from customers";
    $run_cust = mysqli_query($con, $get_cust);
    $count_cust = mysqli_num_rows($run_cust);

    $get_p_cat = "select * from product_category";
    $run_p_cat = mysqli_query($con, $get_p_cat);    
    $count_p_cat = mysqli_num_rows($run_p_cat);

    $get_order = "select * from customer_order";
    $run_order = mysqli_query($con, $get_order);    
    $count_order = mysqli_num_rows($run_order);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/slogo.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm58dt1rq0ivwsvbm49aseuuk"></script>
</head>
<body>
    <div id="wrapper">
    <div class="col-lg-2 col-md-2">
        <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-lg-10 col-md-10">
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['dashboard'])){
                        include 'dashboard.php';  //location changed to `dashboard.php` from `C:/xampp/htdocs/AutoRepo/admin_area/d10ashboard.php`
                    }if(isset($_GET['insert_product'])){
                        include 'insert_product.php';
                    }
                    if(isset($_GET['view_product'])){
                        include 'view_product.php';
                    }if(isset($_GET['delete_product'])){
                        include 'delete_product.php';
                    }if(isset($_GET['edit_product'])){
                        include 'edit_product.php';
                    }if(isset($_GET['insert_product_cat'])){
                        include 'insert_p_cat.php';
                    }if(isset($_GET['view_product_cat'])){
                        include 'view_p_cat.php';
                    }if(isset($_GET['delete_p_cat'])){
                        include 'delete_p_cat.php';
                    }if(isset($_GET['edit_p_cat'])){
                        include 'edit_p_cat.php';
                    }if(isset($_GET['insert_manufacturer'])){
                        include 'insert_manufacturer.php';
                    }if(isset($_GET['view_manufacturer'])){
                        include 'view_manufacturer.php'; 
                    }if(isset($_GET['delete_manufacturer'])){   
                        include 'delete_manufacturer.php';
                    }if(isset($_GET['edit_manufacturer'])){
                        include 'edit_manufacturer.php';
                    }if(isset($_GET['insert_slider'])){
                        include 'insert_slider.php';
                    }if(isset($_GET['view_slider'])){
                        include 'view_slider.php';
                    }if(isset($_GET['delete_slider'])){
                        include 'delete_slider.php';
                    }if(isset($_GET['edit_slider'])){
                        include 'edit_slider.php';
                    }if(isset($_GET['view_customer'])){
                        include 'view_customer.php';
                    }if(isset($_GET['delete_customer'])){
                        include 'delete_customer.php';
                    }if(isset($_GET['view_order'])){
                        include 'view_order.php';
                    }if(isset($_GET['delete_order'])){
                        include 'delete_order.php';
                    }if(isset($_GET['view_payments'])){
                        include 'view_payments.php';
                    }if(isset($_GET['payment_delete'])){
                        include 'payemnt_delete.php';
                    }if(isset($_GET['insert_user'])){
                        include 'insert_user.php';
                    }if(isset($_GET['view_users'])){
                        include 'view_users.php';
                    }if(isset($_GET['delete_user'])){
                        include 'delete_user.php';
                    }if(isset($_GET['user_profile'])){
                        include 'user_profile.php';
                    }if(isset($_GET['view_queries'])){
                        include 'view_queries.php';
                    }if(isset($_GET['delete_query'])){
                        include 'delete_query.php';
                    }

                ?>
            </div>
                  </div>      
        </div>
    </div>


</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php } ?>