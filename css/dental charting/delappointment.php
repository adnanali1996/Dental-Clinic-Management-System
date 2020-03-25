<?php 
include('conn.php');
$nid=$_GET['id'];
$nid;
$q=mysqli_query($conn,"DELETE FROM appointment WHERE appointment_id='$nid'");

header('location:appointments.php');

?>