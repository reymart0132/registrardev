<?php
require_once 'config.php';
class Search extends config{

  public function searchPending(){

    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $criteria = $_POST['criteria'];
    $search = $_POST['search'];

      $config = new config;
      $con = $config->con();
      $user = new User();
      $college1 = $user->data()->colleges;
      $college2 = explode(',',$college1);
      $college12 ="'".implode('\',\'',$college2)."'";
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";

      if(empty($search)){
          $sql = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";
      }

      if (!empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_OBJ);

      // paginationqueryhere

      $limit = 1;
      if (!isset($_GET['page'])) {
            $page = 1;
        } else{
            $page = $_GET['page'];
      }

      $start = ($page-1)*$limit;

      $total_results = $data->rowCount();
      $total_pages = ceil($total_results/$limit);

      $sql2 = "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12)";

      if(empty($search)){
          $sql2 .= "SELECT * FROM `work` WHERE `remarks` = 'PENDING' AND `College` IN($college12) LIMIT $start,$limit";
      }

      if (!empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql2 .= "AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' LIMIT $start,$limit";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql2 .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%' LIMIT $start,$limit";
      }

      $data2 = $con->prepare($sql2);
      $data2->execute();
      $rows2=$data2-> fetchAll(PDO::FETCH_OBJ);

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
          echo '<td class="text-center"><a class="btn btn-outline-success" href="search-cartelduane.php?printed='.$row->id.'">Printed </a></br></td>';

            echo '</tr>';
        }
        echo '</table>';

        // pagination
        echo '<ul class="pagination ml-2">';
        for ($p=1; $p <=$total_pages; $p++) {
         echo '<li class="page-item" >';
         echo  '<a class= "page-link" href="?search='.$search.'&criteria='.$criteria.'&page='.$p.'">'.$p;
         echo  '</a>';
         echo '</li>';
        }
         echo '</ul>';

