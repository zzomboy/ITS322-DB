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

	if (!isset($_GET['sortby'])) {
		$sortby = "activity_ptime desc";
	}
	else{
		$sortby = $_GET['sortby'];
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
				<td class="active">
					<a href="admin_activity.php">Activity management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_addpost.php">New Article & Activity</a>
				</td>
			</tr>
			<tr>
				<td>
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
		<div class="admin_tool_box">
			<div class="admin_search_box">
				<form method="get" action="admin_search_activity.php">
	     			<input type="text" placeholder="Search article" name="searchword">
	     			<input type="submit" value="">
			     </form>
			</div>
			<select class="sortby_tool" onchange="location = this.value;">
				<option disabled selected value> Sort By </option>
				<option value="?sortby=activity_ptime desc">Newest - Oldest</option>
				<option value="?sortby=activity_ptime">Oldest - Newest</option>
				<option value="?sortby=activity_name">Name A - Z</option>
				<option value="?sortby=activity_name desc">Name Z - A</option>	
			</select>
     	</div>
		<div class="clear"></div>

		<div class="table_heading">
    		<h2>Activity management</h2>
    	</div>
    	<div class="clear"></div>

		<table class='activity_tb'>
<?php
		$q = "SELECT * FROM activity ORDER BY ".$sortby;
		$result = $mysqli -> query($q);
		while($row=$result->fetch_array()){
?>
		<tr>
			<td><a href="activity_read.php?art=<?php echo $row['activity_id']; ?>" target='_blank'><?php echo $row['activity_name']; ?></a></td>
			<td><?php echo $row['activity_locat']; ?></td>
			<td>
<?php
			if ($row['activity_type'] == 1){
?>
			<?php echo $row['activity_1day']; ?>
<?php
			}else{
?>
			<?php echo $row['activity_start']." to ".$row['activity_end']; ?>
<?php
			}
?>
			</td>	
			<td><a href='admin_edit_act.php?edit_id=<?php echo $row['activity_id']; ?>'><img src='img/pro_edit.png' width='24' height='24'></td>
			<td><a href='admin_del_act.php?delete_id=<?php echo $row['activity_id']; ?>' class='confirmation'><img src='img/trash2.png' width='24' height='24'></a></td>
		</tr>
<?php
		}
?>
		</table>
	</div>

	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>