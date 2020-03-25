
$(document).ready(function(){

  function status(){
      
    $("#example").dataTable({
       "bDeferRender" : true,
      "language": {
          "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
      "ajax":{
        "url":"actions.php",
        "type" : "POST",
        "data" : {bill_data:1},
        "dataSrc" : ""
      },
      "columns":[
        {"data":"category"},
        {"data":"status"},
        {"data":"color"},
        {"data":"description"},
        {"data":"d_score"},
        {"data":"m_score"},
        {"data":"m_score"},
        {
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_status"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_status" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
       
      ]
    });
  }
  //prescrition() is a funtion fetching chief complaints record from database whenever page is load 
});

//This Function is used to fetch data for to display the dentists by choosing the clanic
$(function() {

 $("#clinic").on("change", function() {
 	var clinic_id = $(this).val();

    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{clinic_id:clinic_id},  
                success:function(data){ 
               
                     $('#dentist').html(data); 
                     
                     
                }  
           });  
  }).trigger("change");
});
//END This Function is used to fetch data for to display the dentists by choosing the clanic



//This Function is used to fetch data for to display the statuses of different categories
$(function() {

 $("#Status").on("change", function() {
 	var status_id = $(this).val();
  
    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{status_id:status_id},  
                success:function(data){ 
              
                     $('#substatus').html(data); 
                     
                     
                }  
           });  
  }).trigger("change");
});
//END This Function is used to fetch data for to display the statuses of different categories


//This Function is used to fetch data for to display the prescrtiptions of different categories
$(function() {

 $("#presccat").on("change", function() {
 	var presc_id = $(this).val();
 
    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{presc_id:presc_id},  
                success:function(data){ 
               
                     $('#prescription').html(data); 
                     
                     
                }  
           });  
  }).trigger("change");
});
//END This Function is used to fetch data for to display the prescrtiptions of different categories


//This Function is used to fetch data for to display the materials by choosing of different categories
$(function() {

 $("#materialcat").on("change", function() {
 	var material_id = $(this).val();

    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{material_id:material_id},  
                success:function(data){ 
                
                     $('#matee').html(data); 
                      $('#contt').html(" ");
                     
                }  
           });  
  }).trigger("change");
});
//END This Function is used to fetch data for to display the materials of different categories



//This Function is used to fetch data for to display the procedures by choosing of different categories
$(function() {

 $("#materialcats").on("change", function() {
 	var procdure_id = $(this).val();

    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{procdure_id:procdure_id},  
                success:function(data){ 
                
                     $('#Procedure').html(data); 
                     $('#cont').html(" ");
                     
                     
                }  
           });  
  }).trigger("change");
});

//END This Function is used to fetch data for to display the procedures by choosing of different categories




//Fetch prices of procedure From procedures tables disyplay and calculate bill on different categoriesc

$(function() {
$( "#Procedure" ).click(function() {
  var procdureattri_id = $(this).val();

    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{procdureattri_id:procdureattri_id},  
                success:function(data){ 
                
                     $('#cont').html(data); 
                     
                     
                }  
           });  
});
});
//Fetch prices of procedure From procedures tables disyplay and calculate bill on different categoriesc



//Fetch prices of materials From materials tables disyplay and calculate bill on different categoriesc

$(function() {
$( "#matee" ).click(function() {
  var mateee_id = $(this).val();

    $.ajax({  

                url:"load_editwork_data.php",  
                method:"POST",  
                data:{mateee_id:mateee_id},  
                success:function(data){ 
                
                     $('#contt').html(data); 
                     
                     
                }  
           });  
});
});
//END Fetch prices of materials From materials tables disyplay and calculate bill on different categoriesc