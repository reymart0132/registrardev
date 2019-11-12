<?php
require_once 'config.php';
class Search extends config{


  public function searchPending(){

    if(!empty($_GET['dateFrom'])){
    $dateFrom = $_GET['dateFrom'];
    };
    if(!empty($_GET['dateTo'])){
      $dateTo = $_GET['dateTo'];
    };
    if(!empty($_GET['criteria'])){
      $criteria = $_GET['criteria'];
    };
    if(!empty($_GET['search'])){
      $search = $_GET['search'];
    };


    $config = new config;
    $con = $config->con();
    $user = new User();
    $college1 = $user->data()->colleges;
    $college2 = explode(',',$college1);
    $college12 ="'".implode('\',\'',$college2)."'";
    $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";


    if (!empty($search) && !empty($criteria)) {
      $sql .= "AND `$criteria` LIKE '%$search%'";
    }elseif (!empty($dateFrom) && !empty($dateTo)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
    }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
      $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
    }

    $data = $con->prepare($sql);
    $data ->execute();
    $rows=$data-> fetchAll(PDO::FETCH_OBJ);

    $limit = 10;

    if (!isset($_GET['Ppage'])) {
          $page = 1;
      }else{
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

    $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";


    if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
      $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    }elseif (!empty($search) && !empty($criteria)) {
      $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
    }elseif (!empty($dateFrom) && !empty($dateTo)) {
      $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
    }


    $data2 = $con->prepare($sql2);
    $data2 ->execute();
    $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


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

    foreach ($rows2 as $row) {
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
    echo '<ul class="pagination ml-2">';

      for ($p=1; $p <=$total_pages; $p++) {
        if (!empty($search) && !empty($criteria)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?search='.$search.'&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage='.$p.'&submitPending=Submit#pending">'.$p;
          echo  '</a>';
          echo '</li>';
        }elseif(!empty($dateFrom) && !empty($dateTo)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=view&submit=submitPending&dateTo='.$dateTo.'&Ppage='.$p.'&submitPending=Submit#pending">'.$p;
          echo  '</a>';
          echo '</li>';
        }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          echo '<li class="page-item" >';
          echo  '<a class= "page-link" href="?tab=view&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Ppage='.$p.'&submitPending=Submit#pending&submit=submitPending">'.$p;
          echo  '</a>';
          echo '</li>';
        }
      }
      echo '</ul>';

