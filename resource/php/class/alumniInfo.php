<?php
require_once 'config.php';
class alumniInfo{
    public $sno,$lname,$fname,$mname,$dc,$cno,$dob,$nt,$cs,$mg,$yg,$addr,$hno,$hfno,$eaddr,$octype,$emp,$baddr,$ofno,$emppos;

    function __construct($sno=null,$lname=null,$fname=null,$mname=null,$dc=null,$nt=null,$cs=null,$yg=null,$eaddr=null) {

        $this->sno =  $sno;
        $this->lname = $lname;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->dc = $dc;
        $this->nt = $nt;
        $this->cs = $cs;
        $this->yg =$yg;
        $this->eaddr =$eaddr;
    }

    public function insertAlumniInfo(){
        $config = new config;
        $con = $config->con();
          $sql1 = "INSERT INTO `tbl_alumni_info` (`student_no`,`lastname`,`firstname`,`middlename`,`nationality`,`course`,`sch_coll`,`yr_graduated`,`email`) VALUES('$this->sno','$this->lname','$this->fname','$this->mname','$this->nt','$this->dc','$this->cs','$this->yg','$this->eaddr')";
        // $sql1 = "INSERT INTO `tbl_alumni_info`(`student_no`, `lastname`, `firstname`, `middlename`, `dob`, `nationality`, `course`, `sch_coll`, `month_graduated`, `yr_graduated`, `address`, `home_no`, `home_fax_no`, `cp_no`, `email`, `occupation_type`,`emp_position`, `employer`, `bus_address`,`ofc_no`,`ofc_fax_no`,`updated`,`created`)VALUES('$this->sno','$this->lname','$this->fname','$this->mname','$this->dob','$this->nt','$this->dc','$this->cs','$this->mg','$this->yg','$this->addr','$this->hno','$this->hfno','$this->cno','$this->eaddr','$this->octype','$this->emppos','$this->emp','$this->baddr','$this->ofno',NULL,NOW(),NOW())";

        $data1 = $con->prepare($sql1);
        if ($data1->execute()) {
              echo "success";
        }else {
          echo "no";
        }
    }
}
?>
