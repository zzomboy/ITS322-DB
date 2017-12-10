<?php
	session_start();
	require_once('connect.php');
	$pname	 =$_POST['pname'];
	$pprice	 =$_POST['pprice'];
	$pwarr	 =$_POST['pwarr'];
	$pcat	 =$_POST['pcat'];
	$nline_detail =$_POST['nline_detail'];
	$nline_desc =$_POST['nline_desc'];
	if (isset($_POST['ppdis'])) {
		$ppdis = floatval ($_POST['ppdis']);
		$psale = $pprice - (($pprice*$ppdis)/100);
	}else{
		$ppdis = 0;
		$psale = $pprice;
	}
	$c=1;
	$pdetail = "";
	while ($c <= $nline_detail) {
		if (trim($_POST['topic_detail_'.$c]) != "" && trim($_POST['text_detail_'.$c]) != "") {
			$pdetail = $pdetail.trim($_POST['topic_detail_'.$c])."?".trim($_POST['text_detail_'.$c])."!";
		}	
		$c++;
	}
	$c=1;
	$pdesc = "";
	while ($c <= $nline_desc) {
		if (trim($_POST['text_desc_'.$c]) != "") {
			$pdesc = $pdesc.trim($_POST['text_desc_'.$c])."!";
		}
		$c++;
	}
	if (isset($_POST['pimg'])) {
		/*$image = $_FILES['ppic']['name'];		
		echo "<script>console.log('".$ext."');</script>";
		if(!in_array($ext,$allowed)){
			echo "<script>alert('Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
			exit();
		}else{
			$pimg = $_POST['pimg'];
			move_uploaded_file($image['tmp_name'],"../img/product/".$pimg);
		}*/

		$target_dir = "img/product/";
		$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		    echo "<script>alert('".$imageFileType."Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
		    exit();
		}if (file_exists($target_file)) {
			$pimg = $_POST['pimg'];
		} 
		else{
			$pimg = $_POST['pimg'];
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
		}
	} else {
		$pimg = "xxx";
	}
	
	$sql= "insert into product values('','$pname','$pimg','$pdesc','$pprice','$ppdis','$psale','$pwarr','$pdetail','1','$pcat')";
	$mysqli->query($sql) or die("error=$sql");
	header("location: admin.php");
	exit();
?>