// This is used for prescription's Subcategories to display on the subcategory select tag
$(document).ready(function(){
  
$(function() {

 $("#categ").on("change", function() {
 	
 
   var brand_id = $(this).val();  
  		 // $( "#cat1_textfield" ).prop( "disabled", true );
     //                 $( "#cat2_textfield" ).prop( "disabled", false ); 
           $.ajax({  
           	 
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){ 
              
                     $('#subcategory').html(data); 
                      

                }  
           }); 
  }).trigger("change");
});
// This is used for prescription's Subcategories's Categorise to display on the subcategory select tag
$(function() {

 $("#subcategory").on("change", function() {
 	
 
   var brand_id = $(this).val();  
  // $( "#cat1_textfield" ).prop( "disabled", true ); 
  //                    $( "#cat2_textfield" ).prop( "disabled", true ); 
  //                     $( "#cat3_textfield" ).prop( "disabled", false ); 
           $.ajax({  
           	 
                url:"load_data.php",  
                method:"POST",  
                data:{sub_id:brand_id},  
                success:function(data){ 
                
                     $('#cat3').html(data); 

                     
                } 
           }); 
  }).trigger("change");
});
});