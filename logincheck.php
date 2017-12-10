<?php
	session_start();
	require_once('connect.php');
	$uemail	= $_POST['uemail'];
	$upass	= base64_encode($_POST['upass']);
	
	$q 	= "select * from admin where admin_email='".$uemail."' and admin_pw = '".$upass."'";
	$result	= $mysqli->query($q);
	if(!$result)
		echo "Error on : $q";

	$numR = $result->num_rows;
	if($numR==0)
	{
		echo "<script>alert('!! Login Fail !!');history.back();</script>";
		exit();
	}
	else{
		$row=$result->fetch_array();
		$_SESSION['adminname'] = $uemail;
		$_SESSION['aid'] = $row['admin_id'];
		header("location: admin.php");
		exit();
	}
?>



