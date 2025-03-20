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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script> <!-- Included Razorpay Checkout.js library-->
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
                        <li>
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
                    <li>Checkout</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9"><!--start49-->
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    include('customer/customer_login.php');
                } else {
                    include('payment_options.php');
                    $total = $_SESSION['cart_total'];
                }
                ?>
            </div><!--49Ends-->

        </div>
    </div>

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#pay").click(function () {
                $.ajax({
                    type: "POST",
                    url: "rzorder.php",
                    data: { total: <?php echo $total; ?> },
                    success: function (res) {
                        var order_id = JSON.parse(res).order_id;
                        var amount = JSON.parse(res).amount;
                        startPayment(order_id, amount);
                    }
                })
            });
        });


        function startPayment(order_id, amount) {
            var options = {
                key: "rzp_test_mMtBOgqeUSW0Rx", // Enter the Key ID generated from the Dashboard
                amount: amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                currency: "INR",
                name: "AutoHub",
                description: "Automotive Platform",
                image: "http://localhost/AutoRepo/images/logo.png",
                order_id: order_id, // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                prefill: {
                    name: "<?php echo $_SESSION['customer_name']; ?>",
                    email: "<?php echo $_SESSION['customer_email']; ?>",
                    contact: "9000090000"
                },
                notes: {
                    address: "-------------Razorpay Corporate Office---------"
                },
                theme: {
                    "color": "#3399cc"
                }, "handler": function (response) {
                    
                    window.location.href = 'order.php?c_id=<?php echo "$customer_id"; ?>';



                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
            rzp.on('payment.failed', function (response){            
            alert(response.error.reason);
       
});
        }


    </script>
</body>

</html>