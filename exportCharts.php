<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
// // header("Content-Type: application/xls");
// // header("Content-Disposition: attachment; filename=filename.xls");
// // header("Pragma: no-cache");
// // header("Expires: 0");
// $view= new view;
// if (isset($_GET['search'])) {
// $view->chartexport();
// }else {
// $view->chartexport();
// }


// $r1 = $_SESSION['r1'];
// $r1 = $_SESSION['r2'];
// $r1 = $_SESSION['r3'];
// $r1 = $_SESSION['r4'];
// $r1 = $_SESSION['r5'];
//
// echo $r1;


header('Content-Type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename='.rand().'.xls');
echo $_GET["data"];
?>
