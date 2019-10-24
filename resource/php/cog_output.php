<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/cog_input.php';
session_start();
$input = new cog_input;
$input->nullData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap.min.css">
  <link href="../../vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/ToPrint.css">
</head>
<body>
  <div class="toprint">
    <header>
        <div class=" container-fluid p-0 ">
          <img src="../../resource/img/header.jpg" height="248" class="rounded mx-auto d-block">
        </div>
    </header>
    <!-- body of letter -->
    <!-- <a href="out.php">Out</a> -->
    <body>
      <div class="letter">
        <!-- insert letter here// CTRL+P TO CHECK-->
        <div class="container pl-5 pr-5">
          <h3 class="my-5"><center>C E R T I F I C A T I O N</center></h3>
          <p style="float:right" class="my-5">
            <?php  $input->showDateToday();?>
          </p>
          <br />
          <br />
          <p class="my-5 py-3"><b>To Whom it May Concern:</b></p>
          <p class="my-5 py-3" style="text-align:justify; ">
            &nbsp;  &nbsp;This is to certify that <?php $input->combineName()?>Graduated
            with the degree <?php $input->showDegree()?>
            on  <?php $input->showDateGraduated()?> at the
            Centro Escolar University.
          </p>
          <p class="my-5" style="text-align:justify;">
              &nbsp;  &nbsp;This certification is issued upon the request of <?php $input->lastName()?> for whatever legal purpose this may serve.
          </p>
          <p class="my-5" style="float:right;text-align: center;">
            <?php $input->RegistrarName(); ?>
              <br />
              Registrar
          </p>
        </div>
      </div>
    </body>

  </div>
</body>
<footer id="sticky-footer" class=" fixed-bottom">
  <div class="container text-center">
    <img src="../../resource/img/footer.jpg" height="150" >

  </div>
</footer>
</html>
