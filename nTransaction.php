<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;

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
    <?php blocker()?>
        <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
          <a href="stats.php"><i class="fas fa-chart-line ceucolor"></i></a>
          <a href="ntransaction.php"><i class="fas fa-file-upload ceucolor"></i></a>
          <a href="pending.php"><i class="fas fa-home ceucolor"></i></a>
          <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
          <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
          <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container mt-4 puff-in-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">New Transaction</h1>
                </div>
                <?php if (!empty($_GET)) {
                    CheckSuccess($_GET['status']);
                }?>
            </div>
            <form action="/registrardev/resource/php/registerTransaction.php" method="POST">
            <div class="row">
                <table class="table ">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-5">
                                      <label for="studentN">Student Number(Optional)</label>
                                      <input type="number" class="form-control" id="studentN" onkeypress="return isNumber(event)" value="" name="studentN" aria-describedby="emailHelp" placeholder="Enter Student Number">
                                    </div>
                                    <div class="form-group col-5">
                                      <label for="studentN">Year Graduated or Last Enrolled</label>
                                      <input type="number" min="1900" max="2099" step="1" value="2019" class="form-control" id="studentN" name="ygle" aria-describedby="emailHelp" placeholder="Enter  Year Graduated or Last Enrolled" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Lastname">Lastname</label>
                                      <input type="text" class="form-control" id="Lastname" oninput="this.value = this.value.toUpperCase()"  name="Lastname" aria-describedby="emailHelp" placeholder="Enter Lastname" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Firstname">Firstname</label>
                                      <input type="text" class="form-control" id="Firstname" oninput="this.value = this.value.toUpperCase()"  name="Firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Middlename">Middlename</label>
                                      <input type="text" class="form-control" id="Middlename" oninput="this.value = this.value.toUpperCase()"  name="Middlename" aria-describedby="emailHelp" placeholder="Enter Middlename" required>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Course" >Course</label>
                                          <select id="Course" name="Course" class="selectpicker form-control" data-live-search="true">
                                            <?php $view->degreeCourseSP();?>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="ContactNumber">Contact Number</label>
                                      <input type="text" class="form-control" id="txtChar" name="ContactNumber" onkeydown="return isNumberKey(event)" aria-describedby="emailHelp" placeholder="Enter Contact Number" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="ContactNumber">Status</label>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="Status" id="Graduate" value="Graduate" checked>
                                              <label class="form-check-label" for="Graduate">Graduate</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="Status" id="Undergraduate" value="Undergrad">
                                              <label class="form-check-label" for="Undergraduate">Undergraduate</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="College" >College</label>
                                          <select id="College" name="College" class="selectpicker form-control" data-live-search="true">
                                            <?php $view->collegeSP();?>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="request" >Requesting for:</label>
                                          <select id="request" name="request[]" class="selectpicker form-control" data-live-search="true" multiple required>
                                            <?php $view->requestingForSP();?>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Purpose" >Reason for Requesting</label>
                                          <select id="Purpose" name="Purpose" class="selectpicker form-control" data-live-search="true" >
                                            <?php $view->reasonFA();?>
                                          </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="form-group col-5">
                                        <label  >&nbsp;</label>
                                     <input type="submit" value="Submit Request" class=" form-control btn btn-primary" />
                                    </div>
                                    <div class="form-group col-7">
                                        <label  >&nbsp;</label>
                                        <small id="emailHelp" class="form-text text-muted">In compliance to<b> DATA PRIVACY ACT of 2012 (<em>R.A. No. 10173, Ch. 1 Sec 2)</em></b>.
                                            <p>If Client cannot come personally, the following are the requirements of Authorized Person:</p>
                                            <p class="mb-0">1. Authorization Letter</p>
                                            <p class="mb-0">2. ID of the Applicant and Authorized person with specimen signature(Xerox Copy)</p>
                                        </small>
                                    </div>
                                </div>
                            </td>
                        </tr>
                </table>
            </div>
        </form>
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
    <script src="resource/js/studentnumber-chua.js"></script>
    <script src="resource/js/noletter-waris.js"></script>




</body>
</html>
