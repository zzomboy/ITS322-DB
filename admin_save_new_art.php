<?php
	session_start();
	require_once('connect.php');
	$art_name = $_POST['art_name'];
	$art_author = $_POST['art_author'];
	$article_text = $_POST['article_text'];
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

	$text = str_replace($find, $replace, $article_text);
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	if ($_POST['new_tag'] != "") {
		$new_tag = $_POST['new_tag'];
		$q = "INSERT INTO tags VALUES ('', '$new_tag', '0')";
		$mysqli->query($q) or die("error=$q");
		$q = "SELECT * FROM tags where tag_name = '$new_tag'";
		$result = $mysqli->query($q) or die("error=$q");
		$row = $result->fetch_array();
		$tag_id = $row['tag_id'];
	}else{
		$tag_id = $_POST['art_tag'];
	}
	
	if (isset($_POST['pimg'])) {
		$target_dir = "img/article/";
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
	}else{
		$pimg = "noimgfound.jpg";
	}
	
	$sql= "INSERT  INTO article VALUES ('', $tag_id, '$art_name', '$art_author', '$timestamp', '$text', '$pimg', 0)";
	$mysqli->query($sql) or die("error=$sql");
	header("location: admin.php");
	exit();
?>