<?php
session_start();
include "views/config.php";

//get chief complains from database

//if(isset($_POST["cheif_data"])){
	$category_query = "SELECT * FROM chief_complaint";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
//			$data["ccname"] = $row["name"];
//			$data["ccdesc"] = $row["description"];
//			$ccname = $row["name"];
//			$ccdesc = $row["description"];
//			echo "
//				<tr>
//				  <td>$ccname</td>
//				  <td>$ccdesc</td>
//				  <td><a href='#'><i class='fa fa-pencil'></i> &nbsp; <i class='fa fa-remove cross-btn'></i></a></td>
//				</tr>
//			";
//			$name['name'] = ['ccname' => $row['name'] , 'ccdesc' => $row['description']];
//			$data = ['data' => $name['name']];
			
//			$table.='{"name":"'.$row['name'].'","desc":"'.$row['description'].'"}';
			$rows[] = $row;
			
		}
		
	}
  	echo json_encode($rows);

//$table = substr($table,0, strlen($table) -1);
////	$table = str_replace("","'\'",$table);
//   $table = json_encode($table);
//
//	echo '{"data":['.$table.']}';
//}
//get chief complains from database end

//Add cheif complains in Database

if(isset($_POST["cname"])){
	
	$cname = $_POST["cname"];
	$desc = $_POST["desc"];
	
	if(empty($cname) || empty($desc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "INSERT INTO chief_complaint(name,description)
 	VALUES ('$cname','$desc')";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "add_success";
		exit();
	}
	 else
	 {
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Not Added!</b>
			</div>
		";
		exit();
	 }
}

//Add cheif complains in Database End


?>