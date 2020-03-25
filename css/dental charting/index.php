<?php
//echo $_SERVER['REQUEST_URI']; 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php include("views/nav-sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
    
        <div class="alert alert-info alert-dismissible">
                 
                  <h5><i class="icon fa fa-info"></i>DentalCharting dashboard!</h5>
                 Welcome <b><?php if(isset($_SESSION['dentist'])){require("conn.php");$id=$_SESSION['dentist'];
                 $my=mysqli_query($conn,"SELECT u_name FROM user WHERE user_id='$id'");
                 $res=mysqli_fetch_assoc($my);echo $res['u_name'];}else{echo"Admin"; } ;?>.</b> I am Greta and I am your personal guide for DentalCharting.<br>
If you need my help please click on the<b> "Click for support"</b> button at the top of each page and I will help you out.<br>
                Click in the menu on <b>"Patients"</b> to get started

                </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card">
             <div class="col-md-12 col-sm-4 col-xs-12">
              <div class="card-header card-today">
                <h3 class="card-title">
                  <i class="fa fa-briefcase"></i>
                 Patient statistics
                </h3>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body">
                <div class="tile_content">
                                <b>Number of patients</b>: <br><?php 
                                require("conn.php");
                                $sql=mysqli_query($conn, "SELECT * FROM patients");
                                $num=mysqli_num_rows($sql);
                                echo $num;
                                
                                ?><br>
                               

                                <b>Today's birthdays:</b> <br> Today's
                               
                                <?php
                                require("conn.php");
                                $todaysmonth=date("m",time());
                                $todaysday=date("d",time()); 
                                $yy=1990;
                                $result=mysqli_query($conn, "SELECT * FROM patients");
                                while ($row=mysqli_fetch_assoc($result)) {
                                  # code...
                                  //echo $row['birdth'];
                                  $bir=$row['birdth'];
                                   $dd=substr($bir, 5,2);
                                   $mm=substr($bir, -2);
                                   if ($mm==$todaysday & $dd=$todaysmonth) {
                                     # code...
                                    echo $name= $row['first_name'].' '.$row['last_name'].' '.$row['middle_name'].' Birthday';
                                   }
                                   else
                                   {
                                    echo"No Birthday Today";
                                   }


                                }
                                ?>
                                <br>
                                <b>Upcoming week's birthdays:</b> <br>
                                <?php
                                require("conn.php");
                                $todaysmonth=date("m",time());
                                $todaysday=date("d",time()); 
                                $yy=1990;
                                $result=mysqli_query($conn, "SELECT * FROM patients");
                                while ($row=mysqli_fetch_assoc($result)) {
                                  # code...
                                  //echo $row['birdth'];
                                  $bir=$row['birdth'];
                                   $dd=substr($bir, 5,2);
                                   $mm=substr($bir, -2);//This fetch day from the date(1990,09,17)
                                   $yy=substr($bir, 0,4);//This fetch Years from the date(1990,09,17)
                                   $bi=$dd.'/'.$mm.'/'.$yy;//This convert the date into this format ('06/22/2009');
                                   $dt = strtotime($bi);
                                  $day = date("D", $dt);
                                   if ($mm!=$todaysday & $dd==$todaysmonth) {
                                     # code...
                                    echo $name= $row['first_name'].' '.$row['last_name'].' '.$row['middle_name'].' Birthday is on Upcoming '.$day.' And DOB is '.$row['birdth'];
                                   }
                                   else
                                   {
                                    echo"<br>No upcoming birthdays<br>";
                                    break;
                                   }


                                }
                                ?><br><a href="Patients.php"><input type="button" value="Show all patients"></a>&nbsp;&nbsp;<button type="button" class="btn btn-default button-invoice reniew-sub"><a href="add-patient.php">+ Add patient</a></button>
                        </div>
             
				 </div>
				</div>
              
              <!-- /.card-body -->
            </div>
			  
         
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-today">
                <h3 class="card-title">
                  <i class="fa fa-calendar"></i>
                 Today's schedule
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tile_content"><b>Today's appointments</b><?php $da=date('Y-m-d');
                $sql=mysqli_query($conn, "SELECT * FROM appointment WHERE date='$da'");
                $count=mysqli_num_rows($sql); echo'<br><br>You have '.$count.' appointments today';?><br><br><a href="appointments.php"><input type="button" value="Show all appointments"></a>&nbsp;&nbsp;<button type="button" class="btn btn-default button-invoice reniew-sub"><a href="schduler.php">+ Add appointment</a></button>
                            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- Main row -->
     
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
