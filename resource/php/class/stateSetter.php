<?php
require_once 'config.php';
class stateSetter extends config{
  public $state;
  public $id;

  function __construct($id=null){
    $this->id = $id;
  }

  public function stateCourse(){

    if ($_GET['stateCourse'] == 'inactive') {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_course` SET `state` = 'active' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }else {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_course` SET `state` = 'inactive' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }
  }

  //
  public function stateCollege(){

    if ($_GET['stateCollege'] == 'inactive') {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `collegeschool` SET `state` = 'active' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }else {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `collegeschool` SET `state` = 'inactive' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }
  }
  //
  public function stateAppliedFor(){

    if ($_GET['stateAppliedFor'] == 'inactive') {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_applied_for` SET `state` = 'active' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }else {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_applied_for` SET `state` = 'inactive' WHERE `id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }
  }
  //
  public function statePurposes(){
    echo "test";
    if ($_GET['purpose'] == 'inactive') {
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_purposes` SET `state` = 'active' WHERE `purp_id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }else{
      $config = new config;
      $con = $config->con();
      $sql = $sql = "UPDATE `tbl_purposes` SET `state` = 'inactive' WHERE `purp_id` = '$this->id'";
      $data = $con-> prepare($sql);
      $data->execute();
    }
  }
}

?>
