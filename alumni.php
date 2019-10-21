<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view();
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
  <link rel="icon" type="image/png" href="https://media.glassdoor.com/sqll/926973/centro-escolar-university-squarelogo-1519376571278.png">
</head>
<body>
    <header class="alumni">
        <nav class="navbar navbar-dark bg-white shadow-sm fixed-top">
          <a class="navbar-brand" href="index.php">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container-fluid p-0 ">
            <div class="cover"></div>
            <video id="videoBG" autoplay muted loop>
                <source src="resource/mp4/bg.mp4" type="video/mp4">
                </video>
            <div class="container-fluid bga mt-4">
                <div class="jumbotrona">
                    <h1 class="display-4 text-center"> Alumni <span class="ceucolor2">Information</span></h1>
                    <form class="text-center border border-light p-5" action="/registrardev/resource/php/registerAlumni.php" method="post" id="myCoolForm">

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input name="fname" type="text" id="defaultRegisterFormFirstName" class="form-control inputO" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input name="lname" type="text" id="defaultRegisterFormLastName" class="form-control inputO" placeholder="Last name" required>
                            </div>
                            <div class="col">
                                <!-- Middle name -->
                                <input name="mname" type="text" id="defaultRegisterFormMiddleName" class="form-control inputO" placeholder="Middle name" required>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-7">
                                <div class="form-group">
                                 <span>Birthday</span>
                                 <input type="date" name="bday" min="1000-01-01"
                                        max="3000-12-31" class="form-control inputO" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-4">
                                <input name="sno" type="text" id="defaultStudentNumber" class="form-control mb-4 inputO" placeholder="Student-Number (Optional)">
                            </div>
                            <div class="col">
                                <select name="nt1" class="browser-default custom-select inputO" style="color:rgb(145, 145, 145);" required>
                                 <?php $view->nationality(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-8">
                                <select name="dc" class="browser-default custom-select inputO" style="color:rgb(145, 145, 145);" required>
                                <?php $view->degreeCourse(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="cs" class="browser-default custom-select inputO" style="color:rgb(145, 145, 145);" required>
                                  <?php $view->schoolCollege(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <select name="mg" class="browser-default custom-select inputO" style="color:rgb(145, 145, 145);" required>
                                 <?php $view->monthGrad(); ?>
                                </select>
                            </div>
                            <div class="col">
                                    <input name="yg" type="text" id="defaultRegisterFormYearGraduated" class="form-control inputO" placeholder="Year Graduated" required>
                            </div>
                        </div>


                        <div class="form-row mb-4">
                            <div class="col-8">
                                <input name="addr" type="text" id="" class="form-control inputO" placeholder="Address">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-4">
                                <input name="hno" type="text" id="" class="form-control inputO" placeholder="Home Number">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-4">
                                <input name="hfno" type="text" id="" class="form-control inputO" placeholder="Home Fax Number">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-7">
                                <input name="cno" type="text" id="" class="form-control inputO" placeholder="Cellphone Number">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-8">
                                <input name="eaddr" type="email" id="" class="form-control inputO" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-4">
                                <select name="octype" class="browser-default custom-select inputO" style="color:rgb(145, 145, 145);" required>
                                <?php $view->occupationType(); ?>
                                </select>
                            </div>
                            <div class="col-7">
                                <input name="emp" type="text" id="defaultStudentNumber" class="form-control mb-4 inputO" placeholder="Employer">
                            </div>

                        </div>
                        <div class="form-row mb-4">
                            <div class="col-8">
                                <input name="baddr" type="text" id="" class="form-control inputO" placeholder="Business Address">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-8">
                                <input name="empos" type="text" id="" class="form-control inputO" placeholder="Employee Position">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-6">
                                <input name="ofno" type="number" id="" class="form-control inputO" placeholder="Office Number">
                            </div>
                        </div>
                        <div class="form-row col-12">
                            <button input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-outline-light my-4 btn-block " type="submit">Register</button>
                        </div>
                        <hr>
                        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog"  style="color:rgb(91, 91, 91);">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <b>Confirm Registration of Alumni Info</b>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to <b>submit</b> the following  <b>details</b>?
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default ceucolor" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </header>
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
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>

</body>
</html>
