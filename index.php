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
<!--category & picture-->
	<div class="full_page">
		<div class="recent_update">
			<h3>Recent Update</h3>
			<div class="clear"></div>
			<div class="post_box">
				<h6><a href="article_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="article_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoiewhtoigfdocvhjioehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt</p>
			</div>
			<div class="post_box">
				<h6><a href="article_read.php" target='_blank'><img src="img/noimgfound.jpg"></a></h6>
				<h4><a href="article_read.php" target='_blank'>ewryt6rujhgvbgkfyui</a></h4>
				<p>aoieektoierhglkjdfil'bjreio[ajtpierjtehtrerektoierhglkjdfil'bjreio[ajtpierjtpiaerjt word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wrap:break-word;word-wra</p>
			</div>
		</div>
		<div class="clear"></div>

<!-- ********************** slider ********************** -->
		<div class="w3-content w3-display-container" style="width: 87.5%;height: 400px !important;overflow: hidden;display:flex;justify-content: center;align-items: center;">
			<div class="w3-display-container mySlides" style="text-align: center;">
				<img src="img/img_lights.jpg">
				<div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
	<!-- ********************** topic ********************** -->
					Trolltunga, Norway
				</div>
			</div>
			
			<div class="w3-display-container mySlides" style="text-align: center;">
				<img src="img/img_mountains.jpg">
				<div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
	<!-- ********************** topic ********************** -->
					Beautiful Mountains
				</div>
			</div>

			<div class="w3-display-container mySlides" style="text-align: center;">
				<img src="img/bannerdesigning.jpg">
				<div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
	<!-- ********************** topic ********************** -->
					banner designing
				</div>
			</div>
			<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
			<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
		</div>
<!-- ********************** /slider ********************** -->

	</div>
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  if (n > x.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
	</script>
<?php
	echo $layout_footer->output();
?>