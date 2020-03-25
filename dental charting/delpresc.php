<?php 
include('conn.php');
$nid=$_GET['id'];
$nid;
$q=mysqli_query($conn,"DELETE FROM pre_desc WHERE desc_id='$nid'");

header('location:Prescriptions.php');

?>