    echo '
    <div class="container-fluid mt-4">
     <form class="" action="" method="get">
       <div class="row">
         <div class="col-sm">
           <label for="dateFrom">From:</label>
           <input  class="form-control" type="text" name="dateFrom" id="StartDate"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
         </div>
         <div class="col-sm">
           <label for="dateTo">To:</label>
           <input  class="form-control" type="text" name="dateTo" id="EndDate" placeholder="dd-mm-yyyy">
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
         </div>
       </div>
     </form>
 </div>';

  }

    //
    public function searchPrinted(){

      if(!empty($_GET['dateFrom'])){
      $dateFrom = $_GET['dateFrom'];
      };
      if(!empty($_GET['dateTo'])){
        $dateTo = $_GET['dateTo'];
      };
      if(!empty($_GET['criteria'])){
        $criteria = $_GET['criteria'];
      };
      if(!empty($_GET['search'])){
        $search = $_GET['search'];
      };

      $config = new config;
      $con = $config->con();
      $user = new User();
      $college1 = $user->data()->colleges;
      $college2 = explode(',',$college1);
      $college12 ="'".implode('\',\'',$college2)."'";
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `College` IN($college12)";


      if (!empty($search) && !empty($criteria)) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_OBJ);

      $limit = 10;

      if (!isset($_GET['PRpage'])) {
            $page = 1;
        }else{
            $page = $_GET['PRpage'];
      }

      if(isset($_GET['PRpage']) > 1){
        $_GET['Ppage'] = 1;
        $_GET['V1'] = 1;
        $_GET['V2page'] = 1;
        $_GET['Rpage'] = 1;
      }

      $start = ($page-1)*$limit;

      $total_results = $data->rowCount();
      $total_pages = ceil($total_results/$limit);

      $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `College` IN($college12)";


      if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($search) && !empty($criteria)) {
        $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }elseif (!empty($dateFrom) && !empty($dateTo)) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
      }


      $data2 = $con->prepare($sql2);
      $data2 ->execute();
      $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


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

      foreach ($rows2 as $row) {
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
            echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?verified='.$row->id.'&id='.$user->data()->id.'&tab=printed">Verified </a></br></td>';
       echo '</tr>';
        }
      echo '</table>';
      echo '<ul class="pagination ml-2">';

        for ($p=1; $p <=$total_pages; $p++) {
          if (!empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?search='.$search.'&tab=printed&submit=submitPrinted&criteria='.$criteria.'&PRpage='.$p.'&submitPrinted=Submit#printed">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif(!empty($dateFrom) && !empty($dateTo)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=printed&submit=submitPrinted&dateTo='.$dateTo.'&PRpage='.$p.'&submitPrinted=Submit#printed">'.$p;
            echo  '</a>';
            echo '</li>';
          }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            echo '<li class="page-item" >';
            echo  '<a class= "page-link" href="?tab=printed&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&PRpage='.$p.'&submitPrinted=Submit#printed&submit=submitPrinted">'.$p;
            echo  '</a>';
            echo '</li>';
          }
        }
        echo '</ul>';

      echo '
      <div class="container-fluid mt-4">
       <form class="" action="" method="get">
         <div class="row">
           <div class="col-sm">
             <label for="dateFrom">From:</label>
             <input  class="form-control" type="text" name="dateFrom" id="StartPrinted"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
           </div>
           <div class="col-sm">
             <label for="dateTo">To:</label>
             <input  class="form-control" type="text" name="dateTo" id="EndPrinted" placeholder="dd-mm-yyyy">
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
           </div>
         </div>
       </form>
   </div>';


      }

      public function searchVerified(){

        if(!empty($_GET['dateFrom'])){
        $dateFrom = $_GET['dateFrom'];
        };
        if(!empty($_GET['dateTo'])){
          $dateTo = $_GET['dateTo'];
        };
        if(!empty($_GET['criteria'])){
          $criteria = $_GET['criteria'];
        };
        if(!empty($_GET['search'])){
          $search = $_GET['search'];
        };

        $config = new config;
        $con = $config->con();
        $user = new User();
        $college1 = $user->data()->colleges;
        $college2 = explode(',',$college1);
        $college12 ="'".implode('\',\'',$college2)."'";
        $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `College` IN($college12)";


        if (!empty($search) && !empty($criteria)) {
          $sql .= "AND `$criteria` LIKE '%$search%'";
        }elseif (!empty($dateFrom) && !empty($dateTo)) {
          $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
        }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
        }

        $data = $con->prepare($sql);
        $data ->execute();
        $rows=$data-> fetchAll(PDO::FETCH_OBJ);

        $limit = 10;

        if (!isset($_GET['V1page'])) {
              $page = 1;
          }else{
              $page = $_GET['V1page'];
        }

        if(isset($_GET['V1page']) > 1){
          $_GET['Ppage'] = 1;
          $_GET['PRpage'] = 1;
          $_GET['V2page'] = 1;
          $_GET['Rpage'] = 1;
        }
        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);

        $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `College` IN($college12)";


        if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
          $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
        }elseif (!empty($search) && !empty($criteria)) {
          $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
        }elseif (!empty($dateFrom) && !empty($dateTo)) {
          $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
        }


        $data2 = $con->prepare($sql2);
        $data2 ->execute();
        $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


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

        foreach ($rows2 as $row) {
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
            echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
         echo '</tr>';
          }
        echo '</table>';
        echo '<ul class="pagination ml-2">';

          for ($p=1; $p <=$total_pages; $p++) {
            if (!empty($search) && !empty($criteria)) {
              echo '<li class="page-item" >';
              echo  '<a class= "page-link" href="?search='.$search.'&tab=forrelease2&submit=submitVerfied&criteria='.$criteria.'&V1page='.$p.'&submitVerified=Submit#verified">'.$p;
              echo  '</a>';
              echo '</li>';
            }elseif(!empty($dateFrom) && !empty($dateTo)) {
              echo '<li class="page-item" >';
              echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=forrelease2&submit=submitVerfied&dateTo='.$dateTo.'&V1page='.$p.'&submitVerfied=Submit#verified">'.$p;
              echo  '</a>';
              echo '</li>';
            }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              echo '<li class="page-item" >';
              echo  '<a class= "page-link" href="?tab=forrelease2&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&V1page='.$p.'&submitVerfied=Submit#printed&submit=submitVerfied">'.$p;
              echo  '</a>';
              echo '</li>';
            }
          }
          echo '</ul>';

        echo '
        <div class="container-fluid mt-4">
         <form class="" action="" method="get">
           <div class="row">
             <div class="col-sm">
               <label for="dateFrom">From:</label>
               <input  class="form-control" type="text" name="dateFrom" id="StartVerified"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
             </div>
             <div class="col-sm">
               <label for="dateTo">To:</label>
               <input  class="form-control" type="text" name="dateTo" id="EndVerified" placeholder="dd-mm-yyyy">
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
               <input type="submit" class="btn text-white" name="submitVerified" value="Submit" style="background-color:#DC65A1;">
             </div>
           </div>
         </form>
     </div>';


        }

        public function searchVerifiedAll(){

          if(!empty($_GET['dateFrom'])){
          $dateFrom = $_GET['dateFrom'];
          };
          if(!empty($_GET['dateTo'])){
            $dateTo = $_GET['dateTo'];
          };
          if(!empty($_GET['criteria'])){
            $criteria = $_GET['criteria'];
          };
          if(!empty($_GET['search'])){
            $search = $_GET['search'];
          };

          $config = new config;
          $con = $config->con();
          $user = new User();
          $college1 = $user->data()->colleges;
          $college2 = explode(',',$college1);
          $college12 ="'".implode('\',\'',$college2)."'";
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";


          if (!empty($search) && !empty($criteria)) {
            $sql .= "AND `$criteria` LIKE '%$search%'";
          }elseif (!empty($dateFrom) && !empty($dateTo)) {
            $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
          }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
          }

          $data = $con->prepare($sql);
          $data ->execute();
          $rows=$data-> fetchAll(PDO::FETCH_OBJ);

          $limit = 10;

          if (!isset($_GET['V2page'])) {
                $page = 1;
            }else{
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

          $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED'";


          if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
            $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
          }elseif (!empty($search) && !empty($criteria)) {
            $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
          }elseif (!empty($dateFrom) && !empty($dateTo)) {
            $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
          }


          $data2 = $con->prepare($sql2);
          $data2 ->execute();
          $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);


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

          foreach ($rows2 as $row) {
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
              echo '<td class="text-center"><a class="btn btn-outline-success" href="pending.php?released='.$row->id.'&id='.$user->data()->id.'&tab=forrelease2">Released </a></br></td>';
           echo '</tr>';
            }
          echo '</table>';
          echo '<ul class="pagination ml-2">';

            for ($p=1; $p <=$total_pages; $p++) {
              if (!empty($search) && !empty($criteria)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?search='.$search.'&tab=forrelease1&submit=submitVerfiedAll&criteria='.$criteria.'&V2page='.$p.'&submitVerifiedAll=Submit#verifiedall">'.$p;
                echo  '</a>';
                echo '</li>';
              }elseif(!empty($dateFrom) && !empty($dateTo)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=forrelease1&submit=submitVerfiedAll&dateTo='.$dateTo.'&V2page='.$p.'&submitVerfiedAll=Submit#verifiedall">'.$p;
                echo  '</a>';
                echo '</li>';
              }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                echo '<li class="page-item" >';
                echo  '<a class= "page-link" href="?tab=forrelease1&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&V2page='.$p.'&submitVerfiedAll=Submit#verifiedall&submit=submitVerfiedAll">'.$p;
                echo  '</a>';
                echo '</li>';
              }
            }
            echo '</ul>';

          echo '
          <div class="container-fluid mt-4">
           <form class="" action="" method="get">
             <div class="row">
               <div class="col-sm">
                 <label for="dateFrom">From:</label>
                 <input  class="form-control" type="text" name="dateFrom" id="StartVerifiedAll"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
               </div>
               <div class="col-sm">
                 <label for="dateTo">To:</label>
                 <input  class="form-control" type="text" name="dateTo" id="EndVerifiedAll" placeholder="dd-mm-yyyy">
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
                 <input type="submit" class="btn text-white" name="submitVerifiedAll" value="Submit" style="background-color:#DC65A1;">
               </div>
             </div>
           </form>
       </div>';

          }
          public function searchReleased(){

            if(!empty($_GET['dateFrom'])){
            $dateFrom = $_GET['dateFrom'];
            };
            if(!empty($_GET['dateTo'])){
              $dateTo = $_GET['dateTo'];
            };
            if(!empty($_GET['criteria'])){
              $criteria = $_GET['criteria'];
            };
            if(!empty($_GET['search'])){
              $search = $_GET['search'];
            };

            $config = new config;
            $view = new view;
            $con = $config->con();
            $user = new User();
            $college1 = $user->data()->colleges;
            $college2 = explode(',',$college1);
            $college12 ="'".implode('\',\'',$college2)."'";
            $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";


            if (!empty($search) && !empty($criteria)) {
              $sql .= "AND `$criteria` LIKE '%$search%'";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
            }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
            }

            $data = $con->prepare($sql);
            $data ->execute();
            $rows=$data-> fetchAll(PDO::FETCH_OBJ);
