<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
$search = new Search;
isLogin();
if(isset($_GET['printed'])){
  $print = new printed($_GET['printed']);
  $print->print();
}
if(isset($_GET['released'])){
  $release = new released($_GET['released']);
  $release->release();
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
   <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap.min.css">
   <link href="vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="../../resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="../../resource/css/speech.css">
   <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap-select.min.css">
 </head>
 <body>
   <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
     <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
       <img src="../../resource/img/logo.jpg" height="70" class="d-inline-block align-top"
         alt="mdb logo">
         <h3 class="ib">
     </a>
        <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
        <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
        <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
   </nav>
 <!--  -->
   <div class="container-fluid mt-4">
     <div class="row">
       <!--  -->
       <div class="col-5 ">
         <div class="row">
           <div class="col-4 ">
               <img class="rounded-circle profpic img-thumbnail" alt="100x100" src="../../resource/img/user.jpg"  />
               <a href="updateprofile.php" class="out "><span class="fas fa-id-card mt-3 " href="#"></span>&nbsp;Update Info</a>
               <a href="changepassword.php" class="out "><span class="fas fa-lock " href="#"></span>&nbsp;Change Password</a>
               <a href="logout.php" class="out "><span class="fas fa-sign-out-alt " href="#"></span>&nbsp;Logout</a>
           </div>
           <div class="col-8">
               <p class="name mt-2" style="color: #dc65a1;"><b><?php $view->getNameSRA()?></b></p>
               <div class="speech-bubble">
                   <p>I like work: it fascinates me. I can sit and look at it for hours.</p>
               </div>
           </div>
        </div>
      </div>
       <!--  -->
       <div class="col-7 pt-5">
        <div class="ml-5 pl-4 row ">
         <div class="status pl-5 pt-4 ">
           <div class="row no-gutters sn">
             <div class="col-auto">
               <img src="../../resource/img/pending.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
             </div>
               <div class="col">
                   <div class="card-block">
                     <div class="cbody" style="height: 60px; width:120px;">
                       <h4 class="counter ml-5 "><b><?php echo $view->ctodolist();?></b></h4>
                       <p class="text-center cbodytext"><b>Pending</b></p>
                     </div>
                   </div>
               </div>
           </div>
         </div>
         <!--  -->
         <div class="status pl-5 pt-4">
           <div class="row no-gutters sn">
             <div class="col-auto">
               <img src="../../resource/img/signature.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
             </div>
               <div class="col">
                   <div class="card-block">
                     <div class="cbody" style="height: 60px; width:120px;">
                       <h4 class="counter ml-5 "><b><?php echo $view->cprinted();?></b></h4>
                       <p class="text-center cbodytext"><b>For Signature</b></p>
                     </div>
                   </div>
               </div>
           </div>
         </div>
      <!--  -->
      <div class="status pl-5 pt-4">
        <div class="row no-gutters sn">
          <div class="col-auto">
            <img src="../../resource/img/forrelease.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
          </div>
            <div class="col">
                <div class="card-block">
                  <div class="cbody" style="height: 60px; width:120px;">
                     <h4 class="counter ml-5 "><b><?php echo $view->cverified();?></b></h4>
                    <p class="text-center cbodytext"><b>For Release</b></p>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="status pl-5 pt-4">
      <div class="row no-gutters sn">
        <div class="col-auto">
          <img src="../../resource/img/released.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
        </div>
          <div class="col">
              <div class="card-block">
                <div class="cbody" style="height: 60px; width:120px;">
                   <h4 class="counter ml-5 "><b><?php echo $view->creleased();?></b></h4>
                  <p class="text-center cbodytext"><b>Released</b></p>
                </div>
              </div>
          </div>
      </div>
    </div>
   </div>
 </div>
</div>
   <!--  -->
   <div class="container-fluid mt-4">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item ">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="home" aria-selected="true">Pending</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#printed" role="tab" aria-controls="profile" aria-selected="false">For Signature</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#verified" role="tab" aria-controls="contact" aria-selected="false">For Release</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#released" role="tab" aria-controls="contact" aria-selected="false">Released</a>
        </li>
      </ul>
    <div class="tab-content" id="myTabContent">
        <!-- dito duane nagcoconflict sa $_POST submit kasi one page lang kaya one submit button din -->
      <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="home-tab"><?php
      if(isset($_POST['submitPending'])){
        $search->searchPending();
      }else{
        $view->viewtodolist();
      }
      ?></div>
      <div class="tab-pane fade" id="printed" role="tabpanel" aria-labelledby="profile-tab">  <?php
      if(isset($_POST['submitPrinted'])){
        $search->searchForSignature();
      }else{
        $view->viewprinted();
      }?></div>
      <div class="tab-pane fade" id="verified" role="tabpanel" aria-labelledby="contact-tab"><?php
      if(isset($_POST['submitVerified'])){
        $search->searchForRelease();
      }else {  $view ->viewverified(); }?></div>
        <div class="tab-pane fade" id="released" role="tabpanel" aria-labelledby="contact-tab"><?php
        if(isset($_POST['submitReleased'])){
          $search->searchReleased();
        }else {  $view ->viewreleased();} ?></div>
    </div>
  </div>
 </body>
 <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom  slide-in-right">
   <div class="container text-center">
       <div class="row">
           <div class="col col-sm-5 text-left">
               <small>Copyright &copy;Centro Escolar University Office of the Registrar 2019</small>
           </div>
           <div class="col text-right">
               <small>Created by: Reymart Bolasoc, Amelia Valencia , James Mangalile, Kenneth De Leon , Pamela Reyes , Ellen Mijares</small>
           </div>
       </div>
   </div>
 </footer>
     <script src="../../vendor/js/jquery.js"></script>
     <script src="../../vendor/js/popper.js"></script>
     <script src="../../vendor/js/bootstrap.min.js"></script>
     <script src="../../vendor/js/bootstrap-select.min.js"></script>
 </body>
 </html>
