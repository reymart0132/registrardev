<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
$view = new view;
 ?>
 <script>
 window.onload = function () {

     var twork = document.getElementById("twork").getContext('2d');
     var myChart3 = new Chart(twork, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Number of Work Received',
                 data: [<?php $view->twork(); ?>],
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
         options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
     });

     var pending = document.getElementById("pending").getContext('2d');
     var myChart1 = new Chart(pending, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Released Transaction',
                 data: [<?php $view->cpending(); ?>],
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
         options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
     });

     var released = document.getElementById("released").getContext('2d');
     var myChart = new Chart(released, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Released Transaction',
                 data: [<?php $view->chartreleased(); ?>],
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

     var cwork = document.getElementById("cwork").getContext('2d');
     var myChart2 = new Chart(cwork, {
         type: 'horizontalBar',
         data: {
             labels: [<?php $view->chartlabel(); ?>],
             datasets: [{
                 label: 'Completed transactions',
                 data: [<?php $view->cwork(); ?>],
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
         options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
     });


 };
</script>
