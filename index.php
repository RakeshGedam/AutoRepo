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
                <a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
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
                <a class="navbar-brand home" href="../index.php">
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
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
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
    <div class="container" id="slider"><!--conatiner Starts-10-->
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel"><!--carousel slide start-->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li><!--Extra💬wn-->
                    <li data-target="#myCarousel" data-slide-to="5"></li><!--Extra💬wn-->
                </ol>
                <div class="carousel-inner"><!--carousel-inner start-->
                    <?php //--Dynamic Slider starts--
                    $get_slider =  "select * from slider LIMIT 0,1";
                    $run_slider = mysqli_query($con,$get_slider);
                    while($row=mysqli_fetch_array($run_slider)){
                        $slider_name = $row['slider_name'];
                        $slider_image = $row['slider_image'];
                        echo "<div class='item active'>
                        <img src='admin_area/slider_images/$slider_image'>                        
                        </div>
                        ";
                    }

                    ?>

                    <?php 
                    $get_slider =  "select * from slider LIMIT 1,5";
                    $run_slider = mysqli_query($con,$get_slider);
                    while($row=mysqli_fetch_array($run_slider)){
                        $slider_name = $row['slider_name'];
                        $slider_image = $row['slider_image'];
                        echo "
                        <div class='item'>
                        <img src='admin_area/slider_images/$slider_image'>                        
                        </div>
                        ";
                    }

                    ?>

                    <!--1 Dynamic Slider ends -->
                </div><!--carousel-inner Ends-->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--11-->
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--11-->
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!--carousel slide Ends-->

        </div>
    </div><!--conatiner Ends-->
    <div id="advantage"><!--Start13-->
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                        <i class="fa-regular fa-money-bill-1"></i>
                        </div>
                        <h3><a href="#">BEST PRICE</a></h3>
                        <p>We encourage you to compare – our prices are designed to provide the best value in the market.</p>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                        <i class="fa-solid fa-users"></i>
                        </div>
                        <h3><a href="#">Verified Customers</a></h3>
                        <p>We ensures users interact with trusted individuals and reduces the risk of fraudulent activities</p>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#">LOREM</a></h3>
                        <p>Lorem ipsum dolor sit amet adipisicing elit. Vitae debitis commodi expedita in deleniti omnis.</p>

                    </div>
                </div>
            </div>

        </div>
    </div><!--End13-->
    <div  id="hotbox">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>New Arivals!</h2>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container">
        <div class="row">
            <?php
                getPro();
            ?>
                      
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