<<<<<<< HEAD
=======

>>>>>>> master
            $limit = 10;

            if (!isset($_GET['Rpage'])) {
                  $page = 1;
              }else{
                  $page = $_GET['Rpage'];
            }

            if(isset($_GET['Rpage']) > 1){
              $_GET['Ppage'] = 1;
              $_GET['PRpage'] = 1;
              $_GET['V2page'] = 1;
              $_GET['V1page'] = 1;
            }

            $start = ($page-1)*$limit;

            $total_results = $data->rowCount();
            $total_pages = ceil($total_results/$limit);

            // if ($dateFrom >= $dateTo) {
            //   $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' LIMIT $start,$limit";
            //   echo "<script type='text/javascript'>alert('Invalid Date');</script>";
            // }else {
              $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED'";
            // }


            if (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
              $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($search) && !empty($criteria)) {
              $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
            }elseif (!empty($dateFrom) && !empty($dateTo)) {
              $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
            }


            $data2 = $con->prepare($sql2);
            $data2 ->execute();
            $rows2 = $data2->fetchAll(PDO::FETCH_OBJ);

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
            foreach ($rows2 as $row) {
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
               echo '<td class="text-center" style="color:#DC65A1;">'.$view->getSname($row->releasedby).'</td>';
               echo '<td class="text-center" style="color:#DC65A1;">'.$row->remarks.'</br></td>';
              echo '</tr>';
          }
          echo '</table>';


            echo '<ul class="pagination ml-2">';

              for ($p=1; $p <=$total_pages; $p++) {
                if (!empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?search='.$search.'&tab=released&submit=submitReleased&criteria='.$criteria.'&Rpage='.$p.'&submitReleased=Submit#released">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif(!empty($dateFrom) && !empty($dateTo)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?dateFrom='.$dateFrom.'&tab=released&submit=submitReleased&dateTo='.$dateTo.'&Rpage='.$p.'&submitReleased=Submit#released">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }elseif (!empty($dateFrom) && !empty($dateTo) && !empty($search) && !empty($criteria)) {
                  echo '<li class="page-item" >';
                  echo  '<a class= "page-link" href="?tab=released&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria'.$criteria.'search='.$search.'&Rpage='.$p.'&submitReleased=Submit#released&submit=submitReleased">'.$p;
                  echo  '</a>';
                  echo '</li>';
                }
              }
              echo '</ul>';

            echo '
            <div class="container-fluid mt-4">
             <form class="" action="" method="get">
               <div class="row">
                 <div class="col-sm">
                   <label for="dateFrom">From:</label>
                   <input  class="form-control" type="text" name="dateFrom" id="StartReleased"  data-date-format="YYYY MMMM DD" placeholder="dd-mm-yyyy">
                 </div>
                 <div class="col-sm">
                   <label for="dateTo">To:</label>
                   <input  class="form-control" type="text" name="dateTo" id="EndReleased" placeholder="dd-mm-yyyy" >
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
                   <input type="submit" class="btn text-white" name="submitReleased" value="Submit" style="background-color:#DC65A1;">
                 </div>
               </div>
             </form>
         </div>';

         echo '
         <link rel="stylesheet" href="vendor/css/dateUIJquery.css">
         <script src="vendor/js/datepicker/config.js"></script>
         <script src="vendor/js/datepicker/JqueryDate.js"></script>
         <script src="vendor/js/datepicker/date.js"></script>
         ';
      }
  }
?>
