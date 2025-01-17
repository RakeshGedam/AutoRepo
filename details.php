<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<?php
if (isset($_GET['pro_id'])){
    $pro_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id = '$pro_id'";
    $run_product = mysqli_query($con,$get_product);
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
    $run_p_cat = mysqli_query($con,$get_p_cat);
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

    <div id="content"><!--21starts-->
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                    <li>Shop</li>
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title?></a>
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
                                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive" alt="ProductImage1">
                                            </center>
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive" alt="ProductImage2">
                                            </center>                                       
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive" alt="ProductImage3">
                                            </center>                                       
                                        </div>
                                        <div class="item">
                                            <center>
                                                <img src="admin_area/product_images/<?php echo $p_img4 ?>" class="img-responsive" alt="ProductImage4">
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
                                <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
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
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Fuel Type</label>
                                        <div class="col-md-7">
                                            <select name="fuel_type" class="form-control">
                                                <option>Select Fuel Type</option>
                                                <option>Petrol </option>
                                                <option>Diesel </option>
                                                <option>Electric </option>
                                                <option>Hybrid </option>
                                                <option>CNG</option>
                                            </select><!--Product_size=fuel_type-->
                                        </div>
                                    </div>
                                    <p class="price">INR <?php echo number_format($p_price, 2); ?></p> <!--changed format <p class="price">INR <*php echo $p_price ?></p>-->
                                    <p class="text-center buttons">
                                        <button class="btn btn-primary" type="submit">
                                        <i class="fa-solid fa-car"></i> Add to Cart
                                        </button>
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
                    
                    <div class="box" id="details">
                        <h4>Produc Details</h4>
                        <pre style="white-space: pre-wrap; font-size: 1.71rem; background-color: #f8f8f8; word-break: keep-all;font-family: Times New Roman, serif;"><?php echo $p_desc ?></pre><!--Used Pre instead of p-->
                        <h4>Fuel Type</h4>
                        <ul>
                            <li>Petrol</li>
                            <li>Diesel</li>
                            <li>Electric</li>
                            <li>Hybrid</li>
                            <li>CNG</li>
                        </ul>
                    </div>
                    <div id="row same-height-row"><!--32 start-->
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height headline">
                                <h3 class="text-center">You May Also Like</h3>                          
                            </div>
                        </div>
                        <?php
                            $get_product = "select * from products order by 1 LIMIT 0,3";
                            $run_product = mysqli_query($con,$get_product);
                            while($row=mysqli_fetch_array($run_product)){
                                $pro_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_price = $row['product_price'];
                                $product_img1 = $row['product_img1'];

                                echo"
                                    <div class='center-responsive col-md-3 col-sm-6'>
                                        <div class='product same-height'>
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$product_img1' class='img-responsive' alt='AutoHub.com'>
                                                <div class='text'>
                                                <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                                                <p class='price'>" . number_format($product_price, 2) ."</p>
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