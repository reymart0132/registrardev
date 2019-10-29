<?php
$string = 'CELAS,CMT';
$array = explode(',',$string);
$array2 = "'".implode('\',\'', $array)."'";
echo $array2;
 ?>
