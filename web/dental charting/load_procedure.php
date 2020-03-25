<?php  
 require("conn.php");
 $connect = mysqli_connect("localhost", "root", "", "dental_charting");  
 $output = ''; 
 //Fetch Data From Procedure's Subcategory Table and display data in the cat2 select tag
  if(isset($_POST["procedure_id"]))  
 {    			 
                  $sql = "SELECT * FROM procedure_subcat JOIN procedure_cat ON procedure_subcat.procedure_id=procedure_cat.procedure_id WHERE cat_name='".$_POST["procedure_id"]."'";  
       
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
   
                  $sql = "SELECT * FROM procedure_attribute JOIN procedure_subcat ON procedure_attribute.procedure_subcat_id=procedure_subcat.procedure_subcat_id WHERE sub_name='".$_POST["procedure_subid"]."'";  
       
      $result1 = mysqli_query($connect, $sql);  
      while($row1 = mysqli_fetch_array($result1))  
      {  
       
          # code...
          $output .= '<option>'.$row1['attribute_name'].'</option>';  
        
           
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
   		//This is used to fetch data from procedure per proce
	   	 $sql = "SELECT * FROM procedure_per_proce JOIN procedure_attribute ON procedure_per_proce.attri_id=procedure_attribute.attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
	       
	      $result2 = mysqli_query($connect, $sql);  
	      while($row2 = mysqli_fetch_array($result2))  
	      {  
	       
	          # code...
	          $output .= '<option>'.$row2['per_procedure_name'].'</option>';  
	        
	           
	      }  
        //END This is used to fetch data from procedure per proce


	    //This is used to fetch data from procedure per proce
	   	 $sql3 = "SELECT * FROM procedure_per_other JOIN procedure_attribute ON procedure_per_other.attri_id=procedure_attribute.attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
	       
	      $result3 = mysqli_query($connect, $sql3);  
	      while($row3 = mysqli_fetch_array($result3))  
	      {  
	       
	          # code...
	          $output .= '<option>'.$row3['other_name'].'</option>';  
	        
	           
	      }  
        //END This is used to fetch data from procedure per proce

	      
	    //This is used to fetch data from procedure per single
	   	 $sql4 = "SELECT * FROM procedure_per_single JOIN procedure_attribute ON procedure_per_single.attri_id=procedure_attribute.attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
	       
	      $result4 = mysqli_query($connect, $sql4);  
	      while($row4 = mysqli_fetch_array($result4))  
	      {  
	       
	          # code...
	          $output .= '<option>'.$row4['per_name'].'</option>';  
	        
	           
	      }  
        //END This is used to fetch data from procedure per singele

	      
	    //This is used to fetch data from procedure per multiple
	   	 $sql5 = "SELECT * FROM procedure_multiple JOIN procedure_attribute ON procedure_multiple.attri_id=procedure_attribute.attri_id WHERE attribute_name='".$_POST["procedure_subattri"]."'";  
	       
	      $result5 = mysqli_query($connect, $sql5);  
	      while($row5 = mysqli_fetch_array($result5))  
	      {  
	       
	          # code...
	          $output .= '<option>'.$row5['multiple_name'].'</option>';  
	        
	           
	      }  
        //END This is used to fetch data from procedure per multiple 
   	}
   	
                
      echo $output;  
 } 
//END Fetch Data From Procedure's subattributes Table and display data in the cat3 select tag 
?>