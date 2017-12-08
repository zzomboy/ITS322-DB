<?php
	session_start();
	require_once('connect.php');
	include("template.class.php");
	if(!isset($_SESSION['adminname']))
	{
		$user_login = false;
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer.tpl");
	}
	else{
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer_admin.tpl");
		$adminname = $_SESSION['adminname'];
	}
	$layout_header->set('menu_activity','class="active"');
	$layout_header->set('title','Activity : Global warming website');
	echo $layout_header->output();
?>
<!--Content-->
<!--category & picture-->
	<div class="full_page">
		<div class="recent_update">
			<h3>Activity</h3>
			<hr>
			<div class="clear"></div>
			<h5>Lastest activity</h5>
<?php
			if (!isset($_GET['page']) || $_GET['page']==1) {
				$offset = 0;
				$limitpage = 4;
			}
			else{
				$offset = $_GET['page']*4-4;
				$limitpage = $offset.",4";
			}
			$q = "select * from activity order by activity_ptime desc limit $limitpage";
			$result = $mysqli -> query($q);
			if(!$result){
				echo "Error on : $q";
			}
			while ($row=$result->fetch_array()) {
?>
			<a href="activity_read.php?art=<?php echo $row['activity_id']; ?>" target='_blank'>
				<div class="post_box">
					<h6><img src="img/activity/<?php $arr = explode("?#",$row['activity_imgs']);echo $arr[0]; ?>"></h6>
					<h4><?php echo $row['activity_name']; ?></h4>
					<p><?php echo $row['activity_text']; ?></p>
				</div>
			</a>
<?php
			}
?>
		</div>
		<div class="clear"></div>
		<div class="all_article">
			<h3>All activity</h3>
<?php
			if (!isset($_GET['page']) || $_GET['page']==1) {
				$offset = 0;
				$limitpage = 4;
			}
			else{
				$offset = $_GET['page']*4-4;
				$limitpage = $offset.",4";
			}
			$q = "select * from activity order by activity_ptime desc limit $limitpage";
			$result = $mysqli -> query($q);
			while ($row=$result->fetch_array()) {
?>
			<a href="activity_read.php?art=<?php echo $row['activity_id']; ?>" target='_blank'>
				<div class="list_article">
					<img src="img/activity/<?php $arr = explode("?#",$row['activity_imgs']);echo $arr[0]; ?>">
					<h4><?php echo $row['activity_name']; ?></h4>
					<p><?php echo $row['activity_text']; ?></p>
					<h5><?php echo $row['activity_date']." at ".$row['activity_locat']; ?></h5>
			</div>
			</a>
<?php
			}
?>	
		<!-- *************** previous next button *************** -->
			<div class="pre_next_bt">
<?php
			if(!isset($_GET['page']) || $_GET['page']==1){
				$q = "select * from activity order by activity_ptime desc limit ".($offset+4).",4";
				$result = $mysqli -> query($q);
				if(!$result)
					echo "Error on : $q";
				$numR = $result->num_rows;
				if($numR!=0){
?>	
				<a href="activity.php?page=2" class="next">Next &raquo;</a>
<?php
				}
			}else{
?>	
				<a href="activity.php?page=<?php echo $_GET['page']-1; ?>" class="previous">&laquo; Previous</a>
<?php
				$q = "select * from activity order by activity_ptime desc limit ".($offset+4).",4";
				$result = $mysqli -> query($q);
				if(!$result)
					echo "Error on : $q";
				$numR = $result->num_rows;
				if($numR!=0){
?>					
				<a href="activity.php?page=<?php echo $_GET['page']+1; ?>" class="next">Next &raquo;</a>
<?php
				}
			}
?>	
			</div>	
			<div class="clear"></div>		
		</div>		
	</div>
<?php
	echo $layout_footer->output();
?>