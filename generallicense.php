<?php
session_start();
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;
$user_check = (int) $_SESSION['user_id'];

$uid = (int) $_SESSION['user_id'];
$type = 1;
$typedes ="General";
$time = date("Y-m-d H:i:s");


//check if form is submitted
if (isset($_POST['applycase'])) {
	$location = mysqli_real_escape_string($con, $_POST['location']);
	$postal = mysqli_real_escape_string($con, $_POST['postal']);
	$uid = mysqli_real_escape_string($con, $uid);
    $type = mysqli_real_escape_string($con, $type);
    $typedes = mysqli_real_escape_string($con, $typedes);
    $time = mysqli_real_escape_string($con, $time);	
	
	//name can contain only alpha characters and space /^[A-Za-z0-9-_",'\s]+$/
	if (!preg_match("/^[a-zA-Z0-9-_\",\'\s ]+$/",$location)) {
		$error = true;
		$location_error = "Location can not contain special symbol @#^%";
	}
	if (!preg_match("/^[a-zA-Z0-9-_\",\'\s ]+$/",$postal)) {
		$error = true;
		$postal_error = "Location can not contain special symbol @#^%";
	}	
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO cases(uid,time,type,typedes,location,postal) VALUES('" . $uid . "', '" . $time . "', '" . $type . "', '" . $typedes . "', '" . $location . "', '" . $postal . "')")) {
			$successmsg = "Information Uploaded! <a href='popform.php'>Upload</a>";
		} else {
			$errormsg = "Error in Inserting";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Business Application </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Online Business Application</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"> Signed in as <?php echo $_SESSION['user_name']; ?></p></li>
<!-- fixing sth here-->				
				<li><a href="form1.php">New Application</a></li>
				<li><a href="viewapplication.php">My Application</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<nav class="navbar navbar-fixed-bottom" role="navigation">
	<div class="container-fluid">
		<div class="navbar-footer">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="https://www.ontario.ca/page/government">Portal to: Government of Ontario</a>
			<img src="images/logo.png" alt="Logo of GOO" align="right" height="50" width="150">
		</div>
		
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="applycase">
				<fieldset>
					<legend>General Application Form</legend>

					<div class="form-group">
						<label for="name">Location</label>
						<input type="text" name="location" placeholder="Full address of your business location" required value="<?php if($error) echo $location; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($location_error)) echo $location_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Postal Code</label>
						<input type="text" name="postal" placeholder="7 char max" required value="<?php if($error) echo $postal; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($postal_error)) echo $postal_error; ?></span>
					</div>
					
					<div class="form-group">
						<input type="submit" name="applycase" value="Apply" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
			<a href="List of license.php">List of Licenses and Eligibility </a>
		</div>
	</div>
</div>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>