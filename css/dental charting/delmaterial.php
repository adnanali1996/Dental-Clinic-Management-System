<?php 
include('conn.php');
if(isset($_GET['id'])){$nid=$_GET['id'];
$nid;
$q1=mysqli_query($conn, "SELECT * FROM material_per_price WHERE per_price_id='$nid'");
$num=mysqli_num_rows($q1);
if($num==1){
	$row=mysqli_fetch_assoc($q1);
	$sub_attri=$row['sub_attri_id'];
	$q=mysqli_query($conn,"DELETE FROM material_sub_attri WHERE sub_attri_id='$sub_attri'");

}
$q=mysqli_query($conn,"DELETE FROM material_per_price WHERE per_price_id='$nid'");

}
elseif(isset($_GET['id1'])){$nid=$_GET['id1'];
$q1=mysqli_query($conn, "SELECT * FROM material_by_amount WHERE by_amount_id='$nid'");
$num=mysqli_num_rows($q1);
if($num==1){
	$row=mysqli_fetch_assoc($q1);
	$sub_attri=$row['sub_attri_id'];
	$q=mysqli_query($conn,"DELETE FROM material_sub_attri WHERE sub_attri_id='$sub_attri'");

}
$q=mysqli_query($conn,"DELETE FROM material_by_amount WHERE by_amount_id='$nid'");
}
elseif(isset($_GET['id2'])){$nid=$_GET['id2'];

$q1=mysqli_query($conn, "SELECT * FROM material_by_length WHERE material_length_id='$nid'");
$num=mysqli_num_rows($q1);
if($num==1){
	$row=mysqli_fetch_assoc($q1);
	$sub_attri=$row['sub_attri_id'];
	$q=mysqli_query($conn,"DELETE FROM material_sub_attri WHERE sub_attri_id='$sub_attri'");

}
$q=mysqli_query($conn,"DELETE FROM material_by_length WHERE material_length_id='$nid'");
}
else{}


 $nid;


header('location:Materials.php');

?>