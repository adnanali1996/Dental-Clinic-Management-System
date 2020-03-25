<?php 
include('conn.php');
$nid=$_GET['id'];

$q=mysqli_query($conn,"delete from status where id='$nid'");

header('location:Statuses.php');

?>