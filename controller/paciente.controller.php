<?php
require_once 'model/paciente.php';
require_once 'model/histClinico.php';
require_once 'model/atm.php';

class PacienteController{

  private $pdo;
  private $model;
  private $model2;
  private $model3;
  private $session;
  private $mensaje;
  public $error;
  public $tipoBen;
  private $arrayError;
  private $arrayActualizados;
  private $arrayRegistrados;
  private $numRegistros=0;
  private $numActualizados=0;


  public function __CONSTRUCT(){
    $this->model = new Paciente();
    $this->model1 = new HistorialClinico();
    $this->model2 = new Atm();
  }

  public function Index(){
    $pacientes = true;
    $page="view/paciente/index.php";
    require_once 'view/index.php';
  }

  public function VerificarPaciente()
  {
    $curp=$_REQUEST['curp'];
    $verificacion=$this->model->VerificaPaciente($curp);
    if($verificacion!=null){
      if($verificacion->estado=="Activo")
        echo "Activo";
      else
        echo "Inactivo";
    }else{
      echo 'null';
    }
  }

  public function ActivarPaciente()
  {
    $curp=$_REQUEST['curp'];
    $verificaBen=$this->model->VerificaPaciente($curp);
    $idRegistro = $verificaBen->idRegistro;
    $this->model->Activar($idRegistro);
    $paciente = new Paciente();
    $this->mensaje="Se ha activado correctamente el paciente, porfavor compruebe que la información que nosotros tenemos este actualizada, si no es así, ayudenos a <a href='?c=Paciente&a=Crud&idPaciente=".$verificaBen->idPaciente."'>actualizar la información</a>.";     
    $pacientes = false;
    $paciente_rfc=true;
    $pac = $this->model->Listar($verificaBen->idPaciente);
    $infoApoyo = $this->model->ObtenerInfoApoyo($verificaBen->idPaciente);
    $page="view/paciente/detalles.php";
    require_once 'view/index.php';
  }


public function GuardarTx(){
    try {
        $paciente= new Paciente();
        $paciente->idPaciente = $_REQUEST['idPaciente'];
        $paciente->nombre = $_REQUEST['nombre'];
        $paciente->fecha = $_REQUEST['fecha'];
        $paciente->costo = $_REQUEST['costo'];
        $paciente->cantidad = $_REQUEST['cantidad'];
        $paciente->subtotal = $paciente->cantidad * $paciente->costo;

        $this->model->RegistrarTx($paciente);
        //$this->model->RegistrarInDB($usuario);
        $this->mensaje="El Tx se ha registrado correctamente";
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$paciente->idPaciente.'#pagos');
      
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar guardar el Tx" . $e;
        $this->Index();
    }
}

public function GuardarPago(){
    try {
        $paciente= new Paciente();
        $paciente->idPaciente = $_REQUEST['idBen'];
        $paciente->fecha = $_REQUEST['fecha'];
        $paciente->total = $_REQUEST['total'];
        $paciente->abono = $_REQUEST['abono'];
        $this->model->RegistrarPago($paciente);
        //$this->model->RegistrarInDB($usuario);
        $this->mensaje="El Pago se ha registrado correctamente";
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$paciente->idPaciente.'#pagos');
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar guardar el Pago" . $e;
        $this->Index();
    }
}

public function EliminarTx(){ 
    $id = new Paciente();
    try {
        $paciente = $_REQUEST['idTx'];
        $id->idPaciente = $_REQUEST['idPaciente'];
        $this->model->EliminarTxx($paciente);
        $this->mensaje="Se ha dado de baja correctamente el Tx";
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$id->idPaciente.'#pagos');
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar eliminar el Tx";
        $this->Index();
    }
}

public function EliminarPago(){ 
    $e = $_REQUEST['idPaciente'];
    try {
        $paciente = $_REQUEST['idPago'];
        $this->model->EliminarPago($paciente) ;
        $this->mensaje="Se ha dado de baja el pago correctamente".$e;
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$e.'#pagos');
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar eliminar el Tx";
        $this->Index();
    }
}

