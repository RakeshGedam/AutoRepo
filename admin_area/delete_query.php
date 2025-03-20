<?php    
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

        if (isset($_GET['delete_query'])) {
            $delete_id = $_GET['delete_query'];
            $delete_query = "DELETE FROM contactus WHERE QID = '$delete_id'";
            $run_delete = mysqli_query($con, $delete_query);
        
            if ($run_delete) {
                echo "<script>alert('Query deleted successfully!');</script>";
                echo "<script>window.open('index.php?view_queries', '_self');</script>";
            } else {
                echo "<script>alert('Failed to delete query.');</script>";
            }
        }
    }        