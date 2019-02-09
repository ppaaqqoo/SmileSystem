<?php

require_once 'model/agenda.php';

class AgendaController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Agenda();
	}

	public function Index(){
		$page="view/agenda/index.php";
		require_once 'view/index.php';
	}
	public function Crud(){
		try {
			
				$usuario = new Agenda();
				if(isset($_REQUEST['idAgenda'])){
					$usuario = $this->model->ObtenerAgenda($_REQUEST['idAgenda']);
				}
				$administracion=true;
				$usuarios=true;
				$page="view/agenda/index.php";
				require_once 'view/index.php';
			
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar recuperar la información de la agenda";
			$this->Index();
		}
	}

	public function CrudEditar(){
	  	$agenda = new Agenda();
	  	if($_REQUEST['idAgenda']!=null){
	   		$agenda = $this->model->ObtenerAgenda($_REQUEST['idAgenda']);
	 	}
             echo '
			<form action="?c=agenda&a=Actualizar';
			if($_REQUEST['idAgenda']!=null){ 
				echo '&idAgenda='.$_REQUEST['idAgenda']; 
				$str = <<<EOF
				 <input name="telefono"  maxlength="14" id="telefono" value="$agenda->telefono" type="text" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'" placeholder="(___) ___-____">
   			
EOF;
				} 
				 echo'" id="form-curp"; enctype="multipart/form-data" method="post" parsley-validate novalidate-->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="block-web">
                                            <div class="header">
                                                <h3 class="content-header h3subtitulo">&nbsp;'; echo $agenda->idAgenda !=null ? "Actualizar Cita" : "Registrar Cita"; echo '</h3>
                                            </div>
                                            <div class="porlets-content" style="margin-bottom: -50px;">
                                             <input hidden name="idAgenda"  value="'; echo $agenda->idAgenda != null ? $agenda->idAgenda : 0; echo '"/>
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Nombre: </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input name="nombre"  value="'; echo $agenda->idAgenda != null ? $agenda->nombre : ""; echo '"   maxlength="50" id="nombre" type="text"   onkeyup="mayus(this);" class="form-control"  placeholder="Ingrese el nombre del paciente">
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Edad: </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input name="edad" value="'; echo $agenda->idAgenda != null ? $agenda->edad : ""; echo '"   maxlength="2" id="edad" type="text" class="form-control"  placeholder="Edad">
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Telefono: </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        '; echo $str; echo  '
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Fecha: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="fecha" id="fecha" type="date" class="form-control"  value="'; echo $agenda->idAgenda != null ? $agenda->fecha : ""; echo '" >
                                                    </div>
                                                    <div class="col-sm-2" style="text-align: right;">
                                                        <label style="text-align: right;">Hora: </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input name="hora" id="hora" type="time" class="form-control"  placeholder="Hora" value="'; echo $agenda->idAgenda != null ? $agenda->hora : ""; echo '" >
                                                    </div>
                                                </div><!--/form-group--> <br><br>
                                                <div class="form-group">
                                                    <div class="col-sm-3" style="text-align: right;">
                                                        <label style="text-align: right;">Diagnostico: </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="10" class="form-control">'; echo $agenda->idAgenda != null ? $agenda->diagnostico : ""; echo '</textarea>
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

             '; 

	}

	public function Actualizar(){
		try {

			$agenda = new Agenda();
			$agenda->idAgenda = $_REQUEST['idAgenda'];
			$agenda->nombre = $_REQUEST['nombre'];
			$agenda->edad = $_REQUEST['edad'];
			$agenda->telefono = $_REQUEST['telefono'];
			$agenda->fecha = $_REQUEST['fecha'];
			$agenda->hora = $_REQUEST['hora'];
			$agenda->diagnostico = $_REQUEST['diagnostico'];
			
	     	$this->model->Actualizar($agenda);
	      	$this->mensaje="Los datos de la cita se han actualizado correctamente";
	      	$page="view/agenda/index.php";
			require_once 'view/index.php';

		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar guardar la cita";
			$this->Index();
		}
	}

	public function Guardar(){
		try {

			$agenda = new Agenda();
			$agenda->idAgenda = $_REQUEST['idAgenda'];
			$agenda->nombre = $_REQUEST['nombre'];
			$agenda->edad = $_REQUEST['edad'];
			$agenda->telefono = $_REQUEST['telefono'];
			$agenda->fecha = $_REQUEST['fecha'];
			$agenda->hora = $_REQUEST['hora'];
			$agenda->diagnostico = $_REQUEST['diagnostico'];
			
			if($agenda->idAgenda > 0){
		     	$this->model->Actualizar($agenda);
		      	$this->mensaje="Los datos de la cita se han actualizado correctamente";
		      	$page="view/agenda/index.php";
				require_once 'view/index.php';
		    }
		     else {
			$this->model->Registrar($agenda);
			//$this->model->RegistrarInDB($usuario);
			$this->mensaje="La cita de <b>$agenda->nombre</b> se ha registrado correctamente";
			
			$this->Index();
			}
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar guardar la cita";
			$this->Index();
		}
	}

	//Metodo  para eliminar
	public function Eliminar(){
		try {
			$idAgenda = $_REQUEST['idAgenda'];	
			$consultaAgenda=$this->model->ObtenerAgenda($idAgenda);
			$this->model->EliminarAgenda($idAgenda);
			$this->mensaje="Se ha eliminado la cita correctamente";
			$this->Index();
		
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar dar de baja la cita";
			$this->Index();
		}
	}
}

