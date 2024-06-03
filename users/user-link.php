<?php require_once 'header.php' ?>

    
    
<?php
$namesite = $lang['namesite'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if (isset($_POST['reg_user'])) {
}
?>
	<?php
$status = 1;
$iduser = $row['id'];
$user_link = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user_link where iduser='$iduser' ")); 
$username = $row['username'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $web = $_POST['web'];
                   if (empty($web)) { array_push($errors, "link web  is required"); }
                   $web = filter_var($web,FILTER_SANITIZE_STRING);
                   
                      $facebook = $_POST['facebook'];
                      $facebook = filter_var($facebook,FILTER_SANITIZE_STRING);
                      if (empty($facebook)) { array_push($errors, "facebook link  is required"); }
                      $youtube = $_POST['youtube'];
                      $youtube = filter_var($youtube,FILTER_SANITIZE_STRING);
                      if (empty($facebook)) { array_push($errors, "facebook link  is required"); }
                      $twitter = $_POST['twitter'];
                   if (empty($twitter)) { array_push($errors, "twitter link  is required"); }
                   $twitter = filter_var($twitter,FILTER_SANITIZE_STRING);
                   $Instagram = $_POST['Instagram'];
                   if (empty($Instagram)) { array_push($errors, "instagram-link  is required"); }
                   $Instagram = filter_var($Instagram,FILTER_SANITIZE_STRING);                   
                   $pinterest = $_POST['pinterest'];
                   if (empty($pinterest)) { array_push($errors, "pinterest link is required"); }
                   $pinterest = filter_var($pinterest,FILTER_SANITIZE_STRING);
                 $user_check_query = "SELECT * FROM user_link WHERE iduser='$iduser' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['iduser'] === $iduser) {
 $update = "UPDATE user_link set web='$web',facebook='$facebook',youtube='$youtube',twitter='$twitter',Instagram='$Instagram',pinterest='$pinterest' where iduser='$iduser' ";
 if(mysqli_query($conn,$update)){
 	echo $lang['it_was_successfully'] ;
 	}else{
 	echo $lang['This-problem-has-happened-please-retry'];
 	}
 
 
}
 
 }
 else{
     $sql = "INSERT INTO user_link(iduser,web,facebook,youtube,twitter,Instagram,pinterest)
VALUES ('$iduser','$web','$facebook','$youtube','$twitter','$Instagram','$pinterest')";
if ($conn->query($sql) === TRUE) {
echo   $lang['it_was_successfully'];
$last_id = $conn->name;
   
} else {
	echo $lang['This-problem-has-happened-please-retry'];
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			  }             
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['Links-to-your-social-networking-sites'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['Links-to-your-social-networking-sites'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="user-link.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['you-web-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="name" placeholder="<?php echo $lang['you-web-link'] ?>" name="web" value="<?php echo $user_link['web'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook" class="col-sm-3 col-form-label"><b><?php echo $lang['faecbook-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="facebook" placeholder="<?php echo $lang['faecbook-link'] ?>" name="facebook" value="<?php echo $user_link['facebook'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="youtube" class="col-sm-3 col-form-label"><b><?php echo $lang['youtube-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="name_author" placeholder="<?php echo $lang['youtube-link'] ?>" name="youtube" value="<?php echo $user_link['youtube'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="insta" class="col-sm-3 col-form-label"><b><?php echo $lang['instagram-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="insta" placeholder="<?php echo $lang['instagram-link'] ?>" name="Instagram" value="<?php echo $user_link['Instagram'] ;?>" dir="auto">
                            </div>
                        </div>                    
                     <div class="form-group row">
                            <label for="url" class="col-sm-3 col-form-label"><b><?php echo $lang['twitter-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="url" placeholder="<?php echo $lang['twitter-link'] ?>" name="twitter" value="<?php echo $user_link['twitter'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-3 col-form-label"><b>pinterest</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tag" placeholder="<?php echo $lang['link'] ?>" name="pinterest" dir="auto" value="<?php echo $user_link['pinterest'] ;?>">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>