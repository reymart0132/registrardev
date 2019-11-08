<?php
require_once 'config.php';
class printed extends config{

  function __construct($printed=null,$user=null){
    $this->printed = $printed;
    $this->user = $user;
    $this->date = date('Y-m-d');

  }

  public function print(){
      $config = new config;
      $con = $config->con();
      // var_dump($this->done)
      $sql = "UPDATE `work` SET `remarks`='PRINTED',`printedby`=$this->user,`printeddate`='$this->date' WHERE `id` = $this->printed";
      $data = $con-> prepare($sql);
      $data ->execute();
      $sql2 = "UPDATE `applications` SET`1st_print`='$this->date',`Printed_date`='$this->date',`Checked_by`=$this->user,`Checked_date`='$this->date',`Verified_by`=$this->user,`Verified_date`='$this->date' WHERE `id` = $this->printed";
      $data2 = $con-> prepare($sql2);
      $data2->execute();

  }
}

?>
