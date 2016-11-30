<?php
session_start();

if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['name'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>