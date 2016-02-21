<!DOCTYPE>

<?php
session_start();
include("functions/functions.php");

?>

<html>
<head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
</head>
<body>




	<!-- Main Container starts here -->

	<div class="main_wrapper">
		<div class="row">

		<!-- header starts here -->

	    <div class="header_wrapper">
	    	<a href="index.php"><img id="logo" src="images/logo.gif" style="height:110px; width: 250px;" /></a>

				<ul class="account_desc">
					
					

	        <?php
	        if(!isset($_SESSION['customer_email'])){
	        
	        echo "<a href='checkout.php' style='font-size:0.823em;
	color:#9C9C9C;
	padding:0 10px;
	font-family: tahoma;
	text-decoration: none;'>Login</a>";
	        
	        }
	        else {
	        echo "<a href='logout.php' style='font-size:0.823em;
	color:#9C9C9C;
	padding:0 10px;
	font-family: tahoma;
	text-decoration: none;'>Logout</a>";
	        }
	        ?>
	        		<li><a href="customer_register.php">Register</a></li>
					<li><a href="checkout.php">Checkout</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
		</div>
			<div class="clear"></div>
		</div>



	    <!-- header ends here -->

	    <!-- navigation starts here -->

	    <div class="menubar">

	    	<ul id = "menu">
	    		<li><a href="index.php">Home</a></li>
	    		<li><a href="cart.php">Shopping Cart</a></li>
	    		<li><a href="#">About Us</a></li>
	    		<li><a href="#">Contact Us</a></li>
	    	</ul>

	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>

	    </div>	



	    <!-- navigation ends here -->

	    <!-- content starts here -->
	    
	    <div class="content_wrapper">
	    
	    <div id="sidebar">

	    	<div id="sidebar_title">Catagories</div>

	    	<ul id="cats">

	    		<?php getCats(); ?>

	    	</ul>

	    	<div id="sidebar_title">Brands</div>

	    	<ul id="cats">

	    		<?php getBrands(); ?>
	    		

	    	</ul>


	    </div>
	    
	    <div id="content_area">
	    
	    <?php cart(); ?>
	    
	    <div id="shopping_cart">
	        <span style="float:right; font-size: 12px; padding: 5px; line-height: 40px;">
	        
	        <?php
	            if(isset($_SESSION['customer_email'])){
	                echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color: black;'>, Your</b>";
	            }
	            else{
	            echo "<b>Welcome Guest</b>";
	            }
	        ?>
	        
	        
	        
	        <b style="color: #E4292F">Shopping Cart</b> Total Items: <?php total_items(); ?>
	        Total Price: <?php total_price(); ?> <a href="cart.php" style="color: #E4292F">Go to Cart</a>
	        
	        <?php
	        if(!isset($_SESSION['customer_email'])){
	        
	        echo "<a href='checkout.php' style='color:orange'>Login</a>";
	        
	        }
	        else {
	        echo "<a href='logout.php' style='color:orange'>Logout</a>";
	        }
	        ?>
	        </span>
	        
	    </div>
	    
	    
	    
	        <div id="products_box">
	        
	        <?php getPro() ?>
	        <?php getCatPro(); ?>
	        <?php getBrandPro(); ?>
	    
	    </div>

		</div>

		<!-- content ends here -->
	    
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+64-000-000000</span></li>
							<li><span>0800-000-0000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>neweshop © All rights Reseverd</p>
		   </div>
    </div>

	<!-- Main Container ends here -->

<a href="#" id="toTop"><span id="toTopHover"> </span></a>


</body>
</html>