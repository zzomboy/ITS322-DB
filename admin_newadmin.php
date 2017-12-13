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
		$sortby = "article_time desc";
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
				<td>
					<a href="admin_messages.php">View Messages</a>
				</td>
			</tr>
			<tr>
				<td class="active">
					<a href="admin_newadmin.php">Add new Admin</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="admin_right">
		<div class="post_form">
			<h3>Add new Admin</h3>
			<form method="post" action="admin_save_new_admin.php" enctype="multipart/form-data">
				<table class="add_post_tb">
					<tr>
						<td>
							Email :
						</td>
						<td>
							<input type="email" placeholder="Enter Email" name="aemail" required>
						</td>
						<td></td>
					</tr>

					<tr>
						<td>
							Password :				
						</td>
						<td>
							<input type="password" placeholder="Enter Password" name="apw" required>
						</td>
						<td></td>
					</tr>

					<tr>
						<td>
							Repeat Password :
						</td>
						<td>
							<input type="password" placeholder="Re-enter Password" name="apw_repeat" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<div class="post_form_bt">
									<button type="submit" class="addbt" name="submit" value="Add">Add</button>
									<button type="reset"  class="cancelbtn">Reset</button>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
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