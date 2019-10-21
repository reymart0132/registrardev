<?php
require_once 'config.php';
class alumniInfo{
    public $sno,$lname,$fname,$mname,$dc,$cno,$dob,$nt,$cs,$mg,$yg,$addr,$hno,$hfno,$eaddr,$octype,$emp,$baddr,$ofno,$emppos;

    function __construct($sno=null,$lname=null,$fname=null,$mname=null,$dc=null,$cno=null,$dob=null,$nt=null,$cs=null,$mg=null,$yg=null,$addr=null,$hno=null,$hfno=null,$eaddr=null,$octype=null,$emp=null,$baddr=null,$ofno=null,$emppos=null) {

        $this->sno =  $sno;
        $this->lname = $lname;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->dc = $dc;
        $this->cno = $cno;
        $this->dob = $dob;
        $this->nt = $nt;
        $this->mg =$mg;
        $this->yg =$yg;
        $this->addr =$addr;
        $this->hno =$hno;
        $this->hfno =$hfno;
        $this->eaddr =$eaddr;
        $this->octype =$octype;
        $this->emp = $emp;
        $this->baddr = $baddr;
        $this->ofno = $ofno;
        $this->emppos = $emppos;
    }

    public function insertAlumniInfo(){
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `tbl_alumni_info`(`student_no`, `lastname`, `firstname`, `middlename`, `dob`, `nationality`, `course`, `sch_coll`, `month_graduated`, `yr_graduated`, `address`, `home_no`, `home_fax_no`, `cp_no`, `email`, `occupation_type`,`emp_position`, `employer`, `bus_address`,`ofc_no`,`ofc_fax_no`,`updated`,`created`)VALUES('$this->sno','$this->lname','$this->fname','$this->mname','$this->dob','$this->nt','$this->dc','$this->cs','$this->mg','$this->yg','$this->addr','$this->hno','$this->hfno','$this->cno','$this->eaddr','$this->octype','$this->emppos','$this->emp','$this->baddr','$this->ofno',NULL,NOW(),NOW())";
        $data1 = $con-> prepare($sql1);
        $data1 ->execute();
    }
}
?>
