<?php
require_once 'model/histClinico.php';

class PacienteController{


  public function __CONSTRUCT(){
    $this->model = new HistorialClinico();
  }
}
?>