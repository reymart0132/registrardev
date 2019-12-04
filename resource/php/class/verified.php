<?php
require_once 'config.php';
class verified extends config{

    function __construct($printed=null,$user=null){
      $this->printed = $printed;
      $this->user = $user;
      $this->date = date('Y-m-d');

    }

  public function verify(){
      $config = new config;
      $con = $config->con();
      $sql = "UPDATE `work` SET `remarks`='VERIFIED 'WHERE `id` = $this->printed && `assignee` =$this->user";
      $data = $con-> prepare($sql);
      $data ->execute();
      $sql2 = "UPDATE `applications` SET `datesigned`='$this->date' WHERE `id` = $this->printed";
      $data2 = $con-> prepare($sql2);
      $data2->execute();

  }

  public function verifyAdmin(){
      $config = new config;
      $con = $config->con();
      $sql = "UPDATE `work` SET `remarks`='VERIFIED'WHERE `id` = $this->printed";
      $data = $con-> prepare($sql);
      $data ->execute();
      $sql2 = "UPDATE `applications` SET`datesigned`='$this->date' WHERE `id` = $this->printed";
      $data2 = $con-> prepare($sql2);
      $data2->execute();

  }

  public function verifyUser(){
    $config = new config;
    $con = $config->con();
    $sql = "UPDATE `tbl_verification` SET `remarks`='VERIFIED', `date_verified`='$this->date',`verified_by`= '$this->user' WHERE `id` = $this->printed && `assignee` =$this->user";
    $data = $con-> prepare($sql);
    $data ->execute();
  }

  public function verifyUserAdmin(){
    $config = new config;
    $con = $config->con();
    $sql = "UPDATE `tbl_verification` SET `remarks`='VERIFIED', `date_verified`='$this->date',`verified_by`= '$this->user' WHERE `id` = $this->printed";
    $data = $con-> prepare($sql);
    $data ->execute();
  }
}

?>
