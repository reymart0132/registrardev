<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/viewReport.php';
$view = new viewReport;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap.min.css">
  <link href="../../vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="../../resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap-select.min.css">

</head>
<body>
        <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="../../resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container-fluid mt-4 puff-in-center">
            <!--dito kayo!!!!!----->
            <form action="" method="post">
              <label for="dateFrom">From: </label>
              <input type="date" name="dateFrom" data-date-format="YYYY MMMM DD" />
              <label for="dateTo">To: </label>
              <input type="date" name="dateTo" />
              <label for="record">Record Type:</label>

              <select name="record">
                <option value="TOR">TOR</option>
                <option value="Cert of Candidacy">Certificate of Candidacy</option>
              </select>
              <input type="text" name="remark" />

              <input type="submit" name="submit" value="Filter">
            </form>
            <?php
            if (isset($_POST['submit'])) {

              $viewDate = new viewReport($_POST['dateFrom'],$_POST['dateTo'],$_POST['remark']);
              $viewDate->viewByCriteria();

            }else {
              $view-> viewData();
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
