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
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href = 'checkout.php'>My Account</a>";
                            }else{
                                echo "<a href = 'customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li class="active">
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
                    <li>Cart</li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart-form-data">
                        <h1>Shopping Cart</h1> 
                        <?php 
                        $ip_add = getUserIP();
                        $select_cart = "select * from cart where ip_add = '$ip_add'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $count = mysqli_num_rows($run_cart);                                                
                        ?>                       
                        <p class="text-muted">Currently you have <?php echo $count; ?> item(s) in your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Fule type</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="1">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                        while($row = mysqli_fetch_array($run_cart)){
                                            $pro_id = $row['p_id'];
                                            $pro_type = $row['fuel_type'];
                                            $pro_qty = $row['qty'];
                                            $get_product = "select * from products where product_id = '$pro_id'";
                                            $run_pro = mysqli_query($con,$get_product);

                                    while($row = mysqli_fetch_array($run_pro)){
                                        $p_title = $row['product_title'];
                                        $p_img1 = $row['product_img1'];
                                        $p_price = $row['product_price'];
                                        $sub_total = $row['product_price']*$pro_qty;
                                        $total += $sub_total; //

                                         

                                                
                                        

                                    ?>
                                    <tr>
                                        <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                                        <td><?php echo $p_title ?></td>
                                        <td><?php echo $pro_qty ?></td>
                                        <td><?php echo number_format($p_price, 2); ?></td>
                                        <td><?php echo $pro_type ?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                        <td><?php echo number_format($sub_total, 2); ?></td>
                                    </tr>
                                        <?php } } ?>
                                        </tbody>                                    
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer"><!--36-->
                            <div class="pull-left">
                                <h4>Total Price:</h4>
                            </div>
                            <div class="pull-right">
                                    <h4><?php echo number_format($total,2); ?></h4>
                            </div>
                        </div>
                        <div class="box-footer"><!--37Starts-->
                            <div class="pull-left">
                                <a href="shop.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                    <i class="fa fa-refresh"></i> Update Cart
                                </button>                                
                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed to Checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div><!--37Ends-->
                    </form>
                </div>
                <?php
                    function update_cart(){
                        global $con;
                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from cart where p_id = '$remove_id'";
                                $run_del = mysqli_query($con,$delete_product);
                                if($run_del){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }                                
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
                ?>
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
                            $dispatch_days = mt_rand(2, 10);

                            echo "
                                    <div class='center-responsive col-md-3 col-sm-6'>
                                        <div class='product same-height' style='display: flex; flex-direction: column; justify-content: space-between; height: 100%;'>
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$product_img1' class='img-responsive' alt='AutoHub.com'>
                                                <div class='text'>
                                                <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                                                <center><span class='small text-muted'>Usually dispatches in $dispatch_days days</span></center>
                                                <p class='price'>" . number_format($product_price, 2) . "</p>
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                ";


                        }
                        ?>

                    </div>
            </div>
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    <p class="text-muted">
                    Shipping and additional costs are calculated based on the selected products.
                    </p>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <th>INR <?php echo number_format($total, 2); ?></th>
                                </tr>
                                <tr>
                                    <td>Shipping and Handeling</td>
                                    <td>INR 0</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>INR 0</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>INR <?php echo number_format($total, 2); ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            </div>
    </div><!--21Ends-->
    <?php
        $_SESSION['cart_total'] = $total;        
    ?>

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>