<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
if(!empty($_POST)) {
    $sno = $_POST['sno'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $dc = $_POST['dc'];
    $cno = $_POST['cno'];
    $dob = $_POST['bday'];
    $nt = $_POST['nt1'];
    $cs = $_POST['cs'];
    $mg = $_POST['mg'];
    $yg = $_POST['yg'];
    $addr = $_POST['addr'];
    $hno = $_POST['hno'];
    $hfno = $_POST['hfno'];
    $eaddr = $_POST['eaddr'];
    $octype = $_POST['octype'];
    $emp = $_POST['emp'];
    $baddr = $_POST['baddr'];
    $ofno = $_POST['ofno'];
    $emppos = $_POST['empos'];

    $aI = new alumniInfo($sno,$lname,$fname,$mname,$dc,$cno,$dob,$nt,$cs,$mg,$yg,$addr,$hno,$hfno,$eaddr,$octype,$emp,$baddr,$ofno,$emppos);
    $aI->insertAlumniInfo();
    header("location:../../index.php");
    }
  ?>
