<title>SmileSystem - Agenda</title>
<style>
    .perfil{
        font-size: 16px;
        margin-left: 20px;
    }
    label{
        padding-top: 7px;
    }
</style>

<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Agenda</h1>
    </div>
</div>



<div class="container clear_both padding_fix">
    <div class="row">
        <div class="col-md-12">
            <div class="block-web">
                <div class="header">
                    <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
                        <div class="col-sm-7">
                            <div class="actions"> 
                            </div>
                            <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Agenda</h2>
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                </div>
                <?php if(isset($this->mensaje)){ if(!isset($this->error)){?>
            <br>
                <div class="row">
                    <div class="col-md-12">
                    <div class="alert alert-success fade in">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
                    </div>
                    </div>
                    </div> 
                    <?php } if(isset($this->error)){ ?>
                    <br> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <i class="fa fa-warning"></i>&nbsp;<?php echo $this->mensaje; ?>
                            </div>
                        </div>
                    </div>
            <?php } }?>
                <div class="porlets-content">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-1 pull-right" style="margin-right: 16px;">
                                <a class="btn btn-sm btn-success" href="#modalAgregar"  data-toggle="modal" data-target="#modalAgregar"> Agregar Cita </a>    
                            </div>
                        </div><br><br>
                        <table class="display table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Horario</th>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Teléfono</th>
                                    <th>Diagnóstico</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->model->ListarTodos() as $r): ?>
                                    <tr class="grade">
                                        <td class="center"><?php echo $r->hora ?> </td>
                                        <td><?php echo $r->fecha ?> </td>
                                        <td><?php echo $r->nombre?> </td>
                                        <td><?php echo $r->edad?> </td>
                                        <td><?php echo $r->telefono ?> </td>
                                        <td><?php echo $r->diagnostico ?> </td>
                                        <td class="center">

                                        <a class="btn btn-primary btn-sm" role="button" onclick="actualizarAgenda(<?php echo $r->idAgenda; ?>);" data-target="#modalCrud" href="#modalCrud" role="button" data-toggle="modal"><i class="fa fa-edit"></i></a>


                                        <a class="btn btn-danger btn-sm" onclick="eliminarAgenda(<?php echo $r->idAgenda; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button">
                                            <i class="fa fa-eraser"></i></a>
                                        </td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 60%;">
                        <div class="modal-content" id="div-modal-contennt">
                        <!--************************En esta sección se incluye el modal de informacion de registro y apoyo***************************-->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="block-web">
                                        <div class="header">
                                            <h3 class="content-header theme_color">&nbsp;Eliminar la cita</h3>
                                        </div>
                                        <div class="porlets-content" style="margin-bottom: -50px;">
                                            <h4>¿Esta segúro que desea eliminar la cita?</h4>
                                        </div><!--/porlets-content-->
                                    </div><!--/block-web-->
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-top: -10px;">
                                <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                                    <form action="?c=agenda&a=Eliminar" enctype="multipart/form-data" method="post">
                                        <input hidden type="text" name="idAgenda" id="txtIdAgenda">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div><!--/modal-content--> 
                    </div><!--/modal-dialog--> 
                </div><!--/modal-fade--> 
                <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content panel default blue_border horizontal_border_1">
                            <form action="?c=agenda&a=Guardar" id="form-curp" enctype="multipart/form-data" method="post" parsley-validate novalidate-->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="block-web">
                                            <div class="header">
                                                <h3 class="content-header h3subtitulo">&nbsp;Agregar una nueva cita</h3>
                                            </div>
                                            <div class="porlets-content" style="margin-bottom: -50px;">
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Nombre: </label>
                                                    </div>
                                                     <input name="idAgenda" hidden id="idAgenda" type="text"   onkeyup="mayus(this);" class="form-control"  placeholder="Ingrese el nombre del paciente">
                                                    <div class="col-sm-9">
                                                        <input name="nombre"  maxlength="50" id="nombre" type="text"   onkeyup="mayus(this);" class="form-control"  placeholder="Ingrese el nombre del paciente">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Edad: </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input name="edad"  maxlength="2" id="edad" type="text" class="form-control"  placeholder="Edad">
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Telefono: </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="telefono"  maxlength="18" id="telefono" type="text" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'" placeholder="(___) ___-____">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Fecha: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="fecha" id="fecha" type="date" class="form-control" value="<?php date_default_timezone_set('America/Mexico_City'); echo date("Y")."-".date("m")."-".date("d") ?>">
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Hora: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="hora" id="hora" type="time" class="form-control"  placeholder="Hora">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Diagnostico: </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                
                                            </div><!--/porlets-content-->
                                        </div><!--/block-web-->
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-top: -10px;">
                                    <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div><!--/modal-content-->
                    </div><!--/modal-dialog-->
                </div><!--/modal-fade-->                

                <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content panel default blue_border horizontal_border_1"  id="div-modal-content">
                            
                        </div><!--/modal-content-->
                    </div><!--/modal-dialog-->
                </div><!--/modal-fade-->

                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content panel default blue_border horizontal_border_1">
                            <form action="?c=beneficiario&a=Crud" id="form-curp" enctype="multipart/form-data" method="post" parsley-validate novalidate-->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="block-web">
                                            <div class="header">
                                                <h3 class="content-header h3subtitulo">&nbsp;Editar cita</h3>
                                            </div>
                                            <div class="porlets-content" style="margin-bottom: -50px;">
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Nombre: </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input name="nombre"  maxlength="50" id="nombre" type="text"   onkeyup="mayus(this);" class="form-control"  placeholder="Ingrese el nombre del paciente">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Edad: </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input name="edad"  maxlength="2" id="edad" type="text" class="form-control"  placeholder="Edad">
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Telefono: </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="telefono"  maxlength="18" id="telefono" type="text" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'" placeholder="(___) ___-____">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Fecha: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="fecha" id="fecha" type="date" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Hora: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="hora" id="hora" type="text" class="form-control"  placeholder="Hora">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Diagnostico: </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                
                                            </div><!--/porlets-content-->
                                        </div><!--/block-web-->
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-top: -10px;">
                                    <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div><!--/modal-content-->
                    </div><!--/modal-dialog-->
                </div><!--/modal-fade-->
            </div>
        </div>
    </div>
</div>

<script>
    eliminarAgenda = function(idAgenda){
        $('#txtIdAgenda').val(idAgenda);
    };

    actualizarAgenda = function (idAgenda){
        var idAgenda=idAgenda;
        $.post("index.php?c=agenda&a=CrudEditar", {
            idAgenda: idAgenda
        }, function(modal) {
            $("#div-modal-content").html(modal);
            console.log(modal);
        }); 
        
    };
</script>

      

