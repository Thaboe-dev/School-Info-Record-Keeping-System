<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'user_home.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: user_home.php?page=' . $corepage[0]);
    }
}


$id = base64_decode($_GET['id']);

if (isset($_POST['updatestudentfees'])) {
    $amount = $_POST['amount'];
    $receipt = $_POST['receiptno'];

    $fees = 300;
    $owing = $fees - $amount;
    if ($amount < $fees) {

        $status = 'owing';
    } else {
        $status = 'paid';
    }

    $query = "UPDATE `fees_records` SET `amount paid($)`='$amount',`ReceiptNo`='$receipt',`amount owing($)`='$owing',`status`='$status' WHERE `id`= $id";
    if (mysqli_query($db_con, $query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
        if (!empty($_FILES['photo']['name'])) {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo);
            unlink('images/' . $oldPhoto);
        }
        header('Location: user_home.php?page=user_fees&edit=success');
    } else {
        
        echo '<small class="text-danger">Receipt Number entered has previously been captured</small>';
    }

    
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Edit Student Fees Record<small class="text-warning"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="user_home.php">Dashboard </a></li>
        
    </ol>
</nav>

<?php
if (isset($id)) {
    $query = "SELECT `id`, `name`, `class`, `amount paid($)`, `amount owing($)`,`ReceiptNo` FROM `fees_records` WHERE `id`=$id";
    $result = mysqli_query($db_con, $query);
    $row = mysqli_fetch_array($result);
}
?>
<div class="row">
    <div class="col-sm-6">
        <form enctype="multipart/form-data" method="POST" action="">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input name="class" type="text" class="form-control" id="class" value="<?php echo $row['class']; ?>" required="" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="amount">Amount Paid</label>
                <input name="amount" type="number" class="form-control" id="amount" value="<?php echo $row['amount paid($)']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="receiptno">Receipt Number</label>
                <input name="receiptno" type="text" class="form-control" id="receiptno" required="">
            </div>

            <div class="form-group text-center">
                <input name="updatestudentfees" value="Update Record" type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>