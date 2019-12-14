<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
$user = new user();
isLogin();
if (isset($_GET['uprice'])) {
$view->changeprice();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link href="resource\css\animation-rami.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="resource/css/speech.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
</head>
<body>

  <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
    <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
      <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
        alt="mdb logo">
        <h3 class="ib">
    </a>
    <a href="exporttable.php"><i class="fas fa-table ceucolor"></i></a>
    <a href="stats.php"><i class="fas fa-chart-line ceucolor"></i></a>
    <a href="userVerification.php"><i class="fas fa-user-plus ceucolor"></i></a>
    <a href="verification.php"><i class="fas fa-user-graduate ceucolor"></i></a>
    <a href="viewAlumni.php"><i class="fa fa-graduation-cap ceucolor"></i></a>
    <a href="ntransaction.php"><i class="fas fa-file-upload ceucolor"></i></a>
    <a href="pending.php"><i class="fas fa-home ceucolor"></i></a>
       <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
       <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
       <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
  </nav>
  <div class="container-fluid mt-4 mb-5">
    <?php
    $view->showprice();
     ?>
   </div>

</body>

    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
    <script src="vendor/js/chartjs.js"></script>
</body>
</html>
