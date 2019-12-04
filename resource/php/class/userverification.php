<?php

$ygle = $_POST['ygle'];
$FullName = $_POST['FullName'];
$Course= $_POST['Course'];
$Status= $_POST['Status'];
$College= $_POST['College'];
$cemail=$_POST['Email'];
$da = date('Y-m-d');

require_once 'config.php';
class userverification{
    public $ygle,$FullName,$Course,$College,$dd,$da,$assignee,$Status,$cemail;

    function __construct($ygle =null,$FullName =null,$Course=null,$College=null,$dd=null,$da=null,$assignee=null,$Status=null,$cemail=null) {

        $this->ygle=$ygle;
        $this->FullName = $FullName;
        $this->Course = $Course;
        $this->College=$College;
        $this->Status = $Status;
        $this->dd=$dd;
        $this->da=$da;
        $this->assignee=$assignee;
        $this->cemail=$cemail;
    }

    public function insertVerification(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `tbl_verification`(`fullname`,`Course`,`Status`,`College`,`date_recieved`,`duedate`,`dategrad`,`assignee`,`cemail`)VALUES('$this->FullName','$this->Course','$this->Status','$this->College','$this->da','$this->dd','$this->ygle','$this->assignee','$this->cemail')";
        $data1 = $con-> prepare($sql1);
        $data1 ->execute();
        echo "success";
    }
    public function findCourse2(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_course` where `id`=$this->Course";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->course;
    }
    public function findPurpose(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `tbl_purposes` where `purp_id`=$this->Purpose";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->purposes;
    }
    public function findCollege(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `collegeschool` where `id`=$this->College";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->college_school;
    }
    public function findID(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `applications` WHERE `LastName` = '$this->Lastname' ORDER BY `created` DESC LIMIT 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->id;
    }
}
?>
