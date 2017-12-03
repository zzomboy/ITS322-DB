<!DOCTYPE html>
<html>
	<head>
		<title>[@title]</title>
		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script src="jquery.min.js"></script>
	</head>

	<body>
<!--header-->
		<div class="header">
<!--Logo-->
			<div class="logo">
<!-- ************************* banner ************************* -->
				<a href="index.php"><img src="img/bannerdesigning.jpg" width="100%"></a>
			</div>
			<div class="clear"></div>
		</div>

<!--menu bar-->
		<div class="menu_bar">
	     	<div class="menu">
	     		<ul>
			    	<li [@menu_home]><a href="index.php">Home</a></li>
			    	<li [@menu_article]><a href="article.php">Article</a></li>
			    	<li [@menu_activity]><a href="activity.php">Activity</a></li>
			    	<li [@menu_about]><a href="about.php">About</a></li>
			    	<li [@menu_contact]><a href="contact.php">Contact us</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form method="get" action="search.php">
	     			<input type="text" placeholder="Search product" name="searchword">
	     			<input type="submit" value="">
			     </form>
	     	</div>
	     	<div class="clear"></div>
	    </div>	 
