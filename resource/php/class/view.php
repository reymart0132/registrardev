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

              echo "<table class='table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5' style=width:100%>";
           echo '<tr>';
           echo '
           <td class="text-center" style= font-weight:bold;>Student Number</td>

           <td class="text-center" style= font-weight:bold;>Full Name</td>

           <td class="text-center" style= font-weight:bold;>Course</td>
           <td class="text-center" style= font-weight:bold;>Contact Number</td>
           <td class="text-center" style= font-weight:bold;>Status</td>
           <td class="text-center" style= font-weight:bold;>Date Graduated</td>
           <td class="text-center" style= font-weight:bold;>Applied For</td>
           <td class="text-center" style= font-weight:bold;>Purpose</td>
           <td class="text-center" style= font-weight:bold;>Due Date</td>
           <td class="text-center" style= font-weight:bold;>Remarks</td>
           <td class="text-center" style= font-weight:bold;>Actions</td>
           ';
           echo '</tr>';
           foreach ($rows as $row) {
             echo '<tr>';
               // echo '<td class="text-center">'.$row ->id.'</td>';
               echo '<td class="text-center">'.$row ->StudentNo.'</td>';
               echo '<td class="text-center">'.$row ->FirstName.$row ->LastName.$row ->MI.'</td>';
               echo '<td class="text-center">'.$row ->Course.'</br></td>';
               echo '<td class="text-center">'.$row ->contact_no.'</td>';
               echo '<td class="text-center">'.$row ->Status.'</td>';
               echo '<td class="text-center">'.$row ->Date_Grad.'</td>';
               echo '<td class="text-center">'.$row ->Applied_For.'</td>';
               echo '<td class="text-center">'.$row ->purposes.'</td>';
               echo '<td class="text-center">'.$row ->Due_Date.'</td>';
               echo '<td class="text-center">'.$row ->remarks.'</br></td>';
               echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?printed='.$row ->id.'">Printed </a></br></td>';


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

                        echo "<table class='table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5' style=width:100%>";
                     echo '<tr>';
                     echo '
                     <td class="text-center" style= font-weight:bold;>Student Number</td>

                     <td class="text-center" style= font-weight:bold;>Full Name</td>

                     <td class="text-center" style= font-weight:bold;>Course</td>
                     <td class="text-center" style= font-weight:bold;>Contact Number</td>
                     <td class="text-center" style= font-weight:bold;>Status</td>
                     <td class="text-center" style= font-weight:bold;>Date Graduated</td>
                     <td class="text-center" style= font-weight:bold;>Applied For</td>
                     <td class="text-center" style= font-weight:bold;>Purpose</td>
                     <td class="text-center" style= font-weight:bold;>Due Date</td>
                     <td class="text-center" style= font-weight:bold;>Remarks</td>
                     <td class="text-center" style= font-weight:bold;>Actions</td>
                     ';
                     echo '</tr>';
                     foreach ($rows as $row) {
                       echo '<tr>';
                         // echo '<td class="text-center">'.$row ->id.'</td>';
                         echo '<td class="text-center">'.$row ->StudentNo.'</td>';
                         echo '<td class="text-center">'.$row ->FirstName.$row ->LastName.$row ->MI.'</td>';
                         echo '<td class="text-center">'.$row ->Course.'</br></td>';
                         echo '<td class="text-center">'.$row ->contact_no.'</td>';
                         echo '<td class="text-center">'.$row ->Status.'</td>';
                         echo '<td class="text-center">'.$row ->Date_Grad.'</td>';
                         echo '<td class="text-center">'.$row ->Applied_For.'</td>';
                         echo '<td class="text-center">'.$row ->purposes.'</td>';
                         echo '<td class="text-center">'.$row ->Due_Date.'</td>';
                         echo '<td class="text-center">'.$row ->remarks.'</br></td>';
               echo '<td class="text-center"><a class="btn btn-outline-success" href="verified.php?verified='.$row ->id.'">Verified </a></br></td>';

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

                        echo "<table class='table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5' style=width:100%>";
                     echo '<tr>';
                     echo '
                     <td class="text-center" style= font-weight:bold;>Student Number</td>

                     <td class="text-center" style= font-weight:bold;>Full Name</td>

                     <td class="text-center" style= font-weight:bold;>Course</td>
                     <td class="text-center" style= font-weight:bold;>Contact Number</td>
                     <td class="text-center" style= font-weight:bold;>Status</td>
                     <td class="text-center" style= font-weight:bold;>Date Graduated</td>
                     <td class="text-center" style= font-weight:bold;>Applied For</td>
                     <td class="text-center" style= font-weight:bold;>Purpose</td>
                     <td class="text-center" style= font-weight:bold;>Due Date</td>
                     <td class="text-center" style= font-weight:bold;>Remarks</td>
                     <td class="text-center" style= font-weight:bold;>Actions</td>
                     ';
                     echo '</tr>';
                     foreach ($rows as $row) {
                       echo '<tr>';
                         // echo '<td class="text-center">'.$row ->id.'</td>';
                         echo '<td class="text-center">'.$row ->StudentNo.'</td>';
                         echo '<td class="text-center">'.$row ->FirstName.$row ->LastName.$row ->MI.'</td>';
                         echo '<td class="text-center">'.$row ->Course.'</br></td>';
                         echo '<td class="text-center">'.$row ->contact_no.'</td>';
                         echo '<td class="text-center">'.$row ->Status.'</td>';
                         echo '<td class="text-center">'.$row ->Date_Grad.'</td>';
                         echo '<td class="text-center">'.$row ->Applied_For.'</td>';
                         echo '<td class="text-center">'.$row ->purposes.'</td>';
                         echo '<td class="text-center">'.$row ->Due_Date.'</td>';
                         echo '<td class="text-center">'.$row ->remarks.'</br></td>';
               echo '<td class="text-center"><a class="btn btn-outline-success" href="released.php?released='.$row ->id.'">Released </a></br></td>';
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
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `College` IN($college12)";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              // var_dump($rows);

                            echo "<table class='table table-striped table-bordered table-sm table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mb-5' style=width:100%>";
                         echo '<tr>';
                         echo '
                         <td class="text-center" style= font-weight:bold;>Student Number</td>

                         <td class="text-center" style= font-weight:bold;>Full Name</td>

                         <td class="text-center" style= font-weight:bold;>Course</td>
                         <td class="text-center" style= font-weight:bold;>Contact Number</td>
                         <td class="text-center" style= font-weight:bold;>Status</td>
                         <td class="text-center" style= font-weight:bold;>Date Graduated</td>
                         <td class="text-center" style= font-weight:bold;>Applied For</td>
                         <td class="text-center" style= font-weight:bold;>Purpose</td>
                         <td class="text-center" style= font-weight:bold;>Due Date</td>
                         <td class="text-center" style= font-weight:bold;>Remarks</td>

                         ';
                         echo '</tr>';
                         foreach ($rows as $row) {
                           echo '<tr>';
                             // echo '<td class="text-center">'.$row ->id.'</td>';
                             echo '<td class="text-center">'.$row ->StudentNo.'</td>';
                             echo '<td class="text-center">'.$row ->FirstName.$row ->LastName.$row ->MI.'</td>';
                             echo '<td class="text-center">'.$row ->Course.'</br></td>';
                             echo '<td class="text-center">'.$row ->contact_no.'</td>';
                             echo '<td class="text-center">'.$row ->Status.'</td>';
                             echo '<td class="text-center">'.$row ->Date_Grad.'</td>';
                             echo '<td class="text-center">'.$row ->Applied_For.'</td>';
                             echo '<td class="text-center">'.$row ->purposes.'</td>';
                             echo '<td class="text-center">'.$row ->Due_Date.'</td>';
                             echo '<td class="text-center">'.$row ->remarks.'</br></td>';


                 echo '</tr>';
             }
             echo '</table>';
        }

}
 ?>