public function ActualizarTx(){
    try {
        $tx = new Paciente();
        $tx->idPaciente = $_REQUEST['idPaciente'];
        $tx->idTx = $_REQUEST['idTx'];
        $tx->nombre = $_REQUEST['nombre'];
        $tx->fecha = $_REQUEST['fecha'];
        $tx->costo = $_REQUEST['costo'];
        $tx->cantidad = $_REQUEST['cantidad'];
        $tx->subtotal = $tx->cantidad * $tx->costo;
        $this->model->ActualizarTx($tx);
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$tx->idPaciente.'#pagos');
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar guardar la cita";
        $this->Index();
    }
}
public function ActualizarPago(){
    try {
        $pago = new Paciente();
        $pago->idPaciente = $_REQUEST['idPaciente'];
        $pago->idPago = $_REQUEST['idPago'];
        $pago->fecha = $_REQUEST['fecha'];
        $pago->abono = $_REQUEST['abono'];
        $this->model->ActualizarPago($pago);
        header('Location: ?c=Paciente&a=Crud&idPaciente='.$pago->idPaciente.'#pagos');
    } catch (Exception $e) {
        $this->error=true;
        $this->mensaje="Ha ocurrido un error al intentar guardar la cita";
        $this->Index();
    }
}

public function Guardar(){
    try {
      $paciente = new Paciente();
      $paciente->idPaciente = $_REQUEST['idPaciente'];
      $paciente->fecIngreso = $_REQUEST['fecIngreso'];
      $paciente->folio = $_REQUEST['folio']; 
      $paciente->nombre = $_REQUEST['nombre'];
      $paciente->apePat = $_REQUEST['apePat'];
      $paciente->apeMat = $_REQUEST['apeMat'];
      $paciente->calle = $_REQUEST['calle'];
      $paciente->numero = $_REQUEST['numero'];
      $paciente->colonia = $_REQUEST['colonia'];
      $paciente->codPos = $_REQUEST['codPos'];
      $paciente->localidad = $_REQUEST['localidad'];
      $paciente->estado = $_REQUEST['estado'];
      $paciente->telCasa = $_REQUEST["telCasa"];
      $paciente->telCel = $_REQUEST["telCel"];
      $paciente->fecNacimiento = $_REQUEST["fecNacimiento"];
      $paciente->lugNacimiento = $_REQUEST["lugNacimiento"];
      $paciente->edad = $_REQUEST["edad"];
      $paciente->sexo = $_REQUEST["sexo"];
      $paciente->ocupacion = $_REQUEST["ocupacion"];
      $paciente->estCivil = $_REQUEST["estCivil"];
      $paciente->perResp = $_REQUEST["perResp"];
      $paciente->motConsulta = $_REQUEST["motConsulta"];

      //HISTCLINICO
      $histCli = new HistorialClinico();
      $histCli->idClinico = $_REQUEST['idClinico'];
      $histCli->idPaciente = $_REQUEST['idPaciente'];
      isset($_REQUEST['esmalte'])? $histCli->esmalte="1": $histCli->esmalte="0";
      isset($_REQUEST['dentina'])? $histCli->dentina="1": $histCli->dentina="0";
      isset($_REQUEST['raiz'])? $histCli->raiz="1": $histCli->raiz="0";
      isset($_REQUEST['huesos'])? $histCli->huesos="1": $histCli->huesos="0";
      isset($_REQUEST['encia'])? $histCli->encia="1": $histCli->encia="0";
      isset($_REQUEST['inEpil'])? $histCli->inEpil="1": $histCli->inEpil="0";
      isset($_REQUEST['lengua'])? $histCli->lengua="1": $histCli->lengua="0";
      isset($_REQUEST['pulpo'])? $histCli->pulpo="1": $histCli->pulpo="0";
      isset($_REQUEST['velPal'])? $histCli->velPal="1": $histCli->velPal="0";
      isset($_REQUEST['carrillo'])? $histCli->carrillo="1": $histCli->carrillo="0";
      isset($_REQUEST['soMordidaH'])? $histCli->soMordidaH="1": $histCli->soMordidaH="0";
      isset($_REQUEST['soMordidaV'])? $histCli->soMordidaV="1": $histCli->soMordidaV="0";
      isset($_REQUEST['morAbierta'])? $histCli->morAbierta="1": $histCli->morAbierta="0";
      isset($_REQUEST['desBruxismo'])? $histCli->desBruxismo="1": $histCli->desBruxismo="0";
      isset($_REQUEST['anoclusion'])? $histCli->anoclusion="1": $histCli->anoclusion="0";
      isset($_REQUEST['simetrica'])? $histCli->simetrica="1": $histCli->simetrica="0";
      isset($_REQUEST['asimetrica'])? $histCli->asimetrica="1": $histCli->asimetrica="0";
      isset($_REQUEST['braquicefalo'])? $histCli->braquicefalo="1": $histCli->braquicefalo="0";
      isset($_REQUEST['mesocefalo'])? $histCli->mesocefalo="1": $histCli->mesocefalo="0";
      isset($_REQUEST['dolicefalo'])? $histCli->dolicefalo="1": $histCli->dolicefalo="0";
      isset($_REQUEST['recto'])? $histCli->recto="1": $histCli->recto="0";
      isset($_REQUEST['concavo'])? $histCli->concavo="1": $histCli->concavo="0";
      isset($_REQUEST['convexo'])? $histCli->convexo="1": $histCli->convexo="0";
      isset($_REQUEST['sarampion'])? $histCli->sarampion="1": $histCli->sarampion="0";
      isset($_REQUEST['viruela'])? $histCli->viruela="1": $histCli->viruela="0";
      isset($_REQUEST['parotidis'])? $histCli->parotidis="1": $histCli->parotidis="0";
      isset($_REQUEST['diabetes'])? $histCli->diabetes="1": $histCli->diabetes="0";
      isset($_REQUEST['hipertension'])? $histCli->hipertension="1": $histCli->hipertension="0";
      isset($_REQUEST['tiroides'])? $histCli->tiroides="1": $histCli->tiroides="0";
      isset($_REQUEST['hipotiroidismo'])? $histCli->hipotiroidismo="1": $histCli->hipotiroidismo="0";
      isset($_REQUEST['proCoagulacion'])? $histCli->proCoagulacion="1": $histCli->proCoagulacion="0";
      isset($_REQUEST['alergias'])? $histCli->alergias="1": $histCli->alergias="0";
      $histCli->descAlergias = $_REQUEST['descAlergias'];
      isset($_REQUEST['emergencia'])? $histCli->emergencia="1": $histCli->emergencia="0";
      isset($_REQUEST['revision'])? $histCli->revision="1": $histCli->revision="0";
      isset($_REQUEST['limpieza'])? $histCli->limpieza="1": $histCli->limpieza="0";
      isset($_REQUEST['canes'])? $histCli->canes="1": $histCli->canes="0";
      isset($_REQUEST['puente'])? $histCli->puente="1": $histCli->puente="0";
      isset($_REQUEST['extraccion'])? $histCli->extraccion="1": $histCli->extraccion="0";
      isset($_REQUEST['prostodoncia'])? $histCli->prostodoncia="1": $histCli->prostodoncia="0";
      isset($_REQUEST['buena'])? $histCli->buena="1": $histCli->buena="0";
      isset($_REQUEST['mala'])? $histCli->mala="1": $histCli->mala="0";
      isset($_REQUEST['tomAlcohol'])? $histCli->tomAlcohol="1": $histCli->tomAlcohol="0";
      isset($_REQUEST['fuma'])? $histCli->fuma="1": $histCli->fuma="0";
      isset($_REQUEST['apRespiratorio'])? $histCli->apRespiratorio="1": $histCli->apRespiratorio="0";
      isset($_REQUEST['apCardiovascular'])? $histCli->apCardiovascular="1": $histCli->apCardiovascular="0";
      isset($_REQUEST['apDigestivo'])? $histCli->apDigestivo="1": $histCli->apDigestivo="0";
      isset($_REQUEST['sisNervioso'])? $histCli->sisNervioso="1": $histCli->sisNervioso="0";
      isset($_REQUEST['apUrinario'])? $histCli->apUrinario="1": $histCli->apUrinario="0";
      isset($_REQUEST['cicMestrual'])? $histCli->cicMestrual="1": $histCli->cicMestrual="0";
      $histCli->infCicMes = $_REQUEST['infCicMes'];
      isset($_REQUEST['embarazo'])? $histCli->embarazo="1": $histCli->embarazo="0";
      $histCli->meses = $_REQUEST['meses'];
      $histCli->prg1 = $_REQUEST['prg1'];
      $histCli->prg2 = $_REQUEST['prg2'];
      $histCli->prg3 = $_REQUEST['prg3'];
      $histCli->infPrg3 = $_REQUEST['infPrg3'];
      $histCli->prg4 = $_REQUEST['prg4'];

      //ATM
      $atm = new Atm();
      $atm->idAtm = $_REQUEST['idAtm'];
      $atm->idPaciente = $_REQUEST['idPaciente'];
      $atm->linMedia = $_REQUEST['linMedia'];
      $atm->habitos = $_REQUEST['habitos'];
      $atm->bruxismo = $_REQUEST['bruxismo'];
      isset($_REQUEST['chaArriba'])? $atm->chaArriba="1": $atm->chaArriba="0";
      isset($_REQUEST['chaAbajo'])? $atm->chaAbajo="1": $atm->chaAbajo="0";
      $atm->infChasquido = $_REQUEST['infChasquido'];
      $atm->crepitacion = $_REQUEST['crepitacion'];
      isset($_REQUEST['dolDerecha'])? $atm->dolDerecha="1": $atm->dolDerecha="0";
      isset($_REQUEST['dolIzquierda'])? $atm->dolIzquierda="1": $atm->dolIzquierda="0";
      $atm->infDolor = $_REQUEST['infDolor'];
      $atm->maxAbertura = $_REQUEST['maxAbertura'];
      $atm->derecho = $_REQUEST['derecho'];
      $atm->izquierdo = $_REQUEST['izquierdo'];
      $atm->potrusion = $_REQUEST['potrusion'];
      $atm->regresion = $_REQUEST['regresion'];
      $atm->peso = $_REQUEST['peso'];
      $atm->talla = $_REQUEST['talla'];
      $atm->temp = $_REQUEST['temp'];
      $atm->pa = $_REQUEST['pa'];
      $atm->pulso = $_REQUEST['pulso'];
      $atm->fr = $_REQUEST['fr'];
      $verificaPac=$this->model->verificaPaciente($paciente->nombre, $paciente->apePat, $paciente->apeMat);

      if($paciente->idPaciente > 0 || $verificaPac!=null){
        //AGREGAR MODELOS PARA ACTUALIZAR PACIENTES
        $this->model->Actualizar($paciente);
        $this->model1->ActualizarHisCli($histCli);;
        $this->model2->ActualizarATM($atm);
        $this->mensaje="Se ha actualizado correctamente el paciente";
      }else{
        //AGREGAR MODELOS PARA REGISTRAR PACIENTES
        $this->model->Registrar($paciente);
         //COMO ES EL PRIMER REGISTRO DEBEMOS TRAER EL ID PARA PASARLO A LAS DEMAS TABLAS
        $verificaPac=$this->model->verificaPaciente($paciente->nombre, $paciente->apePat, $paciente->apeMat);
        $histCli->idPaciente = $verificaPac->idPaciente; 
        $atm->idPaciente = $verificaPac->idPaciente;
        $this->model1->RegistrarHisCli($histCli);
        $this->model2->RegistrarATM($atm);
        $ben = $this->model->Listar($atm->idPaciente);
        $this->mensaje="Se ha registrado correctamente el paciente";
      }
      $this->Index();
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al intentar guardar los datos del paciente".$e;
      $this->Index();
    }
  }

 public function Crud(){
    try {
      $paciente = new Paciente();
      $histCli = new HistorialClinico();
      $atm = new Atm();
      if(isset($_REQUEST['nombre'])){
        $paciente->nombre=$_REQUEST['nombre'];
        $paciente->apePat=$_REQUEST['apePat'];
        $paciente->apeMat=$_REQUEST['apeMat'];
        $verificaPac=$this->model->verificaPaciente($paciente->nombre, $paciente->apePat, $paciente->apeMat);
        if($verificaPac==null){
          $pacientes=true;
          $page="view/paciente/paciente.php";
          require_once 'view/index.php';
        }else{
          $warning=true;
          $this->mensaje="El paciente ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, <a href='?c=paciente&a=Crud&idPaciente=".$verificaPac->idPaciente."'>actualice la información</a>.";      
          $pacientes = false;
          //AGREGAR OBJETOS PARA EDITAR DESDE EXPEDIENTE
          $pac = $this->model->Obtener($verificaPac->idPaciente);
          $histCli = $this->model1->ObtenerHisCliPaciente($verificaPac->idPaciente);
          $atm = $this->model2->ObtenerATMPaciente($verificaPac->idPaciente);
          $page="view/paciente/expediente.php";
          require_once 'view/index.php';
        }
      }if(isset($_REQUEST['idPaciente'])){
        $pacientes=true;
        //AGREGAR OBJETOS PARA EDITAR CUANDO ES DIRECTO        
        $paciente = $this->model->Listar($_REQUEST['idPaciente']);
        $histCli = $this->model1->ObtenerHisCliPaciente($_REQUEST['idPaciente']);
        $atm = $this->model2->ObtenerATMPaciente($_REQUEST['idPaciente']);
        $page="view/paciente/paciente.php";
        require_once 'view/index.php';
      }
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al recuperar la información del paciente" . $e;
      $this->Index();
    }
  }

 




