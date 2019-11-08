<?php
$proponents = "CMT,CELAS,CHM,COMPASS";
$proponentA = explode(',',$proponents);

var_dump($proponentA);

foreach ($proponentA as $proponent) {
    echo $proponent."<br />";
}

$proponentB = implode(',',$proponentA);
var_dump($proponentB);
 ?>
