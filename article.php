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
		<div class="recent_update">
			<h3>Article</h3>
			<hr>
			<div class="clear"></div>
<?php
		if (!isset($_GET['page'])) {		
?>
			<h5>Popular article</h5>
<?php
			$q = "select * from article order by visitor_art desc limit 3";
			$result = $mysqli -> query($q);
			if(!$result){
				echo "Error on : $q";
			}
			while ($row=$result->fetch_array()) {
?>
			<div class="post_box">
				<h6><a href="article_read.php?art=<?php echo $row['article_id']; ?>" target='_blank'><img src="img/article/<?php $arr = explode("?#",$row['article_imgs']);echo $arr[0]; ?>"></a></h6>
				<h4><a href="article_read.php?art=<?php echo $row['article_id']; ?>" target='_blank'><?php echo $row['article_name']; ?></a></h4>
				<p><?php echo $row['article_text']; ?></p>
			</div>
<?php
			}
?>			
		</div>
		<div class="clear"></div>
<?php
		}			
?>
		<div class="all_article">
			<h3>All article</h3>
<?php
			if (!isset($_GET['page']) || $_GET['page']==1) {
				$offset = 0;
				$limitpage = 4;
			}
			else{
				$offset = $_GET['page']*4-4;
				$limitpage = $offset.",4";
			}
			$q = "select * from article order by article_time desc limit $limitpage";
			$result = $mysqli -> query($q);
			while ($row=$result->fetch_array()) {
?>
			<a href="article_read.php?art=<?php echo $row['article_id']; ?>" target='_blank'>
				<div class="list_article">
					<img src="img/article/<?php $arr = explode("?#",$row['article_imgs']);echo $arr[0]; ?>">
					<h4><?php echo $row['article_name']; ?></h4>
					<p><?php echo $row['article_text']; ?></p>
					<h5 style="text-align: left;"><?php echo $row['article_time']; ?></h5>
				</div>
			</a>
<?php
			}
?>	
		<!-- *************** previous next button *************** -->
			<div class="pre_next_bt">
<?php
			if(!isset($_GET['page']) || $_GET['page']==1){
				$q = "select * from article order by article_time desc limit ".($offset+4).",4";
				$result = $mysqli -> query($q);
				if(!$result)
					echo "Error on : $q";
				$numR = $result->num_rows;
				if($numR!=0){
?>	
				<a href="article.php?page=2" class="next">Next &raquo;</a>
<?php
				}
			}else{
?>	
				<a href="article.php?page=<?php echo $_GET['page']-1; ?>" class="previous">&laquo; Previous</a>
<?php
				$q = "select * from article order by article_time desc limit ".($offset+4).",4";
				$result = $mysqli -> query($q);
				if(!$result)
					echo "Error on : $q";
				$numR = $result->num_rows;
				if($numR!=0){
?>					
				<a href="article.php?page=<?php echo $_GET['page']+1; ?>" class="next">Next &raquo;</a>
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