function validate_curp($valor) {     
 if(strlen($valor)==18){         
  $letras     = substr($valor, 0, 4);
  $numeros    = substr($valor, 4, 6);         
  $sexo       = substr($valor, 10, 1);
  $mxState    = substr($valor, 11, 2); 
  $letras2    = substr($valor, 13, 3); 
  $homoclave  = substr($valor, 16, 2);
  if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && $this->is_mx_state($mxState) && $this->is_sexo_curp($sexo)){ 
    return true; 
  }         
  return false;
}else{
 return false; 
} 
}


function is_mx_state($state){     
  $mxStates = [         
  'AS','BS','CL','CS','DF','GT',         
  'HG','MC','MS','NL','PL','QR',         
  'SL','TC','TL','YN','NE','BC',         
  'CC','CM','CH','DG','GR','JC',         
  'MN','NT','OC','QT','SP','SR',         
  'TS','VZ','ZS'    
  ];     
  if(in_array(strtoupper($state),$mxStates)){         
    return true;     
  }     
  return false; 
}

function is_sexo_curp($sexo){     
  $sexoCurp = ['H','M'];     
  if(in_array(strtoupper($sexo),$sexoCurp)){         
   return true;     
 }     
 return false; 
}

public function Eliminar(){ 
  try {
    $paciente= new Paciente();
    $paciente->idPaciente = $_REQUEST['idPaciente'];
    $this->model->EliminarP($paciente);
    $this->mensaje="Se ha dado de baja correctamente el paciente";
    $this->Index();
  } catch (Exception $e) {
    $this->error=true;
    $this->mensaje="Ha ocurrido un error al intentar eliminar el paciente";
    $this->Index();
  }
}

