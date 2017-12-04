<?php
	session_start();
	require_once('connect.php');
	$comment_txt = $_POST['comment_txt'];
	$article_id = $_POST['article_id'];

	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	if (isset($_SESSION['adminname'])) {
		$com_name = "Admin";
		$com_usertype = "admin";
	}elseif (isset($_SESSION['username'])) {
		$com_name = $_SESSION['username'];
		$com_usertype = "user";
	}else{
		$com_name = $_SESSION['guestname'];
		$com_usertype = "user";
	}
	$sql = "insert into comment values('','article',$article_id,'$com_name','$com_usertype','$comment_txt','$timestamp')";
	$mysqli->query($sql) or die("error=$sql");
	echo "<script>history.go(-1);</script>";
	exit();
?>