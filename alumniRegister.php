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
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container mt-4 puff-in-center mb-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Alumni Information</h1>
                </div>
                <?php if (!empty($_GET)) {
                    CheckSuccess($_GET['status']);
                }?>
            </div>
            <form action="/registrardev/resource/php/registerAlumni.php" method="POST">
            <div class="row mb-5">
                <table class="table ">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="studentN">Student Number</label>
                                      <input type="text" class="form-control" id="studentN" onkeypress="return isNumber(event)" value="" name="sno" aria-describedby="emailHelp" placeholder="Enter Student Number" maxlength="10" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="College" >Year Graduated</label>
                                        <input type="number" class="form-control" id="Firstname"  name="yg" aria-describedby="emailHelp" placeholder="Enter Year" maxlength="49" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Purpose" >Email</label>
                                        <input type="email" class="form-control" id="Firstname"  name="eaddr" aria-describedby="emailHelp" placeholder="Enter Email" maxlength="49" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Lastname">Lastname</label>
                                      <input type="text" class="form-control" id="Lastname" oninput="this.value = this.value.toUpperCase()"  name="lname" aria-describedby="emailHelp" placeholder="Enter Lastname" maxlength="49" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Firstname">Firstname</label>
                                      <input type="text" class="form-control" id="Firstname" oninput="this.value = this.value.toUpperCase()"  name="fname" aria-describedby="emailHelp" placeholder="Enter Firstname" maxlength="49" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Middlename">Middlename</label>
                                      <input type="text" class="form-control" id="Middlename" oninput="this.value = this.value.toUpperCase()"  name="mname" aria-describedby="emailHelp" placeholder="Enter Middlename" maxlength="30">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Course" >Course</label>
                                          <select id="Course" name="dc" class="selectpicker form-control" data-live-search="true">
                                              <?php $view->degreeCourse(); ?>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Course">School/College</label>
                                      <select id="Course" name="cs" class="selectpicker form-control" data-live-search="true">
                                            <?php $view->schoolCollege(); ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Course">Nationality</label>
                                      <select id="Course" name="nt1" class="selectpicker form-control" data-live-search="true">
                                             <?php $view->nationality(); ?>
                                      </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                  <div class="form-group col-4">
                                    <label for="Lastname">Employer</label>
                                    <input type="text" class="form-control" id="Lastname"  name="employer" aria-describedby="emailHelp" placeholder="Enter Lastname" maxlength="49" required>
                                  </div>
                                  <!--  -->
                                  <div class="form-group col-4">
                                    <label for="Lastname">Employed Position</label>
                                    <input type="text" class="form-control" id="Lastname"  name="position" aria-describedby="emailHelp" placeholder="Enter Lastname" maxlength="49" required>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row justify-content-center mb-5">
                                    <div class="form-group col-5">
                                        <label  >&nbsp;</label>
                                     <input type="submit" class=" form-control btn btn-primary" />
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
