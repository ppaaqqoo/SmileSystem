<?php
include_once './model/database.php';
if (!isset($_SESSION['seguridad'])){
	header("Location: index.php");
}

//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo'])) {
	//Tiempo en segundos para dar vida a la sesión.
	$inactivo = 21900;// 60 segundos * 10 = 600 segundos == 10 minutos en este caso.

	//Calculamos tiempo de vida inactivo.
	$vida_session = time() - $_SESSION['tiempo'];

	//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
	if($vida_session > $inactivo){
		//Removemos sesión.
		session_unset();
		//Destruimos sesión.
		session_destroy(); 
		echo  "<script type='text/javascript'> alert('Sesion cerrada por inactividad'); </script>";
		echo  "<script type='text/javascript'> window.location='./'; </script>";
		exit();
	 } else {  // si no ha caducado la sesion, actualizamos
	  $_SESSION['tiempo'] = time();
	}
  } else {
	//Activamos sesion tiempo.
	$_SESSION['tiempo'] = time();
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo2.png" />
	<link href="assets/plugins/wizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<link href="assets/css/mini-event-calendar.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/mini-event-calendar.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
	<link href="assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
	<link href="assets/plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
	<!--link href="assets/css/select2.css" rel="stylesheet"-->
	<link href="assets/plugins/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
	<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
	<link href="assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
	<link href="assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
	<link href="assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
	<link href="assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/plugins/file-uploader/css/blueimp-gallery.min.css">
	<link rel="stylesheet" href="assets/plugins/file-uploader/css/jquery.fileupload.css">
	<link rel="stylesheet" href="assets/plugins/file-uploader/css/jquery.fileupload-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.css">

	<!--Estilos de los input type="file" -->
	<link rel="shortcut icon" href="assets/favicon.ico">
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/component.css" />


	<!--Estilos Para radio buton y switch -->
	<link href="assets/plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/icheck.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">

	<!--Wizard  -->
	<link href="assets/plugins/wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
	<!-- Optional SmartWizard theme -->
	<link href="assets/plugins/wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
	<!-- Optional SmartWizard theme -->
	<link href="assets/plugins/wizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

	<!--Estadisticas -->
	<link href="assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/kalendar/kalendar.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/plugins/scroll/nanoscroller.css">
	<link href="assets/plugins/morris/morris.css" rel="stylesheet" />
</head>

<style type="text/css">
.disabled {
  pointer-events:none; /*This makes it not clickable*/
  opacity:0.6;         /*This grays it out to look disabled*/
}
.lblheader{
  color:#2196F3;
}
#input-sm {
  height: 30px;
  padding: 2px 5px;
  font-size: 12px;
  line-height: 1.5; /* If Placeholder of the input is moved up, rem/modify this. */
  border-radius: 3px;
}
</style>
<body class="light_theme  fixed_header left_nav_fixed" style="background-color: #EEEEEE">
<div class="wrapper">
<!--\\\\\\\ wrapper Start \\\\\\-->
<div class="header_bar"> <!--\\\\\\\ header Start \\\\\\-->
  	<div class="brand"> <!--\\\\\\\ brand Start \\\\\\-->
		<!--div class="logo" style="display:block"><h2 style="margin-top: -5px;"><span class="theme_color">INSEZAC</span></h2></div-->
		<div style="display:block;" class="center">
			<img width="90%" src="assets/images/logo.jpg">
		</div>
  	</div> <!--\\\\\\\ brand end \\\\\\-->
  	<div class="header_top_bar">
	<!--\\\\\\\ header top bar start \\\\\\-->
		<a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
		<div class="top_left_bar">
	  		<h1>SmileSystem</h1>
		</div>
		<div class="top_right_bar">
	  		<div style="margin-top: -33%;">
				<div style="font-size:1.2em;"><i class="fa fa-user" aria-hidden="true"></i>
					<span class="user_adminname">Hola  <?php echo $_SESSION['usuario']; ?></span>
		  			<span class="user_adminname"><a href="?c=login&a=logout"><i class="fa fa-power-off"></i> Salir</span></a>
				</div>
	  		</div>
		</div>
  	</div>
  	<!--\\\\\\\ header top bar end \\\\\\-->
