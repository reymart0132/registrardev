<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$user = new user();

echo $user->data()->id;
 ?>
