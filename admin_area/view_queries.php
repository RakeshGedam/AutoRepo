<?php
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Customer's Query
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-deafult">
            <div class="panel-heading">
                <h3 class="panel-title">
                <i class="fa-solid fa-comments"></i> View Queries
                </h3>
            </div>
            <div class="panel-body">
                <div class="table responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Query ID: </th>
                                <th>Customer Name: </th>
                                <th>Customer Email: </th>
                                <th>Subject: </th>
                                <th>Description:  </th>
                                <th>Query Date:</th>                                
                                <th>Delete Query </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_manufacturer = "select * from contactus";
                                $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                while($row_query = mysqli_fetch_array($run_manufacturer)){
                                    $query_id = $row_query['QID'];
                                    $cust_name = $row_query['CName'];
                                    $cust_email = $row_query['CEmail'];
                                    $subject = $row_query['subject'];
                                    $msg = $row_query['msg'];
                                    $query_date = $row_query['query_date'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cust_name; ?></td>
                                <td><?php echo $cust_email; ?></td>
                                <td><?php echo $subject; ?></td>                                
                                <td><?php echo $msg; ?></td>
                                <td><?php echo $query_date; ?></td>
                                <td>
                                    <a onclick="return confirm('Are you sure that Query is resolved');" href="index.php?delete_query=<?php echo $query_id; ?>">
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