<?php
extract($_POST);
include("conn.php");
$perpage = 5;



if(isset($_GET['page']) AND $_GET['page']<1){
  $curpage=1;
}

elseif(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
}

else{
  $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$PageSql = "SELECT * FROM `bill`";
$pageres = mysqli_query($conn, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
if ($curpage>$endpage) {
  # code...
  $curpage=$endpage;
  $start = ($curpage * $perpage) - $perpage;
}

$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;


?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Billing Statement</title>
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
            <h1>Billing Statement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Billing Statement</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
         <div class="add-maintain">
          
        <div class="collapse" id="collapseExample">
          <div class="card">
               <form action="#" method="post" id="cheif" class="add-chief-form">
                <table border="0" width="100%" class="add_edit_del_table">
                  <tbody><tr>
                    <td class="table_subheader-form" colspan="3">Add Work Done
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <div class="info_message">In order to add a chief complaint you have to fill in the name and description of the new chief complaint.</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Status Category</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Status" id="Status">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT DISTINCT category FROM status");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['category'].'">'.$row['category'].'</option>';
                          }?>            
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Sub Status</b></td>
                    <td class="table_content" colspan="2">
                      <select name="substatus" id="substatus">
                        
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Clinic</b></td>
                    <td class="table_content" colspan="2">
                      <select name="clinic" id="clinic">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM clanic");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['id'].'">'.$row['clanic_name'].'</option>';
                          }?>            
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Dentist</b></td>
                    <td class="table_content" colspan="2">
                      <select name="dentist" id="dentist">
                        
                      </select>
                    </td>
                    </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Location</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Location" id="Location">
                        <option>Adult Quadrant 1</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option>Adult Quadrant 2</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">34</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option>Adult Quadrant 3</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option>Adult Quadrant 4</option>
                        <option value="41">41</option>
                        <option value="2">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                      </select>
                    </td>
                  </tr>
                  </tr>
                  <tr>
                    <td class="table_content" width="140px"><b>Select Cheif Complaint</b></td>
                    <td class="table_content" colspan="2">
                      <select name="cheifcom" id="cheifcom">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM chief_complaint");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['name'].'">'.$row['name'].'</option>';
                          }?> 
                      </select>
                    </td>

                  <tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Sign & Symptoms</b></td>
                    <td class="table_content" colspan="2">
                      <select name="signandsym" id="signandsym">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM sign_symptom");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['name'].'">'.$row['name'].'</option>';
                          }?> 
                      </select>
                    </td>

                  <tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Diagnosis</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Diagnosis" id="Diagnosis">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM diagnosis");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['diagnosis'].'">'.$row['diagnosis'].'</option>';
                          }?> 
                      </select>
                    </td>

                  <tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Procedure Category</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Procedurecat" id="materialcats">
                                <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM procedure_cat");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['procedure_id'].'">'.$row['cat_name'].'</option>';
                          }?>
                      </select>
                    </td>

                  <tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Procedure</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Procedure" id="Procedure">
                        
                      </select>
                    </td>

                  <tr>

                    <tr>
                    
                    <td class="table_content" colspan="2">
                      <div id="cont"></div>
                    </td>

                  </tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Material Category</b></td>
                    <td class="table_content" colspan="2">
                      <select name="materialcat" id="materialcat">
                        <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM material_cat");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['cat_id'].'">'.$row['material_name'].'</option>';
                          }?> 
                      </select>
                    </td>

                  </tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Material</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Material" id="matee">
                        
                      </select>
                    </td>

                  
                      <tr>
                    
                    <td class="table_content" colspan="2">
                      <div id="contt"></div>
                    </td>

                  </tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Prescription Category</b></td>
                    <td class="table_content" colspan="2">
                      <select name="presccat" id="presccat">
                      <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM pre_cat");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['cat_id'].'">'.$row['pre_name'].'</option>';
                          }?> 
                      </select>
                    </td>

                  <tr>
                    <tr>
                    <td class="table_content" width="140px"><b>Select Prescription</b></td>
                    <td class="table_content" colspan="2">
                      <select name="Prescription" id="prescription">
                        
                      </select>
                    </td>

                  <tr>
                    <td class="table_content" style="vertical-align: top;"><b>Description</b></td>
                    <td class="table_content" style="vertical-align: top;" colspan="2">
                      <textarea name="desc" id="desc" style="width: 300px; height: 75px;"></textarea><br>
                    </td>
                  </tr>
                </tbody></table>
                <table width="100%" border="0" class="add_edit_del_table_buttons">
                <tbody><tr>
                    <td colspan="7"><input type="submit" value="Save" name="opslaan" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
                </tr>
            </tbody></table>
              </form>
          </div>
        </div>
          </div>
         
  
       
       
        
         <div class="col-md-12 ">
        <div class="card card-num">
            <table id="example" class="display responsive nowrap" style="width:100%">
        
        <?php 
        
        $sql;
        if (isset($_GET['p_id'])) {
          # code...
          global $sql;
          $p_id=$_GET['p_id'];
          $sql=mysqli_query($conn, "SELECT * FROM bill WHERE patient_id='$p_id'");
        } else {
          # code...
          global $sql;
          $sql=mysqli_query($conn, "SELECT * FROM bill order by bill_id LIMIT $start, $perpage");
        }
        
        
        echo'<thead class="data-table">
        <tr>
          <th> Billing ID</th>
          <th> Patient ID</th>
          <th> Clinic</th>
          <th>Amount</th>
          <th>Amount Status</th>
          <th>Cheif Complaint</th>
          <th>Payment</th>
        </tr>
        </thead>';
        while ($row=mysqli_fetch_assoc($sql)) {
          # code...
          $amountstat = ($row['payment']==0) ? "Unpaid" : "Paid" ;
          if ($amountstat=="Paid" or !isset($_GET['p_id'])) {
            # code...
            echo '<tr>
          <td><a href="report.php?id='.$row['bill_id'].'">'.$row['bill_id'].'</a></td>
          <td>'.$row['patient_id'].'</td>
          <td>'.$row['dentist'].'</td>
          <td>'.$row['amount'].'</td>
          <td>'.$amountstat.'</td>
          <td>'.$row['cheif_complaint'].'</td>
          <td><button type="button" class="btn btn-primary" disabled=" ">PAID</button></td>

        </tr>';
          } else {
            # code...
            echo '<tr>
          <td><a href="report.php?id='.$row['bill_id'].'">'.$row['bill_id'].'</a></td>
          <td>'.$row['dentist'].'</td>
          <td>'.$row['amount'].'</td>
          <td>'.$amountstat.'</td>
          <td>'.$row['cheif_complaint'].'</td>
          <td><form method="post" action="pay.php?bill_id='.$row['bill_id'].'&p_id='.$p_id.'"><input type="submit" name="pays" VALUE="PAYs" class="btn btn-danger"></form></td>

        </tr>';
          }
          
          

        }
        
        ?>
        
      </table>
       <nav aria-label="Page navigation">
  <ul class="pagination">
  <?php if($curpage != $startpage){ ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($curpage >= 2){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
    <?php if($curpage != $endpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
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
<script src="dist/js/editworkdone.js" type="text/javascript"></script>






</body>
</html>
