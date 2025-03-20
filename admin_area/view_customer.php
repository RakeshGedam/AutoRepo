<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Customers
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> View Customers
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Image</th>
                                    <th>Customer Email</th>
                                    <th>Customer Contact</th>
                                    <th>Customer Address</th>
                                    <th>Customer City</th>
                                    <th>Customer Country</th>
                                    <th>Delete Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $get_cust = "select * from customers";
                                $run_cust = mysqli_query($con, $get_cust);
                                while ($row_cust = mysqli_fetch_array($run_cust)) {
                                    $cust_id = $row_cust['customer_id'];
                                    $cust_name = $row_cust['customer_name'];
                                    $cust_img = $row_cust['customer_image'];
                                    $cust_email = $row_cust['customer_email'];
                                    $cust_country = $row_cust['customer_country'];
                                    $cust_city = $row_cust['customer_city'];
                                    $cust_contact = $row_cust['customer_contact'];
                                    $cust_add = $row_cust['customer_address'];
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cust_name; ?></td>
                                        <td><img src="../customer/customer_images/<?php echo $cust_img; ?>" width="60"
                                                height="60"></td>
                                        <td><?php echo $cust_email; ?></td>
                                        <td><?php echo $cust_contact; ?></td>
                                        <td><?php echo $cust_add; ?></td>
                                        <td><?php echo $cust_city; ?></td>
                                        <td><?php echo $cust_country; ?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to delete this Customer?');" href="index.php?delete_customer=<?php echo $cust_id; ?>">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php } ?>