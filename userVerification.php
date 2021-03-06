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
        <div class="container mt-4 puff-in-center mb-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">New User Verification</h1>
                </div>
                <?php if (!empty($_GET)) {
                    CheckSuccess($_GET['status']);
                }?>
            </div>
            <form action="/registrardev/resource/php/registerVerification.php" method="POST">
            <div class="row mb-5">
                <table class="table">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-5">
                                      <label for="studentN">Year Graduated or Last Enrolled</label>
                                      <input type="number" min="1900" max="2099" step="1" value="2019" class="form-control" id="studentN" name="ygle" aria-describedby="emailHelp" placeholder="Enter  Year Graduated or Last Enrolled" required>
                                    </div>
                                    <div class="form-group col-7">
                                      <label for="FullName">FullName</label>
                                      <input type="text" class="form-control" id="Lastname" oninput="this.value = this.value.toUpperCase()"  name="FullName" aria-describedby="emailHelp" placeholder="Enter Lastname" maxlength="49" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Course" >Course</label>
                                          <select  id="a" name="Course" onchange="change();" class="selectpicker form-control" data-live-search="true">
                                            <?php $view->degreeCourseSP();?>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="College" >College</label>
                                      <select id="b" name="College" class="form-control">
                                        <?php $view->collegeSP();?>
                                      </select>
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
                                    <div class="form-group col-7">
                                      <label for="Email" >Email of Company</label>
                                      <input type="text" class="form-control" id="Email"  name="Email" aria-describedby="emailHelp" placeholder="Enter Email" maxlength="99" required>
                                  </div>
                                  <div class="form-group col-5">
                                      <label  >&nbsp;</label>
                                   <input type="submit" value="Submit Student Verification Request" class=" form-control btn btn-primary" />
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
    <script>
    function change() {
    if (document.getElementById('a').value == '1')
    document.getElementById("b").value = '13';
    else if (document.getElementById('a').value == '2')
    document.getElementById("b").value = '8';
    else if (document.getElementById('a').value == '3')
    document.getElementById("b").value = '3';
    else if (document.getElementById('a').value == '4')
    document.getElementById("b").value = '1';
    else if (document.getElementById('a').value == '5')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '6')
    document.getElementById("b").value = '14';
    else if (document.getElementById('a').value == '7')
    document.getElementById("b").value = '11';
    else if (document.getElementById('a').value == '8')
    document.getElementById("b").value = '11';
    else if (document.getElementById('a').value == '9')
    document.getElementById("b").value = '11';
    else if (document.getElementById('a').value == '10')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '11')
    document.getElementById("b").value = '3';
    else if (document.getElementById('a').value == '12')
    document.getElementById("b").value = '11';
    else if (document.getElementById('a').value == '13')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '14')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '15')
    document.getElementById("b").value = '6';
    else if (document.getElementById('a').value == '16')
    document.getElementById("b").value = '1';
    else if (document.getElementById('a').value == '17')
    document.getElementById("b").value = '14';
    else if (document.getElementById('a').value == '18')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '19')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '20')
    document.getElementById("b").value = '1';
    else if (document.getElementById('a').value == '21')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '22')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '23')
    document.getElementById("b").value = '12';
    else if (document.getElementById('a').value == '24')
    document.getElementById("b").value = '1';
    else if (document.getElementById('a').value == '25')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '26')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '27')
    document.getElementById("b").value = '2';
    else if (document.getElementById('a').value == '28')
    document.getElementById("b").value = '12';
    };
    </script>



</body>
</html>
