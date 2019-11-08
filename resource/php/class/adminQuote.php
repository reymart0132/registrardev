<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';
class edit extends config{

  public function selectID(){
    $id = $_GET['id'];
    $title = $_GET['title'];
    $artist = $_GET['artist'];
    $lyrics= $_GET['lyrics'];
    $sql = "SELECT * FROM tbl_accounts WHERE id=:id, quote=:quote";

    $config = new config();
    $pdo = $config->connectdb();
    $data = $pdo->prepare($sql);
    $data->execute([':id' => $id,':quote'=>$quote ]);
    $results = $data->fetchAll(PDO::FETCH_ASSOC);

  }

  public function edit(){
    if (isset($_POST['quote'])) {
      $id = $_GET['id'];
      $title = $_POST['quote'];

      $sql = "UPDATE tb_accounts SET quote='$quote' WHERE id = '$id'";
      $config = new config();
      $pdo = $config->connectdb();
      $data = $pdo->prepare($sql);
      $data->execute();
      header("Location: resource\php\AdminSra.php");
    }
  }
}
?>
