<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
// eWallet - PHP Script
// Author: DeluxeScript

include"header.php"; 
if(!defined('PWV1_INSTALLED')){
    #header("HTTP/1.0 404 Not Found");
	#exit;
}
if(isset($_GET['b'])) {
$b = $_GET['b'];


if($b == "set_default") {
	$id = $_GET['id'];
	if(!file_exists("../languages/$id.php")) {
		header("Location: ./?a=languages");
	}
	?>
	

           <div class="col-md-12">
				<div class="card">
					<div class="card-body">
					<?php
					$update = $db->query("UPDATE settings SET default_language='$id'");
					echo "New default language is <b>$id</b>.";
					?>
					
					</div>
				</div>
			</div>
	<?php
} elseif($b == "add") {
	?>
	

           <div class="col-md-12">
				<div class="card">
					<div class="card-body">
					
					<?php
					if(isset($_POST['btn_save'])) {
						$lang_name = $_POST['lang_name'];
						
						if(empty($lang_name)) { echo error("Please enter language name."); }
						
						elseif(file_exists("../languages/$lang_name.php")) { echo error("Language <b>$lang_name</b> already exists."); }
						else {
						$contents = '<?php
// '.$id.' Language for DeluxeScript PHP Script
// Last update: '.date("d/m/Y H:i").'
$lang = array();
';
						$key = $_POST['key'];
						foreach($_POST['key'] as $k=>$v) {
							$contents .= '$lang["'.$k.'"] = "'.$v.'";
';
						}
						$contents .= '?>';
						$update = file_put_contents("../languages/$lang_name.php",$contents);
						if($update) {
							echo "Language <b>$lang_name</b> was added successfully.";
						} else {
							echo error("Please set chmod 777 of file <b>languages</b> directory.");
						}
						}
					}
					?>
				
					<form action="" method="POST">
						<div class="form-group">
							<label>Language name</label>
							<input type="text" class="form-control" name="lang_name">
						</div>
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="30%">Key</th>
									<th width="70%">Value</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include("../languages/ar.php");
							foreach($lang as $k=>$v) {
								echo '<tr>
										<td><b>'.$k.'</b></td>
										<td><input type="text" class="form-controL" name="key['.$k.']" value="'.$v.'"></td>
									</tr>';
							}
							?>	
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary" name="btn_save"><i class="fa fa-check"></i> Save changes</button>
					</form>
					
					</div>
				</div>
			</div>
	<?php
} elseif($b == "edit") {
	$id = $_GET['id'];
	if(!file_exists("../languages/$id.php")) {
		
	}
	?>
	

           <div class="col-md-12">
				<div class="card">
					<div class="card-body">
					<h3><?php echo filter_var($id, FILTER_SANITIZE_STRING); ?></h3>
					<br>
					
					<?php
					if(isset($_POST['btn_save'])) {
						$contents = '<?php
// '.$id.' Language for eWallet PHP Script
// Last update: '.date("d/m/Y H:i").'
$lang = array();
';
						$key = $_POST['key'];
						foreach($_POST['key'] as $k=>$v) {
							$contents .= '$lang["'.$k.'"] = "'.$v.'";
';
						}
						$contents .= '?>';
						$update = file_put_contents("../languages/$id.php",$contents);
						if($update) {
							echo "Your changes was saved successfully.";
						} else {
							echo error("Please set chmod 777 of file <b>languages</b> directory.");
						}
					}
					?>
				
					<form action="" method="POST">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="30%">Key</th>
									<th width="70%">Value</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include("../languages/$id.php");
							foreach($lang as $k=>$v) {
								echo '<tr>
										<td><b>'.$k.'</b></td>
										<td><input type="text" class="form-controL" name="key['.$k.']" value="'.$v.'"></td>
									</tr>';
							}
							?>	
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary" name="btn_save"><i class="fa fa-check"></i> Save changes</button>
					</form>
					
					</div>
				</div>
			</div>
	<?php
} elseif($b == "delete") {
	$id = $_GET['id'];
	if(!file_exists("../languages/$id.php")) {
		#
	}
	?>
	

           <div class="col-md-12">
					<div class="card">
                        <div class="card-body">
			<?php
			if($settings['default_language'] == $id) { 
				echo error("$id is default language. Please change it and then delete it.");
			} else {	
				@unlink("../languages/$id.php");
				echo "Language <b>$id</b> was deleted successfully.";
			}
			?>
		</div>
	</div>
	</div>
	<?php
} } else {
?>


           <div class="col-md-12">
					<div class="card">
                        <div class="card-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="75%">Language name</th>
					<th width="25%">Default</th>
					<th width="5%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($handle = opendir('../languages')) {
					while (false !== ($file = readdir($handle)))
					{
						if ($file != "." && $file != ".." && $file != "index.php" && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
						{
							$lang = str_ireplace(".php","",$file);
							if($settings['default_language'] == $lang) { $sel ='<i class="fa fa-check"></i>'; } else { $sel = '<i class="fa fa-times"></i> (<a href="lang.php?b=set_default&id='.$lang.'">Set default</a>)'; } 
							echo '<tr>
									<td>'.$lang.'</td>
									<td>'.$sel.'</td>
									 <td>
										<a href="lang.php?b=edit&id='.$lang.'" title="Edit"><i class="fa fa-pencil"></i>edit</a>
										<a href="lang.php?b=delete&id='.$lang.'" title="Delete"><i class="fa fa-times"></i>delet</a>
									</td>
									
								</tr>' ;
						}
					}
					closedir($handle);
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php
}
?>