<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
 ?>
 <script> window.onload = function () {
     var pending = document.getElementById("pending").getContext('2d');
     var myChart = new Chart(pending, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Pending Charts',
                 data: [<?php $view->chartPendingdata(); ?>],
                 backgroundColor: [
                   'rgb(220, 101, 161)',
              'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  ],
             }]
         },
     });
     var forsign = document.getElementById("forSignature").getContext('2d');
     var myChart = new Chart(forsign, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'For Signature Charts',
                 data: [<?php $view->chartForSignaturedata(); ?>],
                 backgroundColor: [
                   'rgb(220, 101, 161)',
              'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  ],
             }]
         },
     });
     var release = document.getElementById("release").getContext('2d');
     var myChart = new Chart(release, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Released Charts',
                 data: [<?php $view->chartReleasedata(); ?>],
                 backgroundColor: [
                   'rgb(220, 101, 161)',
              'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  'rgb(220, 101, 161)',
                'rgb(220, 101, 161)',
                  ],
             }]
         },
     });
 }
 ;</script>
