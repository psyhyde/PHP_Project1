<?php
session_start();

if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;
//assign 
$uid = $_SESSION['user_id'];
$time = date("Y-m-d H:i:s");
$status = 0;

//check if form is submitted
if (isset($_POST['submitform'])) {
	$uid = mysqli_real_escape_string($con, $_POST['uid']);
	$type = mysqli_real_escape_string($con, $_POST['type']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
	$status = mysqli_real_escape_string($con, $_POST['status']);
	
	if($type !="") {
		$error = false;
		$password_error = "Please select a type of License";
	}
	
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO cases(uid,type,time,status) VALUES('" . $uid . "', '" . $type . "','" . $time . "', '" . $status . "')")) {
			$successmsg = "Application submitted! <a href='payment.php'>Click here forward to Payment</a>";
		} else {
			$errormsg = "Error in form submission, an internal error has occurred";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>License form Script</title>
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
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="index.php">Online Business Application</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="login.php">Login</a></li>
				<li class="active"><a href="form.php">fill form</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- select license form starts-->
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="submitformform">
				<fieldset>
					<legend>Select License Type</legend>

                                        <div class="form-group">
						<label for="type">License_Type</label>
						<input type="text" name="type" placeholder="Enter license type code" required value="<?php if($error) echo $type; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($type_error)) echo $type_error; ?></span>
					</div>                                     

					<div class="form-group">
						<input type="submitform" name="submitform" value="fill form" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<!--portal view past applications-->
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already submitted applications? <a href="viewapplication.php">View past applications</a>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>