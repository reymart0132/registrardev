<?php
require_once $_SERVER['DOCUMENT_ROOT'].'\registrardev\resource\php\class\insertRequesting.php';
if(isset($_POST['submit'])){
  $add = new add($_POST['request']);
  $add->addrequest();

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
    </div>

    <div class="container" style="">
      <div class="con text-center mt-5 pt-5">
        <h1 class="pb-3">Add a New Request Form</h1>
          <form method="POST" style="padding-left:300px; padding-right:300px;">
               <div class="form-group">
                 <input type="text" class="form-control" id="request" name="request" placeholder="Enter Request" style="height:50px;" required>
               </div>
             <div class="form-group">
                 <input type="submit" name="submit" value="Add Request" class="form-control btn btn-primary" />
              </div>
          </form>
      </div>
    </div>
</body>


    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
