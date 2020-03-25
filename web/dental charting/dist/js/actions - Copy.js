$(document).ready(function(){
	cheif();
	
	//cat() is a funtion fetching category record from database whenever page is load
//	function cheif(){
//		$.ajax({
//			url	:	"actions.php",
//			method:	"POST",
//			data	:	{cheif_data:1},
//			success	:	function(data){
//				$("#get_cheif").append(data);
//			}
//		});
//	}
//	function cheif()
//{
//    // Load data for data table via AJAX
//    $.ajax ( {
//        url: 'actions.php',
//        dataType: 'json',
//        success: function (data) 
//        {
//			alert(JSON.stringify(data));
//            var table =$('#example').dataTable ( {
//                data:data,
//                columns: [
//                    { 'name': 'ccname' },
//                    { 'desc': 'ccdesc' }
//                ]
//				
//            });
//			
//            // event handler for row selection
//            $(document).on("click",'#example tbody', function (tr)
//            {
//                var data = table.row( this ).data();
//                alert( 'You clicked on '+data[0]+'\'s row' );
//            });
//        }
//    }); 
//}


	//brand() is a funtion fetching brand record from database whenever page is load

	
	
	//Get User Information before checkout
	$("#cheif").on("submit",function(event){
		alert("call");
		event.preventDefault();
		$.ajax({
			url : "actions.php",
			method : "POST",
			data : $("#cheif").serialize(),
			
			success : function(data){
				if (data == "add_success") {
//					$("#example").dataTable().ajax.reload();
					location.reload();
				}else{
					$("#add_msg").html(data);
				}
				
			}
//		})
//			.done (function(data){
//				alert(data);
//				if (data === "add_success") {
//					location.reload();
//				}else{
//					$("#add_msg").html(data);
//				}
//			});
//			.fail (function() {
//			alert("fail");
//   				});
		});
		});
	//Get User Information before checkout end here
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});