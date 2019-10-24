<?php
session_start();
$GLOBALS['config'] = array(
    'mysql'=>array(
        'host' => '127.0.0.1',
        'username' =>'root',
        'password' =>'',
        'db'=>'srmd'
    ),
    'remember'=>array(
        'cookie_name' => 'hash',
        'cookie_expiry' =>604800
    ),
    'session'=>array(
        'session_name' =>'user',
        'token_name' =>'token'
    )
);

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/'.$class.'.php';

});
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/functions/sanitize.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/functions/funct.php';
 ?>
