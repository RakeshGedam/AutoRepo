<?php
    
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<?php
    if(isset($_GET['edit_manufacturer'])){
        $edit_manufacturer_id = $_GET['edit_manufacturer'];
        $get_manufacturer = "select * from manufacturers where cat_id ='$edit_manufacturer_id'";
        $run_manufacturer = mysqli_query($con, $get_manufacturer);
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);
        $manufacturer_id = $row_manufacturer['cat_id'];
        $manufacturer_title = $row_manufacturer['cat_title'];
        $manufacturer_desc = $row_manufacturer['cat_desc'];
        $man_img = $row_manufacturer['cat_img'];
    }
?>

<div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> Edit Manufacturer
                    </h3>
                </div>
                <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Manufacturer Title</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="manufacturer_title"
                                    value="<?php echo $manufacturer_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" rows="5" name="manufacturer_desc"><?php echo $manufacturer_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group"><!-- -->
                            <label for="" class="col-md-3 control-label">Product Category Image</label>
                            <div class="col-md-6">
                                <input type="file" name="man_img">
                                <br><br>
                                <img src="mpImg/check/<?php echo $man_img; ?>"  height="80">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Manufacturer" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_POST['update'])){
    $man_title = $_POST['manufacturer_title'];
    $man_desc = $_POST['manufacturer_desc'];

    // Handling File Upload Properly
    if(!empty($_FILES['man_img']['name'])){ // ✅ Check if a new image is uploaded
        $man_img = $_FILES['man_img']['name'];
        $man_img_tmp = $_FILES['man_img']['tmp_name'];
        move_uploaded_file($man_img_tmp, "mpImg/check/$man_img"); // ✅ Save the uploaded image
    } else {
        $man_img = $row_manufacturer['cat_img']; // ✅ Keep existing image if no new upload
    }

    // ✅ Corrected SQL Query
    $update_man = "UPDATE manufacturers SET
                        cat_title = '$man_title',
                        cat_desc = '$man_desc',
                        cat_img = '$man_img'
                    WHERE cat_id = '$edit_manufacturer_id'";

    $run_man = mysqli_query($con, $update_man);

    
    if($run_man){
        echo "<script>alert('Success! Product Manufacturer Updated');</script>";
        echo "<script>window.open('index.php?view_manufacturer','_self')</script>";
    }

}
?>

<?php } ?>