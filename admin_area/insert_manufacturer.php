<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Manufacturer
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Manufacturer
                    </h3>
                </div>
                <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Manufacturers Title</label>
                            <div class="col-md-6">
                                <input type="text" name="man_title" class="form-control" required placeholder="Enter Manufacturer Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Manufacturers Description</label>
                            <div class="col-md-6">
                                <textarea name="man_desc" placeholder="Enter Manufacturers Desc" type="text" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group"> <!-- -->
                            <label for="" class="col-md-3 control-label">Manufacturer Image</label>
                            <div class="col-md-6">
                                <input type="file" name="man_img" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert Manufacturer" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 
    if(isset($_POST['submit'])){
        $man_title = $_POST['man_title'];
        $man_desc = $_POST['man_desc'];
        
        
        $man_img = $_FILES['man_img']['name']; // Get the uploaded file name
        $temp_name = $_FILES['man_img']['tmp_name']; // Temporary file path
        move_uploaded_file($temp_name, "mpImg/check/$man_img"); // Save the uploaded image
        
        
        $insert_man = "INSERT INTO manufacturers (cat_title, cat_desc, cat_img) VALUES ('$man_title', '$man_desc', '$man_img')";
        $run_cat = mysqli_query($con, $insert_man);
        if($run_cat){
            echo "<script>alert('Success! Manufacturer has been inserted')</script>";
            echo "<script>window.open('index.php?view_manufacturer','_self')</script>";
        }
    }
?>

<?php } ?>