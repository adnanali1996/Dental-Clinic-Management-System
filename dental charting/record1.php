<?php
//echo $_SERVER['REQUEST_URI']; 
include("conn.php");
session_start();
ob_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Patient record</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




     
<!--        <link rel="stylesheet" href="https://dentalcharting.com/css/sherpa/reset.css">-->
            <link rel="stylesheet" href="https://dentalcharting.com/style-print.css?v=5.0.2.1" type="text/css" media="print">
         
            <link rel="stylesheet" href="https://dentalcharting.com/style2.css?v=5.0.2.1" type="text/css" media="screen">
            <link rel="stylesheet" href="https://dentalcharting.com/css/jquery-ui.css?v=5.0.2.1">
        <!--[if lt IE 7]>
            <link rel="stylesheet" href="https://dentalcharting.com/style-ie.css?v=5.0.2.1" type="text/css">
        <![endif]-->


        <link rel="shortcut icon" href="https://dentalcharting.com/favicon.ico">
            <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.8.3.min.js"></script>
            <script type="text/javascript">
            var jquery_1_8_3 = jQuery.noConflict();
            </script>
        <script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/jquery-ui-1.8.24.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/jquery.ui.touch-punch.min.js"></script>
        <!--<script type="text/javascript" src="https://dentalcharting.com/js/jquery.collapser.js"></script>-->
        <script type="text/javascript" src="https://dentalcharting.com/js/jquery.autocomplete.js"></script>

        <!-- Sherpa menu -->
<!--        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>-->
        <!-- Einde sherpa menu -->


        
        <script type="text/javascript" src="https://dentalcharting.com/js/functions.js?v=5.0.2.1"></script>
        


        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.js"></script>

        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.silverlight.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.flash.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.html4.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.html5.js"></script>
        
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/i18n/en.js"></script>

        <script type="text/javascript" src="https://dentalcharting.com/js/upload-single-document.js?v=5.0.2.1"></script>
        
        <script type="text/javascript" src="https://dentalcharting.com/js/highcharts/highcharts.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/highcharts/highcharts-more.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/highcharts/modules/exporting.js"></script>
        <script src="https://dentalcharting.com/js/jquery.multiple.select.js?v=5.0.2.1"></script>
        <link rel="stylesheet" href="https://dentalcharting.com/css/multiple-select.css?v=5.0.2.1"><script type="text/javascript" src="https://dentalcharting.com/js/jquery.livequery.js"></script><script type="text/javascript" src="https://dentalcharting.com/js/jquery.dg-magnet-combo-1.1.1.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/zoombox.js"></script>
            <link rel="stylesheet" href="https://dentalcharting.com/css/zoombox.css" type="text/css" media="screen">

            <script type="text/javascript" src="https://dentalcharting.com/js/jquery.upload-1.0.2.js"></script>

	
	</head>

