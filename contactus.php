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
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm59oj1r10qkasvbmmv5nntuu"></script>
    <!-- getbutton.io -->

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

                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome Guest";
                    } else {
                        echo "Welcome " . $_SESSION['customer_name'];//modified for name isntead of email 46
                    }
                    ?>
                </a>
                <a href="cart.php">Total Cart Value: INR <strong><?php totalPrice(); ?></strong> | Items
                    <strong><?php item(); ?></strong></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href = 'checkout.php'>My Account</a>";
                        } else {
                            echo "<a href = 'customer/my_account.php?my_order'>My Account</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Goto Cart</a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {    //47
                            echo "<a href='checkout.php'>Login<a/>";
                        } else {
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
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href = 'checkout.php'>My Account</a>";
                            } else {
                                echo "<a href = 'customer/my_account.php?my_order'>My Account</a>";
                            }
                            ?>
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
                        <li class="active">
                            <a href="contactus.php">Contact Us</a>
                        </li>

                    </ul>

                </div><!--padding nav Ends-->
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> Items In Cart</span>
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
                    <li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>


            <div class="col-md-9">
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<center><h2 class='text-muted'>Please Log in to Contact Us. <img src='images/down.gif' alt='Down Arrow' width='30'></h2></center>";
                    include('customer/customer_login.php');
                } else {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <h2>Contact Us</h2>
                                <p class="text-muted">
                                    If you have any questions, feel free to reach out through our contact form.
                                    We're here to assist as promptly as possible.
                                </p>
                            </center>
                        </div>

                        <?php
                        if (isset($_POST['submit'])) {
                            $senderName = $_POST['name'];
                            $senderEmail = $_POST['email'];
                            $senderSubject = $_POST['subject'];
                            $senderMessage = $_POST['message'];

                            $insert_Q = "INSERT INTO contactus (CName, CEmail, subject, msg) 
                            VALUES ('$senderName', '$senderEmail', '$senderSubject', '$senderMessage')";
                            $run_query = mysqli_query($con, $insert_Q);

                            if ($run_query) {
                                echo "<div id='successMessage' class='alert alert-success text-center'>
                            <strong>Success!</strong> Your message has been sent successfully. Thank you for contacting AutoHub!
                          </div>";
                            }
                        }
                        ?>

                        <div>
                            <form action="contactus.php" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" required=""
                                        value="<?php echo $_SESSION['customer_name']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo $_SESSION['customer_email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Your Message</label>
                                    <textarea name="message" class="form-control" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-envelope"></i> Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div><!--40 Ends-->

    </div>
    </div>

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        setTimeout(function () {
            $('#successMessage').fadeOut('slow');
        }, 3500);
    </script>

</body>

</html>