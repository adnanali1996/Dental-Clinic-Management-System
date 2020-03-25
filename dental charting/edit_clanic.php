<?php
extract($_POST);
require("conn.php");
session_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
echo $id=$_GET['id'];
if (isset($opslaan)) {
	# code...
	if (!empty($office_organisation_name) AND !empty($office_street) AND !empty($office_house_number) AND !empty($office_postal_code) AND !empty($office_city) AND !empty($office_barangay) AND !empty($office_province)AND !empty($office_phone_number)AND !empty($office_email)AND !empty($office_tin_number)) {
		# code...
		echo "<script type='text/javascript'>alert('Update Successfully.');</script>";
		mysqli_query($conn, "UPDATE `clanic` SET clanic_name='$office_organisation_name', building_name='$office_building_name', office_num='$office_building_office_number', street='$office_street', street_num='$office_house_number', country='$office_country', postal_code='$office_postal_code', city='$office_city', district='$office_barangay', province='$office_province', phone_num='$office_phone_number', fax_num='$office_fax_number', mob_num='$office_mobile_number', email_add='$office_email', govt_name='$office_dti_sec_reg_name', govt_regiter_num='$office_dti_sec_reg_number', company_tax='$office_tin_number', clanic_manager='$person_responsible_l_name' WHERE id='$id'");
		//header("Location:Manage.php");
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
            <h1>Add Clanics</h1>
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

    <div id="content-content">
                        <div id="assistance-bar" class="table-responsive" style="margin-left: 100px;">
                            
                           <div class="info_message" >Fill in the form underneath to add a new clinic.</div><br>
        <form method="post" action="">
        	<?php
        	require("conn.php");
        	$id=$_GET['id'];
        	$sql=mysqli_query($conn, "SELECT * FROM clanic WHERE id='$id'");
        	while ($row=mysqli_fetch_assoc($sql)) {
        		# code...
        		//echo $row['clanic_name'];
        	
        	?>
            <table border="0" width="100%" class="add_edit_del_table" class="table">
                <tbody><tr>
                    <td class="table_subheader" colspan="8">Clinic address details. Shown in the header of quotations, billing statements, prescriptions and documents</td>
                </tr>
                <tr>
                    <td class="table_content"><b>Clinic name</b></td>
                    <td class="table_content" colspan="7"><input type="text" name="office_organisation_name" style="width:120px;" value="<?php echo $row['clanic_name']?>"> <span class="mandatory_field">*</span></td>
                </tr>
                <tr>
                    <td class="table_content"><b>Building name</b></td>
                    <td class="table_content"><input type="text" name="office_building_name" style="width:120px;" value="<?php echo $row['building_name']?>"></td>
                    <td class="table_content"><b>Office #</b></td>
                    <td class="table_content" colspan="5"><input type="text" name="office_building_office_number" style="width:120px;" value="<?php echo $row['office_num']?>"></td>
                </tr>
                    <tr>
                        <td class="table_content"><b>Street</b></td>
                        <td class="table_content"><input type="text" name="office_street" style="width:120px;" value="<?php echo $row['street']?>"> <span class="mandatory_field">*</span></td>
                        <td class="table_content"><b>Street #</b></td>
                        <td class="table_content" colspan="5"><input type="text" name="office_house_number" style="width:120px;" value="<?php echo $row['street_num']?>"> <span class="mandatory_field">*</span></td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Postal code</b></td>
                        <td class="table_content"><input type="text" name="office_postal_code" style="width:120px;" value="<?php echo $row['postal_code']?>"> <span class="mandatory_field">*</span></td>
                        <td class="table_content"><b>City</b></td>
                        <td class="table_content"><input type="text" name="office_city" style="width:120px;" value="<?php echo $row['city']?>"> <span class="mandatory_field">*</span></td>
                        <td class="table_content"><b>District</b></td>
                        <td class="table_content"><input type="text" name="office_barangay" style="width:120px;" value="<?php echo $row['district']?>"></td>
                        <td class="table_content"><b>Province</b></td>
                        <td class="table_content"><input type="text" name="office_province" style="width:120px;" value="<?php echo $row['province']?>"></td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Country</b></td>
                        <td class="table_content" colspan="7">
                            <select name="office_country"><option value="<?php echo $row['country']?>" selected="">--- Select your country ---</option><option value="Aaland">Aaland</option><option value="Abkhazia">Abkhazia</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote d'Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic Republic of Congo">Democratic Republic of Congo</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Nagorno-Karabakh">Nagorno-Karabakh</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="People's Republic of China">People's Republic of China</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Republic of China">Republic of China</option><option value="Republic of Congo">Republic of Congo</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Barthelemy">Saint Barthelemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent and Grenadines">Saint Vincent and Grenadines</option><option value="Saint-Martin">Saint-Martin</option><option value="Saint-Pierre and Miquelon">Saint-Pierre and Miquelon</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="Somaliland">Somaliland</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="South Ossetia">South Ossetia</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Transnistria">Transnistria</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tristan da Cunha">Tristan da Cunha</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States Virgin Islands">United States Virgin Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                            </select> 
                        </td>
                    </tr>
                <tr>
                    <td class="table_content"><b>Phone #</b></td>
                    <td class="table_content" colspan="7"><input type="text" name="office_phone_number" style="width:120px;" value="<?php echo $row['phone_num']?>"> <span class="mandatory_field">*</span></td>
                </tr>
                <tr>
                    <td class="table_content"><b>Fax #</b></td>
                    <td class="table_content" colspan="7"><input type="text" name="office_fax_number" style="width:120px;" value="<?php echo $row['fax_num']?>"></td>
                </tr>
                <tr>
                    <td class="table_content"><b>Mobile #</b></td>
                    <td class="table_content" colspan="7"><input type="text" name="office_mobile_number" style="width:120px;" value="<?php echo $row['mob_num']?>"></td>
                </tr>
                <tr>
                    <td class="table_content"><b>Email address</b></td>
                    <td class="table_content" colspan="7"><input type="text" name="office_email" style="width:120px;" value="<?php echo $row['email_add']?>"> <span class="mandatory_field">*</span></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                </tbody></table>
                
                <table border="0" width="100%" class="add_edit_del_table">
                <tbody><tr>
                    <td class="table_content" width="150"><b>Gov't name</b></td>
                    <td class="table_content" width="130"><input type="text" name="office_dti_sec_reg_name" style="width:120px;" value="<?php echo $row['govt_name']?>"></td>
                    <td class="table_content" width="130"><b>Gov't registered #</b></td>
                    <td class="table_content" width="130"><input type="text" name="office_dti_sec_reg_number" style="width:120px;" value="<?php echo $row['govt_regiter_num']?>"></td>
                    <td class="table_content" width="40"><b>Company TAX #</b></td>
                    <td class="table_content"><input type="text" name="office_tin_number" style="width:120px;" value="<?php echo $row['company_tax']?>"> <span class="mandatory_field">*</span></td>
                </tr>
                </tbody></table>
                
                <table border="0" width="100%" class="add_edit_del_table">
                    <tbody><tr>
                        <td class="table_subheader" colspan="6">Clinic management</td>
                    </tr>
                    <tr>
                        <td class="table_content" width="87"><b>Clinic Manager's Name</b></td>
                        <td class="table_content" width="195">
                           
                            <input type="text" name="person_responsible_l_name" style="width:120px;" value="<?php echo $row['clanic_manager']?>">
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
		
		
		<?php }?>
		
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
<?php?>