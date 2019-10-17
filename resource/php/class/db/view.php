<?php
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





}
 ?>
