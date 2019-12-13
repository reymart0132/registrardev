<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new viewState;
if(isset($_GET['stateCourse'])){
  $state = new stateSetter($_GET['id']);
  $state->stateCourse();
}

if(isset($_GET['stateCollege'])){
  $state = new stateSetter($_GET['id']);
  $state->stateCollege();
}

if(isset($_GET['stateAppliedFor'])){
  $state = new stateSetter($_GET['id']);
  $state->stateAppliedFor();
}

if(isset($_GET['purpose'])){
  $state = new stateSetter($_GET['id']);
  $state->statePurposes();
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
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

</head>
<body>
  <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
    <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
      <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
        alt="mdb logo"><h3 class="ib">
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
  <div class="container-fluid mt-4 puff-in-center">
    <h1 class="text-center pb-4">State</h1>
      <div class="row">
        <div class="col">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="course"){echo "active";}?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "active";}} ?>" id="profile-tab" data-toggle="tab" href="#college" role="tab" aria-controls="profile" aria-selected="false">College</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="appliedfor"){echo "active";}} ?>" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Applied For</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(!empty($_GET['tab'])){if($_GET['tab']=="purposes"){echo "active";}} ?>" id="contact2-tab" data-toggle="tab" href="#purposes" role="tab" aria-controls="contact" aria-selected="false">Purposes</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade <?php if(empty($_GET['tab'])){ echo "show active"; }elseif($_GET['tab']=="course"){ echo "show active";}?>" id="home" role="tabpanel" aria-labelledby="home-tab"><?php $view->degreeCourseAll();?></div>
          <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}}?>" id="college" role="tabpanel" aria-labelledby="profile-tab"><?php $view->collegeSPAll();?></div>
          <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="appliedfor"){echo "show active";}} ?>" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php $view->requestingForSPAll();?></div>
          <div class="tab-pane fade <?php if(!empty($_GET['tab'])){if($_GET['tab']=="purposes"){echo "show active";}} ?>" id="purposes" role="tabpanel" aria-labelledby="contact-tab"><?php $view->AllreasonFA();?></div>
        </div>
      </div>
    </div>
  </div>
</body>
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
    <!-- <script>
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
 </script> -->
</body>
</html>
