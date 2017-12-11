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
				<td class="active">
					<a href="admin_addpost.php">New Article & Activity</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_messages.php">View Messages</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="admin_right">
		<div class="post_form">
			<h3>Add new Activity</h3>
			<form method="post" action="admin_save_new_act.php" enctype="multipart/form-data">
				<table class="add_post_tb">
					<tr>
						<td>
							Name : 
						</td>
						<td>
							<input type="text" placeholder="Enter activity`s name" name="act_name" required>
						</td>
						<td></td>
					</tr>					
					<tr>
						<td>
							Location : 
						</td>
						<td>
							<input type="text" placeholder="Enter location" name="act_locat" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Date : 
						</td>
						<td colspan="2">
							<br>1 day<br>
							<input type="date" class="input_select" name="act_date" style="width: 157px">
							<input type="time" class="input_select" name="act_time">
							<br>or Between<br>
							<input type="date" class="input_select" name="act_start" style="width: 157px"> and
							<input type="date" class="input_select" name="act_end" style="width: 157px"> 
						</td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: center;padding: 0px;">
							<textarea name="activity_text" rows="40" required></textarea>
						</td>
					</tr>
					<tr>
						<td style="padding: 18px 20px 18px 0px;">
							Image : 
						</td>
						<td colspan="2">
							<label class="filecon">
								<strong>Choose an image...</strong>
								<input type="file" id="image" name="fileToUpload[]" onchange="show_name()" multiple>
							</label>
							<div id="file_show" style="font-size: 15px;padding: 3px 0 0 155px"></div>
    					</td>
					</tr>
					<tr>
						<td>
							<div id="hidden_filename"></div>
						</td>
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

    function show_name() {
	    if (document.getElementById('image').value === ""){
	    	document.getElementById('hidden_filename').innerHTML='<input type="hidden" name="pimg" value="">';
	    }
	    else{
	    	var filenametxt="",filenameshow="";
	    	var files = $('#image').prop("files");
	  		var names = $.map(files, function(val) { return val.name; });

	    	for (var i = 0; i < names.length; i++) {
	    		if (i !== names.length-1) {
	    			filenametxt = filenametxt+names[i]+"?#";
	    			filenameshow = filenameshow+names[i]+" , ";
	    		}else{
	    			filenametxt = filenametxt+names[i];
	    			filenameshow = filenameshow+names[i];
	    		}
	    		
	    	}
	    	document.getElementById('hidden_filename').innerHTML='<input type="hidden" name="pimg" value="'+filenametxt+'"> <input type="hidden" name="nimg" value="'+names.length+'">';
	    }
	    document.getElementById('file_show').innerHTML = filenameshow;
	};
</script>