<?php
	session_start();
	require_once('connect.php');
	$gname	= $_POST['gname'];

	$_SESSION['guestname'] = $gname;
	echo "<script>history.back();</script>";
	exit();
?>



