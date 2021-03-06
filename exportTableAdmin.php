<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view2 = new view;
$view = new viewAdmin;
$user = new user();
isLogin();

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrar Portal</title>
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
   <link href="vendor/css/all.css" rel="stylesheet">
   <link href="resource\css\animation-rami.css" type="text/css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="resource/css/speech.css">
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
               <div class="speech-bubble">
                   <p style="max-height:11vh;"><?php $view->getquote() ?></p>
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
<div class="container-fluid mt-4 slide-in-left">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Productivity Report for( <?php if(!empty($_GET)){ echo date("M-d-Y", strtotime($_GET['cfd']))." to ".date("M-d-Y", strtotime($_GET['cld']));}else{echo $today = date("F j, Y");} ?> )</h1>
        </div>
   </div>
   <!-- <button name="create_excel" id="create_excel" class="btn btn-success heartbeat ml-3 my-3">Create Excel File</button> -->

   <div class="container">
     <form class="" action="" method="get">
       <div class="row">
         <div class="col-5">
           <label for="dateFrom">From:</label>
           <input  class="form-control" type="date" name="cfd" id="startDate"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy" required>
         </div>
         <div class="col-5">
           <label for="dateTo">To:</label>
           <input  class="form-control" type="date" name="cld" id="endDate" placeholder="dd-mm-yyyy" required>
         </div>
         <div class="col-2 mt-4 pt-2">
           <label for="submit"></label>
           <input type="submit" class="btn text-white" name="search" value="Search" style="background-color:#DC65A1;">
         </div>
       </div>
     </form>
   </div>
   <form class="" action="exporttables.php" method="post">
     <div class="row">
       <div class="col-5">
         <input type="text" name="data" value="" id="Input" hidden>
         <input class="btn btn-success heartbeat ml-3 my-3" class="form-control" type="submit" value="Create New Excel File">
       </div>
   </form>
   <!--  -->
   <div class="container-fluid mt-4 mb-5" id="activity">
     <?php
     $view2->exportundergrad();
      $view2->exportgrad();
      ?>
      <!-- <button type="button" class="btn" name="button"></button> -->
    </div>
 </body>

     <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script>
     <script src="resource/js/date.js"></script>
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
  <script>
  // $(document).ready(function(){
       // $('#create_excel').click(function(){
            var excel_data = $('#activity').html();
            document.getElementById("Input").value = excel_data;
            // var page = "exporttables.php?data=" + excel_data;
            // window.location = page;
       // });
  // });
  </script>
 </body>
 </html>
