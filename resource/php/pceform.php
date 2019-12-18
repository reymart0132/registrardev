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
                    <h1 class="text-center">New Permit to Cross Enroll</h1>
                </div>
            </div>
            <form action="pce.php" method="GET">
            <div class="row">
                <table class="table ">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-6">
                                      <label for="studentN">Student Name</label>
                                      <input type="text" class="form-control" id="studentN" name="studentN" aria-describedby="emailHelp" placeholder="Enter Student" value="<?php echo $name; ?>">
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="studentN">School</label>
                                      <input type="text" class="form-control" id="studentN" name="school" aria-describedby="emailHelp" placeholder="Enter School" required>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-4">
                                      <label for="College">College</label>
                                      <input type="text" class="form-control" id="College" name="college" aria-describedby="emailHelp" placeholder="Enter College" value="<?php echo $college; ?>" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="College">Course</label>
                                      <input type="text" class="form-control" id="College" name="college" aria-describedby="emailHelp" placeholder="Enter College" value="<?php echo $_GET['course']; ?>" required>
                                    </div>
                                    <div class="form-group col-4">
                                      <label for="Semester">Semester</label>
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
                                <div class="row">
                                    <div class="form-group col-3">
                                      <label for="Date">Date</label>
                                      <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="form-group col-5">
                                      <label for="city">City</label>
                                      <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="Enter City" required>
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
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <button class="btn btn-primary" type="button"  id="add">Add Subject</button>
                                        <button class="btn btn-danger"  type="button" id="remove">Remove Subject</button>
                                    </div>
                                    <div class="form-group col-12">
                                      <div class="row">
                                          <!-- <tr>
                                              <td>
                                                  <input type='text' class='form-control' name='subjects[]' placeholder='Enter Subject' required >
                                                  <input type='number' class='form-control' name='units[]' placeholder='Enter Number of units' required>
                                              </td>
                                          </tr> -->
                                          <div id='TextBoxesGroup'class="col-7">
                                        	<div id="TextBoxDiv1" >
                                        		<label>Subject #1 : </label><input class='form-control' name='subjects[]' type='textbox' id='textbox1'value="" placeholder="Enter Subject" required>
                                        	</div>
                                        </div>
                                          <div id='TextBoxesGroup2'class="col-2">
                                        	<div id="TextBoxDiv1" >
                                        		<label>Number of Units: </label><input class='form-control' name= 'units[]' type='number' maxlength="1" id='textbox1'value="" placeholder="Enter Units" required>
                                        	</div>
                                        </div>

                                      </div>
                                    </div>
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
                                      <a  class="form-control btn btn-danger mt-2" href="../../view_pending_requests.php"/>Cancel</a>
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
                                <!--  -->

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
