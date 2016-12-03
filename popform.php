<?php
session_start();
include_once 'dbconnect.php';
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
<!--form start here-->


        <legend>Simple upload</legend>
        <p>Pick up a file to upload, and press "upload" </p>
        <form name="form1" enctype="multipart/form-data" method="post" action="upload.php" />
            <p><input type="file" size="32" name="my_field" value="" /></p>
            <p class="button"><input type="hidden" name="action" value="simple" />
            <input type="submit" name="Submit" value="upload" /></p>
        </form>
    

    
        <legend>Image upload</legend>
        <p>Pick up an image to upload, and press "upload" </p>
        <form name="form2" enctype="multipart/form-data" method="post" action="upload.php" />
            <p><input type="file" size="32" name="my_field" value="" /></p>
            <p class="button"><input type="hidden" name="action" value="image" />
            <input type="submit" name="Submit" value="upload" /></p>
        </form>
    



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>


</html>