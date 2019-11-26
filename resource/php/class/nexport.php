<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';
class nexport extends config{
  public $results;
  public function exportchartlabel(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
    echo  $row->username.',';
    }
  }
public function exporttwork(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
      $id = $row->id;
      if(!empty($_GET)){
      $date = date('Y-m-d');
      $cfd=date('Y-m-01', strtotime($date));
      $cld=date('Y-m-t', strtotime($date));
      $cld = $_GET['cld'];
      $cfd = $_GET['cfd'];
      $sql = "SELECT * FROM `work` WHERE (`Date_app`  BETWEEN '$cfd' AND '$cld') AND `assignee` = $id";
    }else{
      $sql = "SELECT * FROM `work` WHERE `Date_app` = CURDATE() AND `assignee` = $id";
    }
    $data = $con-> prepare($sql);
    $data ->execute();
    $results =$data->rowCount();
    $this->results = $results;
    echo  $results.',';
    }

  }

public function exporkcwork(){
  $config = new config;
  $con = $config->con();
  $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
  $data = $con-> prepare($sql);
  $data ->execute();
  $rows =$data-> fetchAll(PDO::FETCH_OBJ);
  foreach ($rows as $row) {
    $id = $row->id;
      if(isset($_GET['search'])){
        $date = date('Y-m-d');
        $cfd=date('Y-m-01', strtotime($date));
        $cld=date('Y-m-t', strtotime($date));
        $cld = $_GET['cld'];
        $cfd = $_GET['cfd'];
        $sql = "SELECT * FROM `work` WHERE `printedby` =$id AND (`printeddate` BETWEEN '$cfd' AND '$cld')";
      }else{
        $sql = "SELECT * FROM `work` WHERE `printedby` =$id AND `printeddate` = CURDATE()";
      }
      $data = $con-> prepare($sql);
      $data ->execute();
      $results =$data->rowCount();
      echo $results.',';
  }
}
public function exportcpending(){
  $config = new config;
  $con = $config->con();
  $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
  $data = $con-> prepare($sql);
  $data ->execute();
  $rows =$data-> fetchAll(PDO::FETCH_OBJ);
  foreach ($rows as $row) {
    $id = $row->id;
    if(isset($_GET['search'])){
    $date = date('Y-m-d');
    $cfd=date('Y-m-01', strtotime($date));
    $cld=date('Y-m-t', strtotime($date));
    $cld = $_GET['cld'];
    $cfd = $_GET['cfd'];
    $sql = "SELECT * FROM `work` WHERE  `assignee` = '$id'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $products =$data-> fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
        $printeddate = $product->printeddate;
        if (IS_NULL($printeddate)) {
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id' AND(`Date_App` >= '$cfd' AND  `printeddate` IS NULL) UNION SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id' AND (`Date_App` >= '$cfd' AND `printeddate` > '$cld')";
          }else {

          }
        }
      }else{
        $sql = "SELECT * FROM `work` WHERE  `assignee` = '$id'";
        $data = $con-> prepare($sql);
        $data ->execute();
        $products =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($products as $product) {
            $printeddate = $product->printeddate;
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id'";
          }
      }

    $data = $con-> prepare($sql);
    $data ->execute();
    $results =$data->rowCount();
    echo $results.',';
  }
}

public function exportchartreleased(){
  $config = new config;
  $con = $config->con();
  $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
  $data = $con-> prepare($sql);
  $data ->execute();
  $rows =$data-> fetchAll(PDO::FETCH_OBJ);
  foreach ($rows as $row) {
    $id = $row->id;
    if(isset($_GET['search'])){
    $date = date('Y-m-d');
    $cfd=date('Y-m-01', strtotime($date));
    $cld=date('Y-m-t', strtotime($date));
    $cld = $_GET['cld'];
    $cfd = $_GET['cfd'];
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby` = $id AND (`released_date` BETWEEN $cfd AND $cld)";
      }else{
        $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby` = '$id' AND `released_date` = CURDATE()";
      }
    $data = $con-> prepare($sql);
    $data ->execute();
    $results =$data->rowCount();
    echo $results.',';
  }
}
}
 ?>
