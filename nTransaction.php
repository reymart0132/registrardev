<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
  <link href="vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
  <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

</head>
<body>
        <nav class="navbar navbar-dark bg-white shadow-sm">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="resource/img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">New Transaction</h1>
                </div>
            </div>
            <form action="" method="POST">
            <div class="row">
                <table class="table ">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-5">
                                      <label for="studentN">Student Number(Optional)</label>
                                      <input type="text" class="form-control" id="studentN" name="studentN" aria-describedby="emailHelp" placeholder="Enter Student Number">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Lastname">Lastname</label>
                                      <input type="text" class="form-control" id="Lastname" name="Lastname" aria-describedby="emailHelp" placeholder="Enter Lastname" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Firstname">Firstname</label>
                                      <input type="text" class="form-control" id="Firstname" name="Firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Middlename">Middlename</label>
                                      <input type="text" class="form-control" id="Middlename" name="Middlename" aria-describedby="emailHelp" placeholder="Enter Middlename" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="Course" >Course</label>
                                          <select id="Course" name="Course" class="selectpicker form-control" data-live-search="true">
                                            <option data-tokens="BSIT" value="BSIT">BSIT</option>
                                            <option data-tokens="TC" value="BSBF">BSC Banking and Finance</option>
                                            <option data-tokens="Authentication" value="BSITTM">BSITTM</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="ContactNumber">Contact Number</label>
                                      <input type="text" class="form-control" id="ContactNumber" name="ContactNumber" aria-describedby="emailHelp" placeholder="Enter Contact Number" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="ContactNumber">Status</label>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="Status" id="Graduate" value="Graduate" checked>
                                              <label class="form-check-label" for="Graduate">Graduate</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="Status" id="Undergraduate" value="Undergraduate">
                                              <label class="form-check-label" for="Undergraduate">UnderGraduate</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="request" >Requesting for:</label>
                                          <select id="request" name="request[]" class="selectpicker form-control" data-live-search="true" multiple>
                                            <option data-tokens="TOR">TOR</option>
                                            <option data-tokens="TC">TC</option>
                                            <option data-tokens="Authentication">Authentication</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Purpose" >Reason for Requesting</label>
                                          <select id="Purpose" name="Purpose" class="selectpicker form-control" data-live-search="true" >
                                            <option data-tokens="abroad">Abroad</option>
                                            <option data-tokens="reference">Reference</option>
                                            <option data-tokens="Board Exam">Board Exam</option>
                                          </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group  col-4">
                                     <label for="request" >Date Requested</label>
                                     <input type="date" name="dr" min="1000-01-01"
                                            max="3000-12-31" class="form-control " value="<?php $now = new DateTime();echo $now->format('Y-m-d') ?>" required>
                                    </div>
                                    <div class="form-group  col-4">
                                     <label for="request" >Date Due</label>
                                     <input type="date" name="dd" min="1000-01-01"
                                            max="3000-12-31" class="form-control" value="<?php $now = $now->add(new DateInterval('P11D'));echo $now->format('Y-m-d');?>"required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label  >&nbsp;</label>
                                     <input type="submit" value="Submit Request" class=" form-control btn btn-dark" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                </table>
            </div>
        </form>
        </div>
</body>

<footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom">
  <div class="container text-center">
      <div class="row">
          <div class="col col-sm-5 text-left">
              <small>Copyright &copy;Centro Escolar University     Office of the Registrar 2019</small>
          </div>
          <div class="col text-right">
              <small>Created by: Reymart Bolasoc, Amelia Valencia , James Mangalile, Kenneth De Leon , Pamela Reyes , Ellen Mijares</small>
          </div>
      </div>
  </div>
</footer>
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/popper.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
