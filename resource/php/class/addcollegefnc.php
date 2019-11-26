<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class add extends config{
  public $college;

  function __construct($college=null){
    $this->college = $college;

}

public function addcollege(){
    $config = new config;
    $con = $config->con();
    $college = $this->college;
    $sql = "INSERT INTO `collegeschool` (`college_school`,`state`) VALUES ('$college','active')";
    $data = $con-> prepare($sql);
    $data ->execute();

}
}
?>
