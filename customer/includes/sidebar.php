<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
    <?php
        $session_customer = $_SESSION['customer_email'];
        $get_cust = "select * from customers where customer_email = '$session_customer'";
        $run_cust = mysqli_query($con,$get_cust);
        $row_customer = mysqli_fetch_array($run_cust);
        $customer_image = $row_customer['customer_image'];
        $customer_name = $row_customer['customer_name'];
        if(!isset($_SESSION['customer_email'])){

        }else{
            echo "<center>
            <img src='customer_images/" . ($customer_image ? $customer_image : '1.png') . "' class='img-responsive'>
        </center>
        <br>
        <h3 algin='center' class='panel-title'>Name:<b> $customer_name</b></h3>";
        }
    
    ?>
        
    </div>
    <div class="panel-body">
        <ol class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_order'])){echo "active";}?>">
                <a href="my_account.php?my_order"><i class="fa fa-list"></i> My Orders</a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){echo "active";} ?>">
                <a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline*</a><!--Need Attention-->
            </li>
           
            <!--My Address-->
            
            <li class="<?php if(isset($_GET['edit_act'])){echo "active";} ?>">
                <a href="my_account.php?edit_act"><i class="fa fa-pencil"></i> Edit Account</a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){echo "active";} ?>">
                <a href="my_account.php?change_pass"><i class="fa fa-key"></i> Change Password</a>
            </li>
            <!--Wishlist Removed-->
            <li class="<?php if(isset($_GET['delete_ac'])){echo "active";} ?>">
                <a href="my_account.php?delete_ac" onclick="alert('This action will delete your account permanently!');"><i class="fa fa-user-slash"></i> Delete Account</a>
            </li>
            <li class="<?php if(isset($_GET['logout'])){echo "active";} ?>">
                <a href="my_account.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
        </ol>

    </div>
</div>