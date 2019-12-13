<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
// header("Content-Type: application/xls");
// header("Content-Disposition: attachment; filename=filename.xls");
// header("Pragma: no-cache");
// header("Expires: 0");
$results = $_SESSION['released'];

// foreach ($results as $row) {
//   $row->id;
// }

$view=new view;
// $pending = $view->chartreleased();

// foreach ($pending as $row) {
//   echo $row;
// }

// header("Content-Type: application/xls");
// header("Content-Disposition: attachment; filename=filename.xls");
// header("Pragma: no-cache");
// header("Expires: 0");
?>

<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <tr style="border:1px solid black;"><td>
      <?php
      $pending = $view->chartreleased();
       ?>
    </td></tr>
  </body>
</html> -->
