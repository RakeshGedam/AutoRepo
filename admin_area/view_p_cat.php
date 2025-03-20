<?php
if (!(isset($_SESSION['admin_email']))) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Products Category
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> View Products Categories
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product Category ID</th>
                                    <th>Product Category Title</th>
                                    <th>Product Category Description</th>
                                    <th>Product Category Image</th>
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $get_p_cat = "select * from product_category";
                                $run_p_cat = mysqli_query($con, $get_p_cat);
                                while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
                                    $p_cat_id = $row_p_cat['p_cat_id'];
                                    $p_cat_title = $row_p_cat['p_cat_title'];
                                    $p_cat_desc = $row_p_cat['p_cat_desc'];
                                    $p_cat_img = $row_p_cat['p_cat_img'];
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $p_cat_title; ?></td>
                                        <td width="350"><?php echo $p_cat_desc; ?></td>
                                        <td><img src="mpImg/check/<?php echo $p_cat_img ?>" width="90"></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to delete this Product Category?');" href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                                                <i class="fa fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
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