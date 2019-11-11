<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'\registrardev\resource\php\class\deletepurposefnc.php';

    $delete = new delete($_GET['purposes']);
    $delete->deletepurposes();
      // header("Location: Reqpurposes.php");
  ?>
