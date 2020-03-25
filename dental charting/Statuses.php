<?php
session_start();
ob_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
extract($_POST);
require('conn.php');

if(isset($_GET['id'])) {
  # code...
 // echo "<script type='text/javascript'>alert('sjdflk');</script>";
  //echo "string";

 // mysqli_query($conn, "DELETE * FROM status WHERE id=''");

}
if (isset($opslaan)) {
  # code...
  //echo $cat1_existing;
  //echo "string";
  if (isset($cat1_existing_or_new)) {
    # code...
    $cat;

  //echo $cat1_existing_or_new;
  if ($cat1_existing_or_new=='existing') {
    # code...
   
   $cat=$cat1_existing;
  }
  else{
     
    $cat=$cat1_new;
  }

  //echo $cat;
  
  if (!empty($notation) || !empty($option5) || !empty($option8) ) {
    # code...

     mysqli_query($conn, "INSERT INTO status (id, category, status, color, description, d_score, m_score, f_score) VALUES (' ', '$cat', '$notation', '$option8', '$option5', '$d_score', '$m_score', '$f_score' )") or die("Not Added");
  }
 
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
            <h1>Statuses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Statuses</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
         <div class="add-maintain">
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        + Add status
        </button>
        <div class="collapse" id="collapseExample">
          <div class="card">
          <div class="Procedures-form">
           <form method="post" action="">
            <table border="0" width="100%" class="add_edit_del_table">
                <tbody><tr>
                  <td class="table_subheader" colspan="3">Add status: 
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;" colspan="2">
                    <div class="info_message" style="    padding: 10px;">In order to add a status you have to follow the following 2 steps:<br>
      - First specify the abbreviation<br>
      - Second pick a color and fill in the description of the new status.</div>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" width="100"><b>Category</b></td>
                  <td class="table_content input_existing_or_new_toggle">
                    <table>
                      <tbody><tr class="input_existing">
                        <td style="padding-right: 10px;"><input type="radio" name="cat1_existing_or_new" value="existing" class="existing_or_new_toggle" id="cat1_existing_or_new_existing"><label for="cat1_existing_or_new_existing">Existing category</label>:</td>
                        <td>
                          <select name="cat1_existing" style="width: 130px">
                            <option value="">--- Please select ---</option><option value="Caries">Caries</option><option value="Endo">Endo</option><option value="General">General</option><option value="Implant">Implant</option><option value="Preventive">Preventive</option><option value="Prostho">Prostho</option><option value="Resto">Resto</option><option value="Surgery">Surgery</option>
                          </select>
                        </td>
                      </tr>
                      <tr class="input_new">
                        <td style="padding-right: 10px;"><input type="radio" name="cat1_existing_or_new" value="new" class="existing_or_new_toggle" id="cat1_existing_or_new_new"><label for="cat1_existing_or_new_new">New category</label>:</td>
                        <td><input type="text" name="cat1_new" style="width: 130px" maxlength="20" value=""></td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" width="100"><b>Abbreviation</b></td>
                  <td class="table_content">
                    <input type="text" name="notation" style="width: 70px" maxlength="8" value=""> <span class="mandatory_field">*</span>
                  </td>
                </tr>
                <tr>
                  <td class="table_content"><b>Color coding</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="option8" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
                  <tr>
                  <td class="table_content" style="vertical-align: top;"><b>Description</b></td>
                  <td class="table_content">
                    <textarea name="option5" style="width: 120px"></textarea> <span class="mandatory_field">*</span>
                  </td>
                </tr>
                <tr>
                  <td class="table_content"><b>D Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="d_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
                <tr>
                  <tr>
                  <td class="table_content"><b>M Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="m_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
                <tr>
                  <tr>
                  <td class="table_content"><b>F Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="f_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
              
                <tr>
                  
                </tr>
                </tbody></table>
              <table border="0" width="100%" class="add_edit_del_table_buttons">
              <tbody><tr>
                <td colspan="3"><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
              </tr>
              </tbody></table>
            </form>
          </div>
          </div>
        </div>
          </div>
  
       
       
        
         <div class="col-md-12 ">
        <div class="card card-num">
            <table id="example6" class="display responsive nowrap" style="width:100%">
        <thead class='data-table'>
        <tr>
          <th> Category</th>
          <th> Status</th>
          <th> Color</th>
          <th> Description</th>
          <th> D Score</th>
          <th> M Score</th>
          <th> F Score</th>
          <th>Action</th>
        </tr>
        </thead>
      </table>
          </div>
      </div>
    </div>
    
    <div class="modal fade" id="statuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form id="updatestatus">
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Name Category:</label>
          <input type="text" class="form-control" name="categoryy" id="categoryy">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Name Status:</label>
          <input type="text" class="form-control" name="statuses" id="statuses">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Name Color:</label>
          <input type="text" class="form-control" name="colorr" id="colorr">
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">Description:</label>
          <textarea class="form-control" name="descc" id="descc"></textarea>
          
          </div>
         <div class="form-group">
          <label for="message-text" class="col-form-label">D Score:</label>
          <textarea class="form-control" name="dscoree" id="dscoree"></textarea>
         
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">M Score:</label>
          <textarea class="form-control" name="mscoree" id="mscoree"></textarea>
          
          </div>
           <div class="form-group">
          <label for="message-text" class="col-form-label">F Score:</label>
          <textarea class="form-control" name="fscoree" id="fscoree"></textarea>
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
//    alert("edit");
//    event.preventDefault();
//    $.ajax({
//      url : "actions.php",
//      method : "POST",
//      data : {
//        key: "editChief",
//        id: id
//      },
//      success : function(data){
//        $("#id").val(data.id);
//        $("#cname").val(data.cname);
//        $("#desc").val(data.desc);
//      }
//    });
//  }
  </script>


</body>
</html>
