<?php
session_start();

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$eid = mysqli_real_escape_string($con, $_POST['eid']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM clerk WHERE eid = '" . $eid. "' and password = '" . $password . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['cid'] = $row['id'];
		$_SESSION['eid'] = $row['eid'];
		$_SESSION['ctype'] = $row['type'];
		header("Location: process-case.php");
	} else {
		$errormsg = "Incorrect Login Info!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Login Script</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Online Business Application</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login-clerk.php">Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="clerkloginform">
				<fieldset>
					<legend>Clerk Login</legend>
					
					<div class="form-group">
						<label for="name">Employee ID</label>
						<input type="text" name="eid" placeholder="Your Employee ID" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		<p>Do not attempt to login from this page, if you are not one of our employees.</p>
		<p><a href="index.php">Customer Portal Here</a></p>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
