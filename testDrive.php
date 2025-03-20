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
    <style>
        body {

            background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.95)),
                url('admin_area/product_images/<?php if (isset($_GET['p_img1'])) {
                                                    echo htmlspecialchars($_GET['p_img1']);
                                                } ?>') !important;
            background-size: cover;
            background-position: center;
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
                        echo "Welcome " . $_SESSION['customer_name']; //modified for name isntead of email 46
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
                    <li>
                        <?php
                        if (isset($_GET['p_name'])) {
                            $p_name = $_GET['p_name']; // Define and sanitize the variable
                            echo $p_name;
                        }
                        ?>
                    </li>

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
                    echo "<div class='box'><!--50-->
                <div class='box-header'>
                    <center>
                        <h2>Login</h2>
                        <p class='lead'>Welcome back to AutoHub!</p>
                    </center>        
                </div>
                <form action='testDrive.php' method='post'>
                    <div class='form-group'>
                        <label>Email Id:</label>
                        <input type='text' class='form-control' name='c_email' required=''>
                    </div>
                    <div class='form-group'>
                        <label>Password:</label>
                        <input type='password' class='form-control' name='c_password' required=''>
                    </div>
                    <div class='text-center'>
                        <button name='login' value='Login' class='btn btn-primary btn-block'>
                            <i class='fa fa-sign-in'></i> Log In
                        </button>
                    </div>
                </form>
                <center>
                    <a href='customer_registration.php'>
                        <h5>New to AutoHub? Create an account here.</h5>
                    </a>
                </center>
            </div>";


                    if (isset($_POST['login'])) {
                        $customer_email = $_POST['c_email'];
                        $customer_password = $_POST['c_password'];

                        $select_customers = "select * from customers where customer_email = '$customer_email' AND customer_pass = '$customer_password'";
                        $run_cust = mysqli_query($con, $select_customers);
                        $get_ip = getUserIP();
                        $check_customer = mysqli_num_rows($run_cust);

                        $select_cart = "select * from cart where ip_add = '$get_ip'";
                        $run_cart = mysqli_query($con, $select_cart);
                        $check_cart = mysqli_num_rows($run_cart);

                        if ($check_customer == 0) {
                            echo "<script>alert('Inavlid Email-ID or Password')</script>";
                            exit();
                        }

                        $customer_data = mysqli_fetch_assoc($run_cust); //extra
                        $_SESSION['customer_name'] = $customer_data['customer_name']; // Store name in session,Extra

                        if ($check_customer == 1) {
                            $_SESSION['customer_email'] = $customer_email;
                            echo "<script>alert('Successfully Logged In')</script>";
                            echo "<script>window.open('testDrive.php', '_self');</script>";
                        }
                    }
                } else {
                ?>

                    <form id="testDriveForm" class="p-3 border rounded shadow-sm">
                        <div class="form-group mb-3">
                            <label for="license" class="form-label fw-bold">License Number <i class="fa-solid fa-id-card"></i></label>
                            <input type="text" id="license" name="license" placeholder="e.g. MH-22-ABCD-1234567" pattern="/^[A-Za-z]{2}[-\s]?\d{2}[-\s]?\d{11}$/"
                                class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?php echo $_SESSION['customer_email']; ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="date" class="form-label fw-bold">Pick a Slot <i class="fa-solid fa-calendar-days"></i></label>
                            <select id="date" name="date" class="form-control" required>
                                <option value="" disabled selected>Available Slots</option>
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    $randomDays = rand(1, 30);
                                    $randomDate = date('d-m-Y', strtotime("+$randomDays days"));
                                    echo "<option value='$randomDate'>$randomDate</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="button" id="bookTestDriveBtn" class="btn btn-info px-4">
                                <i class="fa fa-car"></i> Book Test Drive
                            </button>
                        </div>
                    </form>

                    <br><br>
                    <div id="successMessage" class="alert alert-success text-center mt-3" style="display: none;">
                        <h4><strong>You are welcome to visit the following locations for your scheduled test drive.</strong><br> Kindly visit the following locations to experience a test drive</h4>
                    </div>

                    <div id="showroomLocations" style="display: none; margin-top: 20px;">
                    <div class="alert alert-info text-center mt-3">
                        <h3>Your Token Number is: <strong><?php $randomNumber = rand(); echo $randomNumber; ?></strong></h4>
                        <p class='small text-muted'>Please take a note this token number for future reference.</p>
                    </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120562.22884169985!2d72.71907519726562!3d19.213989900000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b9470158439f%3A0x7e5f400faf4d4440!2sCar%20Planet%20Wheels!5e0!3m2!1sen!2sin!4v1742390565842!5m2!1sen!2sin"
                                            width="100%" height="225" style="border:0;" allowfullscreen
                                            loading="lazy"></iframe>
                                        <p><strong>Car Planet Wheels</strong><br>Rustomjee Urbania, Thane West - 400607</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7535.46349551728!2d72.9626020935791!3d19.206915399999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b93fae61eccf%3A0xc9eb0cc28d83cf0f!2sCar%20Galaxy!5e0!3m2!1sen!2sin!4v1742390428028!5m2!1sen!2sin"
                                            width="100%" height="225" style="border:0;" allowfullscreen
                                            loading="lazy"></iframe>
                                        <p><strong>Car Galaxy</strong><br>Hiranandani Estate, Ghodbunder Road - 400615</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241417.7950078948!2d72.52167479453128!3d19.012976500000025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63b86059063%3A0x25aa09855d3281f6!2sTata%20Motors%20Cars%20Showroom%20-%20Inderjit%20Cars%2C%20Andheri%20West!5e0!3m2!1sen!2sin!4v1742390186800!5m2!1sen!2sin"
                                            width="100%" height="225" style="border:0;" allowfullscreen
                                            loading="lazy"></iframe>
                                        <p><strong>Tata Motors</strong><br>Infiniti Mall Parking Lot, Andheri West - 400058
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60271.0487796083!2d73.07145104863281!3d19.241422600000025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7942592cfffcb%3A0x3b4bdd7c9b8c43a3!2sMaruti%20Suzuki%20ARENA%20(Aher%20Autoprime%2C%20Kalyan%2C%20Kalyan-Murbad%20Road)!5e0!3m2!1sen!2sin!4v1742390302828!5m2!1sen!2sin"
                                            width="100%" height="225" style="border:0;" allowfullscreen
                                            loading="lazy"></iframe>
                                        <p><strong>Maruti Suzuki ARENA</strong><br>Metro Junction Mall, Kalyan East - 421306
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15071.00883747579!2d73.08922298715818!3d19.206022200000017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be795b972ab5833%3A0x1213f47337721aee!2sMahindra%20Randhawa%20Motors%20-%20SUV%20Showroom!5e0!3m2!1sen!2sin!4v1742390376545!5m2!1sen!2sin"
                                            width="100%" height="225" style="border:0;" allowfullscreen
                                            loading="lazy"></iframe>
                                        <p><strong>Mahindra Randhawa Motors</strong><br>Lodha Palava City, Dombivli - 421204
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } ?>

        </div>
    </div><!--21Ends-->

    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
    ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('bookTestDriveBtn').addEventListener('click', function() {
    const license = document.getElementById('license').value.trim();
    const date = document.getElementById('date').value;

    // License format validation
    const licensePattern = /^[A-Za-z]{2}[-\s]?\d{2}[-\s]?\d{11}$/;
    if (!license.match(licensePattern)) {
        alert("Please enter a valid license number (e.g., MH-22-ABCD-1234567)");
        return;
    }

    if (!date) {
        alert("Please select a date before proceeding.");
        return;
    }

    // Display showroom locations and success message
    document.getElementById('showroomLocations').style.display = 'block';
    const successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';

    // Auto-hide the message after 3 seconds
    setTimeout(() => {
        successMessage.style.display = 'none';
    }, 12000);
});

    </script>
</body>


</html>