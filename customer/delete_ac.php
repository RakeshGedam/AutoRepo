<div class="box">
    <center>
        <h1>Do you really want to delete your account<i class="fa-solid fa-trash"></i></h1>    
    <form action="" method="post">
        <input type="submit" name="yes" value="Yes I want to Delete" class="btn btn-danger">
        <input type="submit" name="no" value="No,I dont want to delete" class="btn btn-primary">
    </form>
    </center>
</div>
<?php
    $c_email=$_SESSION['customer_email'];
    if(isset($_POST['yes'])){       
        $delete_q = "delete from customers where customer_email = '$c_email'";
        $run_q = mysqli_query($con,$delete_q);
        if($run_q){
            session_destroy();
            echo "<script>alert('🗑Account deleted Successfully𓆝 𓆟 𓆞 𓆝 𓆟')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }

    if(isset($_POST['no'])){
        echo "<script>window.open('my_account.php','_self')</script>";
    }


?>