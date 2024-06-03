<?php require_once 'header.php' ?>

    
    
<?php
$role = $row['role'];
$iduser= $row['iduser'];
$a = $_POST['reg_user'];
                    if($role == 1 OR $role == 2){
                   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST"){
                      $name = $_POST['name'];
                   
                   $content = $_POST['content'];
                   $status = $_POST['status'];
                   if (empty($name)) { array_push($errors, $lang['name']); }
   $name = filter_var($name,FILTER_SANITIZE_STRING);
   if (empty($content)) { array_push($errors, $lang['content']); }
   $content = filter_var($content,FILTER_SANITIZE_STRING);
   if (empty($status)) { array_push($errors, $lang['status']); }
   
                   
        
       $sql = "INSERT INTO service(name,content,status,iduser) VALUES('$name','$content','$status','$iduser')";
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
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add-new-service'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="service.php" method="POST" enctype="multipart/form-data">
                        
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title-p'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['title-post'] ?>" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" class="summernote">
                                </textarea>
                            </div>
                        </div>
                    
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0"><b><?php echo $lang['The-status'] ?></b></legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                        	<?php echo $lang['Active'] ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                        	<?php echo $lang['Inactive'] ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['save'] ;?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>