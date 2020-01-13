<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class viewAdmin extends config{

  public function viewtodolist(){
    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
        // var_dump($rows);

     // paginationqueryhere

     $_SESSION['resultPendingAdmin'] = $rows;

     //
     $sql3 = "SELECT * FROM `work`";
     $data3 = $con-> prepare($sql3);
     $data3 ->execute();
     $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
     $_SESSION['allCSV'] = $rowsAll;
     //

     $limit = 10;

     if (!isset($_GET['Ppage'])) {
           $page = 1;
       } else{
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

     $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' LIMIT $start,$limit";
     $data2 = $con-> prepare($sql2);
     $data2 ->execute();
     $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);


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
     $count = $data2->rowCount();

     if($count>=1) {
     foreach ($rows2 as $row) {
       echo '<tr>';
         // echo '<td class="text-center align-middle">'.$row ->id.'</td>';
         $type = $row->formtype;
         $due= $row->Due_Date;
         $due2 = strtotime($due);
         $date_diff = 60*60*24*2;

         if ($due2 < time()+$date_diff) {
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->StudentNo.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->FirstName." ".$row ->LastName." ".$row->MI.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->Course.'</br></td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->contact_no.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->Status.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->Date_Grad.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->Applied_For.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->purposes.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->Due_Date.'</td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82">'.$row->remarks.'</br></td>';
           echo '<td class="text-center align-middle" style="color:white; background-color:#f58a82"><a class="btn bg-light btn-outline-success btt" href="view_pending_requests.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
           echo '<td class="text-center align-middle"  style="color:white; background-color:#f58a82"><a class="btn bg-light btn-outline-success btt" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';

           $af = explode(",",$row->Applied_For);
           echo '<td class="text-center align-middle"  style="color:white; background-color:#f58a82">';
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
           echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success btt" href="view_pending_requests.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
           echo '<td class="text-center align-middle"  style="color:white; background-color:#a68df9"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';

           $af = explode(",",$row->Applied_For);
           echo '<td class="text-center align-middle"  style="color:white; background-color:#a68df9">';
         foreach ($af as $row->Applied_For) {
           if ($row->Applied_For == 'Permit to Cross Enroll') {
             echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
           }elseif($row->Applied_For == 'Cert of Enrollment'){
             echo '<a class="btn bg-light btn-outline-success"href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
           }elseif ($row->Applied_For == 'Cert of Graduation') {
          echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/cog_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
        }elseif ($row->Applied_For == 'EMI') {
        echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/EMI_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&dategrad='.$row->Date_Grad.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
      }elseif ($row->Applied_For == 'No Scholarship') {
        echo '<a class="btn bg-light btn-outline-success"href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI.". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
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
          echo '<td class="text-center align-middle" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success btt" href="view_pending_requests.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
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
        echo '<a class="btn bg-light btn-outline-success"href="resource/php/noscholarform.php?fullname='.$row->FirstName." ".$row ->MI.". ".$row->LastName.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
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

         echo '<td class="text-center style="color:#DC65A1;" style="color:white;"><a class="btn bg-light btn-outline-success btt" href="view_pending_requests.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
         echo '<td class="text-center align-middle"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
         $af = explode(",",$row->Applied_For);
         echo '<td class="text-center align-middle">';
           foreach ($af as $row->Applied_For) {
         if ($row->Applied_For == 'Permit to Cross Enroll') {
           echo '<a class="btn bg-light btn-outline-success inl" href="resource/php/pceform.php?fullname='.$row->FirstName." ".$row ->LastName." ".$row->MI.'&college='.$row->College.'&course='.$row->Course.'">'.$row->Applied_For.'</a></br>';
         }elseif($row->Applied_For == 'Cert of Enrollment'){
           echo '<a class="btn bg-light btn-outline-success"href="resource/php/rof026_page.php?firstname='.$row->FirstName.'&lastname='.$row->LastName.'&middlename='.$row->MI.'&course='.$row->Course.'&college='.$row->College.'">'.$row->Applied_For.'</a></br>';
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
           }
         }
         echo '</table>';
         echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportPending">Create Excel File</a>';
       }else {
         echo '</table>';
         echo "<center>No Requests</center>";
       }

       // echo '<ul class="pagination  ml-2 ">';
       // for ($p=1; $p <=$total_pages; $p++) {
       //  echo '<li id = "pagelink" class="page-item">';
       //  echo  '<a class= "page-link" href="?tab=view&Ppage='.$p.'">'.$p;
       //  echo  '</a>';
       //  echo '</li>';
       // }
       // echo '</ul>';

       $pagination = new paginationOneAdmin;
       $pagination->pagination($total_pages,$page);

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
              <option selected="true" disabled="disabled">Choose an Option</option>
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

  public function viewprinted(){
    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['resultPrintedAdmin'] = $rows;
    $limit = 10;

    if (!isset($_GET['PRpage'])) {
          $page = 1;
      } else{
          $page = $_GET['PRpage'];
    }

    if(isset($_GET['PRpage']) > 1){
      $_GET['Ppage'] = 1;
      $_GET['V1'] = 1;
      $_GET['V2page'] = 1;
      $_GET['Rpage'] = 1;
    }

    $sql3 = "SELECT * FROM `work`";
    $data3 = $con-> prepare($sql3);
    $data3 ->execute();
    $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['allCSV'] = $rowsAll;

    $start = ($page-1)*$limit;

    $total_results = $data->rowCount();
    $total_pages = ceil($total_results/$limit);

    $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' LIMIT $start,$limit";
    $data2 = $con-> prepare($sql2);
    $data2 ->execute();
    $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

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
    <th class="text-center" style= "font-weight:bold; color:white;"colspan="2">Actions</td>
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
       if($type == "special"){
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
           echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=printed">Edit</a></br></td>';

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
          echo '<td class="text-center" style="color:#DC65A1;"><a class="btn btn-outline-success" href="view_pending_requests.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
          echo '<td class="text-center" style="color:#DC65A1;"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=printed">Edit</a></br></td>';
            echo '</tr>';
          }
        }
      echo '</table>';
      echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportPrintedAdmin">Create Excel File</a>';
    }else {
      echo '</table>';
      echo "<center>No Requests</center>";
    }


       // echo '<ul class="pagination  ml-2 ">';
       // for ($p=1; $p <=$total_pages; $p++) {
       //  $printed  = "printed";
       //  echo '<li class="page-item">';
       //  echo  '<a class= "page-link" href="?tab='.$printed.'&PRpage='.$p.'">'.$p;
       //  echo  '</a>';
       //  echo '</li>';
       // }
       // echo '</ul>';


                    $pagination2 = new paginationOneAdmin;
                    $pagination2->paginationPrinted($total_pages,$page);

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
              <input  class="form-control" type="date" name="dateTo" id="endDate2"  onkeydown="return false"  placeholder="dd-mm-yyyy">
            </div>
            <div class="col-sm">
              <label for="criteria">Filter By:</label>
              <select class="form-control" name="criteria">
                <option selected="true" disabled="disabled">Choose an Option</option>
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


  public function viewverified2(){

    $config = new config;
    $con = $config->con();
      $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
    $limit = 10;

    $_SESSION['resultVerifiedAdmin'] = $rows;

    if (!isset($_GET['V2page'])) {
          $page = 1;
      } else{
          $page = $_GET['V2page'];
    }

    if(isset($_GET['V2page']) > 1){
      $_GET['Ppage'] = 1;
      $_GET['PRpage'] = 1;
      $_GET['V1page'] = 1;
      $_GET['Rpage'] = 1;
    }

    $start = ($page-1)*$limit;

    $sql3 = "SELECT * FROM `work`";
    $data3 = $con->prepare($sql3);
    $data3 ->execute();
    $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['allCSV'] = $rowsAll;

    $total_results = $data->rowCount();
    $total_pages = ceil($total_results/$limit);

    $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' LIMIT $start,$limit";
    $data2 = $con-> prepare($sql2);
    $data2 ->execute();
    $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

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

    $count=$data2->rowCount();

    if ($count>=1) {
      foreach ($rows2 as $row) {
        echo '<tr>';
          // echo '<td class="text-center">'.$row ->id.'</td>';
          $type = $row->formtype;
          $due= $row->Due_Date;
          $due2 = strtotime($due);
          $date_diff = 60*60*24*2;

     if($type == "special"){
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
        echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportVerifiedAdmin">Create Excel File</a>';
        }else {
        echo '</table>';
        echo '<center>No Requests</center>';
        }

       // echo '<ul class="pagination  ml-2 ">';
       // for ($p=1; $p <=$total_pages; $p++) {
       //  echo '<li class="page-item">';
       //  echo  '<a class= "page-link" href="?tab=forrelease1&V2page='.$p.'">'.$p;
       //  echo  '</a>';
       //  echo '</li>';
       // }
       // echo '</ul>';

       $pagination4 = new paginationOneAdmin;
       $pagination4->paginationForRelease($total_pages,$page);
       echo '
       <div class="container-fluid mt-4">
        <form class="" action="" method="get">
          <div class="row">
            <div class="col-sm">
              <label for="dateFrom">From:</label>
              <input  class="form-control" type="date" name="dateFrom"  id="startDate4"  onkeydown="return false" data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
            </div>
            <div class="col-sm">
              <label for="dateTo">To:</label>
              <input  class="form-control" type="date" name="dateTo"  id="endDate4"  onkeydown="return false" placeholder="dd-mm-yyyy" >
            </div>
            <div class="col-sm">
              <label for="criteria">Filter By:</label>
              <select class="form-control" name="criteria">
                <option selected="true" disabled="disabled">Choose an Option</option>
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


  public function viewverified(){

    $config = new config;
    $con = $config->con();
      $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `assignee` = '$id1'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    $limit = 10;

    if (!isset($_GET['V1page'])) {
          $page = 1;
      } else{
          $page = $_GET['V1page'];
    }

    if(isset($_GET['V1page']) > 1){
      $_GET['Ppage'] = 1;
      $_GET['PRpage'] = 1;
      $_GET['V2page'] = 1;
      $_GET['Rpage'] = 1;
    }

    $start = ($page-1)*$limit;

    $total_results = $data->rowCount();
    $total_pages = ceil($total_results/$limit);

    $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `assignee` = '$id1' LIMIT $start,$limit";
    $data2 = $con-> prepare($sql2);
    $data2 ->execute();
    $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

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

    if($type == "special"){
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


       // echo '<ul class="pagination  ml-2 ">';
       // for ($p=1; $p <=$total_pages; $p++) {
       //  echo '<li class="page-item">';
       //  echo  '<a class= "page-link" href="?tab=forrelease1&V1page='.$p.'">'.$p;
       //  echo  '</a>';
       //  echo '</li>';
       // }
       // echo '</ul>';


       echo '
       <div class="container-fluid mt-4">
        <form class="" action="" method="get">
          <div class="row">
            <div class="col-sm">
              <label for="dateFrom">From:</label>
              <input  class="form-control" type="date" name="dateFrom"  id="startDate4"  onkeydown="return false" data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
            </div>
            <div class="col-sm">
              <label for="dateTo">To:</label>
              <input  class="form-control" type="date" name="dateTo"  id="endDate4"  onkeydown="return false" placeholder="dd-mm-yyyy" >
            </div>
            <div class="col-sm">
              <label for="criteria">Filter By:</label>
              <select class="form-control" name="criteria">
                <option selected="true" disabled="disabled">Choose an Option</option>
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
              <input type="submit" class="btn text-white" name="submitVerified" value="Submit" style="background-color:#DC65A1;">
            </div>
          </div>
        </form>
    </div>';
  }

  //
  public function viewreleased(){
    $view= new view;
    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
    $limit = 10;

    $_SESSION['resultReleasedAdmin'] = $rows;

    if (!isset($_GET['Rpage'])) {
        $page = 1;
    } else{
    $page = $_GET['Rpage'];
    }

    //
    $sql3 = "SELECT * FROM `work`";
    $data3 = $con-> prepare($sql3);
    $data3 ->execute();
    $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['allCSV'] = $rowsAll;
    //
    if(isset($_GET['Rpage']) > 1){
      $_GET['Ppage'] = 1;
      $_GET['PRpage'] = 1;
      $_GET['V2page'] = 1;
      $_GET['V1page'] = 1;
    }
    $start = ($page-1)*$limit;

    $total_results = $data->rowCount();
    $total_pages = ceil($total_results/$limit);

    $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' LIMIT $start,$limit";
    $data2 = $con-> prepare($sql2);
    $data2 ->execute();
    $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

    $count = $data2->rowCount();
        // var_dump($rows);
         echo '<table class="table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
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

          if ($count>=1) {
            foreach ($rows2 as $row) {
            $state=$row->formtype;
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
            echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportReleasedAdmin">Create Excel File</a>';
          }else {
              echo '</table>';
              echo '<center>No Released Requests</center>';
          }


       // echo '<ul class="pagination  ml-2 ">';
       // for ($p=1; $p <=$total_pages; $p++) {
       //  echo '<li class="page-item">';
       //  echo  '<a class= "page-link" href="?tab=released&Rpage='.$p.'">'.$p;
       //  echo  '</a>';
       //  echo '</li>';
       // }
       // echo '</ul>';

       $pagination4 = new paginationOneAdmin;
       $pagination4->paginationReleased($total_pages,$page);

       echo '
       <div class="container-fluid mt-4">
        <form class="" action="" method="get">
          <div class="row">
            <div class="col-sm">
              <label for="dateFrom">From:</label>
              <input  class="form-control" type="date" name="dateFrom" id="startDate5"  onkeydown="return false"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
            </div>
            <div class="col-sm">
              <label for="dateTo">To:</label>
              <input class="form-control" type="date" name="dateTo" id="endDate5"  onkeydown="return false" placeholder="dd-mm-yyyy">
            </div>
            <div class="col-sm">
              <label for="criteria">Filter By:</label>
              <select class="form-control" name="criteria">
                <option selected="true" disabled="disabled">Choose an Option</option>
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

  public function viewSRA(){

    $config = new config;
    $con = $config->con();
    $user = new User();
    $sql = "SELECT * FROM tbl_accounts";
    $data = $con-> prepare($sql);
    $data->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        // var_dump($rows);
         echo '<table class="table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
                   echo '<thead class="thead" style="background-color:#DC65A1;">';
                   echo '
                   <th class="text-center" style= "font-weight:bold; color:white;">Student Number</td>
                   <th class="text-center" style= "font-weight:bold; color:white;"> Quote</td>   ';
                   echo '</thead>';
                   foreach ($rows as $row) {
                     echo '<tr style="background-color:white;">';
                       // echo '<td class="text-center">'.$row ->id.'</td>';
                       echo '<td class="text-center" style="color:#DC65A1;">'.$row->name.'</td>';
                       echo '<td class="text-center"><a class="btn btn-outline-danger" href=resource\php\updateQuote.php?id='.$row->id.'>Change Quote</a></td>';
           echo '</tr>';
       }
       echo '</table>';
  }

  public function getSName($number){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `id` = '$number'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->name;
  }
  public function getNameSRA(){
      $user = new user();
      echo $user->data()->name;
  }
  public function getMmSRA(){
      $user = new user();
       return $user->data()->mm;
  }
  public function getdpSRA(){
      $user = new user();
      return $user->data()->dp;
  }
  public function getquote(){
      $user = new user();
      echo $user->data()->quote;
  }
  public function ctodolist(){
    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data->rowCount();
    return $rows;
        // var_dump($rows);
  }
  public function cprinted(){
    $config = new config;
    $con = $config->con();
    $user = new User();
    $id1 = $user->data()->id;
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data->rowCount();
    return $rows;
    }
    public function cverified(){
      $config = new config;
      $con = $config->con();
        $user = new User();
      $id1 = $user->data()->id;
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data->rowCount();
      return $rows;
    }
    public function creleased(){
      $config = new config;
      $con = $config->con();
      $user = new User();
      $id = $user->data()->id;
      $date = date('Y-m-d');
      $fd=date('Y-m-01', strtotime($date));
      $ld=date('Y-m-t', strtotime($date));
      $id1 = $user->data()->id;
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby`=$id AND (`released_date` BETWEEN '$fd' AND '$ld')";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data->rowCount();
      return $rows;
    }
    public function chartlabel(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      foreach ($rows as $row) {
      echo '"'.$row->username.'",';
      }
    }
    public function twork(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
          $id = $row->id;
          if(!empty($_GET)){
          $date = date('Y-m-d');
          $cfd=date('Y-m-01', strtotime($date));
          $cld=date('Y-m-t', strtotime($date));
          $cld = $_GET['cld'];
          $cfd = $_GET['cfd'];
          $sql = "SELECT * FROM `work` WHERE (`Date_app`  BETWEEN '$cfd' AND '$cld') AND `assignee` = $id";
        }else{
          $sql = "SELECT * FROM `work` WHERE `Date_app` = CURDATE() AND `assignee` = $id";
        }
          $data = $con-> prepare($sql);
          $data ->execute();
          $results =$data->rowCount();
          echo $results.',';
        }
      }
      public function cwork(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
          $id = $row->id;
            if(isset($_GET['search'])){
              $date = date('Y-m-d');
              $cfd=date('Y-m-01', strtotime($date));
              $cld=date('Y-m-t', strtotime($date));
              $cld = $_GET['cld'];
              $cfd = $_GET['cfd'];
              $sql = "SELECT * FROM `work` WHERE `printedby` =$id AND (`printeddate` BETWEEN '$cfd' AND '$cld')";
            }else{
              $sql = "SELECT * FROM `work` WHERE `printedby` =$id AND `printeddate` = CURDATE()";
            }
            $data = $con-> prepare($sql);
            $data ->execute();
            $results =$data->rowCount();
            echo $results.',';
        }
      }
      public function cpending(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
          $id = $row->id;
          if(isset($_GET['search'])){
          $date = date('Y-m-d');
          $cfd=date('Y-m-01', strtotime($date));
          $cld=date('Y-m-t', strtotime($date));
          $cld = $_GET['cld'];
          $cfd = $_GET['cfd'];
          $sql = "SELECT * FROM `work` WHERE  `assignee` = '$id'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $products =$data-> fetchAll(PDO::FETCH_OBJ);
          foreach ($products as $product) {
              $printeddate = $product->printeddate;
              if (IS_NULL($printeddate)) {
                  $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id' AND(`Date_App` >= '$cfd' AND  `printeddate` IS NULL) UNION SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id' AND (`Date_App` >= '$cfd' AND `printeddate` > '$cld')";
                }else {

                }
              }
            }else{
              $sql = "SELECT * FROM `work` WHERE  `assignee` = '$id'";
              $data = $con-> prepare($sql);
              $data ->execute();
              $products =$data-> fetchAll(PDO::FETCH_OBJ);
              foreach ($products as $product) {
                  $printeddate = $product->printeddate;
                  $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id'";
                }
            }

          $data = $con-> prepare($sql);
          $data ->execute();
          $results =$data->rowCount();
          echo $results.',';
        }
      }

      public function chartreleased(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
          $id = $row->id;
          if(isset($_GET['search'])){
          $date = date('Y-m-d');
          $cfd=date('Y-m-01', strtotime($date));
          $cld=date('Y-m-t', strtotime($date));
          $cld = $_GET['cld'];
          $cfd = $_GET['cfd'];
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby` = $id AND (`released_date` BETWEEN $cfd AND $cld)";
            }else{
              $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby` = '$id' AND `released_date` = CURDATE()";
            }
          $data = $con-> prepare($sql);
          $data ->execute();
          $results =$data->rowCount();
          echo $results.',';
        }
      }

      public function viewPendingVer(){
        $config = new config;
        $con = $config->con();
        $user = new User();
        $id1 = $user->data()->id;
        $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING'";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);

        $_SESSION['pendingVerAdmin'] = $rows;


        $sql3 = "SELECT * FROM `tbl_verification`";
        $data3 = $con-> prepare($sql3);
        $data3 ->execute();
        $rowsAll =$data3-> fetchAll(PDO::FETCH_OBJ);
        $_SESSION['VerallCSV'] = $rowsAll;

         $limit = 1;

         if (!isset($_GET['Verpage'])) {
               $page = 1;
           } else{
               $page = $_GET['Verpage'];
         }

         $start = ($page-1)*$limit;

         $total_results = $data->rowCount();
         $total_pages = ceil($total_results/$limit);

         $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING' LIMIT $start,$limit";
         $data2 = $con-> prepare($sql2);
         $data2 ->execute();
         $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);
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
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->fullname.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->college.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->course.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->status.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->dategrad.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->cemail.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->date_recieved.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82">'.$row->duedate.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#f58a82"><a class="btn bg-light btn-outline-success" href="verificationAdmin.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify</a></br></td>';
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
                  echo '<td class="text-center style="color:#DC65A1;" style="color:white;"><a class="btn bg-light btn-outline-success" href="verificationAdmin.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify</a></br></td>';
                  echo '</tr>';
               }
             }
             echo '</table>';
             echo '<a class= "btn btn-success mb-2 float-right"href="export.php?pendingVAdmin">Create Excel File</a>';
         }else {
           echo '</table>';
           echo '<center>No Results Found</center>';
         }

           // echo '<ul class="pagination  ml-2 ">';
           // for ($p=1; $p <=$total_pages; $p++) {
           //  echo '<li id = "pagelink" class="page-item">';
           //  echo  '<a class= "page-link" href="?tab=view&Verpage='.$p.'">'.$p;
           //  echo  '</a>';
           //  echo '</li>';
           // }
           // echo '</ul>';

           $pagination = new paginationOneAdmin;
           $pagination->paginationVerification($total_pages,$page);

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
                    <option selected="true" disabled="disabled">Choose an Option</option>
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

      public function cverification(){
        $config = new config;
        $con = $config->con();
        $user = new User();
        $id1 = $user->data()->id;
        $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING'";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data->rowCount();
        return $rows;
            // var_dump($rows);
      }

      public function viewVerifiedVer(){
        $view = new view;
        $config = new config;
        $con = $config->con();
        $user = new User();
        $id1 = $user->data()->id;
        $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED'";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            // var_dump($rows);

         $_SESSION['VerifiedVerAdmin'] = $rows;


         $sql3 = "SELECT * FROM `tbl_verification`";
         $data3 = $con-> prepare($sql3);
         $data3 ->execute();
         $rowsAll =$data3-> fetchAll(PDO::FETCH_OBJ);
         $_SESSION['VerallCSV'] = $rowsAll;

         // paginationqueryhere

         $limit = 10;

         if (!isset($_GET['Vrpage'])) {
               $page = 1;
           } else{
               $page = $_GET['Vrpage'];
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

         $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED' LIMIT $start,$limit";
         $data2 = $con-> prepare($sql2);
         $data2 ->execute();
         $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

         $count = $data2->rowCount();

         // var_dump($rows2);
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
             echo '<a class= "btn btn-success mb-2 float-right"href="export.php?VerifiedVAdmin">Create Excel File</a>';
         }else {
           echo '</table>';
           echo '<center>No Verified Yet</center>';
         }

           // echo '<ul class="pagination  ml-2 ">';
           // for ($p=1; $p <=$total_pages; $p++) {
           //  echo '<li id = "pagelink" class="page-item">';
           //  echo  '<a class= "page-link" href="?tab=verified&Ppage='.$p.'">'.$p;
           //  echo  '</a>';
           //  echo '</li>';
           // }
           // echo '</ul>';

           $pagination = new paginationOneAdmin;
           $pagination->paginationVerificationVerified($total_pages,$page);

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
                    <option selected="true" disabled="disabled">Choose an Option</option>
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

      public function viewAlumni(){
        $config = new config;
        $con = $config->con();
        $user = new User();
        $id1 = $user->data()->id;
        $sql = "SELECT * FROM `tbl_alumni_info`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            // var_dump($rows);

         $_SESSION['viewAlumni'] = $rows;
         $sql3 = "SELECT * FROM `tbl_alumni_info`";
         $data3 = $con-> prepare($sql3);
         $data3 ->execute();
         $rows3 =$data3-> fetchAll(PDO::FETCH_OBJ);

         $_SESSION['allAlumni'] = $rows3;

         // paginationqueryhere

         $limit = 10;

         if (!isset($_GET['page'])) {
               $page = 1;
           } else{
               $page = $_GET['page'];
         }

         $start = ($page-1)*$limit;

         $total_results = $data->rowCount();
         $total_pages = ceil($total_results/$limit);

         $sql2 = "SELECT * FROM `tbl_alumni_info` LIMIT $start,$limit";
         $data2 = $con-> prepare($sql2);
         $data2 ->execute();
         $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

         $count = $data2->rowCount();

         echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-2" style="width:100%;">';
         echo '<thead class="thead" style="background-color:#DC65A1;">';
         echo '
         <th class="text-center" style= "font-weight:bold; color:white;">Student No.</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Name</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Nationality</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Course</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Department</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Year Graduated Date</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Cellphone Number</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Email</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Employer</td>
         <th class="text-center" style= "font-weight:bold; color:white;">Employed Position</td>
         ';
         echo '</thead>';
         $view = new view;
         if ($count>=1) {
           foreach ($rows2 as $row) {
              echo '<tr>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->student_no.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->firstname." ".$row ->lastname." ".$row->middlename.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$view->getNationality($row->nationality).'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$view->getCourse($row->course).'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$view->getCollegeSchool($row->sch_coll).'</td>';
                  // echo '<td class="text-center" style="color:#DC65A1;">'.$row->month_graduated.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->yr_graduated.'</td>';
                  // echo '<td class="text-center" style="color:#DC65A1;">'.$row->home_no.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->cp_no.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->email.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->employer.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->emp_position.'</td>';
               echo '</tr>';
               }
             echo '</table>';
             echo '<a class= "btn btn-success mb-2 float-right"href="export.php?Alumni">Create Excel File</a>';
         }else {
           echo '</table>';
           echo '<center>No Data</center>';
         }

           // echo '<ul class="pagination  ml-2 ">';
           //  for ($p=1; $p <=$total_pages  ; $p++) {
           //  echo '<li id = "pagelink" class="page-item">';
           //  echo  '<a class= "page-link" href="?page='.$p.'">'.$p;
           //  echo  '</a>';
           //  echo '</li>';
           // }
           // echo '</ul>';
           $pagination = new paginationOneAdmin;
            $pagination->paginationAlumni($total_pages,$page);
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
            <option selected="true" disabled="disabled">Choose an Option</option>
             <option value="student_no">Student Number</option>
              <option value="firstname">First Name</option>
              <option value="lastname">Last Name</option>
              <option value="yr_graduated">Year Graduated</option>
            </select>
          </div>
          <div class="col-sm mt-2">
            <label for="search"></label>
            <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
          </div>
          <div class="col-sm mt-4 pt-2">
            <label for="submit"></label>
            <input type="submit" class="btn text-white" name="submitAlumni" value="Submit" style="background-color:#DC65A1;">
            <a class= "btn btn-success"href="export.php?exportAllAlumni2">Export All</a>
          </div>
        </div>
      </form>
  </div>';
      }

      // public function pagination($total_pages,$page){
      //   $adjacents = 3;
      //     $plimit = 1;
      //     $prev = $page - 1;
      //     $next = $page + 1;
      //     $lastpage = ceil($total_pages/$plimit);
      //     $lpm1 = $lastpage - 1;
      //     $pagination = "";
      //     if($lastpage > 1)
      //     {
      //       $pagination .= '<div style = "padding-top:10px;"class=\'pagination\'>';
      //       //previous button
      //       if ($page > 1)
      //         $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1;color:#DC65A1; padding:3px; text-decoration: none;" href=\'viewAlumniAdmin.php?page='.$prev.'\'>&laquo; previous</a>';
      //       else
      //         $pagination.= '<span style="background-color:white; border: 1px solid #DC65A1;color:#DC65A1; padding-left:5px; padding-right:7px;padding-top:3px;text-decoration: none;" span clas  s=\'disabled\'>&laquo previous</span>';
      //       //pages
      //       if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
      //       {
      //         for ($counter = 1; $counter <= $lastpage; $counter++)
      //         {
      //           if ($counter == $page)
      //             $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;" class=\'current\'>'.$counter.'</span>';
      //           else
      //             $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding:3px; text-decoration: none;" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
      //         }
      //       }
      //       elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
      //       {
      //         //close to beginning; only hide later pages
      //         if($page < 1 + ($adjacents * 2))
      //         {
      //           for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
      //           {
      //             if ($counter == $page)
      //               $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;" class=\'current\'>'.$counter.'</span>';
      //             else
      //               $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:13px;padding-right:13px;text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
      //           }
      //           $pagination .= '<span style="padding-top:10px;"class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      //           $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"  href=\'viewAlumniAdmin.php?page='.$lastpage.'\'>'.$lastpage.'</a>';
      //         }
      //         //in middle; hide some front and some back
      //         elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      //         {
      //           $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; padding-left:12px; color:#DC65A1;padding-right:12px;  text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page=1\'>1</a>';
      //           $pagination .= '<span style="padding-top:10px;" class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      //           for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      //           {
      //             if ($counter == $page)
      //               $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"class=\'current\'>'.$counter.'</span>';
      //             else
      //               $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;"  href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
      //           }
      //           $pagination .= '<span style = "padding-top:10px;"class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      //           $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"href=\'viewAlumniAdmin.php?page='.$lastpage.'\'>'.$lastpage.'</a>';
      //         }
      //         //close to end; only hide early pages
      //         else
      //         {
      //           $pagination.= '<a style="background-color:white; color:#DC65A1; border: 1px solid #DC65A1; color: #DC65A1; padding-left:13px;padding-right:13px; text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page=1.\'>1</a>';
      //           // $pagination.= '<a style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page=2\'>2</a>';
      //           $pagination .= '<span style="padding-top:10px;" class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
      //           for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      //           {
      //             if ($counter == $page)
      //               $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding:3px; text-decoration: none; padding-left:9px;padding-right:9px;"class=\'current\'>'.$counter.'</span>';
      //             else
      //               $pagination.= '<a style="background-color:white; color:#DC65A1; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
      //           }
      //         }
      //       }
      //       if ($page < $counter - 1)
      //         $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-right:15px; padding-left:15px; padding-top:3px;text-decoration: none;" href=\'viewAlumniAdmin.php?page='.$next.'\'>next &raquo;</a>';
      //       else
      //         $pagination.=  '<span style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-right:10px; padding-left:10px; padding-top:2.5px;text-decoration: none;"class=\'disabled\'>next &raquo;</span>';
      //       $pagination.= "</div>\n";
      //     }
      //     echo $pagination;
      // }

    }


 ?>