<body class="hold-transition sidebar-mini">
<?php include("views/nav-sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 Billing-statements">
            <h1>Patient Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="Patients.php">Patient</a></li>
              <li class="breadcrumb-item active">Patient Record</li>
            </ol>
          </div>
        </div>
        
      </div>
      
      <div id="overview_tab" style="/*position: relative;*/ ">
        <div class="col-md-12 form-vender vender-margin patient-name"> 
          <div class="col-md-2 form-vender vender-margin patient-name" style="width: 110px;">     
   
		  </div>
		    <div class="col-md-10 form-vender vender-margin patient-name">
    <div class="patient_summary_details">
        <div style="float: left; padding-bottom: 10px;">
         <?php 
         if (isset($_GET['p_id'])) {
         	# code...
         	$p_id=$_GET['p_id'];
         	include("conn.php");
        $sql=mysqli_query($conn, "SELECT * FROM patients WHERE id='$p_id'");
        $res=mysqli_fetch_assoc($sql);
        $num=mysqli_num_rows($sql);
        if ($num) {
        	# code...
        	$name=$res['first_name'].' '.$res['middle_name'].' '.$res['last_name'];
        $res=mysqli_fetch_assoc($sql);echo '<span style="font-size: 30px; text-shadow: 0 -1px 0 #ffffff;">'.$name.'  </span>';
        } else {
        	# code...
        	echo '<h1>No Record Found</h1>';
        	exit();
        }
        
        
            
         } else {
         	# code...
         	echo '<h1>No Record Found</h1>';
         	exit();
         }
         ?>
        
        </div>

        <!--<div class="patient_summary_print_record">-->
        <!--    <input class="print-chart" type="button" value="Print entire record" name="Print chart" title="Click to print record" style="cursor: pointer;">-->
        <!--</div>-->
        
        

        <div style="float: left; clear: both;">
            <ul>
                <li class="heading">
                    General
                </li>
                <li><?php if(isset($_GET['p_id'])){$id=$_GET['p_id']; $sql=mysqli_query($conn,"SELECT status, DATE_FORMAT(birdth, '%D %M') as d FROM patients where id='$id'");$res=mysqli_fetch_assoc($sql);
                echo' <i class="fa fa-user"></i> &nbsp; &nbsp;Status:'; echo $res['status'];echo'</li> <li>'; echo '  <i class="fa fa-birthday-cake"></i> &nbsp; &nbsp;Birthday:
                ';echo $res['d'];echo'</li>';
                }?>
                  
                
               
                   
            </ul>
        </div>

      
        <div class="patient_summary_details_checklist">
            <ul>
                <li class="heading">
                    Charting
                </li>
                <li>
                    
                <li>
                    <div class="patient_summary_details_checklist_green">&nbsp;</div>
                    Work done chart
                </li>
            </ul>
        </div>
           
        <!--<div style="float: left;">-->
        <!--<ul>-->
        <!--<li class="heading">-->
        <!--    Scheduler-->
        <!--</li>-->
        <!--<li>-->
        <!--<i class="fa fa-calendar"></i> &nbsp;Next app.: none</li>-->
        <!--<li>-->
        <!--<i class="fa fa-briefcase"></i> &nbsp;Last treated: 2013-08-16-->
        <!--</li>-->
        <!--</ul>-->
        <!--</div>-->
        <div class="patient_summary_details_checklist">
           
        </div>            
            
    </div>
		  </div>
		  </div>
        </div>
      
      
<div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills ml-auto p-2 tab-pills" style="margin: 0px !important;
    width: 100%;">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">PP</a></li>
                   <li class="nav-item"><a class="nav-link" href="edit_work_done.php?p_id=<?php echo $_GET['p_id'];?>" >Work done</a></li>
                        <li class="nav-item"><a class="nav-link" href="billed.php?p_id=<?php echo $_GET['p_id']; ?>" data-toggle="tab">Billed</a></li>
                         <li class="nav-item"><a class="nav-link" href="unbilled.php?p_id=<?php echo $_GET['p_id']; ?>" data-toggle="tab">Unbilled</a></li>
                         <?php 
                         if (isset($_GET['p_id'])) {
                         	# code...
                         	 $p_id=$_GET['p_id'];
          echo '<li class="nav-item"><a class="nav-link" href="appointments.php?p_id='.$p_id.'">Appointments</a></li>';

                         }
       
        ?>
                          
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  <div class="tab_group_tab_content  active" id="patient_profile_tab">
                <table width="100%" class="tab_content-1">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record" colspan="3">
                                Patient Profile

                                <span class="action_buttons" style="float: right;">
                                   <a href="#"><i class="fa fa-print"></i></a>
                                </span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
      <?php 
        $p_id=$_GET['p_id'];
        include("conn.php");
        $sql1=mysqli_query($conn, "SELECT * FROM patients WHERE id='$p_id'");
        $num=mysqli_num_rows($sql1);
        $res1=mysqli_fetch_assoc($sql1);
        
        $name1=$res1['first_name'].' '.$res1['middle_name'].' '.$res1['last_name'];
        echo'<tr>
            <td class="table_content-all" width="85"><b>Name:</b>:</td>
            <td class="table_content-all" width="300">'.$name1.'</td>
            <td class="table_content-all" rowspan="4" style="vertical-align: top; border-left: 1px solid #E2E2E2; line-height: 21px;">
                <b>Comments</b> :<br> '.$res1['comment'].'
                
            </td>
        </tr>
        <tr>
            <td class="table_content-all" width="85"><b>Patient ID</b>:</td>
            <td class="table_content-all">'.$res1['id'].'</td>
        </tr>
        <tr>
            <td class="table_content-all"><b>Gender</b>:</td>
            <td class="table_content-all">'.$res1['gender'].'</td>
        </tr>
        <tr>
            <td class="table_content-all"><b>Date of birth</b>:</td>
            <td class="table_content-all">'.$res1['birdth'].' &nbsp;&nbsp;&nbsp;
        </tr>
        <tr>
            <td class="table_content-all"><b>Nationality</b>:</td>
                <td class="table_content-all">'.$res1['nationality'].'</td>
                <td class="table_content-all" style="vertical-align: top; border-left: 1px solid #E2E2E2; line-height: 21px;">
                    <b>Clinic</b>: BUITEMS
                </td>
        </tr>
        <tr>
            <td class="table_content-all"><b>Marital Status</b>:</td>
            <td class="table_content-all">'.$res1['marital_status'].'</td>
            <td class="table_content-all" style="vertical-align: top; border-left: 1px solid #E2E2E2; line-height: 21px;">
               <b>Occupation</b>: '.$res1['occupation'].'
            </td>
        </tr>
        
                <tr>
                    <td class="table_content-all" colspan="3"><br><b>Home Address </b>:</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>House# </b>:'.$res1['house'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>Street</b>: '.$res1['street'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>District</b>: '.$res1['district'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>City</b>: '.$res1['city'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>Province</b>: '.$res1['province'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>Postal Code</b>: '.$res1['postal_code'].'</td>
                </tr>
                <tr>
                    <td class="table_content-all" colspan="3"><b>Citizenship</b>: '.$res1['nationality'].'</td>
                </tr><tr>
                        <td class="table_content-all" colspan="3"><b>Email</b>: '.$res1['email'].'</td>
                    </tr>
            <tr>
                <td class="table_content-all" colspan="3"><br><b>Status</b>: '.$res1['status'].'</td>
            </tr>
            
        <tr>
            <td colspan="3" class="add_edit_del_table_buttons-1">
        <a href="edit_patient.php?p_id='.$p_id.'" type="button" value="Edit" class="btn btn-warning" >Edit</a>
            </td>
        </tr>'; exit();?>
                        
                    </tbody>
                </table>

            </div>

                <div class="edit-form-record">
                 <form role="form">
                <div class="card-body">
                 
                
                 
            
					 
					 
					
                  
             
                 <div class="main-content">
                 
                
                 <div id="twoCarDiv" class="desc">
                  
               
                
                 
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
                 
					  
					
					 </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Phone #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Mobile #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address 2:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 </div>
                 
                 </div>
                 
                 	<div class="main-content">
                 <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-3 form-vender vender-margin patient-name">
                  <b>Guardian home address</b>
					 </div>
					 <div class="col-md-2 form-vender vender-margin patient-name">
					
					  <label><input type="radio" name="cars1"  value="twoCarDiv1" />Yes</label>
					  &nbsp; 
					 <label><input type="radio" name="cars1" checked="checked" value="threeCarDiv1" /> No</label>
					    &nbsp; 
					 </div>
					 
				</div>
                <div id="threeCarDiv1" class="desc1">
                	
                </div>
                 <div id="twoCarDiv1" class="desc1">
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-1 form-vender vender-margin patient-name">
             <b>House #:</b>
					  </div>
             <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					  </div>
                
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>Street:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
				  
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>District:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
					</div>
               
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>City:</b>
					</div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
                 <div class="col-md-1  form-vender vender-margin patient-name Province ">
             <b>Province:</b>
					</div>
              <div class="col-md-7 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
					</div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Postal code:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
					  
					
					 </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Phone #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Mobile #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address 2:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 </div>
                 
                 </div>
                 
                 <div class="main-content">
                 <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-3 form-vender vender-margin patient-name">
                  <b>Office address</b>
					 </div>
					 <div class="col-md-2 form-vender vender-margin patient-name">
					
					  <label><input type="radio" name="cars2" value="twoCarDiv2" />Yes</label>
					  &nbsp; 
					 <label><input type="radio" name="cars2" checked="checked"  value="threeCarDiv2" /> No</label>
					    &nbsp; 
					 </div>
					 
				</div>
                <div id="threeCarDiv2" class="desc2">
                	
                </div>
                 <div id="twoCarDiv2" class="desc2">
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-1 form-vender vender-margin patient-name">
             <b>House #:</b>
					  </div>
             <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					  </div>
                
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>Street:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
				  
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>District:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
					</div>
               
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>City:</b>
					</div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
                 <div class="col-md-1  form-vender vender-margin patient-name Province ">
             <b>Province:</b>
					</div>
              <div class="col-md-7 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
					</div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Postal code:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
                 <div class="col-md-2 form-vender vender-margin patient-name">
                 <b>Country:</b>
                 
					 </div>
					  <div class="col-md-10 form-vender vender-margin austarlia ">
					 <select name="nationality"><option value="" selected="">--- Select your nationality ---</option><option value="Afghan">Afghan</option><option value="Albanian">Albanian</option><option value="Algerian">Algerian</option><option value="American">American</option><option value="Andorran">Andorran</option><option value="Angolan">Angolan</option><option value="Antiguans">Antiguans</option><option value="Argentinean">Argentinean</option><option value="Armenian">Armenian</option><option value="Australian">Australian</option><option value="Austrian">Austrian</option><option value="Azerbaijani">Azerbaijani</option><option value="Bahamian">Bahamian</option><option value="Bahraini">Bahraini</option><option value="Bangladeshi">Bangladeshi</option><option value="Barbadian">Barbadian</option><option value="Barbudans">Barbudans</option><option value="Batswana">Batswana</option><option value="Belarusian">Belarusian</option><option value="Belgian">Belgian</option><option value="Belizean">Belizean</option><option value="Beninese">Beninese</option><option value="Bhutanese">Bhutanese</option><option value="Bolivian">Bolivian</option><option value="Bosnian">Bosnian</option><option value="Brazilian">Brazilian</option><option value="British">British</option><option value="Bruneian">Bruneian</option><option value="Bulgarian">Bulgarian</option><option value="Burkinabe">Burkinabe</option><option value="Burmese">Burmese</option><option value="Burundian">Burundian</option><option value="Cambodian">Cambodian</option><option value="Cameroonian">Cameroonian</option><option value="Canadian">Canadian</option><option value="Cape Verdean">Cape Verdean</option><option value="Central African">Central African</option><option value="Chadian">Chadian</option><option value="Chilean">Chilean</option><option value="Chinese">Chinese</option><option value="Colombian">Colombian</option><option value="Comoran">Comoran</option><option value="Congolese">Congolese</option><option value="Costa Rican">Costa Rican</option><option value="Croatian">Croatian</option><option value="Cuban">Cuban</option><option value="Cypriot">Cypriot</option><option value="Czech">Czech</option><option value="Danish">Danish</option><option value="Djibouti">Djibouti</option><option value="Dominican">Dominican</option><option value="Dutch">Dutch</option><option value="East Timorese">East Timorese</option><option value="Ecuadorean">Ecuadorean</option><option value="Egyptian">Egyptian</option><option value="Emirian">Emirian</option><option value="Equatorial guinean">Equatorial Guinean</option><option value="Eritrean">Eritrean</option><option value="Estonian">Estonian</option><option value="Ethiopian">Ethiopian</option><option value="Fijian">Fijian</option><option value="Filipino">Filipino</option><option value="Finnish">Finnish</option><option value="French">French</option><option value="Gabonese">Gabonese</option><option value="Gambian">Gambian</option><option value="Georgian">Georgian</option><option value="German">German</option><option value="Ghanaian">Ghanaian</option><option value="Greek">Greek</option><option value="Grenadian">Grenadian</option><option value="Guatemalan">Guatemalan</option><option value="Guinea-Bissauan">Guinea-Bissauan</option><option value="Guinean">Guinean</option><option value="Guyanese">Guyanese</option><option value="Haitian">Haitian</option><option value="Herzegovinian">Herzegovinian</option><option value="Honduran">Honduran</option><option value="Hungarian">Hungarian</option><option value="Icelander">Icelander</option><option value="Indian">Indian</option><option value="Indonesian">Indonesian</option><option value="Iranian">Iranian</option><option value="Iraqi">Iraqi</option><option value="Irish">Irish</option><option value="Israeli">Israeli</option><option value="Italian">Italian</option><option value="Ivorian">Ivorian</option><option value="Jamaican">Jamaican</option><option value="Japanese">Japanese</option><option value="Jordanian">Jordanian</option><option value="Kazakhstani">Kazakhstani</option><option value="Kenyan">Kenyan</option><option value="Kittian and Nevisian">Kittian and Nevisian</option><option value="Kuwaiti">Kuwaiti</option><option value="Kyrgyz">Kyrgyz</option><option value="Laotian">Laotian</option><option value="Latvian">Latvian</option><option value="Lebanese">Lebanese</option><option value="Liberian">Liberian</option><option value="Libyan">Libyan</option><option value="Liechtensteiner">Liechtensteiner</option><option value="Lithuanian">Lithuanian</option><option value="Luxembourger">Luxembourger</option><option value="Macedonian">Macedonian</option><option value="Malagasy">Malagasy</option><option value="Malawian">Malawian</option><option value="Malaysian">Malaysian</option><option value="Maldivan">Maldivan</option><option value="Malian">Malian</option><option value="Maltese">Maltese</option><option value="Marshallese">Marshallese</option><option value="Mauritanian">Mauritanian</option><option value="Mauritian">Mauritian</option><option value="Mexican">Mexican</option><option value="Micronesian">Micronesian</option><option value="Moldovan">Moldovan</option><option value="Monacan">Monacan</option><option value="Mongolian">Mongolian</option><option value="Moroccan">Moroccan</option><option value="Mosotho">Mosotho</option><option value="Motswana">Motswana</option><option value="Mozambican">Mozambican</option><option value="Namibian">Namibian</option><option value="Nauruan">Nauruan</option><option value="Nepalese">Nepalese</option><option value="New Zealander">New Zealander</option><option value="Ni-Vanuatu">Ni-Vanuatu</option><option value="Nicaraguan">Nicaraguan</option><option value="Nigerien">Nigerien</option><option value="North Korean">North Korean</option><option value="Northern Irish">Northern Irish</option><option value="Norwegian">Norwegian</option><option value="Omani">Omani</option><option value="Pakistani">Pakistani</option><option value="Palauan">Palauan</option><option value="Panamanian">Panamanian</option><option value="Papua New Guinean">Papua New Guinean</option><option value="Paraguayan">Paraguayan</option><option value="Peruvian">Peruvian</option><option value="Polish">Polish</option><option value="Portuguese">Portuguese</option><option value="Qatari">Qatari</option><option value="Romanian">Romanian</option><option value="Russian">Russian</option><option value="Rwandan">Rwandan</option><option value="Saint lucian">Saint Lucian</option><option value="Salvadoran">Salvadoran</option><option value="Samoan">Samoan</option><option value="San Marinese">San Marinese</option><option value="Sao Tomean">Sao Tomean</option><option value="Saudi">Saudi</option><option value="Scottish">Scottish</option><option value="Senegalese">Senegalese</option><option value="Serbian">Serbian</option><option value="Seychellois">Seychellois</option><option value="Sierra Leonean">Sierra Leonean</option><option value="Singaporean">Singaporean</option><option value="Slovakian">Slovakian</option><option value="Slovenian">Slovenian</option><option value="Solomon Islander">Solomon Islander</option><option value="Somali">Somali</option><option value="South African">South African</option><option value="South Korean">South Korean</option><option value="Spanish">Spanish</option><option value="Sri Lankan">Sri Lankan</option><option value="Sudanese">Sudanese</option><option value="Surinamer">Surinamer</option><option value="Swazi">Swazi</option><option value="Swedish">Swedish</option><option value="Swiss">Swiss</option><option value="Syrian">Syrian</option><option value="Taiwanese">Taiwanese</option><option value="Tajik">Tajik</option><option value="Tanzanian">Tanzanian</option><option value="Thai">Thai</option><option value="Togolese">Togolese</option><option value="Tongan">Tongan</option><option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option><option value="Tunisian">Tunisian</option><option value="Turkish">Turkish</option><option value="Tuvaluan">Tuvaluan</option><option value="Ugandan">Ugandan</option><option value="Ukrainian">Ukrainian</option><option value="Uruguayan">Uruguayan</option><option value="Uzbekistani">Uzbekistani</option><option value="Venezuelan">Venezuelan</option><option value="Vietnamese">Vietnamese</option><option value="Welsh">Welsh</option><option value="Yemenite">Yemenite</option><option value="Zambian">Zambian</option><option value="Zimbabwean">Zimbabwean</option>
                    </select>
                     <span class="mandatory_field">*</span>
					 </div>
					
					 </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Phone #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Mobile #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address 2:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 </div>
                 
                 </div>
                 
                 <div class="main-content">
                 <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-3 form-vender vender-margin patient-name">
                  <b>Guardian office address</b>
					 </div>
					 <div class="col-md-2 form-vender vender-margin patient-name">
					
					  <label><input type="radio" name="cars3"  value="twoCarDiv3" />Yes</label>
					  &nbsp; 
					 <label><input type="radio" name="cars3" checked="checked" value="threeCarDiv3" /> No</label>
					    &nbsp; 
					 </div>
					 
				</div>
                <div id="threeCarDiv3" class="desc3">
                	
                </div>
                 <div id="twoCarDiv3" class="desc3">
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-1 form-vender vender-margin patient-name">
             <b>House #:</b>
					  </div>
             <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					  </div>
                
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>Street:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
				  
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>District:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               
                </div>
					</div>
               
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>City:</b>
					</div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
                 <div class="col-md-1  form-vender vender-margin patient-name Province ">
             <b>Province:</b>
					</div>
              <div class="col-md-7 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
                </div>
					</div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Postal code:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
                 <div class="col-md-2 form-vender vender-margin patient-name">
                 <b>Country:</b>
                 
					 </div>
					  <div class="col-md-10 form-vender vender-margin austarlia ">
					 <select name="nationality"><option value="" selected="">--- Select your nationality ---</option><option value="Afghan">Afghan</option><option value="Albanian">Albanian</option><option value="Algerian">Algerian</option><option value="American">American</option><option value="Andorran">Andorran</option><option value="Angolan">Angolan</option><option value="Antiguans">Antiguans</option><option value="Argentinean">Argentinean</option><option value="Armenian">Armenian</option><option value="Australian">Australian</option><option value="Austrian">Austrian</option><option value="Azerbaijani">Azerbaijani</option><option value="Bahamian">Bahamian</option><option value="Bahraini">Bahraini</option><option value="Bangladeshi">Bangladeshi</option><option value="Barbadian">Barbadian</option><option value="Barbudans">Barbudans</option><option value="Batswana">Batswana</option><option value="Belarusian">Belarusian</option><option value="Belgian">Belgian</option><option value="Belizean">Belizean</option><option value="Beninese">Beninese</option><option value="Bhutanese">Bhutanese</option><option value="Bolivian">Bolivian</option><option value="Bosnian">Bosnian</option><option value="Brazilian">Brazilian</option><option value="British">British</option><option value="Bruneian">Bruneian</option><option value="Bulgarian">Bulgarian</option><option value="Burkinabe">Burkinabe</option><option value="Burmese">Burmese</option><option value="Burundian">Burundian</option><option value="Cambodian">Cambodian</option><option value="Cameroonian">Cameroonian</option><option value="Canadian">Canadian</option><option value="Cape Verdean">Cape Verdean</option><option value="Central African">Central African</option><option value="Chadian">Chadian</option><option value="Chilean">Chilean</option><option value="Chinese">Chinese</option><option value="Colombian">Colombian</option><option value="Comoran">Comoran</option><option value="Congolese">Congolese</option><option value="Costa Rican">Costa Rican</option><option value="Croatian">Croatian</option><option value="Cuban">Cuban</option><option value="Cypriot">Cypriot</option><option value="Czech">Czech</option><option value="Danish">Danish</option><option value="Djibouti">Djibouti</option><option value="Dominican">Dominican</option><option value="Dutch">Dutch</option><option value="East Timorese">East Timorese</option><option value="Ecuadorean">Ecuadorean</option><option value="Egyptian">Egyptian</option><option value="Emirian">Emirian</option><option value="Equatorial guinean">Equatorial Guinean</option><option value="Eritrean">Eritrean</option><option value="Estonian">Estonian</option><option value="Ethiopian">Ethiopian</option><option value="Fijian">Fijian</option><option value="Filipino">Filipino</option><option value="Finnish">Finnish</option><option value="French">French</option><option value="Gabonese">Gabonese</option><option value="Gambian">Gambian</option><option value="Georgian">Georgian</option><option value="German">German</option><option value="Ghanaian">Ghanaian</option><option value="Greek">Greek</option><option value="Grenadian">Grenadian</option><option value="Guatemalan">Guatemalan</option><option value="Guinea-Bissauan">Guinea-Bissauan</option><option value="Guinean">Guinean</option><option value="Guyanese">Guyanese</option><option value="Haitian">Haitian</option><option value="Herzegovinian">Herzegovinian</option><option value="Honduran">Honduran</option><option value="Hungarian">Hungarian</option><option value="Icelander">Icelander</option><option value="Indian">Indian</option><option value="Indonesian">Indonesian</option><option value="Iranian">Iranian</option><option value="Iraqi">Iraqi</option><option value="Irish">Irish</option><option value="Israeli">Israeli</option><option value="Italian">Italian</option><option value="Ivorian">Ivorian</option><option value="Jamaican">Jamaican</option><option value="Japanese">Japanese</option><option value="Jordanian">Jordanian</option><option value="Kazakhstani">Kazakhstani</option><option value="Kenyan">Kenyan</option><option value="Kittian and Nevisian">Kittian and Nevisian</option><option value="Kuwaiti">Kuwaiti</option><option value="Kyrgyz">Kyrgyz</option><option value="Laotian">Laotian</option><option value="Latvian">Latvian</option><option value="Lebanese">Lebanese</option><option value="Liberian">Liberian</option><option value="Libyan">Libyan</option><option value="Liechtensteiner">Liechtensteiner</option><option value="Lithuanian">Lithuanian</option><option value="Luxembourger">Luxembourger</option><option value="Macedonian">Macedonian</option><option value="Malagasy">Malagasy</option><option value="Malawian">Malawian</option><option value="Malaysian">Malaysian</option><option value="Maldivan">Maldivan</option><option value="Malian">Malian</option><option value="Maltese">Maltese</option><option value="Marshallese">Marshallese</option><option value="Mauritanian">Mauritanian</option><option value="Mauritian">Mauritian</option><option value="Mexican">Mexican</option><option value="Micronesian">Micronesian</option><option value="Moldovan">Moldovan</option><option value="Monacan">Monacan</option><option value="Mongolian">Mongolian</option><option value="Moroccan">Moroccan</option><option value="Mosotho">Mosotho</option><option value="Motswana">Motswana</option><option value="Mozambican">Mozambican</option><option value="Namibian">Namibian</option><option value="Nauruan">Nauruan</option><option value="Nepalese">Nepalese</option><option value="New Zealander">New Zealander</option><option value="Ni-Vanuatu">Ni-Vanuatu</option><option value="Nicaraguan">Nicaraguan</option><option value="Nigerien">Nigerien</option><option value="North Korean">North Korean</option><option value="Northern Irish">Northern Irish</option><option value="Norwegian">Norwegian</option><option value="Omani">Omani</option><option value="Pakistani">Pakistani</option><option value="Palauan">Palauan</option><option value="Panamanian">Panamanian</option><option value="Papua New Guinean">Papua New Guinean</option><option value="Paraguayan">Paraguayan</option><option value="Peruvian">Peruvian</option><option value="Polish">Polish</option><option value="Portuguese">Portuguese</option><option value="Qatari">Qatari</option><option value="Romanian">Romanian</option><option value="Russian">Russian</option><option value="Rwandan">Rwandan</option><option value="Saint lucian">Saint Lucian</option><option value="Salvadoran">Salvadoran</option><option value="Samoan">Samoan</option><option value="San Marinese">San Marinese</option><option value="Sao Tomean">Sao Tomean</option><option value="Saudi">Saudi</option><option value="Scottish">Scottish</option><option value="Senegalese">Senegalese</option><option value="Serbian">Serbian</option><option value="Seychellois">Seychellois</option><option value="Sierra Leonean">Sierra Leonean</option><option value="Singaporean">Singaporean</option><option value="Slovakian">Slovakian</option><option value="Slovenian">Slovenian</option><option value="Solomon Islander">Solomon Islander</option><option value="Somali">Somali</option><option value="South African">South African</option><option value="South Korean">South Korean</option><option value="Spanish">Spanish</option><option value="Sri Lankan">Sri Lankan</option><option value="Sudanese">Sudanese</option><option value="Surinamer">Surinamer</option><option value="Swazi">Swazi</option><option value="Swedish">Swedish</option><option value="Swiss">Swiss</option><option value="Syrian">Syrian</option><option value="Taiwanese">Taiwanese</option><option value="Tajik">Tajik</option><option value="Tanzanian">Tanzanian</option><option value="Thai">Thai</option><option value="Togolese">Togolese</option><option value="Tongan">Tongan</option><option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option><option value="Tunisian">Tunisian</option><option value="Turkish">Turkish</option><option value="Tuvaluan">Tuvaluan</option><option value="Ugandan">Ugandan</option><option value="Ukrainian">Ukrainian</option><option value="Uruguayan">Uruguayan</option><option value="Uzbekistani">Uzbekistani</option><option value="Venezuelan">Venezuelan</option><option value="Vietnamese">Vietnamese</option><option value="Welsh">Welsh</option><option value="Yemenite">Yemenite</option><option value="Zambian">Zambian</option><option value="Zimbabwean">Zimbabwean</option>
                    </select>
                     <span class="mandatory_field">*</span>
					 </div>
					
					 </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Phone #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Mobile #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address 2:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 </div>
                 
                 </div>
                 <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>Patient insurer details:</b>
					</div>
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
                 <div class="col-md-2 form-vender vender-margin patient-name">
                 <b>Insurer:</b>
                 
					 </div>
					  <div class="col-md-10 form-vender vender-margin austarlia ">
					<select name="insurer">
                    <option value="">--- Select your insurer ---</option>
                    <option value="6">Blue Cross / Blue Shield</option>
                    <option value="5">Caritas</option><option value="10">Chartis</option>
                    <option value="12">Friendly Care</option>
                    <option value="9">Globalsurance</option>
                    <option value="13">Intelicare</option>
                    <option value="8">Maxicare</option>
                    <option value="11">Prime Care</option>
                    <option value="7">Value Care</option>
                    </select>
                     <span class="mandatory_field">*</span>
					 </div>
					
					 </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-2 form-vender vender-margin patient-name">
					    <b></b>
					  
					</div>
					 <div class="col-md-10 form-vender vender-margin patient-name">
					  <input type="text" name="search2_left_menu"  value="">
					  <i>If the patients insurer is not listed, please fill in here</i>
					</div>
					</div>
                
                
                <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-2 form-vender vender-margin patient-name">
					    <b>Policy #:</b>
					  
					</div>
					 <div class="col-md-10 form-vender vender-margin patient-name">
					  <input type="text" name="search2_left_menu"  value="">
					</div>
					</div>
                 <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>
General comment about patient:</b>
					</div>
                 
					<div class="col-md-12 form-vender vender-margin patient-name">
						<div class="col-md-6 form-vender vender-margin patient-name comments">
						<div class="col-md-4 form-vender vender-margin patient-name ">
						<b>Comments:</b>
							</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
						<textarea name="general_comment" style="width: 100%;" rows="4"></textarea>
							</div>
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<div class="col-md-12 form-vender vender-margin patient-name comments">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Referred by:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name">
					  <input type="text" name="search2_left_menu"  value="">
					</div>
					</div>
						<div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Occupation:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name">
					  <input type="text" name="search2_left_menu"  value="">
					</div>
					</div>
					<div class="col-md-12 form-vender vender-margin patient-name ">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Status:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name austarlia">
					 <select name="patient_status" style="width:180px;"><option value="4">Black-listed</option><option value="2">Celebrity</option><option value="7">Family</option><option value="3">HIV positive</option><option value="5" selected="">Regular patient</option><option value="1">VIP</option>
                    </select>
					</div>
					</div>
						</div>
						
					</div>
                
                 
<!--
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
-->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-default" id="hide">Cancel</button>
                </div>
              </form>
                 </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <div class="tab_group_tab_content active" id="medical_history_tab">
                <table width="100%" class="tab_content_table">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record" colspan="5">
                                Medical history

                                <span class="action_buttons" style="float: right;">
                                   <a href="#"><i class="fa fa-print"></i></a>
                                </span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        
            <tr>
                <td class="table_content-all" width="115px"><b>Name of Physician</b>:</td>
                <td class="table_content-all" width="100px">Dr. veloso</td>
                <td class="table_content-all" width="130px"><b>Specialty, if applicable</b>:</td>
                <td class="table_content-all">OB Gyne</td>
            </tr>
            <tr>
                <td class="table_content-all" style="vertical-align: top;"><br><b>Building name</b>:</td>
                <td class="table_content-all" style="vertical-align: top;"><br>Ramos Building</td>
                <td class="table_content-all" style="vertical-align: top;"><br><b>Office #</b>:</td>
                <td class="table_content-all" style="vertical-align: top;"><br>032-344789</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="5"><br><b>Office address</b>:</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="4"></td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="4"></td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="4">6014</td>
            </tr>
            <tr>
                <td class="table_content" colspan="4">Philippines</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="3"><br><b>1. Are you in good heath?</b></td>
                <td class="table_content-all"><br>Yes</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>2. Are you under medical treatment now?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>3. Have you ever had serious illness or surgical operation?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>4. Have you ever been hospitalized?</b></td>
                <td class="table_content-all">Yes</td></tr>
                        <tr>
                            <td class="table_content-all" colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, when and why?</td>
                            <td class="table_content">C-Section </td>
                        </tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>5. Are you taking any prescription / non-prescription medication?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>6. Do you use tobacco products?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>7. Do you use alcohol, cocaïne or other dangerous drugs?</b></td>
                <td class="table_content-all">No</td></tr>
            
            <tr>
                <td class="table_content-all" colspan="3"><b>8. Are you allergic to any of the following?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>9. Bleeding time:</b></td>
                <td class="table_content-all">
            </td></tr>
            <tr>
                <td class="table_content-all"><b>10. For women only:<b></b></b></td>
                <td class="table_content-all" colspan="2"><b>Are you pregnant?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all">&nbsp;</td>
                <td class="table_content-all" colspan="2"><b>Are you nursing?</b></td>
                <td class="table_content-all">No</td>
            </tr>
            <tr>
                <td class="table_content-all">&nbsp;</td>
                <td class="table_content-all" colspan="2"><b>Are you taking birth control pills?</b></td>
                <td class="table_content-all">No</td></tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>11. Blood type:</b></td>
                <td class="table_content-all">O+</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>12. Blood pressure:</b></td>
                <td class="table_content-all">90/80</td>
            </tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>13. Do you have or have you had any of the following?</b></td>
                <td class="table_content-all">Yes</td></tr>
                        <tr>
                            <td class="table_content-all" colspan="3" style="vertical-align: top;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Past or present ailments or conditions:</td>
                            <td class="table_content">
                            - Asthma</td>
                        </tr>
            <tr>
                <td class="table_content-all" colspan="3"><b>14. Comment:</b></td>
                <td class="table_content-all"></td>
            </tr>
            <tr>
                <td colspan="12" class="add_edit_del_table_buttons-1">
              <a href="#" type="button" value="Edit" class="btn btn-warning">Edit</a>
            </td>
            </tr>
                    </tbody>
                </table>
            </div>
                 <div class="edit-form-record1">
                 <form role="form">
                <div class="card-body">
                 <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>Patient profile:</b>
					</div>
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-3 form-vender vender-margin patient-name">
             <b>Name of Physician: Dr.</b>
					  </div>
             <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="veloso">
               <span class="mandatory_field">*</span>
               
                </div>
					
               
                 <div class="col-md-3 form-vender vender-margin patient-name">
             <b>Specialty, if applicable:</b>
					</div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="OB Gyne">
					</div>
                </div>
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <p>Office address</p>
                </div>
                 <div class="col-md-12 form-vender vender-margin patient-name">
                <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Building name:</b>
					 </div>
             <div class="col-md-4 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="Ramos Building">
              
                </div>
                <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Office #:</b>
					 </div>
              <div class="col-md-4 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="032-344789">
					 </div>
                </div>
                <div class="col-md-4 form-vender vender-margin patient-name">
             <b>House #:</b>
              <input type="text" name="search2_left_menu" value="">
                </div>
                
                <div class="col-md-4 form-vender vender-margin patient-name">
             <b>	Street:</b>
              <input type="text" name="search2_left_menu" value="">
                </div>
                <div class="col-md-4 form-vender vender-margin patient-name">
             <b>	District:</b>
              <input type="text" name="search2_left_menu" value="">
                </div>
                 <div class="col-md-12 form-vender vender-margin patient-name">
                <div class="col-md-1 form-vender vender-margin patient-name">
             <b>	City:</b>
					 </div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
                </div>
                <div class="col-md-2 form-vender vender-margin patient-name">
             <b>	Province:</b>
					 </div>
             <div class="col-md-6 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="">
					 </div>
                </div>
                <div class="col-md-12 form-vender vender-margin patient-name">
                <div class="col-md-2 form-vender vender-margin patient-name">
             <b>	Postal code:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="search2_left_menu" value="6014">
                </div>
					</div>
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>	Country:</b>
					</div>
              <div class="col-md-10 form-vender vender-margin patient-name">
					 <select name="nationality"><option value="" selected="">--- Select your nationality ---</option><option value="Afghan">Afghan</option><option value="Albanian">Albanian</option><option value="Algerian">Algerian</option><option value="American">American</option><option value="Andorran">Andorran</option><option value="Angolan">Angolan</option><option value="Antiguans">Antiguans</option><option value="Argentinean">Argentinean</option><option value="Armenian">Armenian</option><option value="Australian">Australian</option><option value="Austrian">Austrian</option><option value="Azerbaijani">Azerbaijani</option><option value="Bahamian">Bahamian</option><option value="Bahraini">Bahraini</option><option value="Bangladeshi">Bangladeshi</option><option value="Barbadian">Barbadian</option><option value="Barbudans">Barbudans</option><option value="Batswana">Batswana</option><option value="Belarusian">Belarusian</option><option value="Belgian">Belgian</option><option value="Belizean">Belizean</option><option value="Beninese">Beninese</option><option value="Bhutanese">Bhutanese</option><option value="Bolivian">Bolivian</option><option value="Bosnian">Bosnian</option><option value="Brazilian">Brazilian</option><option value="British">British</option><option value="Bruneian">Bruneian</option><option value="Bulgarian">Bulgarian</option><option value="Burkinabe">Burkinabe</option><option value="Burmese">Burmese</option><option value="Burundian">Burundian</option><option value="Cambodian">Cambodian</option><option value="Cameroonian">Cameroonian</option><option value="Canadian">Canadian</option><option value="Cape Verdean">Cape Verdean</option><option value="Central African">Central African</option><option value="Chadian">Chadian</option><option value="Chilean">Chilean</option><option value="Chinese">Chinese</option><option value="Colombian">Colombian</option><option value="Comoran">Comoran</option><option value="Congolese">Congolese</option><option value="Costa Rican">Costa Rican</option><option value="Croatian">Croatian</option><option value="Cuban">Cuban</option><option value="Cypriot">Cypriot</option><option value="Czech">Czech</option><option value="Danish">Danish</option><option value="Djibouti">Djibouti</option><option value="Dominican">Dominican</option><option value="Dutch">Dutch</option><option value="East Timorese">East Timorese</option><option value="Ecuadorean">Ecuadorean</option><option value="Egyptian">Egyptian</option><option value="Emirian">Emirian</option><option value="Equatorial guinean">Equatorial Guinean</option><option value="Eritrean">Eritrean</option><option value="Estonian">Estonian</option><option value="Ethiopian">Ethiopian</option><option value="Fijian">Fijian</option><option value="Filipino">Filipino</option><option value="Finnish">Finnish</option><option value="French">French</option><option value="Gabonese">Gabonese</option><option value="Gambian">Gambian</option><option value="Georgian">Georgian</option><option value="German">German</option><option value="Ghanaian">Ghanaian</option><option value="Greek">Greek</option><option value="Grenadian">Grenadian</option><option value="Guatemalan">Guatemalan</option><option value="Guinea-Bissauan">Guinea-Bissauan</option><option value="Guinean">Guinean</option><option value="Guyanese">Guyanese</option><option value="Haitian">Haitian</option><option value="Herzegovinian">Herzegovinian</option><option value="Honduran">Honduran</option><option value="Hungarian">Hungarian</option><option value="Icelander">Icelander</option><option value="Indian">Indian</option><option value="Indonesian">Indonesian</option><option value="Iranian">Iranian</option><option value="Iraqi">Iraqi</option><option value="Irish">Irish</option><option value="Israeli">Israeli</option><option value="Italian">Italian</option><option value="Ivorian">Ivorian</option><option value="Jamaican">Jamaican</option><option value="Japanese">Japanese</option><option value="Jordanian">Jordanian</option><option value="Kazakhstani">Kazakhstani</option><option value="Kenyan">Kenyan</option><option value="Kittian and Nevisian">Kittian and Nevisian</option><option value="Kuwaiti">Kuwaiti</option><option value="Kyrgyz">Kyrgyz</option><option value="Laotian">Laotian</option><option value="Latvian">Latvian</option><option value="Lebanese">Lebanese</option><option value="Liberian">Liberian</option><option value="Libyan">Libyan</option><option value="Liechtensteiner">Liechtensteiner</option><option value="Lithuanian">Lithuanian</option><option value="Luxembourger">Luxembourger</option><option value="Macedonian">Macedonian</option><option value="Malagasy">Malagasy</option><option value="Malawian">Malawian</option><option value="Malaysian">Malaysian</option><option value="Maldivan">Maldivan</option><option value="Malian">Malian</option><option value="Maltese">Maltese</option><option value="Marshallese">Marshallese</option><option value="Mauritanian">Mauritanian</option><option value="Mauritian">Mauritian</option><option value="Mexican">Mexican</option><option value="Micronesian">Micronesian</option><option value="Moldovan">Moldovan</option><option value="Monacan">Monacan</option><option value="Mongolian">Mongolian</option><option value="Moroccan">Moroccan</option><option value="Mosotho">Mosotho</option><option value="Motswana">Motswana</option><option value="Mozambican">Mozambican</option><option value="Namibian">Namibian</option><option value="Nauruan">Nauruan</option><option value="Nepalese">Nepalese</option><option value="New Zealander">New Zealander</option><option value="Ni-Vanuatu">Ni-Vanuatu</option><option value="Nicaraguan">Nicaraguan</option><option value="Nigerien">Nigerien</option><option value="North Korean">North Korean</option><option value="Northern Irish">Northern Irish</option><option value="Norwegian">Norwegian</option><option value="Omani">Omani</option><option value="Pakistani">Pakistani</option><option value="Palauan">Palauan</option><option value="Panamanian">Panamanian</option><option value="Papua New Guinean">Papua New Guinean</option><option value="Paraguayan">Paraguayan</option><option value="Peruvian">Peruvian</option><option value="Polish">Polish</option><option value="Portuguese">Portuguese</option><option value="Qatari">Qatari</option><option value="Romanian">Romanian</option><option value="Russian">Russian</option><option value="Rwandan">Rwandan</option><option value="Saint lucian">Saint Lucian</option><option value="Salvadoran">Salvadoran</option><option value="Samoan">Samoan</option><option value="San Marinese">San Marinese</option><option value="Sao Tomean">Sao Tomean</option><option value="Saudi">Saudi</option><option value="Scottish">Scottish</option><option value="Senegalese">Senegalese</option><option value="Serbian">Serbian</option><option value="Seychellois">Seychellois</option><option value="Sierra Leonean">Sierra Leonean</option><option value="Singaporean">Singaporean</option><option value="Slovakian">Slovakian</option><option value="Slovenian">Slovenian</option><option value="Solomon Islander">Solomon Islander</option><option value="Somali">Somali</option><option value="South African">South African</option><option value="South Korean">South Korean</option><option value="Spanish">Spanish</option><option value="Sri Lankan">Sri Lankan</option><option value="Sudanese">Sudanese</option><option value="Surinamer">Surinamer</option><option value="Swazi">Swazi</option><option value="Swedish">Swedish</option><option value="Swiss">Swiss</option><option value="Syrian">Syrian</option><option value="Taiwanese">Taiwanese</option><option value="Tajik">Tajik</option><option value="Tanzanian">Tanzanian</option><option value="Thai">Thai</option><option value="Togolese">Togolese</option><option value="Tongan">Tongan</option><option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option><option value="Tunisian">Tunisian</option><option value="Turkish">Turkish</option><option value="Tuvaluan">Tuvaluan</option><option value="Ugandan">Ugandan</option><option value="Ukrainian">Ukrainian</option><option value="Uruguayan">Uruguayan</option><option value="Uzbekistani">Uzbekistani</option><option value="Venezuelan">Venezuelan</option><option value="Vietnamese">Vietnamese</option><option value="Welsh">Welsh</option><option value="Yemenite">Yemenite</option><option value="Zambian">Zambian</option><option value="Zimbabwean">Zimbabwean</option>
                    </select>
                     <span class="mandatory_field">*</span>
					 </div>
					</div>
                  <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>Medical questions</b>
					</div>
                    <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                    1. Are you in good health?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="radio" name="in_good_health" value="yes" checked="" id="1y">
						<label for="1y">Yes</label>
						 &nbsp; 
						 <input type="radio" name="in_good_health" value="no" id="1n">
						 <label for="1n">No</label>
						</div>
					</div>
                   
                   <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                   2. Are you under medical treatment now?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="radio" name="under_medical_treatment" value="yes" class="show-1-row" id="2y">
						<label for="2y">Yes</label>
						 &nbsp; 
						<input type="radio" name="under_medical_treatment" value="no" class="hide-1-row" checked="" id="2n">
						<label for="2n">No</label>
						</div>
					</div>
                   
                    <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                            If so, what is the condition being treated?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                 3. Have you ever had serious illness or surgical operation?	
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
					<input type="radio" name="serious_illness_or_surgical_operation" value="yes" class="show-1-row" id="3y">
						<label for="3y">Yes</label>
						 &nbsp; 
						<input type="radio" name="serious_illness_or_surgical_operation" value="no" class="hide-1-row" checked="" id="3n">
						<label for="3n">No</label>
						</div>
					</div>
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                           If so, when and for what illness or operation?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
               4. Have you ever been hospitalized?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
				<input type="radio" name="ever_been_hospitalized" value="yes" class="show-1-row" checked="" id="4y">
						<label for="4y">Yes</label>
						 &nbsp; 
						<input type="radio" name="ever_been_hospitalized" value="no" class="hide-1-row" id="4n">
						<label for="4n">No</label>
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                             If so, when and why?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                5. Are you taking any prescription / non-prescription medication?	
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
					<input type="radio" name="prescription_medication" value="yes" class="show-1-row" id="5y">
						<label for="5y">Yes</label>
						 &nbsp; 
						<input type="radio" name="prescription_medication" value="no" class="hide-1-row" checked="" id="5n">
						<label for="5n">No</label>
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                                If so, please specify, include dosage and frequency:
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                6. Do you use tobacco products?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
					<input type="radio" name="use_tabacco_products" value="yes" class="show-1-row" id="6y">
						<label for="6y">Yes</label>
						 &nbsp; 
						<input type="radio" name="use_tabacco_products" value="no" class="hide-1-row" checked="" id="6n">
						<label for="6n">No</label>
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                                   If so, please specify:
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
             7. Do you use alcohol, cocaïne or other dangerous drugs?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
					<input type="radio" name="use_alcohol_cocaine_drugs" value="yes" class="show-1-row" id="7y">
					<label for="7y">Yes</label>
						 &nbsp; 
						<input type="radio" name="use_alcohol_cocaine_drugs" value="no" class="hide-1-row" checked="" id="7n">
					<label for="7n">No</label>
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
                                    If so, please specify:
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<input type="text" name="under_medical_treatment2" style="width:390px;" value="">
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-6 form-vender vender-margin patient-name">
             7. Do you use alcohol, cocaïne or other dangerous drugs?
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[7]" value="None of the list allergies are applicable to the patient" class="question_8_no" checked="" id="8none">
					None of the list allergies are applicable to the patient
						
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-5 form-vender vender-margin patient-name">
           
						</div>
						<div class="col-md-4 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[1]" value="Local Anesthetic" class="question_8" id="8local">
				Local Anesthetic (ex. Lidocaine)
						
						</div>
						<div class="col-md-3 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[2]" value="Penicillin Antibiotics" class="question_8" id="8peni">
				Penicillin Antibiotics
						
						</div>
					</div>
					
					<div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-5 form-vender vender-margin patient-name">
           
						</div>
						<div class="col-md-2 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[3]" value="Sulfa drugs" class="question_8" id="8sulfa">
				Sulfa drugs
						
						</div>
						<div class="col-md-2 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[4]" value="Asprin" class="question_8" id="8asprin">
			Asprin
						
						</div>
						
						<div class="col-md-3 form-vender vender-margin patient-name">
<input type="checkbox" name="allergic_to_following[5]" value="Latex" class="question_8" id="8latex">			Latex
						
						</div>
					</div>
                
                    <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-5 form-vender vender-margin patient-name">
           
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="checkbox" name="allergic_to_following[6]" value="Other" class="question_8" id="8other">
				Other:
					<input type="text" name="allergic_to_following2" style="width:340px;" value="" class="question_8_textfield">
						
						</div>
						
						
						
					</div>
                <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-5 form-vender vender-margin patient-name">
           9. Bleeding time:
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="text" name="bleeding_time" style="width:45px;" value="">
				min(s)
						
						</div>
						
					</div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                    <div class="col-md-5 form-vender vender-margin patient-name">
          10. For women only:	Are you pregnant?
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="radio" name="pregnant" value="yes" class="show-1-row" id="10aypy">
				<label for="10aypy">Yes</label>
					&nbsp;
					<input type="radio" name="pregnant" value="no" class="hide-1-row" checked="" id="10aypn">
						<label for="10aypn">No</label>
						</div>
						
					</div>

               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-2 form-vender vender-margin patient-name">
          
						</div>
                    <div class="col-md-3 form-vender vender-margin patient-name">
           If so, for what term?
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="text" name="pregnant2" style="width:390px;" value="">
				
						</div>
						
					</div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-2 form-vender vender-margin patient-name">
          
						</div>
                    <div class="col-md-3 form-vender vender-margin patient-name">
         	Are you nursing?
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="radio" name="nursing" value="yes" id="10ayny">
					<label for="10ayny">Yes</label>
					&nbsp;
					<input type="radio" name="nursing" value="no" checked="" id="10aynn">
				<label for="10aynn">No</label>
						</div>
						
					</div>
             
             <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-2 form-vender vender-margin patient-name">
          
						</div>
                    <div class="col-md-3 form-vender vender-margin patient-name">
         	Are you taking birth control pills?
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
					<input type="radio" name="taking_birth_control_pills" value="yes" class="show-1-row" id="10aytbcpy">
					<label for="10aytbcpy">Yes</label>
					&nbsp;
					<input type="radio" name="taking_birth_control_pills" value="no" class="hide-1-row" checked="" id="10aytbcpn">
				<label for="10aytbcpn">No</label>
						</div>
						
					</div>
              
              <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-2 form-vender vender-margin patient-name">
          
						</div>
                    <div class="col-md-3 form-vender vender-margin patient-name">
         	          If so, for how long?
						</div>
						<div class="col-md-7 form-vender vender-margin patient-name">
				<input type="text" name="taking_birth_control_pills2" style="width:390px;" value="">
					
						</div>
						
					</div>
              <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-5 form-vender vender-margin patient-name">
          11. Blood type:
						</div>
                    
						<div class="col-md-7 form-vender vender-margin patient-name">
				<select name="blood_type"><option value="">--- Select a blood type ---</option><option value="O+" selected="">O+</option><option value="O-">O-</option><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option>
                    </select>
					
						</div>
						
					</div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-5 form-vender vender-margin patient-name">
          12. Blood pressure:
						</div>
                    
						<div class="col-md-7 form-vender vender-margin patient-name">
				<input type="text" name="blood_pressure" style="width:45px;" value="90">
					 / 
					 <input type="text" name="blood_pressure2" style="width:45px;" value="80">
						</div>
						
					</div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-5 form-vender vender-margin patient-name">
         13. Do you have or have you had any of the following?
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     
       <input type="checkbox" name="have_had_the_following[37]" value="None of the list items are applicable to the patient" class="question_13_no" id="13notl">
       <label for="13notl">None of the list items are applicable to the patient</label>
						
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
      <input type="checkbox" name="have_had_the_following[1]" value="High Blood Pressure" class="question_13" id="13hbp">
      <label for="13hbp">High Blood Pressure</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
     <input type="checkbox" name="have_had_the_following[2]" value="Heart Disease" class="question_13" id="13hd">
      <label for="13hd">Heart Disease</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
     <input type="checkbox" name="have_had_the_following[3]" value="Cancer Tumors" class="question_13" id="13ct">
      <label for="13ct">Cancer / Tumors</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
     <input type="checkbox" name="have_had_the_following[4]" value="Low Blood Pressure" class="question_13" id="13lbp">
    <label for="13lbp">Low Blood Pressure</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[5]" value="Heart Murmur" class="question_13" id="13hm">
    <label for="13hm">Heart Murmur</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
    <input type="checkbox" name="have_had_the_following[6]" value="Anemia" class="question_13" id="13anemia">
     <label for="13anemia">Anemia</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
    <input type="checkbox" name="have_had_the_following[7]" value="Epilepsy Convulsions" class="question_13" id="13ec">
   <label for="13ec">Epilepsy / Convulsions</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[8]" value="Hepatitis Liver Disease" class="question_13" id="13hld">
    <label for="13hld">Hepatitis Liver Disease</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[9]" value="Angina" class="question_13" id="13angina">
     <label for="13angina">Angina</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[9]" value="Angina" class="question_13" id="13angina">
   <label for="13ec">Epilepsy / Convulsions</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[8]" value="Hepatitis Liver Disease" class="question_13" id="13hld">
    <label for="13hld">Hepatitis Liver Disease</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[9]" value="Angina" class="question_13" id="13angina">
     <label for="13angina">Angina</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[10]" value="AIDS or HIV Infection" class="question_13" id="13aohi">
  <label for="13aohi">AIDS or HIV Infection</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[11]" value="Rheumatic Fever" class="question_13" id="13rf">
   <label for="13rf">Rheumatic Fever</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[12]" value="Asthma" class="question_13" checked="" id="13asthma">
   <label for="13asthma">Asthma</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[13]" value="Sexually Transmitted Disease" class="question_13" id="13std">
 <label for="13std">Sexually Transmitted</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[14]" value="Hay Fever Allergies" class="question_13" id="13hfa">
  <label for="13hfa">Hay Fever Allergies</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[15]" value="Emphysema" class="question_13" id="13emph">
  <label for="13emph">Emphysema</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
  <input type="checkbox" name="have_had_the_following[16]" value="Stomach Troubles Ulcers" class="question_13" id="13stu">
 <label for="13stu">Stomach Troubles / Ulcers</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[17]" value="Hepatitis Liver" class="question_13" id="13hl">
 <label for="13hl">Hepatitis / Liver</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[18]" value="Bleeding Problems" class="question_13" id="13bp">
 <label for="13bp">Bleeding Problems</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[19]" value="Fainting Spells" class="question_13" id="13fs">
 <label for="13fs">Fainting Spells</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
   <input type="checkbox" name="have_had_the_following[20]" value="Hepatitis Jaundice" class="question_13" id="13hj">
<label for="13hj">Hepatitis / Jaundice</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[21]" value="Blood Diseases" class="question_13" id="13bd">
 <label for="13bd">Blood Diseases</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[22]" value="Rapid Weight Loss" class="question_13" id="13rwgl">
 <label for="13rwgl">Rapid Weight Gain / Loss</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
  <input type="checkbox" name="have_had_the_following[23]" value="Tuberculosis" class="question_13" id="13tuber">
<label for="13tuber">Tuberculosis</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[24]" value="Head Injuries" class="question_13" id="13hi">
					<label for="13hi">Head Injuries</label>
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[28]" value="Joint Replacement Implant" class="question_13" id="13jri">
 <label for="13jri">Joint Replacement</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[29]" value="Kidney Disease" class="question_13" id="13kd">
<label for="13kd">Kidney Disease</label>
						</div>
             <div class="col-md-6 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[30]" value="Other" class="question_13" id="13other">
					<label for="13other">Other:</label>
					<input type="text" name="have_had_the_following2" style="width:160px;" value="" class="question_13_textfield">
						</div>
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[31]" value="Heart Surgery" class="question_13" id="13hs">
<label for="13hs">Heart Surgery</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[32]" value="Diabetes" class="question_13" id="13diabetes">
<label for="13diabetes">Diabetes</label>
						</div>
             
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[33]" value="Heart Attack" class="question_13" id="13ha">
<label for="13ha">Heart Attack</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
<input type="checkbox" name="have_had_the_following[34]" value="Chest pain" class="question_13" id="13cp">
<label for="13cp">Chest pain</label>
						</div>
             
              </div>
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                     <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[35]" value="Thyroid Problem" class="question_13" id="13tp">
<label for="13tp">Thyroid Problem</label>
						</div>
             <div class="col-md-3 form-vender vender-margin patient-name">
 <input type="checkbox" name="have_had_the_following[36]" value="Stroke" class="question_13" id="13stroke">
<label for="13stroke">Stroke</label>
						</div>
             
              </div>
               
               
               <div class="col-md-12 form-vender vender-margin patient-name">
                   
 <span style="vertical-align:top;">14. Comment:</span>
<textarea name="comment" style="width:665px; height: 100px;"></textarea>
						
               </div>
               
               
               
               
               
               
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-default" id="hide">Cancel</button>
                </div>
              </form>
                 </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                  
                  </div>
                  
                  <div class="tab-pane active" id="tab_4">
                  <div class="tab_group_tab_content" id="patient_profile_tab1">
                  <table width="100%" class="tab_content_table" id="baseline_chart">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record">Baseline chart (created: 2018-06-25<span style="color: #999999"> - last changed: 2018-06-25</span>)
                            </td>
                        </tr>
                    </thead>
                    <tbody class="show">
                                <tr>
                                    <td>
                                        <div style="position: relative;">
                                            <div class="select_charts">
                                                
        <div class="page_main_filter">
            <table width="100%">
                <tbody><tr>
                    <td class="page_main_filter_search_icon">
                        <img src="https://dentalcharting.com/images/icons/search.png" alt="">
                    </td>
                    <td class="page_main_filter_filters">
                        <form method="post" action="" class="ajax_form" data-form_id="view-combined-progress-record-chart" data-form_target="#baseline_tab .last_chart">
                            <input type="hidden" name="patient_id" value="96685">
                            <input type="hidden" name="record_type" value="baseline">

                            <table width="931" style="opacity: 1; filter: alpha(opacity=100);">
                            <tbody>
                            <tr>
                                <td class="table_content_top" width="155"><b>View advanced chart:</b></td>
                            </tr>
                            <tr>
                                <td class="table_content_top chart_view" valign="top">
                                    <label class="switch_wrap switch_wrap_on_off" for="baseline_view_advanced">
                                        <input type="checkbox" name="view" value="advanced" class="switch_checkbox" id="baseline_view_advanced">
                                        <div class="switch"><span class="bullet"></span></div>
                                    </label>
                                </td>
                                        <td style="display: none;">
                                            <input type="checkbox" name="selected_charts[baseline_charts][]" value="17125" class="switch_checkbox" id="select_baseline_charts_baseline_charts_17125" checked="" style="display: none;">
                                        </td>
                                </tr>
                            </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
            </tbody></table>
        </div>
                                            </div>

                                            <div style="clear: both"></div>

                                            <div class="last_chart" style="float: left">
                                                
                <table class="dental_chart_table simple_round_view baseline_chart" id="baseline_chart_17125" style="margin: 8px 0 0 5px" data-chart_type="adult" data-chart_id="17125">
                        <tbody><tr class="numbers"><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">AJC</acronym></td><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">AJC</acronym></td><td valign="bottom"></td><td valign="bottom"></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"></td>
                        </tr>
                        <tr>
                        
                            <td data-tooth_nr="18" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="17" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="16" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="15" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="14" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="13" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99"></td>
                            <td data-tooth_nr="12" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="11" class="tooth2 mid-left ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="21" class="tooth2 mid-right ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="22" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99"></td>
                            <td data-tooth_nr="23" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="24" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="25" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="26" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="27" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="28" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                        </tr>
                            <tr class="numbers">
                                <td colspan="16"></td>
                            </tr>
                        <tr class="numbers"><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                            </tr>
                    <tr>
                        <td class="spacing_top" colspan="16"></td>
                    </tr>
                    <tr>
                        <td class="spacing_bottom" colspan="16"></td>
                    </tr>
                        <tr class="numbers"><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td>
                        </tr>
                            <tr class="numbers">
                                <td colspan="16"></td>
                            </tr>
                        <tr>
                            <td data-tooth_nr="48" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="47" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="46" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="45" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="44" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="43" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="42" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="41" class="tooth2 mid-left ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="31" class="tooth2 mid-right ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="32" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="33" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="34" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="35" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="36" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="37" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="38" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                        </tr>
                        <tr class="numbers"><td valign="top"></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"><acronym title="All surfaces"><img src="https://dentalcharting.com/images/annotation_space_closed.gif"></acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"><acronym title="All surfaces">Co F</acronym></td><td valign="top"><acronym title="All surfaces">M</acronym></td><td valign="top"><acronym title="Occlusal">DC1-O</acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td>
                        </tr>
                </tbody></table>
    
                                            </div>
                                            <div style="float: left; margin: 5px; width: 217px;">
                                                
        <div style="position: relative;" class="status_drag_container">
            <div>
                <div style="height: 50px; padding: 5px 0 10px">
                    <img src="https://dentalcharting.com/images/icons/hand-swipe36.png" style="float: left;">

                    <div style="float: right; line-height: 36px; font-size: 15px; color: #C1272D;">
                        Pick status, drag and drop
                    </div>
                </div>
                <ul class="expand_collapse_list">
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Caries
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none;">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="2ndCar - Secondary Caries on filling" data-status_id="1134" data-status_type="">
                                <div style="background-color: #;width: 35px;height: 35px;margin-right: 5px;float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="2ndCar - Secondary Caries on filling"><b style="font-size: 12px;">2ndCar</b>
                                    <br>
                                    <span style="font-size: 10px;">Secondary ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C1Li - Dental Caries Class 1 - Lingual" data-status_id="901" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C1Li - Dental Caries Class 1 - Lingual"><b style="font-size: 12px;">C1Li</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C1O - Dental Caries Class 1 - Occlusal" data-status_id="902" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C1O - Dental Caries Class 1 - Occlusal"><b style="font-size: 12px;">C1O</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2D - Dental Caries Class 2 - Distal" data-status_id="903" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2D - Dental Caries Class 2 - Distal"><b style="font-size: 12px;">C2D</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2DO - Dental Caries Class 2 - Distal &amp; Occlusal" data-status_id="904" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DO - Dental Caries Class 2 - Distal &amp; Occlusal"><b style="font-size: 12px;">C2DO</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2DOB - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Buccal" data-status_id="905" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DOB - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Buccal"><b style="font-size: 12px;">C2DOB</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2DOLi - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Lingual" data-status_id="906" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DOLi - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Lingual"><b style="font-size: 12px;">C2DOLi</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2M - Dental Caries Class 2 - Mesial" data-status_id="907" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2M - Dental Caries Class 2 - Mesial"><b style="font-size: 12px;">C2M</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2MO - Dental Caries Class 2 - Mesial &amp; Occlusal" data-status_id="908" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MO - Dental Caries Class 2 - Mesial &amp; Occlusal"><b style="font-size: 12px;">C2MO</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2MOB - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Buccal" data-status_id="909" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOB - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Buccal"><b style="font-size: 12px;">C2MOB</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2MOD - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Distal" data-status_id="910" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOD - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Distal"><b style="font-size: 12px;">C2MOD</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2MOLi -  	Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Lingual" data-status_id="911" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOLi -  	Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Lingual"><b style="font-size: 12px;">C2MOLi</b>
                                    <br>
                                    <span style="font-size: 10px;"> 	Dental C...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C3D - Dental Caries Class 3 - Distal" data-status_id="912" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3D - Dental Caries Class 3 - Distal"><b style="font-size: 12px;">C3D</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C3M - Dental Caries Class 3 - Mesial" data-status_id="913" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3M - Dental Caries Class 3 - Mesial"><b style="font-size: 12px;">C3M</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C3MD - Dental Caries Class 3 - Mesial &amp; Distal" data-status_id="914" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3MD - Dental Caries Class 3 - Mesial &amp; Distal"><b style="font-size: 12px;">C3MD</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C4DI - Dental Caries Class 4 - Distal &amp; Incisal" data-status_id="915" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4DI - Dental Caries Class 4 - Distal &amp; Incisal"><b style="font-size: 12px;">C4DI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C4MDI - Dental Caries Class 4 - Mesial &amp; Distal &amp; Incisal" data-status_id="916" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4MDI - Dental Caries Class 4 - Mesial &amp; Distal &amp; Incisal"><b style="font-size: 12px;">C4MDI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C4MI - Dental Caries Class 4 - Mesial &amp; Incisal" data-status_id="917" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4MI - Dental Caries Class 4 - Mesial &amp; Incisal"><b style="font-size: 12px;">C4MI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C5CB -  	Dental Caries Class 5 - Cervical Buccal" data-status_id="918" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CB -  	Dental Caries Class 5 - Cervical Buccal"><b style="font-size: 12px;">C5CB</b>
                                    <br>
                                    <span style="font-size: 10px;"> 	Dental C...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C5CLa - Dental Caries Class 5 - Cervical Labial" data-status_id="919" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CLa - Dental Caries Class 5 - Cervical Labial"><b style="font-size: 12px;">C5CLa</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C5CLi - Dental Caries Class 5 - Cervical Lingual" data-status_id="920" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CLi - Dental Caries Class 5 - Cervical Lingual"><b style="font-size: 12px;">C5CLi</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C6BC - Dental Caries Class 6 - Buccal Cusp" data-status_id="921" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C6BC - Dental Caries Class 6 - Buccal Cusp"><b style="font-size: 12px;">C6BC</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C6LiC - Dental Caries Class 6 - Lingual Cusp" data-status_id="922" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C6LiC - Dental Caries Class 6 - Lingual Cusp"><b style="font-size: 12px;">C6LiC</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Endo
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Endo" data-status_name="RCT - Root Canal Treatment" data-status_id="27" data-status_type="rct">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="RCT - Root Canal Treatment"><b style="font-size: 12px;">RCT</b>
                                    <br>
                                    <span style="font-size: 10px;">Root Canal...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    General
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="# - Fracture" data-status_id="30" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="# - Fracture"><b style="font-size: 12px;">#</b>
                                    <br>
                                    <span style="font-size: 10px;">Fracture</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="| | - Diastema" data-status_id="31" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="| | - Diastema"><b style="font-size: 12px;">| |</b>
                                    <br>
                                    <span style="font-size: 10px;">Diastema</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Ab - Abrasion / Abfraction" data-status_id="1" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ab - Abrasion / Abfraction"><b style="font-size: 12px;">Ab</b>
                                    <br>
                                    <span style="font-size: 10px;">Abrasion /...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Abs - Abscess" data-status_id="925" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Abs - Abscess"><b style="font-size: 12px;">Abs</b>
                                    <br>
                                    <span style="font-size: 10px;">Abscess</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Ano - Anodontia" data-status_id="43" data-status_type="">
                                <div style="background-color: #00FFF7; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ano - Anodontia"><b style="font-size: 12px;">Ano</b>
                                    <br>
                                    <span style="font-size: 10px;">Anodontia</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Att - Attrition" data-status_id="5" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Att - Attrition"><b style="font-size: 12px;">Att</b>
                                    <br>
                                    <span style="font-size: 10px;">Attrition</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="du - Decubital ulcer" data-status_id="898" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="du - Decubital ulcer"><b style="font-size: 12px;">du</b>
                                    <br>
                                    <span style="font-size: 10px;">Decubital ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Edent - Edentulous Jaw" data-status_id="54" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Edent - Edentulous Jaw"><b style="font-size: 12px;">Edent</b>
                                    <br>
                                    <span style="font-size: 10px;">Edentulous...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Exfol - Exfoliated Primary Tooth" data-status_id="1133" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Exfol - Exfoliated Primary Tooth"><b style="font-size: 12px;">Exfol</b>
                                    <br>
                                    <span style="font-size: 10px;">Exfoliated...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Ext R - External Resorption" data-status_id="10" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ext R - External Resorption"><b style="font-size: 12px;">Ext R</b>
                                    <br>
                                    <span style="font-size: 10px;">External R...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="FC - Fractured Crown" data-status_id="896" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FC - Fractured Crown"><b style="font-size: 12px;">FC</b>
                                    <br>
                                    <span style="font-size: 10px;">Fractured ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="FT - Fractured Tooth" data-status_id="897" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FT - Fractured Tooth"><b style="font-size: 12px;">FT</b>
                                    <br>
                                    <span style="font-size: 10px;">Fractured ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="G R - Gum Recession" data-status_id="14" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G R - Gum Recession"><b style="font-size: 12px;">G R</b>
                                    <br>
                                    <span style="font-size: 10px;">Gum Recess...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="GI - Gingivitis" data-status_id="899" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="GI - Gingivitis"><b style="font-size: 12px;">GI</b>
                                    <br>
                                    <span style="font-size: 10px;">Gingivitis</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Int R - Internal Resorption" data-status_id="16" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Int R - Internal Resorption"><b style="font-size: 12px;">Int R</b>
                                    <br>
                                    <span style="font-size: 10px;">Internal R...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Mcu - Missing Cause Unknown" data-status_id="17" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mcu - Missing Cause Unknown"><b style="font-size: 12px;">Mcu</b>
                                    <br>
                                    <span style="font-size: 10px;">Missing Ca...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="MT - Mobile tooth" data-status_id="924" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="MT - Mobile tooth"><b style="font-size: 12px;">MT</b>
                                    <br>
                                    <span style="font-size: 10px;">Mobile tooth</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="PE - Tooth Partially Erupted" data-status_id="20" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PE - Tooth Partially Erupted"><b style="font-size: 12px;">PE</b>
                                    <br>
                                    <span style="font-size: 10px;">Tooth Part...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="pp - Periodontal problem" data-status_id="900" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="pp - Periodontal problem"><b style="font-size: 12px;">pp</b>
                                    <br>
                                    <span style="font-size: 10px;">Periodonta...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="RDT - Retained Deciduous Tooth" data-status_id="923" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="RDT - Retained Deciduous Tooth"><b style="font-size: 12px;">RDT</b>
                                    <br>
                                    <span style="font-size: 10px;">Retained D...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="UE - Unerupted" data-status_id="29" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="UE - Unerupted"><b style="font-size: 12px;">UE</b>
                                    <br>
                                    <span style="font-size: 10px;">Unerupted</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Intruded (Mand.) or Extruded (Max.)" data-status_id="38" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Intruded (Mand.) or Extruded (Max.)"><img src="https://dentalcharting.com/images/annotation_intruded_extruded_down.gif">
                                    <br>
                                    <span style="font-size: 10px;">Intruded (...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Intruded (Max.) or Extruded (Mand.)" data-status_id="37" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Intruded (Max.) or Extruded (Mand.)"><img src="https://dentalcharting.com/images/annotation_intruded_extruded_up.gif">
                                    <br>
                                    <span style="font-size: 10px;">Intruded (...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Mesial Drift (1st &amp; 4th Quadrant) or Distal Drift (2nd &amp; 3rd Quadrant)" data-status_id="35" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mesial Drift (1st &amp; 4th Quadrant) or Distal Drift (2nd &amp; 3rd Quadrant)"><img src="https://dentalcharting.com/images/annotation_drifting_right.gif">
                                    <br>
                                    <span style="font-size: 10px;">Mesial Dri...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Mesial Drift (2nd &amp; 3rd Quadrant) or Distal Drift (1st &amp; 4th Quadrant)" data-status_id="34" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mesial Drift (2nd &amp; 3rd Quadrant) or Distal Drift (1st &amp; 4th Quadrant)"><img src="https://dentalcharting.com/images/annotation_drifting_left.gif">
                                    <br>
                                    <span style="font-size: 10px;">Mesial Dri...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Rotated tooth (1st &amp; 4th quadrant)" data-status_id="39" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rotated tooth (1st &amp; 4th quadrant)"><img src="https://dentalcharting.com/images/annotation_rotated_tooth_cw.gif">
                                    <br>
                                    <span style="font-size: 10px;">Rotated to...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Rotated tooth (2nd &amp; 3rd Quadrant)" data-status_id="40" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rotated tooth (2nd &amp; 3rd Quadrant)"><img src="https://dentalcharting.com/images/annotation_rotated_tooth_ccw.gif">
                                    <br>
                                    <span style="font-size: 10px;">Rotated to...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Tooth Missing, Space Closed" data-status_id="36" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Tooth Missing, Space Closed"><img src="https://dentalcharting.com/images/annotation_space_closed.gif">
                                    <br>
                                    <span style="font-size: 10px;">Tooth Miss...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Implant
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Implant" data-status_name="IMP - Implant" data-status_id="15" data-status_type="">
                                <div style="background-color: #00CCFF; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="IMP - Implant"><b style="font-size: 12px;">IMP</b>
                                    <br>
                                    <span style="font-size: 10px;">Implant</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Preventive
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Preventive" data-status_name="PFS - Pit &amp; Fissure Sealant" data-status_id="928" data-status_type="">
                                <div style="background-color: #CCFFFF; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFS - Pit &amp; Fissure Sealant"><b style="font-size: 12px;">PFS</b>
                                    <br>
                                    <span style="font-size: 10px;">Pit &amp; Fiss...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Preventive" data-status_name="Var - Varnish" data-status_id="927" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Var - Varnish"><b style="font-size: 12px;">Var</b>
                                    <br>
                                    <span style="font-size: 10px;">Varnish</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Prostho
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="Abt+imp - Abutment" data-status_id="9" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Abt+imp - Abutment"><b style="font-size: 12px;">Abt+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Abutment</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="AJC - Acrylic Jacket Crown" data-status_id="2" data-status_type="">
                                <div style="background-color: #FFFF99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AJC - Acrylic Jacket Crown"><b style="font-size: 12px;">AJC</b>
                                    <br>
                                    <span style="font-size: 10px;">Acrylic Ja...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="AJC+imp - Acrylic Jacket Crown + Implant" data-status_id="428" data-status_type="">
                                <div style="background-color: #FFFF99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AJC+imp - Acrylic Jacket Crown + Implant"><b style="font-size: 12px;">AJC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Acrylic Ja...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="AMC - All Metal Crown" data-status_id="4" data-status_type="">
                                <div style="background-color: #000000; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AMC - All Metal Crown"><b style="font-size: 12px;">AMC</b>
                                    <br>
                                    <span style="font-size: 10px;">All Metal ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="AMC+imp - All Metal Crown + Implant" data-status_id="429" data-status_type="">
                                <div style="background-color: #000000; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AMC+imp - All Metal Crown + Implant"><b style="font-size: 12px;">AMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">All Metal ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="BA - Bridge Abutment" data-status_id="6" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="BA - Bridge Abutment"><b style="font-size: 12px;">BA</b>
                                    <br>
                                    <span style="font-size: 10px;">Bridge Abu...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="BP - Bridge Pontic" data-status_id="7" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="BP - Bridge Pontic"><b style="font-size: 12px;">BP</b>
                                    <br>
                                    <span style="font-size: 10px;">Bridge Pon...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="FGC - Full Gold Crown" data-status_id="11" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FGC - Full Gold Crown"><b style="font-size: 12px;">FGC</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Gold ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="FGC+imp - Full Gold Crown + Implant" data-status_id="430" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FGC+imp - Full Gold Crown + Implant"><b style="font-size: 12px;">FGC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Gold ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="FMC - Full Metal Crown" data-status_id="57" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FMC - Full Metal Crown"><b style="font-size: 12px;">FMC</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Metal...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="FMC+imp - Full Metal Crown + Implant" data-status_id="431" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FMC+imp - Full Metal Crown + Implant"><b style="font-size: 12px;">FMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Metal...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PBC - Porcelain Bonded Crown" data-status_id="18" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PBC - Porcelain Bonded Crown"><b style="font-size: 12px;">PBC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PBC+imp - Porcelain Bonded Crown + Implant" data-status_id="432" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PBC+imp - Porcelain Bonded Crown + Implant"><b style="font-size: 12px;">PBC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PC - Post Core" data-status_id="19" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PC - Post Core"><b style="font-size: 12px;">PC</b>
                                    <br>
                                    <span style="font-size: 10px;">Post Core</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFGC - Porcelain Fused to Gold Crown" data-status_id="21" data-status_type="">
                                <div style="background-color: #FFCC99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFGC - Porcelain Fused to Gold Crown"><b style="font-size: 12px;">PFGC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PFGC+imp - Porcelain Fused to Gold Crown + Implant" data-status_id="433" data-status_type="">
                                <div style="background-color: #FFCC99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFGC+imp - Porcelain Fused to Gold Crown + Implant"><b style="font-size: 12px;">PFGC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFMB - Porcelain Fused to Metal Bridge" data-status_id="22" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMB - Porcelain Fused to Metal Bridge"><b style="font-size: 12px;">PFMB</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PFMC - Porcelain Fused to Metal Crown" data-status_id="23" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMC - Porcelain Fused to Metal Crown"><b style="font-size: 12px;">PFMC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFMC+imp - Porcelain Fused to Metal Crown + Implant" data-status_id="434" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMC+imp - Porcelain Fused to Metal Crown + Implant"><b style="font-size: 12px;">PFMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PJC - Porcelain Jacket Crown" data-status_id="24" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PJC - Porcelain Jacket Crown"><b style="font-size: 12px;">PJC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PJC+imp - Porcelain Jacket Crown + Implant" data-status_id="435" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PJC+imp - Porcelain Jacket Crown + Implant"><b style="font-size: 12px;">PJC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PV - Porcelain Veneer" data-status_id="26" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PV - Porcelain Veneer"><b style="font-size: 12px;">PV</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Resto
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Am - Amalgam" data-status_id="3" data-status_type="">
                                <div style="background-color: #969696; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Am - Amalgam"><b style="font-size: 12px;">Am</b>
                                    <br>
                                    <span style="font-size: 10px;">Amalgam</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="ART - Atraumatic Restorative Treatment" data-status_id="926" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="ART - Atraumatic Restorative Treatment"><b style="font-size: 12px;">ART</b>
                                    <br>
                                    <span style="font-size: 10px;">Atraumatic...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Co F - Composite Filling" data-status_id="8" data-status_type="">
                                <div style="background-color: #FF99CC; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co F - Composite Filling"><b style="font-size: 12px;">Co F</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="Co In - Composite Inlay" data-status_id="44" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co In - Composite Inlay"><b style="font-size: 12px;">Co In</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Co On - Composite Onlay" data-status_id="42" data-status_type="">
                                <div style="background-color: #A68500; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co On - Composite Onlay"><b style="font-size: 12px;">Co On</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="G In - Gold Inlay" data-status_id="13" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G In - Gold Inlay"><b style="font-size: 12px;">G In</b>
                                    <br>
                                    <span style="font-size: 10px;">Gold Inlay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="G On - Gold Onlay" data-status_id="41" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G On - Gold Onlay"><b style="font-size: 12px;">G On</b>
                                    <br>
                                    <span style="font-size: 10px;">Gold Onlay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="PRR - Preventive Resin Restoration" data-status_id="25" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PRR - Preventive Resin Restoration"><b style="font-size: 12px;">PRR</b>
                                    <br>
                                    <span style="font-size: 10px;">Preventive...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="TF - Temporary Filling" data-status_id="28" data-status_type="">
                                <div style="background-color: #C0C0C0; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="TF - Temporary Filling"><b style="font-size: 12px;">TF</b>
                                    <br>
                                    <span style="font-size: 10px;">Temporary ...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group group_collapsed">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Surgery
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Surgery" data-status_name="Imp tth - Impacted Tooth" data-status_id="55" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Imp tth - Impacted Tooth"><b style="font-size: 12px;">Imp tth</b>
                                    <br>
                                    <span style="font-size: 10px;">Impacted T...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Surgery" data-status_name="Rf - Root Fragment" data-status_id="56" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rf - Root Fragment"><b style="font-size: 12px;">Rf</b>
                                    <br>
                                    <span style="font-size: 10px;">Root Fragm...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Surgery" data-status_name="Extracted Due To Caries" data-status_id="33" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Extracted Due To Caries"><img src="https://dentalcharting.com/images/annotation_recently_extracted.gif">
                                    <br>
                                    <span style="font-size: 10px;">Extracted ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Surgery" data-status_name="For Extraction Due To Caries" data-status_id="929" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="For Extraction Due To Caries"><img src="https://dentalcharting.com/images/annotation_roots_retained.gif">
                                    <br>
                                    <span style="font-size: 10px;">For Extrac...</span>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <tr>
                                <td colspan="13" class="add_edit_del_table_buttons">
                                   <a href="#" type="button" value="Edit" class="btn btn-warning" id="show1">Add line</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
					  </div>
                 <div class="edit-form-record1">
                   
                     <form method="post" action="" class="add-chief-form">
                <table border="0" width="100%" class="add_edit_del_table">
                    <tbody><tr>
                        <td class="table_subheader-form" colspan="3">Add chief complaint
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="info_message">In order to add a chief complaint you have to fill in the name and description of the new chief complaint.</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Name</b></td>
                        <td class="table_content" colspan="2">
                            <input type="text" name="option4" id="option4" value="" style="width: 120px"> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Status</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option5" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>status category</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option6" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Dentist</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option7" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Location of teeth</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option8" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Chief complaint</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option9" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Sign and symptoms</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option2" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Diagnosis</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option5" id="option3" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Procedure</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option" id="option1" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Material</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option" id="option0" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Status</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option" id="option12" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" style="vertical-align: top;"><b>Prescriptions</b></td>
                        <td class="table_content" style="vertical-align: top;" colspan="2">
                            <textarea name="option" id="option11" style="width: 300px; height: 75px;"></textarea><br>
                        </td>
                    </tr>
                </tbody></table>
                <table border="0" width="100%" class="add_edit_del_table_buttons">
                <tbody><tr>
                    <td colspan="3"><div class="card-footer">
                  <button type="submit" class="btn btn-warning">Submit</button>
                  <button type="submit" class="btn btn-default" id="hide1">Cancel</button>
                </div></td>
                </tr>
                </tbody></table>
            </form>
            </div>
					</div>
                  <!-- /.tab-pane -->
                   <div class="tab-pane" id="tab_5">
                   <div class="tab_group_tab_content active" id="work_proposed_tab">
                
                    <table width="100%" cellspacing="1" cellpadding="1" style="margin-left:auto; margin-right:auto;" class="tab_content_table">
                        <thead>
                            <tr>
                                <td class="table_header_chart last_progress_chart_header table_subheader_view_record" colspan="6">Dental work proposed</td>
                            </tr>
                        </thead>
                        <tbody class="show">
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tbody><tr>
                                            <td>
                                                <div style="position: relative;">
                                                    <div class="select_charts">
                                                    </div>

                                                    <div style="clear: both"></div>
                                                    

                                                    <div class="last_chart"><div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There is no chart for this patient yet. Please add the chart.</div>
                                                    </div>

                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                <td colspan="12" class="add_edit_del_table_buttons-1">
                <input type="button" value="Add chart" class="table-btn">
            </td>
            </tr>
                        </tbody>
                    </table>
               


                <div id="work_proposed_record" class="work_record">
                    <form class="dental_record_form">
                        <input type="hidden" name="patient_id" value="91749">
                        <table width="100%" class="tab_content_table" style="display: table">
                            <thead>
                                <tr>
                                    <td colspan="14" class="table_header-1">
                                        Proposed dental work
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table_header-1" width="62">Date</td>
                                    <td class="table_header-1" width="40">Dentist</td>
                                    <td class="table_header-1" width="54">Location</td>
                                    <td class="table_header-1" style="min-width: 90px">CC / Hx / SS / Dx</td>
                                    <td class="table_header-1" style="min-width: 80px">Procedures</td>
                                    <td class="table_header-1" style="min-width: 80px">Materials</td>
                                    <td class="table_header-1" style="min-width: 80px">Status </td>
                                    <td class="table_header-1" style="min-width: 80px">Rx</td>
                                    <td class="table_header-1" style="min-width: 80px">Remarks</td>
                                    <td class="table_header-1" width="31">Chart</td>
                                    <td class="table_header-1" width="100">Documents</td>
                                </tr>
                            </thead>
                            <tbody class="show">
                                    <tr class="record-actions" style="display: none">
                                        <td colspan="14" class="add_edit_del_table_buttons">
                                            <input type="button" class="primary-button add-dental-record add-work-proposed-record" value="+ Add line" name="Add-dental-record" data-chart_type="" data-chart_id="" style="cursor: pointer;">
                                        </td>
                                    </tr>
                                    <tr class="record-error-message">
                                        <td colspan="14">
                                          <div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There is no chart for this patient yet so no Proposed dental work can be added. Please add a chart.</div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
					</div>
               
                <div class="tab-pane" id="tab_6">
                <div class="tab_group_tab_content active" id="unquoted_tab">
                
                <form class="financial_record_form">
                    <input type="hidden" name="patient_id" value="91749">

                    <table class="tab_content_table" width="100%" id="unquoted_records">
                        <thead>
                            <tr>
                                <td class="table_subheader_view_record" colspan="6">Draft quotations</td>
                            </tr>
                            <tr>
                                <td class="table_header-1" width="18" align="center">
                                </td>
                                <td class="table_header-1" width="80">Date</td>
                                <td class="table_header-1" width="40">Dentist</td>
                                <td class="table_header-1" width="45">Location</td>
                                <td class="table_header-1">Description</td>
                                <td class="table_header-1" width="150">Charges excl. VAT</td>
                            </tr>
                        </thead>
                        <tbody class="show">
                                    <tr>
                                        <td colspan="8"><div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There are no draft quotations for this patient yet.</div><br></td>
                                    </tr>
                        </tbody>
                    </table>
                </form>
            </div>
                
					</div>
              
               <div class="tab-pane" id="tab_7">
                <div class="tab_group_tab_content active" id="quoted_tab">
                
                <form class="financial_record_form">
                    <input type="hidden" name="patient_id"  value="91749">

                    <table class="tab_content_table" width="100%" id="quoted_records">
                        <thead>
                            <tr>
                                <td class="table_subheader_view_record" colspan="7"> Quotations</td>
                            </tr>
                            <tr>
                                <td class="table_header-1" width="18" align="center">
                                </td>
                                <td class="table_header-1" width="80">Date/ID</td>
                                <td class="table_header-1" width="40">Dentist</td>
                                <td class="table_header-1" width="45">Location</td>
                                <td class="table_header-1">Description</td>
                                 <td class="table_header-1" width="100">Charges</td>
                                <td class="table_header-1" width="150">Signed quotations</td>
                            </tr>
                        </thead>
                        <tbody class="show">
                                    <tr>
                                        <td colspan="8"><div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There are no draft quotations for this patient yet.</div><br></td>
                                    </tr>
                        </tbody>
                    </table>
                </form>
            </div>
                
					</div>
               
               <div class="tab-pane active" id="tab_8">
               
               <table width="100%" class="tab_content_table" id="baseline_chart1">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record">Baseline chart (created: 2018-06-25<span style="color: #999999"> - last changed: 2018-06-25</span>)
                            </td>
                        </tr>
                    </thead>
                    <tbody class="show">
                                <tr>
                                    <td>
                                        <div style="position: relative;">
                                            <div class="select_charts">
                                                
        <div class="page_main_filter">
            <table width="100%">
                <tbody><tr>
                    <td class="page_main_filter_search_icon">
                        <img src="https://dentalcharting.com/images/icons/search.png" alt="">
                    </td>
                    <td class="page_main_filter_filters">
                        <form method="post" action="" class="ajax_form" data-form_id="view-combined-progress-record-chart" data-form_target="#baseline_tab .last_chart">
                            <input type="hidden" name="patient_id" value="96685">
                            <input type="hidden" name="record_type" value="baseline">

                            <table width="931" style="opacity: 1; filter: alpha(opacity=100);">
                            <tbody>
                            <tr>
                                <td class="table_content_top" width="155"><b>View advanced chart:</b></td>
                            </tr>
                            <tr>
                                <td class="table_content_top chart_view" valign="top">
                                    <label class="switch_wrap switch_wrap_on_off" for="baseline_view_advanced">
                                        <input type="checkbox" name="view" value="advanced" class="switch_checkbox" id="baseline_view_advanced1">
                                        <div class="switch"><span class="bullet"></span></div>
                                    </label>
                                </td>
                                        <td style="display: none;">
                                            <input type="checkbox" name="selected_charts[baseline_charts][]" value="17125" class="switch_checkbox" id="select_baseline_charts_baseline_charts_171251" checked="" style="display: none;">
                                        </td>
                                </tr>
                            </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
            </tbody></table>
        </div>
                                            </div>

                                            <div style="clear: both"></div>

                                            <div class="last_chart" style="float: left">
                                                
                <table class="dental_chart_table simple_round_view baseline_chart" id="baseline_chart_171251" style="margin: 8px 0 0 5px" data-chart_type="adult" data-chart_id="171251">
                        <tbody><tr class="numbers"><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">AJC</acronym></td><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">RCT</acronym></td><td valign="bottom"><acronym title="All surfaces">M</acronym></td><td valign="bottom"><acronym title="All surfaces">AJC</acronym></td><td valign="bottom"></td><td valign="bottom"></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"><acronym title="All surfaces">PFMB</acronym></td><td valign="bottom"></td>
                        </tr>
                        <tr>
                        
                            <td data-tooth_nr="18" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="17" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="16" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="15" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="14" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="13" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99"></td>
                            <td data-tooth_nr="12" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="11" class="tooth2 mid-left ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="21" class="tooth2 mid-right ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="22" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth2&amp;view=simple_round&amp;&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99&amp;color[]=FFFF99"></td>
                            <td data-tooth_nr="23" class="tooth2 ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="24" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="25" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="26" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="27" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00&amp;color[]=99CC00"></td>
                            <td data-tooth_nr="28" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                        </tr>
                            <tr class="numbers">
                                <td colspan="16"></td>
                            </tr>
                        <tr class="numbers"><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                            </tr>
                    <tr>
                        <td class="spacing_top" colspan="16"></td>
                    </tr>
                    <tr>
                        <td class="spacing_bottom" colspan="16"></td>
                    </tr>
                        <tr class="numbers"><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td>
                        </tr>
                            <tr class="numbers">
                                <td colspan="16"></td>
                            </tr>
                        <tr>
                            <td data-tooth_nr="48" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="47" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="46" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="45" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="44" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="43" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="42" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="41" class="tooth2 mid-left ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="31" class="tooth2 mid-right ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="32" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="33" class="tooth2 ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_incisor.gif"></td>
                            <td data-tooth_nr="34" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/images/chart/tooth_molar.gif"></td>
                            <td data-tooth_nr="35" class="tooth ui-droppable" style="cursor: pointer;"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC&amp;color[]=FF99CC"></td>
                            <td data-tooth_nr="36" class="tooth ui-droppable"><img src="https://dentalcharting.com/images/chart/tooth_missing.gif"></td>
                            <td data-tooth_nr="37" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]="></td>
                            <td data-tooth_nr="38" class="tooth ui-droppable"><img src="https://dentalcharting.com/dental-treatment/patients/create_tooth_part.php?tooth=tooth&amp;view=simple_round&amp;&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=&amp;color[]=FF99CC"></td>
                        </tr>
                        <tr class="numbers"><td valign="top"></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"><acronym title="All surfaces"><img src="https://dentalcharting.com/images/annotation_space_closed.gif"></acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"><acronym title="All surfaces">Co F</acronym></td><td valign="top"><acronym title="All surfaces">M</acronym></td><td valign="top"><acronym title="Occlusal">DC1-O</acronym></td><td valign="top"><acronym title="Occlusal">Co F</acronym></td>
                        </tr>
                </tbody></table>
    <script type="text/javascript">
    $('.tooth, .tooth2').droppable({
        accept: '.status_draggable',
        tolerance: 'pointer',
        activeClass: 'customer_droppable_active',
        hoverClass: 'customer_droppable_hover',
        over: function(event, ui){
//            $(this).css('background-color', '#CC00FF');
            $(this).prepend('<img src="' + base_url + '/images/chart/tooth_hover.png" style="position: absolute;" class="tooth_hover"></div>');
        },
        out: function(event, ui){
//            $(this).css('background-color', '#CCFF00');
            $(this).find('.tooth_hover').remove();
        },
        drop: function(event, ui) {
//            alert( "dropped" );

            if($(this).parents('table').hasClass('baseline_chart'))
                var where = '#baseline_dental_record';
            else if($(this).parents('table').hasClass('work_proposed_chart'))
                var where = '#work_proposed_record'
            else
                var where = '#dental_progress_record';

            var tooth_nr = $(this).attr('data-tooth_nr');
            if(ui.draggable.attr('data-status_type') == 'rct')
            {
                var rct_parts = {};

                // single canal
                rct_parts['Single canal'] = new Array('Single');

                // two canals
                if(tooth_nr == 18 || tooth_nr == 17 || tooth_nr == 16 || tooth_nr == 15 || tooth_nr == 14 || tooth_nr == 24 || tooth_nr == 25 || tooth_nr == 26 || tooth_nr == 27 || tooth_nr == 28 || tooth_nr == 35 || tooth_nr == 34 || tooth_nr == 44 || tooth_nr == 45 || tooth_nr == 55 || tooth_nr == 54 || tooth_nr == 64 || tooth_nr == 65 || tooth_nr == 75 || tooth_nr == 74 || tooth_nr == 84 || tooth_nr == 85)
                {
                    rct_parts['Two canals'] = new Array('Buccal'
                                                        ,'Palatal');
                }

                else if(tooth_nr == 13 || tooth_nr == 12 || tooth_nr == 11 || tooth_nr == 21 || tooth_nr == 22 || tooth_nr == 23 || tooth_nr == 33 || tooth_nr == 32 || tooth_nr == 31 || tooth_nr == 41 || tooth_nr == 42 || tooth_nr == 43 || tooth_nr == 53 || tooth_nr == 52 || tooth_nr == 51 || tooth_nr == 61 || tooth_nr == 62 || tooth_nr == 63 || tooth_nr == 73 || tooth_nr == 72 || tooth_nr == 71 || tooth_nr == 81 || tooth_nr == 82 || tooth_nr == 83)
                {
                    rct_parts['Two canals'] = new Array('Labial'
                                                        ,'Palatal');
                }

                else if(tooth_nr == 38 || tooth_nr == 37 || tooth_nr == 36 || tooth_nr == 46 || tooth_nr == 47 || tooth_nr == 48)
                {
                    rct_parts['Two canals'] = new Array('Mesial'
                                                        ,'Distal');
                }
                
                // three canals
                if(tooth_nr == 18 || tooth_nr == 17 || tooth_nr == 16 || tooth_nr == 26 || tooth_nr == 27 || tooth_nr == 28 || tooth_nr == 55 || tooth_nr == 54 || tooth_nr == 64 || tooth_nr == 65)
                {
                    rct_parts['Three canals'] = new Array('Mesio-buccal'
                                                            ,'Disto-buccal'
                                                            ,'Palatal');
                }

                else if(tooth_nr == 38 || tooth_nr == 37 || tooth_nr == 36 || tooth_nr == 46 || tooth_nr == 47 || tooth_nr == 48 || tooth_nr == 75 || tooth_nr == 74 || tooth_nr == 84 || tooth_nr == 85)
                {
                    rct_parts['Three canals'] = new Array('Mesio-buccal'
                                                            ,'Mesio-lingual'
                                                            ,'Distal');
                }

                // four canals
                if(tooth_nr == 38 || tooth_nr == 37 || tooth_nr == 36 || tooth_nr == 46 || tooth_nr == 47 || tooth_nr == 48 || tooth_nr == 75 || tooth_nr == 74 || tooth_nr == 84 || tooth_nr == 85)
                {
                    rct_parts['Four canals'] = new Array('Mesio-buccal'
                                                            ,'Mesio-lingual'
                                                            ,'Disto-buccal'
                                                            ,'Disto-lingual');
                }

                // five canals
                if(tooth_nr == 38 || tooth_nr == 37 || tooth_nr == 36 || tooth_nr == 46 || tooth_nr == 47 || tooth_nr == 48)
                {
                    rct_parts['Five canals'] = new Array('Mesio-buccal-1'
                                                            ,'Mesio-buccal-2'
                                                            ,'Mesio-lingual'
                                                            ,'Disto-buccal'
                                                            ,'Disto-lingual');
                }
                
                status_group_options = '<i>Please select</i><br>'
                                     + '<img src="' + base_url + '/images/subject_arrow.gif">';

                var i = 0;

                $.each(rct_parts, function(key, value)
                {
                    if(i == 0)
                    {
                        var margin_left = 3;
                        var margin_top  = 0;
                    }
                    else
                    {
                        var margin_left = 10;
                        var margin_top  = 5;
                    }
                        
                    status_group_options += '<span style="display: inline-block; margin-left: ' + margin_left + 'px; margin-top: ' + margin_top + 'px"><b>' + key + '</b></span><br>';

                    if(i == 0)
                        var margin_left = 10;

                    for(var j in value)
                    {
                        status_group_options += '<input type="checkbox" value="' + i + '_' + j + '" style="margin-left: ' + margin_left + 'px" id="status_options_0_group_options_' + i + '_' + j + '" name="status_options[0][group_options][' + j + ']" class="tooth_parts_0"> <label for="status_options_0_group_options_' + i + '_' + j + '">' + value[j] + '</label><br>';
                    }
                    
                    i++;
                });
        

                var extra_style = '';
            }
            else
            {
                var status_group_options = '<div style="background-color: #EEEEEE; line-height: 24px; padding: 0px 5px; margin-bottom: 3px; font-weight: bold;">Mark tooth ' + $(this).attr('data-tooth_nr') + '</div>' + create_tooth_part_options(where, 'status', 0, new Array(), tooth_nr, ui.draggable.attr('data-status_type'));
                
                var extra_style = '';
            }

            if(where == '#baseline_dental_record')
            {
                var form_buttons =    '<input type="submit" value="Quick save" name="Save" class="primary-button" data-action="save" style="width: 100%; margin: 5px 0 5px 0;">'
                                    + '<input type="submit" value="Continue" name="Continue" data-action="continue" style="width: 100%; margin: 0 0 5px 0;">'
                                    + '<input type="button" value="Cancel" name="Cancel" class="drag_drop_surface_selection_cancel" style="width: 100%;">';
            }
            else
            {
                var form_buttons =    '<input type="submit" value="Continue" name="Continue" data-action="continue" class="primary-button" style="width: 100%; margin: 5px 0 5px 0;">'
                                    + '<input type="button" value="Cancel" name="Cancel" class="drag_drop_surface_selection_cancel" style="width: 100%;">';
            }

            // Show surface selection
//            $(this).parents('.dental_chart_table').before
            $(this).prepend('<div class="drag_drop_surface_selection surface_selection" data-status_group="' + ui.draggable.attr('data-status_group') + '" data-status_name="' + ui.draggable.attr('data-status_name') + '" data-status_id="' + ui.draggable.attr('data-status_id') + '" data-status_type="' + ui.draggable.attr('data-status_type') + '" ' + extra_style + '>'
                                + '<form>'
                                    + '<input type="hidden" name="button_pressed" class="drag_drop_surface_selection_action">'
                                    + (status_group_options?status_group_options:tooth_part_options)
                                    + form_buttons
                                + '</form>'
                             + '</div>');

            /*
            // Trigger default click on tooth action
            $(this).click();

            // Fill in the status in the status field
            $(where).find('.status_td textarea').val(ui.draggable.attr('data-status_name'));
            $(where).find('.status_td #status_id_0').val(ui.draggable.attr('data-status_id'));


            $(where + ' #status_0').next('div').hide(400);
            $(where + ' #status_0').next('div').remove();
            $(where + ' #status_0').after('<div style="display: none; margin-bottom: 10px">' + tooth_part_options + '</div>');
            $(where + ' #status_0').next().show(400);
            */
        }
    });
    </script>
                                            </div>
                                            <div style="float: left; margin: 5px; width: 217px;">
                                                
        <div style="position: relative;" class="status_drag_container">
            <div>
                <div style="height: 36px; padding: 5px 0 45px">
                    <img src="https://dentalcharting.com/images/icons/hand-swipe36.png" style="float: left;">

                    <div style="float: right; line-height: 36px; font-size: 15px; color: #C1272D;">
                        Pick status, drag and drop
                    </div>
                </div>
                <ul class="expand_collapse_list">
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Caries
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="2ndCar - Secondary Caries on filling" data-status_id="1134" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="2ndCar - Secondary Caries on filling"><b style="font-size: 12px;">2ndCar</b>
                                    <br>
                                    <span style="font-size: 10px;">Secondary ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C1Li - Dental Caries Class 1 - Lingual" data-status_id="901" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C1Li - Dental Caries Class 1 - Lingual"><b style="font-size: 12px;">C1Li</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C1O - Dental Caries Class 1 - Occlusal" data-status_id="902" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C1O - Dental Caries Class 1 - Occlusal"><b style="font-size: 12px;">C1O</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2D - Dental Caries Class 2 - Distal" data-status_id="903" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2D - Dental Caries Class 2 - Distal"><b style="font-size: 12px;">C2D</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2DO - Dental Caries Class 2 - Distal &amp; Occlusal" data-status_id="904" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DO - Dental Caries Class 2 - Distal &amp; Occlusal"><b style="font-size: 12px;">C2DO</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2DOB - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Buccal" data-status_id="905" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DOB - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Buccal"><b style="font-size: 12px;">C2DOB</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2DOLi - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Lingual" data-status_id="906" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2DOLi - Dental Caries Class 2 - Distal &amp; Occlusal &amp; Lingual"><b style="font-size: 12px;">C2DOLi</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2M - Dental Caries Class 2 - Mesial" data-status_id="907" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2M - Dental Caries Class 2 - Mesial"><b style="font-size: 12px;">C2M</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2MO - Dental Caries Class 2 - Mesial &amp; Occlusal" data-status_id="908" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MO - Dental Caries Class 2 - Mesial &amp; Occlusal"><b style="font-size: 12px;">C2MO</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2MOB - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Buccal" data-status_id="909" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOB - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Buccal"><b style="font-size: 12px;">C2MOB</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C2MOD - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Distal" data-status_id="910" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOD - Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Distal"><b style="font-size: 12px;">C2MOD</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C2MOLi -  	Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Lingual" data-status_id="911" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C2MOLi -  	Dental Caries Class 2 - Mesial &amp; Occlusal &amp; Lingual"><b style="font-size: 12px;">C2MOLi</b>
                                    <br>
                                    <span style="font-size: 10px;"> 	Dental C...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C3D - Dental Caries Class 3 - Distal" data-status_id="912" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3D - Dental Caries Class 3 - Distal"><b style="font-size: 12px;">C3D</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C3M - Dental Caries Class 3 - Mesial" data-status_id="913" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3M - Dental Caries Class 3 - Mesial"><b style="font-size: 12px;">C3M</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C3MD - Dental Caries Class 3 - Mesial &amp; Distal" data-status_id="914" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C3MD - Dental Caries Class 3 - Mesial &amp; Distal"><b style="font-size: 12px;">C3MD</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C4DI - Dental Caries Class 4 - Distal &amp; Incisal" data-status_id="915" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4DI - Dental Caries Class 4 - Distal &amp; Incisal"><b style="font-size: 12px;">C4DI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C4MDI - Dental Caries Class 4 - Mesial &amp; Distal &amp; Incisal" data-status_id="916" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4MDI - Dental Caries Class 4 - Mesial &amp; Distal &amp; Incisal"><b style="font-size: 12px;">C4MDI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C4MI - Dental Caries Class 4 - Mesial &amp; Incisal" data-status_id="917" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C4MI - Dental Caries Class 4 - Mesial &amp; Incisal"><b style="font-size: 12px;">C4MI</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C5CB -  	Dental Caries Class 5 - Cervical Buccal" data-status_id="918" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CB -  	Dental Caries Class 5 - Cervical Buccal"><b style="font-size: 12px;">C5CB</b>
                                    <br>
                                    <span style="font-size: 10px;"> 	Dental C...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C5CLa - Dental Caries Class 5 - Cervical Labial" data-status_id="919" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">


                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CLa - Dental Caries Class 5 - Cervical Labial"><b style="font-size: 12px;">C5CLa</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C5CLi - Dental Caries Class 5 - Cervical Lingual" data-status_id="920" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C5CLi - Dental Caries Class 5 - Cervical Lingual"><b style="font-size: 12px;">C5CLi</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Caries" data-status_name="C6BC - Dental Caries Class 6 - Buccal Cusp" data-status_id="921" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C6BC - Dental Caries Class 6 - Buccal Cusp"><b style="font-size: 12px;">C6BC</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Caries" data-status_name="C6LiC - Dental Caries Class 6 - Lingual Cusp" data-status_id="922" data-status_type="ICDAS">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="C6LiC - Dental Caries Class 6 - Lingual Cusp"><b style="font-size: 12px;">C6LiC</b>
                                    <br>
                                    <span style="font-size: 10px;">Dental Car...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Endo
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Endo" data-status_name="RCT - Root Canal Treatment" data-status_id="27" data-status_type="rct">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="RCT - Root Canal Treatment"><b style="font-size: 12px;">RCT</b>
                                    <br>
                                    <span style="font-size: 10px;">Root Canal...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    General
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="# - Fracture" data-status_id="30" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="# - Fracture"><b style="font-size: 12px;">#</b>
                                    <br>
                                    <span style="font-size: 10px;">Fracture</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="| | - Diastema" data-status_id="31" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="| | - Diastema"><b style="font-size: 12px;">| |</b>
                                    <br>
                                    <span style="font-size: 10px;">Diastema</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Ab - Abrasion / Abfraction" data-status_id="1" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ab - Abrasion / Abfraction"><b style="font-size: 12px;">Ab</b>
                                    <br>
                                    <span style="font-size: 10px;">Abrasion /...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Abs - Abscess" data-status_id="925" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Abs - Abscess"><b style="font-size: 12px;">Abs</b>
                                    <br>
                                    <span style="font-size: 10px;">Abscess</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Ano - Anodontia" data-status_id="43" data-status_type="">
                                <div style="background-color: #00FFF7; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ano - Anodontia"><b style="font-size: 12px;">Ano</b>
                                    <br>
                                    <span style="font-size: 10px;">Anodontia</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Att - Attrition" data-status_id="5" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Att - Attrition"><b style="font-size: 12px;">Att</b>
                                    <br>
                                    <span style="font-size: 10px;">Attrition</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="du - Decubital ulcer" data-status_id="898" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="du - Decubital ulcer"><b style="font-size: 12px;">du</b>
                                    <br>
                                    <span style="font-size: 10px;">Decubital ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Edent - Edentulous Jaw" data-status_id="54" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Edent - Edentulous Jaw"><b style="font-size: 12px;">Edent</b>
                                    <br>
                                    <span style="font-size: 10px;">Edentulous...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Exfol - Exfoliated Primary Tooth" data-status_id="1133" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Exfol - Exfoliated Primary Tooth"><b style="font-size: 12px;">Exfol</b>
                                    <br>
                                    <span style="font-size: 10px;">Exfoliated...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Ext R - External Resorption" data-status_id="10" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Ext R - External Resorption"><b style="font-size: 12px;">Ext R</b>
                                    <br>
                                    <span style="font-size: 10px;">External R...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="FC - Fractured Crown" data-status_id="896" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FC - Fractured Crown"><b style="font-size: 12px;">FC</b>
                                    <br>
                                    <span style="font-size: 10px;">Fractured ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="FT - Fractured Tooth" data-status_id="897" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FT - Fractured Tooth"><b style="font-size: 12px;">FT</b>
                                    <br>
                                    <span style="font-size: 10px;">Fractured ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="G R - Gum Recession" data-status_id="14" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G R - Gum Recession"><b style="font-size: 12px;">G R</b>
                                    <br>
                                    <span style="font-size: 10px;">Gum Recess...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="GI - Gingivitis" data-status_id="899" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="GI - Gingivitis"><b style="font-size: 12px;">GI</b>
                                    <br>
                                    <span style="font-size: 10px;">Gingivitis</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Int R - Internal Resorption" data-status_id="16" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Int R - Internal Resorption"><b style="font-size: 12px;">Int R</b>
                                    <br>
                                    <span style="font-size: 10px;">Internal R...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Mcu - Missing Cause Unknown" data-status_id="17" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mcu - Missing Cause Unknown"><b style="font-size: 12px;">Mcu</b>
                                    <br>
                                    <span style="font-size: 10px;">Missing Ca...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="MT - Mobile tooth" data-status_id="924" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="MT - Mobile tooth"><b style="font-size: 12px;">MT</b>
                                    <br>
                                    <span style="font-size: 10px;">Mobile tooth</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="PE - Tooth Partially Erupted" data-status_id="20" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PE - Tooth Partially Erupted"><b style="font-size: 12px;">PE</b>
                                    <br>
                                    <span style="font-size: 10px;">Tooth Part...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="pp - Periodontal problem" data-status_id="900" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="pp - Periodontal problem"><b style="font-size: 12px;">pp</b>
                                    <br>
                                    <span style="font-size: 10px;">Periodonta...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="RDT - Retained Deciduous Tooth" data-status_id="923" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="RDT - Retained Deciduous Tooth"><b style="font-size: 12px;">RDT</b>
                                    <br>
                                    <span style="font-size: 10px;">Retained D...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="UE - Unerupted" data-status_id="29" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="UE - Unerupted"><b style="font-size: 12px;">UE</b>
                                    <br>
                                    <span style="font-size: 10px;">Unerupted</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Intruded (Mand.) or Extruded (Max.)" data-status_id="38" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Intruded (Mand.) or Extruded (Max.)"><img src="https://dentalcharting.com/images/annotation_intruded_extruded_down.gif">
                                    <br>
                                    <span style="font-size: 10px;">Intruded (...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Intruded (Max.) or Extruded (Mand.)" data-status_id="37" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Intruded (Max.) or Extruded (Mand.)"><img src="https://dentalcharting.com/images/annotation_intruded_extruded_up.gif">
                                    <br>
                                    <span style="font-size: 10px;">Intruded (...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Mesial Drift (1st &amp; 4th Quadrant) or Distal Drift (2nd &amp; 3rd Quadrant)" data-status_id="35" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mesial Drift (1st &amp; 4th Quadrant) or Distal Drift (2nd &amp; 3rd Quadrant)"><img src="https://dentalcharting.com/images/annotation_drifting_right.gif">
                                    <br>
                                    <span style="font-size: 10px;">Mesial Dri...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Mesial Drift (2nd &amp; 3rd Quadrant) or Distal Drift (1st &amp; 4th Quadrant)" data-status_id="34" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Mesial Drift (2nd &amp; 3rd Quadrant) or Distal Drift (1st &amp; 4th Quadrant)"><img src="https://dentalcharting.com/images/annotation_drifting_left.gif">
                                    <br>
                                    <span style="font-size: 10px;">Mesial Dri...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Rotated tooth (1st &amp; 4th quadrant)" data-status_id="39" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rotated tooth (1st &amp; 4th quadrant)"><img src="https://dentalcharting.com/images/annotation_rotated_tooth_cw.gif">
                                    <br>
                                    <span style="font-size: 10px;">Rotated to...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="General" data-status_name="Rotated tooth (2nd &amp; 3rd Quadrant)" data-status_id="40" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rotated tooth (2nd &amp; 3rd Quadrant)"><img src="https://dentalcharting.com/images/annotation_rotated_tooth_ccw.gif">
                                    <br>
                                    <span style="font-size: 10px;">Rotated to...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="General" data-status_name="Tooth Missing, Space Closed" data-status_id="36" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Tooth Missing, Space Closed"><img src="https://dentalcharting.com/images/annotation_space_closed.gif">
                                    <br>
                                    <span style="font-size: 10px;">Tooth Miss...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Implant
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Implant" data-status_name="IMP - Implant" data-status_id="15" data-status_type="">
                                <div style="background-color: #00CCFF; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="IMP - Implant"><b style="font-size: 12px;">IMP</b>
                                    <br>
                                    <span style="font-size: 10px;">Implant</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Preventive
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Preventive" data-status_name="PFS - Pit &amp; Fissure Sealant" data-status_id="928" data-status_type="">
                                <div style="background-color: #CCFFFF; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFS - Pit &amp; Fissure Sealant"><b style="font-size: 12px;">PFS</b>
                                    <br>
                                    <span style="font-size: 10px;">Pit &amp; Fiss...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Preventive" data-status_name="Var - Varnish" data-status_id="927" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Var - Varnish"><b style="font-size: 12px;">Var</b>
                                    <br>
                                    <span style="font-size: 10px;">Varnish</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Prostho
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="Abt+imp - Abutment" data-status_id="9" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Abt+imp - Abutment"><b style="font-size: 12px;">Abt+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Abutment</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="AJC - Acrylic Jacket Crown" data-status_id="2" data-status_type="">
                                <div style="background-color: #FFFF99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AJC - Acrylic Jacket Crown"><b style="font-size: 12px;">AJC</b>
                                    <br>
                                    <span style="font-size: 10px;">Acrylic Ja...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="AJC+imp - Acrylic Jacket Crown + Implant" data-status_id="428" data-status_type="">
                                <div style="background-color: #FFFF99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AJC+imp - Acrylic Jacket Crown + Implant"><b style="font-size: 12px;">AJC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Acrylic Ja...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="AMC - All Metal Crown" data-status_id="4" data-status_type="">
                                <div style="background-color: #000000; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AMC - All Metal Crown"><b style="font-size: 12px;">AMC</b>
                                    <br>
                                    <span style="font-size: 10px;">All Metal ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="AMC+imp - All Metal Crown + Implant" data-status_id="429" data-status_type="">
                                <div style="background-color: #000000; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="AMC+imp - All Metal Crown + Implant"><b style="font-size: 12px;">AMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">All Metal ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="BA - Bridge Abutment" data-status_id="6" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="BA - Bridge Abutment"><b style="font-size: 12px;">BA</b>
                                    <br>
                                    <span style="font-size: 10px;">Bridge Abu...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="BP - Bridge Pontic" data-status_id="7" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="BP - Bridge Pontic"><b style="font-size: 12px;">BP</b>
                                    <br>
                                    <span style="font-size: 10px;">Bridge Pon...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="FGC - Full Gold Crown" data-status_id="11" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FGC - Full Gold Crown"><b style="font-size: 12px;">FGC</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Gold ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="FGC+imp - Full Gold Crown + Implant" data-status_id="430" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FGC+imp - Full Gold Crown + Implant"><b style="font-size: 12px;">FGC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Gold ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="FMC - Full Metal Crown" data-status_id="57" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FMC - Full Metal Crown"><b style="font-size: 12px;">FMC</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Metal...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="FMC+imp - Full Metal Crown + Implant" data-status_id="431" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="FMC+imp - Full Metal Crown + Implant"><b style="font-size: 12px;">FMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Full Metal...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PBC - Porcelain Bonded Crown" data-status_id="18" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PBC - Porcelain Bonded Crown"><b style="font-size: 12px;">PBC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PBC+imp - Porcelain Bonded Crown + Implant" data-status_id="432" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PBC+imp - Porcelain Bonded Crown + Implant"><b style="font-size: 12px;">PBC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PC - Post Core" data-status_id="19" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PC - Post Core"><b style="font-size: 12px;">PC</b>
                                    <br>
                                    <span style="font-size: 10px;">Post Core</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFGC - Porcelain Fused to Gold Crown" data-status_id="21" data-status_type="">
                                <div style="background-color: #FFCC99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFGC - Porcelain Fused to Gold Crown"><b style="font-size: 12px;">PFGC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PFGC+imp - Porcelain Fused to Gold Crown + Implant" data-status_id="433" data-status_type="">
                                <div style="background-color: #FFCC99; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFGC+imp - Porcelain Fused to Gold Crown + Implant"><b style="font-size: 12px;">PFGC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFMB - Porcelain Fused to Metal Bridge" data-status_id="22" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMB - Porcelain Fused to Metal Bridge"><b style="font-size: 12px;">PFMB</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PFMC - Porcelain Fused to Metal Crown" data-status_id="23" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMC - Porcelain Fused to Metal Crown"><b style="font-size: 12px;">PFMC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PFMC+imp - Porcelain Fused to Metal Crown + Implant" data-status_id="434" data-status_type="">
                                <div style="background-color: #99CC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PFMC+imp - Porcelain Fused to Metal Crown + Implant"><b style="font-size: 12px;">PFMC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PJC - Porcelain Jacket Crown" data-status_id="24" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PJC - Porcelain Jacket Crown"><b style="font-size: 12px;">PJC</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Prostho" data-status_name="PJC+imp - Porcelain Jacket Crown + Implant" data-status_id="435" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PJC+imp - Porcelain Jacket Crown + Implant"><b style="font-size: 12px;">PJC+imp</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Prostho" data-status_name="PV - Porcelain Veneer" data-status_id="26" data-status_type="">
                                <div style="background-color: #FFFF00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PV - Porcelain Veneer"><b style="font-size: 12px;">PV</b>
                                    <br>
                                    <span style="font-size: 10px;">Porcelain ...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Resto
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Am - Amalgam" data-status_id="3" data-status_type="">
                                <div style="background-color: #969696; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Am - Amalgam"><b style="font-size: 12px;">Am</b>
                                    <br>
                                    <span style="font-size: 10px;">Amalgam</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="ART - Atraumatic Restorative Treatment" data-status_id="926" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="ART - Atraumatic Restorative Treatment"><b style="font-size: 12px;">ART</b>
                                    <br>
                                    <span style="font-size: 10px;">Atraumatic...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Co F - Composite Filling" data-status_id="8" data-status_type="">
                                <div style="background-color: #FF99CC; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co F - Composite Filling"><b style="font-size: 12px;">Co F</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="Co In - Composite Inlay" data-status_id="44" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co In - Composite Inlay"><b style="font-size: 12px;">Co In</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="Co On - Composite Onlay" data-status_id="42" data-status_type="">
                                <div style="background-color: #A68500; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Co On - Composite Onlay"><b style="font-size: 12px;">Co On</b>
                                    <br>
                                    <span style="font-size: 10px;">Composite ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="G In - Gold Inlay" data-status_id="13" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G In - Gold Inlay"><b style="font-size: 12px;">G In</b>
                                    <br>
                                    <span style="font-size: 10px;">Gold Inlay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="G On - Gold Onlay" data-status_id="41" data-status_type="">
                                <div style="background-color: #FFCC00; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="G On - Gold Onlay"><b style="font-size: 12px;">G On</b>
                                    <br>
                                    <span style="font-size: 10px;">Gold Onlay</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Resto" data-status_name="PRR - Preventive Resin Restoration" data-status_id="25" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="PRR - Preventive Resin Restoration"><b style="font-size: 12px;">PRR</b>
                                    <br>
                                    <span style="font-size: 10px;">Preventive...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Resto" data-status_name="TF - Temporary Filling" data-status_id="28" data-status_type="">
                                <div style="background-color: #C0C0C0; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="TF - Temporary Filling"><b style="font-size: 12px;">TF</b>
                                    <br>
                                    <span style="font-size: 10px;">Temporary ...</span>
                                </div>
                            </div>
                        </li>
                                    </ul>
                                </li>
                        <li class="group">
                            <div class="group_toggle table_header">
                                <div class="group_toggle_icon">
                                    <img src="https://dentalcharting.com/images/add.png" class="expand">
                                    <img src="https://dentalcharting.com/images/hide.png" class="collapse">
                                </div>
                                <div class="group_toggle_title">
                                    Surgery
                                    <div class="group_toggle_text">
                                        
                                        (click to <span class="expand">open</span><span class="collapse">close</span>)
                                    </div>
                                </div>
                            </div>
                            <ul class="group_to_toggle" style="display: none">
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Surgery" data-status_name="Imp tth - Impacted Tooth" data-status_id="55" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Imp tth - Impacted Tooth"><b style="font-size: 12px;">Imp tth</b>
                                    <br>
                                    <span style="font-size: 10px;">Impacted T...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Surgery" data-status_name="Rf - Root Fragment" data-status_id="56" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Rf - Root Fragment"><b style="font-size: 12px;">Rf</b>
                                    <br>
                                    <span style="font-size: 10px;">Root Fragm...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col1 ui-draggable" data-status_group="Surgery" data-status_name="Extracted Due To Caries" data-status_id="33" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="Extracted Due To Caries"><img src="https://dentalcharting.com/images/annotation_recently_extracted.gif">
                                    <br>
                                    <span style="font-size: 10px;">Extracted ...</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noselect status_draggable status_draggable_container status_draggable_container_col2 ui-draggable" data-status_group="Surgery" data-status_name="For Extraction Due To Caries" data-status_id="929" data-status_type="">
                                <div style="background-color: #; width: 35px; height: 35px; margin-right: 5px; float: left;">
                                    <img src="https://dentalcharting.com/images/icons/hand-click-drag24.png" style="margin: 5px 12px;">
                                </div>
                                <div style="padding: 3px 0; float: left" title="For Extraction Due To Caries"><img src="https://dentalcharting.com/images/annotation_roots_retained.gif">
                                    <br>
                                    <span style="font-size: 10px;">For Extrac...</span>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <tr>
                                <td colspan="13" class="add_edit_del_table_buttons">
                                    <input type="button" class="primary-button add-baseline-dental-record" value="+ Add line" name="Add-baseline-dental-record" data-chart_type="adult" data-chart_id="17125" style="cursor: pointer;">
                                </td>
                            </tr>
                    </tbody>
                </table>
               
               
					</div>
               
               <div class="tab-pane active" id="tab_9">
               <div class="tab_group_tab_content active" id="billing_statements_tab">
                    
                <table class="tab_content_table" width="100%" id="invoices">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record" colspan="7">Unbilled records</td>
                        </tr>
                        <tr>
                            <td class="table_header-1" width="30"></td>
                            <td class="table_header-1" width="100">Date / ID</td>
                            
                            <td class="table_header-1" width="50">Dentist</td>
                            <td class="table_header-1" width="55">Location</td>
                            <td class="table_header-1">Description</td>
                                <td class="table_header-1" width="120">Charges excl. VAT</td>
                        </tr>
                    </thead>
                    <tbody class="show">
                                <tr>
                                    <td colspan="8"><div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There are no billing statements generated for this patient yet.</div><br></td>
                                </tr>
                    </tbody>
                </table>
                </div>
					</div>
               
               <div class="tab-pane" id="tab_10">
               <div class="tab_group_tab_content active" id="billing_statements_tab1">
                    
                <table class="tab_content_table" width="100%" id="invoices1">
                    <thead>
                        <tr>
                            <td class="table_subheader_view_record" colspan="7">Billing statements</td>
                        </tr>
                        <tr>
                            <td class="table_header-1" width="80">Date / ID</td>
                            
                            <td class="table_header-1" width="40">Dentist</td>
                            <td class="table_header-1" width="45">Location</td>
                            <td class="table_header-1">Description</td>
                            <td class="table_header-1" width="80">Charges</td>
                                <td class="table_header-1" width="240">Debit</td>
                                <td class="table_header-1" width="80">Balance</td>
                        </tr>
                    </thead>
                    <tbody class="show">
                                <tr>
                                    <td colspan="8"><div class="info_message-chart"><i class="icon fa fa-info"></i> &nbsp;There are no billing statements generated for this patient yet.</div><br></td>
                                </tr>
                    </tbody>
                </table>
                </div>
               
					</div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

      
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
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  
  <script>
$(document).ready(function(){
    $(".edit-form-record").hide();
    $("#show").click(function(){
        $(".edit-form-record").show();
		 $("#patient_profile_tab").hide();
    });
	 $("#hide").click(function(){
        $("#patient_profile_tab").show();
		 $(".edit-form-record").hide();
    });
});
</script>
 <script>
$(document).ready(function(){
    $(".edit-form-record1").hide();
    $("#show1").click(function(){
        $(".edit-form-record1").show();
		 $("#patient_profile_tab1").hide();
    });
	 $("#hide1").click(function(){
        $("#patient_profile_tab1").show();
		 $(".edit-form-record1").hide();
    });
});
</script>
  <script>
	$(document).ready(function() {
    $("#twoCarDiv3,#twoCarDiv2,#twoCarDiv1").hide();
    $("input[name$='cars']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
		$("input[name$='cars1']").click(function() {
        var test = $(this).val();
        $("div.desc1").hide();
        $("#" + test).show();
    });
		$("input[name$='cars2']").click(function() {
        var test = $(this).val();
        $("div.desc2").hide();
        $("#" + test).show();
	 });
		$("input[name$='cars3']").click(function() {
        var test = $(this).val();
        $("div.desc3").hide();
        $("#" + test).show();
	 });
});
	</script>
  
<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
	</script>

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

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
