<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Brelion College</title>
</head>

<body>
  <div class="container"><br>
    <a class="btn btn-success float-right" href="admin/login.php">Admin Login</a>
    <h1 class="text-center">Brelion College Info Management System</h1><br>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <form method="POST">
          <table class="text-center infotable">
            <tr>
              <th colspan="2">
                <p class="text-center">Student Information(Quick Search)</p>
              </th>
            </tr>
            <tr>
              <td>
                <p>Choose Class</p>
              </td>
              <td>
                <select class="form-control" name="choose">
                  <option value="">
                    Select
                  </option>
                  <option value="Form 1">
                    Form 1
                  </option>
                  <option value="Form 2">
                    Form 2
                  </option>
                  <option value="Form 3">
                    Form 3
                  </option>
                  <option value="Form 4">
                    Form 4
                  </option>
                  <option value="Form 5">
                    Form 5
                  </option>
                  <option value="Form 6">
                    Form 6
                  </option>
                </select>
              </td>
            </tr>

            <tr>
              <td>
                <p><label for="name">Full Name</label></p>
              </td>
              <td>
                <input class="form-control" type="text" id="name" placeholder="Name Surname" name="name">
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">
                <input class="btn btn-success" type="submit" name="showinfo">
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <br>
    <?php if (isset($_POST['showinfo'])) {
      $choose = $_POST['choose'];
      $name = $_POST['name'];
      if (!empty($choose && $name)) {
        $query = mysqli_query($db_con, "SELECT * FROM `student_info` WHERE `name`='$name' AND `class`='$choose'");
        if (!empty($row = mysqli_fetch_array($query))) {
          if ($row['name'] == $name && $choose == $row['class']) {

            $stname = $row['name'];
            $stclass = $row['class'];
            $city = $row['city'];
            $photo = $row['photo'];
            $pcontact = $row['pcontact'];
    ?>
            <div class="row">
              <div class="col-sm-6 offset-sm-3">
                <table class="table table-bordered">
                  <tr>
                    <td rowspan="5">
                      <h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo) ? $photo : ''; ?>" width="250px">
                    </td>
                    <td>Name</td>
                    <td><?= isset($stname) ? $stname : ''; ?></td>
                  </tr>

                  <tr>
                    <td>Class</td>
                    <td><?= isset($stclass) ? $stclass : ''; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?= isset($city) ? $city : ''; ?></td>
                  </tr>
                  <tr>
                    <td>Parent Contact Number</td>
                    <td><?= isset($pcontact) ? $pcontact : ''; ?></td>
                  </tr>
                </table>
              </div>
            </div>
        <?php
          } else {
            echo '<p style="color:red;">Please Input Valid Reg No</p>';
          }
        } else {
          echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
        }
      } else { ?>
        <script type="text/javascript">
          alert("Data Not Found!");
        </script>
    <?php }
    }; ?>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>