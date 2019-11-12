<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/charts.php';
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
 <body>
     <?php blocker()?>
   <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
     <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
       <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
         alt="mdb logo">
         <h3 class="ib">
     </a>
        <a href="stats.php"><i class="fas fa-chart-line ceucolor"></i></a>
        <a href="ntransaction.php"><i class="fas fa-file-upload ceucolor"></i></a>
        <a href="pending.php"><i class="fas fa-home ceucolor"></i></a>
        <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
        <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
        <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
   </nav>
 <!--  -->
 <div class="container-fluid mt-4 slide-in-left">
     <div class="row">
         <div class="col-12">
             <h1 class="text-center">Productivity Report for Today( <?php echo $today = date("F j, Y");  ?> )</h1>
         </div>
    </div>
   <!--  -->
   <div class="container-fluid my-4 mb-5 pb-5">
     <div class="row justify-content-center mb-5">
         <div class="col-4">
             <h6 class="text-center"> Total Transactions Received </h6>
           <canvas id="twork"></canvas>
         </div>

       <div class="col-4">
           <h6 class="text-center"> Total Completed Transactions </h6>
         <canvas id="cwork"></canvas>
       </div>
     </div>
     <div class="row mb-2 justify-content-center">
         <div class="col-4">
             <h6 class="text-center"> Total of Pending Transactions </h6>
           <canvas id="pending"></canvas>
         </div>
       <div class="col-4">
           <h6 class="text-center"> Total of Transactions Released </h6>
         <canvas id="released"></canvas>
       </div>
     </div>
        <form method="post" action="export.php">
            <button type="submit" name="export" class="btn btn-primary export heartbeat icon-2x">
                <i class="fas fa-download"></i>
            </button>
        </form>
    </div>
</div>

<form class="" action="" method="GET">
  <div class="col-sm">
             <label for="dateFrom">From:</label>
             <input  class="form-control" type="date" name="cfd" value=""  data-date-format="YYYY MMMM DD">
           </div>
           <div class="col-sm">
             <label for="dateTo">To:</label>
             <input  class="form-control" type="date" name="cld" value="" >
           </div>
           <input type="submit" name="search" value="search">
</form>
 </body>

     <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script>
     <script src="vendor/js/chartjs.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 </body>
 </html>