</div>
<!--\\\\\\\ header end \\\\\\-->
<div class="inner">
<!--\\\\\\\ inner start \\\\\\-->
  	<div class="left_nav">
		<!--\\\\\\\left_nav start \\\\\\-->
		<br>
		<div class="left_nav_slidebar">
	  		<ul>
				<li <?php if($page == "body.php"){echo 'class="left_nav_active theme_border theme_color"';}else{echo 'class="theme_color"';} ?> >
					<a href="?c=inicio"  style="font-size: 20px;"> Inicio <span class="plus"></span></a>
				</li>
				<li <?php if($page == "view/agenda/index.php"){echo 'class="left_nav_active theme_border theme_color"';}else{echo 'class="theme_color"';} ?> >
					<a href="?c=agenda"  style="font-size: 20px;"> Agenda <span class="plus"></span></a>
				</li>

				<li <?php if($page == "view/paciente/index.php"){echo 'class="left_nav_active theme_border theme_color"';}else{echo 'class="theme_color"';} ?> >
					<a href="?c=paciente"  style="font-size: 20px;"> Pacientes <span class="plus"></span></a>
				</li>
		  </div>
		</div>
	  </div>
	  <!--\\\\\\\left_nav end \\\\\\-->
	  <div class="contentpanel">
		<!--\\\\\\\ contentpanel start\\\\\\-->

		<?php include($page); ?>

	  </div>
	  <!--\\\\\\\ content panel end \\\\\\-->
	</div>
	<!--\\\\\\\ inner end\\\\\\-->
  </div>

  <!--\\\\\\\ wrapper end\\\\\\-->
	</body>



