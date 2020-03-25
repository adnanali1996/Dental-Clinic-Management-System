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

if (isset($opslaan)){
   //Insert Data when 3 input fields are not empty
    if (!empty($cat1_textfield) AND !empty($cat2_textfield) AND !empty($cat3_textfield) AND !empty($price) AND !empty($instructions)) {
        # code...
       
        $sql=mysqli_query($conn, "SELECT * FROM pre_cat WHERE pre_name='$cat1_textfield'");
        $num=mysqli_num_rows($sql);
        if ($num) {
            # code...
             echo "<script type='text/javascript'>alert('Generic Name is Already Exits.');</script>";
        }
        else{
             $sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
             $num1=mysqli_num_rows($sql1);
             if ($num1) {
                 # code...
                 echo "<script type='text/javascript'>alert('Brand Name is Already Exits.');</script>";
             } else {
                 # code...
            mysqli_query($conn, "INSERT INTO pre_cat VALUES('', '$cat1_textfield')");
            $sql2=mysqli_query($conn, "SELECT * FROM pre_cat WHERE pre_name='$cat1_textfield'");
            $result=mysqli_fetch_assoc($sql2);
            $cat_id=$result['cat_id'];
            mysqli_query($conn, "INSERT INTO pre_subcat VALUES('', '$cat2_textfield', '$cat_id')");
            $sql3=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
            $result1=mysqli_fetch_assoc($sql3);
            $sub_id=$result1['sub_id'];
            mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3_textfield', '$price', '$instructions', '$sub_id')");

             }
             
        }


    }
//end Insert Data when 3 input fields are not empty
//Insert Data when categ is seted and remainging both fields are not empty
    if (isset($categ) AND !empty($cat2_textfield) AND !empty($cat3_textfield) AND !empty($price) AND !empty($instructions)) {
        # code...
        
        $sql4=mysqli_query($conn, "SELECT * FROM pre_cat WHERE pre_name='$categ'");
        $result4=mysqli_fetch_assoc($sql4);
        $cat_id=$result4['cat_id'];
        $sqli=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
        $num6=mysqli_num_rows($sqli);
        if($num6) {
            # code...
            echo "<script type='text/javascript'>alert('Brand Name is Already Exits.');</script>";
        }
        else{
        mysqli_query($conn, "INSERT INTO pre_subcat VALUES('', '$cat2_textfield', '$cat_id')");
        $sql5=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
        $result5=mysqli_fetch_assoc($sql5);
        $sub_id=$result5['sub_id'];
        mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3_textfield', '$price', '$instructions', '$sub_id')");
           
        }
      

    } else {
        # code...
    }
//End Insert Data when categ is seted and remainging both fields are not empty
//Insert Data when Quantity is need to stored and category and subcateogyr exits already
if (isset($categ) AND isset($subcat) AND !empty($cat3_textfield) AND !empty($price) AND !empty($instructions)) {
     $sqli=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$subcat'");
     $result=mysqli_fetch_assoc($sqli);
     $sub_id=$result['sub_id'];
     mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3_textfield', '$price', '$instructions', '$sub_id')");
}
//END Insert Data when Quantity is need to stored and category and subcateogyr exits already
	/*
	if (!empty($categ)AND !empty($subcat)AND !empty($cat3)AND !empty($instructions)AND !empty($price)) {
		# code...
		if (!empty($cat3_textfield)) {
			# code...
			$sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$subcat'");
		$res1=mysqli_fetch_assoc($sql1);
		$sub_id=$res1['sub_id'];
		mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3_textfield', '$price', '$instructions', '$sub_id')");
		} 
		
		else {
			# code...
			$sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$subcat'");
		$res1=mysqli_fetch_assoc($sql1);
		$sub_id=$res1['sub_id'];
		mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3', '$price', '$instructions', '$sub_id')");

		}
		
	

	}
	else{
		if (!empty($cat1_textfield) AND !empty($cat2_textfield) AND !empty($cat3_textfield)) {
			# code...

			$sqli=mysqli_query($conn, "SELECT * FROM pre_cat WHERE pre_name='$cat1_textfield'");
			$num=mysqli_num_rows($sqli);

			if (!$num) {
				# code...
				mysqli_query($conn, "INSERT INTO pre_cat VALUES('', '$cat1_textfield')");
			$sql=mysqli_query($conn, "SELECT * FROM pre_cat WHERE pre_name='$cat1_textfield'");
			$result=mysqli_fetch_assoc($sql);
			$cat_id=$result['cat_id'];
			$sql12=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
			$num2=mysqli_num_rows($sql12);
			if (!$num2) {
				# code...
				mysqli_query($conn, "INSERT INTO pre_subcat VALUES('', '$cat2_textfield', '$cat_id')");
			$sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
			$result1=mysqli_fetch_assoc($sql1);
			$sub_id=$result1['sub_id'];
			$sql13=mysqli_query($conn, "SELECT * FROM pre_desc WHERE quantity='$cat3_textfield'");
			$num3=mysqli_num_rows($sql13);
			if (!$num3) {
				# code...
				mysqli_query($conn, "INSERT INTO pre_desc VALUES('', '$cat3_textfield', '$price', '$instructions', '$sub_id')");
			} else {
				# code...
				echo "<script type='text/javascript'>alert('Quantity Is Already Exits.');</script>";
			}
			
			}

			else{
				echo "<script type='text/javascript'>alert('Brand Name Is Already Exits.');</script>";
			}
			}
			else{
				echo "<script type='text/javascript'>alert('Generic Name Is Already Exits.');</script>";

			}
			/*
			mysqli_query($conn, "INSERT INTO pre_subcat VALUES('', '$cat2_textfield', '$cat_id')");
			$sql1=mysqli_query($conn, "SELECT * FROM pre_subcat WHERE sub_name='$cat2_textfield'");
			$result1=mysqli_fetch_assoc($sql1);
			$sub_id=$result1['sub_id'];
			*/

	//	}
		
	//}
	
}

