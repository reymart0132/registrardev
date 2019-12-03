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
           <th class="text-center" style= "font-weight:bold; color:white;" colspan="2">Actions</td>
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
        public function viewPendingVer(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING' AND `assignee` = '$id1'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              // var_dump($rows);

           // paginationqueryhere
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

           $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'PENDING' AND `assignee` = '$id1' LIMIT $start,$limit";
           $data2 = $con-> prepare($sql2);
           $data2 ->execute();
           $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

           echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
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
                 echo '<td class="text-center" style="color:white; background-color:#ff5757"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify </a></br></td>';

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
               echo '<td class="text-center style="color:#DC65A1;" style="color:white;"><a class="btn bg-light btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Verify</a></br></td>';
               echo '<td class="text-center"><a class="btn btn-outline-success" href="editTransaction.php?pid='.$row->id.'&id='.$user->data()->id.'&tab=view&act=pending">Edit</a></br></td>';
               echo '</tr>';
               }
             }
             echo '</table>';

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
                    </select>
                  </div>
                  <div class="col-sm mt-2">
                    <label for="search"></label>
                    <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
                  </div>
                  <div class="col-sm mt-4 pt-2">
                    <label for="submit"></label>
                    <input type="submit" class="btn text-white" name="submitPending" value="Submit" style="background-color:#DC65A1;">
                  </div>
                </div>
              </form>
          </div>';

        }
        public function viewVerifiedVer(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $id1 = $user->data()->id;
          $sql = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              // var_dump($rows);

           // paginationqueryhere
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

           $sql2 = "SELECT * FROM `tbl_verification` WHERE `remarks` = 'VERIFIED' AND `assignee` = '$id1' LIMIT $start,$limit";
           $data2 = $con-> prepare($sql2);
           $data2 ->execute();
           $rows2 =$data2-> fetchAll(PDO::FETCH_OBJ);

           echo '<table class="table table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%;">';
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
                 echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$row->date_verified.'</td>';
                 echo '<td class="text-center" style="color:white; background-color:#ff5757">'.$this->getNameSRA2($row->assignee).'</td>';

                   echo '</tr>';
              }else {
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->fullname.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->college.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->course.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->status.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->dategrad.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->cemail.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$row->date_verified.'</td>';
                  echo '<td class="text-center" style="color:#DC65A1;">'.$this->getNameSRA2($row->assignee).'</td>';
               echo '</tr>';
               }
             }
             echo '</table>';

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
                    </select>
                  </div>
                  <div class="col-sm mt-2">
                    <label for="search"></label>
                    <input class="form-control" type="text" name="search" placeholder="Search Here.."/>
                  </div>
                  <div class="col-sm mt-4 pt-2">
                    <label for="submit"></label>
                    <input type="submit" class="btn text-white" name="submitPending" value="Submit" style="background-color:#DC65A1;">
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
  