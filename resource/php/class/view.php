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
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->id.'">'.$row->course.'</option>';
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
                  echo '<option data-tokens=".'.$row->appliedfor.'." value="'.$row->appliedfor.'">'.$row->appliedfor.'</option>';
                  echo 'success';
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
                  echo '<option data-tokens=".'.$row->purposes.'." value="'.$row->purp_id.'">'.$row->purposes.'</option>';
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
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->id.'">'.$row->college_school.'</option>';
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
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              // var_dump($rows);

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
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?printed='.$row->id.'&id='.$user->data()->id.'&tab=view">Printed </a></br></td>';


                 echo '</tr>';
             }
             echo '</table>';
        }
        public function viewprinted(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `College` IN($college12)";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);

                     echo '<table class="table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5" style="width:100%; background-color:#DC65A1;">';
                     echo '<tr>';
                     echo '
                     <td class="text-center" style= "font-weight:bold; color:white;">Student Number</td>

                     <td class="text-center" style= "font-weight:bold; color:white;">Full Name</td>

                     <td class="text-center" style= "font-weight:bold; color:white;">Course</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Contact Number</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Status</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Date Graduated</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Applied For</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Purpose</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Due Date</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Remarks</td>
                     <td class="text-center" style= "font-weight:bold; color:white;">Actions</td>
                     ';
                     echo '</tr>';
                     foreach ($rows as $row) {
                       echo '<tr style="background-color:white;">';
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
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';

                 echo '</tr>';
             }
             echo '</table>';
        }
        public function viewverified2(){
          $config = new config;
          $con = $config->con();
            $user = new User();
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
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
                     echo '</head>';
                     foreach ($rows as $row) {
                       echo '<tr style="background-color:white;">';
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
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease1">Released </a></br></td>';
                 echo '</tr>';
             }
             echo '</table>';
        }
        public function viewverified(){
          $config = new config;
          $con = $config->con();
            $user = new User();
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `College` IN($college12)";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
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
                     echo '</head>';
                     foreach ($rows as $row) {
                       echo '<tr style="background-color:white;">';
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
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
                 echo '</tr>';
             }
             echo '</table>';
        }
        public function viewreleased(){
          $config = new config;
          $con = $config->con();
          $user = new User();
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              // var_dump($rows);
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
                         foreach ($rows as $row) {
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
             echo '</table>';
        }
        public function getSName($number){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_accounts` WHERE `id` = $number";
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
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";
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
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `College` IN($college12)";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data->rowCount();
          return $rows;
          }

          public function cverified(){
            $config = new config;
            $con = $config->con();
              $user = new User();
            $college1 = $user->data()->colleges;
            $college2 = explode(',',$college1);
            $college12 ="'".implode('\',\'',$college2)."'";
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `College` IN($college12)";
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
            $college1 = $user->data()->colleges;
            $college2 = explode(',',$college1);
            $college12 ="'".implode('\',\'',$college2)."'";
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `releasedby`=$id AND (`released_date` BETWEEN '$fd' AND '$ld')";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data->rowCount();
            return $rows;
          }
          public function chartpending(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $college1 = $row->colleges;
              $college2 = explode(',',$college1);
              $college12 ="'".implode('\',\'',$college2)."'";
              $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";
              $data = $con-> prepare($sql);
              $data ->execute();
              $results =$data->rowCount();
              // return $results;
                echo'  { label: "'.$row->username.'", y:'.$results.' },';
            }
          }
          public function chartReleased(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = 1";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $college1 = $row->colleges;
              $college2 = explode(',',$college1);
              $college12 ="'".implode('\',\'',$college2)."'";
              $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `College` IN($college12)";
              $data = $con-> prepare($sql);
              $data ->execute();
              $results =$data->rowCount();
              // return $results;
                echo'  { label: "'.$row->username.'", y:'.$results.' },';
            }
          }
}

 ?>