$perpage = 6;



if(isset($_GET['page']) AND $_GET['page']<1){
  $curpage=1;
}

elseif(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
}

else{
  $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$PageSql = "SELECT * FROM `pre_cat`";
$pageres = mysqli_query($conn, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
if ($curpage>$endpage) {
  # code...
  $curpage=$endpage;
  $start = ($curpage * $perpage) - $perpage;
}

$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Prescriptions</title>
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
  
  <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
  <script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript">
            var jquery_1_8_3 = jQuery.noConflict();
            </script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery-ui-1.8.24.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery.ui.touch-punch.min.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/jquery.autocomplete.js"></script>
            <script type="text/javascript" src="https://dentalcharting.com/js/big.min.js?v=5.0.2.1"></script>
            <script type="text/javascript">
            var base_url                = "https://dentalcharting.com";
            var member                  = new Array();
            member["id"]                = 99741;
            member["account_holder_id"] = 99741;
            member["initials"]          = "awais";
            var url_vars                = new Array();
            url_vars["id"]              = "";
            var chart_currency          = "&#36;";

            var config                  = [];
            config["icdas"]             = [];
            config["icdas"]["levels"]   = $.parseJSON('{"1":{"color":"FFFF00","title":"Early stage - Enamel first","description":"First visual change in enamel"},"2":{"color":"FFFF00","title":"Early stage - Enamel distinct","description":"Distinct visual change in enamel"},"3":{"color":"FFAA00","title":"Established - Enamel bdown","description":"Localized enamel breakdown"},"4":{"color":"FFAA00","title":"Established - Dentine shadow","description":"Underlying dentine shadow"},"5":{"color":"FF2222","title":"Severe - Dentine shadow","description":"Distinct cavity with visible dentine"},"6":{"color":"FF2222","title":"Severe - Dentine extensive","description":"Extensive cavity with visible dentine"}}');
            config["cast"]              = [];
            config["cast"]["levels"]    = $.parseJSON('{"3":{"title":"Enamel","description":"Distinct caries-related discoloration in enamel only","score":0.25},"4":{"title":"Dentine discoloration","description":"Internal caries-related discoloration in dentine","score":1},"5":{"title":"Dentine cavitation","description":"Restorable cavity in dentine","score":2},"6":{"title":"Pulp exposure","description":"Pulpally involved cavity","score":4},"7":{"title":"Abscess\/fistula","description":"Caries\/restoration-related swelling or fistula","score":5}}');
        </script>
        <script type="text/javascript">
         


           
            function display_greta(message)
            {
                return '<div style="float: left; width: 100px;"><img src="' + base_url + '/images/dentalcharting-greta.png"></div>'
                        + '<div style="min-width: 200px; margin-left: 60px;">'
                            + '<p class="triangle-border left">'
                                + message
                            + '</p>'
                        + '</div>';
            }
            
            var datepicker_config = {
                                    dateFormat: "yy-mm-dd",
                                    buttonImage: "https://dentalcharting.com/images/icons/month_calendar.png",
                                    buttonImageOnly: true,
                                    buttonText: "Select a date",
                                    showOn: "both"
                                };
        </script>
        <script type="text/javascript" src="https://dentalcharting.com/js/functions.js?v=5.0.2.1"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('#quick_navigate_drop_down').bind("change", function()
            {
                if($(this).find('option:selected').val() != "")
                {
                    $("#quick_navigate_hidden").show();
                }

                else
                {
                    $("#quick_navigate_hidden").hide();
                }
            });

            setInterval('updateClock()', 1000);
            updateClock();


            $('.assistance-button').click(function()
            {
                $('#assistance-bar').slideDown('slow', function() {
                    // Animation complete.
                });
                
                $('html,body').animate({scrollTop: 0}, 'slow');
                
                $('#assistance-bar').find('iframe').each(function(index, value)
                {
                    console.log($(this).attr('data-src'));
                
                    if($(this).attr('data-src') != '') // only do it once per iframe
                        $(this).attr('src', $(this).attr('data-src')).attr('data-src', '');
                });
            });

            $('#assistance-bar-close-button').click(function(event)
            {
                event.preventDefault();

                $('#assistance-bar').slideUp('slow', function() {
                    // Animation complete.
                });
            });


            // Help balloon hover actions
            $('body').delegate('.help-balloon-hover', 'mouseover', function(event)
            {
                var px_from_right = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));

                if(px_from_right < $(this).find('.help-balloon-hover-text').width())
                    $(this).find('.help-balloon-hover-text').css('right', 0);

                $(this).find('.help-balloon-hover-text').show();
            });

            $('body').delegate('.help-balloon-hover', 'mouseout', function(event)
            {
                $(this).find('.help-balloon-hover-text').hide();
            });
            
            
            // No access hover actions
            $('body').delegate('.no-access-hover', 'mouseover', function(event)
            {
                var px_from_right = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
            
                if(px_from_right < $(this).find('.no-access-hover-text').width())
                    $(this).find('.no-access-hover-text').css('right', 0);
            
                $(this).find('.no-access-hover-text').show();
            });

            $('body').delegate('.no-access-hover', 'mouseout', function(event)
            {
                $(this).find('.no-access-hover-text').hide();
            });
            
            
            $('body').delegate('input[type="checkbox"]', 'click', function(e)
            {
                if(this.readOnly)
                    $(this).attr('checked', false);
            });
            
            
            $('.datepicker').datepicker(datepicker_config);
        });
        </script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.silverlight.js"></script>
        <script type="text/javascript" src="https://dentalcharting.com/js/plupload/plupload.flash.js"></script>
        <script type="text/javascript">
        jQuery.fn.outerHTML = function(s) {
            return s
                ? this.before(s).remove()
                : jQuery("<p>").append(this.eq(0).clone()).html();
        };
        
        function getDataAttributes(node)
        {
            var d = {},
                re_dataAttr = /^data\-(.+)$/;

            $.each(node.get(0).attributes, function(index, attr)
            {
                if(re_dataAttr.test(attr.nodeName))
                {
                    var key = attr.nodeName.match(re_dataAttr)[1];
                    d[key] = attr.nodeValue;
                }
            });

            return d;
        }
        
        (function($,undefined)
        {
            '$:nomunge'; // Used by YUI compressor.

            $.fn.serializeObject = function()
            {
                var obj = {};

                $.each( this.serializeArray(), function(i,o)
                {
                    var n = o.name,
                    v = o.value;

                    obj[n] = obj[n] === undefined ? v
                      : $.isArray( obj[n] ) ? obj[n].concat( v )
                      : [ obj[n], v ];
                });

                return obj;
            };
        })(jQuery);

        function is_numeric(mixed_var)
        {
            return (typeof(mixed_var) === 'number' || typeof(mixed_var) === 'string') && mixed_var !== '' && !isNaN(mixed_var);
        }

        function form_input_is_int(input)
        {
            return !isNaN(input)&&parseInt(input)==input;
        }
        
