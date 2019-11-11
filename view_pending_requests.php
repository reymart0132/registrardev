<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/viewPending.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$viewP= new viewPending;
$view = new view;
$user = new user();
isLogin();
if(isset($_GET['printed'])){
  $print = new printed($_GET['printed'],$_GET['id']);
  $print->print();
}
if(isset($_GET['released'])){
  $release = new released($_GET['released'],$_GET['id']);
  $release->release();
}
if(isset($_GET['verified'])){
  $print = new verified($_GET['verified'],$_GET['id']);
  $print->verify();
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
<body class="">
        <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container-fluid mt-4">
          <div class="row">
            <!--  -->
            <div class="col-5 ">
              <div class="row">
                <div class="col-4 ">

                    <a href="AdminSra.php" class="out "><span class="fas fa-id-card mt-3 " href="#"></span>&nbsp;View SRA</a>

                </div>

        <div class="container-fluid mt-4 puff-in-center">

            <!-- dito kayo!!!!!- -->
            <form class="" action="" method="post">
              <input type="submit" name="submit" />
            </form>
            <?php
            if (isset($_POST['sort'])) {
              $viewP->viewSort();
            }else {
              $viewP->viewData();
            }
             ?>
        </div>
</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom  slide-in-right">
  <div class="container text-center">
      <div class="row">
          <div class="col col-sm-5 text-left">
              <small>Copyright &copy;Centro Escolar University     Office of the Registrar 2019</small>
          </div>
          <div class="col text-right">
              <small>Created by: Reymart Bolasoc, Amelia Valencia , James Mangalile, Kenneth De Leon , Pamela Reyes , Ellen Mijares</small>
          </div>
      </div>
  </div>
</footer>
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
