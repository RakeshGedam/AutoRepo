<?php
$customer_email = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email = '$customer_email'";
$run_cust = mysqli_query($con,$get_customer);
$row_cust = mysqli_fetch_array($run_cust);
$customer_id = $row_cust['customer_id'];
$customer_name = $row_cust['customer_name'];
$customer_email = $row_cust['customer_email'];
$customer_country = $row_cust['customer_country'];
$customer_city = $row_cust['customer_city'];
$customer_contact = $row_cust['customer_contact'];
$customer_address= $row_cust['customer_address'];
$customer_image = $row_cust['customer_image'];
?>

<div class="box">
    <form action="" method="POST" enctype="multipart/form-data">
    <center>
        <h1 class=""><i class="fa-solid fa-user-pen"></i>Edit Your Account!</h1>
    </center>
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="c_name" required="" class="form-control" value = "<?php echo $customer_name; ?>">
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="c_email" class="form-control" required="" value = "<?php echo $customer_email; ?>"><!--Change type="text" to type="email"--->
    </div>    
    <div class="form-group">
        <label>Country</label>
        <input type="text" name="c_country" required="" class="form-control" value = "<?php echo $customer_country; ?>">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" name="c_city" required="" class="form-control" value = "<?php echo $customer_city; ?>">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="c_address" required="" class="form-control" value = "<?php echo $customer_address; ?>">
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="tel" name="c_number" required="" class="form-control" value = "<?php echo $customer_contact; ?>"><!--Changed type=text to type="tel"-->
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="c_image" class="form-control">
        <img src="customer_images/<?php echo $customer_image; ?>" class="img-responsive" height="100" width="100">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="update"><!--Added type="submit"-->
            Update Now
        </button>
    </div>
</form>
</div>

<?php
    if(isset($_POST['update'])){
        $update_id = $customer_id;
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_address = $_POST['c_address'];
        $c_contact = $_POST['c_number'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        move_uploaded_file($c_image_tmp,"customer_images/$c_image");
        $update_customer = "update customers set customer_name = '$c_name',customer_email = '$c_email',customer_country = '$c_country',customer_city = '$c_city',customer_address = '$c_address',customer_contact = '$c_contact',customer_image = '$c_image' where customer_id = '$update_id'";

        $run_customer = mysqli_query($con,$update_customer);
        if($run_customer){
            echo "<script>alert('Success! Your details have been updated successfully.')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
?>