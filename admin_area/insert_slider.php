<?php    
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{                        
?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard / Insert Slider
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa-regular fa-money-bill-1"></i> Insert Slider
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider Name : </label>
                        <div class="col-md-6">
                            <input type="text" required class="form-control" name="slider_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider URL : </label>
                        <div class="col-md-6">
                            <input type="text" required class="form-control" name="slider_url">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Slider Image : </label>
                        <div class="col-md-6">
                            <input type="file" required class="form-control" name="slider_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Slider" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $slider_name = $_POST['slider_name'];
        $slider_url = $_POST['slider_url'];
        $slider_image = $_FILES['slider_image']['name'];
        $temp_name = $_FILES['slider_image']['tmp_name'];
        $view_slider = "select * from slider";
        $view_run_slider = mysqli_query($con, $view_slider);
        $count = mysqli_num_rows($view_run_slider);
        
        if($count < 6){
            move_uploaded_file($temp_name, "slider_images/$slider_image");
            $insert_slider = "insert into slider (slider_name,slider_image,slider_url) values ('$slider_name','$slider_image','$slider_url')";
            $run_slider = mysqli_query($con, $insert_slider);
            echo "<script>alert('Success! New Slider has been inserted')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }else{
            echo "<script>alert('Whoops❗ You have already inserted 6 sliders!')</script>";
        }
    }
?>


<?php } ?>