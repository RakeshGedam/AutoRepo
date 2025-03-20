<?php
$db = mysqli_connect("localhost",'root',"",'ahdb');
//for Getting User IP --25
function getUserIP(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}
//--25ends--

//--26--
function addCart(){
    global $db;
    if (isset($_GET['add_cart'])){
        $ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $fuel_type = $_POST['fuel_type'];
        $check_product = "select * from cart where ip_add  = '$ip_add' AND p_id = '$p_id'";
        $run_check = mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This product is already in your cart!')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }else{
            $query = "insert into cart(p_id,ip_add,qty,fuel_type) values('$p_id','$ip_add','$product_qty','$fuel_type')";
            $run_query = mysqli_query($db,$query);
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }

    }
}


//--item count 28Starts--
function item(){
    global $db;
    $ip_add = getUserIP();
    $get_items = "select * from cart where ip_add='$ip_add'";
    $run_item = mysqli_query($db,$get_items);
    $count = mysqli_num_rows($run_item);
    echo "$count";


}

//total price cal

function totalPrice(){
    global $db;
    $ip_add = getUserIP();
    $total = 0;
    $select_cart = "select * from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($db,$select_cart);
    while($record = mysqli_fetch_array($run_cart)){
        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $get_price = "select * from products where product_id = '$pro_id'";
        $run_price = mysqli_query($db,$get_price);
        while($row = mysqli_fetch_array($run_price)){
            $sub_total = $row['product_price']*$pro_qty;
            $total += $sub_total;
        }
    }
    echo" " . number_format($total, 2);
}

function getPro(){
    global $db;
    $get_product = "select * from products order by 1 DESC LIMIT 0,6";
    $run_products = mysqli_query($db,$get_product);

    while($row_product=mysqli_fetch_array($run_products)){
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img1'];
        $dispatch_days = mt_rand(2, 15);
        //<p class='price'>INR $pro_price</p> changed to format
        echo "
         <div class='col-md-4 col-sm-6' style='display: flex; flex-direction: column; justify-content: space-between;'>
    <div class='product' style='display: flex; flex-direction: column; justify-content: space-between; height: 100%;'>
        <a href='details.php?pro_id=$pro_id'>
            <img src='admin_area/product_images/$pro_img' class='img-responsive' style='width: 100%; height: 350px; object-fit: cover; display: block;'>
        </a>
        <div class='text'>
            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
            <p class='price' style='color:#2c024d;'>INR " . number_format($pro_price, 2) . "</p>
            <center><span class='text-muted'>Usually dispatches in $dispatch_days days</span></center>
            <p class='buttons'>
                <a href='details.php?pro_id=$pro_id' class='btn btn-default' style='margin-bottom: 10px;'>View Details</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary' style='margin-bottom: 10px;'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
            </p>                
        </div>
    </div>
</div>
        ";
    }    
}
/*Poduct Categories*/

function getPCats(){
    global $db;
    $get_p_cats = "SELECT * FROM product_category";
    $run_p_cats = mysqli_query($db, $get_p_cats);

    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        $p_cat_image = $row_p_cats['p_cat_img']; // Assuming this column exists

        echo "<li>
                <a href='shop.php?p_cat=$p_cat_id'>
                    <img src='./admin_area/mpImg/check/$p_cat_image' style='width: 50px; margin-right: 5px;'>
                    $p_cat_title
                </a>
              </li>";     
    }
}


/*Manufacturers*/

function getMan(){
    global $db;
    $get_cat = "select * from manufacturers";
    $run_cat = mysqli_query($db,$get_cat);
    while($row_cat = mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        $cat_img = $row_cat['cat_img'];
        echo "<li><a href='shop.php?cat_id=$cat_id'><img src='./admin_area/mpImg/check/$cat_img' style='width: 50px; margin-right: 5px;'>$cat_title</a></li>";
    }

}


/*Get Product through cat */

function getCatPro(){
    global $db;
    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        $get_p_cat = "select * from product_category where p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($db,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];


        $get_products = "select * from products where p_cat_id = $p_cat_id";
        $run_products = mysqli_query($db,$get_products);
        $count = mysqli_num_rows($run_products);
        if($count==0){
            echo " 
            <div class='alert alert-info text-center mt-4' role='alert'>
            <h4 class='alert-heading'>No Products Available</h4>
            <p>We're sorry, but there are currently no products available in this category.</p>
            <p>Please check back later or explore our other categories for more options.</p>
            </div>
            ";
        }
        else{
            echo "                
                <div class='box'>
                    <h3 class='text-primary mb-2'>$p_cat_title</h3>
                    <p>$p_cat_desc</p>
                </div>
            ";
                       
    }

    while($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = number_format($row_products['product_price'], 2);
        $pro_img1 = $row_products['product_img1'];
        
        echo " 
            <div class='col-md-4 col-sm-6 center-responsive' style='display: flex; flex-direction: column; justify-content: space-between;'
            onmouseover=\"changeBackground('admin_area/product_images/$pro_img1')\" 
            onmouseout=\"resetBackground()\">
            <div class='product' style='display: flex; flex-direction: column; justify-content: space-between; height: 100%;'>
                <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_img1' alt='AutoHub.com' class='img-responsive' style='width: 100%; height: 224px; object-fit: cover; display: block;'>
                </a>
            <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                <p class='price'>$pro_price</p>
                <p class='buttons'>
                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Book Now</a>
            </p>
        </div>
    </div>    

</div>

        ";
        }
    }

}


//Get Manufacturer

function getManPro(){
    global $db;
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $get_cat = "select * from manufacturers where cat_id='$cat_id'";
        $run_cats = mysqli_query($db,$get_cat);
        $row_cat = mysqli_fetch_array($run_cats);
        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];
        $get_products = "select * from products where cat_id = '$cat_id'";
        $run_products = mysqli_query($db,$get_products);
        $count = mysqli_num_rows($run_products);        

        if($count==0){
            echo " 
            <div class='alert alert-info text-center mt-4' role='alert'>
                <h4 class='alert-heading'>No Products Available</h4>
                <p>We're sorry, but there are currently no products available for this manufacturer.</p>
                <p>Please check back later or explore products from other manufacturers for more options.</p>
            </div>
            ";
        }
        else{
            echo "                
                <div class='box'>
                    <h3 class='text-primary mb-2'>$cat_title</h3>
                    <p>$cat_desc</p>
                </div>
            ";
                       
    }

    while($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = number_format($row_products['product_price'], 2);
        $pro_img1 = $row_products['product_img1'];
        
        echo " 
            <div class='col-md-4 col-sm-6 center-responsive' style='display: flex; flex-direction: column; justify-content: space-between;'
            onmouseover=\"changeBackground('admin_area/product_images/$pro_img1')\" 
            onmouseout=\"resetBackground()\">
            <div class='product' style='display: flex; flex-direction: column; justify-content: space-between; height: 100%;'>
                <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_img1' alt='AutoHub.com' class='img-responsive' style='width: 100%; height: 200px; object-fit: cover; display: block;'>
                </a>
            <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                <p class='price'>$pro_price</p>
                <p class='buttons'>
                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Book Now</a>
            </p>
        </div>
    </div>    

</div>

        ";
        }




    }

}

?>