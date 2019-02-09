<title>SmileSystem - Pacientes</title>
<style type="text/css">
  .lblinfo{
    color:#2196F3;
  }
</style>
<script type="text/javascript">

</script>
<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Administración</h1>
   <h2 class="">Pacientes</h2>
 </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-7">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Pacientes</h2>
            </div>
            <div class="col-md-5">
          </div>
        </div>
      </div>
      <?php if(isset($this->mensaje)){ if(!isset($this->error)){?>
      <div class="row" style="margin-bottom: -20px; margin-top: 20px">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
          </div>
        </div>
      </div>
      <?php } if(isset($this->error)){ ?>
      <div class="row" style="margin-bottom: -20px; margin-top: 20px">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-warning"></i>&nbsp;<?php echo $this->mensaje; ?>
          </div>
        </div>
      </div>
      <?php } }?>
      <a data-toggle="modal" data-target="#modalBuscarPaciente" href="#modalBuscarPaciente" class="btn btn-sm btn-success" style="margin-right: 10px;" type="button"> <i class="fa fa-plus"></i>&nbsp;Agregar Paciente</a><br><br>
      <div class="porlets-content">
        <div class="table-responsive">
          
          <table class="display table table-bordered table-striped" id="dynamic-table">

           <thead>

             <tr>
               <th>Nombre</th>
               <th>Correo</th>
               <th>Telefono</th>
               <td> <center><b>Opciones</b></center> </td>
             </tr>
           </thead>
           <tbody>
            <?php foreach($this->model->ListarTodos() as $r): ?>
              <tr class="grade">
                <td><?php echo $r->nombre . " " . $r->apePat . " " . $r->apeMat?> </td>
                <td><?php echo $r->numero?> </td>
                <td><?php echo $r->telCel?> </td>
                <td class="center">

                  <!--<a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idPaciente=<?php echo $r->idPaciente; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>-->
                
                  <a class="btn btn-primary btn-sm" role="button" href="?c=Paciente&a=Crud&idPaciente=<?php echo $r->idPaciente ?>"><i class="fa fa-edit"></i></a>


                  <a class="btn btn-danger btn-sm" onclick="eliminarPaciente(<?php echo $r->idPaciente; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
                </td>
                
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
           <tr>
               <th>Nombre</th>
               <th>Correo</th>
               <th>Telefono</th>
               <td> <center><b>Opciones</b></center> </td>
             </tr>
        </tfoot>
      </table>
 
  



</div><!--/table-responsive-->
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div>

<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 60%;">
    <div class="modal-content" id="div-modal-content">
      <!--*********En esta sección se incluye el modal de informacion de registro y apoyo**********-->
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->


<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default red_border horizontal_border_1">
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Eliminar Paciente</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar al paciente?</h4>
            </div><!--/porlets-content-->
          </div><!--/block-web-->
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=Paciente&a=Eliminar" enctype="multipart/form-data" method="post">
            <input hidden type="text" name="idPaciente" id="txtidPaciente">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->

<div class="modal fade" id="modalBuscarPaciente" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel default blue_border horizontal_border_1">
            <form action="?c=paciente&a=Crud" id="form-nombre" enctype="multipart/form-data" method="POST"
                  parsley-validate novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="block-web">
                            <div class="header">
                                <h3 class="content-header h3 subtitulo">&nbsp;Ingrese el nombre del nuevo Paciente</h3>
                            </div>
                            <div class="porlets-content" style="margin-bottom: -50px;">
                                <div class="form-group">
                                    <div class="col-md-2"></div>
                                    <div class="col-sm-8">
                                        <label for="nombre">Nombre(s): </label><input autofocus name="nombre" maxlength="60" id="nombre" type="text" required parsley-regexp="" required class="form-control" placeholder="Ingrese el nombre del paciente"><br>
                                        <label for="apellidoP">Apellido Paterno: </label><input name="apePat" maxlength="60" id="apePat" type="text" required parsley-regexp="" required class="form-control" placeholder="Ingrese Apellido Paterno"><br>
                                        <label for="apellidoM">Apellido Materno: </label><input name="apeMat" maxlength="60" id="apeMat" type="text" required parsley-regexp="" required class="form-control" placeholder="Ingrese Apellido Materno"><br>       
                                    </div>
                                </div><!--/form-group-->
                            </div><!--/porlets-content-->
                        </div><!--/block-web-->
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: -10px;">
                    <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                    </div>
                </div>
            </form>
        </div><!--/modal-content-->
    </div><!--/modal-dialog-->
