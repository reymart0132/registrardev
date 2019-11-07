<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
 ?>
<script type="text/javascript">
window.onload = function () {

var pending = new CanvasJS.Chart("chartPending", {
theme: "light1", // "light2", "dark1", "dark2"
animationEnabled: true, // change to true
title:{
 text: "Pending charts"
},
data: [
{
 // Change type to "bar", "area", "spline", "pie",etc.
 type: "column",
 dataPoints: [
 <?php $view->chartPending() ?>
 ]
}
]
});
pending.render();


var signature = new CanvasJS.Chart("chartForSignature", {
theme: "light1", // "light2", "dark1", "dark2"
animationEnabled: true, // change to true
title:{
 text: "For Signature charts"
},
data: [
{
 // Change type to "bar", "area", "spline", "pie",etc.
 type: "column",
 dataPoints: [
 <?php $view->chartForSignature() ?>
 ]
}
]
});
signature.render();


var release = new CanvasJS.Chart("chartReleased", {
theme: "light1", // "light2", "dark1", "dark2"
animationEnabled: true, // change to true
title:{
 text: "Release charts"
},
data: [
{
 // Change type to "bar", "area", "spline", "pie",etc.
 type: "column",
 dataPoints: [
 <?php $view->chartReleased() ?>
 ]
}
]
});
release.render();

}
</script>
