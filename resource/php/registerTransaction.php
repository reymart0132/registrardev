<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
if(!empty($_POST)) {
$studentN= $_POST['studentN'];
$ygle = $_POST['ygle'];
$Lastname = $_POST['Lastname'];
$Firstname= $_POST['Firstname'];
$Middlename= $_POST['Middlename'];
$Course= $_POST['Course'];
$ContactNumber= $_POST['ContactNumber'];
$Status= $_POST['Status'];
$College= $_POST['College'];
$Purpose= $_POST['Purpose'];
$requests= implode(",",$_POST['request']);
//dateapplied
$da = date('Y-m-d');
//duedate
$function = new findDate($da,$requests);
$dd = $function->findDueDate();
$dd = $dd->format('Y-m-d');

$transaction = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,$requests,$da,$dd);
$transaction->insertTransaction();
$transaction->insertWork();
 header("location:../../nTransaction.php?status=Success");
}
  ?>
