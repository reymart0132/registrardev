<?php
require_once 'config.php';
class SearchAdmin extends config{


  public function searchPending(){

    if(!empty($_GET['dateFrom'])){
    $dateFrom = $_GET['dateFrom'];
    };
    if(!empty($_GET['dateTo'])){
      $dateTo = $_GET['dateTo'];
    };
    if(!empty($_GET['criteria'])){
      $criteria = $_GET['criteria'];
    };
    if(!empty($_GET['search'])){
      $search = $_GET['search'];
    };


    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING'";

    if (!empty($search) && !empty($criteria)) {
      $sql .= "AND `$criteria` LIKE '%$search%'";
    }elseif (!empty($dateFrom) && !empty($dateTo)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
    }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
    }

    $sql3 = "SELECT * FROM `work`";
    $data3 = $con-> prepare($sql3);
    $data3 ->execute();
    $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['allCSV'] = $rowsAll;

    $data = $con->prepare($sql);
    $data ->execute();
    $rows=$data-> fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['resultPendingSearchAdmin'] = $rows;

    $limit = 10;

    if (!isset($_GET['Ppage'])) {
          $page = 1;
      }else{
          $page = $_GET['Ppage'];
    }

    if(isset($_GET['Ppage']) > 1){
      $_GET['V1page'] = 1;
      $_GET['PRpage'] = 1;
      $_GET['V2page'] = 1;
      $_GET['Rpage'] = 1;
    }

    $start = ($page-1)*$limit;

    $total_results = $data->rowCount();
    $total_pages = ceil($total_results/$limit);

