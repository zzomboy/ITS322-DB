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
<!--category & picture-->
<div class="admin_full">
	<div class="admin_left">
		<table class="admin_menu">
			<tr>
				<th>
					Admin page
				</th>
			</tr>
			<tr>
				<td class="active">
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
				<td>
					<a href="admin_newadmin.php">Add new Admin</a>
				</td>
			</tr>
		</table>
	</div>
<?php
	$q = "select * from article where article_id = ".$_GET['edit_id'];
	$result = $mysqli -> query($q);
	$row=$result->fetch_array();
?>
	<div class="admin_right">
		<div class="post_form">
			<h3>Edit Article</h3>
			<form method="post" action="admin_save_art.php" enctype="multipart/form-data">
				<table class="add_post_tb">
					<tr>
						<td>
							Name : 
						</td>
						<td>
							<input type="text" placeholder="Enter article`s name" name="art_name" value="<?php echo $row['article_name']; ?>" required>
						</td>
						<td></td>
					</tr>					
					<tr>
						<td>
							Author : 
						</td>
						<td>
							<input type="text" placeholder="Enter Author's name" name="art_author" value="<?php echo $row['art_author']; ?>" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Tag : 
						</td>
						<td colspan="2">
							<select class="input_select" name="art_tag">
								<option disabled value>select tag</option>
<?php
									$q2 = "SELECT * FROM tags";
									$result2 = $mysqli -> query($q2);
									while($row2=$result2->fetch_array()){
										if($row['tag_id'] == $row2['tag_id']){
											echo "<option value='".$row2['tag_id']."' selected>".$row2['tag_name']."</option>";
										}else{
											echo "<option value='".$row2['tag_id']."'>".$row2['tag_name']."</option>";
										}
									}
?>
							</select> or
							<input type="text" placeholder="Enter new tag" name="new_tag" style="max-width: 204px;">
						</td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: center;padding: 0px;">
<?php
							$text = str_replace("\'", "'", $row['article_text']);
?>
							<textarea name="article_text" rows="40" required><?php echo $text; ?></textarea>
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
<?php
							$text2 = str_replace("?#", " , ", $row['article_imgs']);
?>
							<div id="file_show" style="font-size: 15px;padding: 3px 0 0 155px"><?php echo $text2; ?></div>
    					</td>
					</tr>
					<tr>
						<td>
							<div id="hidden_filename"></div>
							<input type="hidden" name="art_id" value="<?php echo $_GET['edit_id']; ?>">
							<input type="hidden" name="art_count" value="<?php echo $row['visitor_art']; ?>">
							<input type="hidden" name="art_oldtag" value="<?php echo $row['tag_id']; ?>">
						</td>
						<td colspan="2">
    						<div class="post_form_bt">
      							<button type="submit" class="addbt" name="submit" value="Add">Save</button>
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