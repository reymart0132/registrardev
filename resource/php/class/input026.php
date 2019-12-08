
<?php
class inputForm{

  public function viewData(){
    if (isset($_POST['Lastname'])) {
      $lName = $_POST['Lastname'];
      $fName = $_POST['Firstname'];
      $middleName = $_POST['Middlename'];
      $dateToday = $_POST['DateToday'];
      $schoolyear = $_POST ['schoolyear'];
      $course = $_POST ['course'];
      $semester = $_POST ['semester'];
      $department = $_POST ['department'];
      $rName = $_POST['Rname'];

      $_SESSION['Lastname'] = $lName;
      $_SESSION['Firstname'] = $fName;
      $_SESSION['Middlename'] = $middleName;
      $_SESSION['DateToday'] = $dateToday;
      $_SESSION['schoolyear'] =$schoolyear;
      $_SESSION['course'] = $course;
      $_SESSION['department'] = $department;
      $_SESSION['Rname'] = $rName;
      $_SESSION['semester'] = $semester;
      header('Location: ../php/rof026_output.php');
    }
  }
  //
  public function combineName(){
   $fname = $_SESSION['Firstname'];
   $middleName = $_SESSION['Middlename'];
   $lname = $_SESSION['Lastname'];
   $full = "$fname ". " $middleName ". " $lname ";
    if(isset($full)){
      echo '<b style="text-decoration:underline;">'.$full.'</b>';
    }
  }
  //
  public function showDegree(){
    $course = $_SESSION['course'];
    if(isset($course)){
      echo '<b>'.$course.'</b>';
    }
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

  public function SY(){
    $schoolyear = $_SESSION['schoolyear'];
    if(isset($schoolyear)){
      // echo'<b>'. $dateToday.'</b>';
      echo '<b>'.$schoolyear.'</b>';
    }
}
    public function Semester(){
       $semester = $_SESSION['semester'];
      if(isset($semester)){
        // echo'<b>'. $dateToday.'</b>';
        echo $semester;
      }
  }

  public function Department(){
    $department = $_SESSION['department'];
    if(isset($department)){
        echo'<b>'. $department.'</b>';
    }
  }

  //
  // public function showDateIssued(){
  //   $dateIssued = $_SESSION['DateIssued'];
  //   if(isset($dateIssued)){
  //     echo'<b>'. $dateIssued.'</b>';
  //   }
  // }

  public function RegistrarName(){
    $rName = $_SESSION['Rname'];
    if(isset($rName)){
      echo '<b>'.$rName.'</b>';
    }
  }


  public function nullData(){
    if(empty($_SESSION['Lastname'])){
      header('Location:  ../php/rof026_pge.php');
    }
  }

  public function showLastName(){
    $lname = $_SESSION['Lastname'];
    if(isset($lname)){
      echo '<b>'.$lname.'</b>';}
  }
}
 ?>
