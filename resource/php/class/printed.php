<?php
require_once 'config.php';
class printed extends config{

  function __construct($printed=null){
    $this->printed = $printed;
  }

  public function print(){
      $config = new config;
      $con = $config->con();
      // var_dump($this->done)
      $sql = "UPDATE `work` SET `remarks`='PRINTED' WHERE `id` = $this->printed";
      $data = $con-> prepare($sql);
      $data ->execute();

  }
}

?>
