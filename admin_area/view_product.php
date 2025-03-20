<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>
    <div class="row"> <!-- 26 -->
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / View Product
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel title">
                        <i class="fa-solid fa-money-bill"></i> View Products
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Keyword</th>
                                    <th>Product Date</th>
                                    <th>Product Delete</th>
                                    <th>Product Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $get_product = "select * from products";
                                $run_product = mysqli_query($con, $get_product);
                                while ($row = mysqli_fetch_array($run_product)) {
                                    $pro_id = $row['product_id'];
                                    $pro_title = $row['product_title'];
                                    $pro_img1 = $row['product_img1'];
                                    $pro_price = $row['product_price'];
                                    $pro_keywords = $row['product_keywords'];
                                    $pro_date = $row['date'];
                                    $i++;
                                    ?>
                                    <tr>
                                        <td<?php echo $i; ?></td>
                                            <td><?php echo $pro_id ?></td>
                                            <td><?php echo $pro_title ?></td>
                                            <td><img src="product_images/<?php echo $pro_img1 ?>" width="90" height="80"></td>
                                            <td><?php echo $pro_price ?></td>
                                            <td><?php echo $pro_keywords ?></td>
                                            <td><?php echo $pro_date ?></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete this Product?');" href="index.php?delete_product=<?php echo $pro_id ?>"  onclick="return confirm('Are you sure you want to delete this product?');">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </td>
                                            <td>
                                                <a href="index.php?edit_product=<?php echo $pro_id ?>">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
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