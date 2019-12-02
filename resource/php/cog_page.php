<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/cog_input.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
$input = new cog_input;
$input->viewData();
$lname = $_GET['lastname'];
$mname = $_GET['middlename'];
$fname = $_GET['firstname'];
$course= $_GET['course'];
$dategrad= $_GET['dategrad'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certification of Graduation</title>
  <link rel="stylesheet" type="text/css"  href="  ../../vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
</head>
<body>
    <header class="alumni">
        <nav class="navbar navbar-dark bg-white shadow-sm fixed-top">
          <a class="navbar-brand" href="">
            <img src="../../resource/img/header.jpg" height="90" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
        </nav>
        <!--  -->
    </header>
    <body>
      <div class="container mt-5 pt-5">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="text-center">Certification of Graduation</h1>
            </div>
        </div>
        <form action="" method="POST">
        <div class="row">
            <table class="table">
                    <tr>
                        <td>
                            <div class="row">
                                <div class="form-group col-4">
                                  <label for="Lastname">Lastname</label>
                                  <input type="text" class="form-control" id="Lastname" name="Lastname" aria-describedby="emailHelp" placeholder="Enter Lastname"  value="<?php echo $lname ?>"  required>
                                </div>
                                <div class="form-group col-4">
                                  <label for="Firstname">Firstname</label>
                                  <input type="text" class="form-control" id="Firstname" name="Firstname" aria-describedby="emailHelp" placeholder="Enter Firstname"  value="<?php echo $fname ?>"  required>
                                </div>
                                <div class="form-group col-4">
                                  <label for="Middlename">Middlename</label>
                                  <input type="text" class="form-control" id="Middlename" name="Middlename" aria-describedby="emailHelp" placeholder="Enter Middlename"  value="<?php echo $mname ?>"  required>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td>
                            <div class="row">
                              <div class="form-group col-4">
                                <label for=SpecialOrder"">Degree</label>
                                <input type="" class="form-control" id="Middlename" name="Degree" aria-describedby="emailHelp" placeholder="Degree"value="<?php echo $course ?>" required>
                              </div>
                                <div class="form-group col-4">
                                  <label for="DateToday">Date Today</label>
                                  <input type="texr" class="form-control" id="Lastname" name="DateToday" aria-describedby="emailHelp" placeholder="Enter Date" value="<?php echo date("d-m-Y"); ?>" required>
                                </div>
                                <div class="form-group col-4">
                                  <label for="DateGraduated">Date Graduated</label>
                                  <input type="text" class="form-control" id="Firstname" name="DateGraduated" aria-describedby="emailHelp" placeholder="Enter Date" value="<?php echo $dategrad ?>" required>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td>
                            <div class="row">
                                <div class="form-group col-4">
                                  <label for="Rname">Registrar Full Name</label>
                                  <input type="text" class="form-control" id="Lastname" name="Rname" aria-describedby="emailHelp" placeholder="Enter Name"  value="<?php $view->getNameSRA() ?>" required>
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
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom">
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
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/popper.js"></script>
</body>
</html>
