<?php
$name = $_GET['fullname'];
$college = $_GET['college'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Portal</title>
  <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap.min.css">
  <link href="../../vendor/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="../css/styles.css">
  <link rel="stylesheet" type="text/css"  href="../../vendor/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
        <nav class="navbar navbar-dark bg-white shadow-sm">
          <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
            <img src="../img/logo.jpg" height="70" class="d-inline-block align-top"
              alt="mdb logo"><h3 class="ib">
          </a>
             <a href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f ceucolor"></i></a>
             <a href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram ceucolor"></i></a>
             <a href="https://twitter.com/ceumalolos"><i class="fab fa-twitter ceucolor"></i></a>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center"></h1>
                </div>
            </div>
            <form action="noscholar_output.php" method="POST">
            <div class="row">
                <table class="table ">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-6">
                                      <label for="studentN">Student Name</label>
                                      <input type="text" class="form-control" id="studentN" name="studentN" aria-describedby="emailHelp" placeholder="Enter Student"  value="<?php echo $name; ?>">
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="college">College</label>
                                      <input type="text" class="form-control" id="college" name="college" aria-describedby="emailHelp" placeholder="Enter college" value="<?php echo $college; ?>" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-6">
                                      <label for="Date">Date</label>
                                      <input type="text" class="form-control" id="date" name="date" aria-describedby="emailHelp" value="<?php echo date("d-m-Y"); ?>" required>
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="course">Course</label>
                                      <input type="text" class="form-control" id="date" name="course" aria-describedby="emailHelp" value="<?php echo $_GET['course']; ?>" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="level">Year Level</label>
                                        <select id="request" name="level" class="selectpicker form-control" data-live-search="true" required>
                                          <option>first year</option>
                                          <option>second year</option>
                                          <option>third year</option>
                                          <option>fourth year</option>
                                          <option>fifth year</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="DateGraduated">School Year</label>
                                        <select id="request" name="schoolyear" class="selectpicker form-control" data-live-search="true" required>
                                          <?php
                                          echo "<option>".date("Y")." - ".date("Y",strtotime('+1 year'))."</option>";
                                          echo "<option>".date("Y",strtotime('-1 year'))." - ".date("Y")."</option>";
                                          ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="semester">Semester</label>
                                        <select id="request" name="semester" class="selectpicker form-control" data-live-search="true" required>
                                          <option>1st semester</option>
                                          <option>2nd semester</option>
                                          <option>3rd semester</option>
                                          <option>Summer</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="form-group col-5">
                                        <label  >&nbsp;</label>
                                     <input type="submit" value="Submit Request" class=" form-control btn btn-primary" />
                                    </div>
                                    <div class="form-group col-7">
                                        <label  >&nbsp;</label>
                                        <small id="emailHelp" class="form-text text-muted">In compliance to<b> DATA PRIVACY ACT of 2012 (<em>R.A. No. 10173, Ch. 1 Sec 2)</em></b>.
                                            <p>If Client cannot come personally, the following are the requirements of Authorized Person:</p>
                                            <p class="mb-0">1. Authorization Letter</p>
                                            <p class="mb-0">2. ID of the Applicant and Authorized person with specimen signature(Xerox Copy)</p>
                                        </small>
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
    <script src="../js/addtextbox.js"></script>
    <script src="../../vendor/js/jquery.js"></script>
    <script src="../../vendor/js/popper.js"></script>
    <script src="../../vendor/js/bootstrap.min.js"></script>
    <script src="../../vendor/js/bootstrap-select.min.js"></script>
</body>
</html>
