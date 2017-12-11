<?php
	session_start();
	require_once('connect.php');
	$act_id = $_POST['act_id'];
	$act_count = $_POST['act_count'];
	$act_name = $_POST['act_name'];
	$act_locat = $_POST['act_locat'];
	$activity_text = $_POST['activity_text'];
	$find[] = 'â€œ';
	$find[] = 'â€';
	$find[] = 'â€˜';
	$find[] = 'â€™';
	$find[] = 'â€¦';
	$find[] = 'â€”';
	$find[] = 'â€“';
	$find[] = "'";

	$replace[] = '"';
	$replace[] = '"';
	$replace[] = "\'";
	$replace[] = "\'";
	$replace[] = "...";
	$replace[] = "-";
	$replace[] = "-";
	$replace[] = "\'";

	$text = str_replace($find, $replace, $activity_text);
	
	if(isset($_POST['act_date']) && isset($_POST['act_time'])){
		$td = $_POST['act_date'];
		$tt = $_POST['act_time'];
		$activity_1day = date('Y-m-d H:i:s', strtotime("$td $tt"));
		$settime = "activity_1day = '".$activity_1day."' , activity_type = '1'";
	}else{
		$act_start = $_POST['act_start'];
		$act_end = $_POST['act_end'];
		$activity_type = ceil(abs(strtotime($act_end) - strtotime($act_start)) / 86400);
		$activity_type++;
		$settime = "activity_start = '".$act_start."' , activity_end = '".$act_end."' , activity_type = '".$activity_type."'";
	}

	if (isset($_POST['pimg'])) {
		$target_dir = "img/activity/";
		$target_file = array();
		for ($i=0; $i < $_POST['nimg']; $i++) { 
			$target_file[$i] = $target_dir.basename($_FILES['fileToUpload']['name'][$i]);
		}
		foreach ($target_file as $key => $value) {
			$imageFileType = pathinfo($value,PATHINFO_EXTENSION);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"&& $imageFileType != "GIF") {
			    echo "<script>alert('Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
			    exit();
			}
		}
		foreach ($target_file as $key => $value) {
			if (file_exists($target_file[$key])) {
				$pimg = $_POST['pimg'];
			} 
			else{
				$pimg = $_POST['pimg'];
				move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$key], $target_file[$key]);
			}
		}
		$sql = "UPDATE  activity SET activity_name = '$act_name' , activity_locat = '$act_locat' , activity_text = '$text' , activity_imgs = '$pimg' , $settime WHERE activity_id = $act_id";
	}else{
		$sql = "UPDATE  activity SET activity_name = '$act_name' , activity_locat = '$act_locat' , activity_text = '$text' , $settime WHERE activity_id = $act_id";
	}
	
	
	$mysqli->query($sql) or die("error=$sql");
	header("location: admin_activity.php");
	exit();
?>