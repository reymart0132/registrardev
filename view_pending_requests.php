<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new viewAdmin;
$checkadmin = new checkgroup;
$checkadmin->checkadmin();
$searchQ = new SearchAdmin;
$user = new user();
// echo $user->data()->groups;;
isLogin();
if(isset($_GET['printed'])){
  $print = new printed($_GET['printed'],$_GET['id']);
  $print->printAdmin();
}
if(isset($_GET['released'])){
  $release = new released($_GET['released'],$_GET['id']);
  $release->release();
}
if(isset($_GET['verified'])){
  $print = new verified($_GET['verified'],$_GET['id']);
  $print->verifyAdmin();
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
   <link href="resource\css\animation-rami.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="resource/css/speech.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
 </head>
 <body>
     <?php blocker()?>
   <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
     <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
       <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
         alt="mdb logo">
         <h3 class="ib">
     </a>
        <a href="exportTableAdmin.php"><i class="fas fa-table ceucolor"></i></a>
        <a href="statsAdmin.php"><i class="fas fa-chart-line ceucolor"></i></a>
        <a href="userVerificationAdmin.php"><i class="fas fa-user-plus ceucolor"></i></a>
        <a href="verificationAdmin.php"><i class="fas fa-user-graduate ceucolor"></i></a>
        <a href="viewAlumniAdmin.php"><i class="fa fa-graduation-cap ceucolor"></i></a>
        <a href="nTransactionAdmin.php"><i class="fas fa-file-upload ceucolor"></i></a>
        <a href="view_pending_requests.php"><i class="fas fa-home ceucolor"></i></a>
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
              <?php
                profilePic();
              ?>
               <a href="updateprofile.php" class="out "><span class="fas fa-id-card mt-3 " href="#"></span>&nbsp;Update Info</a>
               <a href="configuration.php" class="out "><span class="fas fa-cogs" href="#"></span>&nbsp;Configuration</a>
               <a href="register.php" class="out "><span class="fas fa-user" href="#"></span>&nbsp;Register New SRA</a>
               <a href="changepassword.php" class="out "><span class="fas fa-lock " href="#"></span>&nbsp;Change Password</a>
               <a href="logout.php" class="out "><span class="fas fa-sign-out-alt " href="#"></span>&nbsp;Logout</a>
           </div>
           <div class="col-8">
               <p class="name mt-2" style="color: #dc65a1;"><b><?php $view->getNameSRA()?></b></p>
               <div class="speech-bubble css-typing typewriter">
                   <p><?php $view->getquote()?></p>
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
               <img src="resource/img/pending.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
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
               <img src="resource/img/signature.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
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
            <img src="resource/img/forrelease.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
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
          <img src="resource/img/released.jpg" class="img-fluid" style="height: 60px; width:60px;"alt="">
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
   <div class="container-fluid mt-4 mb-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item ">
          <a class="nav-link <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="view"){echo "active";}?>" id="home-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="home" aria-selected="true">Pending</a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="printed"){echo "active";}} ?>" id="profile-tab" data-toggle="tab" href="#printed" role="tab" aria-controls="profile" aria-selected="false">For Signature</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="forrelease1"){echo "active";}} ?>" id="contact-tab" data-toggle="tab" href="#verifiedall" role="tab" aria-controls="contact2" aria-selected="false">For Release (ALL)</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="released"){echo "show active";}} ?>" id="contact-tab" data-toggle="tab" href="#released" role="tab" aria-controls="contact3" aria-selected="false">Released</a>
        </li>
      </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade <?php if(empty($_GET['tab'])){ echo "show active"; }elseif($_GET['tab']=="view"){ echo "show active";}?>" id="pending" role="tabpanel" aria-labelledby="home-tab">
        <?php
        if(isset($_GET['submitPending'])){
          $searchQ->searchPending();
        }else{
          $view->viewtodolist();
        }?>
      </div>
      <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="printed"){echo "show active";}} ?>" id="printed" role="tabpanel" aria-labelledby="profile-tab">
        <?php
        if(isset($_GET['submitPrinted'])){
          $searchQ->searchPrinted();
        }else{
          $view->viewprinted();
        }?>
      </div>
      <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="forrelease1"){echo "show active";}} ?>" id="verifiedall" role="tabpanel" aria-labelledby="contact2-tab">
        <?php
        if(isset($_GET['submitVerifiedAll'])){
          $searchQ->searchVerified();
        }else{
          $view ->viewverified2();
        }
        ?>
      </div>
      <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="released"){echo "show active";}} ?>" id="released" role="tabpanel" aria-labelledby="contact3-tab"><?php
      if(isset($_GET['submitReleased'])){
        $searchQ->searchReleased();
      }else{
        $view ->viewreleased();
      }
       ?>
     </div>
    </div>
  </div>
 </body>
     <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script>
     <script>
     $(document).ready(function() {
      if (location.hash) {
          $("a[href='" + location.hash + "']").tab("show");
      }
      $(document.body).on("click", "a[data-toggle='tab']", function(event) {
          location.hash = this.getAttribute("href");
      });
    });
    $(window).on("popstate", function() {
      var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
      $("a[href='" + anchor + "']").tab("show");
    });
  </script>
 </body>
 </html>
