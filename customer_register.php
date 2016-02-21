<!DOCTYPE>

<?php
session_start();
include("functions/functions.php");
include("includes/connection.php");

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

        <form action="customer_register.php" method="post" enctype="multipart/form-data">
        
            <table align="center" width="750" id="register_form">
            
                <tr align="center">
                    <td colspan="6"><h2>New User Signup!</h2></td>
                </tr>
                
                <tr>
                    <td align="right">Full Name: </td>
                    <td><input type="text" name="c_name" required/></td>
                </tr>
                <tr>
                    <td align="right">Email: </td>
                    <td><input type="text" name="c_email" required/></td>
                </tr>
                <tr>
                    <td align="right">Password: </td>
                    <td><input type="password" name="c_pass" required/></td>
                </tr>
              
                <tr>
                    <td align="right">Contact Number: </td>
                    <td><input type="text" name="c_contact" required/></td>
                </tr>
                <tr>
                    <td align="right">Residential Address: </td>
                    <td><input type="text" name="c_address" required /></td>
                </tr>
                <tr align="center">
                    <td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
                </tr>                
                
        </form>
	    
	    </div>

		</div>

		<!-- content ends here -->
	    

    </div>

	<!-- Main Container ends here -->

<a href="#" id="toTop"><span id="toTopHover"> </span></a>


</body>
</html>

<?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
				
		$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_contact,customer_address) values ('$ip','$c_name','$c_email','$c_pass',$c_contact','$c_address',)";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}





?>