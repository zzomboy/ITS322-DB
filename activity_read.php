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
	$layout_header->set('menu_article','class="active"');
	$layout_header->set('title','Global warming website');
	echo $layout_header->output();
	if (isset($_GET['art'])){
?>
<!--Content-->
<!--category & picture-->
	<div class="page_80">
		<div class="article_txt">
<?php
		$sql = "UPDATE activity SET visitor_act = visitor_act+1 WHERE activity_id = ".$_GET['art'];
		$mysqli->query($sql) or die("error=$sql");

		$q = "select * from activity where activity_id = ".$_GET['art'];
		$result = $mysqli -> query($q);
		if(!$result){
			echo "Error on : $q";
		}else{
		$row=$result->fetch_array();
?>
			<h2><?php echo $row['activity_name']; ?></h2>
<?php 
			$arr_txt = explode(PHP_EOL, $row['activity_text']); 
			foreach ($arr_txt as $value){
				echo "<p>".$value."</p>";
			}
?>
			<p>Date : <?php echo $row['activity_date']." at ".$row['activity_locat']; ?></p>
		</div>

		<div class="clear"></div>
<!-- ********************** slider ********************** -->
		<div class="w3-content w3-display-container article_slider" style="width: 87.5%;height: 400px !important;overflow: hidden;display:flex;justify-content: center;align-items: center;">
<?php
			$arr_img = explode("?#", $row['activity_imgs']); 
			foreach ($arr_img as $value){
				echo '<div class="w3-display-container mySlides" style="text-align: center;">
						<img src="img/activity/'.$value.'">
					</div>';
			}
?>
			<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
			<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
		</div>
<!-- ********************** /slider ********************** -->
		<div class="comment_section">
			<hr>
<?php
			$sql = "select * from comment where com_on = 'activity' and post_id = ".$_GET['art']." order by com_time desc";
			$result = $mysqli->query($sql) or die("error=$sql");
			$numR = $result->num_rows;
?>	
			<h2><?php echo $numR; ?> comments</h2>
<?php
			if (!isset($_SESSION['username']) && !isset($_SESSION['adminname']) && !isset($_SESSION['guestname'])) {
?>
			<div class="post_comment">
				<form method="post" action="guestsession.php">
					<input type="text" placeholder="Enter your name" name="gname" required>
					<button type="submit" class="submitbt">Submit</button>
				</form>	
			</div>
			<div class="clear"></div>
<?php
			}else{
?>
			<div class="post_comment" align="right">
				<form method="post" action="activitycomment.php">
					<textarea placeholder="Enter your comment" name="comment_txt" rows="5" required></textarea>
					<input type="hidden" name="activity_id" value="<?php echo $_GET['art']; ?>">
					<button type="submit" class="submitbt">Send</button>
				</form>	
			</div>
			<hr style="border: 0.5px solid #CFCFCF;">
			<div class="clear"></div>
<?php
			}
			while($row=$result->fetch_array()){
				if ($row['com_usertype'] == 'user') {
					echo '<div class="comment_txt">';
				}else{
					echo '<div class="comment_txt admin_comment">';
				}
?>	
				<h3><?php echo $row['com_name']; ?></h3>
				<p><?php echo $row['com_txt']; ?></p>
				<h6>
					<?php
						$time = strtotime($row['com_time']);
						$showdate = date("F j, Y", $time);
						$showtime = date("H:i", $time);
						echo $showdate." at ".$showtime;
					if(isset($_SESSION['adminname'])){
					?>
					<a href="delcomment.php?com_id=<?php echo $row['com_id']; ?>"><div class="del_com confirmation"></div></a>
					<style type="text/css">
						.comment_txt p{
							margin-bottom: 5px;
						}
					</style>
<?php 
					} 
?>
				</h6>
				<hr>
			</div>
<?php
			}
?>
		</div>
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

		$('.confirmation').on('click', function () {
			return confirm('Are you sure?');
		});
	</script>
<?php
		}
	}
	echo $layout_footer->output();
?>