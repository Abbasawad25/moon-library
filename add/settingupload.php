<?php require_once 'header.php' ?>

    
    
<?php
/*
include ('../UserInformation.php');
include ('../get.php');
*/
  $date = date('Y:m:d h:i:s');
  $ip = UserInfo::get_ip();
  $uos = substr($uos,30,13);
  $os = $uos;
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$role =  $row['role']; 
$id    =     $row['id'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM stm where id='1' ")); 
$mak = $ro['massage'];

$pro = $_POST['pro'];
if($role == 1 OR $role == 2){
if(isset($pro)){
	$updo = $_POST['massage'];
	$mg = $_POST['mg'];
	if (!empty($updo)) { 
   $massage = $_POST['massage'];
 }else{
 	$massage = $mg;
 	}
 
	$max_image = $_POST['max_image'];
	$max_file = $_POST['max_file'];
	$image_format = $_POST['image_format'];
	$book_format = $_POST['book_format'];
	
	
	if (empty($max_image)) { array_push($errors, $lang['max_upload_image'] . " is required"); }
   $max_image = filter_var($max_image,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($max_image,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['max_upload_image']);
   	}
   if (empty($max_file)) { array_push($errors, $lang['max_upload_file_book'] . " is required"); }
   $max_file = filter_var($max_file,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($max_file,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['max_upload_file_book'] . " already exists");
   	}
   if (empty($image_format)) { array_push($errors, $lang['image_format'] . " is required"); }
   $image_format = filter_var($image_format,FILTER_SANITIZE_STRING);
   if (empty($book_format)) { array_push($errors, $lang['book_format'] . " is required"); }
   $book_format = filter_var($book_format,FILTER_SANITIZE_STRING);
   
   
   
	$sql = "UPDATE stm set max_file='$max_file',max_image='$max_image',image_format='$image_format',book_format='$book_format',ip='$ip',os='$os',iduser='$id',date='$date' where id='1' ";
	if ($conn->query($sql) === TRUE) {
	?>
<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
$last_id = $conn->name;
   
} else {
 ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
 <?php echo "Error: " . $sql . "<br>" . $conn->error;
}
	}else{
		}
		}else{ ?>
			
			<?php }

?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['setting_upload'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"></span>
                </header>
                <div class="card-body">
                    <form action="settingupload.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['max_upload_image'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['enter_max_upload_image'] ?>" name="max_image" value="<?php echo $ro['max_image'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clouds" class="col-sm-3 col-form-label"><b><?php echo $lang['max_upload_file_book'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="clouds" placeholder="<?php echo $lang['enter_max_upload_file_book'] ?>" name="max_file" value="<?php echo $ro['max_file'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clouds" class="col-sm-3 col-form-label"><b><?php echo $lang['image_format'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="clouds" placeholder="<?php echo $lang['enter_image_format'] ?>" name="image_format" value="<?php echo $ro['image_format'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clouds" class="col-sm-3 col-form-label"><b><?php echo $lang['book_format'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="clouds" placeholder="<?php echo $lang['enter_book_format'] ?>" name="book_format" value="<?php echo $ro['book_format'] ;?>">
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="pro" value="<?php echo $lang['send'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>