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
				<?php if (isset($_SESSION['cid'])) { ?>
				<li><p class="navbar-text"> Signed in as Employee: <?php echo $_SESSION['cid']; ?></p></li>
				<li><p class="navbar-text"> Type: <?php echo $_SESSION['ctype']; ?></p></li>
<!-- fixing sth here-->				
				<li><a href="logout-clerk.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login-clerk.php">Login</a></li>
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

<div class="container-fluid">
<button type="button" class="btn btn-default">
<a herf = 'process-case.php'>All Pending Cases 
</a>
</button>
</div>

<div class="container">
    <div class="table-responsive"> 
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>Case #</th>
				<th>Submission TimeStamp</th>
				<th>License Type Code</th>
				<th>License Type</th>
				<th>Location</th>
				<th>Postal Code</th>
				<th>Status</th>
				<th>Action: Approve</th>
				<th>Action: Reject</th>
				</tr>
			</thead>
				<tbody>

    <?php 
	$user_check =(int) $_SESSION['cid'];
	$sql = "SELECT id, time, type, typedes, location, postal, statu FROM cases WHERE statu = 0";
    $result2 = mysqli_query($con, $sql);
	// session to int FU
    if (mysqli_num_rows($result2) !="") {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {

// echo out the contents of each row into a table
        echo "<tr>";
			echo '<td scope = "row">' .$row['id']. '</td>';
			echo '<td>' .$row['time']. '</td>';
			echo '<td>' .$row['type']. '</td>';
			echo '<td>' .$row['typedes']. '</td>';
			echo '<td>' .$row['location']. '</td>';
			echo '<td>' .$row['postal']. '</td>';
			echo '<td>' .$row['statu']. '</td>';
			echo '<td><a href="approve.php?id=' . $row['id'] . '">Approve</a></td>';
			echo '<td><a href="reject.php?id=' . $row['id'] . '">Reject</a></td>';
		echo "</tr>";
		}
				
} else {?>
    <div class="container"> 
		<div class="alert alert-info">
			<strong>Info!</strong> You do not have previous record
		</div>	
	</div>
<?php }
				
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