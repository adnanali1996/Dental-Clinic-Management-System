sssss<?php
extract($_POST);
require("conn.php");

if (isset($opslaan)) {
	# code...
 
	if (!empty($l_name) AND !empty($gender) AND !empty($email) AND !empty($permission_group) AND !empty($prc_number) AND !empty($pda_id) AND !empty($ptr_number)AND !empty($ptr_number_date)AND !empty($s2_number)AND !empty($s2_number_date) AND !empty($dmf_d_mode)) {
		# code...
     if (isset($_POST['Days'])) {
      # code...
      $checkBox = implode(',', $_POST['Days']);
      print_r($Days);
      echo $size_of_array=sizeof($Days);
      $i=3;
      echo $Days[$i];
      $sql=mysqli_query($conn, "SELECT * FROM user WHERE u_email='$email'");
      $num=mysqli_num_rows($sql);
      if ($num) {
      	# code...
      	echo "<script type='text/javascript'>alert('User is Already Registered With This Email');</script>";
      } else {
      	# code...
      	mysqli_query($conn, "INSERT INTO `user` (`user_id`, `u_name`, `gender`, `u_email`, `u_pass`, `user_group`, `license_num`, `assoc_mem`, `local_tax`, `local_tax_date`, `dd_license`, `dd_license_date`, `dmf_scor`, `clanic_id`) VALUES ('', '$l_name', '$gender', '$email', ' ', '$permission_group', '$prc_number', '$pda_id', '$ptr_number', '$s2_number_date', '$s2_number', '$ptr_number_date', '$dmf_d_mode', '$checkBox');");
      $sql=mysqli_query($conn, "SELECT * FROM user WHERE u_email='$email'");
      $res=mysqli_fetch_assoc($sql);
      echo $user_id=$res['user_id'];
      for($i=0; $i<$size_of_array; $i++){
      	$clanic=$Days[$i];
      	mysqli_query($conn, "INSERT INTO clanic_doctor (`clanic_doctor_id`, `user_id`, `id`) VALUES ('', '$user_id', '$clanic')");
      }
     //echo "<script type='text/javascript'>alert('Inserted');</script>";
    header("Location:Manage.php");
      }
      
     
    }
    else{
    	echo "<script type='text/javascript'>alert('Please Select Atleast One Clinic.');</script>";

    }
		
	}
  else{
    
  # code...


    //echo "<script type='text/javascript'>alert('Inserted');</script>";
  }
    }
	



