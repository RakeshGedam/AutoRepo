<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHub - Automotive platform</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/slogo.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles\style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm59oj1r10qkasvbmmv5nntuu"></script> <!-- getbutton.io -->
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
<div id="top"> <!--TopBAr Start-->
        <div class="container"> <!--Container Start-->
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                <?php
                    
                    if(!isset($_SESSION['customer_email'])){
                        echo "Welcome Guest";
                    }
                    else{
                        echo "Welcome " . $_SESSION['customer_name'];//modified for name isntead of email 46
                    }
                ?>
                </a>
                <a href="cart.php">Total Cart Value: INR <strong><?php totalPrice(); ?></strong> | Items <strong><?php item(); ?></strong></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href = 'checkout.php'>My Account</a>";
                            }else{
                                echo "<a href = 'customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Goto Cart</a>
                    </li>
                    <li>
                    <?php
                            if(!isset($_SESSION['customer_email'])){    //47
                                echo "<a href='checkout.php'>Login<a/>";
                            }else{
                                echo "<a href='logout.php'>Logout</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div><!--Container End-->
    </div><!--TopBar End-->


    <div class="navbar navbar-default" id="navbar"><!--navbar start-->
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images\logo.png" alt="Site-logo" class="hidden-xs" id="midimg">
                    <img src="images\slogo.png" alt="smallSize-site-logo" id="idmidsimg" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navigation"><!--navbar header starts-->
                <div class="padding-nav"><!--padding nav start-->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <a href="checkout.php">My Account</a>
                        </li>
                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="about.php">About us</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>

                    </ul>

                </div><!--padding nav Ends-->
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>4 Items In Cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="result.php">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                            <span class="input-group-btn">
                                <button type="submit" value="search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div><!--navbar header ends-->
        </div>
    </div><!--navbar Ends-->

    <div id="content"><!--21starts-->
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                    <li>Registration</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            
            <?php
                if (!isset($_SESSION['customer_email'])) { 
                    echo '
            <div class="col-md-9"><!--40 starts--->
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Customer Registration</h2>
                        </center>
                    </div>
                    <div>
                        <!--Changed Customer Name ➔ Full Name,Customer Email ➔ Email Address,Customer Password ➔ Create Password, Contact Number ➔ Phone Number,-->
                        <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="c_name" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="c_email" class="form-control"
                                    required=""><!--Change type="text" to type="email"--->
                            </div>
                            <div class="form-group">
                                <label>Create Password</label>
                                <input type="password" name="c_password" required="" class="form-control"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$"
                                    title="Password must be at least 6 characters long, contain an uppercase letter, a lowercase letter, a number.">
                            </div>

                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="c_country" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="c_city" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="c_address" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="tel" name="c_contact" required=""
                                    class="form-control"><!--Changed type=text to type="tel"-->
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="c_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeMX98qAAAAAOIATKnBO9AxBDdQO2CB5SZu2MZa"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i>Register
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            ';
        }else {
            echo '
            <div id="registerPopup" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);z-index:9999;">
                <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:#fff;padding:20px;border-radius:5px;text-align:center;">
                    <h2>You have Already Registered</h2>
                    <p>Registration completed 😊, please visit <a href = "customer/my_account.php">MY ACCOUNT</a> section to view/edit your profile </p>
                    <button onclick="closePopup()" style="background:#4CAF50;color:#fff;padding:10px 20px;border:none;border-radius:4px;cursor:pointer;">Close</button>
                </div>
            </div>
            <script>
                function showPopup() {
                    document.getElementById("registerPopup").style.display = "block";
                }
                function closePopup() {
                    document.getElementById("registerPopup").style.display = "none";
                }
                window.onload = showPopup;
            </script>
            <br><br>            
            <center class="text-muted"><p>Registration Completed</p></center>
            <center><h1><a href ="./shop.php">Keep Shopping <i class="fa fa-shop"></i></a></h1></center>
            <br><br>
            <center><a href="./shop.php"><img class="img-responsive" src="images/regC.gif"  style="height:400px;"></a></center>
            <br><br>
   

            ';
        }
        

                
            ?>
        </div><!--40 Ends-->

    </div>
    </div>

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_password'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_tmp_image = $_FILES['c_image']['tmp_name'];
    $c_ip = getUserIP();

    // Check if email already exists
    $check_email = "SELECT * FROM customers WHERE customer_email = '$c_email'";
    $run_email = mysqli_query($con, $check_email);
    
    if (mysqli_num_rows($run_email) > 0) {
        echo "<script>alert('This email is already registered. Please use a different email.')</script>";
        echo "<script>window.open('customer_registration.php','_self')</script>";
        exit(); // Stop further execution
    }


    move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");

    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

    $run_customer = mysqli_query($con, $insert_customer);
    $sel_cart = "select * from cart where ip_add = '$c_ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart > 0) {
        $_SESSION['customer_name'] = $c_name; //extra-46
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('You`ve been registered sucessfully!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        $_SESSION['customer_email'] = $c_email;
        $_SESSION['customer_name'] = $c_name; // Modified to store the customer name in the session-46
        echo "<script>alert('You`ve been registered sucessfully!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }




}
?>