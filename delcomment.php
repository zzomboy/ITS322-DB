<?php
	session_start();
	require_once('connect.php');

	$sql = "DELETE FROM `comment` WHERE `comment`.`com_id` = ".$_GET['del_id'];
	$mysqli->query($sql) or die("error=$sql");
	echo "<script>history.go(-1);</script>";
	exit();
?>