?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Chief complaints</title>
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
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Clanics</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

    <div id="content-content" style="margin-left:10%;">
          <div id="content-content" >
                        <div id="assistance-bar">
                            <div style="padding: 10px 10px 10px 0px;">
                            <center>
                                
        
                            </center>
                            </div>
                           
                          
                            <br style="clear: both">
                        </div>
            <form method="post" action="">
                <table border="0" width="100%" class="add_edit_del_table">
                    <tbody><tr>
                        <td class="table_subheader" colspan="8">Add user
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <div class="info_message">Here you can add a user</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="80"><b>Full Name</b></td>
                        <td class="table_content" width="150"><input type="text" name="l_name" style="width:120px;" value=""> <span class="mandatory_field">*</span></td>
                       
                     
                    </tr>
                    <tr>
                        <td class="table_content" width="55"><b>Gender</b></td>
                        <td class="table_content">
                        <input type="radio" name="gender" value="m" id="male"><label for="male">M</label> &nbsp;
                        <input type="radio" name="gender" value="f" id="female"><label for="female">F</label> &nbsp;<span class="mandatory_field">*</span>
                        </td>
                        <td class="table_content"><b>Email address</b></td>
                        <td class="table_content"><input type="text" name="email" style="width:120px;" value=""> <span class="mandatory_field">*</span></td>
                        <td class="table_content"><b>User group</b></td>
                        <td class="table_content" colspan="3">
                                <select name="permission_group" style="width:126px;">
                                    <option value="">-- Please select --</option>
                                        <option value="Account Holder">Account holder</option>
                                        <option value="Dentist">Dentist</option>
                                </select> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>License #</b></td>
                        <td class="table_content"><input type="text" name="prc_number" style="width:120px;" value=""></td>
                        <td class="table_content"><b>Association membership #</b></td>
                        <td class="table_content" colspan="5"><input type="text" name="pda_id" style="width:120px;" value=""></td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Local Tax #</b></td>
                        <td class="table_content"><input type="text" name="ptr_number" style="width:120px;" value=""></td>
                        <td class="table_content"><b>Local Tax # date</b></td>
                        <td class="table_content" colspan="5"><input type="date" name="ptr_number_date" style="width:120px;" value=""></td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Dangerous Drugs License #</b></td>
                        <td class="table_content" "=""><input type="text" name="s2_number" style="width:120px;" value=""></td>
                        <td class="table_content"><b>Dangerous Drugs License # date</b></td>
                        <td class="table_content" colspan="4"><input type="date" name="s2_number_date" style="width:120px;" value=""></td>
                    </tr>
                    </tbody></table>
                    
                    <table border="0" width="100%" class="add_edit_del_table">
                    <tbody>
                    <tr>
                        <td class="table_content" style="vertical-align: middle;"><b>DMF score</b> <span class="mandatory_field">*</span>:</td>
                        <td class="table_content">
                            <input type="radio" name="dmf_d_mode" value="icdas_4-6" id="dmf_d_mode_icdas_4_6"> <label for="dmf_d_mode_icdas_4_6">In DMF score show dentine caries lesions only – ICDAS 4-6 (default setting)</label><br>
                            <input type="radio" name="dmf_d_mode" value="icdas_1-6" id="dmf_d_mode_icdas_1_6"> <label for="dmf_d_mode_icdas_1_6">In DMF score show all enamel and dentine caries lesions – ICDAS 1-6</label>
                        </td>
                    </tr>
                    </tbody></table>
                    
                    <table border="0" width="100%" class="add_edit_del_table">
                    <tbody><tr>
                        <td class="table_content" width="230" style="vertical-align: top;"><b>The user works at the following clinics</b>:</td>
                        <td class="table_content">
                          <?php
                          $sql=mysqli_query($conn, "SELECT * FROM clanic");
                          $i=1;
                          while ($row=mysqli_fetch_assoc($sql)) {
                            # code...

                            echo'  <div class="col-ls-2">
                                            <div style="float: left;">
                                                <input type="checkbox" value="'.$row['id'].'" id="permissions_2253" name="Days[]">
                                            </div>
                                            <div style="float: left;">
                                                <label for="permissions_2253"><b>Xyz</b><br>Office #: 8<br>sdafsd, asdfasdf<br>
                                                lahore<br>
                                                34334<br>
                                                Pakistan</label>
                                            </div>
                                        </div>';
                                        $i++;
                          }
                          ?>>
                                      </td>
                    </tr>
                    </tbody></table>
                    
                    <table width="100%" border="0">
                    <tbody><tr>
                        <td class="add_edit_del_table_buttons"><input type="submit" value="Save" name="opslaan" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
                    </tr>
                </tbody></table>
            </form>
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
<!--
<script type="text/javascript">
      $(function () {
       $("#example").dataTable({
		   "bDeferRender" : true,
		   "sPaginationType" : "full_numbers",
		   
			"ajax":{
				"url":"actions.php",
				"type" : "POST",
				"data" : {cheif_data:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"name"},
				{"data":"description"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<button id="'+o.report+'" onclick="download(id)" class="btn btn-primary download" >Edit</button> <button id="'+o.report+'" onclick="download(id)" class="btn btn-primary download" >Edit</button>'; }
            }
			
			]
		});
      });
    </script>
-->



<script>
//function edit_chief(id){
//		alert("edit");
//		event.preventDefault();
//		$.ajax({
//			url : "actions.php",
//			method : "POST",
//			data : {
//				key: "editChief",
//				id: id
//			},
//			success : function(data){
//				$("#id").val(data.id);
//				$("#cname").val(data.cname);
//				$("#desc").val(data.desc);
//			}
//		});
//	}
	</script>


</body>
</html>
