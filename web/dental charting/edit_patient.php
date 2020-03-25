<?php
extract($_POST);
require("conn.php");
if (isset($submit)) {
  # code...
  //echo "<script type='text/javascript'>alert('sdfsd');</script>";
    $dob=$date_of_birth1.'/'.$date_of_birth2.'/'.$date_of_birth3;
    $p_id=$_GET['p_id'];
    if (!empty($fname)AND !empty($lname) AND isset($gender) AND !empty($dob) and isset($nationality) and isset($marital_status) ) {
      # code...
      $sq=mysqli_query($conn, "SELECT * FROM patients WHERE id='$p_id'");
      $num=mysqli_num_rows($sq);
      if ($num==1) {
        # code...
        $sql=mysqli_query($conn, "UPDATE patients SET last_name='$lname', middle_name='$mname', first_name='$fname', gender='$gender', birdth='$dob', nationality='$nationality', marital_status='$marital_status', house='$h_no', street='$street', district='$district', city='$city', province='$pro', postal_code='$postal', mobile='$mob', email='$email', comment='$general_comment', occupation='$occupation', status='$patient_status' WHERE id='$p_id'");
      } else {
        # code...
        echo'<script type="text/javascript"> alert("Record Does Not Exist.");</script>';
      }
      
       
    } else {
      # code...
      echo'<script type="text/javascript"> alert("Please Fill All The Fields");</script>';
    }
    
 
 /* echo $lname;
  echo $mname;
  echo $fname;
  echo $gender;

  echo $dob;
  echo $marital_status;
  echo $nationality;
  echo $h_no;
  echo $street;
  echo $district;
  echo $city;
  echo $pro;
  echo $postal;
  echo $nationality;
  echo $phone;
  echo $mob;
  echo $email;
  echo $email2;
  echo $general_comment;
  echo $patient_status;
  echo $occupation;
  echo $reference;*/

}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Add patient</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1> Edit Patient</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Edit Patient</li>
            </ol>
          </div>
        </div>
      </div>
      <?php
      $p_id=$_GET['p_id'];
        include("conn.php");
        $sql1=mysqli_query($conn, "SELECT * FROM patients WHERE id='$p_id'");
        $num=mysqli_num_rows($sql1);
        if ($num==1) {
          # code...
        } else {
          # code...
          echo '<img src="404.png" width=100% >';
          exit();
        }
        
        $res1=mysqli_fetch_assoc($sql1);
      ?>
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Patient Profile:
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" name="add_patient" method="post">
                <div class="card-body">
                 <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>Patient Profile:</b>
					</div>
                  <div class="col-md-4 form-vender vender-margin patient-name">
             <b>Last name:</b>
              <input type="text" name="lname" value="<?php echo $res1['last_name'];?>">
               <span class="mandatory_field">*</span>
                </div>
                 <div class="col-md-4 form-vender vender-margin patient-name">
             <b>Middle name:</b>
              <input type="text" name="mname" value="<?php echo $res1['middle_name'];?>">
               
                </div>
                 <div class="col-md-4 form-vender vender-margin patient-name">
             <b>First name:</b>
              <input type="text" name="fname" value="<?php echo $res1['first_name'];?>">
               
                </div>
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Gender:</b>
					  </div>
             <div class="form-group">
             
                    <div class="col-md-2 form-vender vender-margin patient-name">
                    <div class="form-check">
                     <input type="radio" name="gender" <?php echo ($res1['gender']=='m')?'checked':'' ?> value="m" id="male">
                      <label for="male">Male</label>
                      &nbsp;
                    </div>
				 </div>
                    <div class="col-md-8 form-vender vender-margin patient-name">
                    <div class="form-check">
                     <input type="radio" name="gender" <?php echo ($res1['gender']=='f')?'checked':'' ?> value="f" id="female">
                      
                      <label for="female">Female</label>
                      &nbsp;
                    </div>
				 </div>
                  </div>
               
                </div>
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                  <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Date of birth:</b>
					 </div>
           <?php $dob=$res1['birdth'];
           $month=substr($dob, 5,2);
           $dd=substr($dob, -2);
           $year=substr($dob, 0,4);

           echo'<div class="col-md-4 form-vender vender-margin patient-name date-birth">
             <input type="text" name="date_of_birth1" style="width: 70px;"  value="'.$year.'">
               <input type="text" name="date_of_birth2" style="width: 40px;"  value="'.$month.'">
               <input type="text" name="date_of_birth3" style="width: 40px;" value="'.$dd.'">
               <span class="mandatory_field">*</span>
               <i>Input in yyyy mm dd</i>
                </div>
                </div>';
            ?>
             
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 
                
                 <div class="col-md-2 form-vender vender-margin patient-name">
                 <b>Nationality:</b>
                 
					 </div>
					  <div class="col-md-10 form-vender vender-margin patient-name">
					 <select name="nationality" <?php echo ($res1['marital_status']=='single')?'checked':'' ?>><option value="" selected="">--- Select your nationality ---</option><option value="Afghan">Afghan</option><option value="Albanian">Albanian</option><option value="Algerian">Algerian</option><option value="American">American</option><option value="Andorran">Andorran</option><option value="Angolan">Angolan</option><option value="Antiguans">Antiguans</option><option value="Argentinean">Argentinean</option><option value="Armenian">Armenian</option><option value="Australian">Australian</option><option value="Austrian">Austrian</option><option value="Azerbaijani">Azerbaijani</option><option value="Bahamian">Bahamian</option><option value="Bahraini">Bahraini</option><option value="Bangladeshi">Bangladeshi</option><option value="Barbadian">Barbadian</option><option value="Barbudans">Barbudans</option><option value="Batswana">Batswana</option><option value="Belarusian">Belarusian</option><option value="Belgian">Belgian</option><option value="Belizean">Belizean</option><option value="Beninese">Beninese</option><option value="Bhutanese">Bhutanese</option><option value="Bolivian">Bolivian</option><option value="Bosnian">Bosnian</option><option value="Brazilian">Brazilian</option><option value="British">British</option><option value="Bruneian">Bruneian</option><option value="Bulgarian">Bulgarian</option><option value="Burkinabe">Burkinabe</option><option value="Burmese">Burmese</option><option value="Burundian">Burundian</option><option value="Cambodian">Cambodian</option><option value="Cameroonian">Cameroonian</option><option value="Canadian">Canadian</option><option value="Cape Verdean">Cape Verdean</option><option value="Central African">Central African</option><option value="Chadian">Chadian</option><option value="Chilean">Chilean</option><option value="Chinese">Chinese</option><option value="Colombian">Colombian</option><option value="Comoran">Comoran</option><option value="Congolese">Congolese</option><option value="Costa Rican">Costa Rican</option><option value="Croatian">Croatian</option><option value="Cuban">Cuban</option><option value="Cypriot">Cypriot</option><option value="Czech">Czech</option><option value="Danish">Danish</option><option value="Djibouti">Djibouti</option><option value="Dominican">Dominican</option><option value="Dutch">Dutch</option><option value="East Timorese">East Timorese</option><option value="Ecuadorean">Ecuadorean</option><option value="Egyptian">Egyptian</option><option value="Emirian">Emirian</option><option value="Equatorial guinean">Equatorial Guinean</option><option value="Eritrean">Eritrean</option><option value="Estonian">Estonian</option><option value="Ethiopian">Ethiopian</option><option value="Fijian">Fijian</option><option value="Filipino">Filipino</option><option value="Finnish">Finnish</option><option value="French">French</option><option value="Gabonese">Gabonese</option><option value="Gambian">Gambian</option><option value="Georgian">Georgian</option><option value="German">German</option><option value="Ghanaian">Ghanaian</option><option value="Greek">Greek</option><option value="Grenadian">Grenadian</option><option value="Guatemalan">Guatemalan</option><option value="Guinea-Bissauan">Guinea-Bissauan</option><option value="Guinean">Guinean</option><option value="Guyanese">Guyanese</option><option value="Haitian">Haitian</option><option value="Herzegovinian">Herzegovinian</option><option value="Honduran">Honduran</option><option value="Hungarian">Hungarian</option><option value="Icelander">Icelander</option><option value="Indian">Indian</option><option value="Indonesian">Indonesian</option><option value="Iranian">Iranian</option><option value="Iraqi">Iraqi</option><option value="Irish">Irish</option><option value="Israeli">Israeli</option><option value="Italian">Italian</option><option value="Ivorian">Ivorian</option><option value="Jamaican">Jamaican</option><option value="Japanese">Japanese</option><option value="Jordanian">Jordanian</option><option value="Kazakhstani">Kazakhstani</option><option value="Kenyan">Kenyan</option><option value="Kittian and Nevisian">Kittian and Nevisian</option><option value="Kuwaiti">Kuwaiti</option><option value="Kyrgyz">Kyrgyz</option><option value="Laotian">Laotian</option><option value="Latvian">Latvian</option><option value="Lebanese">Lebanese</option><option value="Liberian">Liberian</option><option value="Libyan">Libyan</option><option value="Liechtensteiner">Liechtensteiner</option><option value="Lithuanian">Lithuanian</option><option value="Luxembourger">Luxembourger</option><option value="Macedonian">Macedonian</option><option value="Malagasy">Malagasy</option><option value="Malawian">Malawian</option><option value="Malaysian">Malaysian</option><option value="Maldivan">Maldivan</option><option value="Malian">Malian</option><option value="Maltese">Maltese</option><option value="Marshallese">Marshallese</option><option value="Mauritanian">Mauritanian</option><option value="Mauritian">Mauritian</option><option value="Mexican">Mexican</option><option value="Micronesian">Micronesian</option><option value="Moldovan">Moldovan</option><option value="Monacan">Monacan</option><option value="Mongolian">Mongolian</option><option value="Moroccan">Moroccan</option><option value="Mosotho">Mosotho</option><option value="Motswana">Motswana</option><option value="Mozambican">Mozambican</option><option value="Namibian">Namibian</option><option value="Nauruan">Nauruan</option><option value="Nepalese">Nepalese</option><option value="New Zealander">New Zealander</option><option value="Ni-Vanuatu">Ni-Vanuatu</option><option value="Nicaraguan">Nicaraguan</option><option value="Nigerien">Nigerien</option><option value="North Korean">North Korean</option><option value="Northern Irish">Northern Irish</option><option value="Norwegian">Norwegian</option><option value="Omani">Omani</option><option value="Pakistani">Pakistani</option><option value="Palauan">Palauan</option><option value="Panamanian">Panamanian</option><option value="Papua New Guinean">Papua New Guinean</option><option value="Paraguayan">Paraguayan</option><option value="Peruvian">Peruvian</option><option value="Polish">Polish</option><option value="Portuguese">Portuguese</option><option value="Qatari">Qatari</option><option value="Romanian">Romanian</option><option value="Russian">Russian</option><option value="Rwandan">Rwandan</option><option value="Saint lucian">Saint Lucian</option><option value="Salvadoran">Salvadoran</option><option value="Samoan">Samoan</option><option value="San Marinese">San Marinese</option><option value="Sao Tomean">Sao Tomean</option><option value="Saudi">Saudi</option><option value="Scottish">Scottish</option><option value="Senegalese">Senegalese</option><option value="Serbian">Serbian</option><option value="Seychellois">Seychellois</option><option value="Sierra Leonean">Sierra Leonean</option><option value="Singaporean">Singaporean</option><option value="Slovakian">Slovakian</option><option value="Slovenian">Slovenian</option><option value="Solomon Islander">Solomon Islander</option><option value="Somali">Somali</option><option value="South African">South African</option><option value="South Korean">South Korean</option><option value="Spanish">Spanish</option><option value="Sri Lankan">Sri Lankan</option><option value="Sudanese">Sudanese</option><option value="Surinamer">Surinamer</option><option value="Swazi">Swazi</option><option value="Swedish">Swedish</option><option value="Swiss">Swiss</option><option value="Syrian">Syrian</option><option value="Taiwanese">Taiwanese</option><option value="Tajik">Tajik</option><option value="Tanzanian">Tanzanian</option><option value="Thai">Thai</option><option value="Togolese">Togolese</option><option value="Tongan">Tongan</option><option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option><option value="Tunisian">Tunisian</option><option value="Turkish">Turkish</option><option value="Tuvaluan">Tuvaluan</option><option value="Ugandan">Ugandan</option><option value="Ukrainian">Ukrainian</option><option value="Uruguayan">Uruguayan</option><option value="Uzbekistani">Uzbekistani</option><option value="Venezuelan">Venezuelan</option><option value="Vietnamese">Vietnamese</option><option value="Welsh">Welsh</option><option value="Yemenite">Yemenite</option><option value="Zambian">Zambian</option><option value="Zimbabwean">Zimbabwean</option>
                    </select>
                     <span class="mandatory_field">*</span>
					 </div>
					
					 </div>
					 
					
					
                  <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-2 form-vender vender-margin patient-name">
                 <b>Marital status:</b>
					  </div>
					  <div class="col-md-10 form-vender vender-margin patient-name">
					  <input type="radio" name="marital_status" <?php echo ($res1['marital_status']=='single')?'checked':'' ?> value="single" style="margin: 0px;" id="single">
					  <label for="single">Single</label>
					   &nbsp;
                    <input type="radio" name="marital_status" <?php echo ($res1['marital_status']=='married')?'checked':'' ?> value="married" id="married">
                    <label for="married">Married</label>
                      &nbsp;
                      <input type="radio" name="marital_status" <?php echo ($res1['marital_status']=='widow')?'checked':'' ?> value="widow" id="widower">
                      <label for="widower">Widow(er)</label>
                       &nbsp;
                       <input type="radio" name="marital_status" <?php echo ($res1['marital_status']=='separated')?'checked':'' ?> value="separated" id="separated">
                       <label for="separated">Separated</label>
                            &nbsp;
					  </div>
					</div>
               
                  <div class="col-md-12 form-vender vender-margin patient-name Patient-adress">
                   <b>Patient adress(es):</b>
					</div>
                
                 
                 
                 <div class="main-content">
                 <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-3 form-vender vender-margin patient-name">
                  <b>Home address</b>
					 </div>
					
					 
				</div>
                <div  class="desc3">
                	
                </div>
                 <div  class="desc3">
                  <div class="col-md-12 form-vender vender-margin patient-name">
                  <div class="col-md-1 form-vender vender-margin patient-name">
             <b>House #:</b>
					  </div>
             <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="h_no" value="<?php echo $res1['house'];?>">
               <span class="mandatory_field">*</span>
					  </div>
                
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>Street:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="street" value="<?php echo $res1['street'];?>">
               
                </div>
				  
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>District:</b>
					  </div>
               <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="district" value="<?php echo $res1['district'];?>">
               
                </div>
					</div>
               
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-1 form-vender vender-margin patient-name">
             <b>City:</b>
					</div>
              <div class="col-md-3 form-vender vender-margin patient-name">
              <input type="text" name="city" value="<?php echo $res1['city'];?>">
               <span class="mandatory_field">*</span>
                </div>
                 <div class="col-md-1  form-vender vender-margin patient-name Province ">
             <b>Province:</b>
					</div>
              <div class="col-md-7 form-vender vender-margin patient-name">
              <input type="text" name="pro" value="<?php echo $res1['province'];?>">
               <span class="mandatory_field">*</span>
                </div>
					</div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Postal code:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="postal" value="<?php echo $res1['postal_code'];?>">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
          
                 
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Phone #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="phone" value="<?php echo $res1['mobile'];?>">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Mobile #:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="mob" value="<?php echo $res1['mobile'];?>">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                
                 <div class="col-md-12 form-vender vender-margin patient-name">
                 <div class="col-md-2 form-vender vender-margin patient-name">
             <b>Email address:</b>
					</div>
             <div class="col-md-10 form-vender vender-margin patient-name">
              <input type="text" name="email" value="<?php echo $res1['email'];?>">
               <span class="mandatory_field">*</span>
					 </div>
                </div>
                 
                 
                 </div>
                 
                 </div>
                
                
                <div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-2 form-vender vender-margin patient-name">
					    <b></b>
					  
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
						<textarea name="general_comment" style="width: 100%;" rows="4" ><?php echo $res1['comment'];?></textarea>
							</div>
						</div>
						<div class="col-md-6 form-vender vender-margin patient-name">
						<div class="col-md-12 form-vender vender-margin patient-name comments">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Referred by:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name">
					  <input type="text" name="reference"  value="">
					</div>
					</div>
						<div class="col-md-12 form-vender vender-margin patient-name">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Occupation:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name">
					  <input type="text" name="occupation"  value="<?php echo $res1['occupation'];?>">
					</div>
					</div>
					<div class="col-md-12 form-vender vender-margin patient-name ">
					  <div class="col-md-4 form-vender vender-margin patient-name">
					    <b>Status:</b>
					  
					</div>
					 <div class="col-md-8 form-vender vender-margin patient-name austarlia">
					 <select name="patient_status" style="width:180px;"><option value="Black-listed">Black-listed</option><option value="Celebrity">Celebrity</option><option value="Family">Family</option><option value="HIV positive">HIV positive</option><option value="Regular patient" selected="">Regular patient</option><option value="VIP">VIP</option>
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
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  <button type="submit" class="btn btn-default">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            
            <!-- /.card -->

            
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->

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
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
