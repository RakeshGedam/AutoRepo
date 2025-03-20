<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black;">
    <div class="navbar-header">
        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> -->
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav"> <!--Dropdown NavRightTop-->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name ?>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa-regular fa-fw fa-id-card"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa-solid fa-fw fa-caret-right"></i> Products
                        <span class="badge"><?php echo $count_pro ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-users"></i> Customers
                        <span class="badge"><?php echo $count_cust ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product_cat">
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        <span class="badge"><?php echo $count_p_cat ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout
                        <l class="fa fa-fw fa-power-off"></l>
                    </a>
                </li>
            </ul>
        </li>
    </ul> <!--Dropdown NavRightTop Ends-->

    <div class="collapse navbar-ex1-collapse navbar-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-table"></i> Products <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="products" class="collapse">
                    <li><a href="index.php?insert_product">Insert Product</a></li>
                    <li><a href="index.php?view_product">View Product</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                    <i class="fa-solid fa-table-list"></i> Products Categories <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="product_cat" class="collapse">
                    <li><a href="index.php?insert_product_cat">Insert Product Categories</a></li>
                    <li><a href="index.php?view_product_cat">View Product Categories</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#category">
                    <i class="fa-solid fa-industry"></i> Manufacturers <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="category" class="collapse">
                    <li><a href="index.php?insert_manufacturer">Insert Manufacturer</a></li>
                    <li><a href="index.php?view_manufacturer">View Manufacturers</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slider">
                    <i class="fa-regular fa-images"></i> Insert Slider <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="slider" class="collapse">
                    <li><a href="index.php?insert_slider">Insert Slider</a></li>
                    <li><a href="index.php?view_slider">View Slider</a></li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#customers">
                    <i class="fa-solid fa-users"></i> Customers <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="customers" class="collapse">
                    <li> <a href="index.php?view_customer">View Customers <i class="fa fa-fw fa-edit"></i> </a></li>
                    <li><a href="index.php?view_queries">View Queries </a></li>
                </ul>
            </li>
            
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-list"></i> View Order
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-pencil"></i> View Payments
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                <i class="fa-solid fa-users-between-lines"></i> Users <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="users" class="collapse">
                    <li><a href="index.php?insert_user">Insert User</a></li>
                    <li><a href="index.php?view_users">View User</a></li>
                    <li><a href="index.php?user_profile=<?php echo $admin_id ?>">Edit Profile</a></li>
                </ul>
            </li>
        </ul>
    </div>

</nav>