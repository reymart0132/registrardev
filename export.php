<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
  $nexport = new nexport;
  $label =$nexport->exportchartlabel();
  $twork =$nexport->exporttwork();
    $label2 =$nexport->exportchartlabel();
    $cwork =$nexport->exporttwork();
      $label3 =$nexport->exportchartlabel();
      $cpending =$nexport->exportcpending();
        $label4 =$nexport->exportchartlabel();
        $creleased =$nexport->exportchartreleased();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="sample.csv"');
        $data = array($label, $twork,$label2,$cwork,$label3,$cpending,$label4,$creleased);
      // echo $data;
        $fp = fopen('php://output', 'wb');
        foreach ( $data as $line ) {
            $val = explode(",", $line);
          fputcsv($fp, $val);
        }
        fclose($fp);
?>