        // searchbarhere
        echo "<div class='container-fluid mt-4'>";
              echo " <form class='' action='' method='post'>";
                 echo "<div class='row'>";
                   echo "<div class='col-sm'>";
                    echo " <label for='dateFrom'>From:</label>";
                     echo "<input  class='form-control' type='date' name='dateFrom' value=''  data-date-format='YYYY MMMM DD'>";
                  echo " </div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='dateTo'>To:</label>";
                     echo "<input  class='form-control' type='date' name='dateTo' value='' >";
                   echo "</div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='criteria'>Filter By:</label>";
                     echo "<select class='form-control' name='criteria'>";
                       echo "<option value='LastName'>Last Name</option>";
                       echo "<option value='Course'>Course</option>";
                      echo " <option value='Status'>Status</option>";
                       echo "<option value='Applied_For'>Applied For</option>";
                      echo " <option value='purposes'>Reason For Applying</option>";
                    echo " </select>";
                  echo " </div>";
                   echo "<div class='col-sm mt-2'>";
                    echo " <label for='search'></label>";
                    echo " <input class='form-control' type='text' name='search' placeholder='Search Here..'/>";
                    echo "     </div>";
                  echo " <div class='col-sm mt-4 pt-2'>";
                  echo "   <label for='submit'></label>";
                echo "     <input type='submit' class='btn text-white' name='submitPending' value='Submit' style='background-color:#DC65A1;'>";
                echo "   </div>";
                echo " </div>";
              echo " </form>";
           echo "</div>";

  }

  public function searchForSignature(){

    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $criteria = $_POST['criteria'];
    $search = $_POST['search'];

      $config = new config;
      $con = $config->con();
      $user = new User();
      $college1 = $user->data()->colleges;
      $college2 = explode(',',$college1);
      $college12 ="'".implode('\',\'',$college2)."'";
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'PRINTED' AND `College` IN($college12)";

      if (!empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_OBJ);

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
          echo '<td class="text-center"><a class="btn btn-outline-success" href="search-cartelduane.php?verified='.$row->id.'">Verified </a></br></td>';

            echo '</tr>';
        }
        echo '</table>';
        // searchbarhere
        echo "<div class='container-fluid mt-4'>";
              echo " <form class='' action='' method='post'>";
                 echo "<div class='row'>";
                   echo "<div class='col-sm'>";
                    echo " <label for='dateFrom'>From:</label>";
                     echo "<input  class='form-control' type='date' name='dateFrom' value=''  data-date-format='YYYY MMMM DD'>";
                  echo " </div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='dateTo'>To:</label>";
                     echo "<input  class='form-control' type='date' name='dateTo' value='' >";
                   echo "</div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='criteria'>Filter By:</label>";
                     echo "<select class='form-control' name='criteria'>";
                       echo "<option value='LastName'>Last Name</option>";
                       echo "<option value='Course'>Course</option>";
                      echo " <option value='Status'>Status</option>";
                       echo "<option value='Applied_For'>Applied For</option>";
                      echo " <option value='purposes'>Reason For Applying</option>";
                    echo " </select>";
                  echo " </div>";
                   echo "<div class='col-sm mt-2'>";
                    echo " <label for='search'></label>";
                    echo " <input class='form-control' type='text' name='search' placeholder='Search Here..'/>";
                    echo "     </div>";
                  echo " <div class='col-sm mt-4 pt-2'>";
                  echo "   <label for='submit'></label>";
                echo "     <input type='submit' class='btn text-white' name='submitPrinted' value='Submit' style='background-color:#DC65A1;'>";
                echo "   </div>";
                echo " </div>";
              echo " </form>";
           echo "</div>";

  }
  public function searchForRelease(){

    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $criteria = $_POST['criteria'];
    $search = $_POST['search'];

      $config = new config;
      $con = $config->con();
      $user = new User();
      $college1 = $user->data()->colleges;
      $college2 = explode(',',$college1);
      $college12 ="'".implode('\',\'',$college2)."'";
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'VERIFIED' AND `College` IN($college12)";

      if (!empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_OBJ);

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
          echo '<td class="text-center"><a class="btn btn-outline-success" href="search-cartelduane.php?released='.$row->id.'">Released </a></br></td>';

            echo '</tr>';
        }
          echo '</table>';
        // searchbarhere
          echo "<div class='container-fluid mt-4'>";
              echo " <form class='' action='' method='post'>";
                 echo "<div class='row'>";
                   echo "<div class='col-sm'>";
                    echo " <label for='dateFrom'>From:</label>";
                     echo "<input  class='form-control' type='date' name='dateFrom' value=''  data-date-format='YYYY MMMM DD'>";
                  echo " </div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='dateTo'>To:</label>";
                     echo "<input  class='form-control' type='date' name='dateTo' value='' >";
                   echo "</div>";
                   echo "<div class='col-sm'>";
                     echo "<label for='criteria'>Filter By:</label>";
                     echo "<select class='form-control' name='criteria'>";
                       echo "<option value='LastName'>Last Name</option>";
                       echo "<option value='Course'>Course</option>";
                      echo " <option value='Status'>Status</option>";
                       echo "<option value='Applied_For'>Applied For</option>";
                      echo " <option value='purposes'>Reason For Applying</option>";
                    echo " </select>";
                  echo " </div>";
                   echo "<div class='col-sm mt-2'>";
                    echo " <label for='search'></label>";
                    echo " <input class='form-control' type='text' name='search' placeholder='Search Here..'/>";
                    echo "     </div>";
                  echo " <div class='col-sm mt-4 pt-2'>";
                  echo "   <label for='submit'></label>";
                echo "     <input type='submit' class='btn text-white' name='submitReleased' value='Submit' style='background-color:#DC65A1;'>";
                echo "   </div>";
                echo " </div>";
              echo " </form>";
           echo "</div>";

  }
  public function searchReleased(){

    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $criteria = $_POST['criteria'];
    $search = $_POST['search'];

      $config = new config;
      $con = $config->con();
      $user = new User();
      $college1 = $user->data()->colleges;
      $college2 = explode(',',$college1);
      $college12 ="'".implode('\',\'',$college2)."'";
      $sql = "SELECT * FROM `work` WHERE `remarks` = 'RELEASED' AND `College` IN($college12)";

      if (!empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND `$criteria` LIKE '%$search%'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo'";
      }

      if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo']) && !empty($_POST['search']) && !empty($_POST['criteria'])) {
        $sql .= "AND Date_App >= '$dateFrom' AND Date_App <= '$dateTo' AND `$criteria` LIKE '%$search%'";
      }

      $data = $con->prepare($sql);
      $data ->execute();
      $rows=$data-> fetchAll(PDO::FETCH_OBJ);

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
                    echo '<td class="text-center" style="color:#DC65A1;">'.$row->Date_Grad.'</td>';
                    echo '<td class="text-center" style="color:#DC65A1;">'.$row->Applied_For.'</td>';
                    echo '<td class="text-center" style="color:#DC65A1;">'.$row->purposes.'</td>';
                    echo '<td class="text-center" style="color:#DC65A1;">'.$row->Due_Date.'</td>';
                    echo '<td class="text-center" style="color:#DC65A1;">'.$row->remarks.'</br></td>';


                    echo '</tr>';
                  }
                  echo '</table>';
                  echo "<div class='container-fluid mt-4'>";
                        echo " <form class='' action='' method='post'>";
                           echo "<div class='row'>";
                             echo "<div class='col-sm'>";
                              echo " <label for='dateFrom'>From:</label>";
                               echo "<input  class='form-control' type='date' name='dateFrom' value=''  data-date-format='YYYY MMMM DD'>";
                            echo " </div>";
                             echo "<div class='col-sm'>";
                               echo "<label for='dateTo'>To:</label>";
                               echo "<input  class='form-control' type='date' name='dateTo' value='' >";
                             echo "</div>";
                             echo "<div class='col-sm'>";
                               echo "<label for='criteria'>Filter By:</label>";
                               echo "<select class='form-control' name='criteria'>";
                                 echo "<option value='LastName'>Last Name</option>";
                                 echo "<option value='Course'>Course</option>";
                                echo " <option value='Status'>Status</option>";
                                 echo "<option value='Applied_For'>Applied For</option>";
                                echo " <option value='purposes'>Reason For Applying</option>";
                              echo " </select>";
                            echo " </div>";
                             echo "<div class='col-sm mt-2'>";
                              echo " <label for='search'></label>";
                              echo " <input class='form-control' type='text' name='search' placeholder='Search Here..'/>";
                              echo "     </div>";
                            echo " <div class='col-sm mt-4 pt-2'>";
                            echo "   <label for='submit'></label>";
                          echo "     <input type='submit' class='btn text-white' name='submitReleased' value='Submit' style='background-color:#DC65A1;'>";
                          echo "   </div>";
                          echo " </div>";
                        echo " </form>";
                echo "</div>";
  }
}
?>