//        var default_zoombox_height = parseInt($(window).height() * 0.85, 10);
//        var default_zoombox_width  = parseInt($(window).width() * 0.85, 10);
        
        var zoombox_options = {
                        theme: 'lightbox',
                        duration: 400,
                        opacity: 0.6
                        /*,
                        width: default_zoombox_width,
                        height: default_zoombox_height
                        */
                    }

        /* Load dynamic forms */
        function ajax_load_form(initiator_element, args)
        {
            var module_base_url = '';
        
            // In plaats van deze 2 ifjes hieronder moet er standaard een lijst met vars geladen worden
            // die dan daarna worden overschreven door de settings die je meestuurd
            if(typeof args === 'undefined')
            {
                var args = {
                                extra_args: {
                                            module: ''
                                        }
                           };
            }
            else if(typeof args.extra_args === 'undefined')
            {
                args.extra_args = {
                                        module: ''
                                    };
            }
            
            if(initiator_element !== null)
            {
                /*
                if(initiator_element.attr('data-form_target') == 'company_logo')
                {
                    $('.assistance-button').css('top', '-14px');
                }
                */
                
                if(initiator_element.attr('data-form_id') == 'edit-form')
                {
                    if(initiator_element.attr('data-form_type') == '')
                    {
                        alert('A form type has to be selected, please specify and try again.');

                        return false;
                    }
                }
                
                if(initiator_element.attr('data-module') == 'scheduler' || args.extra_args.module == 'scheduler')
                {
                    initiator_element.before('<img src="https://dentalcharting.com/images/loading.gif" class="loading" style="width: 21px; height: 21px; margin-bottom: -6px; margin-right: 5px;">');
                }

                else if($('#' + initiator_element.attr('data-form_target')).get(0).tagName == 'tbody')
                {
                    $('#' + initiator_element.attr('data-form_target')).html('<tr>'
                                                                                    + '<td>'
                                                                                        + '<div class="loading" style="margin: 10px">'
                                                                                            + '<img src="https://dentalcharting.com/images/loading.gif">'
                                                                                        + '</div>'
                                                                                    + '</td>'
                                                                                + '</tr>');
                }
                else
                {
                    if(initiator_element.attr('data-form_target') == 'profile_picture')
                    {
                        $('#' + initiator_element.attr('data-form_target')).css({
                        'box-shadow': '1px 1px 3px #333333',
                        '-moz-box-shadow': '1px 1px 3px #333333',
                        '-webkit-box-shadow': '1px 1px 3px #333333',
                        'margin-bottom': '5px',
                        'width': '188px',
                        'min-height': '188px',
                        'background-color': '#FFFFFF'});

                        $('#' + initiator_element.attr('data-form_target')).html('<div class="loading" style="padding: 78px">'
                                                                                        + '<img src="https://dentalcharting.com/images/loading.gif">'
                                                                                    + '</div>');
                    }
                    else
                    {
                        $('#' + initiator_element.attr('data-form_target')).html('<div class="loading" style="padding: 10px">'
                                                                                        + '<img src="https://dentalcharting.com/images/loading.gif">'
                                                                                    + '</div>');
                    }
                }

                var args = {form_id       : initiator_element.attr('data-form_id'),
                            action        : initiator_element.attr('data-form_action'),
                            
                            item_id       : initiator_element.attr('data-item_id'),
                            form_target   : initiator_element.attr('data-form_target'),
                            extra_args    : getDataAttributes(initiator_element)};
                            
                if(initiator_element.attr('data-module') == 'scheduler' || args.extra_args.module == 'scheduler')
                {
                    module_base_url = base_url + '/scheduler';
                }
            }

            if(args.extra_args.module == 'scheduler')
            {
                module_base_url = base_url + '/scheduler';
            }

            if(module_base_url == '')
            {
                module_base_url = base_url + '/dental-treatment/patients';
            }
            
            if(args.form_target.charAt(0) != '#' && args.form_target.charAt(0) != '.')
                args.form_target = '#' + args.form_target;

            $.ajax({
                type: "GET",
                url: module_base_url + "/" + args.form_id + ".php",
                data: 'action=' + args.action + '&patient_id=' + args.patient_id + '&item_id=' + args.item_id + (args.extra_args?'&' + $.param(args.extra_args):''),
                cache: false,
                success: function(msg)
                {
//                    alert(msg);

                    var msg_json,
                        error = false;

                    try
                    {
                        msg_json = $.parseJSON(msg);
                    }

                    catch(e)
                    {
                        error = true;
                    }

                    $('.loading').remove();

                    if(error == false)
                    {
                        if(msg_json.code == 'success')
                        {
                            $(args.form_target).html(msg_json.message);

//                            alert(dump(args));

                            if(args.extra_args.module == 'scheduler')
                            {
                                $.zoombox.close();

//                                alert(msg_json.message.action);

                                if(msg_json.message.action == 'delete')
                                {
//                                    alert(msg_json.message.id);
                                    $('#calendar').fullCalendar('removeEvents', msg_json.message.id);
                                }
                            }

                            else if(args.form_id == 'view-drag-and-drop-form')
                            {
                                if(args.form_target == '#work_done_tab .status_selection_form')
                                    init_status_draggable('.status_draggable', $('#work_done_tab'));
                                else if(args.form_target == '#work_proposed_tab .status_selection_form')
                                    init_status_draggable('.status_draggable', $('#work_proposed_tab'));
                                else if(args.form_target == '#baseline_tab .status_selection_form')
                                    init_status_draggable('.status_draggable', $('#baseline_tab'));
                            }
                            
                            else if(args.form_id == 'edit-document' && (args.action == 'delete' || args.action == 'edit'))
                            {
                                ajax_load_form(null, {form_id       : 'edit-profile-picture',
                                                        action      : 'read',
                                                        
                                                        form_target : 'overview_tab'});                            
                            }
                        }

                        else if(msg_json.code == 'cancel')
                        {
                            $(args.form_target).html(msg_json.message);
                        }

                        else if(msg_json.code == 'error')
                        {
                            $(args.form_target).html(msg_json.message);
                        }

                        else
                        {
                            $(args.form_target).html(msg_json.message);
                        }
                    }

                    else
                        alert('error');
                }
            });
        }

        $(document).ready(function()
        {
            $('body').delegate('.ajax_load_form_button', 'click', function(event)
            {
                event.preventDefault();

                if($(this).attr('data-form_action') == 'delete')
                {
                    if(confirm('Are you sure you want to delete this item?'))
                    {
                        ajax_load_form($(this));
                    }
                }

                else
                {
                    ajax_load_form($(this));
                    
                    if($(this).attr('data-form_id') == 'add-baseline-chart')
                    {
                        if($(this).is('img'))
                        {
                            return false;
                        }
                    }
                }
            });

            $('body').delegate('.ajax_form', 'submit', function(event)
            {
                event.preventDefault();

                if($(this).attr('data-form_id') == 'view-combined-progress-record-chart')
                {
//                    if($(this).find('input[type="checkbox"]:checked').length == 0)
                    if($(this).find('td:not(.chart_view)').find('input[type="checkbox"]:checked').length == 0)
                    {
                        alert('You have to select at least one chart');

                        $(this).find('.last_changed').attr('checked', true);

                        return false;
                    }
                }

                else if($(this).attr('data-form_id') == 'edit-periodontic-chart')
                {
                    var all_values_are_ints = true;

                    $(this).find('.periodontic_chart_input').each(function(index, value)
                    {
                        if(!is_numeric($(this).val()) && $(this).val() != '')
                            all_values_are_ints = false;
                    });

                    if(all_values_are_ints == false)
                    {
                        alert('All values should be numbers between 0 and 9');

                        return false;
                    }

                    var extra_args = $('#work_done .select_charts form').serialize();
                }
                
                var this_var = $(this);

                if($(this).parents('.zoombox_content').length > 0)
                {
                    $(this).find('.add_edit_del_table_buttons .ajax_form_cancel_button').after('<img src="https://dentalcharting.com/images/loading.gif" class="loading" style="width: 21px; height: 21px; margin-bottom: -6px; margin-left: 5px;">');
//                    return false;
                }
                else
                {
                    $('body').prepend('<div class="loading" style="width: 100%; height: 100%; position: fixed; background-color: #000000; opacity: 0.8; z-index: 5000;">'
                                            + '<table width="100%" height="100%">'
                                                    + '<tr>'
                                                        + '<td width="100%" height="100%" align="center" valign="middle">'
                                                            + '<img src="https://dentalcharting.com/images/loading.gif">'
                                                        + '</td>'
                                                    + '</tr>'
                                                + '</table>'
                                        + '</div>');
                }

                /*
                $('#' + $(this).attr('data-form_target')).prepend('<div class="loading" style="width: 100%; height: 100%; position: absolute; background-color: #CCCCCC; opacity: 0.7; z-index: 100; margin-right: 200px">'
                                                                        + '<img src="https://dentalcharting.com/images/loading.gif">'
                                                                    + '</div>');
                */
                
                if($(this).attr('data-module') == 'scheduler')
                {
                    var module_base_url = base_url + '/scheduler';
                }
                else
                {
                    var module_base_url = base_url + '/dental-treatment/patients';
                }
                

                if(this_var.attr('data-form_target').charAt(0) != '#' && this_var.attr('data-form_target').charAt(0) != '.')
                    var form_target = '#' + this_var.attr('data-form_target');
                else
                    var form_target = this_var.attr('data-form_target');
                
                $.ajax({
                    type: "POST",
                    url: module_base_url + "/" + this_var.attr('data-form_id') + ".php",
                    data: this_var.serialize() + (extra_args?'&' + extra_args:''),
                    cache: false,

                    error: function(msg)
                    {
                        
                    },
                    success: function(msg)
                    {
//                        alert(msg);

                        var msg_json,
                            error = false;

//                        console.log(msg);
                        
                        try
                        {
                            msg_json = jquery_1_8_3.parseJSON(msg);
                        }

                        catch(e)
                        {
                            error = true;
                            
                        }

                        $('.loading').remove();

                        if(error == false)
                        {
                            if(msg_json.code == 'success')
                            {
                                $(form_target).html(msg_json.message);

                                if(this_var.attr('data-form_id') == 'edit-patient' || this_var.attr('data-form_id') == 'edit-school-profile' || this_var.attr('data-form_id') == 'edit-medical-history' || this_var.attr('data-form_id') == 'edit-dental-history' || this_var.attr('data-form_id') == 'edit-document')
                                {
                                    ajax_load_form(null, {form_id       : 'edit-profile-picture',
                                                            action      : 'read',
                                                            
                                                            form_target : 'overview_tab'});
                                }
                                else if(this_var.attr('data-form_id') == 'edit-periodontic-chart' || this_var.attr('data-form_action') == 'add')
                                {
                                    var extra_perio_data = {'selected_charts[periodontic_chart]': 'last'};
                                                            
//                                    alert(dump($('#select_progress_charts form').serializeObject()));
//                                    alert(dump(extra_perio_data));
                                                            
                                    ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                            
                                                            form_target : '#work_done_tab .select_charts',
                                                            extra_args  : $.extend(true, $('#work_done_tab .select_charts form').serializeObject(), extra_perio_data)});
                                                            
                                    $('#work_done_tab .select_charts form').submit();
                                }
                                /*
                                else if(this_var.attr('data-form_id') == 'edit-company-logo')
                                {
                                    var header_div_height = 100;
                                    var header_logo_container_div_height = 30;
                                    var assistance_button_top = -14;

                                    if(msg_json.json_message.company_logo_size == 'big')
                                    {
                                        header_div_height += 36;
                                        header_logo_container_div_height += 36;
                                        assistance_button_top -= 18;
                                    }
                                    else if(msg_json.json_message.company_logo_size == 'biggest')
                                    {
                                        header_div_height += 72;
                                        header_logo_container_div_height += 72;
                                        assistance_button_top -= 36;
                                    }
                                    
                                    $('#header').css('height', header_div_height + 'px');
                                    $('#header_logo_container').css('height', header_logo_container_div_height + 'px');
                                    $('.assistance-button').css('top', assistance_button_top + 'px');
                                }
                                */
                                else if(this_var.attr('data-module') == 'scheduler')
                                {
                                    $.zoombox.close();
                                    
                                    if(this_var.attr('data-form_id') == 'manage-locations')
                                    {
                                        location.reload(true);
                                    }
                                    else
                                    {
//                                        alert(msg_json.message.action);

                                        if(msg_json.message.action == 'add')
                                        {
                                            /*
                                            $('#calendar').fullCalendar('renderEvent',
                                                {
                                                    id: msg_json.message.id,
                                                    title: msg_json.message.title,
                                                    start: msg_json.message.start,
                                                    end: msg_json.message.end,
                                                    allDay: msg_json.message.allDay,
                                                    resourceId: msg_json.message.resourceId
                                                },
                                               false // make the event "stick", or not..
                                            );

                                            $('#calendar').fullCalendar('unselect');
                                            */

                                            $('#calendar').fullCalendar('refetchEvents');
                                        }
                                
                                        else if(msg_json.message.action == 'edit')
                                        {
                                            /* Not working for some reason...
                                            var event = $('#calendar').fullCalendar('clientEvents', msg_json.message.id);

                                            alert(dump(event));

                                            event[0].title  = msg_json.message.title;
                                            event[0].start  = msg_json.message.start;
                                            event[0].end    = msg_json.message.end;
//                                            event[0].allDay = msg_json.message.allDay;

                                            $('#calendar').fullCalendar('updateEvent', event);
                                            */

                                            $('#calendar').fullCalendar('refetchEvents');
                                        }
                                    }
                                }
                            }

                            else if(msg_json.code == 'post-success')
                            {
                                if(this_var.attr('data-form_id') == 'add-chart')
                                {
                                    var currentTime = new Date();
                                    currentTime.setUTCMinutes(currentTime.getUTCMinutes());

                                    var currentYear = currentTime.getFullYear();
                                    var currentMonth = currentTime.getMonth() + 1;
                                    var currentDate = currentTime.getDate();

                                    if(currentMonth < 10)
                                        currentMonth = '0' + currentMonth;
                                        
                                    if(currentDate < 10)
                                        currentDate = '0' + currentDate;
                                
                                    var $form_target        = $(form_target);
                                    var $form_parent        = $form_target.parents('.tab_group_tab_content');
                                    var form_parent_id      = $form_parent.attr('id');
                                    var form_parent_name    = form_parent_id.replace('_tab', '');
                                    var $add_chart_button   = $form_parent.find('#add_progress_chart_button');

                                    $form_target.html('');

//                                    $('#progress_chart_legend').show();

                                    $form_parent.find('.last_chart').html(msg_json.message).css('float', 'left');

                                    var chart_type = this_var.find('input[name="chart_kind"]:checked').val();
                                    var chart_id = $form_parent.find('.last_chart').find('.dental_chart_table').attr('data-chart_id');

                                    $form_parent.find('.last_progress_chart_header').attr('id', 'chart_id_' + chart_id).html('<span class="icon">- </span>Chart ' + currentYear + '-' + currentMonth + '-' + currentDate + ' - ...');

                                    /*
                                    if($('#print-collapsed-charts').length == 0 && chart_type == 'adult')
                                    {
                                        $add_chart_button.parent().append(' <input type="button" value="Print collapsed adult charts" name="Print collapsed charts" id="print-collapsed-charts">');
                                    }
                                    */
                                    
                                    if($form_parent.attr('id') == 'work_done_tab')
                                    {
                                        // Add periodontal chart button
                                        if($add_chart_button.parent().find('.periodontic_chart_add').length == 0)
                                            $add_chart_button.after('&nbsp;<input type="button"  value="Add periodontal chart"  class="periodontic_chart_add">');
                                    }
                                    
                                    if($form_parent.find('.print-selected-charts').length == 0)
                                    {
                                        $add_chart_button.parent().append(' <input type="button" value="Print selected charts" name="Print selected charts" class="print-selected-charts">');
                                    }
                                    
                                    // Show chart selection form
                                    ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                            
                                                            form_target : form_parent_id + ' .select_charts',
                                                            extra_args  : {record_type  :   form_parent_name}});
                                                            
                                    if(form_parent_name == 'work_done' && $('#work_proposed_tab .select_charts form').length > 0)
                                    {
                                        ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                                
                                                                form_target : '#work_proposed_tab .select_charts',
                                                                extra_args  : $('#work_proposed_tab .select_charts form').serializeObject()});
                                    }

                                    if(form_parent_name == 'work_proposed' && $('#work_done_tab .select_charts form').length > 0)
                                    {
                                        ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                                
                                                                form_target : '#work_done_tab .select_charts',
                                                                extra_args  : $('#work_done_tab .select_charts form').serializeObject()});
                                    }
                                                            
                                                            
                                    /*
                                    ,extra_args  : $('.select_charts form').serializeObject()
                                    */
                                    
                                    if($form_parent.find('.status_drag_container').length == 0)
                                    {
                                        // Show drag and drop
                                        ajax_load_form(null, {form_id       : 'view-drag-and-drop-form',
                                                                
                                                                form_target : form_parent_id + ' .status_selection_form',
                                                                extra_args  : {record_type  :   form_parent_name}});
                                    }

                                    $form_parent.find('.record-actions').show();
                                    $form_parent.find('.record-error-message').hide();

                                    if($add_chart_button.parent().find('.add-dental-record').length == 0)
                                    {
                                        if($form_parent.attr('id') == 'work_proposed_tab')
                                            $add_chart_button.removeClass('primary-button').before('<input type="button" class="primary-button add-dental-record add-work-proposed-record" value="+ Add line" name="Add-dental-record" data-chart_type="' + chart_type + '" data-chart_id="' + chart_id + '">&nbsp;');
                                        else
                                            $add_chart_button.removeClass('primary-button').before('<input type="button" class="primary-button add-dental-record add-dental-progress-record" value="+ Add line" name="Add-dental-record" data-chart_type="' + chart_type + '" data-chart_id="' + chart_id + '">&nbsp;');
                                    }
                                    else
                                        $add_chart_button.parent().find('.add-dental-record').attr('data-chart_type', chart_type).attr('data-chart_id', chart_id);

//                                    alert($('#dental_progress_record>.table_header').length);

                                    if($form_parent.find('.work_record .table_header').first().find('.add-dental-record').length == 0)
                                    {
                                        $form_parent.find('.work_record .table_header').first().append('<span style="float: right;">'
                                                                                                            + '<img src="' + base_url + '/images/add.png" alt="Add dental progress record" border="0" class="add-dental-record" data-chart_type="' + chart_type + '" data-chart_id="' + chart_id + '">'
                                                                                                        + '</span>');
                                    }
                                    
                                    $form_parent.find('.work_record').find('.record-actions').find('.add-dental-record')
                                        .attr('data-chart_type', chart_type)
                                        .attr('data-chart_id', chart_id);
                                        
                                    // To refresh the patient summary
                                    ajax_load_form(null, {form_id       : 'edit-profile-picture',
                                                            action      : 'read',
                                                            
                                                            form_target : 'overview_tab'});
                                }
                                else if(this_var.attr('data-form_id') == 'add-baseline-chart')
                                {
                                    $(form_target).html('');

                                    $('#baseline_chart_legend').show();

                                    $('#last_baseline_chart').html(msg_json.message).css('float', 'left');

                                    var chart_type = this_var.find('input[name="chart_kind"]:checked').val();
                                    var chart_id = $('#baseline_chart').find('.dental_chart_table').attr('data-chart_id');
                                    
                                    if($('#work_proposed_tab .select_charts form').length > 0)
                                    {
                                        ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                                
                                                                form_target : '#work_proposed_tab .select_charts',
                                                                extra_args  : $('#work_proposed_tab .select_charts form').serializeObject()});
                                    }
                                    
                                    if($('#work_done_tab .select_charts form').length > 0)
                                    {
                                        ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                                
                                                                form_target : '#work_done_tab .select_charts',
                                                                extra_args  : $('#work_done_tab .select_charts form').serializeObject()});
                                    }
                                    
                                    ajax_load_form(null, {form_id       : 'view-chart-selection-form',
                                                            
                                                            form_target : 'baseline_tab .select_charts',
                                                            extra_args  : {record_type: 'baseline'}});
                                    
                                    if($('#baseline_dental_record').find('.status_drag_container').length == 0)
                                    {
                                        // Show drag and drop
                                        ajax_load_form(null, {form_id       : 'view-drag-and-drop-form',
                                                                
                                                                form_target : 'baseline_tab .status_selection_form',
                                                                extra_args  : {record_type  :   'baseline_record'}});
                                    }

                                    $('#baseline_dental_record').find('.record-actions').show();
                                    $('#baseline_dental_record').find('.record-error-message').hide();
                                    
                                    $('#baseline_chart .table_header span .ajax_load_form_button').remove();