public function Upload(){
    $radiografia = new Paciente();
    $radiografia->idPaciente= $_POST['idPaciente'];
    $radiografia->observaciones= $_POST['observaciones'];
    $radiografia->nombre2= "hola";
    if (isset($_FILES["file"])){
    
      $file = $_FILES["file"];
      $nombre = $file["name"];
      $tipo = $file["type"];
      $ruta_provisional = $file["tmp_name"];
      $size = $file["size"];
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $carpeta = "imagenes/";

      if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
        echo "Error, el archivo no es una imagen"; 
      }
      else if ($size > 4024*4024){

        echo "Error, el tamaño máximo permitido es un 1MB";

      }else if ($width > 1500 || $height > 1500){

          echo "Error la anchura y la altura maxima permitida es 500px";

      }else if($width < 60 || $height < 60){

          echo "Error la anchura y la altura mínima permitida es 60px";

      }else{

          $src = $carpeta.$nombre;
          move_uploaded_file($ruta_provisional, $src);
          echo "<img src='$src' style='margin-top:20px; width: 550px; height:330px;'>";
          $radiografia->nombre=$nombre;
          if ($radiografia->idPaciente > 0) {
              $this->model->ActualizarRadiografia($radiografia);
          }else{
            $this->model->RegistrarRadiografia($radiografia);
          }
      }
    }
   }

    public function GuardarOdontograma(){

        $odontograma = new Paciente();
        $odontograma->idPaciente= $_POST['idPaciente'];
        $odontograma->od11=$_POST['inp11'];
        $odontograma->od12=$_POST['inp12'];
        $odontograma->od13=$_POST['inp13'];
        $odontograma->od14=$_POST['inp14'];
        $odontograma->od15=$_POST['inp15'];
        $odontograma->od16=$_POST['inp16'];
        $odontograma->od17=$_POST['inp17'];
        $odontograma->od18=$_POST['inp18'];
        $odontograma->od21=$_POST['inp21'];
        $odontograma->od22=$_POST['inp22'];
        $odontograma->od23=$_POST['inp23'];
        $odontograma->od24=$_POST['inp24'];
        $odontograma->od25=$_POST['inp25'];
        $odontograma->od26=$_POST['inp26'];
        $odontograma->od27=$_POST['inp27'];
        $odontograma->od28=$_POST['inp28'];
        $odontograma->od31=$_POST['inp31'];
        $odontograma->od32=$_POST['inp32'];
        $odontograma->od33=$_POST['inp33'];
        $odontograma->od34=$_POST['inp34'];
        $odontograma->od35=$_POST['inp35'];
        $odontograma->od36=$_POST['inp36'];
        $odontograma->od37=$_POST['inp37'];
        $odontograma->od38=$_POST['inp38'];
        $odontograma->od41=$_POST['inp41'];
        $odontograma->od42=$_POST['inp42'];
        $odontograma->od43=$_POST['inp43'];
        $odontograma->od44=$_POST['inp44'];
        $odontograma->od45=$_POST['inp45'];
        $odontograma->od46=$_POST['inp46'];
        $odontograma->od47=$_POST['inp47'];
        $odontograma->od48=$_POST['inp48'];
        if ( $odontograma->idPaciente>0) {
            $this->model->ActualizarOdontograma($odontograma);
            echo "El odontograma se actualizo correctamente";
        }else{
            $this->model->GuardarOdontograma($odontograma);
            echo "El odontograma se guardo correctamente";
        }
        
        
    }



