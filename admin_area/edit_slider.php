<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php
    if (isset($_GET['edit_slider'])) {
        $edit_id = $_GET['edit_slider'];
        $get_slider = "select * from slider where id='$edit_id'";
        $run_slider = mysqli_query($con, $get_slider);
        $row_slider = mysqli_fetch_array($run_slider);
        $slider_id = $row_slider['id'];
        $slider_name = $row_slider['slider_name'];
        $slider_image = $row_slider['slider_image'];
        $slider_url = $row_slider['slider_url'];
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Slider
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> Edit Slider
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Name</label>
                            <div class="col-md-6">
                                <input type="text" name="slider_name" class="form-control" 
                                    value="<?php echo $slider_name; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider URL</label>
                            <div class="col-md-6">
                                <input type="text" name="slider_url" class="form-control" 
                                    value="<?php echo $slider_url; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Image</label>
                            <div class="col-md-6">
                                <input type="file" value="$slider_image" name="slider_image" class="form-control">
                                <br>
                                <img class="img-thumbnail" src="slider_images/<?php echo $slider_image; ?>" width="90" height="90">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Slider"
                                    class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if(isset($_POST['update'])){
        $slider_name = $_POST['slider_name'];
        $slider_url = $_POST['slider_url'];
    
        // Check if a new image is uploaded
        if(!empty($_FILES['slider_image']['name'])){
            $slider_image = $_FILES['slider_image']['name'];
            $temp_name = $_FILES['slider_image']['tmp_name'];
            move_uploaded_file($temp_name, "slider_images/$slider_image");
    
            // Update with new image
            $update_slider = "UPDATE slider SET slider_name='$slider_name', slider_image='$slider_image', slider_url='$slider_url' WHERE id='$slider_id'";
        } else {
            // Update without changing the image
            $update_slider = "UPDATE slider SET slider_name='$slider_name', slider_url='$slider_url' WHERE id='$slider_id'";
        }
    
        $run_slider = mysqli_query($con, $update_slider);
        if($run_slider){
            echo "<script>alert('Slider has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
    }
    
    
    ?>

<?php } ?>