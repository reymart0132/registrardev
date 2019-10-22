<?php
class inputForm{

  public function viewData(){
    if (isset($_POST['Lastname'])) {
      $lName = $_POST['Lastname'];
      $fName = $_POST['Firstname'];
      $middleName = $_POST['Middlename'];
      $dateToday = $_POST['DateToday'];
      $rName = $_POST['Rname'];
      $course = $_POST['course'];
      $_SESSION['Lastname'] = $lName;
      $_SESSION['Firstname'] = $fName;
      $_SESSION['Middlename'] = $middleName;
      $_SESSION['DateToday'] = $dateToday;
      $_SESSION['Rname'] = $rName;
      $_SESSION['course'] = $course;
      header('Location: ../php/EMI_output_page.php');
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
    $course = $_SESSION['course'];
    if(isset($course)){
      echo '<b>'.$course.'</b>';}
  }

  public function showDateToday(){
    $dateToday = $_SESSION['DateToday'];
    if(isset($dateToday)){
      // echo'<b>'. $dateToday.'</b>';
      echo '<b>'.$dateToday.'</b>';
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
      header('Location:  ../php/EMI_page.php');
    }
  }

  public function showLastName(){
    $lname = $_SESSION['Lastname'];
    if(isset($lname)){
      echo '<b>'.$lname.'</b>';}
  }
}
 ?>
