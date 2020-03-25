<?php
session_start();
ob_start();

if (!isset($_SESSION['admin']) AND !isset($_SESSION['dentist'])) {
  # code...
  header('location:../index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage my account</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
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
            <h1> Manage my account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage my account</li>
            </ol>
          </div>
        </div>
      </div>
      
      <!-- /.container-fluid -->
             <div class="alert alert-info alert-dismissible">
                 
                  <h5><i class="icon fa fa-info"></i>On this page you may:</h5>
                
                - review, renew or change your clinic's subscription which is managed by you as the account holder<br>
                
                - review and edit your clinics information (the clinic's contact information will show in the headers of the printed invoices and prescriptions) <br>
                
                - review and change your password <br>
                
                - review and edit your users account information <br>
                
                - generate new passwords for your users (in case they forgot their password)<br>
                                - add and delete users<br>
                </div>
               

   
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                
                </thead>
                <tbody>
                
              
                
                </tbody>
              </table>
            </div>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr class="country">
                  <th>

Clinics</th>
             <th></th>
              
                
                   
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Clinic name</td>
                  <td>Action
                   
                  </td>
                  
                      
                </tr>
                <?php
                require("conn.php");
                $sql=mysqli_query($conn, "SELECT * FROM clanic");
                while ($row=mysqli_fetch_assoc($sql)) {
                  # code...
                  echo ' <tr>
          <td><i class="icon fa fa-building-o"></i> '.$row['clanic_name'].'</td>
                  <td><a href="edit_clanic.php?id='.$row['id'].'"><i class="icon fa fa-pencil"></i></a> 
                  
                  </td>
                 
                  
                      
                </tr>';
               // <a href="delete_clanic.php?id='.$row['id'].'"> <span class="fa fa-remove" style="color:red;"></span></a>
                }
                ?>
               
                <thead>
                <tr class="country">
                  <th><a href="add_clanic.php"></a>&nbsp; &nbsp;<button type="button" class="btn btn-default button-invoice reniew-sub"><a href="add_clanic.php">Add clinic</a></button></th>


             <th></th>
              
                
                   
                </tr>
                </thead>
                </tbody>
              </table>
            </div>
            <div class="alert alert-info alert-dismissible">
                 
                  <h5><i class="icon fa fa-info"></i>Manage your Dentists</h5>
                
               DentalCharting allows multiple Dentists.<br>
                
               
        To add a Dentist to access your clinic's data click on the<b> "Add Dentists"</b> button and fill out the form.
                
               
                </div>
                <div class="card card-num">
            
            <!-- /.card-header -->
            <table id="example1" class="display responsive nowrap" style="width:100%">
        <thead class="data-table">
            <tr>
            <th>
Dentists</th>
   <th>
</th>
    
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Clinics</td>
                    <td>User group</td>  
                    <td>Action</td>
                    <td></td>
                </tr>
            
              <?php

              $sql=mysqli_query($conn, "SELECT * FROM user");
              while ($row=mysqli_fetch_assoc($sql)
              ) {
                # code...
                $id=$row['user_id'];
                $clinic="";
                $my=mysqli_query($conn, "SELECT * FROM `clanic` INNER join clanic_doctor on clanic.id=clanic_doctor.id WHERE clanic_doctor.user_id= '$id'");
                while ($row3=mysqli_fetch_assoc($my)) {
                  # code...
                  $clinic.=$row3['clanic_name'].'<br>';
                }
                echo '<tr> <td><i class="icon fa fa-user">&nbsp;'.$row['user_id'].'</i></td>
                  <td>'.$row['u_name'].'</td>
                 <td> '.$clinic.'</td>
                  <td>'.$row['user_group'].'</td>
                  <td>&nbsp;&nbsp; &nbsp;<i class="icon fa fa-lock">&nbsp; <a href="password_reset.php?id='.$row['user_id'].'">Send a new password</a><br>
                  </i>&nbsp; &nbsp; <i> This is you, you can change your personal details here.</i></td>
              <td> <a href="delete_clanic.php?id='.$row['user_id'].'"> <img src="del.gif"></a></td>
                </tr>';
              }
              ?>
         
              </tbody>
              <tr class="country">
                <td><button type="button" class="btn btn-default button-invoice reniew-sub"><a href="add_user.php">Add User</a></button></td>
              </tr>
    </table>
            <!-- /.card-body -->
            
          </div>
                
                
    </section>

    <!-- Main content -->
    
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
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script>
   $(document).ready(function() {
    $('#example').DataTable();
      $('#example1').DataTable();
} );
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

