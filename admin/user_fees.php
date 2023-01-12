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

<h1><a href="user_home.php"><i class="fas fa-tachometer-alt"></i>Fees</a> <small>Satistics Overview</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-sort-numeric-desc"></i> Overall Satistics</li>
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
                        <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php
                                                                                        $stat = 'owing';
                                                                                        $stu = mysqli_query($db_con, "SELECT * FROM `fees_records` WHERE `status`='$stat';");
                                                                                        $stu = mysqli_num_rows($stu);
                                                                                        echo $stu; ?></span></div>
                        <div class="clearfix"></div>
                        <div class="float-sm-right">Debtors</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item-primary list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-sm-8">
                        <p class="">All Students Owing</p>
                    </div>
                    <div class="col-sm-4">
                        <a href="user_debtors.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <div class="col-sm-8">
                        <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php
                                                                                        $stat = 'paid';
                                                                                        $tusers = mysqli_query($db_con, "SELECT * FROM `fees_records` WHERE `status`='$stat';");
                                                                                        $tusers = mysqli_num_rows($tusers);
                                                                                        echo $tusers; ?></span></div>
                        <div class="clearfix"></div>
                        <div class="float-sm-right">Cleared</div>
                    </div>
                </div>
            </div>
            <div class="list-group-item-primary list-group-item list-group-item-action">
                <a href="user_home.php?page=user_cleared">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="">All Sudents Cleared</p>
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
<h3>All Students</h3>
<table class="table  table-striped table-hover table-bordered" id="data">
    <thead class="thead-dark">
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Amount Paid($)</th>
            <th scope="col">Amount Owing($)</th>
            <th scope="col">Receipt No</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($db_con, 'SELECT * FROM `fees_records`;');
        $i = 1;
        while ($result = mysqli_fetch_array($query)) { ?>
            <tr>
                <?php
                echo '<td>' . $i . '</td>
          <td>' . ucwords($result['name']) . '</td>
          <td>' . $result['class'] . '</td>
          <td>' . $result['amount paid($)'] . '</td>
          <td>' . ucwords($result['amount owing($)']) . '</td>
          <td>' . $result['ReceiptNo'] . '</td>
          <td>' . $result['status'] . '</td>
          <td>
            <a class="btn btn-xs btn-warning" href="user_home.php?page=usereditfees&id=' . base64_encode($result['id']) .  '">
              <i class="fa fa-edit"></i></a>
          '; ?>
            </tr>
        <?php $i++;
        } ?>

    </tbody>
</table>