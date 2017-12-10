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
<?php
			$q = "select * from article order by article_time desc limit 3";
			$result = $mysqli -> query($q);
			if(!$result){
				echo "Error on : $q";
			}
			while ($row=$result->fetch_array()) {
?>
			<a href="article_read.php?art=<?php echo $row['article_id']; ?>" target='_blank'>
				<div class="post_box">
					<h6><img src="img/article/<?php $arr = explode("?#",$row['article_imgs']);echo $arr[0]; ?>"></h6>
					<h4><?php echo $row['article_name']; ?></h4>
					<p><?php echo $row['article_text']; ?></p>
				</div>
			</a>
<?php
			}
?>			
		</div>
		<div class="clear"></div>
<?php
			$q = "select * from activity order by activity_ptime desc limit 4";
			$result = $mysqli -> query($q);
			if(!$result){
				echo "Error on : $q";
			}
?>
<!-- ********************** slider ********************** -->
		<div class="w3-content w3-display-container" style="width: 87.5%;height: 400px !important;overflow: hidden;display:flex;justify-content: center;align-items: center;">
<?php
			while ($row=$result->fetch_array()) {
?>
			<a href="activity_read.php?art=<?php echo $row['activity_id']; ?>" target='_blank'><div class="w3-display-container mySlides" style="text-align: center;">
				<img src="img/activity/<?php $arr = explode("?#",$row['activity_imgs']);echo $arr[0]; ?>">
				<div class="w3-display-bottomright w3-large w3-container w3-black" style="padding: 5px;">
	<!-- ********************** topic ********************** -->
					<?php echo $row['activity_name']; ?>
				</div>
			</div></a>
<?php
			}
?>
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