<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/nsc.php';
if(isset($_POST['studentN'])){
$nsc = new nsc($_POST['studentN'],$_POST['college'],$_POST['date']);
$nsc ->display();
}else{
  header('location:noscholarform.php');
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
         <div class="container mt-4">
           <h3 class="pb-5 mb-5 pt-2"><center>C E R T I F I C A T I O N</center></h3>
             <div class=" mt-4 row">
               <div class="col-8">

               </div>
               <div class="col-4">
                 <p class="text-right py-4 my-2"> <span style="font-weight:bold;"> <?php if(isset($nsc->date)){

                   $output = date('F j, Y',strtotime($nsc->date));
                   echo '<b>'.$output.'</b>';
                 } ?></span></p>
               </div>
             </div>
             <div class="mt-4 row">
                 <p class="pl-5 pt-2"><b>To Whom it May Concern,</b></p>
             </div>
               <div class="row mt-3">
                 <div class="col-12">
                   <p style="text-align: justify;"> &nbsp;  &nbsp;  &nbsp;This is to certify that <span style="font-weight:bold;"> <?php echo $nsc->studentN; ?></span> presently enrolled as second year student, this 1st semester S.Y. 2019-2020 under <span style="font-weight:bold;"> <?php echo $nsc->college; ?></span>, is not a recipient of any scholarship and grants our university provides to qualified students.</p>
                   <p class="mt-3">This certification is issued upon the request of the above mentioned student for whatever legal purpose this may serve.</p>
              </div>
            </div>
            <div class="row py-5 my-5">
              <div class="col-9">

              </div>
              <div class="col-3">
                <p class="text-right py-0 my-0">MRS. AMELIA T. VALENCIA</p>
                <p class="text-center pt-0 mt-0 pb-5 mb-5 ml-3 pl-5">Registrar</p>
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
