<?php
session_start();
include "views/config.php";

/*********** All tables data *************/

//get chief complains from database

if(isset($_POST["cheif_data"])){
	$category_query = "SELECT * FROM chief_complaint";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get chief complains from database end
//get signs from database

if(isset($_POST["sign_data"])){
	$category_query = "SELECT * FROM sign_symptom";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get signs from database end
//get status from database

if(isset($_POST["status_data"])){
	$category_query = "SELECT * FROM status";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get status from database end
//get diagnosis from database

if(isset($_POST["cheiff_data"])){
	$category_query = "SELECT * FROM diagnosis";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get diagnosis from database end
//get material from database

if(isset($_POST["meterial"])){
	$category_query = "SELECT * FROM materials";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get material from database end
//get presription from database

if(isset($_POST["delta"])){

	$category_query = "SELECT * FROM prescriptions";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get prescription from database end
//get presription from database

if(isset($_POST["clanic_data"])){

	$category_query = "SELECT clanic_name FROM clanic";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query) > 0){
		$rows = array();
		while($row = mysqli_fetch_array($run_query)){
			$rows[] = $row;
		}
	}
  	echo json_encode($rows);
}
//get prescription from database end
/*********** All tables data End *************/


/******** Edit data ****************/
//Edit Materials complains from database

if(isset($_POST["keymat"])){
if($_POST["keymat"] == "editmatt"){
	
	$id = $_REQUEST["idmat"];
	$category_query = "SELECT * FROM materials WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$material = array(
		
			'cid' => $row['id'],
			'cname' => $row['abbrev'],
			'conn' => $row['consumables'],
			'prd' => $row['pricing_defined'],
			'prs' => $row['price_s'],
			'prm' => $row['price_m'],
			'prl' => $row['price_l'],
		
		);
	}
  	echo (json_encode($material));
}
}

if(isset($_REQUEST["abbrev"])){
	
	$uid = $_REQUEST["uid"];
	$abbrev = $_REQUEST["abbrev"];
	$conn = $_REQUEST["conn"];
	$ps = $_REQUEST["pd"];
	$pl = $_REQUEST["pl"];
	$pf = $_REQUEST["pf"];
	if(empty($abbrev) || empty($conn) || empty($ps)|| empty($pl)|| empty($pf) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE materials SET abbrev='$abbrev' , consumables = '$conn', pricing_defined='$ps', price_s='$pl', price_m='$pl', price_l='$pf' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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

//Edit chief complains from database end
//Edit status from database

if(isset($_POST["key"])){
if($_POST["key"] == "editChief"){
	
	$id = $_REQUEST["id"];
	$category_query = "SELECT * FROM chief_complaint WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$chief = array(
		
			'cid' => $row['id'],
			'cname' => $row['name'],
			'desc' => $row['description'],
		
		);
	}
  	echo (json_encode($chief));
}
}

if(isset($_REQUEST["uname"])){
	
	$uid = $_REQUEST["uid"];
	$uname = $_REQUEST["uname"];
	$udesc = $_REQUEST["udesc"];
	
	if(empty($uname) || empty($udesc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE chief_complaint SET name='$uname' , description = '$udesc' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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
//Edit Status from database end
//Edit chief complains from database

if(isset($_POST["keymate"])){
if($_POST["keymate"] == "editmatte"){
	
	$id = $_REQUEST["idmate"];
	$category_query = "SELECT * FROM status WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$chief = array(
		
			'cid' => $row['id'],
			'cat' => $row['category'],
			'status' => $row['status'],
			'color' => $row['color'],
			'desc' => $row['description'],
			'dscore' => $row['d_score'],
			'mscore' => $row['m_score'],
			'fscore' => $row['f_score'],
			
		
		);
	}
  	echo (json_encode($chief));
}
}

if(isset($_REQUEST["categoryy"])){
	
	echo $uid = $_REQUEST["uid"];
	echo$categoryy = $_REQUEST["categoryy"];
	echo$statuses = $_REQUEST["statuses"];
	echo$colorr = $_REQUEST["colorr"];
	echo$descc = $_REQUEST["descc"];
	echo$dscoree = $_REQUEST["dscoree"];
	echo$mscoree = $_REQUEST["mscoree"];
	echo$fscoree = $_REQUEST["fscoree"];
	if(empty($categoryy) || empty($statuses||empty($colorr)||empty($descc)||empty($dscoree)||empty($mscoree)||empty($fscoree)) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE status SET category='$categoryy' , status = '$statuses', color='$colorr', description='$descc', d_score='$dscoree', m_score='$mscoree', f_score='$fscoree' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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

//Edit chief complains from database end
//Edit chief complains from database

if(isset($_POST["key"])){
if($_POST["key"] == "editChief"){
	
	$id = $_REQUEST["id"];
	$category_query = "SELECT * FROM chief_complaint WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$chief = array(
		
			'cid' => $row['id'],
			'cname' => $row['name'],
			'desc' => $row['description'],
		
		);
	}
  	echo (json_encode($chief));
}
}

if(isset($_REQUEST["uname"])){
	
	$uid = $_REQUEST["uid"];
	$uname = $_REQUEST["uname"];
	$udesc = $_REQUEST["udesc"];
	
	if(empty($uname) || empty($udesc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE chief_complaint SET name='$uname' , description = '$udesc' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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

//Edit chief complains from database end
//Edit diagnosis from database

if(isset($_POST["keyd"])){
if($_POST["keyd"] == "editD"){
	
	$id = $_REQUEST["idDI"];
	$category_query = "SELECT * FROM diagnosis WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$chief = array(
		
			'cid' => $row['id'],
			'cname' => $row['abbrev'],
			'cnam' => $row['diagnosis'],
			'desc' => $row['description'],
		
		);
	}
  	echo (json_encode($chief));
}
}

if(isset($_REQUEST["abbre"])){
	
	$uid = $_REQUEST["uid"];
	$uname = $_REQUEST["abbre"];
	$uname1 = $_REQUEST["diagn"];
	$udesc = $_REQUEST["diagd"];
	
	if(empty($uname) || empty($udesc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE diagnosis SET abbrev='$uname' , diagnosis='$uname1', description = '$udesc' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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

//Edit diagnosis from database end
//Edit signs & symtoms from database

if(isset($_POST["keysign"])){
	$id = $_REQUEST["id"];
	$category_query = "SELECT * FROM sign_symptom WHERE id='$id'";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		$row = mysqli_fetch_array($run_query);
			
		$chief = array(
		
			'cid' => $row['id'],
			'cname' => $row['name'],
			'desc' => $row['description'],
		
		);
	}
  	echo (json_encode($chief));
}

if(isset($_REQUEST["sid"])){
	
	$uid = $_REQUEST["sid"];
	$uname = $_REQUEST["sname"];
	$udesc = $_REQUEST["sdec"];
	
	if(empty($uname) || empty($udesc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "UPDATE sign_symptom SET name='$uname' , description = '$udesc' WHERE id='$uid'";
        $result = mysqli_query($con,$sql) ; 
	   if ($result) 
	{
		echo "update_success";
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

//Edit signs & symtoms from database end
/******** Edit data ****************/

/******** delete data ****************/

//Del  Material from database

if(isset($_POST["delMat"])){
	
	$id = $_REQUEST["idm"];
	$del_query = "DELETE FROM materials WHERE id='$id'";
    $result = mysqli_query($con,$del_query) ; 
	if ($result) 
	{
   		echo "del_success";
		exit();
	}
}

//Del Material from database end
//Del  Material from database

if(isset($_POST["delS"])){
	
	$id = $_REQUEST["ids"];
	$del_query = "DELETE FROM status WHERE id='$id'";
    $result = mysqli_query($con,$del_query) ; 
	if ($result) 
	{
   		echo "del_success";
		exit();
	}
}

//Del Material from database end
//Del  Prescription from database

if(isset($_POST["delPRE"])){
	
	$id = $_REQUEST["idpre"];
	$del_query = "DELETE FROM prescriptions WHERE id='$id'";
    $result = mysqli_query($con,$del_query) ; 
	if ($result) 
	{
   		echo "del_success";
		exit();
	}
}

//Del Prescription from database end
//Del  diagnosis from database

if(isset($_POST["delDiag"])){
	
	$id = $_REQUEST["idD"];
	$del_query = "DELETE FROM diagnosis WHERE id='$id'";
    $result = mysqli_query($con,$del_query) ; 
	if ($result) 
	{
   		echo "del_success";
		exit();
	}
}

//Del diagnosis from database end
//Del chief complains from database

if(isset($_POST["delChief"])){
	
	$id = $_REQUEST["id"];
	$del_query = "DELETE FROM chief_complaint WHERE id='$id'";
	 $result = mysqli_query($con,$del_query) ; 
	   if ($result) 
	{
  		echo "del_success";
		exit();
	}
}

//Del chief complains from database end
if(isset($_POST["delsign"])){
	
	$id = $_REQUEST["id"];
	$del_query = "DELETE FROM sign_symptom WHERE id='$id'";
	 $result = mysqli_query($con,$del_query) ; 
	   if ($result) 
	{
  		echo "del_success";
		exit();
	}
}

//Del chief complains from database end

/******** delete data end ****************/


/******** Add data ****************/

//Add cheif complains in Database

if(isset($_REQUEST["cname"])){
	
	$cname = $_REQUEST["cname"];
	$desc = $_REQUEST["desc"];
	
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
if(isset($_REQUEST["cname"])){
	
	$cname = $_REQUEST["cname"];
	$desc = $_REQUEST["desc"];
	
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

if(isset($_REQUEST["con"])){
	
	 $abbrev = $_REQUEST["option3"];
	 $diagnosis = $_REQUEST["option4"];
	 $desc = $_REQUEST["option5"];
	if(empty($abbrev) || empty($diagnosis)||empty($desc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "INSERT INTO diagnosis
 	VALUES (' ', '$abbrev','$diagnosis', '$desc')";
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


if(isset($_REQUEST["option3"])){
	
	 $abbrev = $_REQUEST["option3"];
	 $diagnosis = $_REQUEST["option4"];
	 $desc = $_REQUEST["option5"];
	if(empty($abbrev) || empty($diagnosis)||empty($desc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "INSERT INTO diagnosis
 	VALUES (' ', '$abbrev','$diagnosis', '$desc')";
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
if(isset($_REQUEST["option3"])){
	
	 $abbrev = $_REQUEST["option3"];
	 $diagnosis = $_REQUEST["option4"];
	 $desc = $_REQUEST["option5"];
	if(empty($abbrev) || empty($diagnosis)||empty($desc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "INSERT INTO diagnosis
 	VALUES (' ', '$abbrev','$diagnosis', '$desc')";
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
if(isset($_REQUEST["sname"])){
	
	$cname = $_REQUEST["sname"];
	$desc = $_REQUEST["sdesc"];
	
	if(empty($cname) || empty($desc) ) {
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	}
	$sql = "INSERT INTO sign_symptom(name,description)
 	VALUES ('$cname','$desc')";
        $result = mysqli_query($con,$sql); 
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

/******** Add data end ****************/



?>