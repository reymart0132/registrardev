<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';
class viewState extends config{

  public function degreeCourseAll(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_course`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);

      $limit = 10;

      if (isset($_GET['page'])) {
        $page = $_GET{'page'};
      }

      if (!isset($_GET['page'])) {
            $page = 1;
        } else{
            $page = $_GET['page'];
      }

      $start = ($page-1)*$limit;

      $total_results = $data->rowCount();
      $total_pages = ceil($total_results/$limit);

      $sql2 = "SELECT * FROM `tbl_course` LIMIT $start,$limit";
      $data2 = $con-> prepare($sql2);
      $data2 ->execute();
      $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);


      echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
      echo '<thead class="thead" style="background-color:#DC65A1;">';
      echo '
      <th class="text-center" style= "font-weight:bold; color:white;">ID</td>
      <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
            <th class="text-center" style= "font-weight:bold; color:white;">State</td>
      ';
      echo '</thead>';

      foreach ($rows2 as $row) {
        echo '<tr>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->id.'</br></td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->course.'</td>';
        echo '<td class="text-center"><a class="btn btn-outline-success" href="state.php?id='.$row->id.'&stateCourse='.$row->state.'&page='.$page.'&tab=course">'.$row->state.'</a></td>';
        echo '</tr>';
      }
      echo '</table>';

      echo '<ul class="pagination  ml-2 ">';
      for ($p=1; $p <=$total_pages; $p++) {
       echo '<li id = "pagelink" class="page-item">';
       echo  '<a class= "page-link" href="?tab=course&page='.$p.'">'.$p;
       echo  '</a>';
       echo '</li>';
          }
      echo '</ul>';
        }

      public function collegeSPAll(){

        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `collegeschool`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);

        $limit = 10;

        if (isset($_GET['pageC'])) {
          $page = $_GET{'pageC'};
        }

        if (!isset($_GET['pageC'])) {
              $page = 1;
          } else{
              $page = $_GET['pageC'];
        }

        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);

        $sql2 = "SELECT * FROM `collegeschool` LIMIT $start,$limit";
        $data2 = $con-> prepare($sql2);
        $data2 ->execute();
        $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);


        echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
        echo '<thead class="thead" style="background-color:#DC65A1;">';
        echo '
        <th class="text-center" style= "font-weight:bold; color:white;">ID</td>
        <th class="text-center" style= "font-weight:bold; color:white;">College</td>
              <th class="text-center" style= "font-weight:bold; color:white;">State</td>
        ';
        echo '</thead>';

        foreach ($rows2 as $row) {
          echo '<tr>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->id.'</br></td>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->college_school.'</td>';
          echo '<td class="text-center"><a class="btn btn-outline-success" href="state.php?id='.$row->id.'&stateCollege='.$row->state.'&pageC='.$page.'&tab=college">'.$row->state.'</a></td>';
          echo '</tr>';
        }
        echo '</table>';

        echo '<ul class="pagination  ml-2 ">';
        for ($p=1; $p <=$total_pages; $p++) {
         echo '<li id = "pagelink" class="page-item">';
         echo  '<a class= "page-link" href="?tab=college&pageC='.$p.'">'.$p;
         echo  '</a>';
         echo '</li>';
        }
        echo '</ul>';
      }


      public function requestingForSPAll(){

        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_applied_for`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);

        $limit = 10;

        if (isset($_GET['pageA'])) {
          $page = $_GET{'pageA'};
        }

