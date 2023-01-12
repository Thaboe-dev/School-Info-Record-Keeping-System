<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'user_home.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: user_home.php?page=' . $corepage[0]);
    }
}
?>

<h1><a href="user_home.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a> <small>Satistics Overview</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Dashboard</li>
    </ol>
</nav>

<div class="row student">
    <div class="col-sm-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <div class="col-sm-8">
                        <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $stu = mysqli_query($db_con, 'SELECT * FROM `student_info`');
                                                                                        $stu = mysqli_num_rows($stu);
                                                                                        echo $stu; ?></span></div>
                        <div class="clearfix"></div>
                        <div class="float-sm-right">Total Students</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item-primary list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-sm-8">
                        <p class="">All Students</p>
                    </div>
                    <div class="col-sm-4">
                        <a href="user-all-student.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">
                <div class="row">
                    <?php $usernameshow = $_SESSION['user_login'];
                    $userspro = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username`='$usernameshow';");
                    $userrow = mysqli_fetch_array($userspro); ?>
                    <div class="col-sm-6">

                        <div style="font-size: 20px"><?php echo ucwords($userrow['name']); ?></div>
                    </div>
                    <div class="col-sm-6">

                        <div class="clearfix"></div>
                        <div class="float-sm-right">Welcome!</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item-primary list-group-item list-group-item-action">
                <a href="user_home.php?page=user-profile">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="">Your Profile</p>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-arrow-right float-sm-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<hr>
<h3>New Students</h3>
<table class="table  table-striped table-hover table-bordered" id="data">
    <thead class="thead-dark">
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Class</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($db_con, 'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
        $i = 1;
        while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <?php
                echo '<td>' . $i . '</td>
          <td>' . ucwords($result['name']) . '</td>
          <td>' . $result['Date of birth'] . '</td>
          <td>' . $result['class'] . '</td>
          <td>' . ucwords($result['city']) . '</td>
          <td>' . $result['pcontact'] . '</td>'; ?>
            </tr>
        <?php $i++;
        } ?>

    </tbody>
</table>