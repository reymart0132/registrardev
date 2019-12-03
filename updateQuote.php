<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';

isLogin();
$view = new view;
$edit = new edit;
$user = new user();
if (isset($_POST['submit'])) {
  $edit->editQuote();
}



 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrar Portal</title>
   <link rel="stylesheet" type="text/css"  href="vendor\css\bootstrap.min.css">
   <link href="vendor\css\all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource\css\styles.css">
   <link rel="stylesheet" type="text/css"  href="resource\css\speech.css">
   <link rel="stylesheet" type="text/css"  href="vendor\css\bootstrap-select.min.css">

 </head>
 <body>
         <nav class="navbar navbar-dark bg-white shadow-sm slide-in-left">
           <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
             <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
               alt="mdb logo"><h3 class="ib">
           </a>
              <a href="pending.php"><i class="fas fa-home ceucolor"></i></a>
              <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
              <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
              <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
         </nav>

         <div class="container mt-5  pt-5 puff-in-center">
             <div class="row">

            </div>
            <form class="text-center border border-light p-5 mt-5 shadow puff-in-center" action="" method="post" >
                 <h1 class="text-center">Update the SRA's Quote</h1>
               <textarea  maxlength="60" class="form-control mt-5"  type = "text" name="quote" id="quote" value ="" autocomplete="off" placeholder="Enter Quote (Maximum of 60 Characters)"></textarea>

              <input type="submit" value="Update Quote"  class="   mt-5 form-control btn "  name="submit"style="color:white;background-color :pink; "/>
            </form>

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
 </body>
 </html>
