<?php
session_start();


include_once 'dbconnect.php';

//set validation error flag as false
$error = false;
//assign 


//check if form is submitted
if (isset($_POST['submitform'])) {
	$uid = mysqli_real_escape_string($con, $_POST['uid']);
	$type = mysqli_real_escape_string($con, $_POST['type']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
	$statu = mysqli_real_escape_string($con, $_POST['statu']);
	
	if($type ="") {
		$error = true;
		$type_error = "Please select a type of License";
	}
	
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO cases(uid,type,time,statu) VALUES('" . $uid . "', '" . $type . "','" . $time . "', '" . $statu . "')")) {
			$successmsg = "Application submitted! <a href='payment.php'>Click here forward to Payment</a>";
		} else {
			$errormsg = "Error in form submission, an internal error has occurred";
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
				<li><a href="viewapplication.php">My Applications</a></li>
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


</body>
</html>