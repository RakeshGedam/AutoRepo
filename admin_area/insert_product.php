<?php    
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Product</title>    
</head>
<body>
    <!--6-->

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
<div class="col-lg-3">

</div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money-bill"></i> Insert Product
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title</label>
                            <input type="text" name="product_title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>
                            <select name="product_cat" class="form-control">
                                <option value="" disabled selected>Select a Product Category</option>
                                <?php
                                $get_p_cats="select * from product_category"; 
                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                while($row=mysqli_fetch_array($run_p_cats)){
                                    $id=$row['p_cat_id'];
                                    $cat_title=$row['p_cat_title'];
                                    echo "<option value='$id'> $cat_title </option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Manufacturer</label>
                            <select name="man" class="form-control">
                            <option value="" disabled selected>Select Manufacturer</option>
                                <?php
                                 $get_man="select * from manufacturers"; 
                                 $run_man = mysqli_query($con,$get_man);
                                 while($row=mysqli_fetch_array($run_man)){
                                     $id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                     echo "<option value='$id'> $cat_title </option>";
                                 }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 1</label>
                            <input type="file" name="product_img1" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2</label>
                            <input type="file" name="product_img2" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3</label>
                            <input type="file" name="product_img3" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 4</label>
                            <input type="file" name="product_img4" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <input type="number" step="any" name="product_price" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keyword</label>
                            <input type="text" name="product_keywords" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6"><!--Added extra div ToextArea not working-->
                            <textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Insert product" class="btn btn-primary form-control">
                        </div>                      

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">

        </div>
    </div>

    <!--6Ends-->   
</body>

</html>

<?php
    if(isset($_POST['submit'])){
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $man = $_POST['man'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        $product_img4 = $_FILES['product_img4']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        $temp_name4 = $_FILES['product_img4']['tmp_name'];

        move_uploaded_file($temp_name1,"product_images/check/$product_img1");
        move_uploaded_file($temp_name2,"product_images/check/$product_img2");
        move_uploaded_file($temp_name3,"product_images/check/$product_img3");
        move_uploaded_file($temp_name4,"product_images/check/$product_img4");

        //--9--

        $insert_product = "insert into products(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_img4,product_price,product_desc,product_keywords) VALUES('$product_cat','$man',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_img4','$product_price','$product_desc','$product_keywords')";

        $run_product = mysqli_query($con,$insert_product);

        if($run_product){
            echo "<script>alert('Products Inserted Sucessfully!')</script>";
            echo "<script>window.location.href='index.php?view_product'</script>";//"<script>window.open('insert_product.php')</script>";

        }
        
        

    }
?>
<?php } ?>