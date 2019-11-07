<?php
require_once 'config.php';
class released extends config{

        function __construct($workid=null,$user=null){
          $this->workid = $workid;
          $this->user = $user;
          $this->date = date('Y-m-d');

        }

  public function release(){
      $config = new config;
      $con = $config->con();
      $sql = "UPDATE `work` SET `remarks`='RELEASED',`releasedby`='$this->user',`released_date`='$this->date' WHERE `id` = $this->workid";
      $data = $con-> prepare($sql);
      $data ->execute();
      $sql2 = "UPDATE `applications` SET`Released_by`='$this->user',`Released_date`='$this->date',`app_status`=2 WHERE `id` = $this->workid";
      $data2 = $con-> prepare($sql2);
      $data2->execute();
  }
}

?>
