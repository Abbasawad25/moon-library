<?php require_once 'header.php' ?>

    
    
<?php

     $a = $_POST['reg_user'];
     $iduser = $row['id'];
     $edit   =   $_POST['edit'];
     $idapp =  $_POST['id'];    
     $editapp = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM create_apk where id='$idapp' ")); 

    if(isset($a)){
    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $langd = $_POST['lang'];
    $langd = filter_var($langd,FILTER_SANITIZE_STRING);
    $api_key = $_POST['api_key'];
    $api_key = filter_var($api_key,FILTER_SANITIZE_STRING);
    $nav_app = $_POST['nav_app'];
    $nav_app = filter_var($nav_app,FILTER_SANITIZE_NUMBER_INT);
    $link_web = $_POST['link_web'];
    $link_web = filter_var($link_web,FILTER_SANITIZE_STRING);
    $status = $_POST['status_app'];
    $status  = filter_var($status,FILTER_SANITIZE_NUMBER_INT);
    $link  = $_POST['link'];
    $link = filter_var($link,FILTER_SANITIZE_STRING);
    $link_download = $_POST['link_download'];
    $link_download = filter_var($link_download,FILTER_SANITIZE_STRING);
    $link_info = $_POST['link_info'];
    $user_check_query = "SELECT * FROM api WHERE iduser='$iduser' OR api_key='$api_key' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['api_key'] === $api_key) {
 
array_push($errors, "إسم المستخدم موجد الرجاء كتابة اسم غيره");
$logo = $_FILES['logo']['name'];
	$logoTmpName =$_FILES['logo']['tmp_name'];
	$logoSize = $_FILES['image']['size'];
	$logoError = $_FILES['image']['error'];
	$logoExt = explode('.', $logo);
    
	$logoactualFileExt = strtolower(end($logoExt));
	$logo = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $logoactualFileExt ;
	$logoallowed = array('jpg','jpeg','png');
if (in_array($logoactualFileExt, $logoallowed)) {
		if ($logoError === 0) {
			if ($logoSize < 500000) {
				$logofileDestination = '../upload/images/saccharine/pay/'. $logo;
				move_uploaded_file($logoTmpName, $logofileDestination);
				} else {
				echo $lang['the_image_size_is _too_large'];
				echo "<script>alert(' حجم الملف كبير جدا')</script>";
 header('REFRESH:0.1;url=paypro.php');
			}
		}else{
			echo $lang['line_to_raise_the_image'];
			echo "<script>alert('خطا برفع الملف')</script>";
 header('REFRESH:0.1;url=paypro.php');
		}
	}else {
			echo $lang['image_type_is_unknown'];
			echo "<script>alert('نوع غير معرف')</script>";
 header('REFRESH:0.1;url=paypro.php');
 
	}

    $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');
if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 500000) {
				$fileDestination = '../upload/images/app/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				if(empty($imgName)){
					$imgName  = $editapp['poster'];
					}
					if(empty($logo)){
					$logo  = $editapp['logo'];
					}
    $sql = "UPDATE create_apk set lang='$langd',api_key='$api_key',name='$name',link_web='$link_web',subject='$content',ip='$ip',os='$os',iduser='$iduser',poster='$imgName',status_app='$status',link_info='$link_info',link='$link',logo='$logo' ";
    if(mysqli_query($conn,$sql)){
    	echo $lang['It_was_successful'];
    	}
    else{
    	echo $lang['there_was_a_problem'];
    	}
    } else {
				echo $lang['the_image_size_is _too_large'];
				echo "<script>alert(' حجم الملف كبير جدا')</script>";
 header('REFRESH:0.1;url=paypro.php');
			}
		}else{
			echo $lang['line_to_raise_the_image'];
			echo "<script>alert('خطا برفع الملف')</script>";
 header('REFRESH:0.1;url=paypro.php');
		}
	}else {
			echo $lang['image_type_is_unknown'];
			echo "<script>alert('نوع غير معرف')</script>";
 header('REFRESH:0.1;url=paypro.php');
 
	}
	}
	
	else{
		echo "This Api key does not exit هذا المفتاح لايوجد";
		}
		}
    }else{
   
    	}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['create_app'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                   <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['The-language'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="lang" id="" class="form-control">
                                    <option value="ar">العربية</option>
                                    </option>
                                    <option value="en">English</option>
                                   
                                </select>
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name-app'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_app'] ?>" name="name" value="<?php echo $editapp['name'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['api_key'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['api_key'] ?>" name="api_key" value="<?php echo $editapp['api_key'] ;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['link_web'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="web" placeholder="<?php echo $lang['link_web'] ?>" name="link_web" value="<?php echo $editapp['link_web'] ;?>">
                            </div>
                        </div>
  <div class="form-group row">
                            <label for="linkinfo" class="col-sm-3 col-form-label"><b><?php echo $lang['link_info'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="linkinfo" placeholder="<?php echo $lang['link_info'] ?>" name="link_info" value="<?php echo $editapp['link_info'] ;?>">
                            </div>
                        </div>                                                                                                                           <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['link_download'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="linkd" placeholder="<?php echo $lang['link_download'] ?>" name="link" value="<?php echo $editapp['link'] ;?>">
                            </div>
                        </div>                                                                                                                           
                                                                                                                         
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="logo">
                            </div>
                        </div>
                           <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
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