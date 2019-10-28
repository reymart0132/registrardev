<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';

$user = new User();
if($user->isLoggedIn()){
    echo "logged in";
}

 ?>
