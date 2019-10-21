<?php
require_once 'config.php';
class transaction{
    public $studentN,$ygle,$Lastname,$Firstname,$Middlename,$Course,$ContactNumber,$Status,$College,$Purpose,$requests,$dd,$da;

    function __construct($studentN=null,$ygle=null,$Lastname=null,$Firstname=null,$Middlename=null,$Course=null,$ContactNumber=null,$Status=null,$College=null,$Purpose=null,$requests=null,$da=null, $dd=null) {

        $this->studentN=$studentN;
        $this->ygle=$ygle;
        $this->Lastname = $Lastname;
        $this->Firstname =$Firstname;
        $this->Middlename =$Middlename;
        $this->Course = $Course;
        $this->ContactNumber = $ContactNumber;
        $this->Status = $Status;
        $this->College=$College;
        $this->Purpose = $Purpose;
        $this->requests = $requests;
        $this->dd=$dd;
        $this->da=$da;


    }

    public function insertTransaction(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `applications`(`StudentNo`,`LastName`,`FirstName`,`MI`,`Course`,`contact_no`,`Status`,`Applied_For`,`purposes`,`Date_App`,`Due_date`,`updated`,`created`,`Encoded_by`,`Date_Grad`)VALUES('$this->studentN','$this->Lastname','$this->Firstname','$this->Middlename','$this->Course','$this->ContactNumber','$this->Status','$this->requests','$this->Purpose','$this->da','$this->dd',NOW(),NOW(),4,'$this->ygle')";
        $data1 = $con-> prepare($sql1);
        $data1 ->execute();
    }

    public function insertWork(){
        $config = new config;
        $con = $config->con();
        $purpose = $this->findPurpose();
        $Course = $this->findCourse();
        $College = $this->findCollege();
        $id =$this->findID();
        $sql1 = "INSERT INTO `work`(`id`,`StudentNo`,`LastName`,`FirstName`,`MI`,`Course`,`contact_no`,`Status`,`Applied_For`,`purposes`,`College`,`Date_App`,`Due_date`,`Date_Grad`)VALUES($id,'$this->studentN','$this->Lastname','$this->Firstname','$this->Middlename','$Course','$this->ContactNumber','$this->Status','$this->requests','$purpose','$College','$this->da','$this->dd','$this->ygle')";
        $data1 = $con-> prepare($sql1);
        $data1 ->execute();
    }
    public function findCourse(){
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
        $sql = "SELECT id FROM `applications` WHERE `LastName` = '$this->Lastname' ORDER BY `created` DESC LIMIT 1";
        $data = $con-> prepare($sql);
        $data ->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        return $rows[0]->id;
    }
}
?>
