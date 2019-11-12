<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class delete extends config{
  public $id;

  function __construct($id=null){
    $this->id = $id;
}

  public function deletecourse(){
    $config = new config;
    $con = $config->con();
    $id = $this->id;
    var_dump($id);
    $sql = "DELETE FROM `tbl_course` WHERE `id` = $id ";
    $data = $con->prepare($sql);
    $data->execute();
  }

}

 ?>
