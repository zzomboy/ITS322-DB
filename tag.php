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
	$layout_header->set('menu_article','class="active"');
	$layout_header->set('title','Article : Global warming website');
	echo $layout_header->output();
?>
<!--Content-->
	<div class="full_page">
		<br>
		<div class="all_article">
<?php
			echo '<h3>Article with tag "'.$_GET['tag'].'"</h3>';

			$q = "select a.*,t.tag_name from article a , tags t where t.tag_id = a.tag_id and tag_name like '".$_GET['tag']."' order by article_time desc";
			$result = $mysqli -> query($q);
			$numR = $result->num_rows;
			if ($numR != 0) {
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
?>	
			</div>	
			<div class="clear"></div>		
		</div>		
	</div>
<?php
	echo $layout_footer->output();
?>