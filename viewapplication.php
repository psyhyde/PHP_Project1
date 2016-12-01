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

<div class="container">
    <div class="table-responsive"> 
		<table class="table">
			<thead>
				<tr>
				<th>Case #</th>
				<th>Submission TimeStamp</th>
				<th>License Type</th>
				<th>Status</th>
				</tr>
			</thead>
				<tbody>
				
    <?php 
	$user_check =(int) $_SESSION['user_id'];
	$sql = "SELECT id, time, type, statu FROM cases WHERE cid = $user_check";
    $result2 = mysqli_query($con, $sql);
	// session to int FU
    if (mysqli_num_rows($result2) !="") {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        echo '<tr>
			<td scope = "row">' .$row['id']. '</td>
			<td>' .$row['time']. '</td>
			<td>' .$row['type']. '</td>
			<td>' .$row['statu']. '</td>
			</tr>';
		}
				
} else {
    echo "You do not have previous record";
}
				
mysqli_close($con);
	?>
				</tbody>
		</table>
	</div>
</div> 



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>


</html>