<?php
require_once 'config.php';
class Search extends config{


  public function searchPending(){

    $dateFrom = $_GET['dateFrom'];
    $dateTo = $_GET['dateTo'];
    $criteria = $_GET['criteria'];
    $search = $_GET['search'];

    $config = new config;
    $con = $config->con();
    $user = new User();
    $college1 = $user->data()->colleges;
    $college2 = explode(',',$college1);
    $college12 ="'".implode('\',\'',$college2)."'";
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";

  
    if (!empty($search) && !empty($criteria)) {
      $sql .= "AND `$criteria` LIKE '%$search%'";
    }

    if (!empty($dateFrom) && !empty($dateTo)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
    }

    if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
    }

    $data = $con->prepare($sql);
    $data ->execute();
    $rows=$data-> fetchAll(PDO::FETCH_OBJ);

    // paginationqueryhere
    // $limit = 1;
    //
    // if (!isset($_GET['page'])) {
    //       $page = 1;
    //   }else{
    //       $page = $_GET['page'];
    // }
    //
    // $start = ($page-1)*$limit;
    //
    // $total_results = $data->rowCount();
    // $total_pages = ceil($total_results/$limit);
    //
    // $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";
    //
    // if(empty($search)){
    //     $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12) LIMIT $start,$limit";
    // }
    //
    // if (!empty($search) && !empty($criteria)) {
    //   $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    // }
    //
    // if (!empty($dateFrom) && !empty($dateTo)) {
    //   $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
    // }
    //
    // if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
    //   $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    // }
    //
    // $data2 = $con->prepare($sql2);
    // $data2 ->execute();
    // $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


    echo '<table class="table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
    echo '<thead class="thead" style="background-color:#DC65A1;">';
    echo '
    <th class="text-center" style= "font-weight:bold; color:white;">Student Number</td>

    <th class="text-center" style= "font-weight:bold; color:white;">Full Name</td>

    <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Contact Number</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Status</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Date Graduated</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Applied For</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Purpose</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Due Date</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Remarks</td>
    <th class="text-center" style= "font-weight:bold; color:white;">Actions</td>
    ';
    echo '</thead>';

    foreach ($rows as $row) {
      echo '<tr>';
        // echo '<td class="text-center">'.$row ->id.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->StudentNo.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->Course.'</br></td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->contact_no.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->Status.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->Date_Grad.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->Applied_For.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->purposes.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->Due_Date.'</td>';
        echo '<td class="text-center" style="color:#DC65A1;">'.$row->remarks.'</br></td>';
        echo '<td class="text-center"><a class="btn btn-outline-success" href="search-cartelduane.php?printed='.$row->id.'">Printed </a></br></td>';

     echo '</tr>';
      }
    echo '</table>';

    // echo '<ul class="pagination ml-2">';
    // for ($p=1; $p <=$total_pages; $p++) {
    //  echo '<li class="page-item" >';
    //  echo  '<a class= "page-link" href="?search='.$search.'&criteria='.$criteria.'&page='.$p.'">'.$p;
    //  echo  '</a>';
    //  echo '</li>';
    // }
    //  echo '</ul>';

 //    echo '
 //    <div class="container-fluid mt-4">
 //     <form class="" action="" method="post">
 //       <div class="row">
 //         <div class="col-sm">
 //           <label for="dateFrom">From:</label>
 //           <input  class="form-control" type="date" name="dateFrom" value=""  data-date-format="YYYY MMMM DD">
 //         </div>
 //         <div class="col-sm">
 //           <label for="dateTo">To:</label>
 //           <input  class="form-control" type="date" name="dateTo" value="" >
 //         </div>
 //         <div class="col-sm">
 //           <label for="criteria">Filter By:</label>
 //           <select class="form-control" name="criteria">
 //             <option value="LastName">Last Name</option>
 //             <option value="Course">Course</option>
 //             <option value="Status">Status</option>
 //             <option value="Applied_For">Applied For</option>
 //             <option value="purposes">Reason For Applying</option>
 //           </select>
 //         </div>
 //         <div class="col-sm mt-2">
 //           <label for="search"></label>
 //           <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
 //         </div>
 //         <div class="col-sm mt-4 pt-2">
 //           <label for="submit"></label>
 //           <input type="submit" class="btn text-white" name="submit" value="Submit" style="background-color:#DC65A1;">
 //         </div>
 //       </div>
 //     </form>
 // </div>';
    }


  }
?>
