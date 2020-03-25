<?php 
extract($_POST);
include('dental charting/conn.php');
session_start();
ob_start();


if(isset($opslaan))
{
	

	if($Email=="" || $Password=="")
	{
	$err="<font color='red'>Please Fill All The Fields !</font>";
	}
	elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
		$err="<font color='red'>Invalid Email !</font>";

	}
	elseif(!filter_var($Password, FILTER_SANITIZE_STRING)){
		$err="<font color='red'>Invalid Password !</font>";

	}
	else
	{
      $pass=md5($Password);	
      
      $sql = "SELECT * FROM user where u_email='$Email' and u_pass='$pass'";
      $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
               
                //echo $row['email'];
                $_SESSION['dentist_name']=$row['u_name'];
                $_SESSION['dentist']=$row['user_id'];
                
               
                  
               header('location: dental charting');

            }
        
        } else {

        		$sql1 = "SELECT * FROM admin where user_name='$Email' and password='$pass'";
      $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $email=$row['user_name'];
                
                
                $_SESSION['admin']=$email;
                
                 
                 
               header('location: dental charting');
            }
        
        }
        else{
        	
       
        	echo "<script>alert('Wrong Email or Password !');</script>";
        	
        
        }
    
        }  

	}


}?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Pak Dental | Signin</title>

	<!-- For-Mobile-Apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Flat Login & Register Forms Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps -->

	<!-- Style --> <link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />

	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>PAK DENTAL LOGIN </h1>

	<div class="container w3layouts agileits">

		<div class="login w3layouts">
			<form action="#" method="post">
				<label>Email</label>
				<input type="text" class="user" name="Email" placeholder="Email" required="">
				<label>Password</label>
				<input type="password" class="pass" name="Password" placeholder="Password" required="">
			<ul>
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
				</li>
			</ul>
			<input type="submit" name="opslaan" value="LOGIN"></form>
			<div class="clear"></div>
		</div>

		

		
	</div>

	<div class="footer">
		
		<p>© 2018 Pak Dental. All rights reserved </a></p>

	
	</div>

	<!-- Custom-JavaScript-File-Links -->
		<script src="js/jquery-2.1.4.min.js"></script>
		<!-- pop-up-box -->
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
				});
			</script>
		<!--//pop-up-box -->
	<!-- //Custom-JavaScript-File-Links -->

</body>
<!-- //Body -->

</html>