<?php
	session_start();
	require_once('connect.php');
	include("template.class.php");
	if(!isset($_SESSION['username']))
	{
		$user_login = false;
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer.tpl");
	}
	else{
		$user_login = true;
		if($_SESSION['type'] == 'admin'){
			$layout_header = new Template("layout_login_header_admin.tpl");
			$layout_footer = new Template("layout_login_footer_admin.tpl");
		}
		else{
			$layout_header = new Template("layout_login_header.tpl");
			$layout_footer = new Template("layout_login_footer.tpl");
		}
	}
	$layout_header->set('title','My account : IT Online Shopping website');
	$layout_header->set('menu_about','class="active"');
	$layout_header->set('title','IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
		<div style="width: 90%;margin: auto;margin-top: 20px;">
			<div class="about_text">
				<h3>About Us</h3>
				<p><span>DLZ </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
		</div>
		<table class="policy_tb" style="width: 80%;margin: 40px auto 40px auto;">
			<tr>
				<td>
					<h4>Achievement Orientation</h4>
					<p>Work for the success of the work as a goal</p>
				</td>
				<td>
					<img class="policy_img" src="img/arrow.png">
				</td>
				<td>
					<h4>Vision</h4>
					<p>Going to the same destination, organizational co-ordination</p>
				</td>
				<td>
					<img class="policy_img" src="img/market.png">
				</td>
				<td>
					<h4>Customer Focus</h4>
					<p>Focus on customer or service recipient</p>
				</td>
				<td>
					<img class="policy_img" src="img/shopping_heart.png">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<img class="dlz_img" src="img/D.png">
				</td>
				<td colspan="2">
					<img class="dlz_img" src="img/L.png">
				</td>
				<td colspan="2">
					<img class="dlz_img" src="img/Z.png">
				</td>
			</tr>
			<tr>
				<td>
					<img class="policy_img" src="img/head.png">
				</td>
				<td>
					<h4>Learning & Development</h4>
					<p>Develop all the time</p>
				</td>
				<td>
					<img class="policy_img" src="img/interface.png">
				</td>
				<td>
					<h4>Integrity</h4>
					<p>Acting with integrity, morality</p>
				</td>
				<td>
					<img class="policy_img" src="img/telemarketer.png">
				</td>
				<td>
					<h4>Entrepreneur</h4>
					<p>Creating a Shared Ownership Environment</p>
				</td>
			</tr>
		</table>
<?php
	echo $layout_footer->output();
?>
