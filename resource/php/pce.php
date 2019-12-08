<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/pce.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/functions/funct.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/config.php';
if(isset($_GET['school'])){
$pce = new pce($_GET['school'],$_GET['studentN'],$_GET['college'],$_GET['semester'],$_GET['date'],$_GET['city'],$_GET['subjects'],$_GET['units']);
$pce ->display();
}else{
  header('location:pceform.php');
}
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>
   <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap.min.css">
   <link href="../../vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="../css/ToPrint.css">
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
         <div class="container ">
             <div class="row">
                 <div class="col-12">
                     <h3 class="text-center">Permit to Cross Enroll</h3>
                 </div>
             </div>
             <div class=" mt-4 row">
               <div class="col-8">

               </div>
               <div class="col-4">
                 <p class="text-right py-4"> <span style="font-weight:bold; text-decoration:underline;">  <?php echo $pce->date; ?></span></p>
               </div>
             </div>
             <div class="mt-2 row">
               <div class="col-8">
                 <p class="py-0 my-1">The Registrar</p>
                 <p class="py-0 my-1"><span style="font-weight:bold; text-decoration:underline;"> <?php echo $pce->school; ?></span></p>
                   <p class="py-0 my-1"><span style="font-weight:bold; text-decoration:underline;"> <?php echo $pce->city; ?></span></p>
                 <p class="pt-2">Dear Sir/Madam:</p>
               </div>
             </div>
               <div class="row">
                 <div class="col-12">
                   <p style="text-align: justify;"> &nbsp;  &nbsp;  &nbsp;The bearer,<span style="font-weight:bold; text-decoration:underline;"> <?php echo $pce->studentN; ?></span> a student in the <span style="font-weight:bold; text-decoration:underline;">  <?php echo $pce->college; ?></span> in this  University,
                   has permission of this office to cross-enroll in your school to take the following subjects this <span style="font-weight:bold; text-decoration:underline;"> <?php echo $pce->semester; ?>.,S.Y <?php echo $_GET['schoolyear']; ?>.</span></p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-8">
                <h5 class="text-center"style="text-decoration:underline;">Subjects</h5>

                <span style="font-weight:bold;">
                <?php
            $pce ->displaysubjects();
                 ?>
               </span>
                 <p class="text-center">***None Follows*** </p>
              </div>
              <div class="col-2">
                <h5 class="text-center" style="text-decoration:underline;">Units</h5>
                <span style="font-weight:bold;">
                <?php
              $pce->displayunits();
                 ?>
               </span>
              </div>
            </div>
            <div class="row my-4">
              <div class="col-5">
                <p class="text-bold"><b>Please send the grades after the semester</b></p>
              </div>
            </div>
            <div class="row pb-5 mb-5">
              <div class="col-8">

              </div>
              <div class="col-4">
                <p> Very Truly yours,</p>
                <p><?php echo findregistrar()?></p>
                <p class="ml-5" style="margin-top: -20px;"><b>Registrar</b></p>
              </div>
            </div>
            </div>
     </body>

   </div>
 </body>
 <footer id="sticky-footer" class=" fixed-bottom">
   <div class="container text-center">
     <img src="../../resource/img/footer.jpg" height="150"  />
   </div>
 </footer>
 </html>
