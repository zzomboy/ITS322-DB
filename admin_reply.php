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
	$layout_header->set('title','Admin page : Global warming website');
	echo $layout_header->output();

/********************** check admin using this page **********************/
	if(!isset($_SESSION['adminname'])){
		echo "<p style='margin-top:20px;font-size:26px;text-align:center;'>You don't have permission to use this page.</p>";
		echo $layout_footer->output();
		exit();
	}
	$con_id = $_GET['con_id'];
	$sql	= "UPDATE message SET mes_check = 1 WHERE con_id = $con_id";
    $result = $mysqli->query($sql) or die("error=$sql");
?>
<!--Content-->
<div class="admin_full">
	<div class="admin_left">
		<table class="admin_menu">
			<tr>
				<th>
					Admin page
				</th>
			</tr>
			<tr>
				<td>
					<a href="admin.php">Article management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_activity.php">Activity management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_addpost.php">New Article & Activity</a>
				</td>
			</tr>
			<tr>
				<td class="active">
					<a href="admin_messages.php">View Messages</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="view_mes">
		<div class="user_message_scroll" id="message_scroll">
		<?php
			$q	= "select * from conversation as c,message as m WHERE c.con_id = m.con_id and c.con_id = $con_id order by m.mes_datetime";
			$result	= $mysqli->query($q);
			if(!$result){
				echo "Error on : $q";
			}
			else{
				echo "<table width=100% style='table-layout: fixed;'>";
				while($row=$result->fetch_array()){
					if($row['mes_from'] != "admin"){
						echo "<tr><td colspan='2' class='admin_mes'>".$row['mes_txt']."</td></tr>";
					}else{
						echo "<tr><td colspan='2' class='user_mes'>".$row['mes_txt']."</td></tr>";
					}
				}
				echo "</table>";
			}
		?>
		</div>
		<form action="admin_sendmes.php" method="post">
			<input class="amessage" type="text" name="umes" rows="10" required>
			<input type="hidden" name="con_id" value="<?php echo $con_id; ?>">
			<button class="sendbt" type="submit">Send</button>
		</form>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
<script type="text/javascript">
	var message_scroll = document.getElementById("message_scroll");
	message_scroll.scrollTop = message_scroll.scrollHeight;
</script>