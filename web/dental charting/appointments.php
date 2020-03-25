<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Signs and symptoms</title>
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
            <h1>Appointments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Appointments</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-12 ">
         <div class="add-maintain">
        	<a href="schduler.php"><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add Appointments
			  </button></a>
				
          </div>
          </div>
        
       	<div class="col-md-12 ">
        <div class="card card-num">
            <table>
            	<tr style="background-color: #595957; color: white;">
            		<th>
            			Appointment ID
            		</th>
            		<th>
            			Paitent ID
            		</th>
            		<th>
            			Paitent Name
            		</th>
            		<th>
            			Clinic Name
            		</th>
            		<th>
            			Doctor Name
            		</th>
            		<th>
            			Date
            		</th>
            		<th>
            			Time Slot
            		</th>
            		<th>
            			Action
            		</th>
            	</tr>
            	  <?php

 require("conn.php");
            if (isset($_GET['p_id'])) {
              # code...
              $p_id=$_GET['p_id'];
               $q=mysqli_query($conn,"SELECT * FROM appointment WHERE id='$p_id'");
             while ($row=mysqli_fetch_assoc($q)) {
             $id=$row['id'];

             $q1=mysqli_query($conn, "SELECT * FROM patients WHERE id='$id'");
             $row1=mysqli_fetch_assoc($q1);
             $name=$row1['first_name'].' '.$row1['middle_name'].' '.$row1['last_name'];
             $clanic_id=$row['clinic_id'];
             $q2=mysqli_query($conn, "SELECT * FROM clanic WHERE id='$clanic_id'");
             $row2=mysqli_fetch_assoc($q2);
             $user_id=$row['user_id'];
              $q3=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
             $row3=mysqli_fetch_assoc($q3);
             echo '<tr><td>'.$row['appointment_id'].'</td>
              <td>'.$id.'</td>
              <td>'.$name .'</td><td>'.$row2['clanic_name'] .'</td><td>'.$row3['u_name'].'</td><td>'.$row['date'].'</td><td>'.$row['time_slot'].'</td><td><a href="edit_appointment.php"><a href="editappointment.php?id='.$row['appointment_id'].'"><img src="edit.gif"></a>&nbsp;&nbsp;<a href="delappointment.php?id='.$row['appointment_id'].'"><img src="del.gif"></a></td></tr>';
         }
            } 
            elseif(isset($_SESSION['dentist'])){
              $p_id=$_SESSION['dentist'];
            $q=mysqli_query($conn,"SELECT * FROM appointment WHERE user_id='$p_id'");
            $nu=mysqli_num_rows($q);
            if (!$nu) {
              # code...
              echo'<h1>You Have No Appointment! ';
            }
             while ($row=mysqli_fetch_assoc($q)) {
             $id=$row['id'];

             $q1=mysqli_query($conn, "SELECT * FROM patients WHERE id='$id'");
             $row1=mysqli_fetch_assoc($q1);
             $name=$row1['first_name'].' '.$row1['middle_name'].' '.$row1['last_name'];
             $clanic_id=$row['clinic_id'];
             $q2=mysqli_query($conn, "SELECT * FROM clanic WHERE id='$clanic_id'");
             $row2=mysqli_fetch_assoc($q2);
             $user_id=$row['user_id'];
              $q3=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
             $row3=mysqli_fetch_assoc($q3);
             echo '<tr><td>'.$row['appointment_id'].'</td>
              <td>'.$id.'</td>
              <td>'.$name .'</td><td>'.$row2['clanic_name'] .'</td><td>'.$row3['u_name'].'</td><td>'.$row['date'].'</td><td>'.$row['time_slot'].'</td><td><a href="edit_appointment.php"><a href="editappointment.php?id='.$row['appointment_id'].'"><img src="edit.gif"></a>&nbsp;&nbsp;<a href="delappointment.php?id='.$row['appointment_id'].'"><img src="del.gif"></a></td></tr>';
         }
            }
            else {
              # code...
              $q=mysqli_query($conn,"SELECT * FROM appointment");
             while ($row=mysqli_fetch_assoc($q)) {
             $id=$row['id'];

             $q1=mysqli_query($conn, "SELECT * FROM patients WHERE id='$id'");
             $row1=mysqli_fetch_assoc($q1);
             $name=$row1['first_name'].' '.$row1['middle_name'].' '.$row1['last_name'];
             $clanic_id=$row['clinic_id'];
             $q2=mysqli_query($conn, "SELECT * FROM clanic WHERE id='$clanic_id'");
             $row2=mysqli_fetch_assoc($q2);
             $user_id=$row['user_id'];
              $q3=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
             $row3=mysqli_fetch_assoc($q3);
             echo '<tr><td>'.$row['appointment_id'].'</td>
              <td>'.$id.'</td>
              <td>'.$name .'</td><td>'.$row2['clanic_name'] .'</td><td>'.$row3['u_name'].'</td><td>'.$row['date'].'</td><td>'.$row['time_slot'].'</td><td><a href="edit_appointment.php"><a href="editappointment.php?id='.$row['appointment_id'].'"><img src="edit.gif"></a>&nbsp;&nbsp;<a href="delappointment.php?id='.$row['appointment_id'].'"><img src="del.gif"></a></td></tr>';
         }
            }
            
             

            	?>
            </table>
          </div>
		  </div>
        
        		<div class="modal fade" id="sign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form id="updatesign">
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Name Sign:</label>
					<input type="text" class="form-control" name="uname" id="chief_name">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="col-form-label">Description:</label>
					<textarea class="form-control" name="udesc" id="chief_desc"></textarea>
					<input type="text" id="cid" name="uid" class="hide">
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" value="Update">
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
