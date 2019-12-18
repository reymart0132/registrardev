<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
$user = new user();
isLogin();
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
    <a href="exporttableAdmin.php"><i class="fas fa-table ceucolor"></i></a>
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
    $view->chartexport();
     ?>
   </div>
   <div class="container">
     <form class="" action="" method="get">
       <div class="row">
         <div class="col-5">
           <label for="dateFrom">From:</label>
           <input  class="form-control" type="date" name="cfd"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
         </div>
         <div class="col-5">
           <label for="dateTo">To:</label>
           <input  class="form-control" type="date" name="cld"  placeholder="dd-mm-yyyy">
         </div>
         <div class="col-2 mt-4 pt-2">
           <label for="submit"></label>
           <input type="submit" class="btn text-white" name="search" value="Search" style="background-color:#DC65A1;">
         </div>
       </div>
     </form>
   </div>
   <button name="create_excel" id="create_excel" class="btn btn-success">Create Excel File</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
    <script>
    $(document).ready(function(){
         $('#create_excel').click(function(){
              var excel_data = $('#activity').html();
              var page = "exportCharts.php?data=" + excel_data;
              window.location = page;
         });
    });
    </script>
</body>
</html>
