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
            <h1>Chief complaints</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chief complaints</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
         <div class="add-maintain">
        	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add Chief complaints
			  </button>
				<div class="collapse" id="collapseExample">
				  <div class="card">
						   <form id="cheif" class="add-chief-form">
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
										<td class="table_content" width="140px"><b>Name chief complaint</b></td>
										<td class="table_content" colspan="2">
											<input type="text" name="cname" id="cname" value="" style="width: 120px"> <span class="mandatory_field">*</span>
										</td>
									</tr>
									<tr>
										<td class="table_content" style="vertical-align: top;"><b>Description</b></td>
										<td class="table_content" style="vertical-align: top;" colspan="2">
											<textarea name="desc" id="desc" style="width: 300px; height: 75px;"></textarea><br>
										</td>
									</tr>
								</tbody></table>
								<table border="0" width="100%" class="add_edit_del_table_buttons">
								<tbody><tr>
									<td colspan="3">
									<input type="submit" value="Add" class="primary-button primary-button-chief">
									</td>
								</tr>
								</tbody></table>
							</form>
				  </div>
				</div>
          </div>
         
  
       
       
        
         <div class="col-md-12 ">
        <div class="card card-num">
            <table id="example" class="display responsive nowrap" style="width:100%">
			  <thead class='data-table'>
				<tr>
				  <th> Chief complaint</th>
				  <th> Description</th>
				  <th>Action</th>
				</tr>
			  </thead>
			</table>
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
