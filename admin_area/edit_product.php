<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>
    <?php
    if (isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];
        $get_p = "select * from products where product_id='$edit_id'";
        $run_product = mysqli_query($con, $get_p);
        $row_product = mysqli_fetch_array($run_product);
        $p_id = $row_product['product_id'];
        $p_title = $row_product['product_title'];
        $p_cat = $row_product['p_cat_id'];
        $cat = $row_product['cat_id'];
        $p_image1 = $row_product['product_img1'];
        $p_image2 = $row_product['product_img2'];
        $p_image3 = $row_product['product_img3'];
        $p_image4 = $row_product['product_img4'];
        $p_price = $row_product['product_price'];
        $p_desc = $row_product['product_desc'];
        $p_keywords = $row_product['product_keywords'];
    }

    $get_p_cat = "select * from product_category where p_cat_id='$p_cat'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
    $get_cat = "select * from manufacturers where cat_id='$cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Products</title>

    </head>

    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i>
                        Dashboard / Insert Product
                    </li>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-money-bill"></i>Edit Product
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Title</label>
                                <div class="col-md-6">
                                    <input type="text" name="product_title" class="form-control" required="" value="<?php echo $p_title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Category</label>
                                <div class="col-md-6">
                                    <select name="product_cat" class="form-control">
                                        <option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>
                                        <?php
                                        $get_p_cats = "select * from product_category";
                                        $run_p_cats = mysqli_query($con, $get_p_cats);
                                        while ($row = mysqli_fetch_array($run_p_cats)) {
                                            $id = $row['p_cat_id'];
                                            $cat_title = $row['p_cat_title'];
                                            echo "<option value='$id'> $cat_title </option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Manufacturer</label>
                                <div class="col-md-6">
                                    <select name="man" class="form-control">
                                        <option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
                                        <?php
                                        $get_man = "select * from manufacturers";
                                        $run_man = mysqli_query($con, $get_man);
                                        while ($row = mysqli_fetch_array($run_man)) {
                                            $id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<option value='$id'> $cat_title </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 1</label>
                                <div class="col-md-6">                            
                                <input type="file" name="product_img1" class="form-control" >
                                <br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70" alt="">
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 2</label>
                                <div class="col-md-6">
                                <input type="file" name="product_img2" class="form-control" >
                                <br><img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" alt="">
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image 3</label>
                                <div class="col-md-6">
                                <input type="file" name="product_img3" class="form-control" >
                                <br><img src="product_images/<?php echo $p_image3; ?>" width="70" height="70" alt="">
                            </div>
                            </div>
                            <div class="form-group">                                
                                <label class="col-md-3 control-label">Product Image 4</label>
                                <div class="col-md-6">
                                <input type="file" name="product_img4" class="form-control">
                                <br><img src="product_images/<?php echo $p_image4; ?>" width="70" height="70" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Price</label>
                                <div class="col-md-6">
                                <input type="text" name="product_price" class="form-control" required="" value="<?php echo $p_price; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Keyword</label>
                                <div class="col-md-6">
                                <input type="text" name="product_keywords" class="form-control" required="" value="<?php echo $p_keywords; ?>">
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Description</label>
                                <div class="col-md-6"><!--Added extra div ToextArea not working-->
                                <textarea name="product_desc" class="form-control" rows="6" cols="19"><?php echo $p_desc; ?></textarea>


                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" value="Update product"
                                    class="btn btn-primary form-control">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </body>

    </html>


    <?php
    if (isset($_POST['update'])) {
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $man = $_POST['man'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        // Use existing image if no new file is uploaded
        $product_img1 = $_FILES['product_img1']['name'] ?: $p_image1; // `?:` it checks if the first value exists, otherwise, it takes the second value.
        $product_img2 = $_FILES['product_img2']['name'] ?: $p_image2;
        $product_img3 = $_FILES['product_img3']['name'] ?: $p_image3;
        $product_img4 = $_FILES['product_img4']['name'] ?: $p_image4;

        // Move files only if a new image is uploaded
        if ($_FILES['product_img1']['name']) move_uploaded_file($_FILES['product_img1']['tmp_name'], "product_images/$product_img1"); //php first stores the files on a temp location and when we submit it moves the file to the desired location
        if ($_FILES['product_img2']['name']) move_uploaded_file($_FILES['product_img2']['tmp_name'], "product_images/$product_img2");
        if ($_FILES['product_img3']['name']) move_uploaded_file($_FILES['product_img3']['tmp_name'], "product_images/$product_img3");
        if ($_FILES['product_img4']['name']) move_uploaded_file($_FILES['product_img4']['tmp_name'], "product_images/$product_img4");
        //--9--

        $update_product = "update products set p_cat_id = '$product_cat',cat_id= '$man',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_img4='$product_img4',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$p_id'";

        $run_product = mysqli_query($con, $update_product);

        if ($run_product) {
            echo "<script>alert('Products Updated Sucessfully!')</script>";
            echo "<script>window.location.href='index.php?view_product'</script>";//"<script>window.open('insert_product.php')</script>";

        }



    }
    ?>

<?php } ?>