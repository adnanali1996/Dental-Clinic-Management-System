
$(document).ready(function(){
	cheif();
	signs();
	matrial();
	status();
	diag();
	pres();
	

//Status() is a funtion fetching chief complaints record from database whenever page is load	
		function status(){
			
		$("#example6").dataTable({
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
				"data" : {status_data:1},
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
		function pres(){
       
$("#example7").dataTable({
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
				"data" : {delta:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"acetylsalicylic_acid"},
				{"data":"price"},
				{"data":"instructions"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_pre"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_pre" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
		
	}
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
//material() is a funtion fetching chief complaints record from database whenever page is load	
		function matrial(){
		$("#meterial").dataTable({
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
				"data" : {meterial:1},
				"dataSrc" : ""
			},
			"columns":[
				{"data":"abbrev"},
				{"data":"consumables"},
				{"data":"pricing_defined"},
				{"data":"price_s"},
				{"data":"price_m"},
				{"data":"price_l"},
				{
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<input id="edit_diags" type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_material" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
	}
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
               "mRender": function (o) { return '<input id="edit_chief"  type="button" value="Edit" data-id ="'+o.id+'"  class="btn btn-primary"> <button id="del_chief" data-id ="'+o.id+'" class="btn btn-danger download" >Delete</button>'; }
            }
		   
			]
		});
	}
	//cheif() is a funtion fetching chief complaints record from database whenever page is load
		//Edit status
		$(document).on('click', '#edit_status', function () {
		
		//$("#statuse").modal("show");
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				keymate: "editmatte",
				idmate: id
			},
			success : function(data){
				//alert("call");
				$("#cid").val(data.cid);
				$("#categoryy").val(data.cat);
				$("#statuses").val(data.status);
				$("#colorr").val(data.color);
				$("#descc").val(data.desc);
				$("#dscoree").val(data.dscore);
				$("#mscoree").val(data.mscore);
				$("#fscoree").val(data.fscore);
				$("#statuse").modal("show");
				
			}
		});
	});
	
	$("#updatestatus").on("submit",function(event){

		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#updatestatus").serialize(),
			
			success : function(data){
				$("#statuse").modal("hide");['']
					$("#example6").DataTable().ajax.reload();
				if (data === "update_success") {
					alert("ksldfjl");
					$("#statuse").modal("hide");
					$("#example6").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
			}
		});
	});
		
	//Edit statuses end
	//Edit Materials
	$(document).on('click', '#edit_diags', function () {
		
		//$("#diagmaterial").modal("show");
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				keymat: "editmatt",
				idmat: id
			},
			success : function(data){
				//alert("call");
				$("#cid").val(data.cid);
				$("#abbrev").val(data.cname);
				$("#conn").val(data.conn);
				$("#pd").val(data.prd);
				$("#ps").val(data.prs);
				$("#pl").val(data.prm);
				$("#pf").val(data.prl);
				$("#diagmaterial").modal("show");
				
			}
		});
	});
	
	$("#updatematerial").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#updatematerial").serialize(),
			
			success : function(data){
				if (data === "update_success") {
					$("#diagmaterial").modal("hide");
					$("#meterial").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
			}
		});
	});
		
	//Edit Materials end
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
					$("#add_msg").html(data);
				}
			}
		});
	});
		
	//Edit Diagnosis end
	//Edit diagnose
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
					$("#add_msg").html(data);
				}
			}
		});
	});
		
	//Edit diagnose end
	//Edit chief complaints
	$(document).on('click', '#edit_chief', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			dataType: "json",
			data : {
				key: "editChief",
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
				if (data === "update_success") {
					$("#chief").modal("hide");
					$("#example").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
			}
		});
	});
		
	//Edit chief complaints end
	//del Status
	
	$(document).on('click', '#del_status', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delS: 1,
				ids: id
			},
			success : function(data){
				if (data === "del_success") {
					$("#example6").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
				
			}
		});
	});
	
	//del Status end
		//del Presciption
	
	$(document).on('click', '#del_pre', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delPRE: 1,
				idpre: id
			},
			success : function(data){
				if (data === "del_success") {
					$("#example7").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
				
			}
		});
	});
	
	//del Materials end
	//del Materials
	
	$(document).on('click', '#del_material', function () {
		var id = $(this).attr("data-id");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : {
				delMat: 1,
				idm: id
			},
			success : function(data){
				if (data === "del_success") {
					$("#meterial").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
				
			}
		});
	});
	
	//del Materials end
	//del Materials
	
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
					$("#add_msg").html(data);
				}
				
			}
		});
	});
	
	//del Materials end
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
				if (data === "del_success") {
					$("#example").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
				
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
				if (data === "add_success") {
					$("#cheif").trigger("reset");
					$("#example").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
			}
		});
	});
	//Add chief complaints end

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
					$("#add_msg").html(data);
				}
			}
		});
	});
	//Add diagnosis end
//Add material 
	$("#addmaterial").on("submit",function(event){
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#addmaterial").serialize(),
			
			success : function(data){
				if (data === "add_success") {
					$("#addmaterial").trigger("reset");
					$("#meterial").DataTable().ajax.reload();
				}else{
					$("#add_msg").html(data);
				}
			}
		});
	});
	//Add material end
	/************************ chief complaint end *********************/
	
	//cheif() is a funtion fetching chief complaints record from database whenever page is load
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
	//cheif() is a funtion fetching chief complaints record from database whenever page is load
	
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
					$("#add_msg").html(data);
				}
			}
		});
	});
	//Edit chief complaints end
	//del chief complaints
	
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
					$("#add_msg").html(data);
				}
				
			}
		});
	});
	
	//del chief complaints end
	//Add chief complaints
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
					$("#add_msg").html(data);
				}
			}
		});
	});
	//Add chief complaints end
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});