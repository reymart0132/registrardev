<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
if(!empty($_POST)) {
    $sno = $_POST['sno'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $dc = $_POST['dc'];
    $nt = $_POST['nt1'];
    $cs = $_POST['cs'];
    $yg = $_POST['yg'];
    $eaddr = $_POST['eaddr'];


    $aI = new alumniInfo($sno,$lname,$fname,$mname,$dc,$nt,$cs,$yg,$eaddr);
    $aI->insertAlumniInfo();
    header("location: ../../index.php");
    }
  ?>
