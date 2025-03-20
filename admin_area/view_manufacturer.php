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
                <i class="fa fa-dashboard"></i> Dashboard / View Manufacturer
            </li>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-deafult">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa-regular fa-money-bill-1"></i> View Manufacturer
                </h3>
            </div>
            <div class="panel-body">
                <div class="table responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Manufacturer ID: </th>
                                <th>Manufacturer Title: </th>
                                <th>Manufacturer Description: </th>
                                <th>Manufacturer Image </th>
                                <th>Delete Manufacturer </th>
                                <th>Edit Manufacturer</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_manufacturer = "select * from manufacturers";
                                $run_manufacturer = mysqli_query($con, $get_manufacturer);
                                while($row_manufacturer = mysqli_fetch_array($run_manufacturer)){
                                    $manufacturer_id = $row_manufacturer['cat_id'];
                                    $manufacturer_title = $row_manufacturer['cat_title'];
                                    $manufacturer_desc = $row_manufacturer['cat_desc'];
                                    $man_img = $row_manufacturer['cat_img'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $manufacturer_title; ?></td>
                                <td width="480"><?php echo $manufacturer_desc; ?></td>
                                <td><img src="mpImg/check/<?php echo $man_img ?>" width="90"></td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this Manufacturer?');" href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>">
                                        <i class="fa fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>">
                                        <i class="fa fa-pencil-alt"></i> Edit
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