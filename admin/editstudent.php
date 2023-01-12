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
$oldPhoto = base64_decode($_GET['photo']);

if (isset($_POST['updatestudent'])) {
	$name = $_POST['name'];
	$dob = $_POST['dateofbirth'];
	$address = $_POST['address'];
	$pcontact = $_POST['pcontact'];
	$email = $_POST['email'];
	$class = $_POST['class'];
	$date = $_POST['enrollmentdate'];
	$health = $_POST['healthstatus'];

	if (!empty($_FILES['photo']['name'])) {
		$photo = $_FILES['photo']['name'];
		$photo = explode('.', $photo);
		$photo = end($photo);
		$photo = $roll . date('Y-m-d-m-s') . '.' . $photo;
	} else {
		$photo = $oldPhoto;
	}


	$query = "UPDATE `student_info` SET `name`='$name',`Date of birth`='$dob',`class`='$class',`city`='$address',`pcontact`='$pcontact',`email`='$email',`photo`='$photo',`Enrollment`='$date',`Health Status`='$health' WHERE `id`= $id";
	if (mysqli_query($db_con, $query)) {
		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo);
			unlink('images/' . $oldPhoto);
		}
		header('Location: index.php?page=all-student&edit=success');
	} else {
		header('Location: index.php?page=all-student&edit=error');
	}
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Edit Student Information<small class="text-warning"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Student </a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Student</li>
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
				<input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="dateofbirth">Date of Birth</label>
				<input name="dateofbirth" type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" id="dateofbirth" value="<?php echo $row['Date of birth']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="address">Student Address</label>
				<input name="address" type="text" class="form-control" id="address" value="<?php echo $row['city']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact NO</label>
				<input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>" pattern="[0-9]+" placeholder="07........." required="">
			</div>
			<div class="form-group">
				<label for="email">Parent Email Address</label>
				<input name="email" type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="enrollmentdate">Enrollment Date</label>
				<input name="enrollmentdate" type="text" class="form-control" id="enrollmentdate" value="<?php echo $row['Enrollment']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="healthstatus">Health Conditions</label>
				<input name="healthstatus" type="text" class="form-control" id="healthstatus" value="<?php echo $row['Health Status']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<select name="class" class="form-control" id="class" required="" value="">
					<option>Select</option>
					<option value="Form 1" <?= $row['class'] == 'Form 1' ? 'selected' : '' ?>>Form 1</option>
					<option value="Form 2" <?= $row['class'] == 'Form 2' ? 'selected' : '' ?>>Form 2</option>
					<option value="Form 3" <?= $row['class'] == 'Form 3' ? 'selected' : '' ?>>Form 3</option>
					<option value="Form 4" <?= $row['class'] == 'Form 4' ? 'selected' : '' ?>>Form 4</option>
					<option value="Form 5" <?= $row['class'] == 'Form 5' ? 'selected' : '' ?>>Form 5</option>
					<option value="Form 6" <?= $row['class'] == 'Form 6' ? 'selected' : '' ?>>Form 6</option>
				</select>
			</div>
			<div class="form-group">
				<label for="photo">Student Photo</label>
				<input name="photo" type="file" class="form-control" id="photo">
			</div>
			<div class="form-group text-center">
				<input name="updatestudent" value="Update Student" type="submit" class="btn btn-success">
			</div>
		</form>
	</div>
</div>