<?php
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No:</th>
                                <th>Customer Email:</th>
                                <th>Invoice No:</th>
                                <th>Product Title:</th>
                                <th>Product Qty:</th>
                                <th>Fuel Type:</th>
                                <th>Order Date:</th>
                                <th>Total Amount:</th>
                                <th>Order Status:</th>
                                <th>Delete Order:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_order = "select * from customer_order";
                                $run_order = mysqli_query($con, $get_order);
                                while($row_order = mysqli_fetch_array($run_order)){
                                    $order_id = $row_order['order_id'];
                                    $c_id = $row_order['customer_id'];
                                    $invoice_no = $row_order['invoice_no'];
                                    $product_id = $row_order['product_id'];
                                    $qty = $row_order['qty'];
                                    $fuel_type = $row_order['fuel_type'];
                                    $order_date = $row_order['order_date'];
                                    $due_amount = $row_order['due_amount'];
                                    $order_status = $row_order['order_status'];
                                    $get_product = "select * from products where product_id='$product_id'";
                                    $run_product = mysqli_query($con, $get_product);
                                    $row_product = mysqli_fetch_array($run_product);
                                    $product_title = $row_product['product_title'];                                    
                                    $i++;
                                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php
                                    $get_cust = "select * from customers where customer_id='$c_id'";
                                        $run_cust = mysqli_query($con, $get_cust);
                                        $row_cust = mysqli_fetch_array($run_cust);
                                        $cust_email = $row_cust['customer_email'];
                                        echo $cust_email;
                                    ?>
                                </td>
                                <td bgcolor="#eceda2" ><?php echo $invoice_no; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $fuel_type; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $due_amount; ?></td>
                                <td>
                                    <?php
                                        if($order_status == 'pending'){
                                            echo $order_status = 'Pending';
                                        }else{
                                            echo $order_status = 'Complete';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this Order?');" href="index.php?delete_order=<?php echo $order_id; ?>">
                                        <i class="fa fa-trash-alt"></i> Delete
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