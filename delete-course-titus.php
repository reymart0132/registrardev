<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'\registrardev\resource\php\class\deletecoursefnc.php';

    $delete = new delete($_GET['course']);
    $delete->deletecourse();
    header("Location: course.php");
  ?>
