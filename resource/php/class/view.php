<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';
class view extends config{

    public function degreeCourse(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_course`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        echo '<option value="" disabled selected>Degree and Course</option>';
            foreach ($rows as $row) {
              echo '<option value="'.$row->id.'">'.$row->course.'</option>';
              echo 'success';
            }
    }
    public function monthGrad(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_month`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        echo '<option value="" disabled selected>Month Graduated</option>';
            foreach ($rows as $row) {
              echo '<option value="'.$row->id.'">'.$row->month_desc.'</option>';
            }
        }
    public function nationality(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_nationality`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        echo '<option value="" disabled selected>Nationality</option>';
            foreach ($rows as $row) {
              echo '<option value="'.$row->id.'">'.$row->nationality.'</option>';
            }
        }
        public function occupationType(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_occupation_type`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            echo '<option value="" disabled selected>Occupation Type</option>';
                foreach ($rows as $row) {
                  echo '<option value="'.$row->id.'">'.$row->type.'</option>';
                }
            }
    public function schoolCollege(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `collegeschool`";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        echo '<option value="" disabled selected>School/ College</option>';
            foreach ($rows as $row) {
              echo '<option value="'.$row->id.'">'.$row->college_school.'</option>';
            }
        }
        public function degreeCourseSP(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            echo '<option value="" disabled selected>Course</option>';
                foreach ($rows as $row) {

                  $state = $row->state;
                  if ($state == "active") {
                    echo '<option value="'.$row->id.'">'.$row->course.'</option>';
                    echo 'success';
                  }
              }
            }



