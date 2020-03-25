<?php  
 require("conn.php");
 $connect = mysqli_connect("localhost", "root", "", "dental_charting");  
 $output = ''; 
 //Fetch Data From Procedure's Subcategory Table and display data in the cat2 select tag
  if(isset($_POST["procedure_id"]))  
 {    			     echo $_POST["procedure_id"];
                  $sql = "SELECT * FROM material_subcat JOIN material_cat ON material_cat.cat_id=material_subcat.cat_id WHERE material_name='".$_POST["procedure_id"]."'";  
       
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
       
          # code...
          $output .= '<option>'.$row['sub_name'].'</option>';  
        
           
      }  
      echo $output;  
 }  
//END Fetch Data From Procedure's Subcategory Table and display data in the cat2 select tag

//Fetch Data From Procedure's subattributes Table and display data in the cat3 select tag
   
   if(isset($_POST["procedure_subid"]))  
 {    			 
              
                  $sql = "SELECT * FROM material_sub_attri JOIN material_subcat ON material_sub_attri.sub_id=material_subcat.sub_id WHERE sub_name='".$_POST["procedure_subid"]."'";  
       
      $result1 = mysqli_query($connect, $sql);  
      while($row1 = mysqli_fetch_array($result1))  
      {  
       
          # code...
        if ($row1["attribute_name"]=="") {
          # code...
        } else {
          # code...
          global $output;
           $output .= '<option>'.$row1['attribute_name'].'</option>'; 
        }
        
          
        
           
      }  
      echo $output;  

}
//END Fetch Data From Procedure's subattributes Table and display data in the cat3 select tag 

//Fetch Data From Procedure's subattributes Table and display data in the cat3 select tag
   
   if(isset($_POST["procedure_subattri"]))  
 {    			 
   	if ($_POST["procedure_subattri"]=="") {
   		# code...
   	} else {
   		# code...
      echo $_POST["procedure_subattri"];
       //This is Used to fetch the data from the material by amount
   		$sql = "SELECT * FROM material_by_amount JOIN material_sub_attri ON material_by_amount.sub_attri_id=material_sub_attri.sub_attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
       
      $result2 = mysqli_query($connect, $sql);
       while($row2 = mysqli_fetch_array($result2))  
      {  
       
          # code...
          $output .= '<option>'.$row2['by_amount_name'].'</option>';  
        
           
      }  
      //END This is Used to fetch the data from the material by amount

      //This is Used to fetch the data from the material by lenth
      $sql3 = "SELECT * FROM material_by_length JOIN material_sub_attri ON material_by_length.sub_attri_id=material_sub_attri.sub_attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
       
          $result3 = mysqli_query($connect, $sql3);
          while($row3 = mysqli_fetch_array($result3))  
      {  
       
          # code...
          $output .= '<option>'.$row3['by_length_name'].'</option>';  
        
           
      }  
      //END This is Used to fetch the data from the material by lenth

      //This is Used to fetch the data from the material per price
      $sql4 = "SELECT * FROM material_per_price JOIN material_sub_attri ON material_per_price.sub_attri_id=material_sub_attri.sub_attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
       
          $result4 = mysqli_query($connect, $sql4);
          while($row4 = mysqli_fetch_array($result4))  
      {  
       
          # code...
          $output .= '<option>'.$row4['per_price_name'].'</option>';  
        
           
      }  
      //END This is Used to fetch the data from the material per price  

         
          


  
      
          # code... here the other tables are 
        
       
      
          
     
   	}
   	
                
      echo $output;  
 } 
//END Fetch Data From Procedure's subattributes Table and display data in the cat3 select tag 
?>