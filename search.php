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
		$layout_header = new Template("layout_header_admin.tpl");
		$layout_footer = new Template("layout_footer_admin.tpl");
		$adminname = $_SESSION['adminname'];
	}
	$layout_header->set('menu_activity','class="active"');
	$layout_header->set('title',$_GET["searchword"].' : Global warming website');
	echo $layout_header->output();

	if(!isset($_GET['searchword']) || $_GET['searchword']=="") {
		header("location: product.php");
		exit();
	}
	else{
		$searchword=($_GET['searchword']);
	}
?>
<!--Content-->
	<div class="full_page">
		<div class="all_article">
<?php
			$q = "select * from tags where tag_name like '%$searchword%' order by tag_name";
			$result = $mysqli -> query($q);
			$numR = $result->num_rows;
			if($numR!=0){
?>
			<br>
			<h3>Tag with "<?php echo $searchword; ?>"</h3>
			<div class="section2">
				<ul>
<?php
				while ($row=$result->fetch_array()) {
?>
					<li><a href="tag.php?tag=<?php echo $row['tag_name']; ?>" target='_blank'><?php echo $row['tag_name']; ?></a></li>
<?php
				}
?>
				</ul>
			</div>
			<hr style="border: 0.5px solid #CFCFCF;">
<?php
			}
			$q = "select * from article where article_name like '%$searchword%' or article_text like '%$searchword%' order by article_time desc";
			$result = $mysqli -> query($q);
			$numR = $result->num_rows;
			if($numR!=0){
?>
			<br>
			<h3>Article with "<?php echo $searchword; ?>"</h3>
<?php
				while ($row=$result->fetch_array()) {
?>
			<a href="article_read.php?art=<?php echo $row['article_id']; ?>" target='_blank'>
				<div class="list_article">
					<img src="img/article/<?php $arr = explode("?#",$row['article_imgs']);echo $arr[0]; ?>">
					<h4><?php echo $row['article_name']; ?></h4>
					<p><?php echo $row['article_text']; ?></p>
					<h5><?php echo $row['article_time']; ?></h5>
				</div>
			</a>
<?php
				}
			}
			$q = "select * from activity where activity_name like '%$searchword%' or activity_text like '%$searchword%' order by activity_ptime desc";
			$result = $mysqli -> query($q);
			$numR = $result->num_rows;
			if($numR!=0){
?>
			<br>
			<h3>Activity with "<?php echo $searchword; ?>"</h3>
<?php
			while ($row=$result->fetch_array()) {
?>
			<a href="activity_read.php?art=<?php echo $row['activity_id']; ?>" target='_blank'>
				<div class="list_article">
					<img src="img/activity/<?php $arr = explode("?#",$row['activity_imgs']);echo $arr[0]; ?>">
					<h4><?php echo $row['activity_name']; ?></h4>
					<p><?php echo $row['activity_text']; ?></p>
<?php
					if ($row['activity_type'] == 1){
?>
					<h5><?php echo $row['activity_1day']." at ".$row['activity_locat']; ?></h5>
<?php
					}else{
?>
					<h5><?php echo $row['activity_start']." to ".$row['activity_end']." at ".$row['activity_locat']; ?></h5>
<?php
					}
?>
			</div>
			</a>
<?php
				}
			}
?>
			<div class="clear"></div>		
		</div>
	</div>
<?php
	echo $layout_footer->output();
?>