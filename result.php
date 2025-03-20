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

                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome Guest";
                    } else {
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
                        <li class="active">
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
                    <li>Shop</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <?php
                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat_id'])) {
                        echo "<div class='box'>
                                     <h2 class='display-5 font-weight-bold'>Hey, Welcome to AutoHub!</h2>
                                     <p class='lead'>Explore our <span class='font-weight-bold text-success'>wide range of vehicles</span>, from sleek cars to powerful bikes and beyond. Whether you're looking for something <strong>new</strong> or <strong>pre-owned</strong>, we've got you covered!</p>
                                </div>
                            ";
                    }
                }

                ?>

<?php
if (isset($_GET['search'])) {
    $search_query = $_GET['user_query'];
    $get_product = "select * from products where product_keywords like '%$search_query%'";
    $run_product = mysqli_query($con, $get_product);

    $no_results_found = true; // Added: Flag to track if products are found

    while ($row_product = mysqli_fetch_array($run_product)) {
        $no_results_found = false; // Updated: Set flag to false if at least one product is found

        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img1 = $row_product['product_img1'];

        echo "
            <div class='col-md-4 col-sm-6 center-responsive'style='display: flex; flex-direction: column; justify-content: space-between;'>
                <div class='product'style='display: flex; flex-direction: column; justify-content: space-between; height: 100%;'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive' alt=''style='width: 100%; height: 260px; object-fit: cover;'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'>INR " . number_format($pro_price, 2) . "</p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                        </p>
                    </div>
                </div>
            </div>
        ";
    }

    // Added: Display message and image if no products are found
    if ($no_results_found) {
        echo "
            <div class='col-md-12 text-center'>
                <h2 class='text-danger'>No Results Found</h2>
                <p class='lead'>Sorry, we couldn't find any products matching to <span class='text-muted'>'$search_query'</span>.</p>
                <img src='images/NoResultsFound.gif' alt='No Results Found' class='img-responsive' style='max-width: 400px; margin: 0 auto;'>
            </div>
        ";
    }
}
?>



                <?php
                getCatPro();
                getManPro()
                    ?>

            </div>

        </div>
    </div><!--21Ends-->

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>