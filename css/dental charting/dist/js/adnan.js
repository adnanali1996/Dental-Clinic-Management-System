$(function() {

 $("#location").on("change", function() {
 	var clanic_id = $(this).val();
  
    $.ajax({  

                url:"load_data.php",  
                method:"POST",  
                data:{clanic_id:clanic_id},  
                success:function(data){ 
               
                     $('#clanics').html(data); 
                     
                     
                }  
           });  
  }).trigger("change");
});

