<?php 
include('conn.php');
$nid=$_GET['id'];

mysqli_query($conn,"delete from user where user_id='$nid'");

header('location:Manage.php');

?>