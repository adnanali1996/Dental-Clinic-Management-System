<?php 
session_start();
ob_start();

if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
extract($_POST);
include("conn.php");

if (!isset($_GET['p_id'])) {
	# code...
	echo'<h1 style="margin-left:30%; margin-top:20%;" >404 PAGE NOT FOUND ERROR</h1>';
	exit();
}
$p_id=$_GET['p_id'];
if (isset($opslaan)) {
	# code...
	
 	if (isset($_GET['bill_id'])) {
 		# code...
 		$bill_id=$_GET['bill_id'];
 		$sql=mysqli_query($conn, "SELECT * FROM bill WHERE bill_id='$bill_id'");
 		$num=mysqli_num_rows($sql);
 		if ($num) {
 			# code...
 			$res=mysqli_fetch_assoc($sql);
 			$total= $res['amount'];

 			if (filter_var($paybill, FILTER_VALIDATE_INT)) {
 				if ($paybill==$total) {
 					# code...
 				mysqli_query($conn, "UPDATE bill SET amount=0, payment=1 WHERE bill_id='$bill_id'");
 					header("Location:edit_work_done.php?p_id=".$p_id."");
 				}
 				elseif($paybill>$total){
 					echo'<script>alert("Please Pay Bill Equal OR Less Than Total.");</script>';
 				}
 				else{
 					$pay=$total-$paybill;
 					mysqli_query($conn, "UPDATE bill SET amount='$pay', payment=0 WHERE bill_id='$bill_id'");
 					header("Location:edit_work_done.php?p_id=".$p_id."");
 				}
    

				} else {
				    echo'<script>alert("Please Provide Rs in Numbers");</script>';
				}
 			//mysqli_query($conn, "UPDATE bill SET payment='1' WHERE bill_id='$bill_id'");
 		} else {
 			# code...
 			echo'<script>alert("Record Not Found");</script>';
 		}
 		
 		
 	} else {
 		# code...
 		echo'<script>alert("Record Not Found");</script>';
 	}
 	
	
	
	
}
?>





<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Billing Statement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/datatable.min.css">
  <link rel="stylesheet" href="dist/css/responsive.datatable.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <?php include("views/nav-sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 Billing-statements">
            <h1>Pay Billing Statement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pay Billing Statement</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
         <div class="add-maintain">
          
        
          <div class="card">
               <form action="#" method="post" id="cheif" class="add-chief-form">
               
               	<table class="table">
               		<tr>
               			<td>
               				<b>Total Amount</b>
               			</td>
               			<td>
               				<?php if (isset($_GET['bill_id'])) {
               					# code...
               					$bill_id=$_GET['bill_id'];
               					$sql=mysqli_query($conn, "SELECT * FROM bill WHERE bill_id='$bill_id'");
 		$num=mysqli_num_rows($sql);
 		if ($num) {
 			# code...
 			$res=mysqli_fetch_assoc($sql);
 			
 			echo'<input type="text" name="bill" disabled="" value="'.$res['amount'].'">';
 			
 		} else {
 			# code...
 			echo'<script>alert("Record Not Found");</script>';
 		}
               				}?>
               				
               			</td>
               		</tr>
               		<td>
               				<b>Amount You Want To Pay</b>
               			</td>
               			<td>
               				<input type="text" name="paybill" >
               			</td>
               		</tr>

               			<td>
               				<input style="margin-left: 60%;" type="submit" class="btn btn-danger" value="PAY" name="opslaan" >
               			</td>
               		</tr>
               	</table>
              </form>
          </div>
        </div>
          
         
 
    </div>
      <!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">
   
  <div id="footer">
                        Copyright © 2018 Pak Dental - <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> - <a href="#" title="Privacy">Privacy</a> - <a href="#" title="Copyright">Copyright</a> - <a href="#" title="Disclaimer">Disclaimer</a> - <a href="#" title="Changelog">Changelog</a>
                        <br><br>
                    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
