<?php
session_start();
include_once 'dbconnect.php';
$cid = (int) $_SESSION['cid'];

if(!isset($_SESSION['cid'])) {
	header("Location: login-clerk.php");
}

// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id']))
{

// get id value
$id = $_GET['id'];

// update to db
$result = mysqli_query($con, "UPDATE cases SET statu=2, cid= $cid WHERE id=$id");

// redirect back to the process-case.php page and re-render the page with updated info
header("Location: process-case.php");
}
else
// if id isn't set, or isn't valid, redirect back to process-case page

{
header("Location: process-case.php");
}

?>