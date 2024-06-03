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
//include("../server.php");
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$role =  $row['role']; 
$id    =     $row['id'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM stmp where id='1' ")); 
$stmp = $_POST['stmp'];
if(isset($stmp) and $role === "admin"){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	if (empty($username)) { array_push($errors, "username is required"); }
   $username = filter_var($username,FILTER_SANITIZE_STRING);
   if (empty($password)) { array_push($errors, "password is required"); }
   $password = filter_var($password,FILTER_SANITIZE_STRING);
	
	if (empty($email)) { array_push($errors, "email is required"); }
   $email = filter_var($email,FILTER_SANITIZE_EMAIL);
   if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
   	array_push($errors, "email already exists");
   	}
   if(!empty($_FILES['image']['name'])){
   	$imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
	echo $imgName;
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 5000000) {
				$fileDestination = '../upload/images/stmp/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				$sub = " تم رفع الصور بنجاح";
			} else {
				echo "حجم الملف كبير";
				array_push($errors, " حجم الملف كبير");
			}
		}else{
			//echo "خطا برفع املف";
			array_push($errors, " خطا برفع الملف");
		}
	}else {
			//echo "نوع غير معروف";
			array_push($errors, "نوع غير معروف ");
	}
   	}
   else{
   	$imgName = $ro['image'];
   	}
   $sql = "UPDATE stmp set username='$username',password='$password',email='$email',iduser='$id',ip='$ip',os='$os',image='$imgName',date='$date' where id='1' ";
   if(mysqli_query($conn,$sql)){
   	$sub = " تم الأمر بنجاح";
   	}
   else{
   	array_push($errors, " حدثت مشكلة ");
   	}
   
}
else{
	echo 404;
	}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"> إعداد stmp</h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <p><?php include"../errors.php"; echo $sub;?></p>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="stmp.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label"><b><?php echo $lang['username'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="username" placeholder="username" name="username" value="<?php echo $ro['username'] ;?>">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label"><b><?php echo $lang['password'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="password" required class="form-control" id="password" placeholder="password" name="password" value="<?php echo $ro['password'] ;?>">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['email'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="emai" placeholder="email" name="email" value="<?php echo $ro['email'] ;?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" value="<?php echo $ro['image'] ;?>">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="stmp" value="<?php echo $lang['send'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>