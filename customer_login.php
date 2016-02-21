<?php
include("includes/connection.php");
?>

<div>

    <form method="post" action="">
    
    <table width="500" align="center" bgcolor="white" id="login_form">
    <tr align="center">
        <td colspan="3"><h2>Login to your account</h2></td>
    </tr>
    
    <tr>
        <td align="right"><b>Email:</b></td>
        <td><input type="text" name="email" placeholder="Enter email" required/></td>
    </tr>
     <tr>
        <td align="right"><b>Password:</b></td>
        <td><input type="password" name="pass" placeholder="Enter password" required/></td>
    </tr> 
    
    
    <tr align="center">
        <td colspan="3"><input type="checkbox" class="checkbox"> 
                                Keep me signed in</td>
    
    <tr align="center">
        
        <td colspan="3"><input type="submit" name="login" value="Login"/></td>
    </tr>  
    </table>
    
    <h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none; font-family: tahoma; color: #7f8c8d;">New? Register Here</a></h2>
    </form>
    
</div>

<?php

    if(isset($_POST['login'])){
    
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];
        
        $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email = '$c_email'";
        
        $run_c = mysqli_query($con, $sel_c);
        
        $check_customer = mysqli_num_rows($run_c);
        
        if($check_customer == 0){
        
        echo "<script>alert('Password or email is incorrect, plz try again')</script>";
        exit();
        }
        
		$ip = getIp();
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer > 0 AND $check_cart == 0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		
		else{
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
        
    }
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    