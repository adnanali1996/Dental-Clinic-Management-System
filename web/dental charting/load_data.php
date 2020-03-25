 <?php  
 //load_data.php  
 require("conn.php");
 $connect = mysqli_connect("localhost", "root", "", "dental_charting");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {    
                  $sql = "SELECT * FROM pre_cat WHERE pre_name = '".$_POST["brand_id"]."'";  
       
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        $id=$row['cat_id'];
        $sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE cat_id='$id'");
        while ($row1=mysqli_fetch_assoc($sql1)) {
          # code...
          $output .= '<option>'.$row1['sub_name'].'</option>';  
        }
           
      }  
      echo $output;  
 }  


  if(isset($_POST["sub_id"]))  
 {    
     
              $sql = "SELECT * FROM pre_subcat WHERE sub_name = '".$_POST["sub_id"]."'";  
      
      
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        $id=$row['sub_id'];
        $sql1=mysqli_query($conn, "SELECT * FROM pre_desc WHERE sub_id='$id'");
        while ($row1=mysqli_fetch_assoc($sql1)) {
          # code...
          $output .= '<option>'.$row1['quantity'].'</option>';  
        }
           
      }  
      echo $output;  
 } 

  if(isset($_POST["clanic_id"]))  
 {    
      if($_POST["clanic_id"] != '')  
      {             $sql = "SELECT * FROM clanic_doctor WHERE id = '".$_POST["clanic_id"]."'";  
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
       	 $output .= '<option value="'.$row2['user_id'].'">'.$row2['u_name'].'</option>'; 
       }
          # code...
          
       
           
      }  
      echo $output;  
 } 
 ?>  