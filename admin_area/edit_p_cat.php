<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>
    <?php
    if (isset($_GET['edit_p_cat'])) {
        $edit_p_cat_id = $_GET['edit_p_cat'];
        $get_p_cat_query = "select * from product_category where p_cat_id='$edit_p_cat_id'";
        $run_edit = mysqli_query($con, $get_p_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        $p_cat_id = $row_edit['p_cat_id'];
        $p_cat_title = $row_edit['p_cat_title'];
        $p_cat_desc = $row_edit['p_cat_desc'];
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>Dashboard / Edit Products Category
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> Edit Product Category
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="p_cat_title"
                                    value="<?php echo $p_cat_title; ?>">
                            </div>
                        </div>
                        <div class="form-group"><!-- -->
                            <label for="" class="col-md-3 control-label">Product Category Image</label>
                            <div class="col-md-6">
                                <input type="file" name="p_cat_img">
                                <br><br>
                                <img src="mpImg/check/<?php echo $row_edit['p_cat_img']; ?>"  height="80">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" rows="5"
                                    name="p_cat_desc"><?php echo $p_cat_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

if (isset($_POST['update'])) {
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];   
    
    $p_cat_img = $_FILES['p_cat_img']['name'];
    $temp_name = $_FILES['p_cat_img']['tmp_name'];
    
    if (empty($p_cat_img)) {
        $p_cat_img = $row_edit['p_cat_img']; 
    } else {
        
        move_uploaded_file($temp_name, "mpImg/check/$p_cat_img");
    }
    
    $update_p_cat = "UPDATE product_category SET
                     p_cat_title = '$p_cat_title',
                     p_cat_desc = '$p_cat_desc',
                     p_cat_img = '$p_cat_img'
                     WHERE p_cat_id = '$p_cat_id'";
    
    $run_p_cat = mysqli_query($con, $update_p_cat);

        if ($run_p_cat) {
            echo "<script>alert('Success Product Category Updated');</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }

    }
    ?>



<?php } ?>