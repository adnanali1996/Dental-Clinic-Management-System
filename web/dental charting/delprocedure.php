<?php 
include('conn.php');
if(isset($_GET['id'])){$nid=$_GET['id'];
$nid;
mysqli_query($conn, "DELETE FROM `procedure_attribute` WHERE attri_id='$nid'");

header('location:Procedures.php');
}
?>