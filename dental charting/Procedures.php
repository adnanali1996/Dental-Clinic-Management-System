<?php
session_start();
ob_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
extract($_POST);
require("conn.php");

//echo $_SERVER['REQUEST_URI']; 

if (isset($opslaan)) {
	# code...
	
	
	
	//if 4 input fields are empty
	if (!empty($cat1_textfield) AND !isset($cat1) AND !isset($cat2) AND !isset($cat3) AND !empty($cat2_textfield) AND !empty($cat4_textfield)) {
		# code...
		
		$q=mysqli_query($conn, "SELECT * FROM procedure_cat WHERE cat_name='$cat1_textfield'");
		$num=mysqli_num_rows($q);
		if ($num) {
			# code...
			echo '<script type="text/javascript">alert("Procedure Name Exist.");</script>';
		}
		else
		{
			mysqli_query($conn, "INSERT INTO procedure_cat VALUES ('', '$cat1_textfield')");
			$q1=mysqli_query($conn, "SELECT * FROM procedure_cat WHERE cat_name='$cat1_textfield'");
		    $result=mysqli_fetch_assoc($q1);
		    $procedure_id=$result['procedure_id'];
		    $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2_textfield'");
			$num1=mysqli_num_rows($q1);
			if ($num1) {
				# code...
				echo '<script type="text/javascript">alert("Procedures Subcategory Exist.");</script>';
			} 
			else {
				# code...
				 mysqli_query($conn, "INSERT INTO procedure_subcat VALUES ('', '$cat2_textfield', '$procedure_id')");
				 $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2_textfield'");
				 $result=mysqli_fetch_assoc($q1);
				 $procedure_subcat_id=$result['procedure_subcat_id'];
				 
			     	# code...
			     	mysqli_query($conn, "INSERT INTO procedure_attribute VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
			     	$q3=mysqli_query($conn, "SELECT MAX(attri_id) FROM procedure_attribute");
				 	$result=mysqli_fetch_assoc($q3);
				 	$attri_id=$result['MAX(attri_id)'];
						if (isset($option101)) {
						# code...
							if ($option101=="A") {
								# code...
								if (!empty($single_procedure_price) AND !empty($single_addl_pontic_price)) {
									# code...

									$price1=$single_procedure_price;
								    $price2=$single_addl_pontic_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								}
								
								

							} 
							elseif ($option101=="B") {
								# code...
								if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
									# code...

									$price1=$single_tooth_simple_procedure_price;
								    $price2=$single_tooth_moderate_procedure_price;
								    $price3=$single_tooth_complicated_procedure_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								}
								
							}
							elseif ($option101=="C"){
								if (!empty($multiple_teeth_quadrant_price) AND !empty($multiple_teeth_maxilla_price) AND !empty($multiple_teeth_mandible_price) AND !empty($multiple_teeth_maxilla_mandible_price) AND !empty($multiple_teeth_anterior_maxilla_price) AND !empty($multiple_teeth_anterior_mandible_price) AND !empty($multiple_teeth_left_posterior_maxilla_price) AND !empty($multiple_teeth_right_posterior_mandible_price) AND !empty($multiple_teeth_left_posterior_mandible) AND !empty($multiple_teeth_maxilla_mandible_price)) {
									# code...

									echo $price1=$multiple_teeth_quadrant_price;
								    echo $price2=$multiple_teeth_maxilla_price;
								    echo $price3=$multiple_teeth_mandible_price;
								    echo $price4=$multiple_teeth_maxilla_mandible_price;
								    echo $price5=$multiple_teeth_anterior_maxilla_price;
								    echo $price6=$multiple_teeth_anterior_mandible_price;
								    echo $price7=$multiple_teeth_left_posterior_maxilla_price;
								    echo $price8=$single_tooth_simple_procedure_price;
								    echo $price9=$multiple_teeth_right_posterior_mandible_price;
								    echo $price10=$multiple_teeth_left_posterior_mandible;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    $price9=0;
								    $price10=0;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								}

							}
							elseif ($option101=="D"){
								if (!empty($other_areas_upper_lip_price) AND !empty($other_areas_lower_lip_price) AND !empty($other_areas_right_cheek_price) AND !empty($other_areas_left_cheek_price) AND !empty($other_areas_tongue_price) AND !empty($other_areas_floor_price) AND !empty($other_areas_hard_palate_price) AND !empty($other_areas_soft_palate_price)) {
									# code...

									$price1=$other_areas_upper_lip_price;
								    $price2=$other_areas_lower_lip_price;
								    $price3=$other_areas_right_cheek_price;
								    $price4=$other_areas_left_cheek_price;
								    $price5=$other_areas_tongue_price;
								    $price6=$other_areas_floor_price;
								    $price7=$other_areas_hard_palate_price;
								    $price8=$other_areas_soft_palate_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								} else {
									# code...
									$price1=$other_areas_upper_lip_price;
								    $price2=$other_areas_lower_lip_price;
								    $price3=$other_areas_right_cheek_price;
								    $price4=$other_areas_left_cheek_price;
								    $price5=$other_areas_tongue_price;
								    $price6=$other_areas_floor_price;
								    $price7=$other_areas_hard_palate_price;
								    $price8=$other_areas_soft_palate_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								}

								
							
							
					}
			     }
			     
				 

			}
			
		   
		}
		


	}
// if one Select Option of Procedure Cat is selected and other 3 input fields contains data
if (isset($cat1) AND !isset($cat2) AND !empty($cat2_textfield) AND !empty($cat4_textfield)) {
		# code...
		
	
			
			$q1=mysqli_query($conn, "SELECT * FROM procedure_cat WHERE cat_name='$cat1'");
		    $result=mysqli_fetch_assoc($q1);
		    $procedure_id=$result['procedure_id'];
		    $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2_textfield'");
			$num1=mysqli_num_rows($q1);
			if ($num1) {
				# code...
				echo '<script type="text/javascript">alert("Procedures Subcategory Exist.");</script>';
			} 
			else {
				# code...
				 mysqli_query($conn, "INSERT INTO procedure_subcat VALUES ('', '$cat2_textfield', '$procedure_id')");
				 $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2_textfield'");
				 $result=mysqli_fetch_assoc($q1);
				 $procedure_subcat_id=$result['procedure_subcat_id'];
				 
			     	# code...
			     	mysqli_query($conn, "INSERT INTO procedure_attribute VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
			     	$q3=mysqli_query($conn, "SELECT MAX(attri_id) FROM procedure_attribute");
				 	$result=mysqli_fetch_assoc($q3);
				 	$attri_id=$result['MAX(attri_id)'];
						if (isset($option101)) {
						# code...
							if ($option101=="A") {
								# code...
								if (!empty($single_procedure_price) AND !empty($single_addl_pontic_price)) {
									# code...

									$price1=$single_procedure_price;
								    $price2=$single_addl_pontic_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								}
								
								

							} 
							elseif ($option101=="B") {
								# code...
								if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
									# code...

									$price1=$single_tooth_simple_procedure_price;
								    $price2=$single_tooth_moderate_procedure_price;
								    $price3=$single_tooth_complicated_procedure_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								}
								
							}
							elseif ($option101=="C"){
								if (!empty($multiple_teeth_quadrant_price) AND !empty($multiple_teeth_maxilla_price) AND !empty($multiple_teeth_mandible_price) AND !empty($multiple_teeth_maxilla_mandible_price) AND !empty($multiple_teeth_anterior_maxilla_price) AND !empty($multiple_teeth_anterior_mandible_price) AND !empty($multiple_teeth_left_posterior_maxilla_price) AND !empty($multiple_teeth_right_posterior_mandible_price) AND !empty($multiple_teeth_left_posterior_mandible) AND !empty($multiple_teeth_maxilla_mandible_price)) {
									# code...

									$price1=$multiple_teeth_quadrant_price;
								    $price2=$multiple_teeth_maxilla_price;
								    $price3=$multiple_teeth_mandible_price;
								    $price4=$multiple_teeth_maxilla_mandible_price;
								    $price5=$multiple_teeth_anterior_maxilla_price;
								    $price6=$multiple_teeth_anterior_mandible_price;
								    $price7=$multiple_teeth_left_posterior_maxilla_price;
								    $price8=$single_tooth_simple_procedure_price;
								    $price9=$multiple_teeth_right_posterior_mandible_price;
								    $price10=$multiple_teeth_left_posterior_mandible;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    $price9=0;
								    $price10=0;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								}

							}
							elseif ($option101=="D"){
								if (!empty($other_areas_upper_lip_price) AND !empty($other_areas_lower_lip_price) AND !empty($other_areas_right_cheek_price) AND !empty($other_areas_left_cheek_price) AND !empty($other_areas_tongue_price) AND !empty($other_areas_floor_price) AND !empty($other_areas_hard_palate_price) AND !empty($other_areas_soft_palate_price)) {
									# code...

									$price1=$other_areas_upper_lip_price;
								    $price2=$other_areas_lower_lip_price;
								    $price3=$other_areas_right_cheek_price;
								    $price4=$other_areas_left_cheek_price;
								    $price5=$other_areas_tongue_price;
								    $price6=$other_areas_floor_price;
								    $price7=$other_areas_hard_palate_price;
								    $price8=$other_areas_soft_palate_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								}

								
							
							
					}
			     }
			     
				 

			}
			
		   
		}
// END if one Select Option of Procedure Cat is selected and other 3 input fields contains data	
// if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and other 2 input fields contains data
if (isset($cat1) AND isset($cat2) AND !isset($cat3) AND !empty($cat4_textfield)) {
		# code...
		
	
		
				$q1=mysqli_query($conn, "SELECT * FROM procedure_cat WHERE cat_name='$cat1'");
			    $result=mysqli_fetch_assoc($q1);
			    $procedure_id=$result['procedure_id'];
		  
				 $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2'");
				 $result=mysqli_fetch_assoc($q1);
				 $procedure_subcat_id=$result['procedure_subcat_id'];
				 
			     	# code...
			     	mysqli_query($conn, "INSERT INTO procedure_attribute VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
			     	$q3=mysqli_query($conn, "SELECT MAX(attri_id) FROM procedure_attribute");
				 	$result=mysqli_fetch_assoc($q3);
				 	$attri_id=$result['MAX(attri_id)'];
						if (isset($option101)) {
						# code...
							if ($option101=="A") {
								# code...
								if (!empty($single_procedure_price) AND !empty($single_addl_pontic_price)) {
									# code...

									$price1=$single_procedure_price;
								    $price2=$single_addl_pontic_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								}
								
								

							} 
							elseif ($option101=="B") {
								# code...
								if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
									# code...

									$price1=$single_tooth_simple_procedure_price;
								    $price2=$single_tooth_moderate_procedure_price;
								    $price3=$single_tooth_complicated_procedure_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								}
								
							}
							elseif ($option101=="C"){
								if (!empty($multiple_teeth_quadrant_price) AND !empty($multiple_teeth_maxilla_price) AND !empty($multiple_teeth_mandible_price) AND !empty($multiple_teeth_maxilla_mandible_price) AND !empty($multiple_teeth_anterior_maxilla_price) AND !empty($multiple_teeth_anterior_mandible_price) AND !empty($multiple_teeth_left_posterior_maxilla_price) AND !empty($multiple_teeth_right_posterior_mandible_price) AND !empty($multiple_teeth_left_posterior_mandible) AND !empty($multiple_teeth_maxilla_mandible_price)) {
									# code...

									$price1=$multiple_teeth_quadrant_price;
								    $price2=$multiple_teeth_maxilla_price;
								    $price3=$multiple_teeth_mandible_price;
								    $price4=$multiple_teeth_maxilla_mandible_price;
								    $price5=$multiple_teeth_anterior_maxilla_price;
								    $price6=$multiple_teeth_anterior_mandible_price;
								    $price7=$multiple_teeth_left_posterior_maxilla_price;
								    $price8=$single_tooth_simple_procedure_price;
								    $price9=$multiple_teeth_right_posterior_mandible_price;
								    $price10=$multiple_teeth_left_posterior_mandible;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    $price9=0;
								    $price10=0;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								}

							}
							elseif ($option101=="D"){
								if (!empty($other_areas_upper_lip_price) AND !empty($other_areas_lower_lip_price) AND !empty($other_areas_right_cheek_price) AND !empty($other_areas_left_cheek_price) AND !empty($other_areas_tongue_price) AND !empty($other_areas_floor_price) AND !empty($other_areas_hard_palate_price) AND !empty($other_areas_soft_palate_price)) {
									# code...

									$price1=$other_areas_upper_lip_price;
								    $price2=$other_areas_lower_lip_price;
								    $price3=$other_areas_right_cheek_price;
								    $price4=$other_areas_left_cheek_price;
								    $price5=$other_areas_tongue_price;
								    $price6=$other_areas_floor_price;
								    $price7=$other_areas_hard_palate_price;
								    $price8=$other_areas_soft_palate_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								}

								
							
							
					
			     }
			     
				 

			}
			
		   
		}
// END if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and other 2 input fields contains data


// if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and procredure attribute select option is also selected and other 1 input fields contains data
/*if (isset($cat1) AND isset($cat2) AND isset($cat3) AND !empty($cat4_textfield)) {
		# code...
		
	
		
				$q1=mysqli_query($conn, "SELECT * FROM procedure_cat WHERE cat_name='$cat1'");
			    $result=mysqli_fetch_assoc($q1);
			    $procedure_id=$result['procedure_id'];
		  
				 $q1=mysqli_query($conn, "SELECT * FROM procedure_subcat WHERE sub_name='$cat2'");
				 $result=mysqli_fetch_assoc($q1);
				 $procedure_subcat_id=$result['procedure_subcat_id'];
				 
			     	$q3=mysqli_query($conn, "SELECT * FROM procedure_attribute WHERE procedure_subcat_id='$procedure_subcat_id'");
				 	$result=mysqli_fetch_assoc($q3);
				 	$attri_id=$result['attri_id'];
						if (isset($option101)) {
						# code...
							if ($option101=="A") {
								# code...
								if (!empty($single_procedure_price) AND !empty($single_addl_pontic_price)) {
									# code...

									echo $price1=$single_procedure_price;
								    echo $price2=$single_addl_pontic_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_proce VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$attri_id')");
								}
								
								

							} 
							elseif ($option101=="B") {
								# code...
								if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
									# code...

									echo $price1=$single_tooth_simple_procedure_price;
								    echo $price2=$single_tooth_moderate_procedure_price;
								    echo $price3=$single_tooth_complicated_procedure_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_single VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$attri_id')");
								}
								
							}
							elseif ($option101=="C"){
								if (!empty($multiple_teeth_quadrant_price) AND !empty($multiple_teeth_maxilla_price) AND !empty($multiple_teeth_mandible_price) AND !empty($multiple_teeth_maxilla_mandible_price) AND !empty($multiple_teeth_anterior_maxilla_price) AND !empty($multiple_teeth_anterior_mandible_price) AND !empty($multiple_teeth_left_posterior_maxilla_price) AND !empty($multiple_teeth_right_posterior_mandible_price) AND !empty($multiple_teeth_left_posterior_mandible) AND !empty($multiple_teeth_maxilla_mandible_price)) {
									# code...

									echo $price1=$multiple_teeth_quadrant_price;
								    echo $price2=$multiple_teeth_maxilla_price;
								    echo $price3=$multiple_teeth_mandible_price;
								    echo $price4=$multiple_teeth_maxilla_mandible_price;
								    echo $price5=$multiple_teeth_anterior_maxilla_price;
								    echo $price6=$multiple_teeth_anterior_mandible_price;
								    echo $price7=$multiple_teeth_left_posterior_maxilla_price;
								    echo $price8=$single_tooth_simple_procedure_price;
								    echo $price9=$multiple_teeth_right_posterior_mandible_price;
								    echo $price10=$multiple_teeth_left_posterior_mandible;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    $price9=0;
								    $price10=0;
								    mysqli_query($conn, "INSERT INTO procedure_multiple VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$attri_id')");
								}

							}
							elseif ($option101=="D"){
								if (!empty($other_areas_upper_lip_price) AND !empty($other_areas_lower_lip_price) AND !empty($other_areas_right_cheek_price) AND !empty($other_areas_left_cheek_price) AND !empty($other_areas_tongue_price) AND !empty($other_areas_floor_price) AND !empty($other_areas_hard_palate_price) AND !empty($other_areas_soft_palate_price)) {
									# code...

									echo $price1=$other_areas_upper_lip_price;
								    echo $price2=$other_areas_lower_lip_price;
								    echo $price3=$other_areas_right_cheek_price;
								    echo $price4=$other_areas_left_cheek_price;
								    echo $price5=$other_areas_tongue_price;
								    echo $price6=$other_areas_floor_price;
								    echo $price7=$other_areas_hard_palate_price;
								    echo $price8=$other_areas_soft_palate_price;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								} else {
									# code...
									$price1=0;
								    $price2=0;
								    $price3=0;
								    $price4=0;
								    $price5=0;
								    $price6=0;
								    $price7=0;
								    $price8=0;
								    mysqli_query($conn, "INSERT INTO procedure_per_other VALUES ('', '$abbreviation', '$cat4_textfield', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$attri_id')");
								}

								
							
							
					
			     }
			     
				 

			}
			
		   
		}*/
// END if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and procredure attribute select option is also selected and other 1 input fields contains data
}

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
$PageSql = "SELECT * FROM `procedure_cat`";
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Procedures</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  
  <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
  <script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript">
            var jquery_1_8_3 = jQuery.noConflict();
            </script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery-ui-1.8.24.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery.ui.touch-punch.min.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery.autocomplete.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/big.min.js?v=5.0.2.1"></script>
            <script type="text/javascript">
            var base_url                = "https://dentalcharting.com";
            var member                  = new Array();
            member["id"]                = 99741;
            member["account_holder_id"] = 99741;
            member["initials"]          = "awais";
            var url_vars                = new Array();
            url_vars["id"]              = "";
            var chart_currency          = "&#36;";

            var config                  = [];
            config["icdas"]             = [];
            config["icdas"]["levels"]   = $.parseJSON('{"1":{"color":"FFFF00","title":"Early stage - Enamel first","description":"First visual change in enamel"},"2":{"color":"FFFF00","title":"Early stage - Enamel distinct","description":"Distinct visual change in enamel"},"3":{"color":"FFAA00","title":"Established - Enamel bdown","description":"Localized enamel breakdown"},"4":{"color":"FFAA00","title":"Established - Dentine shadow","description":"Underlying dentine shadow"},"5":{"color":"FF2222","title":"Severe - Dentine shadow","description":"Distinct cavity with visible dentine"},"6":{"color":"FF2222","title":"Severe - Dentine extensive","description":"Extensive cavity with visible dentine"}}');
            config["cast"]              = [];
            config["cast"]["levels"]    = $.parseJSON('{"3":{"title":"Enamel","description":"Distinct caries-related discoloration in enamel only","score":0.25},"4":{"title":"Dentine discoloration","description":"Internal caries-related discoloration in dentine","score":1},"5":{"title":"Dentine cavitation","description":"Restorable cavity in dentine","score":2},"6":{"title":"Pulp exposure","description":"Pulpally involved cavity","score":4},"7":{"title":"Abscess\/fistula","description":"Caries\/restoration-related swelling or fistula","score":5}}');
        </script>
        <script type="text/javascript">
            function updateClock()
            {
//                var currentTime = new Date(2018, 07, 26, 16, 09, 20);

                var currentTime = new Date();
                currentTime.setUTCMinutes(currentTime.getUTCMinutes());

                var currentYear = currentTime.getFullYear();
                var currentMonth = currentTime.getMonth() + 1;
                var currentDate = currentTime.getDate();
                var currentHours = currentTime.getHours();
                var currentMinutes = currentTime.getMinutes();
                var currentSeconds = currentTime.getSeconds();

                // Pad the minutes and seconds with leading zeros, if required
                currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
                currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

                /*
                // Choose either "AM" or "PM" as appropriate
                var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

                // Convert the hours component to 12-hour format if needed
                currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

                // Convert an hours component of "0" to "12"
                currentHours = ( currentHours == 0 ) ? 12 : currentHours;
                */

                // Compose the string for display
//                var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
                var currentTimeString = currentDate + "-" + currentMonth + "-" + currentYear + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;

                // Update the time display
                $('#clock').text(currentTimeString);
            }

            function dump(arr,level)
            {
                var dumped_text = "";
                if(!level) level = 0;

                //The padding given at the beginning of the line.
                var level_padding = "";
                for(var j=0;j<level+1;j++) level_padding += "    ";

                if(typeof(arr) == 'object') //Array/Hashes/Objects
                {
                    for(var item in arr)
                    {
                        var value = arr[item];

                        if(typeof(value) == 'object') //If it is an array,
                        {
                            dumped_text += level_padding + "'" + item + "' ...\n";
                            dumped_text += dump(value,level+1);
                        }

                        else
                        {
                            dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
                        }
                    }
                }

                else //Stings/Chars/Numbers etc.
                {
                    dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
                }

                return dumped_text;
            }
            
            function number_format(number, decimals, dec_point, thousands_sep)
            {
                number = (number+'').replace(/,/g, '').replace(/ /g, '');

                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',

                    toFixedFix = function (n, prec)
                    {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };

                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

                if (s[0].length > 3)
                {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }

                if ((s[1] || '').length < prec)
                {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }

                return s.join(dec);
            }
            
            function goToByScroll(id)
            {
                $('html,body').animate({scrollTop: $('#' + id).offset().top}, 'slow');
            }

            function goToObjectByScroll(object, offset)
            {
                if(!offset)
                    offset = 0;

                $('html,body').animate({scrollTop: (object.offset().top + offset)}, 'slow');
            }
            
            function covert_to_math_number(number, decimals)
            {
                if(!decimals)
                    var decimals = 4;

                return parseFloat(number_format(number, decimals, '.', ''));
            }

            function display_input_error(class_name, width)
            {
                return '<div class="' + class_name + '" style="position: absolute; z-index:9999; width: 150px; background-color: #FF7C7C; border: 1px solid #AF0000; padding: 2px 5px; margin-left: ' + width + 'px; margin-top: -23px">'
                            + '<b>Only numbers are allowed</b>'
                        + '</div>';
            }

            function highlight_animation(element, duration)
            {
                if(typeof duration === 'undefined')
                    duration = 2000;
            
                element.effect("highlight", {}, duration);

                                                     /*
                                                     .animate({ borderTopColor: "#FF0000"
                                                                ,borderRightColor: "#FF0000"
                                                                ,borderBottomColor: "#FF0000"
                                                                ,borderLeftColor: "#FF0000" }, {duration: (duration / 2)
                                                                                                ,queue: false
                                                                                                ,complete: function()
                                                                                                            {
                                                                                                                $(this).animate({ borderTopColor: "#CFCFCE"
                                                                                                                                 ,   */
            }
            
            function display_greta(message)
            {
                return '<div style="float: left; width: 100px;"><img src="' + base_url + '/images/dentalcharting-greta.png"></div>'
                        + '<div style="min-width: 200px; margin-left: 60px;">'
                            + '<p class="triangle-border left">'
                                + message
                            + '</p>'
                        + '</div>';
            }
            
            var datepicker_config = {
                                    dateFormat: "yy-mm-dd",
                                    buttonImage: "https://dentalcharting.com/images/icons/month_calendar.png",
                                    buttonImageOnly: true,
                                    buttonText: "Select a date",
                                    showOn: "both"
                                };
        </script>
        <script type="text/javascript" src="https://dentalcharting.com/js/functions.js?v=5.0.2.1"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('#quick_navigate_drop_down').bind("change", function()
            {
                if($(this).find('option:selected').val() != "")
                {
                    $("#quick_navigate_hidden").show();
                }

                else
                {
                    $("#quick_navigate_hidden").hide();
                }
            });

            setInterval('updateClock()', 1000);
            updateClock();


            $('.assistance-button').click(function()
            {
                $('#assistance-bar').slideDown('slow', function() {
                    // Animation complete.
                });
                
                $('html,body').animate({scrollTop: 0}, 'slow');
                
                $('#assistance-bar').find('iframe').each(function(index, value)
                {
                    console.log($(this).attr('data-src'));
                
                    if($(this).attr('data-src') != '') // only do it once per iframe
                        $(this).attr('src', $(this).attr('data-src')).attr('data-src', '');
                });
            });

            $('#assistance-bar-close-button').click(function(event)
            {
                event.preventDefault();

                $('#assistance-bar').slideUp('slow', function() {
                    // Animation complete.
                });
            });


            // Help balloon hover actions
            $('body').delegate('.help-balloon-hover', 'mouseover', function(event)
            {
                var px_from_right = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));

                if(px_from_right < $(this).find('.help-balloon-hover-text').width())
                    $(this).find('.help-balloon-hover-text').css('right', 0);

                $(this).find('.help-balloon-hover-text').show();
            });

            $('body').delegate('.help-balloon-hover', 'mouseout', function(event)
            {
                $(this).find('.help-balloon-hover-text').hide();
            });
            
            
            // No access hover actions
            $('body').delegate('.no-access-hover', 'mouseover', function(event)
            {
                var px_from_right = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
            
                if(px_from_right < $(this).find('.no-access-hover-text').width())
                    $(this).find('.no-access-hover-text').css('right', 0);
            
                $(this).find('.no-access-hover-text').show();
            });

            $('body').delegate('.no-access-hover', 'mouseout', function(event)
            {
                $(this).find('.no-access-hover-text').hide();
            });
            
            
            $('body').delegate('input[type="checkbox"]', 'click', function(e)
            {
                if(this.readOnly)
                    $(this).attr('checked', false);
            });
            
            
            $('.datepicker').datepicker(datepicker_config);
        });
        </script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.silverlight.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.flash.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.html4.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.html5.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/i18n/en.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/upload-single-document.js?v=5.0.2.1"></script>
      
  
  
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
            <h1> Procedures</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Procedures</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-12 ">
         <div class="add-maintain">
        	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add procedure
			  </button>
				<div class="collapse" id="collapseExample">
				  <div class="card">
				   <div class="Procedures-form">
				   <form method="post" action="">
							<table border="0" width="100%" class="add_edit_del_table_buttons">
							<tbody><tr>
								<td colspan="3"><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
							</tr>
							</tbody></table>
							<table border="0" width="100%" class="add_edit_del_table">
								<tbody><tr>
									<td class="table_subheader" colspan="3">Add procedure: 
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<div class="info_message" style="    padding: 10px;">In order to add a procedure you have to construct it in Step 1:<br>
			- First specify an existing specialty or create a new specialty which the new procedure should be under<br>
			- Then further specify in at least one of the 2nd, 3rd or 4th columns with existing items or create new items<br>
			- Then fill in the abbreviation and description<br>
			- Continue with the next Steps</div>
									</td>
								</tr>
								<tr>
									<td class="table_subheader" colspan="3">
										Step 1) Construct procedure
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<table border="0" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td class="table_content" width="235px"><b>Specify specialty<span class="mandatory_field">*</span></b></td>
												<td class="table_content" id="cat2_title" width="235px"><b>Further specify<span class="cat2_sub_name">...</span> <span class="mandatory_field">*</span></b></td>
												<td class="table_content" id="cat3_title" width="235px"><b>Further specify <span class="cat3_sub_name">...</span></b></td>
												<td class="table_content" id="cat4_title" width="235px"><b>Further specify <span class="cat4_sub_name">...</span></b></td>
											</tr>
											<tr>
												<td class="table_content">
													<select name="cat1" id="cat1" size="18" style="width:235px; height:250px">
														<?php
														require('conn.php');
														$sql=mysqli_query($conn, "SELECT * FROM procedure_cat");
														while ($row=mysqli_fetch_assoc($sql)) {
															# code...
															echo '<option>'.$row['cat_name'].'</option>';
														}

														?>
														
														
													</select>
												</td>
												<td class="table_content" valign="top">
													
														<select name="cat2" id="cat2" size="18" style="width:235px; height:250px;" >
														</select>
												</td>
												<td class="table_content" valign="top">
													
														<select name="cat3" id="cat3" disabled="" size="18" style="width:235px; height:250px;" >
														</select>
												</td>
												<td class="table_content" valign="top">
													
													<select name="cat4" id="cat4" size="18" style="width:235px; height:250px;" disabled="disabled">
													</select>
												</td>
											</tr>
											<tr>
												<td class="table_content" style="padding-top: 3px;"><span id="cat1_textfield_title" style="color: #000000">If Specialty not on the list, create it here:</span><input type="text" name="cat1_textfield" id="cat1_textfield" style="width: 230px;">
												</td>
												<td class="table_content" style="padding-top: 3px;"><span id="cat2_textfield_title" style="color: #666666">If desired sub of <span class="cat2_sub_name">...</span> not on the list, create it here:</span><input type="text" name="cat2_textfield" value="" id="cat2_textfield" style="width: 230px;" >
												</td>
												<td class="table_content" style="padding-top: 3px;"><span id="cat3_textfield_title" style="color: #666666">If desired sub of <span class="cat3_sub_name">...</span> not on the list, create it here:</span><input type="text" name="cat3_textfield" value="" id="cat3_textfield" style="width: 230px;" ></td>
												<td class="table_content" style="padding-top: 3px;"><span id="cat4_textfield_title" style="color: #666666">If desired sub of <span class="cat4_sub_name">...</span> not on the list, create it here:</span><input type="text" name="cat4_textfield" id="cat4_textfield" value="" style="width: 230px;"></td>
											</tr>
										</tbody></table>
									</td>
								</tr>

								<tr>
									<td class="table_content" colspan="3">&nbsp;</td>
								</tr>

								<tr>
									<td class="table_content" width="120px"><b>Procedure</b>:</td>
									<td class="table_content" id="total_string" colspan="2">
									</td>
								</tr>

								<tr>
									<td class="table_content"><b>Abbreviation</b>:</td>
									<td class="table_content" colspan="2">
										<input type="text" name="abbreviation" value="" style="width: 120px">
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;"><b>Description</b>:</td>
									<td class="table_content" style="vertical-align: top;" colspan="2">
										<textarea id="description" name="description" style="width: 300px; height: 75px;"></textarea>
									</td>
								</tr>

								
								
								
								<tr>
									<td class="table_subheader" colspan="3">
										Step 2) Specify procedure prices<span class="mandatory_field">*</span>
									</td>
								</tr>
								<tr>
									<td colspan="3"><div class="info_message" style="    padding: 10px;">Select an option A - D (one option only)</div><br>
									</td>
								</tr>

								<tr>
									<td class="table_content" colspan="3">
										<input type="radio" name="option101" id="a" value="A" class="maintenance_procedures_step3"><label for="a"><b>A.) Procedure has a SINGLE price</b></label>
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;" colspan="3">
										<table cellspacing="0" cellpadding="0">
											<tbody><tr>
												<td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>Per procedure</b> (only use the box/boxes applicable)</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
												<td class="maintenance_table_add_edit2" colspan="3" style="color: rgb(153, 153, 153);">Price per add'l Pontic (this 2nd box applies to Prosthodontics only)</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_procedure_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" id="one" style="color: rgb(153, 153, 153);">$<input type="text" name="single_addl_pontic_price" value="" style="width: 80px" ></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td class="table_content" colspan="3"><br></td>
								</tr>
								<tr>
									<td class="table_content" colspan="3">
										<input type="radio" name="option101" id="b" value="B" class="maintenance_procedures_step3"><label for="b"><b>B.) Procedure has a RANGE of prices WHILE it applies to a SINGLE TOOTH</b></label>
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;" colspan="3">
										<table cellspacing="0" cellpadding="0">
											<tbody><tr>
												<td colspan="4" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>Per single tooth</b> (only use the box/boxes applicable)</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Simple procedure</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Moderate procedure</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Complicated procedure</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_tooth_simple_procedure_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_tooth_moderate_procedure_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_tooth_complicated_procedure_price" value="" style="width: 80px" ></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td class="table_content" colspan="3"><br></td>
								</tr>
								<tr>
									<td class="table_content" colspan="3">
										<input type="radio" name="option101" id="c" value="C" class="maintenance_procedures_step3"><label for="c"><b>C.) Procedure has a RANGE of prices WHILE it applies to MULTIPLE TEETH</b></label>
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;" colspan="3">
										<table cellspacing="0" cellpadding="0">
											<tbody><tr>
												<td colspan="10" class="maintenance_table_add_edit" style=""><b>For multiple teeth</b> (only use the box/boxes applicable)</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit2" style="">Quadrant</td>
												<td class="maintenance_table_add_edit2" style="">Maxilla</td>
												<td class="maintenance_table_add_edit2" style="">Mandible</td>
												<td class="maintenance_table_add_edit2" style="">Maxilla and Mandible</td>
												<td class="maintenance_table_add_edit2" style="">Anterior Maxilla</td>
												<td class="maintenance_table_add_edit2" style="">Anterior Mandible</td>
												<td class="maintenance_table_add_edit2" style="">Right Posterior Maxilla</td>
												<td class="maintenance_table_add_edit2" style="">Left Posterior Maxilla</td>
												<td class="maintenance_table_add_edit2" style="">Right Posterior Mandible</td>
												<td class="maintenance_table_add_edit2" style="">Left Posterior Mandible</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_quadrant_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_maxilla_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_mandible_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_maxilla_mandible_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_anterior_maxilla_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_anterior_mandible_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_right_posterior_maxilla_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_left_posterior_maxilla_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_right_posterior_mandible_price" value="" style="width: 70px"></td>
												<td class="maintenance_table_add_edit3" style="">$<input type="text" name="multiple_teeth_left_posterior_mandible" value="" style="width: 70px"></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td class="table_content" colspan="3"><br></td>
								</tr>
								<tr>
									<td class="table_content" colspan="3">
										<input type="radio" name="option101" id="d" value="D" class="maintenance_procedures_step3"><label for="d"><b>D.) Procedure have a RANGE of prices WHILE it applies to OTHER AREAS</b></label>
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;" colspan="3">
										<table cellspacing="0" cellpadding="0">
											<tbody><tr>
												<td colspan="8" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>For other areas</b> (only use the box/boxes applicable)</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Upper lip</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Lower lip</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Right Cheek</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Left cheek</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Tongue</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Floor</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Hard Palate</td>
												<td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Soft Palate</td>
											</tr>
											<tr>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_upper_lip_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_lower_lip_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_right_cheek_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_left_cheek_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_tongue_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_floor_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_hard_palate_price" value="" style="width: 80px" ></td>
												<td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="other_areas_soft_palate_price" value="" style="width: 80px" ></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td class="maintenance_procedures_step4 table_content" colspan="3" style="display: table-cell;"><br></td>
								</tr>
								
								
							</tbody></table>
							<table border="0" width="100%" class="add_edit_del_table_buttons">
							<tbody><tr>
								<td><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
							</tr>
							</tbody></table>
						</form>
				   </div>
				  </div>
				</div>
          </div>
          </div>
        <div class="col-md-12 ">
        <div class="card card-num">
            
            <!-- /.card-header -->
            <table id="example" class="display responsive nowrap" style="width:100%">
       <?php

 require("conn.php");
             $q=mysqli_query($conn,"SELECT * FROM procedure_cat order by cat_name LIMIT $start, $perpage");
             
             while ($row=mysqli_fetch_assoc($q)) {echo' <thead class="data-table" ><tr>
                 <th>Name</th>
                 <th> '.$row['cat_name'].' </th>
                  <th>  Pricing Defined</th>
                 
                  <th>  Pricing In Rs</th>

                  <th></th>
                  <th></th>
<th>Action</th>
                </tr> </thead>';
            $id=$row['procedure_id'];
                 $q1=mysqli_query($conn,"SELECT * FROM procedure_subcat WHERE procedure_id='$id'");
             while ($row1=mysqli_fetch_assoc($q1)) {
                $id1=$row1['procedure_subcat_id'];
                echo '<tr>
                  <th> '.$row1['sub_name'].'</th>
                
                </tr>';
                 $q2=mysqli_query($conn,"SELECT * FROM procedure_attribute WHERE procedure_subcat_id='$id1'");
             while ($row2=mysqli_fetch_assoc($q2)) {
                $id2=$row2['attri_id'];
                if(!empty($row2['attribute_name'])){
                    echo '<tr>
                  <th> '.$row2['attribute_name'].'</th>
                
                </tr>';
                }
                
                 $q3=mysqli_query($conn,"SELECT * FROM procedure_per_proce WHERE attri_id='$id2'");
                 $e=mysqli_num_rows($q3);
                if ($e) {
                    # code...

                while ( $row3=mysqli_fetch_assoc($q3)) {
                    # code...

                    echo'
             <tr>
             <td>'.$row3['per_procedure_name'].'</td><th>PPr</th><td>'.$row3['ppr'].'</td><th>Pr/aP</th><td>'.$row3['prap'].'</td><td></td><td><a href="delprocedure.php?id='.$row3['attri_id'].'"><img src="del.gif"></a></td></tr>';
                }


                } 

 $q6=mysqli_query($conn,"SELECT * FROM procedure_per_single WHERE attri_id='$id2'");
                 $e=mysqli_num_rows($q6);
                if ($e) {
                    # code...

                while ( $row6=mysqli_fetch_assoc($q6)) {
                    # code...

                    echo'
             <tr>
             <td>'.$row6['per_name'].'</td><th>SP</th><td>'.$row6['sp'].'</td><th>MP</th><td>'.$row6['mp'].'</td><th>CP</th><td>'.$row6['cp'].'</td><td></td><td><a href="delprocedure.php?id='.$row6['attri_id'].'"><img src="del.gif"></a></td></tr>';
                }


                } 



                    # code...
                    
                    
                $q4=mysqli_query($conn,"SELECT * FROM procedure_per_other WHERE attri_id='$id2'");
                 $ee=mysqli_num_rows($q4);
                 
                    if($ee){while ( $row4=mysqli_fetch_assoc($q4)) {
                    # code...
                        
                    echo'
             <tr>
             <td>'.$row4['other_name'].'</td><td></td><th>UL</th><td>'.$row4['ul'].'</td><th>LL</th><td>'.$row4['ll'].'</td></tr><tr><td></td><td></td><th>RC</th><td>'.$row4['rc'].'</td><th>LC</th><td>'.$row4['lc'].'</td></tr><tr><td></td><td></td><th>T</th><td>'.$row4['t'].'</td><th>F</th><td>'.$row4['f'].'</td></tr><tr><td></td><td></td><th>HP</th><td>'.$row4['hp'].'</td><th>SP</th><td>'.$row4['sp'].'</td><td><a href="edit_pres.php"<a href="delprocedure.php?id='.$row4['attri_id'].'"><img src="del.gif"></a></td></tr>';
                }}
                 $q5=mysqli_query($conn,"SELECT * FROM procedure_multiple WHERE attri_id='$id2'");
                 $eee=mysqli_num_rows($q5);
                 
                    if($eee){while ( $row5=mysqli_fetch_assoc($q5)) {
                    # code...
                        
                    echo'
             <tr>
             <td>'.$row5['multiple_name'].'</td><td></td><th>Q</th><td>'.$row5['q'].'</td><th>Mx</th><td>'.$row5['mx'].'</td></tr><tr><td></td><td></td><th>Mn</th><td>'.$row5['mn'].'</td><th>Mx+Mn</th><td>'.$row5['mxmn'].'</td></tr><tr><td></td><td></td><th>AMx</th><td>'.$row5['amx'].'</td><th>Amn</th><td>'.$row5['amn'].'</td></tr><tr><td></td><td></td><th>RPMx</th><td>'.$row5['rpmx'].'</td><th>LPMx</th><td>'.$row5['lpmx'].'</td>
             </tr><tr><td></td><td></td><th>RPMn</th><td>'.$row5['rpmn'].'</td><th>LPMn</th><td>'.$row5['lpmn'].'</td><td><a href="edit_pres.php"><a href="delprocedure.php?id='.$row4['attri_id'].'"><img src="del.gif"></a></td></tr>';
                }}
                

           
               }
           } 
                    }

                ?>
    </table>
            <!-- /.card-body -->
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="dist/js/procedure.js"></script>
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
