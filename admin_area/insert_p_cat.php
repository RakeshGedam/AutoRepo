<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products Category
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> Insert Product Category
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="p_cat_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="p_cat_desc"></textarea>
                            </div>
                        </div>
                        <div class="form-group"> <!-- -->
                            <label for="" class="col-md-3 control-label">Product Category Image</label>
                            <div class="col-md-6">
                                <input type="file" name="p_cat_img" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" value="Submit Now" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];

        // File Upload Handling
        $p_cat_img = $_FILES['p_cat_img']['name']; // Get file name
        $temp_name = $_FILES['p_cat_img']['tmp_name']; // Temporary location

        // Move file to the correct directory
        move_uploaded_file($temp_name, "mpImg/check/$p_cat_img");

        // Insert data into database with image
        $insert_p_cat = "INSERT INTO product_category (p_cat_title, p_cat_desc, p_cat_img) 
                     VALUES ('$p_cat_title', '$p_cat_desc', '$p_cat_img')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {
            echo "<script>alert('New Product Category has been inserted successfully')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
    }


    ?>



<?php } ?>