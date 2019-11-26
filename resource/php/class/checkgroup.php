<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';
class checkgroup extends config{

  public function checkuser(){
    $user = new user();
    $gr = $user->data()->groups;
    if ($gr == 1) {
    }else {
      header('location:view_pending_requests.php');
    }
  }
  public function checkadmin(){
    $user = new user();
    $gr = $user->data()->groups;
    if ($gr == 2) {
    }else {
      header('location:pending.php');
    }
  }
}
 ?>