        if (!isset($_GET['pageA'])) {
              $page = 1;
          } else{
              $page = $_GET['pageA'];
        }

        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);

        $sql2 = "SELECT * FROM `tbl_applied_for` LIMIT $start,$limit";
        $data2 = $con-> prepare($sql2);
        $data2 ->execute();
        $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);


        echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
        echo '<thead class="thead" style="background-color:#DC65A1;">';
        echo '
        <th class="text-center" style= "font-weight:bold; color:white;">ID</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Applied For</td>
              <th class="text-center" style= "font-weight:bold; color:white;">State</td>
        ';
        echo '</thead>';

        foreach ($rows2 as $row) {
          echo '<tr>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->id.'</br></td>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->appliedfor.'</td>';
          echo '<td class="text-center"><a class="btn btn-outline-success" href="state.php?id='.$row->id.'&stateAppliedFor='.$row->state.'&pageA='.$page.'&tab=appliedfor">'.$row->state.'</a></td>';
          echo '</tr>';
        }
        echo '</table>';

        echo '<ul class="pagination  ml-2 ">';
        for ($p=1; $p <=$total_pages; $p++) {
         echo '<li id = "pagelink" class="page-item">';
         echo  '<a class= "page-link" href="?tab=appliedfor&pageA='.$p.'">'.$p;
         echo  '</a>';
         echo '</li>';
        }
        echo '</ul>';
      }
      //
      // public function collegeSPAll(){
      //
      //   $config = new config;
      //   $con = $config->con();
      //   $sql = "SELECT * FROM `collegeschool`";
      //   $data = $con-> prepare($sql);
      //   $data ->execute();
      //   $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      //
      //   $limit = 10;
      //
      //   if (isset($_GET['pageC'])) {
      //     $page = $_GET{'pageC'};
      //   }
      //
      //   if (!isset($_GET['pageC'])) {
      //         $page = 1;
      //     } else{
      //         $page = $_GET['pageC'];
      //   }
      //
      //   $start = ($page-1)*$limit;
      //
      //   $total_results = $data->rowCount();
      //   $total_pages = ceil($total_results/$limit);
      //
      //   $sql2 = "SELECT * FROM `collegeschool` LIMIT $start,$limit";
      //   $data2 = $con-> prepare($sql2);
      //   $data2 ->execute();
      //   $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);
      //
      //
      //   echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
      //   echo '<thead class="thead" style="background-color:#DC65A1;">';
      //   echo '
      //   <th class="text-center" style= "font-weight:bold; color:white;">ID</td>
      //   <th class="text-center" style= "font-weight:bold; color:white;">College</td>
      //         <th class="text-center" style= "font-weight:bold; color:white;">State</td>
      //   ';
      //   echo '</thead>';
      //
      //   foreach ($rows2 as $row) {
      //     echo '<tr>';
      //     echo '<td class="text-center" style="color:#DC65A1;">'.$row->id.'</br></td>';
      //     echo '<td class="text-center" style="color:#DC65A1;">'.$row->college_school.'</td>';
      //     echo '<td class="text-center"><a class="btn btn-outline-success" href="state.php?id='.$row->id.'&stateCollege='.$row->state.'&pageC='.$page.'&tab=college">'.$row->state.'</a></td>';
      //     echo '</tr>';
      //   }
      //   echo '</table>';
      //
      //   echo '<ul class="pagination  ml-2 ">';
      //   for ($p=1; $p <=$total_pages; $p++) {
      //    echo '<li id = "pagelink" class="page-item">';
      //    echo  '<a class= "page-link" href="?tab=college&pageC='.$p.'">'.$p;
      //    echo  '</a>';
      //    echo '</li>';
      //   }
      //   echo '</ul>';
      // }

      public function AllreasonFA(){

        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_purposes`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);

        $limit = 10;

        if (isset($_GET['pageP'])) {
          $page = $_GET{'pageP'};
        }

        if (!isset($_GET['pageP'])) {
              $page = 1;
          } else{
              $page = $_GET['pageP'];
        }

        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);

        $sql2 = "SELECT * FROM `tbl_purposes` LIMIT $start,$limit";
        $data2 = $con-> prepare($sql2);
        $data2 ->execute();
        $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);


        echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
        echo '<thead class="thead" style="background-color:#DC65A1;">';
        echo '
        <th class="text-center" style= "font-weight:bold; color:white;">ID</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Reason For Requesting</td>
              <th class="text-center" style= "font-weight:bold; color:white;">State</td>
        ';
        echo '</thead>';

        foreach ($rows2 as $row) {
          echo '<tr>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->purp_id.'</br></td>';
          echo '<td class="text-center" style="color:#DC65A1;">'.$row->purposes.'</td>';
          echo '<td class="text-center"><a class="btn btn-outline-success" href="state.php?id='.$row->purp_id.'&purpose='.$row->state.'&pageP='.$page.'&tab=purposes">'.$row->state.'</a></td>';
          echo '</tr>';
        }
        echo '</table>';

        echo '<ul class="pagination  ml-2 ">';
        for ($p=1; $p <=$total_pages; $p++) {
         echo '<li id = "pagelink" class="page-item">';
         echo  '<a class= "page-link" href="?tab=purposes&pageP='.$p.'">'.$p;
         echo  '</a>';
         echo '</li>';
        }
        echo '</ul>';
      }
}
 ?>
