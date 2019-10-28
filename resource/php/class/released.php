<?php
require_once 'config.php';
class released extends config{

  function __construct($released=null){
    $this->released = $released;
  }

  public function release(){
      $config = new config;
      $con = $config->con();
      // var_dump($this->done)
      $sql = "UPDATE `work` SET `remarks`='VERIFIED' WHERE `id` = $this->released";
      $data = $con-> prepare($sql);
      $data ->execute();

  }
}

?>
