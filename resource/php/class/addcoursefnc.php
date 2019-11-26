<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class add extends config{
  public $course;

  function __construct($course=null){
    $this->course = $course;

}

public function addcourse(){
    $config = new config;
    $con = $config->con();
    $course = $this->course;
    $sql = "INSERT INTO `tbl_course`(`course`,`state`) VALUES ('$course','active')";
    $data = $con-> prepare($sql);
    $data ->execute();
}
}
?>
