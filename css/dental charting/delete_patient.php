<?php 
include('conn.php');
$nid=$_GET['id'];

//$q=mysqli_query($conn,"delete from blogs where id='$nid'");

header('location:Patients.php?id');

?>