<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>

	     $(function(){
	        $("input[name='file']").on("change", function(){
	            var formData = new FormData($("#uploadimage")[0]);
	            var ruta = "?c=paciente&a=Upload";
	            $.ajax({
	                url: ruta,
	                type: "POST",
	                data: formData,
	                contentType: false,
	                processData: false,
	                success: function(datos)
	                {
	                    $("#respuesta").html(datos);
	                }
	            });
	        });
	     });

		eliminarTx = function(idTx){
	        $('#txtIdTx').val(idTx);
	        console.log(idTx);
	    };

	    eliminarPago = function(idPago){
		    $('#txtIdPago').val(idPago);
		    console.log(idPago);
	  	};

	     $('#uploadOdontograma').submit(function() {
		    $.ajax({
		        type: 'POST',
		        url: $(this).attr('action'),
		        data: $(this).serialize(),
		        success: function(respuesta) {
		          	console.log(respuesta);
		          	if(respuesta == "ok"){
		             	$('#div-error2').html('<div class="alert alert alert-success fade in"><i class="fa fa-check"></i>' + respuesta + '</div>');
		          	}else{
		            	$('#div-error2').html('<div class="alert alert alert-success fade in"><i class="fa fa-check"></i>' + respuesta + '</div>');
		         	}
		       	}
		     })      
		      return false;
		 }); 

	</script>


	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	<script src="assets/js/custom-file-input.js"></script>
	<script src="assets/js/disableCheckbox.js"></script> <!-- Deshabilita los checkbox en el Odontograma -->
	<script src="assets/js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="assets/plugins/wizard/js/jquery.smartWizard.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/common-script.js"></script>
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript"  src="assets/plugins/toggle-switch/toggles.min.js"></script>
	<script src="assets/plugins/checkbox/zepto.js"></script>
	<script src="assets/plugins/checkbox/icheck.js"></script>
	<script src="assets/js/icheck-init.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<!--script type="text/javascript" src="assets/js/form-components.js"></script-->
	<script type="text/javascript"  src="assets/plugins/input-mask/jquery.inputmask.min.js"></script>
	<script type="text/javascript"  src="assets/plugins/input-mask/demo-mask.js"></script>
	<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript"  src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<script type="text/javascript"  src="assets/plugins/dropzone/dropzone.min.js"></script>
	<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="assets/js/jPushMenu.js"></script>
	<script src="assets/plugins/validation/parsley.min.js"></script>
	<script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script src="assets/plugins/data-tables/DT_bootstrap.js"></script>
	<script src="assets/plugins/data-tables/dynamic_table_init.js"></script>
	<script src="assets/plugins/edit-table/edit-table.js"></script>
	<script src="assets/plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script>
	<script src="assets/plugins/file-uploader/js/jquery.iframe-transport.js"></script>
	<script src="assets/plugins/file-uploader/js/jquery.fileupload.js"></script>
	<script src="assets/plugins/validation/parsley.min.js"></script>
	<script src="assets/plugins/select2/dist/js/select2.full.min.js"></script>
	<!-- Include SmartWizard JavaScript source -->
	<!-- Include jQuery Validator plugin -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script src="assets/js/jquery.sparkline.js"></script>
	<script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/graph.js"></script>
	<script src="assets/js/edit-graph.js"></script>
	<script src="assets/plugins/kalendar/kalendar.js" type="text/javascript"></script>
	<script src="assets/plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
	<script src="assets/plugins/sparkline/jquery.customSelect.min.js" ></script> 
	<script src="assets/plugins/sparkline/sparkline-chart.js"></script> 
	<script src="assets/plugins/morris/morris.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/morris/raphael-min.js" type="text/javascript"></script>  
	<!--script src="assets/plugins/morris/morris-script.js"></script--> 
	<!--script src="assets/plugins/demo-slider/demo-slider.js"></script-->
	<script src="assets/plugins/knob/jquery.knob.min.js"></script> 
	<script src="js/jPushMenu.js"></script> 
	<script src="js/side-chats.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<script src="plugins/scroll/jquery.nanoscroller.js"></script>
	<script src="assets/js/mini-event-calendar.min.js"></script>
	<script src="assets/js/clock-1.1.0.min.js"></script>




	<script type="text/javascript">
		//---------SCRIPT PARA CARGAR INPUT TYPE FILE---------------
		$(function() {
		// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function() {
		  var input = $(this),
		  numFiles = input.get(0).files ? input.get(0).files.length : 1,
		  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  input.trigger('fileselect', [numFiles, label]);
		});

		  // We can watch for our custom `fileselect` event like this
		  $(document).ready( function() {
			$(':file').on('fileselect', function(event, numFiles, label) {

			  var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

			  if( input.length ) {
				input.val(log);
			  } else {
				var a =0;
			  }

			});
		  });
		});
	  </script>

	  <script>
    $("#calendar").MEC();
    var clock = $("#clock").clock(),
        data = clock.data('clock');
    var d = new Date();
    d.setHours(9);
    d.setMinutes(51);
    d.setSeconds(20);

    var clock1 = $("#clock1").clock({
        theme: 't2',
        date: d
    });
</script>

