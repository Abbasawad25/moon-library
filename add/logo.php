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
if(isset($a) and $row['role'] == 1 or $row['role'] == 2) {
   if(isset($a)) {
                   $iduser = $row['iduser'];
                      $name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
                      $description = $_POST['description'];
                      if (empty($description)) { array_push($errors, "description en is required"); }
 $description = filter_var($description,FILTER_SANITIZE_STRING);
$name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
                      $description = $_POST['description'];
                      if (empty($description)) { array_push($errors, "description en is required"); }
 $description = filter_var($description,FILTER_SANITIZE_STRING);

                      $keywords = $_POST['keywords'];
                      if (empty($keywords)) { array_push($errors, "keywords en is required"); }
 $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);
 $country = $_POST['country'];
                      $country = filter_var($country,FILTER_SANITIZE_STRING);
                      if (empty($country)) { array_push($errors, "country is required"); }
                      $city = $_POST['city'];
                      if (empty($city)) { array_push($errors, "city en is required"); }
 $city = filter_var($city,FILTER_SANITIZE_STRING);
 $number = $_POST['number'];
                      $number = filter_var($number,FILTER_SANITIZE_NUMBER_INT);
                      if (empty($number)) { array_push($errors, "number is required"); }
                      $email = $_POST['email'];
                      if (empty($email)) { array_push($errors, "email en is required"); }
 $email = filter_var($email,FILTER_SANITIZE_EMAIL);
 $footer = $_POST['footer'];
                      $footer = filter_var($footer,FILTER_SANITIZE_STRING);
                      if (empty($footer)) { array_push($errors, "footer is required"); }
                      $link = $_POST['link'];
                      $link = filter_var($link,FILTER_SANITIZE_STRING);
                      if (empty($link)) { array_push($errors, "link is required"); }
                      $title_web = $_POST['title_web'];
                      $title_web = filter_var($title_web,FILTER_SANITIZE_STRING);
                      
                   //icon site
                   if(!empty($_FILES['imageicon']['name'])){
                   $imageiconName = $_FILES['imageicon']['name'];
	$imageiconTmpName =$_FILES['imageicon']['tmp_name'];
	$imageiconSize = $_FILES['imageicon']['size'];
	$imageiconError = $_FILES['imageicon']['error'];
	$imageiconExt = explode('.', $imageiconName);
    
	$ctualFileExt = strtolower(end($imageiconExt));
	$imageiconName = "icon" ."." . $ctualFileExt ;
	$llowed = array('jpg','jpeg','png');

	if (in_array($ctualFileExt, $llowed)) {
		if ($imageiconError === 0) {
			if ($imageiconSize < 500000) {
				$ifileDestination = '../upload/images/site/'. $imageiconName;
				move_uploaded_file($imageiconTmpName, $ifileDestination);
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
   	$imageiconName = $site['icon'];
   	}
                   //logo
                   if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = "logo" ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 500000) {
				$fileDestination = '../upload/images/site/'. $imgName;
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
   	$imgName = $site['logo'];
   	}
				$sql = "UPDATE site set  name='$name',title_web='$title_web',description='$description',url='$link',keywords='$keywords',country='$country',city='$city',footer='$footer',email='$email',number_site='$number',iduser='$iduser',ip='$ip',os='$os',logo='$imgName',icon='$imageiconName' where id='1' ";
if ($conn->query($sql) === TRUE) {
?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
$last_id = $conn->name;
   
} else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
}
			
	
                   
   }
   }
   else{
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
                    <form action="logo.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name-of-the-site'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name-of-the-site'] ?>" name="name" value="<?php echo $site['name'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des" class="col-sm-3 col-form-label"><b><?php echo $lang['Site-address'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="des" placeholder="<?php echo $lang['Site-address'] ?>" name="title_web" value="<?php echo $site['title_web'] ;?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="des" class="col-sm-3 col-form-label"><b><?php echo $lang['description-of-the-site'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="des" placeholder="<?php echo $lang['description-of-the-site'] ?>" name="description" value="<?php echo $site['description'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keywords" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="keywords" placeholder="<?php echo $lang['Tagged'] ?>" name="keywords" value="<?php echo $site['keywords'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label"><b><?php echo $lang['country'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="country" placeholder="<?php echo $lang['country'] ?>" name="country" value="<?php echo $site['country'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label"><b><?php echo $lang['sity'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="city" placeholder="<?php echo $lang['sity'] ?>" name="city" value="<?php echo $site['city'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-sm-3 col-form-label"><b><?php echo $lang['Site-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="link" placeholder="<?php echo $lang['Site-link'] ?>" name="link" value="<?php echo $site['url'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label"><b><?php echo $lang['Website-phone-number'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="phone" placeholder="<?php echo $lang['Website-phone-number'] ?>" name="number" value="<?php echo $site['number_site'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['My-email-site'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="email" placeholder="<?php echo $lang['My-email-site'] ?>" name="email" value="<?php echo $site['email'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fo" class="col-sm-3 col-form-label"><b><?php echo $lang['footer-txt'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="fo" placeholder="<?php echo $lang['footer-txt'] ?>" name="footer" value="<?php echo $site['footer'] ;?>">
                            </div>
                        </div>   
   
   
   
                        <!-- end container-fluid -->
    <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../upload/images/site/<?php echo $site['logo']?>" alt="" class="img-fluid">
        </div>
    </div>
    <!-- end container-fluid -->
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['logo'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['icon_site'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="imageicon" >
                            </div>
                        </div>
                        <!-- end container-fluid -->
       <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../upload/images/site/<?php echo $site['icon']?>" alt="" class="img-fluid">
        </div>
    </div>
    <!-- end container-fluid -->
                        <fieldset class="form-group">
                            
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             <!-- end container-fluid -->
    
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>