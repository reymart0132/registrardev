<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';

  //
  // if (isset($_GET['export'])) {
  //   $result = $_SESSION['resultSearch'];
  //
  //   header('Content-Type: text/csv; charset=utf-8');
  //   header('Content-Disposition: attachment; filename="data.csv";');
  //   $output = fopen("php://output", "w");
  //   foreach ($result as $row) {
  //     fputcsv($output, $row);
  //   }
  //   fclose($output);
  // }else {
  //   $result = $_SESSION['result'];
  //
  //   $result2 = array(
  //     array("<b>ID</b>","PID","Student Number","Last Name","FirstName","MI","Course","Contact Number","Status","Date Graduated","Requesting For","Purposes","Date Applied","Due Date","College","Remarks"));
  //
  //   header('Content-Type: text/csv; charset=utf-8');
  //   header('Content-Disposition: attachment; filename="data.csv";');
  //   $output = fopen("php://output", "w");
  //   foreach ($result2 as $row) {
  //     fputcsv($output, $row);
  //     foreach ($result as $row2) {
  //       fputcsv($output, $row2);
  //     }
  //   }
  //   fclose($output);
  // }


  if (isset($_GET['exportPending'])) {
  $result = $_SESSION['resultPending'];
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
  }
  echo '</table>';
}elseif(isset($_GET['searchExportPending'])) {
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
$result = $_SESSION['resultPendingSearch'];
echo '<h1>Reports</h1>';
echo '<table style="border-collapse:collapse;">';
echo '<thead>';
echo '<th style="border: 1px solid black;">ID</th>';
echo '<th style="border: 1px solid black;">Student Number</th>';
echo '<th style="border: 1px solid black;">Last Name</th>';
echo '<th style="border: 1px solid black;">First Name</th>';
echo '<th style="border: 1px solid black;">Middle Initial</th>';
echo '<th style="border: 1px solid black;">Course</th>';
echo '<th style="border: 1px solid black;">Contact Number</th>';
echo '<th style="border: 1px solid black;">Status</th>';
echo '<th style="border: 1px solid black;">Date Graduated</th>';
echo '<th style="border: 1px solid black;">Applied For</th>';
echo '<th style="border: 1px solid black;">Purpose</th>';
echo '<th style="border: 1px solid black;">Due_Date</th>';
echo '<th style="border: 1px solid black;">Remarks</th>';
echo '</thead>';
foreach ($result as $row) {
  echo '<tr>';
  echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
  echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
  echo '</tr>';
    }
echo '</table>';
}elseif (isset($_GET['exportPrinted'])) {
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  $result = $_SESSION['resultPrinted'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}elseif (isset($_GET['searchExportPrinted'])) {
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  $result = $_SESSION['resultPrintedSearch'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}elseif (isset($_GET['exportVerified'])) {
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  $result = $_SESSION['resultVerified'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}elseif (isset($_GET['searchExportVerified'])) {
  // header("Content-Type: application/xls");
  // header("Content-Disposition: attachment; filename=filename.xls");
  // header("Pragma: no-cache");
  // header("Expires: 0");
  $result = $_SESSION['resultVerifiedSearch'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}elseif(isset($_GET['exportReleased'])) {
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  $view=new view;
  $result = $_SESSION['resultReleased'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
  echo '<th style="border: 1px solid black;">Releas By:</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$view->getSName($row['releasedby']).'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}elseif (isset($_GET['searchExportReleased'])) {
  $view=new view;
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=filename.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  $result = $_SESSION['resultReleasedSearch'];
  echo '<h1>Reports</h1>';
  echo '<table style="border-collapse:collapse;">';
  echo '<thead>';
  echo '<th style="border: 1px solid black;">ID</th>';
  echo '<th style="border: 1px solid black;">Student Number</th>';
  echo '<th style="border: 1px solid black;">Last Name</th>';
  echo '<th style="border: 1px solid black;">First Name</th>';
  echo '<th style="border: 1px solid black;">Middle Initial</th>';
  echo '<th style="border: 1px solid black;">Course</th>';
  echo '<th style="border: 1px solid black;">Contact Number</th>';
  echo '<th style="border: 1px solid black;">Status</th>';
  echo '<th style="border: 1px solid black;">Date Graduated</th>';
  echo '<th style="border: 1px solid black;">Applied For</th>';
  echo '<th style="border: 1px solid black;">Purpose</th>';
  echo '<th style="border: 1px solid black;">Due_Date</th>';
    echo '<th style="border: 1px solid black;">Released By.</th>';
  echo '<th style="border: 1px solid black;">Remarks</th>';
  echo '</thead>';
  foreach ($result as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black;"><center>'.$row['id'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['StudentNo'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['LastName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['FirstName'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['MI'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Course'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['contact_no'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Status'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Date_Grad'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Applied_For'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['purposes'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['Due_Date'].'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$view->getSName($row['releasedby']).'</center></td>';
    echo '<td style="border: 1px solid black;"><center>'.$row['remarks'].'</center></td>';
    echo '</tr>';
      }
  echo '</table>';
}
?>
