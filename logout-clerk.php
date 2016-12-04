<?php
session_start();

if(isset($_SESSION['eid'])) {
	session_destroy();
	unset($_SESSION['eid']);
	unset($_SESSION['cid']);
	unset($_SESSION['ctype']);
	header("Location: login-clerk.php");
} else {
	header("Location: login-clerk.php");
}
?>