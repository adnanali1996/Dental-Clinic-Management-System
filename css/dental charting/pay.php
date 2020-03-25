<?php 
extract($_POST);
include("conn.php");
$p_id=$_GET['p_id'];
if (isset($pays)) {
	# code...
 	if (isset($_GET['bill_id'])) {
 		# code...
 		$bill_id=$_GET['bill_id'];
 		$sql=mysqli_query($conn, "SELECT * FROM bill WHERE bill_id='$bill_id'");
 		$num=mysqli_num_rows($sql);
 		if ($num) {
 			# code...

 			mysqli_query($conn, "UPDATE bill SET payment='1' WHERE bill_id='$bill_id'");
 		} else {
 			# code...
 			echo'<script>alert("Record Not Found");</script>';
 		}
 		
 		
 	} else {
 		# code...
 		echo'<script>alert("Record Not Found");</script>';
 	}
 	
	
	
	header("Location:edit_work_done.php?p_id=".$p_id."");
}
?>