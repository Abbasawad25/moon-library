<?php require_once 'header.php' ?>

    
    
<?php

$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$site = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM site where id='1' ")); 

if (isset($_POST['reg_user'])) {
}
?>
	<?php

$iduser = $row['id'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $iduser = $row['iduser'];
                      $name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
                      $key_languages = $_POST['key_languages'];
                      if (empty($key_languages)) { array_push($errors, "key lang en is required"); }
 $key_languages = filter_var($key_languages,FILTER_SANITIZE_STRING);

				$sql = "INSERT INTO languages(name,key_languages,iduser) VALUES ('$name','$key_languages','$iduser')";
if ($conn->query($sql) === TRUE) {
echo   '<script>alert("it was successful تم الأمر بنجاح طلبك في انتظار الموافقة")</script>';
$last_id = $conn->name;
   
} else {
	echo '<script>alert("There was a problem فشل حدثت مشكلة ما الرجاء المخاول مرة آخرى")</script>';
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			
	
                   
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['about_web'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['about_web'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="mangelang.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name-of-the-lang'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name-of-the-lang'] ?>" name="name" value="<?php echo $languages['name'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des" class="col-sm-3 col-form-label"><b><?php echo $lang['key_languages'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="des" placeholder="<?php echo $lang['key_languages'] ?>" name="key_languages" value="">
                            </div>
                        </div>
                        
                    
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>