public function Detalles(){
  try {
   $paciente_curp=true;
   $pacientes=true;
   $paciente = new Paciente();
   $ben = $this->model->Listar($_REQUEST['idPaciente']);
   $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idPaciente']);
   $page="view/paciente/detalles.php";
   require_once 'view/index.php';
 } catch (Exception $e) {
    $this->error=true;
    $this->mensaje="Ha ocurrido un error al recuperar la información del paciente" . $e;
    $this->Index();
 }
}

public function Consultas(){
  $periodo=$_REQUEST['periodo'];
  foreach ($this->model->Listar1($periodo) as $r):
    echo '
  <tr class="grade">
    <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro('; echo $r->idPaciente; echo ')" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
    <td>'. $r->curp .'</td>
    <td>'. $r->nombres." ".$r->primerApellido." ".$r->segundoApellido .'</td>
    <td>'. $r->nombreMunicipio .'</td>
    <td class="center">
      <a class="btn btn-info btn-sm tooltips" role="button" href="?c=paciente&a=Detalles&idPaciente='. $r->idPaciente .'" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de paciente"><i class="fa fa-eye"></i></a>
    </td>';
    if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
      echo 
      '<td class="center">
      <a class="btn btn-primary btn-sm" role="button" href="?c=paciente&a=Crud&idPaciente='. $r->idPaciente .'"><i class="fa fa-edit"></i></a>
    </td>
    <td class="center">
      <a class="btn btn-danger btn-sm" onclick="eliminarPaciente('; echo $r->idPaciente; echo ')" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
    </td>';
  } 
  echo '</tr>';
  endforeach; 
}


