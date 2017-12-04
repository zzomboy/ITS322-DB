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
			<div class="post_box">
				<h6><a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wra</p>
			</div>
		</div>
		<div class="clear"></div>
		<div class="all_article">
			<h3>All activity</h3>

			<div class="list_article">
				<a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wraaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;w</p>
				<h5> 3/12/2017 20:36:52</h5>
			</div>

			<div class="list_article">
				<a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wraaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;w</p>
				<h5> 3/12/2017 20:36:52</h5>
			</div>

			<div class="list_article">
				<a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wraaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;w</p>
				<h5> 3/12/2017 20:36:52</h5>
			</div>

			<div class="list_article">
				<a href="activity_read.php" target='_blank'><img src="img/noimgfound.jpg"></a>
				<h4><a href="activity_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wraaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjaoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:breakktoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;wdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;w</p>
				<h5> 3/12/2017 20:36:52</h5>
			</div>
		<!-- *************** previous next button *************** -->
			<div class="pre_next_bt">
				<a href="#" class="previous">&laquo; Previous</a>
				<a href="#" class="next">Next &raquo;</a>
			</div>	
			<div class="clear"></div>		
		</div>		
	</div>
<?php
	echo $layout_footer->output();
?>