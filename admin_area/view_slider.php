<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Slider
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-regular fa-money-bill-1"></i> View Slider
                    </h3>
                </div>
                <div class="panel-body">

                    <?php
                    $get_slider = "select * from slider";
                    $run_slider = mysqli_query($con, $get_slider);
                    while ($row_slider = mysqli_fetch_array($run_slider)) {
                        $slider_id = $row_slider['id'];
                        $slider_name = $row_slider['slider_name'];
                        $slider_image = $row_slider['slider_image'];
                        ?>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="panel panel-primary">                                
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">
                                        <?php echo $slider_name; ?>
                                    </h3>
                                </div>
                                <div class="panel-body" style="height: 230px; overflow: hidden;">                                    
                                    <img src="slider_images/<?php echo $slider_image; ?>" class="img-responsive " alt="<?php echo $slider_name; ?>" >                                    
                                </div>
                                <div class="panel-footer">
                                    <center>
                                        <a href="index.php?delete_slider=<?php echo $slider_id; ?>" onclick="return confirm('Are you sure you want to delete this Slider?');" class="pull-left">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                        <a href="index.php?edit_slider=<?php echo $slider_id; ?>" class="pull-right">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <div class="clearfix">

                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php } ?>