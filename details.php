<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id = '$pro_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $p_title = $row_product['product_title'];
    $p_price = $row_product['product_price'];
    $p_desc = $row_product['product_desc'];
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];
    $p_img4 = $row_product['product_img4'];

    $get_p_cat = "select * from product_category where p_cat_id = '$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_id = $row_p_cat['p_cat_id'];
    $p_cat_title = $row_p_cat['p_cat_title'];

}
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
    <style>
        body {
            background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.95)), url('admin_area/product_images/<?php echo $p_img1; ?>') !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
        }
    </style>

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
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title ?></a>
                    </li>
                    <li><?php echo $p_title ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainimage">
                            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1"></li>
                                    <li data-target="#mycarousel" data-slide-to="2"></li>
                                    <li data-target="#mycarousel" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img1 ?>"
                                                class="img-responsive" alt="ProductImage1">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img2 ?>"
                                                class="img-responsive" alt="ProductImage2">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img3 ?>"
                                                class="img-responsive" alt="ProductImage3">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img4 ?>"
                                                class="img-responsive" alt="ProductImage4">
                                        </center>
                                    </div>
                                </div>

                                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $p_title ?></h1>
                            <?php addCart(); ?>
                            <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post"
                                class="form-horizontal">
                                <!-- -->
                                <div class="form-group" <?php if ($pro_id != 6) {
                                    echo 'style="display: none;"';
                                } ?>>
                                    <label class="col-md-5 control-label">Number of Units</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" <?php if ($pro_id == 6) {
                                    echo 'style="display: none;"';
                                } ?>>
                                    <label class="col-md-5 control-label">Fuel Type</label>
                                    <div class="col-md-7">
                                        <select name="fuel_type" class="form-control" required>
                                            <option value="" disabled selected>Select Fuel Type</option>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="CNG">CNG</option>
                                            <?php if ($pro_id == 6)
                                                echo '<option value="N/A" selected >N/A</option>'
                                                    ?>
                                            </select>
                                        </div>
                                    </div>


                                    <p class="price">INR <?php echo number_format($p_price, 2); ?></p>
                                <!--changed format <p class="price">INR <*php echo $p_price ?></p>-->
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa-solid fa-car"></i> Add to Cart
                                    </button>
                                    <a href="testDrive.php?p_img1=<?php echo $p_img1; ?>&p_name=<?php echo $p_title; ?>"
                                        class="btn btn-info">
                                        <i class="fa-solid fa-car-tunnel"></i> Book Test Drive
                                    </a>
                                </p>
                            </form>
                        </div>
                        <div class="row"><!--Added class="row"-->
                            <div class="col-xs-3"><!--Changed col-xs-4 to col-xs-4" to add 4 img instead of 3-->
                                <a href="#" id="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#" id="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#" id="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#" id="thumb">
                                    <img src="admin_area/product_images/<?php echo $p_img4 ?>" class="img-responsive">
                                </a>
                            </div>
                        </div>


                    </div>


                </div>


                <div class='box' id='details'>
                    <h4>Product Details</h4>
                    <pre
                        style='white-space: pre-wrap; font-size: 1.71rem; background-color: #f8f8f8; word-break: keep-all;font-family: Times New Roman, serif;'><?php echo $p_desc ?>
                    </pre>

                    <div class="well"
                        style="background-color: #f9f9f9; border-radius: 8px; padding: 20px; max-width: 600px; margin: 30px auto;">

                        <form method="POST" class="form-inline" onsubmit="showResult(); return false;">
                            <div class="form-group">
                                <label for="pincode" style="margin-right: 10px;">Check expected delivery date:</label>
                                <input type="text" class="form-control" id="pincode" name="pincode"
                                    placeholder="Enter Pincode" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                                <i class="fa fa-search"></i> Check
                            </button>
                        </form>

                        <div id="result" class="alert alert-success" style="margin-top: 20px; display: none;">
                            <i class="fa fa-truck"></i> Expected Delivery Date: <strong>
                                <?php
                                $startDate = strtotime(date("Y-m-d"));
                                $endDate = strtotime("+1 month", $startDate);

                                $randomTimestamp = rand($startDate, $endDate);

                                $randomDate = date("d F Y (l)", $randomTimestamp); // Day Month Year (Weekday)
                                
                                echo $randomDate;
                                ?>
                            </strong>
                        </div>

                        <div id="error" class="alert alert-danger" style="margin-top: 20px; display: none;">
                            <i class="fa fa-exclamation-circle"></i> Please enter a valid 6-digit pincode.
                        </div>
                    </div>

                    <script>
                        function showResult() {
                            const pincode = document.getElementById('pincode').value.trim();
                            const resultDiv = document.getElementById('result');
                            const errorDiv = document.getElementById('error');

                            if (/^\d{6}$/.test(pincode)) {  // Ensures exactly 6 digits
                                resultDiv.style.display = 'block';
                                errorDiv.style.display = 'none'; // Hide error message if valid
                            } else {
                                resultDiv.style.display = 'none'; // Hide result if invalid
                                errorDiv.style.display = 'block'; // Show error message
                            }
                        }
                    </script>




                    <!-- Rating System -->

                    <div>
                        <?php
                        if ($pro_id != 6) {
                            // Generate the overall rating and percentage
                            $overall_rating = number_format(rand(60, 90) / 10, 1);
                            $circle_percentage = ($overall_rating / 10) * 100;

                            // Define rating categories
                            $categories = [
                                'Design' => rand(60, 85) / 10,
                                'Safety' => rand(65, 90) / 10,
                                'Comfort' => rand(70, 85) / 10,
                                'Performance' => rand(65, 90) / 10,
                                'Significance' => rand(75, 95) / 10,
                                'Value For Money' => rand(70, 90) / 10,
                                'Fuel Consumption' => rand(75, 95) / 10
                            ];
                        } else {
                            // If pro_id == 6, only display Value For Money
                            $overall_rating = number_format(rand(70, 90) / 10, 1);
                            $circle_percentage = ($overall_rating / 10) * 100;
                            $categories = ['Value For Money' => rand(70, 90) / 10];
                        }
                        ?>

                        <!-- Rating System -->
                        <div style='background-color: #f8f8f8; padding: 20px; border-radius: 10px; margin-top: 20px;'>
                            <div style='display: flex; align-items: center; margin-bottom: 20px;'>
                                <div style='position: relative; width: 120px; height: 120px; margin-right: 20px;'>
                                    <div
                                        style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;'>
                                        <span
                                            style='font-size: 24px; color: #00ff00;'><?php echo $overall_rating; ?></span>
                                    </div>
                                    <svg viewBox='0 0 36 36'
                                        style='width: 100%; height: 100%; transform: rotate(-90deg);'>
                                        <path
                                            d='M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831'
                                            fill='none' stroke='#444' stroke-width='3' />
                                        <path
                                            d='M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831'
                                            fill='none' stroke='#00ff00' stroke-width='3'
                                            stroke-dasharray='<?php echo $circle_percentage; ?>, 100' />
                                    </svg>
                                </div>
                                <div>
                                    <p style='margin: 5px 0;'>AutoXpert Score</p>
                                    <h3 style='margin: 0;'><?php echo $p_title; ?></h3>
                                </div>
                            </div>

                            <!-- Display the Ratings -->
                            <div style='display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;'>
                                <?php foreach ($categories as $category => $rating): ?>
                                    <div style='margin-bottom: 10px;'>
                                        <div style='display: flex; justify-content: space-between; margin-bottom: 5px;'>
                                            <span><?php echo $category; ?></span>
                                            <span style='color: #ffeb3b;'>★ <?php echo number_format($rating, 1); ?></span>
                                        </div>
                                        <div style='background-color: #444; height: 4px; border-radius: 2px;'>
                                            <div
                                                style='background-color: #ffeb3b; width: <?php echo ($rating * 10); ?>%; height: 100%; border-radius: 2px;'>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <br>
                        <p class='small text-muted'>Disclaimer: These ratings are derived from our evaluation
                            metrics and are intended for reference purposes only.
                            Actual performance may vary based on real-world conditions and individual user
                            experience.</p>
                    </div>






                </div>

                <div id="row same-height-row"><!--32 start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center text-warning">You May Also Like</h3>
                            <img src="images/ymal1.gif" class="img-responsive" alt="">
                        </div>
                    </div>
                    <?php
                    $get_product = "select * from products order by 1 LIMIT 0,3";
                    $run_product = mysqli_query($con, $get_product);
                    while ($row = mysqli_fetch_array($run_product)) {
                        $pro_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_price = $row['product_price'];
                        $product_img1 = $row['product_img1'];

                        echo "
                                    <div class='center-responsive col-md-3 col-sm-6'>
                                        <div class='product same-height'>
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$product_img1' class='img-responsive' alt='AutoHub.com'>
                                                <div class='text'>
                                                <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                                                <p class='price'>" . number_format($product_price, 2) . "</p>
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                ";


                    }
                    ?>

                </div><!--32Ends-->
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