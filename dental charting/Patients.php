<?php

session_start();
ob_start();

if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
if (isset($_GET['id']) and $_GET['id']>0) {
  # code...
include('conn.php');
$nid=$_GET['id'];
$q=mysqli_query($conn,"delete from patients where id='$nid'");

//header('location:Patients.php');

}
?>
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Patients</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!--    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">-->
  <!-- Theme style -->
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
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
        
          <div class="col-sm-6 ">
            
            <h1 class="patient-button">Patients</h1>
			            
                       
                          <a href="add-patient.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add patient</button></a>
			 

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Patients</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
           <div class="card card-num">
           
            <!-- /.card-header -->
            <table id="example" class="display responsive nowrap" style="width:100%">
        <thead class="data-table">
            <tr>
                <th>Patient ID</th>
                <th>Last, middle name</th>
                <th>First name</th>
                <th>	Date of birth</th>
                
                <th>	Dentist</th>
                <th>City</th>
                <th>	Citizenship</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php 
          require("conn.php");
          $sql=mysqli_query($conn, 'SELECT * FROM patients');
          while ($row=mysqli_fetch_assoc($sql)) {
            # code...
            echo '<tr>
          
                <td><a href="record1.php?p_id='.$row['id'].'#">'.$row['id'].'</a></td>
                  <td>'.$row['last_name'].','.$row['middle_name'].'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['birdth'].'</td>
                
                <td>2011/04/25</td>
                <td>'.$row['city'].'</td>
                <td>'.$row['nationality'].'</td>
                <td> <a href="Patients.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button></a></td>
            </tr>';
          }
          ?>
            
            
              </tbody>
    </table>
            <!-- /.card-body -->
            
          </div>


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


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!--
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
 Bootstrap 4 
-->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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
<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
</body>
</html>
