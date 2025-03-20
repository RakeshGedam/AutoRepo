<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("functions/functions.php");
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        $due_amount = $_GET['due_amount'];
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
                    <a href="../cart.php">Total Cart Value: INR <strong><?php totalPrice(); ?></strong> | Items <strong><?php item(); ?></strong></a>
                </div>

                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="../customer_registration.php">Register</a>
                        </li>
                        <li>
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Goto Cart</a>
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
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Shop</a>
                            </li>
                            <li class="active">
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="../about.php">About us</a>
                            </li>
                            <li>
                                <a href="../services.php">Services</a>
                            </li>
                            <li>
                                <a href="../contactus.php">Contact Us</a>
                            </li>

                        </ul>

                    </div><!--padding nav Ends-->
                    <a href="../cart.php" class="btn btn-primary navbar-btn right">
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
                        <li>My Account</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                    include("includes/sidebar.php");
                    ?>
                </div>

                <div class="col-md-9"><!--47-->
                    <div class="box">
                        <h1 align="center">Please Confirm your payment</h1>
                        <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                                if (isset($_GET['order_id'])) {
                                    $order_id = $_GET['order_id'];
                                
                                $sel_inNo = "SELECT invoice_no FROM customer_order WHERE order_id = $order_id";
                                $run_query = mysqli_query($con, $sel_inNo);
                                $invoice_no = "";

                                if ($row = mysqli_fetch_assoc($run_query)) {
                                    $invoice_no = $row['invoice_no'];
                                }
                            }
                                ?>
                                <label>Invoice Number</label>
                                <input type="text" class="form-control" name="invoice_number"
                                    placeholder="Enter your invoice number" value="<?php echo $invoice_no ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Amount</label><br>
                                <span><i><input type="checkbox" id="tokenCheckbox"> Opt to pay a token amount (20% of the total)</i></span>
                                <input type="number" min="1" step="any" class="form-control" name="amount" id="amountInput"  value="<?php echo $due_amount ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Select Payment Mode</label>
                                <select class="form-control" name="payment_mode">
                                    <option>Credit and Debit Card Payments</option>
                                    <option>Digital Wallets</option>
                                    <option>UPI/Mobile Payments</option>
                                    <option>Bank Transfers</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Transaction Number</label>
                                <input type="text" class="form-control" name="trfr_number"  minlength="3" required="">
                            </div>
                            <div class="form-group">
                                <label>Payment Date</label>
                                <input type="date" class="form-control" name="date" required="">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                    Confirm Payment
                                </button>
                            </div>
                            <center><h3><a href="#">Pay Now</a></center>
                        </form>
                        <?php
                        if (isset($_POST['confirm_payment'])) {
                            $update_id = $_GET['update_id'];
                            $inovice_no = $_POST['invoice_number'];
                            $amount = $_POST['amount'];
                            $payment_mode = $_POST['payment_mode'];
                            $trfr_number = $_POST['trfr_number'];
                            $date = $_POST['date'];
                            $complete = "Complete";//Code removed from here and database
                    
                            $insert = "insert into payments (invoice_id, amount, payment_mode, ref_no, payment_date) values ('$inovice_no','$amount','$payment_mode','$trfr_number','$date')";
                            $run_insert = mysqli_query($con, $insert);
                            $update_q = "update customer_order set order_status = '$complete' where order_id = '$update_id'";
                            $run_update = mysqli_query($con, $update_q);
                            // $update_p = "update pending_order set order_status = '$complete' where order_id = '$update_id'";
                            // $run_update_q = mysqli_query($con,$update_p);
                    
                            echo "<script>alert('Your order has been received')</script>";
                            echo "<script>window.open('my_account.php?my_order','_self')</script>";

                        }
                        ?>
                    </div>
                </div><!--47Ends-->



            </div>
        </div><!--21Ends-->

        <!--Fotter Starts-->
        <?php
        include("includes/footer.php")
            ?>
        <!-- Footer ends -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
    document.getElementById("tokenCheckbox").addEventListener("change", function() {
        let amountInput = document.getElementById("amountInput");
        let dueAmount = <?php echo $due_amount; ?>;
        
        if (this.checked) {
            amountInput.value = Math.round(dueAmount * 0.2); 
        } else {
            amountInput.value = dueAmount;
        }
    });
</script>
    </body>

    </html>
<?php } ?>