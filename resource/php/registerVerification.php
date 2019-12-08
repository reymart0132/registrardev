<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';

$user = new user();
$gr = $user->data()->groups;

if(!empty($_POST)) {
$ygle = $_POST['ygle'];
$FullName = $_POST['FullName'];
$Course= findCourse2($_POST['Course']);
$Status= $_POST['Status'];
$College= findCourse($_POST['College']);
$cemail=$_POST['Email'];
$da = date('Y-m-d');
$assignee = findAssignee($College);
//duedate
$function = new findDate($da);
$dd = $function->findDueDateV();
$dd = $dd->format('Y-m-d');
$verification = new userverification($ygle,$FullName,$Course,$College,$dd,$da,$assignee,$Status,$cemail);
$verification->insertVerification();

if ($gr == 1) {
  header("location:../../userVerification.php?status=Success");
}else {
  header("location:../../userVerificationAdmin.php?status=Success");
}

}else{
  if ($gr == 1) {
    header("location:../../userVerification.php");
  }else {
    header("location:../../userVerificationAdmin.php");
  }
}
?>
