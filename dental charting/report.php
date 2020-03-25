<?php
session_start();
ob_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
extract($_POST);

if(isset($report)){
	//echo '<script type="text/javascript">print();</script>';

}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Patient Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/datatable.min.css">
  <link rel="stylesheet" href="dist/css/responsive.datatable.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>
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
            <h1>Patient Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Report</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row" id="div_print">

        <div class="col-md-12">
        
         
  
       
       
        
         <div class="col-md-12 ">
        <div class="card card-num">
            <table class="display responsive nowrap table" style="width:100%">
			  <?php 
			  if(isset($_GET['id'])){
			  require("conn.php");
			  $bill_id=$_GET['id'];
			  $sl=mysqli_query($conn, "SELECT * FROM bill WHERE bill_id='$bill_id'");
			  $num=mysqli_num_rows($sl);
			  if($num)
			  {
			  	while($row=mysqli_fetch_assoc($sl)){
			  	$clinic_id=$row['clinic'];
			  	$q=mysqli_query($conn, "SELECT * FROM clanic where id='$clinic_id'");
			  	$res=mysqli_fetch_assoc($q);
			  	 $bill = ($row['payment']=='1') ? "Paid" : "Unpaid" ;
			  	echo '<tr>
				  <th> Status</th>
				  <th> '.$row['status'].'</th>
				 
				</tr><tr>
				  <th> Date</th>
				  <th> '.$row['date'].'</th>
				 
				</tr><tr>
				  <th> clinic</th>
				  <th> '.$res['clanic_name'].'</th>
				 
				</tr><tr>
				  <th> Dentis</th>
				  <th> '.$row['dentist'].'</th>
				 
				</tr>
				<tr>
				  <th> Location</th>
				  <th> '.$row['location'].'</th>
				 
				</tr><tr>
				  <th> Cheif Complaint</th>
				  <th> '.$row['cheif_complaint'].'</th>
				 
				</tr><tr>
				  <th> Sign & Symptoms</th>
				  <th> '.$row['sign_symp'].'</th>
				 
				</tr><tr>
				  <th> Diagnosis</th>
				  <th> '.$row['diagnosis'].'</th>
				 
				</tr><tr>
				  <th> Procedure</th>
				  <th> '.$row['procedure_name'].'</th>
				 
				</tr>
				<tr>
				  <th> Material</th>
				  <th> '.$row['material'].'</th>
				 
				</tr>
				<tr>
				  <th> Prescription</th>
				  <th> '.$row['prescription'].'</th>
				 
				</tr>
				<tr>
				  <th> Total Bill</th>
				  <th> '.$row['total_amount'].' Rs</th>
				 
				</tr>
				<tr>
				  <th> Bill Status</th>
				 
				  <th> '.$bill.'</th>
				 
				</tr>';
			  }
			  }
			  else{
			  echo'<h1>No Record Found</h1>';
			}
			}
			  
			  ?>
				
			  
			</table>
		<form method="post" action="">
			<!--	<input type="submit" name="printlm">-->
			<div><br><br></div>
			<div class="modal-footer">
<input name="b_print" type="button"  class="btn btn-primary"  onClick="printdiv('div_print');" value=" Print ">
				<!--<input type="submit" name="report" class="btn btn-primary" value="Print Report">-->
			  </div>
			 </form>
          </div>
		  </div>
		</div>
		
		<div class="modal fade" id="chief" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form id="updatechief">
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Name Chief:</label>
					<input type="text" class="form-control" name="uname" id="chief_name">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="col-form-label">Description:</label>
					<textarea class="form-control" name="udesc" id="chief_desc"></textarea>
					<input type="text" id="cid" name="uid" class="hide">
				  </div>
				
			  </div>
			  
			  </form>
			</div>
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
                        Copyright © 2018 DentalCharting - <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> - <a href="#" title="Privacy">Privacy</a> - <a href="#" title="Copyright">Copyright</a> - <a href="#" title="Disclaimer">Disclaimer</a> - <a href="#" title="Changelog">Changelog</a>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="dist/js/jquery.datatable.min.js"></script>
<script src="dist/js/datatable.responsive.min.js"></script>
<script src="dist/js/actions.js" type="text/javascript"></script>
<script>


</body>
</html>
