<?php
extract($_POST);
include("conn.php");
session_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
if (isset($opslaan)) {
	# code...
	$materials;$procedures;$materialsBalance;$proceduresBalance;
	echo $Status; echo "Status<br>";
	echo $substatus;echo "Sub Status<br>";
	echo $clinic;echo "Clinic <br>";
	echo $dentist;echo "Dentist<br>";
	echo $Location;echo "Location<br>";
	echo $cheifcom;echo "Cheif<br>";
	echo $signandsym;echo "Sign&Sym<br>";
	echo $Diagnosis;echo "Diag<br>";
	echo $Procedure;echo "Proce<br>";
	echo $Material;echo "Material<br>";
	echo $Prescription;echo "Prescription<br>";

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
      	echo $materials; echo "materials<br>";
      echo $materialsBalance; echo "materials Balance<br>";
      echo $procedures; echo "Procedure <br>";
      
       echo $proceduresBalance; echo "Procedure Balance<br>";
       echo $total=$materialsBalance+$proceduresBalance;
      
      } else {
      	# code...
      	echo("<script>alert('Record Is Not Inserted.');</script>");
      }
      
//END This is used to check the all values that is going to be inserted 
      
}


?>
