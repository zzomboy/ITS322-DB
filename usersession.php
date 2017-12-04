<?php
	session_start();
	require_once('connect.php');
	$uname	= $_POST['uname'];
	$uemail	= $_POST['uemail'];
	
	$q 	= "select * from conversation where con_email='".$uemail."'";
	$result	= $mysqli->query($q);
	if(!$result)
		echo "Error on : $q";

	$numR = $result->num_rows;
	if($numR==0)
	{
		$q = "insert into conversation values('','$uname','$uemail')";
		$result	= $mysqli->query($q);
		if(!$result)
			echo "Error on : $q";
	}
	
	$q 	= "select * from conversation where con_email='".$uemail."'";
	$result	= $mysqli->query($q);
	if(!$result)
		echo "Error on : $q";
	$row=$result->fetch_array();
	$_SESSION['con_id'] = $row['con_id'];
	$_SESSION['username'] = $uname;
	$_SESSION['useremail'] = $uemail;
	header("location: contact.php");
	exit();
?>



