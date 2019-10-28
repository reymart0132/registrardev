<?php
require_once 'config.php';
class viewPending extends config{

  public function viewData(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING'";
    $data = $con->prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);

    echo '<table class = "table">';
    echo '<thead class = "table-secondary">';
    echo '<th>ID</th> <th>Student Number</th> <th>FirstName</th> <th>Last Name</th> <th>Middle Initial</th><th>Course</th> <th>
    Contact Number</th> <th>Status</th> <th>Date Graduated</th> <th>Applied For</th> <th>Purposes</th> <th>Date Applied</th> <th>Due Date</th><th>College</th> <th>Remarks</th>';
    echo "</thead>";

    foreach ($rows as $row) {
    echo '<tr>';
      echo '<td>'.$row->id.'</td>';
      echo '<td>'.$row->StudentNo.'</td>';
      echo '<td>'.$row->FirstName.'</td>';
      echo '<td>'.$row->LastName.'</td>';
      echo '<td>'.$row->MI.'</td>';
      echo '<td>'.$row->Course.'</td>';
      echo '<td>'.$row->contact_no.'</td>';
      echo '<td>'.$row->Status.'</td>';
      echo '<td>'.$row->Date_Grad.'</td>';
      echo '<td>'.$row->Applied_For.'</td>';
      echo '<td>'.$row->purposes.'</td>';
      echo '<td>'.$row->Date_App.'</td>';
      echo '<td>'.$row->Due_Date.'</td>';
      echo '<td>'.$row->College.'</td>';
      echo '<td>'.$row->remarks.'</td>';
    echo '</tr>';
    }
  echo "</table>";
  }

  public function viewSort(){
    $config = new config;
    $con = $config->con();
    if (isset($_POST['sort'])) {
        $sort = $_POST['sort'];
        switch ($sort){
          case 'ASC':
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' ORDER BY `id` ASC";
            $data = $con->prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            echo '<table class = "table">';
            echo '<thead class = "table-secondary">';
            echo '<th>ID</th> <th>Student Number</th> <th>FirstName</th> <th>Last Name</th> <th>Middle Initial</th><th>Course</th> <th>
            Contact Number</th> <th>Status</th> <th>Date Graduated</th> <th>Applied For</th> <th>Purposes</th> <th>Date Applied</th> <th>Due Date</th><th>College</th> <th>Remarks</th>';
            echo "</thead>";

            foreach ($rows as $row) {
            echo '<tr>';
              echo '<td>'.$row->id.'</td>';
              echo '<td>'.$row->StudentNo.'</td>';
              echo '<td>'.$row->FirstName.'</td>';
              echo '<td>'.$row->LastName.'</td>';
              echo '<td>'.$row->MI.'</td>';
              echo '<td>'.$row->Course.'</td>';
              echo '<td>'.$row->contact_no.'</td>';
              echo '<td>'.$row->Status.'</td>';
              echo '<td>'.$row->Date_Grad.'</td>';
              echo '<td>'.$row->Applied_For.'</td>';
              echo '<td>'.$row->purposes.'</td>';
              echo '<td>'.$row->Date_App.'</td>';
              echo '<td>'.$row->Due_Date.'</td>';
              echo '<td>'.$row->College.'</td>';
              echo '<td>'.$row->remarks.'</td>';
            echo '</tr>';
            }
          echo "</table>";
            break;
          default:
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' ORDER BY `id` DESC";
            $data = $con->prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            echo '<table class = "table">';
            echo '<thead class = "table-secondary">';
            echo '<th>ID</th> <th>Student Number</th> <th>FirstName</th> <th>Last Name</th> <th>Middle Initial</th><th>Course</th> <th>
            Contact Number</th> <th>Status</th> <th>Date Graduated</th> <th>Applied For</th> <th>Purposes</th> <th>Date Applied</th> <th>Due Date</th><th>College</th> <th>Remarks</th>';
            echo "</thead>";

            foreach ($rows as $row) {
              echo '<tr>';
              echo '<td>'.$row->id.'</td>';
              echo '<td>'.$row->StudentNo.'</td>';
              echo '<td>'.$row->FirstName.'</td>';
              echo '<td>'.$row->LastName.'</td>';
              echo '<td>'.$row->MI.'</td>';
              echo '<td>'.$row->Course.'</td>';
              echo '<td>'.$row->contact_no.'</td>';
              echo '<td>'.$row->Status.'</td>';
              echo '<td>'.$row->Date_Grad.'</td>';
              echo '<td>'.$row->Applied_For.'</td>';
              echo '<td>'.$row->purposes.'</td>';
              echo '<td>'.$row->Date_App.'</td>';
              echo '<td>'.$row->Due_Date.'</td>';
              echo '<td>'.$row->College.'</td>';
              echo '<td>'.$row->remarks.'</td>';
            echo '</tr>';
            }
          echo "</table>";
            break;
        }
    }
  }
}
 ?>
