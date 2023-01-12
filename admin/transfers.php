<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
	if ($corepage == $corepage) {
		$corepage = explode('.', $corepage);
		header('Location: index.php?page=' . $corepage[0]);
	}
}

$id = base64_decode($_GET['id']);



?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Student Transfers<small class="text-warning"> Check Info</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>

	</ol>
</nav>

<?php
if (isset($id)) {
	$query = "SELECT `id`, `name`, `Date of birth`, `class`, `city`, `pcontact`,`email`, `photo`, `Enrollment`, `datetime`, `Health Status` FROM `student_info` WHERE `id`=$id";
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
				<label for="dateofbirth">Date of Birth</label>
				<input name="dateofbirth" type="text" class="form-control" readonly="readonly" placeholder="dd/mm/yyyy" id="dateofbirth" value="<?php echo $row['Date of birth']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="address">Student Address</label>
				<input name="address" type="text" class="form-control" id="address" value="<?php echo $row['city']; ?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact NO</label>
				<input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="email">Parent Email Address</label>
				<input name="email" type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="enrollmentdate">Enrollment Date</label>
				<input name="enrollmentdate" type="text" class="form-control" id="enrollmentdate" value="<?php echo $row['Enrollment']; ?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="healthstatus">Health Conditions</label>
				<input name="healthstatus" type="text" class="form-control" id="healthstatus" value="<?php echo $row['Health Status']; ?>" readonly="readonly">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<input name="class" class="form-control" id="class" value="<?php echo $row['class']; ?>" readonly="readonly">

			</div>

			<div class="form-group text-center">
				<a class="btn btn-xs btn-success" href="FPDF\transfer_req.php?id=<?php echo $row['id']; ?>">Request Form</a>

				<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Transfer</a>
			</div>
		</form>
	</div>
</div>