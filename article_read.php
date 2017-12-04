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
	<div class="page_80">
		<div class="article_txt">

			<h2>What Is Global Warming?</h2> 
			<h6>By National GeoGraphic</h6>
			<p>Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It's becoming clear that humans have caused most of the past century's warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.</p>
			<p>We call the result global warming, but it is causing a set of changes to the Earth's climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It's changing the rhythms of climate that all living things have come to rely upon.</p>
			<p>What will we do to slow this warming? How will we cope with the changes we've already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.</p>
			<p>Greenhouse effect</p>
			<p>The "greenhouse effect" is the warming that happens when certain gases in Earth's atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.</p>
			<p>First, sunlight shines onto the Earth's surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.</p>
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
		<div class="comment_section">
			
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
	</script>
<?php
	echo $layout_footer->output();
?>