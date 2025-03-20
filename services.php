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
    <link rel="stylesheet" href="styles/style.css">
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm59oj1r10qkasvbmmv5nntuu"></script> <!-- getbutton.io -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm58dt1rq0ivwsvbm49aseuuk"></script>
</head>

<style>
   .hEpan {
       transition: all 0.3s ease; /* Apply transition to the base class */
}

.hEpan:hover {
    
    box-shadow: 15px 12px 20px rgba(0, 0, 0, 0.25);    
}

.ES-hEpan:hover{
    background-color:rgba(242, 222, 222, 0.55);

}

</style>

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
                        <li class="active">
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

    <div class="" id="content"><!--21starts-->
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>


            <!-- ---------------------------------- -->

            <div class="container">
                <div class="row">
                    <!-- Vehicle Information -->
                    <div class="col-md-6 ">
                        <div class="panel panel-primary hEpan">
                            <div class="panel-heading">
                                <h3 class="panel-title">Vehicle Information  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="vehicle_number" class="col-sm-4 control-label">Enter Vehicle
                                            Number:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" placeholder="e.g : MH 05 EF 2950" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-info">Get Information <i
                                                    class="fa fa-info-circle"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $vehicle_number = $_POST["vehicle_number"];

                                    $curl = curl_init();

                                    curl_setopt_array($curl, [
                                        CURLOPT_URL => "https://vehicle-rc-information.p.rapidapi.com/api/" . urlencode($vehicle_number),
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "GET",
                                        CURLOPT_HTTPHEADER => [
                                            "x-rapidapi-host: vehicle-rc-information.p.rapidapi.com",
                                            "x-rapidapi-key: 2bc04278b5mshb8642dfa95982b3p1d3de1jsn3392030065c1"
                                        ],
                                    ]);

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                        echo '<div class="alert alert-danger" role="alert">Error: ' . htmlspecialchars($err) . '</div>';
                                    } else {
                                        $data = json_decode($response, true);

                                        echo '<h4>Vehicle Details:</h4>';
                                        echo '<table class="table table-striped">';
                                        echo '<tbody>';
                                        foreach ($data as $key => $value) {
                                            echo '<tr>';
                                            echo '<th>' . htmlspecialchars($key) . '</th>';
                                            echo '<td>' . htmlspecialchars($value) . '</td>';
                                            echo '</tr>';
                                        }
                                        echo '</tbody>';
                                        echo '</table>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Combined EV Charging Stations and Petrol Pumps -->
                    <div class="col-md-6">
                        <div class="panel panel-success hEpan">
                            <div class="panel-heading">
                                <h3 class="panel-title">Find Nearby Stations <i class="fa-solid fa-map-location-dot"></i></h3>
                            </div>
                            <div class="panel-body">
                                <form id="stationSearchForm" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="location" class="col-sm-2 control-label">Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="location" name="location"
                                                placeholder="Enter city or location" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" class="btn btn-primary" id="petrolButton">Find Fuel Pump
                                                <i class="fa-solid fa-gas-pump"></i></button>
                                            <button type="button" class="btn btn-success" id="evButton">Find EV
                                                Charging Stations <i class="fa-solid fa-charging-station"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const locationInput = document.getElementById('location');
                            const evButton = document.getElementById('evButton');
                            const petrolButton = document.getElementById('petrolButton');

                            function searchStations(stationType) {
                                const location = locationInput.value.trim();
                                if (location) {
                                    const searchTerm = stationType === 'ev' ? 'EV+charging+station' : 'petrol+pump';
                                    const url = `https://www.google.com/maps/search/${searchTerm}+${encodeURIComponent(location)}`;
                                    window.open(url, '_blank');
                                } else {
                                    alert('Please enter a location.');
                                }
                            }

                            evButton.addEventListener('click', function () {
                                searchStations('ev');
                            });

                            petrolButton.addEventListener('click', function () {
                                searchStations('petrol');
                            });
                        });
                    </script>

                    <div class="col-md-12"></div>

                    <!-- Travel Cost Calculator -->
                    <div class="col-md-6">
                        <div class="panel panel-warning hEpan">
                            <div class="panel-heading">
                                <h3 class="panel-title">Travel Cost Calculator <i class="fa-solid fa-calculator"></i></h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="">

                                    <div class="form-group">
                                        <label for="vehicle">Select Vehicle:</label>
                                        <select class="form-control" id="vehicle" name="vehicle">
                                            <option value="">Select a Vehicle</option>
                                            <option value="car" data-mileage="25">Car</option>
                                            <option value="car" data-mileage="45">2 Wheeler</option>
                                            <option value="suv" data-mileage="15">SUV</option>
                                            <option value="truck" data-mileage="10">Truck</option>
                                            <option value="Other" data-mileage="">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="distance">Distance (km):</label>
                                        <input type="number" class="form-control" id="distance" name="distance" required value="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="fuel_price">Fuel Price (per liter ₹):</label>
                                        <input type="number" class="form-control" id="fuel_price" name="fuel_price"
                                            value="103.5" step="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mileage">Vehicle Mileage (km/l):</label>
                                        <input type="number" class="form-control" id="mileage" name="mileage" required>
                                    </div>
                                    <button type="submit" class="btn btn-warning" name="calculate">Calculate <i
                                            class="fa fa-road"></i></button>
                                </form>
                                <?php
                                if (isset($_POST['calculate'])) {
                                    $distance = $_POST['distance'];
                                    $fuel_price = $_POST['fuel_price'];
                                    $mileage = $_POST['mileage'];
                                    $total_cost = ($distance / $mileage) * $fuel_price;
                                    echo "<br><div class='alert alert-warning' role='alert'><h3>Total Estimated Fuel Cost: ₹" . number_format($total_cost, 2) . "</h3></div>";
                                }
                                ?>
                                <script>
                                    $('#vehicle').on('change', function () {
                                        const mileage = $(this).find(':selected').data('mileage');
                                        $('#mileage').val(mileage);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Services Panel -->
                    <div class="col-md-6">
                        <div class="panel panel-danger hEpan ES-hEpan">
                            <div class="panel-heading">
                                <h3 class="panel-title">Emergency Services <i class="fa-solid fa-building-shield"></i></h3>
                            </div>
                            <div class="panel-body">
                                <p class="alert alert-warning">
                                    Only use these numbers in case of genuine emergencies. Misuse is punishable by law.
                                </p>
                                <div class="row">
                                    <div class=" col-sm-6">
                                        <a href="tel:108" class="btn btn-lg btn-block btn-danger">
                                            <i class="fa fa-ambulance"></i> Ambulance (108)
                                        </a>
                                    </div>
                                    <div class=" col-sm-6">
                                        <a href="tel:112" class="btn btn-lg btn-block btn-primary">
                                            <i class="fa fa-shield"></i> Police (112)
                                        </a>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-sm-6">
                                        <a href="tel:101" class="btn btn-lg btn-block btn-warning">
                                            <i class="fa fa-fire-extinguisher"></i> Fire (101)
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="tel:103" class="btn btn-lg btn-block btn-info">
                                            <i class="fa fa-car"></i> Traffic (103)
                                        </a>
                                    </div>
                                </div>
                                <div class="help-block" style="margin-top: 15px;">
                                    <small>Click on a button to directly call the respective emergency service.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><strong class="text-muted">Coming Soon...</strong></h2>
                            </div>
                            <div class="panel-body" style="cursor: not-allowed;">
                                <img src="images/cm.png" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>


    <!--Fotter Starts-->
    <?php
    include("includes/footer.php")
        ?>
    <!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>

</html>

<!-- ---------------------Filnal------------------------------------ -->