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
	$layout_header->set('menu_contact','class="active"');
	$layout_header->set('title','Contact us : Global warming website');
	echo $layout_header->output();
?>
<!--Content-->
	<div class="login_form">
		<h2>Login</h2>
		<form method="post" action="logincheck.php">
			<div class="clearfix">
				<input type="text" placeholder="Enter your email" name="uemail" required>
				<br>
				<input type="password" placeholder="Enter your password" name="upass" required>
				<br>
				<button type="submit" class="submitbt">Submit</button>	
			</div>	
		</form>	
	</div>
	<div class="clear"></div>
<?php
	echo $layout_footer->output();
?>