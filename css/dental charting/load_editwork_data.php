<?php require("conn.php");
$connect = mysqli_connect("localhost", "pakdenti_admin", "+h8(C%EYZq8O", "pakdenti_dental"); 
$output = ''; 
 //Fetch Data From Clanic Doctor Table and disyplay Dentists Belongint to that clinic
   if(isset($_POST["clinic_id"]))  
 {    
      if($_POST["clinic_id"] != '')  
      {             $sql = "SELECT * FROM clanic_doctor WHERE id = '".$_POST["clinic_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM clanic";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
        $id2=$row['user_id'];
       $q2=mysqli_query($conn, "SELECT * FROM user WHERE user_id='$id2'");
       while ($row2=mysqli_fetch_assoc($q2)) {
       	# code...
       	 $output .= '<option value="'.$row2['u_name'].'">'.$row2['u_name'].'</option>'; 
       }
          # code...
          
       
           
      }  
      echo $output;  
 } 
 //END Fetch Data From Clanic Doctor Table and disyplay Dentists Belongint to that clinic

//Fetch Status From status Table and disyplay status on different categoriesc
   if(isset($_POST["status_id"]))  
 {    
                 $sql = "SELECT * FROM status WHERE category = '".$_POST["status_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['category'].'|'.$row['status'].'">'.$row['status'].'</option>'; 
      
          
       
           
      }  
      echo $output;  
 } 
 //END Fetch Status From status Table and disyplay status on different categoriesc


//Fetch Status From status Table and disyplay prescription on different categoriesc
   if(isset($_POST["presc_id"]))  
 {    
                 $sql = "SELECT * FROM `pre_subcat` inner join pre_cat on pre_subcat.cat_id=pre_cat.cat_id inner join pre_desc on pre_desc.sub_id=pre_subcat.sub_id WHERE pre_cat.cat_id = '".$_POST["presc_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['pre_name'].' | '.$row['sub_name'].'|'.$row['quantity'].' | '.$row['instruction'].'">'.$row['pre_name'].' | '.$row['sub_name'].' | '.$row['quantity'].' | '.$row['instruction'].'</option>'; 
      
          
       
           
      }  
      echo $output;  
 } 
 //END Fetch Status From prescription Table and disyplay prescriptions on different categoriesc



//Fetch Status From materials Table and disyplay materilas by chossing different categoriesc
   if(isset($_POST["material_id"]))  
 {    
                 $sql = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_per_price on material_per_price.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_cat.cat_id = '".$_POST["material_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['sub_attri_id'].'">'.$row['material_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['per_price_name'].'</option>'; 
      
          
       
           
      }  
       $sql = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_amount on material_by_amount.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_cat.cat_id = '".$_POST["material_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['sub_attri_id'].'">'.$row['material_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['by_amount_name'].'</option>'; 
      
          
       
           
      } 
       $sql = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_length on material_by_length.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_cat.cat_id = '".$_POST["material_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<<option value="'.$row['sub_attri_id'].'">'.$row['material_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['by_length_name'].'</option>'; 
      
          
       
           
      } 
      echo $output;  
 } 
 //END Fetch Status From materials Table and disyplay materilas by chossing different categoriesc



