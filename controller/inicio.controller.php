<?php
require_once 'model/agenda.php';

class InicioController{
	private $model;
	private $mensaje;
  	private $error;

  public function __CONSTRUCT(){
    $this->model = new agenda();
  }

  public function Index(){
    $inicio=true;
    $page="body.php";
    require_once 'view/index.php';
  } 
  public function Wizard(){
  	$page="pruebawizard.php";
    require_once 'view/index.php';
  }
} 
?>