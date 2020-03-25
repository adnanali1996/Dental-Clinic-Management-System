<?php
session_start();

if (isset($_SESSION['admin'])) {
	# code...
	unset($_SESSION['admin']);
	header("location: ../index.php");
}
elseif (isset($_SESSION['dentist'])) {
	# code...
	echo $_SESSION['dentist'];
	unset($_SESSION['dentist_name']);
	header("location: ../index.php");
}
//echo $admin=$_SESSION['admin'];
//echo $dentist=$_SESSION['dentist_name'];
?>