<?php
require_once 'model/atm.php';

class ATMController{


  public function __CONSTRUCT(){
    $this->model = new ATM();
  }
}
?>