<?php
session_start();
ob_start();
if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
extract($_POST);
require("conn.php");

//echo $_SERVER['REQUEST_URI']; 


if (isset($opslaan)) {
  # code...
  
    # code...
    if (!empty($location)AND!empty($clanics)AND!empty($date)AND!empty($type) AND!empty($patient_id)) {
      # code...
      $q=mysqli_query($conn, "SELECT * FROM patients WHERE id='$patient_id'");
      $num=mysqli_num_rows($q);
      if ($num) {
        # code...
       
        // echo $location.'<br>'.$clanics.'<br>'.$date.'<br>'.$type.'<br>'.$patient_id.'<br>'.$title;

         if(isset($from) AND isset($till)){
          $timeslot= $from.'-'.$till;
        
         $q2=mysqli_query($conn, "SELECT * FROM appointment WHERE date='$date' AND time_slot='$timeslot'");
         $num1=mysqli_num_rows($q2);
         if ($num1) {
           # code...
          echo '<script type="text/javascript">alert("You Already Have appointment On Same Date and Time.");</script>';

         }
         else{ $q1=mysqli_query($conn, "INSERT INTO appointment VALUES('', '$location', '$clanics', '$patient_id', '$date', '$timeslot', '$type', '$title')");}
         

         }
         else{
           $q1=mysqli_query($conn, "INSERT INTO appointment VALUES('', '$location', '$clanics', '$patient_id', '$date', 'ALL DAY', '$type', '$title')");
         }
    }
    else{ echo '<script type="text/javascript">alert("Patient Is not Found With This ID.");</script>';}
  }
    else{
      echo '<script type="text/javascript">alert("Please Fill All Fields.");</script>';
      }
    
    
   
  }
 
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Schduler</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php include("views/nav-sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Schduler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Schduler</li>
            </ol>
          </div>
        </div>
      </div>
    
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <table border="0" width="100%" class="add_edit_del_table" style="opacity:1; filter:alpha(opacity=100);">
                    <form accept="" method="post">
                    <tbody><tr>
                        <td class="table_subheader" colspan="6">Add appointment:
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Location</b>:</td>
                        <td class="table_content">
                          <select id="location" name="location" class=" vendor form-control" style="width: 33%">
                                               
	               
                          <?php
                          require("conn.php");
                          $q=mysqli_query($conn, "SELECT * FROM clanic");
                          echo $d=mysqli_num_rows($q);
                          while ($row=mysqli_fetch_assoc($q)) {
                            # code...
                            echo'<option value="'.$row['id'].'">'.$row['clanic_name'].'</option>';
                          }



                          ?>                                          
												   
       
                                      
                                        </select>
         
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Staff</b>:</td>
                        <td class="table_content">
                       <select id="clanics" name="clanics" class=" vendor form-control"  style="width: 33%">
                                               
	               
                                                   
       
                                      
                                        </select>
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>All day</b>:</td>
                        <td class="table_content">
                            <input type="radio" onclick="disa();" name="all_day" value="yes" class="all_day_yes_no" id="all_day_1"> <label for="all_day_1">Yes</label>
                            
                            <input type="radio" onclick="ena();" name="all_day" value="no" class="all_day_yes_no" id="all_day_0" checked=""> <label for="all_day_0">No</label>
                            <script type="text/javascript">
                              function disa() {
                                // body...
                                 document.getElementById("from").disabled = true;
                                  document.getElementById("till").disabled = true;
                              }
                              function ena(){
                                document.getElementById("from").disabled = false;
                                  document.getElementById("till").disabled = false;
                              }
                            </script>
                        </td>
                    </tr>
                    <tr><td><b> Date</b></td>
                      <td><div class="col-md-3 form-vender invoice-input " style="padding: 0px;">  
         <input type="date" style="width: 70px; " value="" name="date" class="datepicker hasDatepicker ">
           <i class="fa fa-calendar"></i>
          
          </div></td></tr>
                    <tr>
                        <td class="table_content" width="140px"><b>From</b>:</td>
                        <td class="table_content">
                            
                            
                            <input type="text" name="from" id="from" style="width: 35px;" class="edit_appointment_time_input" maxlength="5" name="from_hour_min"  placeholder="07:45"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Till</b>:</td>
                        <td class="table_content">
                          
                            
                            <input type="text" name="till" id="till" style="width: 35px;" class="edit_appointment_time_input" maxlength="5" name="till_hour_min" placeholder="08:00"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Type</b>:</td>
                        <td class="table_content">
                            <select class="type" name="type" class=" vendor form-control"  style="width: 33%">
                                               
	               
                                                   
												  <option value="Other"> --Select--</option>
												   <option value="Patient appointment">Patient appointment</option>
       
                                      
                                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"> <b>Patient ID:</b> 
                            <input type="hidden" name="patient_id" value="" class="patient_id">
                            

                            <span class="patient_id_link">
                            </span></td>
                        <td class="table_content">
                           <input type="text" style="width: 200px" name="patient_id" value="" class="patient_id" >
                           
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Description</b>:</td>
                        <td class="table_content"><textarea style="width: 200px; height: 100px" name="title"></textarea> <span class="mandatory_field">*</span></td>
                    </tr>
                    
                </tbody></table>
              
          <!-- /.col -->
          <table border="0" width="100%" class="add_edit_del_table_buttons" style="opacity:1; filter:alpha(opacity=100);">
                <tbody><tr>
                    <td><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    
                </tr>
                </tbody></table>
                </form>
          <!-- <div id="zoombox" class="lightbox">             <div class="zoombox_mask" style="display: block; opacity: 0.6;"></div>            <div class="zoombox_container multimedia" style="width: 600px; height: 50px; top: 50px; left: 383px; display: block; opacity: 1;">                <div class="zoombox_content">
            <div id="add_edit_appointment">
            <form method="post" action="" class="ajax_form" data-form_id="event-actions" data-module="scheduler" data-form_target="add_edit_appointment">
                <input type="hidden" name="action" value="add" class="ajax_form_action">
                <input type="hidden" name="event_id" value="">
                <input type="hidden" name="timeDifference" value="300">
                
                <table border="0" width="100%" class="add_edit_del_table" style="opacity:1; filter:alpha(opacity=100);">
                    <tbody><tr>
                        <td class="table_subheader" colspan="6">Add appointment:
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Location</b>:</td>
                        <td class="table_content">
                            <div class="dropdown edit-appointment" data-target_class="edit-appointment" data-type="location_id" data-field_name="location_id"><select name="location_id" style="width: 206px; display: none;" class="edit-appointment_location_id"><option value="">-- Please select --</option><optgroup label="dreamstech"><option value="2610" selected="">Chair 1</option></optgroup></select><div class="ms-parent"><button type="button" class="ms-choice" style="width: 200px;"><span class=""> Chair 1</span><div></div></button><div class="ms-drop bottom" style="width: 205px;"><ul style="max-height: 250px;"><li><label><input type="radio" name="selectItemlocation_id" value=""> -- Please select --</label></li><li class="group"><label class="optgroup" data-group="group_1">dreamstech</label></li><li><label><input type="radio" name="selectItemlocation_id" value="2610" checked="checked" data-group="group_1"> Chair 1</label></li><li class="ms-no-results">No matches found</li></ul></div></div></div>
         <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content"><b>Staff</b>:</td>
                        <td class="table_content">
                        <div class="dropdown edit-appointment" data-target_class="edit-appointment" data-type="dentist_id" data-field_name="dentist_id[]"><select name="dentist_id[]" style="width: 310px; display: none;" multiple="multiple" size="3" class="edit-appointment_dentist_id"><optgroup label="Account holder"><option value="102746" selected="">siddiqui, Awais jameel (awais)</option></optgroup></select><div class="ms-parent"><button type="button" class="ms-choice" style="width: 304px;"><span class="">All selected</span><div></div></button><div class="ms-drop bottom" style="width: 304px;"><ul style="max-height: 250px;"><li><label><input type="checkbox" name="selectAlldentist_id[]"> [Select all]</label></li><li class="group"><label class="optgroup" data-group="group_0"><input type="checkbox" name="selectGroupdentist_id[]"> Account holder</label></li><li class="multiple" style="width: 130px;"><label><input type="checkbox" name="selectItemdentist_id[]" value="102746" checked="checked" data-group="group_0"> siddiqui, Awais jameel (awais)</label></li><li class="ms-no-results">No matches found</li></ul></div></div></div>
         <span class="mandatory_field">*</span>
                        
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>All day</b>:</td>
                        <td class="table_content">
                            <input type="radio" name="all_day" value="yes" class="all_day_yes_no" id="all_day_1"> <label for="all_day_1">Yes</label>
                            <input type="radio" name="all_day" value="no" class="all_day_yes_no" id="all_day_0" checked=""> <label for="all_day_0">No</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>From</b>:</td>
                        <td class="table_content">
                            <input type="text" style="width: 66px" maxlength="10" name="from_date" id="from_date" value="2018-10-04" class="datepicker hasDatepicker"><img class="ui-datepicker-trigger" src="https://dentalcharting.com/images/icons/month_calendar.png" alt="Select a date" title="Select a date"> <i>YYYY-MM-DD</i>
                            
                            <input type="text" style="width: 32px; margin-left: 15px" class="edit_appointment_time_input" maxlength="5" name="from_hour_min" value="00:15"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Till</b>:</td>
                        <td class="table_content">
                            <input type="text" style="width: 66px" maxlength="10" name="till_date" id="till_date" value="2018-10-04" class="datepicker hasDatepicker"><img class="ui-datepicker-trigger" src="https://dentalcharting.com/images/icons/month_calendar.png" alt="Select a date" title="Select a date"> <i>YYYY-MM-DD</i>
                            
                            <input type="text" style="width: 32px; margin-left: 15px" class="edit_appointment_time_input" maxlength="5" name="till_hour_min" value="00:30"> <i>HH:MM</i> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Type</b>:</td>
                        <td class="table_content">
                            <select name="type" style="width: 206px; display: none;" class="types_filter"><option value="9">Meeting</option><option value="10">Not available</option><option value="11">-- Other --</option><option value="8" selected="">Patient appointment</option>
                            </select><div class="ms-parent"><button type="button" class="ms-choice" style="width: 200px;"><span class=""> Patient appointment</span><div></div></button><div class="ms-drop bottom" style="width: 205px;"><ul style="max-height: 250px;"><li><label><input type="radio" name="selectItemtype" value="9"> Meeting</label></li><li><label><input type="radio" name="selectItemtype" value="10"> Not available</label></li><li><label><input type="radio" name="selectItemtype" value="11"> -- Other --</label></li><li><label><input type="radio" name="selectItemtype" value="8" checked="checked"> Patient appointment</label></li><li class="ms-no-results">No matches found</li></ul></div></div> <span class="mandatory_field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Patient</b> <i>(optional)</i>:</td>
                        <td class="table_content">
                            <input type="text" style="width: 200px" name="patient_name"> 
                            Patient ID: <input type="text" style="width: 35px" name="patient_id" value="" class="patient_id" disabled="">
                            <input type="hidden" name="patient_id" value="" class="patient_id">
                            

                            <span class="patient_id_link">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Description</b>:</td>
                        <td class="table_content"><textarea style="width: 200px; height: 100px" name="title"></textarea> <span class="mandatory_field">*</span></td>
                    </tr>
                    <tr>
                        <td class="table_content" width="140px"><b>Link</b> <i>(optional)</i>:</td>
                        <td class="table_content"><input type="text" style="width: 200px" name="url" value=""></td>
                    </tr>
                </tbody></table>
                <table border="0" width="100%" class="add_edit_del_table_buttons" style="opacity:1; filter:alpha(opacity=100);">
                <tbody><tr>
                    <td><input type="submit" name="opslaan" value="Save" class="primary-button">&nbsp;&nbsp;<input type="button" name="opslaan" value="Save + send email to patient" id="submit_save_and_send_email">&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel" class="ajax_form_cancel_button"></td>
                    <td align="right">
                        <input type="button" name="delete" value="Delete appointment" class="ajax_load_form_button" style="background: none repeat scroll 0 0 #F36248; border: 1px solid #666666; color: #FFFFFF" data-form_action="delete" data-form_id="event-actions" data-module="scheduler" data-form_target="add_edit_appointment" data-item_id="">
                    </td>
                </tr>
                </tbody></table>
            </form>
            </div></div>                <div class="zoombox_title" style="display: block;"></div>                                                <div class="zoombox_close" style="display: block;"></div>            </div>                    </div> -->
          
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
     
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">
   
  <div id="footer">
                        Copyright © 2018 Pak Dental - <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> - <a href="#" title="Privacy">Privacy</a> - <a href="#" title="Copyright">Copyright</a> - <a href="#" title="Disclaimer">Disclaimer</a> - <a href="#" title="Changelog">Changelog</a>
                        <br><br>
                    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="dist/js/jquery.datatable.min.js"></script>
<script src="dist/js/datatable.responsive.min.js"></script>
<script src="dist/js/actions.js" type="text/javascript"></script>
<script src="dist/js/adnan.js" type="text/javascript"></script>
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