        public function degreeCourseedit(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_course`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            // echo '<option value="" disabled selected>Course</option>';
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->course.'">'.$row->course.'</option>';
                  echo 'success';
                }
        }

        public function requestingForSP(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_applied_for`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                    $state = $row->state;
                  if ($state == "active") {
                    echo '<option data-tokens=".'.$row->appliedfor.'." value="'.$row->appliedfor.'">'.$row->appliedfor.'</option>';
                    echo 'success';
                  }
                }
        }
        public function reasonFA(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_purposes`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                    $state = $row->state;
                  if ($state == "active") {
                    echo '<option data-tokens=".'.$row->purposes.'." value="'.$row->purp_id.'">'.$row->purposes.'</option>';
                    echo 'success';
                  }
                }
        }

        public function formtype(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `formtype`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->type.'." value="'.$row->type.'">'.$row->value.'</option>';
                  echo 'success';
                }
        }

        public function reasonFAedit(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_purposes`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->purposes.'." value="'.$row->purposes.'">'.$row->purposes.'</option>';
                  echo 'success';
                }
        }

        public function collegeSP(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  $state = $row->state;
                  if ($state == "active") {
                    echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->id.'">'.$row->college_school.'</option>';
                    echo 'success';
                  }
                }
        }



        public function collegeedit(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->college_school.'">'.$row->college_school.'</option>';
                  echo 'success';
                }
        }

        public function collegeSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool`";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->college_school.'">'.$row->college_school.'</option>';
                  echo 'success';
                }
        }

        public function viewtodolist(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id1'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
              // var_dump($rows);

           // paginationqueryhere

           $_SESSION['resultPending'] = $rows;

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

           $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id1' LIMIT $start,$limit";
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
            <th class="text-center" style= "font-weight:bold; color:white;"></td>
           ';
           echo '</thead>';

           $count = $data2->rowCount();

           if($count>=1) {
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
                   echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
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
                   echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
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
                  echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
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
                 echo '<td class="text-center style="color:#DC65A1;" style="color:white;"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';
                 echo '<td class="text-center"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
                 echo '</tr>';
                 }
               }
               echo '</table>';
               echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportPending">Create Excel File</a>';
           }else {
             echo '</table>';
             echo "<center>No Requests</center>";
           }

             echo '<ul class="pagination  ml-2 ">';
             for ($p=1; $p <=$total_pages; $p++) {
              echo '<li id = "pagelink" class="page-item">';
              echo  '<a class= "page-link" href="?tab=view&Ppage='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
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

        public function viewprinted(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `assignee` = '$id1'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_ASSOC);

          $_SESSION['resultPrinted'] = $rows;
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

          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `assignee` = '$id1' LIMIT $start,$limit";
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
          <th class="text-center" style= "font-weight:bold; color:white;"></td>
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
                  echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
                  echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn  btn-light  btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=printed">Edit</a></br></td>';

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
                  echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
                  echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn  btn-light btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=printed">Edit</a></br></td>';
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
                 echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
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
                echo '<td class="text-center" style="color:#DC65A1;"><a class="btn btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
                echo '<td class="text-center" style="color:#DC65A1;"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->pid.'&id='.$user->data()->id.'&tab=view&act=printed">Edit</a></br></td>';
                  echo '</tr>';
                }
              }
            echo '</table>';
            echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportPrinted">Create Excel File</a>';
          }else {
            echo '</table>';
            echo "<center>No Requests</center>";
          }


             echo '<ul class="pagination  ml-2 ">';
             for ($p=1; $p <=$total_pages; $p++) {
              $printed  = "printed";
              echo '<li class="page-item">';
              echo  '<a class= "page-link" href="?tab='.$printed.'&PRpage='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
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
                    <input  class="form-control" type="date" name="dateTo" id="endDate2"  onkeydown="return false"  placeholder="dd-mm-yyyy">
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

        public function viewverified2(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);

          $limit = 10;

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

          $total_results = $data->rowCount();
          $total_pages = ceil($total_results/$limit);

          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' LIMIT $start,$limit";
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
                echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
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
                echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
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
               echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
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
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
                 echo '</tr>';
              }
             }
              echo '</table>';

             echo '<ul class="pagination  ml-2 ">';
             for ($p=1; $p <=$total_pages; $p++) {
              echo '<li class="page-item">';
              echo  '<a class= "page-link" href="?tab=forrelease1&V2page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
             }
             echo '</ul>';

             echo '
             <div class="container-fluid mt-4">
              <form class="" action="" method="get">
                <div class="row">
                  <div class="col-sm">
                    <label for="dateFrom">From:</label>
                    <input  class="form-control" type="date" name="dateFrom" id="startDate3"   onkeydown="return false" data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
                  </div>
                  <div class="col-sm">
                    <label for="dateTo">To:</label>
                    <input  class="form-control" type="date" name="dateTo" id="endDate3"  onkeydown="return false" placeholder="dd-mm-yyyy" >
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
          $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
          $limit = 10;

          $_SESSION['resultVerified'] = $rows;

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

          $sql3 = "SELECT * FROM `work`";
          $data3 = $con->prepare($sql3);
          $data3 ->execute();
          $rowsAll =$data3-> fetchAll(PDO::FETCH_ASSOC);
          $_SESSION['allCSV'] = $rowsAll;

          $total_results = $data->rowCount();
          $total_pages = ceil($total_results/$limit);

          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `assignee` = '$id1' LIMIT $start,$limit";
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
                  echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
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
                  echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
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
                 echo '<td class="text-center" style="color:white; background-color:#a68df9"><a class="btn btn-light btn-outline-success"  href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
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
                echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
                  echo '</tr>';
                }
              }
              echo '</table>';
              echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportVerified">Create Excel File</a>';
              }else {
              echo '</table>';
              echo '<center>No Requests</center>';
              }

             echo '<ul class="pagination  ml-2 ">';
             for ($p=1; $p <=$total_pages; $p++) {
              echo '<li class="page-item">';
              echo  '<a class= "page-link" href="?tab=forrelease2&V1page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
             }
             echo '</ul>';

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
                    <a class= "btn btn-success"href="export.php?exportAll">Export All</a>
                  </div>
                </div>
              </form>
          </div>';
        }

        //
        public function viewreleased(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
          $limit = 10;

          $_SESSION['resultReleased'] = $rows;

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
                     echo '<td class="text-center text-white" style="background-color:#a68df9;">'.$this->getSname($row->releasedby).'</td>';
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
                     echo '<td class="text-center" style="color:#DC65A1;">'.$this->getSname($row->releasedby).'</td>';
                     echo '<td class="text-center" style="color:#DC65A1;">'.$row->remarks.'</br></td>';
                     echo '</tr>';
                  }
                }
                  echo '</table>';
                  echo '<a class= "btn btn-success mb-2 float-right"href="export.php?exportReleased">Create Excel File</a>';
                }else {
                    echo '</table>';
                    echo '<center>No Released Requests</center>';
                }


             echo '<ul class="pagination  ml-2 ">';
             for ($p=1; $p <=$total_pages; $p++) {
              echo '<li class="page-item">';
              echo  '<a class= "page-link" href="?tab=released&Rpage='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
             }
             echo '</ul>';

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
            if($number == NULL){
              return "";
            }else{
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_accounts` WHERE `id` = '$number'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            return $rows[0]->name;
          }
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
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `assignee` = '$id1'";
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
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `assignee` = '$id1'";
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
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `assignee` = '$id1'";
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
                $sql = "SELECT * FROM `work` WHERE `assignee` = '$id' AND `printeddate` > '$cld' UNION SELECT * FROM `work` WHERE `assignee` = '$id' AND `printeddate` IS NULL AND `Date_App` <= '$cld'";
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



}
 ?>