//Fetch procedures From preocedures Table and disyplay procedures by chossing different categoriesc
   if(isset($_POST["procdure_id"]))  
 {    
                  $sql = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_proce on procedure_per_proce.attri_id=procedure_attribute.attri_id WHERE procedure_cat.procedure_id = '".$_POST["procdure_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['attri_id'].'">'.$row['cat_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['per_procedure_name'].'</option>'; 
      
          
       
           
      }  

       $sql = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_multiple on procedure_multiple.attri_id=procedure_attribute.attri_id WHERE procedure_cat.procedure_id = '".$_POST["procdure_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['attri_id'].'">'.$row['cat_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['multiple_name'].'</option>'; 
      
          
       
           
      }  
      $sql = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_other on procedure_per_other.attri_id=procedure_attribute.attri_id WHERE procedure_cat.procedure_id = '".$_POST["procdure_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['attri_id'].'">'.$row['cat_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['other_name'].'</option>'; 
      
          
       
           
      }  
       $sql = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_single on procedure_per_single.attri_id=procedure_attribute.attri_id WHERE procedure_cat.procedure_id = '".$_POST["procdure_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<option value="'.$row['attri_id'].'">'.$row['cat_name'].' | '.$row['sub_name'].' | '.$row['attribute_name'].' | '.$row['abbrev'].'|'.$row['per_name'].'</option>'; 
      
          
       
           
      }  
      echo $output;  
 } 
 //END Fetch procedures From preocedures Table and disyplay procedures by chossing different categoriesc




 //Fetch prices of procedure From procedures tables disyplay and calculate bill on different categoriesc
   if(isset($_POST["procdureattri_id"]))  
 {    
                 $sql = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_single on procedure_per_single.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$_POST["procdureattri_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      $num=mysqli_num_rows($result);
      if ($num) {
      	# code...
      	while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<table><tr><td><b>Price</b></td></tr><tr><td>Simple: </td><td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity1" style="width:30%;"></td><td><input style="width:100%;" type="text" name="Price1" value="'.$row['sp'].'"></td></tr><tr></tr><tr><td>Moderate: </td><td><input style="width:100%;" type="text" name="Quantity2" placeholder="Quantity" style="width:30%;"></td><td><input style="width:100%;" type="text" name="Price2" value="'.$row['mp'].'"></td></tr><tr><td>Complicated: </td><td><input style="width:100%;" type="text" name="Quantity3" placeholder="Quantity" style="width:30%;"></td><td><input style="width:100%;" type="text" name="Price3" value="'.$row['cp'].'"></td></tr></table>'; 
      
          
       
           
      } 
      } else {
      	# code...
      	$sql1 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_multiple on procedure_multiple.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$_POST["procdureattri_id"]."'";  
      
     
      $result1 = mysqli_query($connect, $sql1);  
      $num1=mysqli_num_rows($result1);
      if ($num1) {
      	# code...
      	while($row1 = mysqli_fetch_array($result1))  
      {  
       
       
       
       	# code...
       	 $output .= '<table>
		<tr>
			<td><b>Price</b></td></td>
		</tr>
		<tr>
			<td>Quadrant: </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity1" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price1" value="'.$row1['q'].'"></td>
		</tr>
		<tr>
			<td>Maxilla: </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity2" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price2" value="'.$row1['mx'].'"></td>
		</tr>
		<tr>
			<td>Mandible </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity3" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price3" value="'.$row1['mn'].'"></td>
		</tr><tr>
			<td>Maxilla and Mandible </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity4" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price4" value="'.$row1['mxmn'].'"></td>
		</tr><tr>
			<td>Anterior Maxilla </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity5" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price5" value="'.$row1['amx'].'"></td>
		</tr><tr>
			<td>Anterior Mandible </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity6" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price6" value="'.$row1['amn'].'"></td>
		</tr><tr>
			<td>Right Posterior Maxilla </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity7" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price7" value="'.$row1['rpmx'].'"></td>
		</tr>
		<tr>
			<td>Left Posterior Maxilla </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity8" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price8" value="'.$row1['lpmx'].'"></td>
		</tr>
		<tr>
			<td>Right Posterior Mandible </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity9" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price9" value="'.$row1['rpmn'].'"></td>
		</tr>
		<tr>
			<td>Left Posterior Mandible </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity10" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price10" value="'.$row1['lpmn'].'"></td>
		</tr>
	</table>'; 
      
          
       
           
      } 
      } else {
      	# code...
      	$sql2 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_proce on procedure_per_proce.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$_POST["procdureattri_id"]."'";  
      
     
      $result2 = mysqli_query($connect, $sql2);  
      $num2=mysqli_num_rows($result2);
      if ($num2) {
      	# code...
      	  	while($row2 = mysqli_fetch_array($result2))  
      {  
       
       
       
       	# code...
       	 $output .= '<table>
		<tr>
			<td><b>Price</b></td></td>
		</tr>
		<tr>
			<td>Procedure price: </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity1" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price1" value="'.$row2['ppr'].'"></td>
		</tr>
		<tr>
			<td>Price per addl Pontic (this 2nd box applies to Prosthodontics only) </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity2" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price2" value="'.$row2['prap'].'"></td>
		</tr>
		
	</table>'; 
      
         
       
           
      } 

      } else {
      	# code...
      	$sql3 = "SELECT * FROM `procedure_subcat` INNER JOIN procedure_cat on procedure_subcat.procedure_id=procedure_cat.procedure_id inner join procedure_attribute on procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id INNER JOIN procedure_per_other on procedure_per_other.attri_id=procedure_attribute.attri_id WHERE procedure_attribute.attri_id = '".$_POST["procdureattri_id"]."'";  
      
     
      $result3 = mysqli_query($connect, $sql3);  
       	while($row3 = mysqli_fetch_array($result3))  
      {  
       
       
       
       	# code...
       	 $output .= '<table>
		<tr>
			<td><b>Price</b></td></td>
		</tr>
		<tr>
			<td>Upper lip </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity1" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price1" value="'.$row3['ul'].'"></td>
		</tr>
		<tr>
			<td>Lower lip </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity2" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price2" value="'.$row3['ll'].'"></td>
		</tr>
		<tr>
			<td>Right Cheek </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity3" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price3" value="'.$row3['rc'].'"></td>
		</tr><tr>
			<td>Left cheek </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity4" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price4" value="'.$row3['lc'].'"></td>
		</tr><tr>
			<td>Tongue </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity5" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price5" value="'.$row3['t'].'"></td>
		</tr><tr>
			<td>Floor </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity6" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price6" value="'.$row3['f'].'"></td>
		</tr><tr>
			<td>Hard Palate </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity7" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price7" value="'.$row3['hp'].'"></td>
		</tr>
		<tr>
			<td>Soft Palate </td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="Quantity8" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="Price8" value="'.$row3['sp'].'"></td>
		</tr>
		
	</table>'; 
      
          
       
           
      } 
      }
      
      }
      

      }
      
       
      echo $output;  
 } 
 //END Fetch prices of procedure From procedures tables disyplay and calculate bill on different categoriesc




 //Fetch prices of materials From materials tables disyplay and calculate bill on different categoriesc
   if(isset($_POST["mateee_id"]))  
 {    
                $sql = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_per_price on material_per_price.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$_POST["mateee_id"]."'";  
      
     
      $result = mysqli_query($connect, $sql);  
      $num=mysqli_num_rows($result);
      if ($num) {
      	# code...
      	# code...
      	while($row = mysqli_fetch_array($result))  
      {  
       
       
       
       	# code...
       	 $output .= '<table><tr><td><b>Price</b></td></tr><tr><td>'.$row['per_price'].'</td><td><input style="width:100%;" type="text" placeholder="Quantity" name="MQuantity1" style="width:30%;"></td><td><input style="width:100%;" type="text" name="MPrice1"  value="'.$row['price'].'"></td></tr></table>'; 
      
          
       
           
      } 
      } else {
      	# code...
      	$sql1 = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_length on material_by_length.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$_POST["mateee_id"]."'";  
      
     
      $result1 = mysqli_query($connect, $sql1);  
      $num1=mysqli_num_rows($result1);
      if ($num1) {
      	# code...
      	while($row1 = mysqli_fetch_array($result1)){
      	 $output .= '<table>
      	
		<tr>
			<td><b>Price</b></td></td>
		</tr>
		<tr>
			<td>'.$row1['by_length'].'</td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="MQuantity1" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="MPrice1"  value="'.$row1['price'].'"></td>
		</tr>
		</table';
	}
      } else {
      	# code...
      	$sql2 = "SELECT * FROM `material_subcat` INNER JOIN material_cat on material_subcat.cat_id=material_cat.cat_id inner join material_sub_attri on material_sub_attri.sub_id=material_subcat.sub_id inner JOIN material_by_amount on material_by_amount.sub_attri_id=material_sub_attri.sub_attri_id WHERE material_sub_attri.sub_attri_id = '".$_POST["mateee_id"]."'";  
      
     
      $result2 = mysqli_query($connect, $sql2);  
      
      	while($row2 = mysqli_fetch_array($result2)){
      	 $output .= '<table>
      	
		<tr>
			<td><b>Price</b></td></td>
		</tr>
		<tr>
			<td>Small</td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="MQuantity1" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="MPrice1"  value="'.$row2['small'].'"></td>
		</tr>
		<tr>
			<td>Medium</td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="MQuantity2" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="MPrice2"  value="'.$row2['medium'].'"></td>
		</tr>
		<tr>
			<td>Large</td>
			<td><input style="width:100%;" type="text" placeholder="Quantity" name="MQuantity3" style="width:30%;"></td>
			<td><input style="width:100%;" type="text" name="MPrice3"  value="'.$row2['large'].'"></td>
		</tr>
		</table';
	}
      }
      
      }
      
echo $output;  
}
 //END Fetch prices of materials From materials tables disyplay and calculate bill on different categoriesc

 
