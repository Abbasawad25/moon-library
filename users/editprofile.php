<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>
<?php
include('../server.php');
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 

$id = $row['id'];
?>
	<?php
	$max_image = $stm['max_image'];
$a = $_POST['reg_user'];
   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST") {
                   
                   $name = $_POST['name'];
                   $username = $_POST['username'];
                   $email = $_POST['email'];
                   $sex = $_POST['sex'];
                   $country = $_POST['country'];
                   $state = $_POST['state'];
                   $city = $_POST['city'];
                   $living = $_POST['living'];
                   $street_addres = $_POST['street_addres'];
                   $bio = $_POST['bio'];
                   $number = $_POST['number'];
                   if (empty($name)) { array_push($errors, $lang['name'] . " is required"); }
                   $name = filter_var($name,FILTER_SANITIZE_STRING);
                   if (empty($username)) { array_push($errors, $lang['username'] . " is required"); }
                   $username = filter_var($username,FILTER_SANITIZE_STRING);
                   if (empty($email)) { array_push($errors, $lang['email'] . " is required"); }
                   $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                  if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
   	array_push($errors, $lang['email'] . "vieew is not true");
   	}
   if (empty($country)) { array_push($errors, $lang['country'] . " is required"); }
                   $country = filter_var($country,FILTER_SANITIZE_STRING);
                   if (empty($city)) { array_push($errors, $lang['city'] . " is required"); }
                   $city = filter_var($city,FILTER_SANITIZE_STRING);
                   if (empty($living)) { array_push($errors, $lang['living'] . " is required"); }
                   $living = filter_var($living,FILTER_SANITIZE_STRING);
                   if (empty($street_addres)) { array_push($errors, $lang['street_addres'] . " is required"); }
                   $street_addres = filter_var($street_addres,FILTER_SANITIZE_STRING);
                   if (empty($number)) { array_push($errors, $lang['number'] . " is required"); }
                   $number = filter_var($number,FILTER_SANITIZE_NUMBER_INT);
                  if(filter_var($number,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['number'] . " is not true");
   	}
   if (empty($sex)) { array_push($errors, $lang['sex'] . " is required"); }
                   $sex = filter_var($sex,FILTER_SANITIZE_NUMBER_INT);
                  if(filter_var($sex,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['sex'] . "is not true");
   	}
   if (empty($bio)) { array_push($errors, $lang['bio'] . " is required"); }
                   $bio = filter_var($bio,FILTER_SANITIZE_STRING);
                   if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = $username . random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < $max_image) {
				$fileDestination = '../upload/images/users/'. $imgName;
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
   	$imgName = $row['image'];
   	}                      
                   
                   $sql = "UPDATE users set  name='$name',username='$username',email='$email',country='$country',city='$city',state='$state',living='$living',street_address='$street_addres',bio='$bio',num='$number',sex='$sex',image='$imgName' where id='$id' ";
                   if ($conn->query($sql)  === TRUE) { ?>
                   	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php }
else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }              
                   }                   
 ?>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="">
                    <img src="../upload/images/users/<?php echo $row['image'] ;?>" alt="">
                </a>
                <h1><?php echo $row['name'];?></h1>
                <p><?php echo $row['email'] ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i><?php echo $lang['Profile'] ?></a></li>
                <li class=" active nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i><?php echo $lang['Edit-Profile'] ?></a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <div class="panel-body bio-graph-info">
            <h1><?php echo $lang['Update-Profile'] ?></h1>
            <h6 style="color: green"><i>edit</i></h6>
            <h6 style="color: red"><i></i></h6>
            <h6 style="color: red"><i></i></h6>
            <h6 style="color: red"><i></i></h6>
            <form class="form-horizontal" role="form" action="editprofile.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Information-about-me'] ?></label>
                    <div class="col-lg-10">
                        <textarea name="bio" id="" class="form-control" cols="30" rows="10">
                            <?php echo $row['bio'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Forename'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['name'] ?>" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['username'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['username'] ?>" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['email'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['email'] ?>" name="email">
                    </div>
                </div>
                

                
                
                 <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['country'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" name="country" class="form-control" id="co" placeholder=" " value="<?php echo $row['country'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['state'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" name="state" class="form-control" id="state" placeholder=" " value="<?php echo $row['state'] ?>">
                    </div>
                </div>
              <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['city'] ;?></label>
                    <div class="col-lg-6">
                        <input type="text" name="city" class="form-control" id="site" placeholder=" " value="<?php echo $row['city'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['street_address'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" name="street_addres" class="form-control" id="street_address" placeholder=" " value="<?php echo $row['street_address'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['living'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" name="living" class="form-control" id="living" placeholder=" " value="<?php echo $row['living'] ?>">
                    </div>
                </div>
                            
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Telephone-number'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?php echo $row['num']; ?>" name="number">
                    </div>
                </div>
                <div class="form-group row">
                            <label for="zain" class="col-sm-3 col-form-label"><b><?php echo $lang['sex'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="1" <?php if($row['sex'] == 1){ echo 'selected'; }?>><?php echo $lang['male'] ?></option>
                                    <option value="2" <?php if($row['sex'] == 2){ echo 'selected'; }?>><?php echo $lang['female'] ?></option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                    
                <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image_section'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                                   
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-success" name="reg_user" value="<?php echo $lang['save'] ?>"></input>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>

<?php require_once 'footer.php'?>
