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
session_start();
ob_start();
if (isset($opslaan)) {

  //if 4 input fields are empty
  if (!empty($cat1_textfield) AND !isset($cat1) AND !isset($cat2) AND !isset($cat3) AND !empty($cat2_textfield) AND !empty($cat4_textfield)) {
    # code...
    
    $q=mysqli_query($conn, "SELECT * FROM material_cat WHERE material_name='$cat1_textfield'");
    $num=mysqli_num_rows($q);
    if ($num) {
      # code...
      echo '<script type="text/javascript">alert("Material Name Exist.");</script>';
    }
    else
    {
      mysqli_query($conn, "INSERT INTO material_cat VALUES ('', '$cat1_textfield')");
      $q1=mysqli_query($conn, "SELECT * FROM material_cat WHERE material_name='$cat1_textfield'");
        $result=mysqli_fetch_assoc($q1);
        $material_id=$result['cat_id'];
        $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2_textfield'");
      $num1=mysqli_num_rows($q1);
      if ($num1) {
        # code...
        echo '<script type="text/javascript">alert("Material Subcategory Exist.");</script>';
      } 
      else {
        # code...
         mysqli_query($conn, "INSERT INTO material_subcat VALUES ('', '$cat2_textfield', '$material_id')");
         $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2_textfield'");
         $result=mysqli_fetch_assoc($q1);
         $procedure_subcat_id=$result['sub_id'];
         
            # code...
            mysqli_query($conn, "INSERT INTO material_sub_attri VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
            $q3=mysqli_query($conn, "SELECT MAX(sub_attri_id) FROM material_sub_attri");
          $result=mysqli_fetch_assoc($q3);
          $attri_id=$result['MAX(sub_attri_id)'];
            if (isset($option101)) {
            # code...
              echo"a";
              if ($option101=="A") {
                # code...
                echo"b";
                if (!empty($single_procedure_price)) {
                  # code...

                  $price1=$single_procedure_price;
                   
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                }
                
                

              } 
              elseif ($option101=="B") {
                # code...
                if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
                  # code...

                  $price1=$single_tooth_simple_procedure_price;
                    $price2=$single_tooth_moderate_procedure_price;
                    $price3=$single_tooth_complicated_procedure_price;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    $price2=0;
                    $price3=0;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                }
                
              }
              elseif ($option101=="C"){
                if (!empty($single_unit_price)) {
                  # code...

                  echo $price1=$single_unit_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                }

              }
               elseif ($option101=="D"){
                if (!empty($single_by_weight)) {
                  # code...

                  echo $price1=$single_by_weight;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="E"){
                if (!empty($single_volume_price)) {
                  # code...

                  echo $price1=$single_volume_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="F"){
                if (!empty($single_volume_piece_price)) {
                  # code...

                  echo $price1=$single_volume_piece_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                }

              }
              
           }
           
         

      }
      
       
    }
    


  }
//END if 4 input fields are empty


// if one Select Option of Material Cat is selected and other 3 input fields contains data
if (isset($cat1) AND !isset($cat2) AND !empty($cat2_textfield) AND !empty($cat4_textfield)) {
    
    
    
      
      $q1=mysqli_query($conn, "SELECT * FROM material_cat WHERE material_name='$cat1'");
        $result=mysqli_fetch_assoc($q1);
        $material_id=$result['cat_id'];
        $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2_textfield'");
      $num1=mysqli_num_rows($q1);
      if ($num1) {
        # code...
        echo '<script type="text/javascript">alert("Material Subcategory Exist.");</script>';
      } 
      else {
        # code...
         mysqli_query($conn, "INSERT INTO material_subcat VALUES ('', '$cat2_textfield', '$material_id')");
         $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2_textfield'");
         $result=mysqli_fetch_assoc($q1);
         $procedure_subcat_id=$result['sub_id'];
         
            # code...
            mysqli_query($conn, "INSERT INTO material_sub_attri VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
            $q3=mysqli_query($conn, "SELECT MAX(sub_attri_id) FROM material_sub_attri");
          $result=mysqli_fetch_assoc($q3);
          $attri_id=$result['MAX(sub_attri_id)'];
            if (isset($option101)) {
            # code...
              echo"a";
              if ($option101=="A") {
                # code...
                echo"b";
                if (!empty($single_procedure_price)) {
                  # code...

                  $price1=$single_procedure_price;
                   
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                }
                
                

              } 
              elseif ($option101=="B") {
                # code...
                if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
                  # code...

                  $price1=$single_tooth_simple_procedure_price;
                    $price2=$single_tooth_moderate_procedure_price;
                    $price3=$single_tooth_complicated_procedure_price;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    $price2=0;
                    $price3=0;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                }
                
              }
              elseif ($option101=="C"){
                if (!empty($single_unit_price)) {
                  # code...

                  echo $price1=$single_unit_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                }

              }
               elseif ($option101=="D"){
                if (!empty($single_by_weight)) {
                  # code...

                  echo $price1=$single_by_weight;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="E"){
                if (!empty($single_volume_price)) {
                  # code...

                  echo $price1=$single_volume_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="F"){
                if (!empty($single_volume_piece_price)) {
                  # code...

                  echo $price1=$single_volume_piece_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                }

              }
              
           }
           
         

      
      
       
    }
    


  }
// END if one Select Option of Material Cat is selected and other 3 input fields contains data 

// if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and other 2 input fields contains data
if (isset($cat1) AND isset($cat2) AND !isset($cat3) AND !empty($cat4_textfield)) {
    # code...

      $q1=mysqli_query($conn, "SELECT * FROM material_cat WHERE material_name='$cat1'");
        $result=mysqli_fetch_assoc($q1);
        $material_id=$result['cat_id'];
       
         $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2'");
         $result=mysqli_fetch_assoc($q1);
         $num2=mysqli_num_rows($q1);
         $procedure_subcat_id=$result['sub_id'];
         if ($num2) {
           # code...
           echo '<script type="text/javascript">alert("Material Subcategory Exist.");</script>';
         } else {
           # code...
        
         
            # code...
            mysqli_query($conn, "INSERT INTO material_sub_attri VALUES ('', '$cat3_textfield', '$procedure_subcat_id')");
            $q3=mysqli_query($conn, "SELECT MAX(sub_attri_id) FROM material_sub_attri");
          $result=mysqli_fetch_assoc($q3);
          $attri_id=$result['MAX(sub_attri_id)'];
            if (isset($option101)) {
            # code...
              echo"a";
              if ($option101=="A") {
                # code...
                echo"b";
                if (!empty($single_procedure_price)) {
                  # code...

                  $price1=$single_procedure_price;
                   
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                }
                
                

              } 
              elseif ($option101=="B") {
                # code...
                if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
                  # code...

                  $price1=$single_tooth_simple_procedure_price;
                    $price2=$single_tooth_moderate_procedure_price;
                    $price3=$single_tooth_complicated_procedure_price;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    $price2=0;
                    $price3=0;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                }
                
              }
              elseif ($option101=="C"){
                if (!empty($single_unit_price)) {
                  # code...

                  echo $price1=$single_unit_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                }

              }
               elseif ($option101=="D"){
                if (!empty($single_by_weight)) {
                  # code...

                  echo $price1=$single_by_weight;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="E"){
                if (!empty($single_volume_price)) {
                  # code...

                  echo $price1=$single_volume_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="F"){
                if (!empty($single_volume_piece_price)) {
                  # code...

                  echo $price1=$single_volume_piece_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                }

              }
              
           }
           
         

  }    
      
       
    
}
// END if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and other 2 input fields contains data

// if one Select Option of Procedure Cat is selected and  Other Select option of procedure subcategory and procredure attribute select option is also selected and other 1 input fields contains data
/*if (isset($cat1) AND isset($cat2) AND isset($cat3) AND !empty($cat4_textfield)) {
  $q1=mysqli_query($conn, "SELECT * FROM material_cat WHERE material_name='$cat1'");
        $result=mysqli_fetch_assoc($q1);
        $material_id=$result['cat_id'];
       
         $q1=mysqli_query($conn, "SELECT * FROM material_subcat WHERE sub_name='$cat2'");
         $result=mysqli_fetch_assoc($q1);
         $procedure_subcat_id=$result['sub_id'];
         
            # code...
            
            $q3=mysqli_query($conn, "SELECT * FROM material_sub_attri WHERE sub_id='$procedure_subcat_id'");
          $result=mysqli_fetch_assoc($q3);
          $attri_id=$result['sub_attri_id'];
            if (isset($option101)) {
            # code...
              echo"a";
              if ($option101=="A") {
                # code...
                echo"b";
                if (!empty($single_procedure_price)) {
                  # code...

                  $price1=$single_procedure_price;
                   
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    
                    mysqli_query($conn, "INSERT INTO material_per_price VALUES ('', '$abbreviation', '$cat4_textfield', 'Per Piece', '$price1', '$attri_id')");
                }
                
                

              } 
              elseif ($option101=="B") {
                # code...
                if (!empty($single_tooth_simple_procedure_price) AND !empty($single_tooth_moderate_procedure_price) AND !empty($single_tooth_complicated_procedure_price)) {
                  # code...

                  $price1=$single_tooth_simple_procedure_price;
                    $price2=$single_tooth_moderate_procedure_price;
                    $price3=$single_tooth_complicated_procedure_price;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                } else {
                  # code...
                  $price1=0;
                    $price2=0;
                    $price3=0;
                    mysqli_query($conn, "INSERT INTO material_by_amount VALUES ('', '$abbreviation', '$cat4_textfield', 'By Amount', '$price1', '$price2', '$price3', '$attri_id')");
                }
                
              }
              elseif ($option101=="C"){
                if (!empty($single_unit_price)) {
                  # code...

                  echo $price1=$single_unit_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Length', '$price1', '$attri_id')");
                }

              }
               elseif ($option101=="D"){
                if (!empty($single_by_weight)) {
                  # code...

                  echo $price1=$single_by_weight;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Weight', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="E"){
                if (!empty($single_volume_price)) {
                  # code...

                  echo $price1=$single_volume_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume', '$price1', '$attri_id')");
                }

              }
              elseif ($option101=="F"){
                if (!empty($single_volume_piece_price)) {
                  # code...

                  echo $price1=$single_volume_piece_price;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                } else {
                  # code...
                  echo $price1=0;
                   
                   
                    mysqli_query($conn, "INSERT INTO material_by_length VALUES ('', '$abbreviation', '$cat4_textfield', 'By Volume Piece', '$price1', '$attri_id')");
                }

              }
              
           }
           

}
*/
//END if one Select Option of Material Cat is selected and  Other Select option of Material subcategory and Materila attribute select option is also selected and other 1 input fields contains data
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
$PageSql = "SELECT * FROM `material_cat`";
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
  <title> Materials</title>
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
            <h1>Materials</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Materials</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
        <div id="add_msg"></div>
          <div class="add-maintain">
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        + Add Material
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
                  <td class="table_subheader" colspan="3">Add Material: 
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
                    Step 1) Construct Material
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
                            $sql=mysqli_query($conn, "SELECT * FROM material_cat");
                            while ($row=mysqli_fetch_assoc($sql)) {
                              # code...
                              echo '<option>'.$row['material_name'].'</option>';
                            }

                            ?>
                            
                            
                          </select>
                        </td>
                        <td class="table_content" valign="top">
                          
                            <select name="cat2" id="cat2" size="18" style="width:235px; height:250px;" >
                            </select>
                        </td>
                        <td class="table_content" valign="top">
                          
                            <select name="cat3" id="cat3" size="18"  disabled="" style="width:235px; height:250px;" >
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
                    <input type="radio" name="option101" id="a" value="A" class="maintenance_procedures_step3"><label for="a"><b>A.) Material has a SINGLE price</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>Per procedure</b> (only use the box/boxes applicable)</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
                        
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_procedure_price" value="" style="width: 80px" ></td>
                        
                      </tr>
                  </table>
                  </td>
                </tr>
                 
                <tr>
                  <td class="table_content" colspan="3"><br></td>
                </tr>
                <tr>
                  <td class="table_content" colspan="3">
                    <input type="radio" name="option101" id="b" value="B" class="maintenance_procedures_step3"><label for="b"><b>B.) Material has a RANGE of prices</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td colspan="4" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>By Amount</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Small Amount</td>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);"> Medium Amount
                        </td>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Largte Amount</td>
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
                    <input type="radio" name="option101" id="c" value="C" class="maintenance_procedures_step3"><label for="a"><b>C.) Material Has Unit Price</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>By Length</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
                        
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_by_length" value="" style="width: 80px" ></td>
                        
                      </tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" colspan="3">
                    <input type="radio" name="option101" id="d" value="D" class="maintenance_procedures_step3"><label for="a"><b>D.) Material Has Unit Price</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>By Weigth</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
                        
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_by_weight" value="" style="width: 80px" ></td>
                        
                      </tr>
                  </table>
                  </td>
                </tr><tr>
                  <td class="table_content" colspan="3">
                    <input type="radio" name="option101" id="e" value="E" class="maintenance_procedures_step3"><label for="a"><b>E.) Material Has Unit Price</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>By Volume</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
                        
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_volume_price" value="" style="width: 80px" ></td>
                        
                      </tr>
                  </table>
                  </td>
                </tr><tr>
                  <td class="table_content" colspan="3">
                    <input type="radio" name="option101" id="f" value="F" class="maintenance_procedures_step3"><label for="a"><b>F.) Material Has Unit Price</b></label>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" style="vertical-align: top;" colspan="3">
                    <table cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="maintenance_table_add_edit" style="color: rgb(153, 153, 153);"><b>By Volume Piece</td>
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit2" style="color: rgb(153, 153, 153);">Procedure price</td>
                        
                      </tr>
                      <tr>
                        <td class="maintenance_table_add_edit3" style="color: rgb(153, 153, 153);">$<input type="text" name="single_volume_piece_price" value="" style="width: 80px" ></td>
                        
                      </tr>
                  </table>
                  </td>
                </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr>
                  <td class="table_content" colspan="3"><br></td>
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
         
  
       
       
        
         <div class="col-md-12 ">
        <div class="card card-num">
            <table id="meterial" class="display responsive nowrap" style="width:100%">
			 
				
				<?php

 require("conn.php");
             $q=mysqli_query($conn,"SELECT * FROM material_cat order by material_name LIMIT $start, $perpage");
             
             while ($row=mysqli_fetch_assoc($q)) {echo' <thead class="data-table" ><tr>
				 <th>Name</th>
				 <th> '.$row['material_name'].' </th>
				  <th> 	Pricing Defined</th>
				 
				  <th> 	Pricing In Rs</th>

				  <th>Action</th>
<th>Action</th>
				</tr> </thead>';
			$id=$row['cat_id'];
             	 $q1=mysqli_query($conn,"SELECT * FROM material_subcat WHERE cat_id='$id'");
             while ($row1=mysqli_fetch_assoc($q1)) {
             	$id1=$row1['sub_id'];
             	echo '<tr>
                  <th> '.$row1['sub_name'].'</th>
                
                </tr>';
             	 $q2=mysqli_query($conn,"SELECT * FROM material_sub_attri WHERE sub_id='$id1'");
             while ($row2=mysqli_fetch_assoc($q2)) {
             	$id2=$row2['sub_attri_id'];
             	if(!empty($row2['attribute_name'])){
             		echo '<tr>
                  <th> '.$row2['attribute_name'].'</th>
                
                </tr>';
             	}
             	
             	 $q3=mysqli_query($conn,"SELECT * FROM material_per_price WHERE sub_attri_id='$id2'");
             	 $e=mysqli_num_rows($q3);
             	if ($e) {
             		# code...

             	while ( $row3=mysqli_fetch_assoc($q3)) {
             		# code...

             		echo'
             <tr>
             <td>'.$row3['per_price_name'].'</td><td></td><td>'.$row3['per_price'].'</td><td>Per Piece '.$row3['price'].'</td><td><a href="delmaterial.php?id='.$row3['per_price_id'].'"><img src="del.gif"></a></td></tr>';
             	}


             	} 
             		# code...
             		
             	 	
             	$q4=mysqli_query($conn,"SELECT * FROM material_by_amount WHERE sub_attri_id='$id2'");
             	 $ee=mysqli_num_rows($q4);
             	 
             	 	if($ee){while ( $row4=mysqli_fetch_assoc($q4)) {
             		# code...
             	 		
             		echo'
             <tr>
             <td>'.$row4['by_amount_name'].'</td><td></td><td>'.$row4['by_amount'].'</td><td>Small '.$row4['small'].'</td><td>Medium '.$row4['medium'].'</td><td>Large'.$row4['large'].'</td><td><a href="delmaterial.php?id1='.$row4['by_amount_id'].'"><img src="del.gif"></a></td></tr>';
             	}}
             	 $q5=mysqli_query($conn,"SELECT * FROM material_by_length WHERE sub_attri_id='$id2'");
             	 $eee=mysqli_num_rows($q5);
             	 
             	 	if($eee){while ( $row5=mysqli_fetch_assoc($q5)) {
             		# code...
                          if ($row5['by_length']=="By Length") {
                                              # code...
                            echo'
             <tr>
             <td>'.$row5['by_length_name'].'</td><td></td><td>'.$row5['by_length'].'</td><td>Per mm '.$row5['price'].'</td><td><a href="edit_pres.php"><a href="delmaterial.php?id2='.$row5['material_length_id'].'"><img src="del.gif"></a></td></tr>';
                                            } elseif($row5['by_length']=="By Volume") {
                                              # code...
                                              echo'
             <tr>
             <td>'.$row5['by_length_name'].'</td><td></td><td>'.$row5['by_length'].'</td><td>Per cc '.$row5['price'].'</td><td><a href="edit_pres.php"><a href="delmaterial.php?id2='.$row5['material_length_id'].'"><img src="del.gif"></a></td></tr>';
                                            }
                                            elseif($row5['by_length']=="By Volume Piece") {
                                              # code...
                                              echo'
             <tr>
             <td>'.$row5['by_length_name'].'</td><td></td><td>'.$row5['by_length'].'</td><td>Per cc '.$row5['price'].'</td><td><a href="edit_pres.php"><a href="edit_pres.php"><a href="delmaterial.php?id2='.$row5['material_length_id'].'"><img src="del.gif"></a></td></tr>';
                                            }
                                            elseif($row5['by_length']=="By Weight") {
                                              # code...
                                              echo'
             <tr>
             <td>'.$row5['by_length_name'].'</td><td></td><td>'.$row5['by_length'].'</td><td>Per gram '.$row5['price'].'</td><td><a href="edit_pres.php"><a href="delmaterial.php?id2='.$row5['material_length_id'].'"><img src="del.gif"></a></td></tr>';
                                            }
                                                         	 		
             		
             	}}
             	

           
               }
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
		
		<div class="modal fade" id="diagmaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form id="updatematerial">
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Abbrev:</label>
					<input type="text" class="form-control" name="abbrev" id="abbrev">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Abbrev:</label>
					<input type="text" class="form-control" name="abbrev" id="abbrev">
				  </div><div class="form-group">
					<label for="recipient-name" class="col-form-label">Abbrev:</label>
					<input type="text" class="form-control" name="abbrev" id="abbrev">
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
                        Copyright © 2018 DentalCharting - <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> - <a href="#" title="Privacy">Privacy</a> - <a href="#" title="Copyright">Copyright</a> - <a href="#" title="Disclaimer">Disclaimer</a> - <a href="#" title="Changelog">Changelog</a>
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
<script src="dist/js/material.js" type="text/javascript"></script>
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
