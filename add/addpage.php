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
if ($role == 1 OR $role == 2) {
   if(isset($a)) {
                   $subject = $_POST['subject'];
                   if (empty($subject)) { array_push($errors, "subject content is required"); }
                 
                   $name = $_POST['name_page'];
                   if (empty($name)) { array_push($errors, "name english is required"); }
                   $name = filter_var($name,FILTER_SANITIZE_STRING);
                   $description = $_POST['description'];
                   if (empty($description)) { array_push($errors, "Description page is required"); }
                   $description = filter_var($description,FILTER_SANITIZE_STRING);
                   $keywords = $_POST['keywords'];
                      $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);                  
                      $title_page = $_POST['title_page'];
                   if (empty($title_page)) { array_push($errors, "title page is required"); }
                                       	                  
                   
                   //book img
                   
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
				$fileDestination = '../upload/images/page/'. $imgName;
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
	
	
                   //book imag
                   
				
				$sql = "INSERT INTO page(title,name,subject,description,keywords,image,iduser) VALUES('$title_page','$name','$subject','$description','$keywords','$imgName','$iduser')";
if ($conn->query($sql) === TRUE) {
echo    $lang['it_was_successfully'] . 
$last_id = $conn->name;

} else {
	echo $lang['This-problem-has-happened-please-retry'] ;
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			                       
   }
   }else{
   	}
   
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_page'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['add_page'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_page'] ;?>" name="name_page" value="">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['title_page'] ;?>" name="title_page" value="">
                            </div>
                        </div>
                       
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['description_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="description" placeholder="<?php echo $lang['description_page'] ;?>" name="description" value="">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="keywords" placeholder="keywords" name="keywords" value="">
                            </div>
                        </div>
                           
<div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="subject" id="" cols="30" rows="10" class="summernote" dir="auto">
                               
                                </textarea>
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