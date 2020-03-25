$(document).ready(function(){
	signs();
//sigsn() is a funtion fetching signs record from database whenever page is load
	function signs(){
		$("#signs_table").dataTable({
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
				"data" : {sign_data:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"name"},
				{"data":"description"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_sign"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_sign" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
	}
	//END sigsn() is a funtion fetching signs record from database whenever page is load

	
	//Edit signs
	$(document).on('click', '#edit_sign', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				keysign: "editsign",
				id: id
			},
			success : function(data){
				$("#cid").val(data.cid);
				$("#chief_name").val(data.cname);
				$("#chief_desc").val(data.desc);
				$("#sign").modal("show");
				
			}
		});
	});
	
	$("#updatesign").on("submit",function(event){
		event.preventDefault();
		
			var id = 	$("#cid").val();
			var name =	$("#chief_name").val();
			var dec = 	$("#chief_desc").val();
		
		$.ajax({
			url : "actions.php",
			method : "POST",
			data :{
				sid: id,
				sname: name,
				sdec : dec
			},
			
			success : function(data){
				if (data === "update_success") {
					$("#sign").modal("hide");
					$("#signs_table").DataTable().ajax.reload();
				}else{
					$("#sign").modal("hide");
					$("#signs_table").DataTable().ajax.reload();
				}
			}
		});
	});
	//Edit signs end
	//del signs
	
	$(document).on('click', '#del_sign', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delsign: 1,
				id: id
			},
			success : function(data){
				if (data === "del_success") {
					$("#signs_table").DataTable().ajax.reload();
				}else{
					$("#signs_table").DataTable().ajax.reload();
				}
				
			}
		});
	});
	
	//del signs end

		//Add signs
	$("#signs").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#signs").serialize(),
			
			success : function(data){
				if (data === "add_success") {
					$("#signs").trigger("reset");
					$("#signs_table").DataTable().ajax.reload();
				}else{
					$("#signs").trigger("reset");
					$("#signs_table").DataTable().ajax.reload();
				}
			}
		});
	});
	//Add signs  end

});