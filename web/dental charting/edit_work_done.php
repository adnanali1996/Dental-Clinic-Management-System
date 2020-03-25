<?php
extract($_POST);
include("conn.php");
if (isset($pays)) {
	# code...
	echo'<script>alert(";");</script>';
}
if (isset($opslaan)) {
	# code...
	$materials;$procedures;$materialsBalance;$proceduresBalance;
	// echo $Status; echo "Status<br>";
	// echo $substatus;echo "Sub Status<br>";
	// echo $clinic;echo "Clinic <br>";
	// echo $dentist;echo "Dentist<br>";
	// echo $Location;echo "Location<br>";
	// echo $cheifcom;echo "Cheif<br>";
	// echo $signandsym;echo "Sign&Sym<br>";
	// echo $Diagnosis;echo "Diag<br>";
	// echo $Procedure;echo "Proce<br>";
	// echo $Material;echo "Material<br>";
	// echo $Prescription;echo "Prescription<br>";

//Start This is used to GEt the materilas  and caluculate the bill that is going to be inserted 

	 $sqlm = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_per_price on material_per_price.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$Material."'";  
      
     
      $result = mysqli_query($conn, $sqlm);  
      $num=mysqli_num_rows($result);
      if ($num) {
      	# code for Material_per_price...
      		while($row = mysqli_fetch_array($result))
      {  
       
       global $materials;
       $materials=$row['material_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].' | '.$row['per_price_name'];

       
      } 
      if (filter_var($MQuantity1, FILTER_VALIDATE_INT) AND filter_var($MPrice1, FILTER_VALIDATE_INT)) {
        $materialsBalance=($MQuantity1*$MPrice1);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RS');</script>");
		}
      } else {
      	# code for material_by_length ...
      	 $sqlm1 = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_length on material_by_length.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$Material."'";  
      
     
      $result1 = mysqli_query($conn, $sqlm1);  
      $num1=mysqli_num_rows($result1);
      if ($num1) {
      	# code...
      	 		while($row1 = mysqli_fetch_array($result1))
      {  
       
       global $materials;
       $materials=$row1['material_name'].' | '.$row1['sub_name'].' | '.$row1['attribute_name'].' | '.$row1['abbrev'].' | '.$row1['by_length_name'];

       
      } 
      if (filter_var($MQuantity1, FILTER_VALIDATE_INT) AND filter_var($MPrice1, FILTER_VALIDATE_INT)) {
        $materialsBalance=($MQuantity1*$MPrice1);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RS');</script>");
		}
      } else {
      	# code...
      	$sqlm2 = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_amount on material_by_amount.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$Material."'";  
      
     
      $result2 = mysqli_query($conn, $sqlm2);  
      while($row2 = mysqli_fetch_array($result2))
      {  
       
       global $materials;
       $materials=$row2['material_name'].' | '.$row2['sub_name'].' | '.$row2['attribute_name'].' | '.$row2['abbrev'].' | '.$row2['by_amount_name'];

       
      } 
    
      if (filter_var($MQuantity1, FILTER_VALIDATE_INT) AND filter_var($MPrice1, FILTER_VALIDATE_INT) AND filter_var($MQuantity2, FILTER_VALIDATE_INT) AND filter_var($MPrice2, FILTER_VALIDATE_INT) AND filter_var($MQuantity3, FILTER_VALIDATE_INT) AND filter_var($MPrice3, FILTER_VALIDATE_INT)) {
        $materialsBalance=($MQuantity1*$MPrice1)+($MQuantity2*$MPrice2)+($MQuantity3*$MPrice3);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RssS');</script>");
		}

      }
      

      }
 //END This is used to GEt the materilas  and caluculate the bill that is going to be inserted 

//This is used to GEt the procedures and caluculate the bill that is going to be inserted 
      $sql2 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_proce on procedure_per_proce.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$Procedure."'";  
      
     
      $result2 = mysqli_query($conn, $sql2);  
      $num2=mysqli_num_rows($result2);
      if ($num2) {
      	# code for procedrure_per_proce...
      	  while($row2 = mysqli_fetch_array($result2))
      {  
       
       global $procedures;
       $procedures=$row2['cat_name'].' | '.$row2['sub_name'].' | '.$row2['attribute_name'].' | '.$row2['abbrev'].' | '.$row2['per_procedure_name'];

       
      } 
    
      if (filter_var($Quantity1, FILTER_VALIDATE_INT) AND filter_var($Price1, FILTER_VALIDATE_INT) AND filter_var($Quantity2, FILTER_VALIDATE_INT) AND filter_var($Price2, FILTER_VALIDATE_INT)) {
        $proceduresBalance=($Quantity1*$Price1)+($Quantity2*$Price2);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RssS');</script>");
		}

      } else {
      	# code...
      	 $sql3 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_other on procedure_per_other.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$Procedure."'";  
      
     
      $result3 = mysqli_query($conn, $sql3);  
      $num3=mysqli_num_rows($result3);
      if ($num3) {
      	# code...
      		  while($row3 = mysqli_fetch_array($result3))
      {  
       
       global $procedures;
       $procedures=$row3['cat_name'].' | '.$row3['sub_name'].' | '.$row3['attribute_name'].' | '.$row3['abbrev'].' | '.$row3['other_name'];

       
      } 
    
      if (filter_var($Quantity1, FILTER_VALIDATE_INT) AND filter_var($Price1, FILTER_VALIDATE_INT) AND filter_var($Quantity2, FILTER_VALIDATE_INT) AND filter_var($Price2, FILTER_VALIDATE_INT) AND filter_var($Quantity3, FILTER_VALIDATE_INT) AND filter_var($Price3, FILTER_VALIDATE_INT) AND filter_var($Quantity4, FILTER_VALIDATE_INT) AND filter_var($Price4, FILTER_VALIDATE_INT) AND filter_var($Quantity5, FILTER_VALIDATE_INT) AND filter_var($Price5, FILTER_VALIDATE_INT) AND filter_var($Quantity6, FILTER_VALIDATE_INT) AND filter_var($Price6, FILTER_VALIDATE_INT) AND filter_var($Quantity7, FILTER_VALIDATE_INT) AND filter_var($Price7, FILTER_VALIDATE_INT) AND filter_var($Quantity8, FILTER_VALIDATE_INT) AND filter_var($Price8, FILTER_VALIDATE_INT)) {
        $proceduresBalance=($Quantity1*$Price1)+($Quantity2*$Price2)+($Quantity3*$Price3)+($Quantity4*$Price4)+($Quantity5*$Price5)+($Quantity6*$Price6)+($Quantity7*$Price7)+($Quantity8*$Price8);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RssS');</script>");
		}

      } else {
      	# code...
      	 $sql4 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_multiple on procedure_multiple.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$Procedure."'";  
      
	     
	      $result4 = mysqli_query($conn, $sql4);  
	      $num4=mysqli_num_rows($result4);
	      if ($num4) {
	      	# code...
	      	while($row4 = mysqli_fetch_array($result4))
      {  
       
       global $procedures;
       $procedures=$row4['cat_name'].' | '.$row4['sub_name'].' | '.$row4['attribute_name'].' | '.$row4['abbrev'].' | '.$row4['other_name'];

       
      } 
        if (filter_var($Quantity1, FILTER_VALIDATE_INT) AND filter_var($Price1, FILTER_VALIDATE_INT) AND filter_var($Quantity2, FILTER_VALIDATE_INT) AND filter_var($Price2, FILTER_VALIDATE_INT) AND filter_var($Quantity3, FILTER_VALIDATE_INT) AND filter_var($Price3, FILTER_VALIDATE_INT) AND filter_var($Quantity4, FILTER_VALIDATE_INT) AND filter_var($Price4, FILTER_VALIDATE_INT) AND filter_var($Quantity5, FILTER_VALIDATE_INT) AND filter_var($Price5, FILTER_VALIDATE_INT) AND filter_var($Quantity6, FILTER_VALIDATE_INT) AND filter_var($Price6, FILTER_VALIDATE_INT) AND filter_var($Quantity7, FILTER_VALIDATE_INT) AND filter_var($Price7, FILTER_VALIDATE_INT) AND filter_var($Quantity8, FILTER_VALIDATE_INT) AND filter_var($Price8, FILTER_VALIDATE_INT) AND filter_var($Quantity9, FILTER_VALIDATE_INT) AND filter_var($Price9, FILTER_VALIDATE_INT) AND filter_var($Quantity10, FILTER_VALIDATE_INT) AND filter_var($Price10, FILTER_VALIDATE_INT)) {
        $proceduresBalance=($Quantity1*$Price1)+($Quantity2*$Price2)+($Quantity3*$Price3)+($Quantity4*$Price4)+($Quantity5*$Price5)+($Quantity6*$Price6)+($Quantity7*$Price7)+($Quantity8*$Price8)+($Quantity9*$Price9)+($Quantity10*$Price10);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RssS');</script>");
		}
	      } else {
	      	# code...
	      	$sql5 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_single on procedure_per_single.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$Procedure."'";  
      
	     
	      $result5 = mysqli_query($conn, $sql5);  
	      while($row5 = mysqli_fetch_array($result5))
      {  
       
       global $procedures;
       $procedures=$row5['cat_name'].' | '.$row5['sub_name'].' | '.$row5['attribute_name'].' | '.$row5['abbrev'].' | '.$row5['per_name'];

       
      } 
         if (filter_var($Quantity1, FILTER_VALIDATE_INT) AND filter_var($Price1, FILTER_VALIDATE_INT) AND filter_var($Quantity2, FILTER_VALIDATE_INT) AND filter_var($Price2, FILTER_VALIDATE_INT) AND filter_var($Quantity3, FILTER_VALIDATE_INT) AND filter_var($Price3, FILTER_VALIDATE_INT)) {
        $proceduresBalance=($Quantity1*$Price1)+($Quantity2*$Price2)+($Quantity3*$Price3);
		} else {
    	echo("<script>alert('Please Enter Valid Price in RssS');</script>");
		}
	      }
	      



      }
      
      }
//END This is used to GEt the procedures and caluculate the bill that is going to be inserted      

//This is used to check the all values that is going to be inserted 
      if (!empty($materials) AND !empty($materialsBalance) AND !empty($procedures) AND !empty($proceduresBalance)) {
      	# code...
      // 	echo $materials; echo "materials<br>";
      // echo $materialsBalance; echo "materials Balance<br>";
      // echo $procedures; echo "Procedure <br>";
      
      //  echo $proceduresBalance; echo "Procedure Balance<br>";
       $total=$materialsBalance+$proceduresBalance;
      $p_id=$_GET['p_id'];
     
      mysqli_query($conn, "INSERT INTO `bill`(`bill_id`, `date`, `location`, `clinic`, `dentist`, `status`, `cheif_complaint`, `sign_symp`, `diagnosis`, `procedure_name`, `material`, `prescription`, `patient_id`, `amount`, `payment`) VALUES ('', NOW(), '$Location', '$clinic', '$dentist', '$Status', '$cheifcom', '$signandsym', '$Diagnosis', '$procedures', '$materials', '$Prescription', $p_id, $total, '1')") or die("NO");
      } else {
      	# code...
      	echo("<script>alert('Record Is Not Inserted.');</script>");
      }
      
//END This is used to check the all values that is going to be inserted 
      
}


?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Work Done</title>
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
            <h1>Work Done</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Work Done</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
         <div class="add-maintain">
        	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add Work Done
			  </button>
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
			  	$sql=mysqli_query($conn, "SELECT * FROM bill");
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
