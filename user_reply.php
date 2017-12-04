<?php
	session_start();
	require_once('connect.php');
	$umes = $_POST['umes'];
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	$sql = "insert into message values('',".$_SESSION['con_id'].",'user','$umes','$timestamp',0)";
	$mysqli->query($sql) or die("error=$sql");
	header("location: contact.php");
	exit();
?>