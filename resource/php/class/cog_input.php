<?php
class cog_input{

  public function viewData(){
    if (isset($_POST['Lastname'])) {
      $lName = $_POST['Lastname'];
      $fName = $_POST['Firstname'];
      $middleName = $_POST['Middlename'];
      $degree = $_POST['Degree'];
      $dateToday = $_POST['DateToday'];
      $dateGraduated = $_POST['DateGraduated'];
      $rName = $_POST['Rname'];
      $_SESSION['Lastname'] = $lName;
      $_SESSION['Firstname'] = $fName;
      $_SESSION['Middlename'] = $middleName;
      $_SESSION['Degree'] = $degree;
      $_SESSION['DateToday'] = $dateToday;
      $_SESSION['DateGraduated'] = $dateGraduated;
      $_SESSION['DateIssued'] = $dateIssued;
      $_SESSION['Rname'] = $rName;
      header('Location: ../php/cog_output.php');
    }
  }
  //
  public function combineName(){
    $lname = $_SESSION['Lastname'];
   $fname = $_SESSION['Firstname'];
   $middleName = $_SESSION['Middlename'];
   $full = "$fname $middleName[0]. $lname";
    if(isset($full)){
      echo '<b style="text-decoration:underline;">'.$full.'</b>';}
  }
  //
  public function lastName(){
   $lname = $_SESSION['Lastname'];
   $full =  " $lname ";
    if(isset($full)){
      echo '<b>'.$full.'</b>';}
  }
  //
  public function showDegree(){
    $degree = $_SESSION['Degree'];
    if(isset($degree)){
      echo '<b style="text-decoration:underline;">'.$degree.'</b>';}
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
       $output = date('F j, Y',strtotime($dateToday));
      echo '<b>'.$output.'</b>';
    }
  }

  public function showDateGraduated2(){
    $dateGraduated = $_SESSION['DateGraduated'];
    if(isset($dateGraduated)){
    $dateGraduated = date("F j, Y", strtotime($dateGraduated));
        echo'<b style="text-decoration:underline;">'.$dateGraduated.'</b>';
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
      header('Location: ../php/cog_output.php');
    }
  }

  public function showLastName(){
    $lname = $_SESSION['Lastname'];
    if(isset($lname)){
      echo '<b>'.$lname.'</b>';}
  }
}
 ?>
