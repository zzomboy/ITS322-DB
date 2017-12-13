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
			<tr>
				<td>
					<a href="admin_newadmin.php">Add new Admin</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="admin_right">
		<div class="table_heading">
    		<h2>View Messages</h2>
    	</div>
    	<div class="clear"></div>
		<table class='listmessage_tb'>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Email</th>
				<th>Message</th>
				<th>Reply</th>
			</tr>
<?PHP
		$q	= "SELECT a.* , b.* FROM conversation as a LEFT JOIN (SELECT c.con_id,d.mes_txt, c.time,d.mes_check FROM (SELECT con_id , MAX(mes_datetime) time,mes_check FROM message WHERE mes_from != 'admin' GROUP BY con_id) c JOIN message d ON c.con_id = d.con_id AND d.mes_datetime = c.time) b ON a.con_id = b.con_id ORDER by time DESC";
		$result	= $mysqli->query($q);
		if(!$result){
			echo "Error on : $q";
		}
		else{
			while($row=$result->fetch_array()){
?>
			<tr>
				<td>
<?php 
				if ($row['mes_check'] == 0) {
?>					
					<img src='img/mail_close.png' width='24' height='24'>
<?php					
				}else{
?>
					<img src='img/mail_open.png' width='24' height='24'>
<?php
				}
?>						
				</td>
				<td><?php echo  $row['con_name']; ?></td>
				<td><?php echo  $row['con_email']; ?></td>
				<td><?php echo  $row['mes_txt']; ?></td> 
				<td>
					<a href="admin_reply.php?con_id=<?php echo $row['con_id']; ?>"><img src='img/pro_edit.png' width='24' height='24'></a>
				</td>
			</tr>
<?php
			}
		}
?>
		</table>
	</div>
	<div class="clear"></div>
</div>
	
<?php
	echo $layout_footer->output();
?>