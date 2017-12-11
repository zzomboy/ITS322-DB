<?php
	session_start();
	require_once('connect.php');
	$umes = $_POST['umes'];
	$con_id = $_POST['con_id'];
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	$sql = "insert into message values('','$con_id','admin','$umes','".$timestamp."',1)";
	$mysqli->query($sql) or die("error=$sql");
	echo "<script>history.back();</script>";
	exit();
?>