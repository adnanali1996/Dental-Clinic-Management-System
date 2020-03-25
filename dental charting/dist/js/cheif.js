
$(document).ready(function(){
	
	cheif();
	//cheif() is a funtion fetching chief complaints record from database whenever page is load
	function cheif(){
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
				"data" : {cheif_data:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"name"},
				{"data":"description"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_chiefff"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_chief" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
	}
//END cheif() is a funtion fetching chief complaints record from database whenever page is load
//Edit chief complaints
	$(document).on('click', '#edit_chiefff', function () {
		var id = $(this).attr("data-id");
		
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				keycheif: "editChief",
				id: id
			},
			success : function(data){
				$("#cid").val(data.cid);
				$("#chief_name").val(data.cname);
				$("#chief_desc").val(data.desc);
				$("#chief").modal("show");
				
			}
		});
	});
	
	$("#updatechief").on("submit",function(event){
		event.preventDefault();
		
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#updatechief").serialize(),
			
			success : function(data){
			    
				    
					$("#chief").modal("hide");
	              	$("#example").DataTable().ajax.reload();
					
				
			}
		});
	});
		
	//Edit chief complaints end
	
	
	//del chief complaints
	
	$(document).on('click', '#del_chief', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delChief: 1,
				id: id
			},
			success : function(data){
				
					$("#example").DataTable().ajax.reload();
				
				
			}
		});
	});
	
	//del chief complaints end
//Add chief complaints
	$("#cheif").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#cheif").serialize(),
			
			success : function(data){
			
					$("#cheif").trigger("reset");
					$("#example").DataTable().ajax.reload();
			
			}
		});
	});
	//Add chief complaints end	
	
	

});