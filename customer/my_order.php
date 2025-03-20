<div class="box">
    <center>
        <h1>
            <i class="fa-solid fa-clipboard-list"></i> My Order
        </h1>
        <p>If you have any queries, feel free to <a href="../contactus.php">contact us</a> through our contact form.
            We're here to assist as promptly as possible.</p>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr. No.</th><!--need Changes-->
                    <th>Due Amount</th>
                    <th>Invoice Number</th>
                    <th>Quantity</th>
                    <th>Fuel Type</th>
                    <th>Order Date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "select * from customers where customer_email = '$customer_session'";
                $run_cust = mysqli_query($con, $get_customer);
                $row_cust = mysqli_fetch_array($run_cust);
                $customer_id = $row_cust['customer_id'];
                $get_order = "select * from customer_order where customer_id = '$customer_id'";
                $run_order = mysqli_query($con, $get_order);
                $i = 0;
                while ($row_order = mysqli_fetch_array($run_order)) {
                    $order_id = $row_order['order_id'];
                    $order_due_amount = $row_order['due_amount'];
                    $order_invoice = $row_order['invoice_no'];
                    $order_qty = $row_order['qty'];
                    $order_fuel_type = $row_order['fuel_type'];
                    $order_date = substr($row_order['order_date'], 0, 11);
                    $order_status = $row_order['order_status'];
                    $i++;
                    if ($order_status == "pending") {
                        $order_status = "Unpaid";
                    } else {
                        $order_status = "Paid";
                    }

                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo '₹' . number_format($order_due_amount); ?></td>
                        <td><a href="invoice.php?due_amt=<?php echo $order_due_amount?>&invoice=<?php echo $order_invoice ?>" target="_blank" ><?php echo $order_invoice ?></a></td>
                        <td><?php echo $order_qty ?></td>
                        <td><?php echo $order_fuel_type ?></td>
                        <td><?php echo $order_date ?></td>
                        <td><?php echo $order_status ?></td>
                        <td><?php if ($order_status == "Unpaid") { ?>
                                 <a href="confirm.php?order_id=<?php echo $order_id; ?>&due_amount=<?php echo $order_due_amount; ?>" target="_blank"
                                    class="btn btn-primary btn-sm">
                                    Confirm If Paid
                                </a>
                            <?php }else{ 
                                echo "Completed ✓";
                            }?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>