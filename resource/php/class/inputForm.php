<?php
class inputForm{

  public function viewData(){
    if (isset($_POST['Lastname'])) {
      $lName = $_POST['Lastname'];
      $fName = $_POST['Firstname'];
      $middleName = $_POST['Middlename'];
      $dateToday = $_POST['DateToday'];
      $dateGraduated = $_POST['DateGraduated'];
      $specialOrder = $_POST['SpecialOrder'];
      $dateIssued = $_POST['DateIssued'];
      $rName = $_POST['Rname'];
      $_SESSION['Lastname'] = $lName;
      $_SESSION['Firstname'] = $fName;
      $_SESSION['Middlename'] = $middleName;
      $_SESSION['DateToday'] = $dateToday;
      $_SESSION['DateGraduated'] = $dateGraduated;
      $_SESSION['SpecialOrder'] = $specialOrder;
      $_SESSION['DateIssued'] = $dateIssued;
      $_SESSION['Rname'] = $rName;
      header('Location: ../php/rof10_output_page.php');
    }
  }
  //
  public function combineName(){
   $fname = $_SESSION['Firstname'];
   $middleName = $_SESSION['Middlename'];
   $lname = $_SESSION['Lastname'];
   $full = "$fname ". " $middleName ". " $lname ";
    if(isset($full)){
      echo '<b>'.$full.'</b>';}
  }
  //
  public function showDegree(){
    $course = $_SESSION['Course'];
    if(isset($course)){
      echo '<b>'.$course.'</b>';}
  }

  // public function combineDate(){
  //   $day = $_SESSION['Day'];
  //   $month = $_SESSION['Month'];
  //   $year = $_SESSION['Year'];
  //   $date =  "$month "." $day, "." $year";
  //   if(isset($date)){
  //     echo '<b>'.$date.'</b>';}
  // }

  public function showDateToday(){
    $dateToday = $_SESSION['DateToday'];
    if(isset($dateToday)){
      // echo'<b>'. $dateToday.'</b>';
      echo '<b>'.$dateToday.'</b>';
    }
  }

  public function showDateGraduated(){
    $dateGraduated = $_SESSION['DateGraduated'];
    if(isset($dateGraduated)){
        echo'<b>'. $dateGraduated.'</b>';
    }
  }

  public function showSpecialOrder(){
    $specialOrder = $_SESSION['SpecialOrder'];
    if(isset($specialOrder)){
      echo'<b>'. $specialOrder.'</b>';
    }
  }

  public function showDateIssued(){
    $dateIssued = $_SESSION['DateIssued'];
    if(isset($dateIssued)){
      echo'<b>'. $dateIssued.'</b>';
    }
  }

  public function RegistrarName(){
    $rName = $_SESSION['Rname'];
    if(isset($rName)){
      echo '<b>'.$rName.'</b>';
    }
  }


  public function nullData(){
    if(empty($_SESSION['Lastname'])){
      header('Location:  ../php/rof10_page.php');
    }
  }

  public function showLastName(){
    $lname = $_SESSION['Lastname'];
    if(isset($lname)){
      echo '<b>'.$lname.'</b>';}
  }
}
 ?>
