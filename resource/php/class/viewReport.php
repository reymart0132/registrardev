<?php
require_once 'config.php';

class viewReport extends config{
  public $dateFrom;
  public $dateTo;
  public $record;
  public $remark;
  function __construct($dateFrom=null,$dateTo=null,$remark=null){
    $this->dateFrom = $dateFrom;
    $this->dateTo = $dateTo;
    $this->remark = $remark;
  }

  public function viewData(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `work`";
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

  public function viewByCriteria(){

    if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])  && isset($_POST['remark'])) {
      $config = new config;
      $con = $config->con();
      $dateFrom = $this->dateFrom;
      $dateTo = $this->dateTo;
      $record = $this->record;
      $remark = $this->remark;
      $sql = "SELECT * FROM work WHERE Date_App >= '$dateFrom' AND Date_App <= '$dateTo'  OR `remarks` = '$remark'";
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


  }
}
?>