    if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
      echo "<script>alert('Empty search area!');</script>";
      echo "<script type='text/javascript'>window.top.location='view_pending_requests.php';</script>"; exit;
    }else {
        $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING'";
    }

    if (!empty($dateFrom) && empty($dateTo)) {
      echo "<script>alert('Both date fields are required!');</script>";
      echo "<script type='text/javascript'>window.top.location='view_pending_requests.php';</script>"; exit;
    }elseif (empty($dateFrom) && !empty($dateTo)) {
      echo "<script>alert('Both date fields are required!');</script>";
      echo "<script type='text/javascript'>window.top.location='view_pending_requests.php';</script>"; exit;
    }



    if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
      $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    }elseif (!empty($search) && !empty($criteria)) {
      $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    }elseif (!empty($dateFrom) && !empty($dateTo)) {
      $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
    }


    $data2 = $con->prepare($sql2);
    $data2 ->execute();
    $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);
    $count=$data2->rowCount();

    echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
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
    <th class="text-center" style= "font-weight:bold; color:white;" colspan="4">Actions</td>
    ';
    echo '</thead>';

    if ($count>=1) {
      foreach ($rows2 as $row) {
        echo '<tr>';
          // echo '<td class="text-center align-middle">'.$row ->id.'</td>';
          $type = $row->formtype;
          $due= $row->Due_Date;
          $due2 = strtotime($due);
          $date_diff = 60*60*24*2;

          if ($due2 < time()+$date_diff) {
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->StudentNo.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->Course.'</br></td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->contact_no.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->Status.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->Date_Grad.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->Applied_For.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->purposes.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->Due_Date.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757">'.$row->remarks.'</br></td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success btt" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
            echo '<td class="text-center align-middle"  style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success btt" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
            $af = explode(",",$row->Applied_For);
            echo '<td class="text-center align-middle"  style="color:white; background-color:#ff5757">';
            foreach ($af as $row->Applied_For) {

            if ($row->Applied_For == 'Permit to Cross Enroll') {
              echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
            }elseif($row->Applied_For == 'Cert of Enrollment'){
              echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
            }elseif ($row->Applied_For == 'Cert of Graduation') {
            echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/cog_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
          }elseif ($row->Applied_For == 'EMI') {
          echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/EMI_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
        }elseif ($row->Applied_For == 'No Scholarship') {
          echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI[0].". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
        }else{
          echo '<p class="inl2">NA</p></br>';
        }
        }
        echo '</td>';

              echo '</tr>';

          }else if ($due2 < time()+$date_diff && $type == "special") {
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
            echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success btt" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
             echo '<td class="text-center align-middle"  style="color:white; background-color:#a68df9"><a class="btn btn-outline-success btt" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
             $af = explode(",",$row->Applied_For);
             echo '<td class="text-center align-middle"  style="color:white; background-color:#a68df9">';
             foreach ($af as $row->Applied_For) {

             if ($row->Applied_For == 'Permit to Cross Enroll') {
               echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
             }elseif($row->Applied_For == 'Cert of Enrollment'){
               echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
             }elseif ($row->Applied_For == 'Cert of Graduation') {
             echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/cog_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
           }elseif ($row->Applied_For == 'EMI') {
           echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/EMI_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
         }elseif ($row->Applied_For == 'No Scholarship') {
           echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI.". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
         }else{
           echo '<p class="inl2">NA</p></br>';
         }
         }
         echo '</td>';
              echo '</tr>';
         }else if($type == "special"){
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success btt" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
             echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success btt" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
             $af = explode(",",$row->Applied_For);
             echo '<td class="text-center align-middle"  style="color:white; background-color:#a68df9">';
             foreach ($af as $row->Applied_For) {

             if ($row->Applied_For == 'Permit to Cross Enroll') {
               echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
             }elseif($row->Applied_For == 'Cert of Enrollment'){
               echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
             }elseif ($row->Applied_For == 'Cert of Graduation') {
             echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/cog_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
           }elseif ($row->Applied_For == 'EMI') {
           echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/EMI_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
         }elseif ($row->Applied_For == 'No Scholarship') {
           echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI[0].". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
         }else{
           echo '<p class="inl2">NA</p></br>';
         }
         }
         echo '</td>';

             echo '</tr>';
         }else {
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->StudentNo.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->Course.'</br></td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->contact_no.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->Status.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->Date_Grad.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->Applied_For.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->purposes.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->Due_Date.'</td>';
          echo '<td class="text-center align-middle" style="color:#DC65A1;">'.$row->remarks.'</br></td>';
            echo '<td class="text-center align-middle" style="color:white;"><a class="btn bg-light btn-outline-success btt" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
            echo '<td class="text-center align-middle"><a class="btn btn-outline-success btt" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
            $af = explode(",",$row->Applied_For);
            echo '<td class="text-center align-middle"  style="color:white; background-color:#ff5757">';
            foreach ($af as $row->Applied_For) {

            if ($row->Applied_For == 'Permit to Cross Enroll') {
              echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
            }elseif($row->Applied_For == 'Cert of Enrollment'){
              echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
            }elseif ($row->Applied_For == 'Cert of Graduation') {
            echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/cog_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
          }elseif ($row->Applied_For == 'EMI') {
          echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/EMI_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
        }elseif ($row->Applied_For == 'No Scholarship') {
          echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI[0].". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
        }else{
          echo '<p class="inl2">NA</p></br>';
        }
        }
        echo '</td>';
            echo '</tr>';
          }
        }
      echo '</table>';
      echo '<a class= "btn btn-success mb-2 float-right"href="export.php?searchExportPending">Create Excel File</a>';
    }else {
      echo '</table>';
      echo '<center>No Results Found</center>';
    }

      echo '<ul class="pagination ml-2">';
      for ($p=1; $p <=$total_pages; $p++) {
        if (!empty($search) && !empty($criteria)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?search='.$search.'&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage='.$p.'&submitPending=Submit#pending">'.$p;
          echo  '</a>';
          echo '</li>';
        }elseif(!empty($dateFrom) && !empty($dateTo)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=view&submit=submitPending&dateTo='.$dateTo.'&Ppage='.$p.'&submitPending=Submit#pending">'.$p;
          echo  '</a>';
          echo '</li>';
        }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?tab=view&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Ppage='.$p.'&submitPending=Submit#pending&submit=submitPending">'.$p;
          echo  '</a>';
          echo '</li>';
        }
      }
      echo '</ul>';

    echo '
    <div class="container-fluid mt-4">
     <form class="" action="" method="get">
       <div class="row">
         <div class="col-sm">
           <label for="dateFrom">From:</label>
           <input  class="form-control" type="date" name="dateFrom" id="startDate"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
         </div>
         <div class="col-sm">
           <label for="dateTo">To:</label>
           <input  class="form-control" type="date" name="dateTo" id="endDate"  onkeydown="return false" placeholder="dd-mm-yyyy">
         </div>
         <div class="col-sm">
           <label for="criteria">Filter By:</label>
           <select class="form-control" name="criteria">
             <option value="FirstName">First Name</option>
             <option value="LastName">Last Name</option>
             <option value="Course">Course</option>
             <option value="Status">Status</option>
             <option value="Applied_For">Applied For</option>
             <option value="purposes">Reason For Applying</option>
           </select>
         </div>
         <div class="col-sm mt-2">
           <label for="search"></label>
           <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
         </div>
         <div class="col-sm mt-4 pt-2">
           <label for="submit"></label>
           <input type="submit" class="btn text-white" name="submitPending" value="Submit" style="background-color:#DC65A1;">
           <a class= "btn btn-success"href="export.php?exportAll">Export All</a>
         </div>
       </div>
     </form>
 </div>';
  }
    //
    public function searchPrinted(){

      if(!empty($_GET['dateFrom'])){
      $dateFrom = $_GET['dateFrom'];
      };
      if(!empty($_GET['dateTo'])){
        $dateTo = $_GET['dateTo'];
      };
      if(!empty($_GET['criteria'])){
        $criteria = $_GET['criteria'];
      };
      if(!empty($_GET['search'])){
        $search = $_GET['search'];
      };

      $config = new config;
      $con = $config->con();
      $user = new User();
      $id1 = $user->data()->id;
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED'";
      if (!empty($search) && !empty($criteria)) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_ASSOC);

      $sql3 = "SELECT * FROM `work`";
      $data3 = $con-> prepare($sql3);
      $data3 ->execute();
      $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['allCSV'] = $rowsAll;

      $_SESSION['resultPrintedSearchAdmin'] = $rows;

      $limit = 10;

      if (!isset($_GET['PRpage'])) {
            $page = 1;
        }else{
            $page = $_GET['PRpage'];
      }

      if(isset($_GET['PRpage']) > 1){
        $_GET['Ppage'] = 1;
        $_GET['V1'] = 1;
        $_GET['V2page'] = 1;
        $_GET['Rpage'] = 1;
      }

      $start = ($page-1)*$limit;

      $total_results = $data->rowCount();
      $total_pages = ceil($total_results/$limit);

      if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
        echo "<script>alert('Empty search area!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=printed';</script>"; exit;
      }else {
          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED'";
      }

      if (!empty($dateFrom) && empty($dateTo)) {
        echo "<script>alert('Both date fields are required!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=printed';</script>"; exit;
      }elseif (empty($dateFrom) && !empty($dateTo)) {
        echo "<script>alert('Both date fields are required!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=printed';</script>"; exit;
      }



      if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($search) && !empty($criteria)) {
        $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
      }


      $data2 = $con->prepare($sql2);
      $data2 ->execute();
      $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


      echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
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
      <th class="text-center" style= "font-weight:bold; color:white;" colspan="2">Actions</td>
      ';
      echo '</thead>';

      $count = $data2->rowCount();

      if ($count>=1) {
        foreach ($rows2 as $row) {
          echo '<tr>';
            // echo '<td class="text-center">'.$row ->id.'</td>';
            $type = $row->formtype;
            $due= $row->Due_Date;
            $due2 = strtotime($due);
            $date_diff = 60*60*24*2;

            if ($due2 < time()+$date_diff) {
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->StudentNo.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Course.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->contact_no.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Status.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Date_Grad.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Applied_For.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->purposes.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Due_Date.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->remarks.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success" href="view_pending_requests.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
              echo '<td class="text-center"  style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
                echo '</tr>';

            }else if ($due2 < time()+$date_diff && $type == "special") {
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success" href="view_pending_requests.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
                               echo '<td class="text-center"  style="color:white; background-color:#a68df9"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
                echo '</tr>';
           }else if($type == "special"){
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success" href="view_pending_requests.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';

               echo '</tr>';
           }else {
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
            echo '<td class="text-center"><a class="btn btn-outline-success" href="view_pending_requests.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
            echo '<td class="text-center"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
            echo '</tr>';
            }
          }
          echo '</table>';
          echo '<a class= "btn btn-success mb-2 float-right"href="export.php?searchExportPrintedAdmin">Create Excel File</a>';
      }else {
          echo '</table>';
          echo '<center>No Results Found</center>';
      }


      echo '<ul class="pagination ml-2">';

        for ($p=1; $p <=$total_pages; $p++) {
          if (!empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?search='.$search.'&tab=printed&submit=submitPrinted&criteria='.$criteria.'&PRpage='.$p.'&submitPrinted=Submit#printed">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif(!empty($dateFrom) && !empty($dateTo)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=printed&submit=submitPrinted&dateTo='.$dateTo.'&PRpage='.$p.'&submitPrinted=Submit#printed">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?tab=printed&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&PRpage='.$p.'&submitPrinted=Submit#printed&submit=submitPrinted">'.$p;
            echo  '</a>';
            echo '</li>';
          }
        }
        echo '</ul>';

      echo '
      <div class="container-fluid mt-4">
       <form class="" action="" method="get">
         <div class="row">
           <div class="col-sm">
             <label for="dateFrom">From:</label>
             <input  class="form-control" type="date" name="dateFrom" id="startDate2"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
           </div>
           <div class="col-sm">
             <label for="dateTo">To:</label>
             <input  class="form-control" type="date" name="dateTo" id="endDate2"  onkeydown="return false" placeholder="dd-mm-yyyy">
           </div>
           <div class="col-sm">
             <label for="criteria">Filter By:</label>
             <select class="form-control" name="criteria">
              <option value="FirstName">First Name</option>
               <option value="LastName">Last Name</option>
               <option value="Course">Course</option>
               <option value="Status">Status</option>
               <option value="Applied_For">Applied For</option>
               <option value="purposes">Reason For Applying</option>
             </select>
           </div>
           <div class="col-sm mt-2">
             <label for="search"></label>
             <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
           </div>
           <div class="col-sm mt-4 pt-2">
             <label for="submit"></label>
             <input type="submit" class="btn text-white" name="submitPrinted" value="Submit" style="background-color:#DC65A1;">
             <a class= "btn btn-success"href="export.php?exportAll">Export All</a>
           </div>
         </div>
       </form>
   </div>';
    }

    public function searchVerified(){
      if(!empty($_GET['dateFrom'])){
      $dateFrom = $_GET['dateFrom'];
      };
      if(!empty($_GET['dateTo'])){
        $dateTo = $_GET['dateTo'];
      };
      if(!empty($_GET['criteria'])){
        $criteria = $_GET['criteria'];
      };
      if(!empty($_GET['search'])){
        $search = $_GET['search'];
      };

      $config = new config;
      $con = $config->con();
      $user = new User();
      $id1 = $user->data()->id;
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";

      if (!empty($search) && !empty($criteria)) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_ASSOC);

      $_SESSION['resultVerifiedSearchAdmin'] = $rows;

      $sql3 = "SELECT * FROM `work`";
      $data3 = $con-> prepare($sql3);
      $data3 ->execute();
      $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['allCSV'] = $rowsAll;

      $limit = 10;

      if (!isset($_GET['V2page'])) {
            $page = 1;
        }else{
            $page = $_GET['V2page'];
      }

      if(isset($_GET['V1page']) > 1){
        $_GET['Ppage'] = 1;
        $_GET['PRpage'] = 1;
        $_GET['V1page'] = 1;
        $_GET['Rpage'] = 1;
      }
      $start = ($page-1)*$limit;

      $total_results = $data->rowCount();
      $total_pages = ceil($total_results/$limit);

      if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
        echo "<script>alert('Empty search area!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=forrelease1';</script>"; exit;
      }else {
            $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
      }

      if (!empty($dateFrom) && empty($dateTo)) {
        echo "<script>alert('Both date fields are required!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=forrelease1';</script>"; exit;
      }elseif (empty($dateFrom) && !empty($dateTo)) {
        echo "<script>alert('Both date fields are required!');</script>";
        echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=forrelease1';</script>"; exit;
      }

      if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($search) && !empty($criteria)) {
        $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
      }


      $data2 = $con->prepare($sql2);
      $data2 ->execute();
      $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


      echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
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

      $count = $data2->rowCount();

      if ($count>=1) {
        foreach ($rows2 as $row) {
          echo '<tr>';
            // echo '<td class="text-center">'.$row ->id.'</td>';
            $type = $row->formtype;
            $due= $row->Due_Date;
            $due2 = strtotime($due);
            $date_diff = 60*60*24*2;

            if ($due2 < time()+$date_diff) {
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->StudentNo.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Course.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->contact_no.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Status.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Date_Grad.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Applied_For.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->purposes.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Due_Date.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->remarks.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
                echo '</tr>';

            }else if ($due2 < time()+$date_diff && $type == "special") {
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
              echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
                echo '</tr>';
           }else if($type == "special"){
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
             echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
               echo '</tr>';
           }else {
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
            echo '<td class="text-center"><a class="btn btn-outline-success" href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
              echo '</tr>';
            }
          }
          echo '</table>';
          echo '<a class= "btn btn-success mb-2 float-right"href="export.php?searchExportVerifiedAllAdmin">Create Excel File</a>';
      }else{
          echo '</table>';
          echo '<center>No Results Found</center>';
      }

    echo '</table>';

      echo '<ul class="pagination ml-2">';

        for ($p=1; $p <=$total_pages; $p++) {
          if (!empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?search='.$search.'&tab=forrelease1&submit=submitVerfied&criteria='.$criteria.'&V1page='.$p.'&submitVerified=Submit#verified">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif(!empty($dateFrom) && !empty($dateTo)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=forrelease1&submit=submitVerfied&dateTo='.$dateTo.'&V1page='.$p.'&submitVerfied=Submit#verified">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?tab=forrelease1&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&V1page='.$p.'&submitVerfied=Submit#printed&submit=submitVerfied">'.$p;
            echo  '</a>';
            echo '</li>';
          }
        }
        echo '</ul>';

      echo '
      <div class="container-fluid mt-4">
       <form class="" action="" method="get">
         <div class="row">
           <div class="col-sm">
             <label for="dateFrom">From:</label>
             <input  class="form-control" type="date" name="dateFrom" id="startDate3"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
           </div>
           <div class="col-sm">
             <label for="dateTo">To:</label>
             <input  class="form-control" type="date" name="dateTo" id="endDate3"  onkeydown="return false" placeholder="dd-mm-yyyy">
           </div>
           <div class="col-sm">
             <label for="criteria">Filter By:</label>
             <select class="form-control" name="criteria">
              <option value="FirstName">First Name</option>
               <option value="LastName">Last Name</option>
               <option value="Course">Course</option>
               <option value="Status">Status</option>
               <option value="Applied_For">Applied For</option>
               <option value="purposes">Reason For Applying</option>
             </select>
           </div>
           <div class="col-sm mt-2">
             <label for="search"></label>
             <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
           </div>
           <div class="col-sm mt-4 pt-2">
             <label for="submit"></label>
             <input type="submit" class="btn text-white" name="submitVerifiedAll" value="Submit" style="background-color:#DC65A1;">
             <a class= "btn btn-success"href="export.php?exportAll">Export All</a>
           </div>
         </div>
       </form>
   </div>';
    }

        public function searchVerifiedAll(){
          if(!empty($_GET['dateFrom'])){
          $dateFrom = $_GET['dateFrom'];
          };
          if(!empty($_GET['dateTo'])){
            $dateTo = $_GET['dateTo'];
          };
          if(!empty($_GET['criteria'])){
            $criteria = $_GET['criteria'];
          };
          if(!empty($_GET['search'])){
            $search = $_GET['search'];
          };

          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
          if (!empty($search) && !empty($criteria)) {
            $sql .= "AND `$criteria` LIKE '%$search%'";
          }elseif (!empty($dateFrom) && !empty($dateTo)) {
            $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
          }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
          }

          $data = $con->prepare($sql);
          $data ->execute();
          $rows=$data-> fetchAll(PDO::FETCH_OBJ);

          $limit = 10;

          if (!isset($_GET['V2page'])) {
                $page = 1;
            }else{
                $page = $_GET['V2page'];
          }

          if(isset($_GET['V2page']) > 1){
            $_GET['Ppage'] = 1;
            $_GET['PRpage'] = 1;
            $_GET['V1page'] = 1;
            $_GET['Rpage'] = 1;
          }

          $start = ($page-1)*$limit;

          $total_results = $data->rowCount();
          $total_pages = ceil($total_results/$limit);

          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";


          if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
          }elseif (!empty($search) && !empty($criteria)) {
            $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
          }elseif (!empty($dateFrom) && !empty($dateTo)) {
            $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
          }


          $data2 = $con->prepare($sql2);
          $data2 ->execute();
          $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


          echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
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

          foreach ($rows2 as $row) {
            echo '<tr>';
              // echo '<td class="text-center">'.$row ->id.'</td>';
              $type = $row->formtype;
              $due= $row->Due_Date;
              $due2 = strtotime($due);
              $date_diff = 60*60*24*2;

          if ($due2 < time()+$date_diff) {
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->StudentNo.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Course.'</br></td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->contact_no.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Status.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Date_Grad.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Applied_For.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->purposes.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->Due_Date.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->remarks.'</br></td>';
            echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
              echo '</tr>';

          }else if ($due2 < time()+$date_diff && $type == "special") {
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
            echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
              echo '</tr>';
         }else if($type == "special"){
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->StudentNo.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Course.'</br></td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->contact_no.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Status.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Date_Grad.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Applied_For.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->purposes.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->Due_Date.'</td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9">'.$row->remarks.'</br></td>';
           echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
             echo '</tr>';
         }else {
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
          echo '<td class="text-center"><a class="btn btn-outline-success" href="view_pending_requests.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
            echo '</tr>';
          }

              }
          echo '</table>';

          echo '<ul class="pagination ml-2">';

            for ($p=1; $p <=$total_pages; $p++) {
              if (!empty($search) && !empty($criteria)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?search='.$search.'&tab=forrelease1&submit=submitVerfiedAll&criteria='.$criteria.'&V2page='.$p.'&submitVerifiedAll=Submit#verifiedall">'.$p;
                echo  '</a>';
                echo '</li>';
              }elseif(!empty($dateFrom) && !empty($dateTo)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=forrelease1&submit=submitVerfiedAll&dateTo='.$dateTo.'&V2page='.$p.'&submitVerfiedAll=Submit#verifiedall">'.$p;
                echo  '</a>';
                echo '</li>';
              }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?tab=forrelease1&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&V2page='.$p.'&submitVerfiedAll=Submit#verifiedall&submit=submitVerfiedAll">'.$p;
                echo  '</a>';
                echo '</li>';
              }
            }
            echo '</ul>';

          echo '
          <div class="container-fluid mt-4">
           <form class="" action="" method="get">
             <div class="row">
               <div class="col-sm">
                 <label for="dateFrom">From:</label>
                 <input  class="form-control" type="date" name="dateFrom" id="startDate4"  onkeydown="return false"   data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
               </div>
               <div class="col-sm">
                 <label for="dateTo">To:</label>
                 <input  class="form-control" type="date" name="dateTo" id="endDate4" onkeydown="return false"  placeholder="dd-mm-yyyy">
               </div>
               <div class="col-sm">
                 <label for="criteria">Filter By:</label>
                 <select class="form-control" name="criteria">
                  <option value="FirstName">First Name</option>
                   <option value="LastName">Last Name</option>
                   <option value="Course">Course</option>
                   <option value="Status">Status</option>
                   <option value="Applied_For">Applied For</option>
                   <option value="purposes">Reason For Applying</option>
                 </select>
               </div>
               <div class="col-sm mt-2">
                 <label for="search"></label>
                 <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
               </div>
               <div class="col-sm mt-4 pt-2">
                 <label for="submit"></label>
                 <input type="submit" class="btn text-white" name="submitVerifiedAll2" value="Submit" style="background-color:#DC65A1;">
               </div>
             </div>
           </form>
       </div>';

          }

          public function searchReleased(){

            if(!empty($_GET['dateFrom'])){
            $dateFrom = $_GET['dateFrom'];
            };
            if(!empty($_GET['dateTo'])){
              $dateTo = $_GET['dateTo'];
            };
            if(!empty($_GET['criteria'])){
              $criteria = $_GET['criteria'];
            };
            if(!empty($_GET['search'])){
              $search = $_GET['search'];
            };

            $config = new config;
            $view = new view;
            $con = $config->con();
            $user = new User();
            $id1 = $user->data()->id;
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
            if (!empty($search) && !empty($criteria)) {
              $sql .= "AND `$criteria` LIKE '%$search%'";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
            }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
            }

            $data = $con->prepare($sql);
            $data ->execute();
            $rows=$data-> fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['resultReleasedSearchAdmin'] = $rows;


            $sql3 = "SELECT * FROM `work`";
            $data3 = $con-> prepare($sql3);
            $data3 ->execute();
            $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['allCSV'] = $rowsAll;

            $limit = 10;

            if (!isset($_GET['Rpage'])) {
                  $page = 1;
              }else{
                  $page = $_GET['Rpage'];
            }

            if(isset($_GET['Rpage']) > 1){
              $_GET['Ppage'] = 1;
              $_GET['PRpage'] = 1;
              $_GET['V2page'] = 1;
              $_GET['V1page'] = 1;
            }

            $start = ($page-1)*$limit;

            $total_results = $data->rowCount();
            $total_pages = ceil($total_results/$limit);

            // if ($dateFrom >= $dateTo) {
            //   $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' LIMIT $start,$limit";
            //   echo "<script type='text/javascript'>alert('Invalid Date');</script>";
            // }else {

            if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
              echo "<script>alert('Empty search area!');</script>";
              echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=released';</script>"; exit;
            }else {
                        $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
            }

            if (!empty($dateFrom) && empty($dateTo)) {
              echo "<script>alert('Both date fields are required!');</script>";
              echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=released';</script>"; exit;
            }elseif (empty($dateFrom) && !empty($dateTo)) {
              echo "<script>alert('Both date fields are required!');</script>";
              echo "<script type='text/javascript'>window.top.location='view_pending_requests.php?tab=released';</script>"; exit;
            }


            // }


            if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($search) && !empty($criteria)) {
              $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
            }


            $data2 = $con->prepare($sql2);
            $data2 ->execute();
            $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);

            echo '<table class="table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
            echo '<thead class="thead" style="background-color:#DC65A1;">';
            echo '
              <th class="text-center" style= "font-weight:bold; color:white;">Student Number</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Full Name</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Contact Number</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Status</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Applied For</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Purpose</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Due Date</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Released By</td>
              <th class="text-center" style= "font-weight:bold; color:white;">Remarks</td>
              ';
           echo '</thead>';

           $count=$data2->rowCount();

           if ($count>=1) {
             foreach ($rows2 as $row) {
               $state = $row->formtype;
               if ($state=="special") {
                 echo '<tr>';
                             // echo '<td class="text-center">'.$row ->id.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->StudentNo.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->Course.'</br></td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->contact_no.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->Status.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->Applied_For.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->purposes.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->Due_Date.'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$view->getSname($row->releasedby).'</td>';
                  echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$row->remarks.'</br></td>';
                 echo '</tr>';
               }else {
                 echo '<tr style="background-color:white;">';
                             // echo '<td class="text-center">'.$row ->id.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->StudentNo.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->Course.'</br></td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->contact_no.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->Status.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->Applied_For.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->purposes.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->Due_Date.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$view->getSname($row->releasedby).'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->remarks.'</br></td>';
                 echo '</tr>';
               }
           }
            echo '</table>';
            echo '<a class= "btn btn-success mb-2 float-right"href="export.php?searchExportReleasedAdmin">Create Excel File</a>';
           }else {
             echo '</table>';
             echo '<center>No Results Found</center>';
           }


            echo '<ul class="pagination ml-2">';

              for ($p=1; $p <=$total_pages; $p++) {
                if (!empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?search='.$search.'&tab=released&submit=submitReleased&criteria='.$criteria.'&Rpage='.$p.'&submitReleased=Submit#released">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif(!empty($dateFrom) && !empty($dateTo)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=released&submit=submitReleased&dateTo='.$dateTo.'&Rpage='.$p.'&submitReleased=Submit#released">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?tab=released&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Rpage='.$p.'&submitReleased=Submit#released&submit=submitReleased">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }
              }
              echo '</ul>';

            echo '
            <div class="container-fluid mt-4">
             <form class="" action="" method="get">
               <div class="row">
                 <div class="col-sm">
                   <label for="dateFrom">From:</label>
                   <input  class="form-control" type="date" name="dateFrom" id="startDate5"  onkeydown="return false"   data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
                 </div>
                 <div class="col-sm">
                   <label for="dateTo">To:</label>
                   <input  class="form-control" type="date" name="dateTo" id="endDate5"  onkeydown="return false"  placeholder="dd-mm-yyyy" >
                 </div>
                 <div class="col-sm">
                   <label for="criteria">Filter By:</label>
                   <select class="form-control" name="criteria">
                    <option value="FirstName">First Name</option>
                     <option value="LastName">Last Name</option>
                     <option value="Course">Course</option>
                     <option value="Status">Status</option>
                     <option value="Applied_For">Applied For</option>
                     <option value="purposes">Reason For Applying</option>
                   </select>
                 </div>
                 <div class="col-sm mt-2">
                   <label for="search"></label>
                   <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
                 </div>
                 <div class="col-sm mt-4 pt-2">
                   <label for="submit"></label>
                   <input type="submit" class="btn text-white" name="submitReleased" value="Submit" style="background-color:#DC65A1;">
                   <a class= "btn btn-success"href="export.php?exportAll">Export All</a>
                 </div>
               </div>
             </form>
         </div>';
      }

      public function searchPendingV(){
        if(!empty($_GET['dateFrom'])){
        $dateFrom = $_GET['dateFrom'];
        };
        if(!empty($_GET['dateTo'])){
          $dateTo = $_GET['dateTo'];
        };
        if(!empty($_GET['criteria'])){
          $criteria = $_GET['criteria'];
        };
        if(!empty($_GET['search'])){
          $search = $_GET['search'];
        };


        $config = new config;
        $con = $config->con();
        $user = new User();
        $id1 = $user->data()->id;
        $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING'";


        if (!empty($search) && !empty($criteria)) {
          $sql .= "AND `$criteria` LIKE '%$search%'";
        }elseif (!empty($dateFrom) && !empty($dateTo)) {
          $sql .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo'";
        }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          $sql .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' AND `$criteria` LIKE '%$search%'";
        }

        $data = $con->prepare($sql);
        $data ->execute();
        $rows=$data-> fetchAll(PDO::FETCH_OBJ);

        $_SESSION['resultPendingSearchVAdmin'] = $rows;

        $sql3 = "SELECT * FROM `work`";
        $data3 = $con-> prepare($sql3);
        $data3 ->execute();
        $rowsAll =$data3-> fetchAll(PDO::FETCH_OBJ);
        $_SESSION['VerallCSV'] = $rowsAll;


        $limit = 10;

        if (!isset($_GET['Verpage'])) {
              $page = 1;
          }else{
            $page = $_GET['Verpage'];
        }


        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);

        if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
          echo "<script>alert('Empty search area!');</script>";
          echo "<script type='text/javascript'>window.top.location='verificationAdmin.php';</script>"; exit;
        }else {
            $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING'";
        }

        if (!empty($dateFrom) && empty($dateTo)) {
          echo "<script>alert('Both date fields are required!');</script>";
          echo "<script type='text/javascript'>window.top.location='verificationAdmin.php';</script>"; exit;
        }elseif (empty($dateFrom) && !empty($dateTo)) {
          echo "<script>alert('Both date fields are required!');</script>";
          echo "<script type='text/javascript'>window.top.location='verificationAdmin.php';</script>"; exit;
        }

        if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          $sql2 .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
        }elseif (!empty($search) && !empty($criteria)) {
          $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
        }elseif (!empty($dateFrom) && !empty($dateTo)) {
          $sql2 .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' LIMIT $start,$limit";
        }


        $data2 = $con->prepare($sql2);
        $data2 ->execute();
        $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);
        $count=$data2->rowCount();

        echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
        echo '<thead class="thead" style="background-color:#DC65A1;">';
        echo '
        <th class="text-center" style= "font-weight:bold; color:white;">Full Name</td>
        <th class="text-center" style= "font-weight:bold; color:white;">College</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Status</td>
        <th class="text-center" style= "font-weight:bold; color:white;">GD /LYE</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Company Email</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Date Received</td>
        <th class="text-center" style= "font-weight:bold; color:white;">Due Date</td>
        <th class="text-center" style= "font-weight:bold; color:white;" colspan="2">Actions</td>
        ';
        echo '</thead>';

        if ($count>=1) {
              foreach ($rows2 as $row) {
                echo '<tr>';
                  // echo '<td class="text-center">'.$row ->id.'</td>';
                  $due= $row->duedate;
                  $due2 = strtotime($due);
                  $date_diff = 60*60*24*2;

                  if ($due2 < time()+$date_diff) {
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->fullname.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->college.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->course.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->status.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->dategrad.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->cemail.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->date_recieved.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->duedate.'</td>';
                    echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success" href="verification.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify</a></br></td>';
                      echo '</tr>';
                 }else {
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->fullname.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->college.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->course.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->status.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->dategrad.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->cemail.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->date_recieved.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->duedate.'</td>';
                  echo '<td class="text-center style="color:#DC65A1;" style="color:white;"><a class="btn bg-light btn-outline-success" href="verification.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify</a></br></td>';
                  echo '</tr>';
                  }
                }
                echo '</table>';
                echo '<a class= "btn btn-success mb-2 float-right"href="export.php?searchVPendingAdmin">Create Excel File</a>';
              }else {
                echo '</table>';
                echo '<center>No Results Found</center>';
              }

              if ($count>=1) {
                echo '<ul class="pagination ml-2">';
                for ($p=1; $p <=$total_pages; $p++) {
                  if (!empty($search) && !empty($criteria)) {
                    echo '<li class="page-item" >';
                    echo  '<a class= "page-link" href="?search='.$search.'&tab=view&submit=submitPendingV&criteria='.$criteria.'&Verpage='.$p.'&submitPendingV">'.$p;
                    echo  '</a>';
                    echo '</li>';
                  }elseif(!empty($dateFrom) && !empty($dateTo)) {
                    echo '<li class="page-item" >';
                    echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=view&submit=submitPendingV&dateTo='.$dateTo.'&Verpage='.$p.'&submitPendingV">'.$p;
                    echo  '</a>';
                    echo '</li>';
                  }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                    echo '<li class="page-item" >';
                    echo  '<a class= "page-link" href="?tab=view&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Verpage='.$p.'&submitPendingV=Submit#pending&submit=submitPendingV">'.$p;
                    echo  '</a>';
                    echo '</li>';
                  }
                }
                echo '</ul>';
              }

        echo '
        <div class="container-fluid mt-4">
         <form class="" action="" method="get">
           <div class="row">
             <div class="col-sm">
               <label for="dateFrom">From:</label>
               <input  class="form-control" type="date" name="dateFrom" id="startDate"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
             </div>
             <div class="col-sm">
               <label for="dateTo">To:</label>
               <input  class="form-control" type="date" name="dateTo" id="endDate"  onkeydown="return false" placeholder="dd-mm-yyyy">
             </div>
             <div class="col-sm">
               <label for="criteria">Filter By:</label>
               <select class="form-control" name="criteria">
                 <option value="fullname">Name</option>
                 <option value="course">Course</option>
                 <option value="status">Status</option>
               </select>
             </div>
             <div class="col-sm mt-2">
               <label for="search"></label>
               <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
             </div>
             <div class="col-sm mt-4 pt-2">
               <label for="submit"></label>
               <input type="submit" class="btn text-white" name="submitPendingVAdmin" value="Submit" style="background-color:#DC65A1;">
               <a class= "btn btn-success"href="export.php?exportAllV">Export All</a>
             </div>
           </div>
         </form>
     </div>';
          }

          public function searchVerifiedV(){
            if(!empty($_GET['dateFrom'])){
            $dateFrom = $_GET['dateFrom'];
            };
            if(!empty($_GET['dateTo'])){
              $dateTo = $_GET['dateTo'];
            };
            if(!empty($_GET['criteria'])){
              $criteria = $_GET['criteria'];
            };
            if(!empty($_GET['search'])){
              $search = $_GET['search'];
            };


            $config = new config;
            $view = new view;
            $con = $config->con();
            $user = new User();
            $id1 = $user->data()->id;
            $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED'";

            if (!empty($search) && !empty($criteria)) {
              $sql .= "AND `$criteria` LIKE '%$search%'";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo'";
            }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' AND `$criteria` LIKE '%$search%'";
            }

            $data = $con->prepare($sql);
            $data ->execute();
            $rows=$data-> fetchAll(PDO::FETCH_OBJ);

            $_SESSION['resultVerAdmin'] = $rows;

            $sql3 = "SELECT * FROM `work`";
            $data3 = $con-> prepare($sql3);
            $data3 ->execute();
            $rowsAll =$data3-> fetchAll(PDO::FETCH_OBJ);
            $_SESSION['VerallCSV'] = $rowsAll;


            $limit = 10;

            if (!isset($_GET['Vrpage'])) {
                  $page = 1;
              }else{
                $page = $_GET['Vrpage'];
            }


            $start = ($page-1)*$limit;

            $total_results = $data->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (empty($dateFrom) && empty($dateTo) && empty($search) && empty($criteria)) {
              echo "<script>alert('Empty search area!');</script>";
              echo "<script type='text/javascript'>window.top.location='verificationAdmin.php?tab=verified';</script>"; exit;
            }else {
                    $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED'";
            }

            if (!empty($dateFrom) && empty($dateTo)) {
              echo "<script>alert('Both date fields are required!');</script>";
              echo "<script type='text/javascript'>window.top.location='verificationAdmin.php?tab=verified';</script>"; exit;
            }elseif (empty($dateFrom) && !empty($dateTo)) {
              echo "<script>alert('Both date fields are required!');</script>";
              echo "<script type='text/javascript'>window.top.location='verificationAdmin.php?tab=verified';</script>"; exit;
            }

            if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql2 .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($search) && !empty($criteria)) {
              $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql2 .= "AND date_recieved >= '$dateFrom' AND date_recieved <= '$dateTo' LIMIT $start,$limit";
            }


            $data2 = $con->prepare($sql2);
            $data2 ->execute();
            $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);
            $count=$data2->rowCount();

            echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
            echo '<thead class="thead" style="background-color:#DC65A1;">';
            echo '
            <th class="text-center" style= "font-weight:bold; color:white;">Full Name</td>
            <th class="text-center" style= "font-weight:bold; color:white;">College</td>
            <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
            <th class="text-center" style= "font-weight:bold; color:white;">Status</td>
            <th class="text-center" style= "font-weight:bold; color:white;">GD /LYE</td>
            <th class="text-center" style= "font-weight:bold; color:white;">Company Email</td>
            <th class="text-center" style= "font-weight:bold; color:white;">Verification Date</td>
            <th class="text-center" style= "font-weight:bold; color:white;">Verified By</td>
            ';
            echo '</thead>';

            if ($count>=1) {
              foreach ($rows2 as $row) {
                 echo '<tr>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->fullname.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->college.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->course.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->status.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->dategrad.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->cemail.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->date_verified.'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$view->getSName($row->verified_by).'</td>';
                  echo '</tr>';
                  }
                echo '</table>';
                echo '<a class= "btn btn-success mb-2 float-right"href="export.php?SearchVerifiedVAdmin">Create Excel File</a>';
            }else {
              echo '</table>';
              echo '<center>No Results Found</center>';
            }

            if ($count>=1) {
              echo '<ul class="pagination ml-2">';
              for ($p=1; $p <=$total_pages; $p++) {
                if (!empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?search='.$search.'&tab=verified&submit=submitVerifiedV&criteria='.$criteria.'&Vrrpage='.$p.'&submitVerifiedV">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif(!empty($dateFrom) && !empty($dateTo)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=verified&submit=submitVerifiedV&dateTo='.$dateTo.'&Vrrpage='.$p.'&submitVerifiedV">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Vrpage='.$p.'&submitVerfiedV=Submit#pending&submit=submitVerifiedV">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }
              }
              echo '</ul>';
            }

            echo '
            <div class="container-fluid mt-4">
             <form class="" action="" method="get">
               <div class="row">
                 <div class="col-sm">
                   <label for="dateFrom">From:</label>
                   <input  class="form-control" type="date" name="dateFrom" id="startDate"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
                 </div>
                 <div class="col-sm">
                   <label for="dateTo">To:</label>
                   <input  class="form-control" type="date" name="dateTo" id="endDate"  onkeydown="return false" placeholder="dd-mm-yyyy">
                 </div>
                 <div class="col-sm">
                   <label for="criteria">Filter By:</label>
                   <select class="form-control" name="criteria">
                     <option value="fullname">Name</option>
                     <option value="course">Course</option>
                     <option value="status">Status</option>
                   </select>
                 </div>
                 <div class="col-sm mt-2">
                   <label for="search"></label>
                   <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
                 </div>
                 <div class="col-sm mt-4 pt-2">
                   <label for="submit"></label>
                   <input type="submit" class="btn text-white" name="submitVerifiedVAdmin" value="Submit" style="background-color:#DC65A1;">
                   <a class= "btn btn-success"href="export.php?exportAllV">Export All</a>
                 </div>
               </div>
             </form>
         </div>';
    }
  }
?>
