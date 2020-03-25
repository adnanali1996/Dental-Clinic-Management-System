<?php
extract($_POST);
require("conn.php");
if (isset($opslaan)) {
  # code...
$id2=$_GET['id'];
    # code...
    if (!empty($location)AND!empty($clanics)AND!empty($date)AND!empty($type) AND!empty($patient_id)) {
      # code...
      $q=mysqli_query($conn, "SELECT * FROM patients WHERE id=3");
      echo$num=mysqli_num_rows($q);
      if ($num) {
        # code...
       
        // echo $location.'<br>'.$clanics.'<br>'.$date.'<br>'.$type.'<br>'.$patient_id.'<br>'.$title;

         if(isset($from) AND isset($till)){
          $timeslot= $from.'-'.$till;
        
         
         
          $q1=mysqli_query($conn, "UPDATE appointment SET clinic_id='$location', user_id='$clanics', id='$patient_id', date='$date', time_slot='$timeslot', type='$type', description='$title' WHERE appointment_id='$id2'");
          


      
         }
         else{
           $q1=mysqli_query($conn, "UPDATE appointment SET clinic_id='$location', user_id='$clanics', id='$patient_id', date='$date', time_slot='ALL DAY', type='$type', description='$title' WHERE appointment_id='$id2'");
         
         }
    }
    else{
      echo '<script type="text/javascript">alert("Patient is Not Found With This Patient ID");</script>';
      }
  }
    else{
      echo '<script type="text/javascript">alert("Please Fill All Fields.");</script>';
      }
    
    
   
  }
 
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Schduler</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php include("views/nav-sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Schduler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Schduler</li>
            </ol>
          </div>
        </div>
      </div>
    
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <?php if (!isset($_GET['id'])) {
                            # code...
                            echo'<h1> No Record Found</h1>';
                            exit();
                          }else{$appointment_id=$_GET['id'];
                            $qe=mysqli_query($conn, "SELECT * FROM appointment WHERE appointment_id='$appointment_id'");
                    $num=mysqli_num_rows($qe);
                    if (!$num) {echo'<h1> No Record Found</h1>';exit();}
                          }?>
          <table border="0" width="100%" class="add_edit_del_table" style="opacity:1; filter:alpha(opacity=100);">
                    <form accept="" method="post">
                    <tbody><tr>
                        <td class="table_subheader" colspan="6">Add appointment:
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Location</b>:</td>
                        <td class="table_content">
                          <select id="location" name="location" class=" vendor form-control" style="width: 33%">
                                               
	               
                          <?php
                          require("conn.php");

                          $q=mysqli_query($conn, "SELECT * FROM clanic");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['id'].'">'.$row['clanic_name'].'</option>';
                          }



                          ?>                                          
												   
       
                                      
                                        </select>
         
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Staff</b>:</td>
                        <td class="table_content">
                       <select id="clanics" name="clanics" class=" vendor form-control"  style="width: 33%">
                                               
	               
                                                   
       
                                      
                                        </select>
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>All day</b>:</td>
                        <td class="table_content">
                            <input type="radio" onclick="disa();" name="all_day" value="yes" class="all_day_yes_no" id="all_day_1"> <label for="all_day_1">Yes</label>
                            
                            <input type="radio" onclick="ena();" name="all_day" value="no" class="all_day_yes_no" id="all_day_0" checked=""> <label for="all_day_0">No</label>
                            <script type="text/javascript">
                              function disa() {
                                // body...
                                 document.getElementById("from").disabled = true;
                                  document.getElementById("till").disabled = true;
                              }
                              function ena(){
                                document.getElementById("from").disabled = false;
                                  document.getElementById("till").disabled = false;
                              }
                            </script>
                        </td>
                    </tr>
                    <tr><td><b> Date</b></td>
                      <td><div class="col-md-3 form-vender invoice-input " style="padding: 0px;">  
         <input type="date" style="width: 70px; "  name="date" class="datepicker hasDatepicker ">
           <i class="fa fa-calendar"></i>
          
          </div></td></tr>
                    <tr><?php
                    require("conn.php");
                    if (isset($_GET['id'])) {
                      # code...
                        $appointment_id=$_GET['id'];
                   
                    $qe=mysqli_query($conn, "SELECT * FROM appointment WHERE appointment_id='$appointment_id'");
                    $num=mysqli_num_rows($qe);
                    if ($num) {
                      # code...
                       while ($row3=mysqli_fetch_assoc($qe)) {
                      # code...
                     $timeslot=$row3['time_slot'];
                     $from=substr($timeslot, 0,5);
                     $till=substr($timeslot, 6,8);
                      
                      echo '<td class="table_content" width="140px"><b>From</b>:</td>
                        <td class="table_content">
                            
                            
                            <input type="text" name="from" id="from" style="width: 35px;" value="'.$from.'"class="edit_appointment_time_input" maxlength="5" name="from_hour_min"  placeholder="07:45"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                        </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Till</b>:</td>
                        <td class="table_content">
                          
                            
                            <input type="text" name="till" id="till" style="width: 35px;" value="'.$till.'"class="edit_appointment_time_input" maxlength="5" name="till_hour_min" placeholder="08:00"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Type</b>:</td>
                        <td class="table_content">
                            <select class="type" name="type" class=" vendor form-control"  style="width: 33%">
                                               
                 
                                                   <option value="Meeting">Meeting</option>
                          <option value="Other"> --Other--</option>
                           <option value="Patient appointment">Patient appointment</option>
       
                                      
                                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"> <b>Patient ID:</b> 
                            <input type="hidden" name="patient_id" value="" class="patient_id">
                            

                            <span class="patient_id_link">
                            </span></td>
                        <td class="table_content">
                           <input type="text" style="width: 200px" name="patient_id" value="'.$row3['id'].'" class="patient_id" >
                           
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Description</b>:</td>
                        <td class="table_content"><textarea style="width: 200px; height: 100px" name="title">'.$row3['description'].'</textarea> <span class="mandatory_field">*</span></td>
                    </tr>';

                    
                    }
                    }
                    else{
                      echo '<h1>No Appointment Found';
                      exit();
                    }
                    
                   
                    }
                    else
                    {
                      echo '<h1>No Appointment Found';
                      exit();
                    }
                  
                    ?>
                        
                        
                    
                    
                    
                </tbody></table>
              
          <!-- /.col -->
          <table border="0" width="100%" class="add_edit_del_table_buttons" style="opacity:1; filter:alpha(opacity=100);">
                <tbody><tr>
                    <td><input type="submit" name="opslaan" value="Update" class="primary-button">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    
                </tr>
                </tbody></table>
                </form>
         
          
        </div>
        <!-- /.row -->
        
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
<script src="dist/js/adnan.js" type="text/javascript"></script>
<!-- Page specific script -->
</body>
</html>
