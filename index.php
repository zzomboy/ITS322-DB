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
	$layout_header->set('menu_home','class="active"');
	$layout_header->set('title','Global warming website');
	echo $layout_header->output();
?>
<!--Content-->
	<script src="sss.min.js"></script>
	<script>jQuery(function($) {$('.slider').sss();});</script>
<!--category & picture-->
	<div class="full_page">
		<div class="recent_update">
			<h3>Recent Update</h3>
			<div class="clear"></div>
			<div class="post_box">
				<h6><a href="article_read.php"><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php">ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="article_read.php"><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php">ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="article_read.php"><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php">ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
		</div>
		<div class="clear"></div>

		<div class="slider">
			<img src="img/bannerdesigning.jpg" />
			<img src="img/bannerdesigning.jpg" />
			<div class="just_text">This one's just text.</div>
			<img src="img/bannerdesigning.jpg" />
			<div>
				<img src="img/bannerdesigning.jpg" />
				<span class="caption">This one has a caption</span>
			</div>
		</div>
	</div>

<?php
	echo $layout_footer->output();
?>