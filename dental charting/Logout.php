<?php

session_start();
if (isset($_SESSION['admin'])) {
	# code...
	unset($_SESSION['admin']);
	header("location: ../index.php");
}
else  {
	# code...
	
unset($_SESSION['dentist']);
	header("location: ../index.php");
}
//header("location: ../index.php");
//echo $admin=$_SESSION['admin'];
//echo $dentist=$_SESSION['dentist_name'];
?>