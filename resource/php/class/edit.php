<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
class edit extends config{
  public $sno;
  public $lname;
  public $fname;
  public $mi;
  public $dg;
  public $course;
  public $number;
  public $status;
  public $appfor;
  public $purpose;
  public  $college;

  public function editQuote(){
      $config = new config;
      $con = $config->con();
      $id = $_GET['id'];
      $quote = $_POST['quote'];
      $sql = "UPDATE `tbl_accounts` SET `quote` = '$quote' WHERE `id` = '$id'";
      $data = $con-> prepare($sql);
      $data->execute();
      header('location:../../configuration.php');
    }
    public function edittransac(){
      $config = new config;
      $con = $config->con();
      $pid = $_GET['pid'];
      if ($_POST['studentN'] == '') {
        $ygle = $_POST['ygle'];
        $Lastname = $_POST['Lastname'];
        $Firstname = $_POST['Firstname'];
        $Middlename = $_POST['Middlename'];
        $Course = $_POST['Course'];
        $ContactNumber = $_POST['ContactNumber'];
        $Status = $_POST['Status'];
        $College = $_POST['College'];
        $request = $_POST['request'];
        $purpose = $_POST['Purpose'];
        $req1 = $request;
        $req3 ="'".implode('\',\'',$req1)."'";

        $sql = "UPDATE `work` SET `StudentNo`=NULL,`LastName`='$Lastname',`FirstName`='$Firstname' ,`MI`='$Middlename',`Course`= '$Course' ,`contact_no`=$ContactNumber ,`Date_Grad`='$ygle',`Applied_For`=$req3,`College` = '$College',`purposes`= '$purpose' WHERE `pid` = $pid";
        $data = $con-> prepare($sql);
        $data->execute();
      }else {
        $studentN =  $_POST['studentN'];
        $ygle = $_POST['ygle'];
        $Lastname = $_POST['Lastname'];
        $Firstname = $_POST['Firstname'];
        $Middlename = $_POST['Middlename'];
        $Course = $_POST['Course'];
        $ContactNumber = $_POST['ContactNumber'];
        $Status = $_POST['Status'];
        $College = $_POST['College'];
        $request = $_POST['request'];
        $purpose = $_POST['Purpose'];
        $req1 = $request;
        $req3 ="'".implode('\',\'',$req1)."'";
        $sql = "UPDATE `work` SET `StudentNo`=$studentN,`LastName`='$Lastname',`FirstName`='$Firstname' ,`MI`='$Middlename',`Course`= '$Course' ,`contact_no`=$ContactNumber ,`Date_Grad`='$ygle',`Applied_For`=$req3,`College` = '$College',`purposes`= '$purpose' WHERE `pid` = $pid";
        $data = $con-> prepare($sql);
        $data->execute();
      }
      }

    public function viewedit(){

        $config = new config;
        $con = $config->con();
        $pid = $_GET['pid'];
        $sql = "SELECT * FROM `work` WHERE `pid` = '$pid'";
        $data = $con-> prepare($sql);
        $data->execute();
        $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $dat) {
          $this->sno = $dat->StudentNo;
          $this->lname = $dat->LastName;
          $this->fname = $dat->FirstName;
          $this->mi = $dat->MI;
          $this->dg = $dat->Date_Grad;
          $this->course = $dat->Course;
          $this->number = $dat->contact_no;
          $this->status = $dat->Status;
          $this->appfor = $dat->Applied_For;
          $this->purpose = $dat->purposes;
          $this->college = $dat->College;


        }
      }

  }
?>
