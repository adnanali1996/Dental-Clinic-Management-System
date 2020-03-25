<?php
extract($_POST);
require("conn.php");
$id=$_GET['id'];
                
                       # code...
if (isset($opslaan)) {
	# code...
   $sql=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$id'");
  $row=mysqli_fetch_assoc($sql);
 $email=$row['u_email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    # code...
    $err="Please Provide Valid Email";
  }
  else{
    $sender="Dreams Teach Solutions";
    $header="From: ". $sender;
    $pass=randomPassword();
    echo $pass;
    $pass=md5($pass);
    mysqli_query($conn, "UPDATE user set u_pass='$pass' WHERE user_id='$id' ");
    $sub="Dreams Tech Solutions Password Reset";
    $msg="Your New Password is "."\n".$pass."\n";
    if (mail($email, $sub, $msg, $header)) {
      # code...
      $err="Email Sucessfully Sended";
    }
    else
      {$err="Your Email Can't Be Sended";
      }
    }

    
  }
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
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
    <section class="content-header" >
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
      <div class="row"style="margin-left:0%;" >
<div id="content-content" class="col-sm-12">
                        <div id="assistance-bar">
                         
                     <?php
                     $id=$_GET['id'];
                     $sql=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$id'");
                     while ($row=mysqli_fetch_assoc($sql)) {
                       # code...
                    
                     ?>      
            <form method="post" action="">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" class="add_edit_del_table">
                    <tbody><tr>
                        <td class="table_subheader" colspan="2">Resend user password</td>
                    </tr>
                    <tr>
                        <td colspan="2"><div class="info_message">From this page you may have DentalCharting generate a new password for this user and send it to him/her.</div><br></td>
                    </tr>
                    <tr>
                        <td class="table_content" width="130"><b>User id</b></td>
                        <td class="table_content"><?php echo $row['user_id']?></td>
                    </tr>
                    <tr>
                        <td class="table_content" width="130"><b>Name</b></td>
                        <td class="table_content"><?php echo $row['u_name']?></td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Email address</b></td>
                        <td class="table_content"><?php echo $row['u_email']?> <i>The new password will be sent to this email address.</i></td>
                    </tr>
                    </tbody></table>
                    <table width="100%" border="0" class="add_edit_del_table_buttons">
                    <tbody><tr>
                        <td colspan="6"><input type="submit" value="Generate and send new password" name="opslaan" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
                    </tr>
                </tbody></table>
            </form>
                </div>
      <!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php }?>
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
