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
          <a href="stats.php"><i class="fas fa-chart-line ceucolor"></i></a>
          <a href="nTransactionAdmin.php"><i class="fas fa-file-upload ceucolor"></i></a>
          <a href="view_pending_requests.php"><i class="fas fa-home ceucolor"></i></a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>

                </div>

            </div>
            <form method="POST">
            <div class="row">
                <table class="table">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="request">Request For:</label>
                                      <input type="text" class="form-control" id="request" name="request" placeholder="Enter Request" required>
                                    </div>
                                        </td>
                                        </tr>
                                        </table>
                                        <div class="form-group col-2  ml-2">
                                         <input type="submit" name="submit" value="Submit Request" class="form-control btn btn-primary" />
                                        </div>


</body>


    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