</div><!--/modal-fade-->

<div class="modal fade" id="mActivarPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default horizontal_border_1">
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header h3subtitulo">&nbsp;Activar Paciente</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>El paciente que esta ingresando ya ha sido dado de alta en el sistema anteriormente y ha sido eliminado. ¿Desea volverlo a activar?</h4>
            </div><!--/porlets-content-->
          </div><!--/block-web-->
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=Paciente&a=ActivarPaciente" enctype="multipart/form-data" method="post">
            <input type="hidden" name="curp" id="txtCurpActivar">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Activar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->


<script src="assets/js/jquery-2.1.0.js"></script>
<script type="text/javascript">



  $(document).ready(function(){

    $('#form-curp').submit(function() {
      VerificarPaciente();
      return false;
    });
  });

  var curp="";
  VerificarPaciente = function(){
    curp=$("#curp").val();
    $.post("index.php?c=Paciente&a=VerificarPaciente", {curp: curp}, function(respuesta) {
      if(respuesta=="Inactivo"){
        $('#txtCurpActivar').val(curp);
        $('#mActivarPaciente').modal('toggle');
      }else {
        location.href="?c=Paciente&a=Crud&curp="+curp;
      }
    });
  }

  consultas=function(){
    periodo='2018';
    $.post("index.php?c=Paciente&a=Consultas", {periodo: periodo}, function(mensaje) {
      console.log(mensaje);
      $("#div_tabla").html(mensaje);
    });
  }
  eliminarPaciente = function(idPaciente){
    $('#txtidPaciente').val(idPaciente);
    console.log(idPaciente);
  };

  eliminarPacienteRFC = function(idRegistro){
    $('#txtIdRegistroRFC').val(idRegistro);
  };
  infoRegistro = function (idPaciente){
   $.post("index.php?c=Paciente&a=Inforegistro", {idPaciente: idPaciente}, function(info) {
    $("#div-modal-content").html(info);
  });
 }

 infoRegistroRFC = function (idPacienteRFC){
   $.post("index.php?c=Pacienterfc&a=Inforegistro", {idPacienteRFC: idPacienteRFC}, function(info) {
    $("#div-modal-content").html(info);
  });
 }
 buscarBeneficiarioCurp = function (){

 }
 deshabilitar = function (){
  $('#btnImportar').attr("disabled", true);
}
deshabilitar2 = function (){
  $('#btnImportar2').attr("disabled", true);
} 


  $(document).ready(function(){

    $('#form-curp').submit(function() {
      VerificarPaciente();
      return false;
    });
  });

  var curp="";
  
  $(document).ready(function () {

        $('#form-nombre').submit(function () {
            verificarPaciente();
            return false;
        });
    });

    var nombre = "";
    var apePat = "";
    var apeMat = "";
    verificarPaciente = function () {
        nombre = $("#nombre").val();
        apePat = $("#apePat").val();
        apeMat = $("#apeMat").val();
        $.post("index.php?c=paciente&a=verificarPaciente", {nombre: nombre, apePat: apePat, apeMat: apeMat}, function (respuesta) {
            if (respuesta == "No Existe" || respuesta == null ) {
                $('#txtNombre').val(nombre);
            } else {
                location.href = "?c=paciente&a=Crud&nombre=" + nombre + "&apePat=" + apePat + "&apeMat="+ apeMat;
            }
        });
    }

  consultas=function(){
    periodo='2018';
    $.post("index.php?c=paciente&a=Consultas", {periodo: periodo}, function(mensaje) {
      console.log(mensaje);
      $("#div_tabla").html(mensaje);
    });
  }
  
</script>
