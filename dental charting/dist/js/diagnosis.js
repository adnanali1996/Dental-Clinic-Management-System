$(document).ready(function(){

	diag();
//diag() is a funtion fetching diagosing record from database whenever page is load	
			function diag(){
		$("#example9").dataTable({
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
				"data" : {cheiff_data:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"abbrev"},
				{"data":"diagnosis"},
				{"data":"description"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_diag"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_diag" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
	}
//material() is a funtion fetching materials record from database whenever page is load	
//Add diagnosis 
	$("#diagn").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#diagn").serialize(),
			
			success : function(data){
				if (data === "add_success") {
					$("#diagn").trigger("reset");
					$("#example9").DataTable().ajax.reload();
				}else{
					$("#diagn").trigger("reset");
					$("#example9").DataTable().ajax.reload();
				}
			}
		});
	});
	//Add diagnosis end


	//Edit Diagnosis
	$(document).on('click', '#edit_diag', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				keyd: "editD",
				idDI: id
			},
			success : function(data){
				$("#cid").val(data.cid);
				$("#abbre").val(data.cname);
				$("#diagmn").val(data.cnam);
				$("#diag_desc").val(data.desc);
				$("#diag").modal("show");
				
			}
		});
	});
	
	$("#updatediag").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#updatediag").serialize(),
			
			success : function(data){
				if (data === "update_success") {
					$("#diag").modal("hide");
					$("#example9").DataTable().ajax.reload();
				}else{
					$("#diag").modal("hide");
					$("#example9").DataTable().ajax.reload();
				}
			}
		});
	});
		
	//Edit Diagnosis end


	//del diagnosis
	
	$(document).on('click', '#del_diag', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delDiag: 1,
				idD: id
			},
			success : function(data){
				if (data === "del_success") {
					$("#example9").DataTable().ajax.reload();
				}else{
				$("#example9").DataTable().ajax.reload();
				}
				
			}
		});
	});
	
	//del diagnosis end



});