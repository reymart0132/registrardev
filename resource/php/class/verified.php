<?php
require_once 'config.php';
class verified extends config{

  function __construct($printed=null){
    $this->printed = $printed;
  }

  public function verify(){
      $config = new config;
      $con = $config->con();
      // var_dump($this->done)
      $sql = "UPDATE `work` SET `remarks`='VERIFIED' WHERE `id` = $this->printed";
      $data = $con-> prepare($sql);
      $data ->execute();

  }
}

?>
