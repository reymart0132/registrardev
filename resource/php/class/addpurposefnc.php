<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class add extends config{
  public $purposes;

  function __construct($purposes=null){
    $this->purposes = $purposes;

}

public function addpurpose(){
    $config = new config;
    $con = $config->con();
    $purposes = $this->purposes;
    $sql = "INSERT INTO `tbl_purposes`(`purposes`) VALUES ('$purposes')";
    $data = $con-> prepare($sql);
    $data ->execute();
    var_dump($purposes);
}
}
?>
