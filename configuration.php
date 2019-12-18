<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$checkadmin = new checkgroup;
$checkadmin->checkadmin();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

</head>
<body>

        <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
          <a href="exportTableAdmin.php"><i class="fas fa-table ceucolor"></i></a>
          <a href="statsAdmin.php"><i class="fas fa-chart-line ceucolor"></i></a>
          <a href="userVerificationAdmin.php"><i class="fas fa-user-plus ceucolor"></i></a>
          <a href="verificationAdmin.php"><i class="fas fa-user-graduate ceucolor"></i></a>
          <a href="viewAlumniAdmin.php"><i class="fa fa-graduation-cap ceucolor"></i></a>
          <a href="nTransactionAdmin.php"><i class="fas fa-file-upload ceucolor"></i></a>
          <a href="view_pending_requests.php"><i class="fas fa-home ceucolor"></i></a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container mt-5">
         <div class="row justify-content-center">
             <div class="col-8 ">



                 <form class="text-center border border-light p-5 shadow puff-in-center" action="" method="post" >
                 <p class="h4 mb-4">Configuration Functions</p>


                 <div class="d-flex justify-content-around">
                     <div>
                         <div class="custom-control custom-checkbox">

                         </div>
                     </div>
                 </div>
                 <!-- <a class="btn btn-light btn-block my-4"value="" href="AdminSra.php" style="color:white;background-color :#DC65A1; ">Update SRA Quote</a> -->
                 <a class="btn btn-light btn-block my-4"value="" href="add-requesting-waris.php" style="color:white;background-color :#DC65A1; ">Requesting</a>
                 <a class="btn btn-light btn-block my-4"value="" href="add-new-college-chua.php" style="color:white;background-color :#DC65A1; ">Add College</a>
                 <a class="btn btn-light btn-block my-4"value="" href="AddPurpose.php" style="color:white;background-color :#DC65A1; ">Add a Reason for Request</a>
                 <a class="btn btn-light btn-block my-4"value="" href="course.php" style="color:white;background-color :#DC65A1; ">Add or Delete Courses</a>
                 <a class="btn btn-light btn-block my-4"value="" href="price.php" style="color:white;background-color :#DC65A1; ">Prices</a>
                 <a class="btn btn-light btn-block my-4"value="" href="state.php" style="color:white;background-color :#DC65A1; ">States</a>

                 <!-- <input type =hidden name="token" value="">
                 <input  type="submit"  href="AdminSra.php"  class="btn btn-dark btn-block my-4"value="Update Quote" />
                 <input  type="submit"  class="btn btn-dark btn-block my-4"value="Requesting"/>
                 <input  type="submit"  class="btn btn-dark btn-block my-4"value=" Add College"/>
                 <input  type="submit"  class="btn btn-dark btn-block my-4"value="Add or Delete Course"/> -->
                 </form>


                 <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom slide-in-right">
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
