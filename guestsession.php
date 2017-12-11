<?php
	session_start();
	require_once('connect.php');
	$gname	= $_POST['gname'];

	if (strtolower($uname) == "admin") {
		echo "<script>alert('This name can't be used!!!');history.go(-1);</script>";
		exit();
	}
	
	$_SESSION['guestname'] = $gname;
	echo "<script>history.go(-1);</script>";
	exit();
?>



