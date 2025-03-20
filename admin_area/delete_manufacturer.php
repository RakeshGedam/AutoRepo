<?php
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
    if(isset($_GET['delete_manufacturer'])){
        $delete_manufacturer = $_GET['delete_manufacturer'];
        $delete_manufacturer = "delete from manufacturers where cat_id='$delete_manufacturer'";
        $run_delete = mysqli_query($con, $delete_manufacturer);
        if($run_delete){
            echo "<script>alert('Success! One Manufacturer has been deleted')</script>";
            echo "<script>window.open('index.php?view_manufacturer','_self')</script>";
        }   
    }
?>

<?php } ?>