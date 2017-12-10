<?PHP
	session_start();
	require_once('connect.php');
	$delete_id	= $_GET['delete_id'];  

	$sql = "delete from activity where activity_id = '$delete_id'";
	$result	= $mysqli->query($sql);
	if(!$result){
		echo "Error on : $q";
		exit();
	}
	
	echo "<script>history.back();</script>";
?>
