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

	if (!isset($_SESSION['username'])) {
?>
<!--Content-->
<!--category & picture-->
	<div class="login_form">
		<h2>Enter your name and E-mail</h2>
		<form method="post" action="usersession.php">
			<div class="clearfix">
				<input type="text" placeholder="Name" name="uname" required>
				<br>
				<input type="text" placeholder="E-mail" name="uemail" required>
				<br>
				<button type="submit" class="submitbt">Submit</button>	
			</div>	
		</form>	
	</div>
	<div class="clear"></div>
<?php
	}else{
?>
	<div class="user_message_scroll" id="message_scroll">
	<?php
		$q	= "select * from conversation as c,message as m WHERE c.con_id = m.con_id and c.con_id = ".$_SESSION['con_id']." order by m.mes_datetime";
		$result	= $mysqli->query($q);
		if(!$result){
			echo "Error on : $q";
		}
		else{
			if(mysqli_num_rows($result) > 0){
				echo "<table width=100% style='table-layout: fixed;'>";
				while($row=$result->fetch_array()){
					if($row['mes_from'] != "user"){
						echo "<tr><td colspan='2' class='admin_mes'>".$row['mes_txt']."</td></tr>";
					}else{
						echo "<tr><td colspan='2' class='user_mes'>".$row['mes_txt']."</td></tr>";
					}
				}
				echo "</table>";
			}
		}
	?>
	</div>
	<form action="user_reply.php" method="post">
		<div align="center">
			<input class="umessage" type="text" name="umes" rows="10" required>
			<button class="sendbt" type="submit">Send</button>
		</div>
	</form>
</div>
<div class="clear"></div>
<?php
	}
	echo $layout_footer->output();
?>
<script type="text/javascript">
	var message_scroll = document.getElementById("message_scroll");
	message_scroll.scrollTop = message_scroll.scrollHeight;
</script>