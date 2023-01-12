<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
	if ($corepage == $corepage) {
		$corepage = explode('.', $corepage);
		header('Location: index.php?page=' . $corepage[0]);
	}
}

if (isset($_POST['addstudent'])) {

	$name = $_POST['name'];
	$DOB = $_POST['dateofbirth'];
	$address = $_POST['address'];
	$pcontact = $_POST['pcontact'];
	$email = $_POST['email'];
	$class = $_POST['class'];
	$date = $_POST['enrollmentdate'];
	$health = $_POST['healthstatus'];



	$query = "INSERT INTO `student_info`(`name`,`Date of birth`,`class`, `city`, `pcontact`,`email`,`Enrollment`,`Health Status`) VALUES ('$name','$DOB','$class', '$address', '$pcontact','$email','$date','$health');";
	if (mysqli_query($db_con, $query)) {
		$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
	} else {
		$datainsert['inserterror'] = '<p style="color: red;">Student Not Inserted, please input the correct information!</p>';
	}
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Add Student<small class="text-warning"> Add New Student!</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Student</li>
	</ol>
</nav>

<div class="row">

	<div class="col-sm-6">
		<?php if (isset($datainsert)) { ?>
			<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
				<div class="toast-header">
					<strong class="mr-auto">Student Insert Alert</strong>
					<small><?php echo date('d-M-Y'); ?></small>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					<?php
					if (isset($datainsert['insertsucess'])) {
						echo $datainsert['insertsucess'];
					}
					if (isset($datainsert['inserterror'])) {
						echo $datainsert['inserterror'];
					}
					?>
				</div>
			</div>
		<?php } ?>
		<form enctype="multipart/form-data" method="POST" action="">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input name="name" type="text" class="form-control" id="name" value="<?= isset($name) ? $name : ''; ?>" required="">
			</div>

			<div class="form-group">
				<label for="dateofbirth">Date of Birth</label>
				<input name="dateofbirth" type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" id="dateofbirth" value="<?= isset($DOB) ? $DOB : ''; ?>" required="">
			</div>

			<div class="form-group">
				<label for="address">Student Address</label>
				<input name="address" type="text" value="<?= isset($address) ? $address : ''; ?>" class="form-control" id="address" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact NO</label>
				<input name="pcontact" type="text" class="form-control" id="pcontact" pattern="[0-9]+" value="<?= isset($pcontact) ? $pcontact : ''; ?>" placeholder="07........." required="">
			</div>
			<div class="form-group">
				<label for="email">Parent Email Address</label>
				<input name="email" type="text" class="form-control" id="email" value="<?= isset($email) ? $email : ''; ?>" required="">
			</div>
			<div class="form-group">
				<label for="enrollmentdate">Enrollment Date</label>
				<input name="enrollmentdate" type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" id="enrollmentdate" value="<?= isset($date) ? $date : ''; ?>" required="">
			</div>
			<div class="form-group">
				<label for="healthstatus">Health Conditions(if any)</label>
				<input name="healthstatus" type="text" class="form-control" id="healthstatus" value="<?= isset($health) ? $health : ''; ?>" placeholder="None" required="">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<select name="class" class="form-control" id="class" required="">
					<option>Select</option>
					<option value="Form 1">Form 1</option>
					<option value="Form 2">Form 2</option>
					<option value="Form 3">Form 3</option>
					<option value="Form 4">Form 4</option>
					<option value="Form 5">Form 5</option>
					<option value="Form 6">Form 6</option>
				</select>
			</div>

			<div class="form-group text-center">
				<input name="addstudent" value="Add Student" type="submit" class="btn btn-success">
			</div>
		</form>
	</div>
</div>