<!--Calendario-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  var myEvents = [{
      title: "Event Title 1",
      <a href="https://www.jqueryscript.net/time-clock/">date</a>: 1519806678259, // unix timestamp
      link: "jqueryscript.net" // event link
    },{
</script>

	  <script type="text/javascript">
			//-----------SCRIPT BOTONES PARA CERRAR VENTANITAS------------------

			$('.minimize').click(function(e){
			  var h = $(this).parents(".header");
			  var c = h.next('.porlets-content');
			  var p = h.parent();

			  c.slideToggle();

			  p.toggleClass('closed');

			  e.preventDefault();
			});

			$('.refresh').click(function(e){
			  var h = $(this).parents(".header");
			  var p = h.parent();
			  var loading = $('&lt;div class="loading"&gt;&lt;i class="fa fa-refresh fa-spin"&gt;&lt;/i&gt;&lt;/div&gt;');

			  loading.appendTo(p);
			  loading.fadeIn();
			  setTimeout(function() {
				loading.fadeOut();
			  }, 1000);

			  e.preventDefault();
			});

			$('.close-down').click(function(e){
			  var h = $(this).parents(".header");
			  var p = h.parent();

			  p.fadeOut(function(){
				$(this).remove();
			  });
			  e.preventDefault();
			});
		  //-----------TERMINA SCRIPT BOTONES PARA CERRAR VENTANITAS------------------
		</script>
		<script>
			//------------------SCRIPT VALIDADORES--------------------
			function mayus(e) {
			  e.value = e.value.toUpperCase();
			}

			Date.prototype.toString = function() {
			  var anyo = this.getFullYear();
			  var mes = this.getMonth()+1;
			  if( mes<=9 ) mes = "0"+mes;
			  var dia = this.getDate();
			  if( dia<=9 ) dia = "0"+dia;
			  return anyo+"-"+mes+"-"+dia;
			}

			function soloNumeros(e){
			  key = e.keyCode || e.which;
			  tecla = String.fromCharCode(key);
			  letras = " 1,2,3,4,5,6,7,8,9,0";
			  especiales = "8-37-39-46";

			  tecla_especial = false
			  for(var i in especiales){
				if(key == especiales[i]){
				  tecla_especial = true;
				  break;
				}
			  }

			  if(letras.indexOf(tecla)==-1 && !tecla_especial){
				return false;
			  }
			}
			function soloLetras(e){
			  key = e.keyCode || e.which;
			  tecla = String.fromCharCode(key).toLowerCase();
			  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
			  especiales = "8-37-39-46";

			  tecla_especial = false
			  for(var i in especiales){
				if(key == especiales[i]){
				  tecla_especial = true;
				  break;
				}
			  }

			  if(letras.indexOf(tecla)==-1 && !tecla_especial){
				return false;
			  }
			}
			//--------------------TERMINA SCRIPT VALIDADORES---------------
		  </script>
		  <script>
		 //----------------------COMIENZA SCRIPT SELECT2------------------
		 $(document).on('ready', function()  {

		  //Initialize Select2 Elements
		  $('.select2').select2()

		})
		//------------------TERMINA SCRIPT SELECT2-----------------
	  </script>

	  <script type="text/javascript">
		$(document).ready(function(){
		 // alert('entra');
		// Toolbar extra buttons
		var btnFinish = $('<button></button>').text('Finish')
		.addClass('btn btn-info')
		.on('click', function(){
		  if( !$(this).hasClass('disabled')){
			var elmForm = $("#myForm");
			if(elmForm){
			  elmForm.validator('validate');
			  var elmErr = elmForm.find('.has-error');
			  if(elmErr && elmErr.length > 0){
				alert('Oops we still have error in the form');
				return false;
			  }else{
				alert('Great! we are ready to submit form');
				elmForm.submit();
				return false;
			  }
			}
		  }
		});
		var btnCancel = $('<button style="margin-left:-200px;"></button>').text('Cancel')
		.addClass('btn btn-danger')
		.on('click', function(){
		  $('#smartwizard').smartWizard("reset");
		  $('#myForm').find("input, textarea").val("");
		});


		// Smart Wizard
		$('#smartwizard').smartWizard({
		  selected: 0,
		  theme: 'arrows',
		  transitionEffect:'fade',
		  toolbarSettings: {toolbarPosition: 'bottom'},
		  anchorSettings: {
			markDoneStep: true, // add done css
			markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
			removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
			enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
		  }
		});

		$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
		  var elmForm = $("#form-step-" + stepNumber);
		  // stepDirection === 'forward' :- this condition allows to do the form validation
		  // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
		  if(stepDirection === 'forward' && elmForm){
			elmForm.validator('validate');
			var elmErr = elmForm.children('.has-error');
			if(elmErr && elmErr.length > 0){
			  // Form validation failed
			  return false;
			}
		  }
		  return true;
		});

		$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
		  // Enable finish button only on last step
		  if(stepNumber == 3){
			$('.btn-finish').removeClass('disabled');
		  }else{
			$('.btn-finish').addClass('disabled');
		  }
		});

	  });

	</script>
	</html>
