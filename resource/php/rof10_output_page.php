<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/inputForm.php';
session_start();
$input = new inputForm;
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
        <div class="container">
          <h3><center>C E R T I F I C A T I O N</center></h3>
          <p style="float:right">
            <?php  $input->showDateToday();?>
          </p>
          <br />
          <br />
          <p><b>To Whom it May Concern,</b></p>
          <p style="text-align: justify; " >
            &nbsp;  &nbsp;  &nbspThis is to certify that <?php $input->combineName()?>has
            completed all the requirements prescribed by the Office of Private Education,
            Department of Instruction and has satisfactorily passed all the required
            examinations to obtain the degree of  <?php $input->showDegree()?>
            on  <?php $input->showDateGraduated()?> in this University.
          </p>
          <p style="text-align: justify; " >
              &nbsp;  &nbsp;  &nbsp;This is to certify further that he/she was given a Special Order (B) No. <?php $input->showSpecialOrder() ?>
            s. dated  <?php $input->showDateIssued()?> issued by the Office of Private
            Education, Department of Instruction, Manila.
          </p>

          <p style="float:right;text-align: center">
            <?php $input->RegistrarName(); ?>
            <br />
            University Registrar/Registrar
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
