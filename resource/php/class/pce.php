<?php
class pce {
  public function __construct($school=null,$studentN=null,$college=null,$semester=null,$date=null,$city=null,$subjects=null,$units=null){
    $this->school = $school;
    $this->studentN = $studentN;
    $this->college = $college;
    $this->semester = $semester;
    $this->date = $date;
    $this->city = $city;
    $this->subjects = $subjects;
    $this->units = $units;

  }
    public function display(){
      $school = $this->school;
      $studentN = $this->studentN;
      $college = $this->college;
        }
        public function displaysubjects(){
          $subjects = $this->subjects;
          foreach ($subjects as $subject) {
            echo '<p class=text-center>'.$subject.'</p>';
            echo '<hr></hr>';
        }
    }
            public function displayunits(){
              $units = $this->units;
            foreach ($units as $unit) {
              echo '<p class=text-center>'.$unit.'</p>';
              echo '<hr></hr>';
          }
      }
  }
 ?>
