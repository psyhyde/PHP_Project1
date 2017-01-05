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
				</tr>
			</thead>
				<tbody>
				
    <?php 
	$user_check =(int) $_SESSION['user_id'];
	$sql = "SELECT id, time, type, typedes, location, postal, statu FROM cases WHERE uid = $user_check";
    $result2 = mysqli_query($con, $sql);
	// session to int FU
    if (mysqli_num_rows($result2) !="") {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		//$invID = str_pad($invID, 4, '0', STR_PAD_LEFT);
        echo '<tr>
			<td scope = "row">' .$row['id']. '</td>
			<td>' .$row['time']. '</td>
			<td>' .$row['type']. '</td>
			<td>' .$row['typedes']. '</td>
			<td>' .$row['location']. '</td>
			<td>' .$row['postal']. '</td>
			<td>' .$row['statu']. '</td>
			</tr>';
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


</script>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>


</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>YouTubePopUp Plugin</title>
	<link rel="stylesheet" type="text/css" href="css/YouTubePopUp.css">
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="js/YouTubePopUp.jquery.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			jQuery("a.bla-1").YouTubePopUp();
			jQuery("a.bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
	</script>
</head>
<body>
<div class = "container">
<h3>YouTube</h3>
<p>
	<a class="bla-1" href="https://www.youtube.com/watch?v=3qyhgV0Zew0">This YouTube video with autoplay</a> and
	<a class="bla-2" href="https://www.youtube.com/watch?v=3qyhgV0Zew0">This YouTube video without autoplay</a>
</p>
<p>---------------</p>
</div>

<div class ="container">
<h3>Vimeo</h3>
<p>
	<a class="bla-1" href="https://vimeo.com/81527238">This Vimeo video with autoplay</a> and
	<a class="bla-2" href="https://vimeo.com/81527238">This Vimeo video without autoplay</a>
</p>
<p>---------------</p>
<p><a target="_blank" href="http://wp-time.com">Visit WP Time</a> - <a target="_blank" href="http://wp-plugins.in">Free WordPress Plugins</a> - <a target="_blank" href="https://creativemarket.com/WPTime?u=WPTime">WordPress Themes</a> - <a target="_blank" href="http://qass.im">Qassim Hassan</a></p>
</div>
</body>
</html>