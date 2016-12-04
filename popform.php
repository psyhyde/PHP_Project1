<?php
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: index.php");
}	
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

		<div class= "container">
        <legend>Simple upload</legend>
        <p>Pick up a file to upload, and press "upload" </p>
        <form name="form1" enctype="multipart/form-data" method="post" action="upload.php" />
            <p><input type="file" size="32" name="my_field" value="" /></p>
            <p class="button"><input type="hidden" name="action" value="simple" />
            <input type="submit" name="Submit" value="upload" /></p>
        </form>
    	</div>>

    	<div class= "container">
        <legend>HTML5 File Drag &amp; Drop API</legend>
        <p>Drag and drop one file to upload, and press "upload" </p>
        <form name="form5" enctype="multipart/form-data" method="post" action="upload.php" />
            <p><input type="file" size="32" name="my_field" value="" id="dnd_field" /></p>
            <div id="dnd_drag">... drag and drop here ...</div>
            <div id="dnd_status"></div>
            <p class="button"><input type="hidden" name="action" value="xhr" />
            <input type="submit" name="Submit" value="upload" id="dnd_upload"/></p>
        </form>
        <div id="dnd_result"></div>
    	</div>

    	<div class = "container">
    	<legend>XMLHttpRequest upload</legend>
        <p>Pick up one file to upload, and press "upload" </p>
        <form name="form5" enctype="multipart/form-data" method="post" action="upload.php" />
            <p><input type="file" size="32" name="my_field" value="" id="xhr_field" /></p>
            <div id="xhr_status"></div>
            <p class="button"><input type="hidden" name="action" value="xhr" />
            <input type="submit" name="Submit" value="upload" id="xhr_upload"/></p>
        </form>
		</div>>

    <script type="text/javascript">

    window.onload = function () {

      function xhr_send(f, e) {
        if (f) {
          xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
              document.getElementById(e).innerHTML = xhr.responseText;
            }
          }
          xhr.open("POST", "upload.php?action=xhr");
          xhr.setRequestHeader("Cache-Control", "no-cache");
          xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
          xhr.setRequestHeader("X-File-Name", f.name);
          xhr.send(f);
        }
      }

      function xhr_parse(f, e) {
        if (f) {
          document.getElementById(e).innerHTML = "File selected : " + f.name + "(" + f.type + ", " + f.size + ")";
        } else {
          document.getElementById(e).innerHTML = "No file selected!";
        }
      }

      function dnd_hover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.target.className = (e.type == "dragover" ? "hover" : "");  
      }

      var xhr = new XMLHttpRequest();

      if (xhr && window.File && window.FileList) {

        // xhr example
        var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
          xhr_file = this.files[0];
          xhr_parse(xhr_file, "xhr_status");
        }
        document.getElementById("xhr_upload").onclick = function (e) {
          e.preventDefault();
          xhr_send(xhr_file, "xhr_result");
        }

        // drag and drop example
        var dnd_file = null; 
        document.getElementById("dnd_drag").style.display = "block";
        document.getElementById("dnd_field").style.display = "none";
        document.getElementById("dnd_drag").ondragover = function (e) {
          dnd_hover(e);
        }
        document.getElementById("dnd_drag").ondragleave = function (e) {
          dnd_hover(e);
        }
        document.getElementById("dnd_drag").ondrop = function (e) {
          dnd_hover(e);
          var files = e.target.files || e.dataTransfer.files;
          dnd_file = files[0];
          xhr_parse(dnd_file, "dnd_status");
        }
        document.getElementById("dnd_field").onchange = function (e) {
          dnd_file = this.files[0];
          xhr_parse(dnd_file, "dnd_status");
        }
        document.getElementById("dnd_upload").onclick = function (e) {
          e.preventDefault();
          xhr_send(dnd_file, "dnd_result");
        }

      }
    }
    </script>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>


</html>