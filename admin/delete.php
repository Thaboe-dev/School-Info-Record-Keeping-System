<?php
session_start();
require_once 'C:\xampp\htdocs\student_enrollment\admin\db_con.php';

if (isset($_SESSION['user_login'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM `student_info` WHERE `id` = '$id'";
	if (mysqli_query($db_con, $query)) {
		header('Location: index.php?page=all-student&delete=success');
	} else {
		header('Location: index.php?page=all-student&delete=error');
	}
} else {
	header('Location: login.php');
}
