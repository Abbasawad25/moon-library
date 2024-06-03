<?php require_once 'header.php' ?>
<?php

$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if (isset($_POST['reg_user'])) {
}
?>
	<?php
	
$role = $row['role'];
$iduser= $row['iduser'];
$a = $_POST['reg_user'];
                    if($role == 1 OR $role == 2){
                   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST"){
                      $name = $_POST['title'];
                   
                   $content = $_POST['subject'];
                   $status = $_POST['status'];
                   $type = $_POST['type'];
                   $id_users = $_POST['users'];
                   
                   if (empty($name)) { array_push($errors, $lang['name']); }
   $name = filter_var($name,FILTER_SANITIZE_STRING);
   if (empty($content)) { array_push($errors, $lang['content']); }
   $content = filter_var($content,FILTER_SANITIZE_STRING);
   if (empty($status)) { array_push($errors, $lang['status']); }
   $status = filter_var($status,FILTER_SANITIZE_NUMBER_INT);
   if (empty($type)) { array_push($errors, $lang['message_type']); }
   $type = filter_var($type,FILTER_SANITIZE_NUMBER_INT);
   
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
				$fileDestination = '../upload/images/nav/'. $imgName;
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
	
   
                   
        
       $sql = "INSERT INTO notifications(title,subject,status,type,iduser,image,id_cart) VALUES('$name','$content','$status','$type','$id_users','$imgName','$id_users')";
if ($conn->query($sql) === TRUE) {
  

  ?>
  	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
  
  	
 <?php
                   	

} else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
	<?php
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{ ?>
	
	<?php }
	}else{
		}
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['send_notifications'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['add_send_notifications'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title-p'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['title-p'] ;?>" name="title">
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
                            <label for="status" class="col-sm-3 col-form-label"><b><?php echo $lang['status'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    
                                    <option value="1"><?php echo $lang['Active'] ?></option>
                                    <option value="0"><?php echo $lang['Inactive'] ?></option>                         
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><b><?php echo $lang['message_type'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="type" id="type" class="form-control">
                                    
                                    <option value="1"><?php echo $lang['notice_on_site'] ?></option>
                                    <option value="2"><?php echo $lang['notice_on_email'] ?></option>                         <option value="3"><?php echo $lang['notice_on_site_and_email'] ?></option> 
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><b><?php echo $lang['select_user'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="users" id="users" class="form-control" multiple>
                                    
                                    <option value="0"><?php echo $lang['all'] ;?></optino>
												
                                    <?php
                                    $sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
                            <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
												                          <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                </select>
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