<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
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
</head>
<body>
        <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
          <a class="navbar-brand " href="https://malolos.ceu.edu.ph/">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
           <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8 ">
                    <form class="text-center border border-light p-5 shadow puff-in-center" action="#!">
                    <p class="h4 mb-4">Sign in</p>
                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                    <div class="d-flex justify-content-around">
                        <div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-dark btn-block my-4" type="submit">Sign in</button>
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
    </body>
    </html>