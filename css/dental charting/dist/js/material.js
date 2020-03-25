$(document).ready(function(){
//This function will run on the change of procedure cats 
$(function() {

 $("#cat1").on("change", function() {
 	

   var procedure_id = $(this).val();  
  		 // $( "#cat1_textfield" ).prop( "disabled", true );
      
           $.ajax({  
           	   
                url:"load_material.php",  
                method:"POST",  
                data:{procedure_id:procedure_id},  
                success:function(data){ 
              		   
                     $('#cat2').html(data); 
                      

                }  
           }); 
  }).trigger("change");
});
//END function will run on the change of procedure cats
//This function will run on the change of procedure subcats
$(function() {

 $("#cat2").on("change", function() {
 	

   var procedure_subid = $(this).val();  
 
  		 // $( "#cat1_textfield" ).prop( "disabled", true );
     //                 $( "#cat2_textfield" ).prop( "disabled", false ); 
           $.ajax({  
           	 
                url:"load_material.php",  
                method:"POST",  
                data:{procedure_subid:procedure_subid},  
                success:function(data){ 
              		
                     $('#cat3').html(data); 
                      

                }  
           }); 
  }).trigger("change");
});
//END function will run on the change of procedure subcats

//This function will run on the change of procedure sub Attributes
$(function() {

 $("#cat3").on("change", function() {
 	

   var procedure_subattri = $(this).val();  
  
  		 // $( "#cat1_textfield" ).prop( "disabled", true );
     //                 $( "#cat2_textfield" ).prop( "disabled", false ); 
           $.ajax({  
           	 
                url:"load_material.php",  
                method:"POST",  
                data:{procedure_subattri:procedure_subattri},  
                success:function(data){ 
              		 
                     $('#cat4').html(data); 
                      

                }  
           }); 
  }).trigger("change");
});
//END function will run on the change of procedure sub Attributes
});