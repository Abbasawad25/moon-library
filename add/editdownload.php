<?php require_once 'header.php' ?>

    
    
<?php
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$download = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM downloadpage where id='1' ")); 

if (isset($_POST['reg_user'])) {
}
?>
	<?php
$iduser = $row['id'];
$username = $row['username'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $subject = $_POST['subject'];
                   if (empty($subject)) { array_push($errors, "subject book is required"); }
                   $keywords = $_POST['keywords'];
                      $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);
                      $how = $_POST['how'];                                         	                  $content = $_POST['content'];
	                  $after = $_POST['after'];
                   if (empty($after)) { array_push($errors, "aftet book is required"); }
                   
                   
                   
	
                   //book img
                   if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."-" . $namesite ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 5000000) {
				$fileDestination = '../upload/images/blog/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				} else {
				echo $lang['the_image_size_is _too_large'];
			}
		}else{
			echo $lang['line_to_raise_the_image'];
		}
	}else {
			echo $lang['image_type_is_unknown'];
	}
	}
	else{
   	$imgName = $download['image'];
   	}
	
                   //book imag
                   
				
				$sql = "UPDATE downloadpage set subject='$subject',after='$after',down_how='$how',down_before='$content',image='$imgName',iduser='$iduser',keywords='$keywords' where id='1' ";
if ($conn->query($sql) === TRUE) {
echo    $lang['it_was_successfully'] . 
$last_id = $conn->name;
   
} else {
	echo $lang['This-problem-has-happened-please-retry'] ;
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			                       
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['edit_download'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['down_blog'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="subject" id="" cols="30" rows="10" class="summernote" dir="auto">
                                	<?php echo $download['subject'] ;?>
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['how_down_bolg'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="how" id="" cols="30" rows="10" class="summernote" dir="auto"><?php echo $download['down_how'] ;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['befoer_blog_link_download'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" class="summernote" dir="auto">
                                	<?php echo $download['down_before'] ;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['after_blog_link_download'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="after" id="" cols="30" rows="10" class="summernote" dir="auto">
                                	<?php echo $download['after'] ;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="keywords" placeholder="keywords" name="keywords" value="<?php echo $download['keywords'] ;?>">
                            </div>
                        </div>
   
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        
                      
                        <fieldset class="form-group">
                            
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>