//                                    $('#baseline_chart').find('.add_edit_del_table_buttons').parent().remove();
                                    $('#baseline_chart').find('.add_edit_del_table_buttons').empty().append('<input type="button" class="primary-button add-baseline-dental-record" value="+ Add line" name="Add-baseline-dental-record" data-chart_type="' + chart_type + '" data-chart_id="' + chart_id + '">');

                                    $('#baseline_dental_record .table_header').first().append('<span style="float: right;">'
                                                                                                    + '<img src="' + base_url + '/images/add.png" alt="Add baseline dental record" border="0" class="add-baseline-dental-record" data-chart_type="' + chart_type + '" data-chart_id="' + chart_id + '">'
                                                                                                + '</span>');

                                    $('#baseline_dental_record').find('.record-actions').find('.add-baseline-dental-record')
                                        .attr('data-chart_type', chart_type)
                                        .attr('data-chart_id', $('#last_baseline_chart').find('.dental_chart_table').attr('data-chart_id'));
                                        
                                    $('#baseline_chart').find('tbody').first().show();
                                    $('#baseline_dental_record').find('tbody').show();
                                    
                                    // To refresh the patient summary
                                    ajax_load_form(null, {form_id       : 'edit-profile-picture',
                                                            action      : 'read',
                                                            
                                                            form_target : 'overview_tab'});
                                }
                            }

                            else if(msg_json.code == 'cancel')
                            {
                                $(form_target).html(msg_json.message);
                            }

                            else if(msg_json.code == 'error')
                            {
                                $(form_target).html(msg_json.message);
                            }

                            else
                            {
                                $(form_target).html(msg_json.message);
                            }
                        }
                        else
                        {
                            alert('error');
                        }
                    }
                });
            });


            $('body').delegate('.ajax_form_cancel_button', 'click', function(event)
            {
                if($(this).parents('.zoombox_content').length > 0)
                {
                    $.zoombox.close();
                }
                else
                {
                    $(this).parents('form').find('.ajax_form_action').val('cancel');
                    $(this).parents('form').submit();
                }
            });
            
            $('body').delegate('.ajax_toggle_create_next_element', 'click', function(event)
            {
                event.preventDefault();
            
                var this_var        = $(this),
                    unique_class    = $(this).attr('data-unique_class');
            
                if($(this).attr('data-use_parents') == 'true' && typeof $(this).attr('data-element_type') !== 'undefined')
                {
                    var element_before_new_element = $(this).parents($(this).attr('data-element_type'));
                }
                else
                {
                    var element_before_new_element = $(this);
                }
                
                if($('.' + unique_class).length > 0)
                {
                    $('.' + unique_class).toggle();
                    
                    if($('.' + unique_class).is(':visible'))
                        this_var.html(this_var.html().replace('Show', 'Hide'));
                    else
                        this_var.html(this_var.html().replace('Hide', 'Show'));

                    if($('.' + unique_class).is(':visible'))
                        this_var.html(this_var.html().replace('add.png', 'hide.png'));
                    else
                        this_var.html(this_var.html().replace('hide.png', 'add.png'));
                }
                else
                {
                    $(this).append('<img src="' + base_url + '/images/loading.gif" class="loading" style="position: absolute; width: 17px; height: 17px; margin: 1px 0 0 5px;">');

                    if($(typeof $(this).attr('data-component') !== 'undefined'))
                        var url = $(this).attr('data-component') + '/' + $(this).attr('data-form_id');
                    else
                        var url = $(this).attr('data-form_id');

                    $.ajax({
                        type: 'GET',
                        url: base_url + '/' + url + '.php',
                        data: getDataAttributes(this_var),
                        cache: false,
                        success: function(msg)
                        {
//                            alert(msg);

                            var msg_json,
                                error = false;

                            try
                            {
                                msg_json = $.parseJSON(msg);
                            }

                            catch(e)
                            {
                                error = true;
                            }
                            
                            this_var.find('.loading').remove();

                            if(error == false)
                            {
                                if(msg_json.code == 'success')
                                {
                                    element_before_new_element.after(msg_json.message);

                                    this_var.html(this_var.html().replace('Show', 'Hide'));
                                    
                                    this_var.html(this_var.html().replace('add.png', 'hide.png'));
                                }

                                else if(msg_json.code == 'cancel')
                                {
                                    alert('cancel');
                                }

                                else if(msg_json.code == 'error')
                                {
                                    alert('error');
                                }

                                else
                                {
                                    alert('error');
                                }
                            }

                            else
                                alert('error');
                        }
                    });
                }
            });
            
            $('body').delegate('.help-hover', 'mouseover', function(event){
                $(this).find('.help-hover-text').show();
            });
            
            $('body').delegate('.help-hover', 'mouseout', function(event){
                $(this).find('.help-hover-text').hide();
            });
        });
        </script>
        <script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2007848-37']);
	_gaq.push(['_setDomainName', 'dentalcharting.com']);
	_gaq.push(['_trackPageview']);
	_gaq.push(['dashboard._setAccount', 'UA-2007848-40']);
	_gaq.push(['dashboard._trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>
        
  
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
            <h1>  Prescriptions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">  Prescriptions</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-12 ">
         <div class="add-maintain">
        	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				+ Add prescription
			  </button>
				<div class="collapse" id="collapseExample">
				  <div class="card">
					 <div class="Procedures-form">
				   <form method="post" action="" id="uniquehs">
							<table border="0" width="100%" class="add_edit_del_table">
								<tbody><tr>
									<td class="table_subheader" colspan="3">Add prescription: 
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<div class="info_message" style="    padding: 10px;">In order to add a prescription you have to construct it in Step 1:<br>
			- First specify a generic name or create a new generic name which the new prescription should be under<br>
			 - Then further specify in at least one of the 2nd or 3rd columns with existing items or create new items<br>
			- Then fill in the instructions and price</div>
									</td>
								</tr>
								<tr>
									<td class="table_subheader" colspan="2">
										Step 1) Construct prescription
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<table border="0" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td class="table_content" width="235px"><b>Generic name<span class="mandatory_field">*</span></b></td>
												<td class="table_content" id="cat2_title" width="235px"><b>Brand name<span class="cat2_sub_name">...</span> <span class="mandatory_field">*</span></b></td>
												<td class="table_content" id="cat3_title" width="235px"><b>Quantity<span class="cat3_sub_name">...</span></b></td>
											</tr>
											<tr>
												<td class="table_content">
													<select name="categ" id="categ" size="18" style="width:235px; height:250px">
														<?php
														require("conn.php");
														$q=mysqli_query($conn, "SELECT * FROM pre_cat");
														while ($row=mysqli_fetch_assoc($q)) {
															# code...
															echo'<option>'.$row['pre_name'].'</option>';
														}

														?>

														
														
													</select>
												</td>
												<td class="table_content" valign="top">
													<div id="loading" style="position: absolute; margin-left: -16px; margin-top: 0px;">
														<select name="subcat" id="subcategory" size="18" style="width:235px; height:250px;" ></select>
													</div>
														
															
															
														
												</td>
												<?php?>
												<td class="table_content" valign="top">
													<div id="cat3_loading" style="position: absolute; margin-left: 76px; margin-top: 109px; "></div>
														<select name="cat3" id="cat3" size="18" style="width:235px; height:250px;">
														</select>
												</td>
											</tr>
											<tr>
												<td class="table_content" style="padding-top: 3px;"><span id="cat1_textfield_title" style="color: #000000">If generic name is not on the list, create it here:</span><input type="text" name="cat1_textfield" id="cat1_textfield" style="width: 230px;">
												</td>
												<td class="table_content" style="padding-top: 3px;"><span id="cat2_textfield_title" style="color: #666666">If brand of<span class="cat2_sub_name">...</span> not on the list, create it here:</span><input type="text" name="cat2_textfield" value="" id="cat2_textfield" style="width: 230px;" >
												</td>
												<td class="table_content" style="padding-top: 3px;"><span id="cat3_textfield_title" style="color: #666666">If desired quantity of<span class="cat3_sub_name">...</span> not on the list, create it here:</span><input type="text" name="cat3_textfield" value="" id="cat3_textfield" style="width: 230px;" ></td>
											</tr>
										</tbody></table>
									</td>
								</tr>

								<tr>
									<td class="table_content" colspan="2">&nbsp;</td>
								</tr>

								<tr>
									<td class="table_content" width="120px"><b>Prescription</b>:</td>
									<td class="table_content" id="total_string">
									</td>
								</tr>

								<tr>
									<td class="table_content" style="vertical-align: top;"><b>Instruction</b>:</td>
									<td class="table_content" style="vertical-align: top;">
										<textarea id="description" name="instructions" style="width: 300px; height: 75px;"></textarea>
									</td>
								</tr>
								<tr>
									<td class="table_content"><b>Price in $</b></td>
									<td class="table_content"><input type="text" name="price" value="0.00" style="width: 80px"></td>
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
      <div class="col-md-12 ">
        <div class="card card-num">
            <table id="example10" class="display responsive nowrap" style="width:100%">
             <?php
             require("conn.php");
             $q=mysqli_query($conn,"SELECT * FROM pre_cat order by pre_name LIMIT $start, $perpage");
             while ($row=mysqli_fetch_assoc($q)) {
             	# code...
             	 echo '<thead class="data-table">
                <tr>
                  <th> '.$row['pre_name'].'</th>
                  <th> Price In Rs</th>
                  <th> Instructions</th>
                  <th>Action</th>
                </tr>
              </thead>';
             	$id=$row['cat_id'];
             	 $q1=mysqli_query($conn,"SELECT * FROM pre_subcat WHERE cat_id='$id'");
             while ($row1=mysqli_fetch_assoc($q1)) {
             	$id1=$row1['sub_id'];
             	echo '<tr>
                  <th> '.$row1['sub_name'].'</th>
                
                </tr>';
             	 $q2=mysqli_query($conn,"SELECT * FROM pre_desc WHERE sub_id='$id1'");
             while ($row2=mysqli_fetch_assoc($q2)) {
             	
               echo'
             <tr>
             <td>'.$row2['quantity'].'</td><td>'.$row2['price'].'</td><td>'.$row2['instruction'].'</td><td>&nbsp;&nbsp;<a href="delpresc.php?id='.$row2['desc_id'].'"><img src="del.gif"></a></td></tr>';
             }
             	
             }
             	 
             }
             
              ?>
            </table>
            <nav aria-label="Page navigation">
  <ul class="pagination">
  <?php if($curpage != $startpage){ ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($curpage >= 2){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
    <?php if($curpage != $endpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
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
<script src="dist/js/prescription.js"></script>

<script>
   $(document).ready(function() {
    $('#example').DataTable();
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
