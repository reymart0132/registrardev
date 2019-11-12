<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class add extends config{
  public $request;

  function __construct($request=null){
    $this->request = $request;

}

public function addrequest(){
    $config = new config;
    $con = $config->con();
    $request = $this->request;
    $sql = "INSERT INTO `tbl_applied_for`(`appliedfor`) VALUES ('$request')";
    $data = $con-> prepare($sql);
    $data ->execute();
    header('Location: nTransaction.php');
    // var_dump($data);
    die();
}
}
?>
