<?php
extract($_POST);
require('conn.php');

if(isset($_GET['id'])) {
  # code...
 // echo "<script type='text/javascript'>alert('sjdflk');</script>";
  echo "string";

 // mysqli_query($conn, "DELETE * FROM status WHERE id=''");

}
if (isset($opslaan)) {
  # code...
  //echo $cat1_existing;
  if (isset($cat1_existing_or_new)) {
    # code...
    $cat;
  //echo $cat1_existing_or_new;
  if ($cat1_existing_or_new=='existing') {
    # code...
   $cat=$cat1_existing;
  }
  else{
    $cat=$cat1_new;
  }
  echo $cat;
  
  if (!$notation || !$option5 || !$option8 || !$type) {
    # code...
     mysqli_query($conn, "INSERT INTO status (id, category, status, color, description, d_score, m_score, f_score) VALUES (' ', '$cat', '$notation', '$option8', '$option5', '$d_score', '$m_score', '$f_score' )");
  }
 
  }
  
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Statuses</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1> Statuses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Statuses</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-12 ">
         <div class="add-maintain">
        	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add status
			  </button>
				<div class="collapse" id="collapseExample">
				  <div class="card">
					<div class="Procedures-form">
				   <form method="post" action="">
						<table border="0" width="100%" class="add_edit_del_table">
								<tbody><tr>
									<td class="table_subheader" colspan="3">Add status: 
									</td>
								</tr>
								<tr>
									<td style="vertical-align: top;" colspan="2">
										<div class="info_message" style="    padding: 10px;">In order to add a status you have to follow the following 2 steps:<br>
			- First specify the abbreviation<br>
			- Second pick a color and fill in the description of the new status.</div>
									</td>
								</tr>
								<tr>
									<td class="table_content" width="100"><b>Category</b></td>
									<td class="table_content input_existing_or_new_toggle">
										<table>
											<tbody><tr class="input_existing">
												<td style="padding-right: 10px;"><input type="radio" name="cat1_existing_or_new" value="existing" class="existing_or_new_toggle" id="cat1_existing_or_new_existing"><label for="cat1_existing_or_new_existing">Existing category</label>:</td>
												<td>
													<select name="cat1_existing" style="width: 130px">
														<option value="">--- Please select ---</option><option value="Caries">Caries</option><option value="Endo">Endo</option><option value="General">General</option><option value="Implant">Implant</option><option value="Preventive">Preventive</option><option value="Prostho">Prostho</option><option value="Resto">Resto</option><option value="Surgery">Surgery</option>
													</select>
												</td>
											</tr>
											<tr class="input_new">
												<td style="padding-right: 10px;"><input type="radio" name="cat1_existing_or_new" value="new" class="existing_or_new_toggle" id="cat1_existing_or_new_new"><label for="cat1_existing_or_new_new">New category</label>:</td>
												<td><input type="text" name="cat1_new" style="width: 130px" maxlength="20" value=""></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								<tr>
									<td class="table_content" width="100"><b>Status</b></td>
									<td class="table_content">
										<input type="text" name="notation" style="width: 70px" maxlength="8" value=""> <span class="mandatory_field">*</span>
									</td>
								</tr>
								<tr>
									<td class="table_content"><b>Color Coding</b></td>
									<td class="table_content">
										<div id="option8_content">
										   # <input class="color {required:false}" type="text" maxlength="6" size="10" name="option8" value="" id="input_text" style="width: 110px" autocomplete="off"> (Click on the input field to pick a color)
										</div>
									</td>
								</tr>
								<tr>
									<td class="table_content" style="vertical-align: top;"><b>Description</b></td>
									<td class="table_content">
										<textarea name="option5" style="width: 120px"></textarea> <span class="mandatory_field">*</span>
									</td>
								</tr>
                <tr>
                  <td class="table_content"><b>D Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="d_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="table_content"><b>M Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="m_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>
                <tr>
                 <tr>
                  <td class="table_content"><b>F Score</b></td>
                  <td class="table_content">
                    <div id="option8_content">
                       # <input class="color {required:false}" type="text" maxlength="6" size="10" name="f_score" value="" id="input_text" style="width: 110px" autocomplete="off"> 
                    </div>
                  </td>
                </tr>

								
								</tbody></table>
							<table border="0" width="100%" class="add_edit_del_table_buttons">
							<tbody><tr>
								<td colspan="3"><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;<input type="submit" name="cancel" value="Cancel"></td>
							</tr>
							</tbody></table>
						</form>
					</div>
				  </div>
				</div>
          </div>
          </div>
          <script>
  function DeleteNotice(id)
  {
    if(confirm("You Want To Delete This Record ?"))
    {
    window.location.href="delete_status.php?id="+id;
    }
  }
</script>
        <div class="col-md-12 ">
        <div class="card card-num">
            
            <!-- /.card-header -->
            <table id="example12" class="display responsive nowrap" style="width:100%">
        <thead class="data-table">
            <tr>
               <th>	Category</th>
                <th>		Status</th>
                <th>	Color</th>
                <th>Description</th>
                <th>	D score</th>
                 <th>M score</th>
                  <th>F score</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
          <?php
          require("conn.php");
          $sql=mysqli_query($conn, "SELECT * FROM status");
          while ($row=mysqli_fetch_assoc($sql)) {
            # code...
            $_SESSION['s_id']=$row['id'];
            echo '<tr>
                <td>'.$row['category'].'</td>
                <td>'.$row['status'].'</td>
                <td>'.$row['color'].'</td>
                <td>'.$row['description'].'</td>
                <td>'.$row['d_score'].'</td>
                  <td>'.$row['m_score'].'</td>
                    <td>'.$row['f_score'].'</td>
                
                <a href="fd"></a>
                <td> <input type="button" value="Edit" class="btn btn-primary " data-toggle="modal" data-target="#myModel">&nbsp &nbsp <a href="javascript:DeleteNotice('.$row['id'].')"><input type="button" name="adnan" value="Delete" class="btn btn-danger ">
</td></a>
            </tr>';

          }
          ?>
            
            
              </tbody>
    </table>
            <!-- /.card-body -->
            
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

<!-- Modal -->
<?php
if (isset($ad)) {
  # code...
  echo "string";
}
?>
<div class="modal fade" id="myModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form id="updatestatus">
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Name Getegory:</label>
          <input type="text" class="form-control" name="cat" id="cat">
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">Status:</label>
          <textarea class="form-control" name="status" id="status"></textarea>
          <input type="text" id="cid" name="uid" class="hide">
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">Color:</label>
          <textarea class="form-control" name="color1" id="color1"></textarea>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">Description:</label>
          <textarea class="form-control" name="desc" id="desc"></textarea>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">D Score:</label>
          <textarea class="form-control" name="dsocer" id="dscore"></textarea>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">M Score:</label>
          <textarea class="form-control" name="mscore" id="mscore"></textarea>
          </div>
          <div class="form-group">
          <label for="message-text" class="col-form-label">F Score:</label>
          <textarea class="form-control" name="fscore" id="fscore"></textarea>
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
<div id="my" class="modal fade show" role="dialog" style=";background: rgba(0,0,0,.5);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status</h4>
      </div>
      <div class="modal-body">

      <form method="post" action="" id="updatestatus">  
      <table class="table">
        <?php 
        $id=$_SESSION['s_id'];
        $sql=mysqli_query($conn, "SELECT * FROM status WHERE id='$id'");

        while ($row=mysqli_fetch_assoc($sql)) {
          # code...
          echo'<tr>
       <td><label>Category:</label></td><td> <input type="" name="category" value='.$row['category'].'></td>
     </tr>
         <tr>
       <td><label>Status:</label></td><td> <input type="" name="status" value='.$row['status'].'></td>
     </tr> <tr>
       <td><label>Color:</label></td><td> <input type="" name="color" value='.$row['color'].'></td>
     </tr> <tr>
       <td><label>Description:</label></td><td> <input type="" name="description" value='.$row['description'].'></td>
     </tr> <tr>
       <td><label>D Score:</label></td><td> <input type="" name="d_score" value='.$row['d_score'].'></td>
     </tr> <tr>
       <td><label>M Score:</label></td><td> <input type="" name="m_score" value='.$row['m_score'].'></td>

     </tr>
     <tr>
       <td><label>F Score:</label></td><td> <input type="" name="f_score" value='.$row['f_score'].'></td>
       
     </tr>';

        }
        
        ?>
        
     </table>
      

      </div>
      
      <div class="modal-footer">
         
         <input type="submit" name="upload" class="btn btn-primary" data-dismiss="modal" value="Update">
        <input type="button" name="ad" class="btn btn-default" data-dismiss="modal" href="Statuses.php" value="Close">
      </div>
    </form>
    </div>
 
  </div>
  
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
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

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