public function Inforegistro(){
  $idPaciente = $_POST['idPaciente'];
  $infoRegistro=$this->model->ObtenerInfoRegistro($idPaciente);
  $infoActualizacion=$this->model->ListarActualizacion($infoRegistro->idRegistro);

  echo   '
  <div class="modal-body">
    <div class="row">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-bottom: 12px;">
            <div class="col-sm-12">
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Información general de registro</h2>
            </div>
          </div>
        </div>
        <div class="porlets-content" style="margin-bottom: -65px;">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-6 lblinfo" style="margin-top: 5px;"><b>Paciente</b></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Curp:</b></label>
                    <label class="col-sm-7 control-label">'.$infoRegistro->curp.'</label>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Primer apellido:</b></label>
                    <label class="col-sm-7 control-label">'.$infoRegistro->primerApellido.'</label>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Segundo apellido:</b></label>
                    <label class="col-sm-7 control-label">'.$infoRegistro->segundoApellido.'</label>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Nombre(s):</b></label>
                    <label class="col-sm-7 control-label">'.$infoRegistro->nombres.'</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-5 lblinfo" style="margin-top: 5px;"><b>Información de registro</b></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><strong>Usuario que registró:</strong></label>
                    <label class="col-sm-6">'.$infoRegistro->usuario.'</label><br>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><strong>Dirección:</strong></label>
                    <label class="col-sm-6">'.$infoRegistro->direccion.'</label><br>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><strong>Fecha y hora de registro:</strong></label>
                    <label class="col-sm-6">'.$infoRegistro->fechaAlta.'</label><br>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detallet"><strong>Estado de registro:</strong></label>
                    <label class="col-sm-6" style="color:#64DD17"><b>'.$infoRegistro->estado.'</b></label><br>
                  </div>
                </td>
              </tr>';
              if($infoActualizacion!=null) {
                echo '
                <tr>
                  <td>
                    <div class="col-md-12">
                      <label class="col-sm-5 lblinfo" style="margin-top: 5px;"><b>Información de actualización</b></label>
                    </div>
                  </td>
                </tr>
                <tr><td><br>';
                  $i=1;
                  foreach ($infoActualizacion as $r):
                    echo '
                  <div class="col-md-6">
                    <label class="col-md-12" lbl-detalle style="color:#607D8B;">'.$i.'° actualización</label>
                    <label class="col-sm-5 lbl-detallet"><strong>Fecha y hora:</strong></label>
                    <label class="col-sm-7">'.$r->fechaActualizacion.'</label><br>
                    <label class="col-sm-5 lbl-detallet"><strong>Usuario:</strong></label>
                    <label class="col-sm-7">'.$r->usuario.'</label><br>
                  </div>
                  ';
                  if($i%2==0){
                    echo "<hr>";
                  }$i++;
                  endforeach;
                  echo '</td></tr>';
                }
                echo '
              </tbody>
            </table>
          </div><!--/porlets-content-->
        </div><!--/block-web-->
      </div>
    </div>
    <div class="modal-footer">
      <div class="row col-md-6 col-md-offset-6">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
        <a href="?c=paciente&a=Detalles&idPaciente='.$idPaciente.'" class="btn btn-info btn-sm">Ver detalles de beneficiario</a>
      </div>
    </div>';
  }

  public function EditarTx(){
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



  public function ListarLocalidades(){
    header('Content-Type: application/json');
    $idMunicipio=$_REQUEST['idMunicipio'];
    $obMunicipio=$this->model->ObtenerMunicipio($idMunicipio);

    if($obMunicipio!=null){

      $municipio=$obMunicipio->nombreMunicipio;
      $datos = array();
      $row_array['estado']='ok';
      array_push($datos, $row_array);

      foreach ($this->model->ListarLocalidades($municipio) as $localidad):
        $row_array['idLocalidad']  = $localidad->idLocalidad;
      $row_array['localidad']  = $localidad->localidad;
      array_push($datos, $row_array);
      endforeach;
    }
    echo json_encode($datos, JSON_FORCE_OBJECT);
  }

  public function ListarAsentamientos(){
    header('Content-Type: application/json');
    $idLocalidad=$_REQUEST['idLocalidad'];
    $obLocalidad=$this->model->ObtenerLocalidad($idLocalidad);
    if($obLocalidad!=null){
      $localidad=$obLocalidad->localidad;
      $datos = array();
      $row_array['estado']='ok';
      array_push($datos, $row_array);
      foreach ($this->model->ListarAsentamientos($localidad) as $asentamiento):
        $row_array['idAsentamientos']  = $asentamiento->idAsentamientos;
      $row_array['nombreAsentamiento']  = $asentamiento->nombreAsentamiento;
      array_push($datos, $row_array);
      endforeach;
    }
    echo json_encode($datos, JSON_FORCE_OBJECT);
  }

public function CrudEditarTx(){       
    foreach ($this->model->ObtenerTx($_REQUEST['idTx']) as $p) {
    echo '<form action="?c=paciente&a=ActualizarTx'; 
    if($_REQUEST['idTx']!=null){ 
        echo '&idTx='.$_REQUEST['idTx'];
    } 
    echo'" id="form-curp"; enctype="multipart/form-data" method="post" parsley-validate novalidate-->
        <div class="modal-body">
            <div class="row">
                <div class="block-web">
                    <div class="header">
                        <h3 class="content-header h3subtitulo">&nbsp;Editar Tx</h3>
                    </div>
                    <div class="porlets-content" style="margin-bottom: -50px;">
                        <input hidden name="idTx" id="idTx" value="' ; echo $p->idTx; echo'"/>
                        <input hidden name="idPaciente" id="idPaciente" value="' ; echo $p->idPaciente; echo'"/>

                    <div class="form-group">
                        <div class="col-sm-4 center">
                            <label>Tx Realizado: </label>
                        </div>
                        <div class="col-sm-8 center" >
                            <input name="nombre" value="' ; echo $p->nombre; echo '" maxlength="50" id="nombre" type="text"   onkeyup="mayus(this);" class="form-control" placeholder="Ingrese el nombre del Tx Realizado" required">
                        </div>
                    </div><!--/form-group--> <br><br>
                    
                    <div class="form-group">
                        <div class="col-sm-4 center">
                            <label>Fecha: </label>
                        </div>
                        <div class="col-sm-8">
                            <input name="fecha" id="fecha" type="date" class="form-control" value="' ; echo $p->fecha; echo '">
                        </div>
                    </div><!--/form-group--> <br><br>

                    <div class="form-group">
                        <div class="col-sm-4 center">
                            <label>Costo: </label>
                        </div>
                        <div class="col-sm-8">
                            <input name="costo" id="costo" type="number" class="form-control" value="' ; echo $p->costo; echo '" placeholder="Costo" required>
                        </div>
                    </div><!--/form-group--> <br><br>

                    <div class="form-group">
                        <div class="col-sm-4 center">
                            <label>Cantidad: </label>
                        </div>
                        <div class="col-sm-8">
                            <input name="cantidad" id="cantidad" type="number" class="form-control" value="' ; echo $p->cantidad; echo '" placeholder="cantidad" required>
                        </div>
                    </div><!--/form-group-->
                </div><!--/block-web-->
            </div>
        </div> <br><br>
        <div class="modal-footer" style="margin-top: -10px;">
            <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </div>
    </form>
     '; 
     }
}

public function CrudEditarPago(){       
    foreach ($this->model->ObtenerPago($_REQUEST['idPago']) as $p) {
    echo '<form action="?c=paciente&a=ActualizarPago'; 
    if($_REQUEST['idPago']!=null){ 
        echo '&idPago='.$_REQUEST['idPago'];
    } 
    echo'" id="form-curp"; enctype="multipart/form-data" method="post" parsley-validate novalidate-->
        <div class="modal-body">
            <div class="row">
                <div class="block-web">
                    <div class="header">
                        <h3 class="content-header h3subtitulo">&nbsp;Editar datos del pago</h3>
                    </div>
                    <div class="porlets-content" style="margin-bottom: -50px;">

                        <input hidden name="idTx" id="idTx" value="' ; echo $p->idPago; echo'"/>
                        <input hidden name="idPaciente" id="idPaciente" value="' ; echo $p->idPaciente; echo'"/>
                        
                        <div class="form-group">
                            <div class="col-sm-4 center">
                                <label>Fecha: </label>
                            </div>
                            <div class="col-sm-8">
                                <input name="fecha" id="fecha" type="date" class="form-control" value="' ; echo $p->fecha; echo '">
                            </div>
                        </div><!--/form-group--> <br><br>

                        <div class="form-group">
                            <div class="col-sm-4 center">
                                <label>Abono: </label>
                            </div>
                            <div class="col-sm-8">
                                <input name="abono" id="abono" type="text" class="form-control" required value="' ; echo $p->abono; echo '">
                            </div>
                        </div><!--/form-group--> <br><br>

                        <div class="form-group">
                            <div class="col-sm-4 center">
                                <label>Saldo: </label>
                            </div>
                            <div class="col-sm-8">
                                <input name="saldo" id="saldo" type="number" class="form-control" disabled value="' ; echo $p->saldo; echo '">
                            </div>
                        </div><!--/form-group--> <br><br>
                    </div><!--/porlets-content-->
                </div><!--/block-web-->
            </div>
        </div> <br><br>
        <div class="modal-footer" style="margin-top: -10px;">
            <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </div>
    </form>
     '; 
    }
}



}
