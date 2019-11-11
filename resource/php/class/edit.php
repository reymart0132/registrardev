<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
class edit extends config{



  public function editQuote(){
    if (isset($_POST['quote'])) {
      $config = new config;
      $con = $config->con();
      $id = $_GET['id'];
      $quote = $_POST['quote'];
      $sql = "UPDATE `tbl_accounts` SET `quote` = '$quote' WHERE `id` = '$id'";
      $data = $con-> prepare($sql);
      $data->execute();

      Redirect::to('..\registrardev\resource\php\AdminSra.php');
    }
  }
}
?>
