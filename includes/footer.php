<?php
$con = mysqli_connect("localhost", "root", "", "ahdb");
?>


<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="checkout.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="customer_registration.php">Register</a></li>                                        
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Top Product Categories</h4>
                <ul>
                    <?php
                        $get_p_cats = "select * from product_category";
                        $run_p_cats =  mysqli_query($con,$get_p_cats);
                        while($row_p_cat =mysqli_fetch_array($run_p_cats)){
                            $p_cat_id=$row_p_cat['p_cat_id'];
                            $p_cat_title=$row_p_cat['p_cat_title'];
                            echo"<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";

                        }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Where to find us</h4>
                <p>
                    <strong>AutoHub.com</strong>
                    <br>Kalyan
                    <br>Mumbai
                    <br>Maharashtra
                    <br>rakeshgedam204@gmail.com
                    <br>+91 8828602507                    
                </p>
                <a href="contactus.php">Goto Contact Us page</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Get the news</h4>
                <p class="text-muted">Stay Updated with the Latest Automotive Trends!</p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-default" value="Subscribe">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay In Touch</h4>
                <p class="social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="https://type.link/xiyib48974"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/rakeshgedam/"><i class="fab fa-linkedin"></i></a>
                    <a href="mailto:rakeshgedam204@gmail.com"><i class="fas fa-envelope"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div id="copyright"><!--19CC-->
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
            © 2024 <a href="index.php">AutoHub</a>. All Rights Reserved.
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
            All product names, logos, and brands are property of their respective owners.                
            </p>

        </div>
    </div>
    
</div>