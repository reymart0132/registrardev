<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
if(isset($_GET['printed'])){
  $print = new printed($_GET['printed']);
  $print->print();
}
if(isset($_GET['verified'])){
  $print = new verified($_GET['verified']);
  $print->verify();
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
   <link rel="stylesheet" type="text/css"  href="resource/css/speech.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
 </head>
 <body>
   <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
     <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
       <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
         alt="mdb logo">
         <h3 class="ib">
     </a>
        <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
        <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
        <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
   </nav>
   <div class="container-fluid mt-4">
     <div class="row">
       <!--  -->
       <div class="profile-img-container">
          <img src="resource/img/user.jpg" alt="" class="img" id="dp">
       </div>
        <input id="uploadfile" class="d-none" type="file" />
       <!--  -->
       <div class="speech pl-4 pt-2">
         <div class="box sb pt-1">
           <p>I'll work hard today!</p>
         </div>
         <div class="logout pt-3 pl-2">
           <a href="" class="out "><span  class="fas fa-sign-out-alt " href="#"></span>&nbsp;Logout</a>
         </div>
       </div>
     </div>

     <!--  -->
   </div>
   <div class="container-fluid mt-4">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Printed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Verified</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Released</a>
        </li>
      </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php $view ->viewtodolist(); ?></div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php $view ->viewprinted(); ?></div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php $view ->viewreleased(); ?></div>
    </div>
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
     <script>
      $('.profile-img-container img').click(function(){
        $('#uploadfile').click();
      });
     </script>
 </body>
 </html>
