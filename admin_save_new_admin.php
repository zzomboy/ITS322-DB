<?php
	session_start();
	require_once('connect.php');
	$aemail = $_POST['aemail'];
	$apw = $_POST['apw'];
	$apw_repeat = $_POST['apw_repeat'];

	if($apw  != $apw_repeat)
	{
		echo "<script>alert('Password doesn`t match!!!');history.back();</script>";
		exit();
	}

	$q	= "select * from admin where admin_email = '".$aemail."'";
	$result	= $mysqli->query($q) or die("error=$sql");

	$numR = $result->num_rows;
	if($numR != 0)
	{
		echo "<script>alert('This e-mail already registered.Please change e-mail!!!');history.back();</script>";
		exit();
	}else
	{
		$apw	= base64_encode($apw);
		$sql= "insert into admin values('','$aemail','$apw')";
		$mysqli->query($sql) or die("error=$sql");
		header("location: admin_newadmin.php");
		exit();
	}
?>