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
$fc= findCourse($College);
$assignee = findAssignee($fc);
$Purpose= $_POST['Purpose'];
$formtype= $_POST['formtype'];
//dateapplied
// var_dump();


if (in_array("DIPLOMA", $_POST['request']) && count($_POST['request']) > 1 ){
     $requests2= implode(",",$_POST['request']);
      $req = array_diff($_POST['request'],['DIPLOMA']);
      $requests= implode(",",$req);
      $da = date('Y-m-d');
      //duedate
      $function = new findDate($da,$requests);
      $dd = $function->findDueDate();
      $dd = $dd->format('Y-m-d');
      $transaction3 = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,$requests2,$da,$dd,$assignee,$formtype);
      $transaction3->insertTransaction();
      $transaction = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,$requests,$da,$dd,$assignee,$formtype);
      $transaction->insertWork();

      $assignee2 = findDiplomaMaker();
      $transaction2 = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,'DIPLOMA',$da,$dd,$assignee2,$formtype);
      $transaction2->insertWork();
       header("location:../../nTransaction.php?status=Success");
  }elseif (in_array("DIPLOMA", $_POST['request']) && count($_POST['request']) == 1) {
      $da = date('Y-m-d');
      $requests= implode(",",$_POST['request']);
      $function = new findDate($da,$requests);
      $dd = $function->findDueDate();
      $dd = $dd->format('Y-m-d');
      $assignee2 = findDiplomaMaker();
      $transaction2 = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,'DIPLOMA',$da,$dd,$assignee2,$formtype);
      $transaction2->insertTransaction();
      $transaction2->insertWork();
      header("location:../../nTransaction.php?status=Success");

  }else{
      $requests= implode(",",$_POST['request']);
      $da = date('Y-m-d');
      //duedate
      $function = new findDate($da,$requests);
      $dd = $function->findDueDate();
      $dd = $dd->format('Y-m-d');
      $transaction = new transaction($studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,$requests,$da,$dd,$assignee,$formtype);
      $transaction->insertTransaction();
      $transaction->insertWork();
       header("location:../../nTransaction.php?status=Success");
  }

}



  ?>
