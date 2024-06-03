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
$social = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM social where id='1' ")); 
$username = $row['username'];
$a = $_POST['reg_user'];
if(isset($a) and $row['role'] == 1 or $row['role'] == 2) {
   if(isset($a)) {
                   $google = $_POST['google'];
                   if (empty($google)) { array_push($errors, "link google plus  is required"); }
                   $google = filter_var($google,FILTER_SANITIZE_STRING);
                   
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
                 $folowgoogle = $_POST['folowgoogle'];
                   if (empty($folowgoogle)) { array_push($errors, "folow nhmbe plgoihle plus link is required"); }
                   $folowgoogle = filter_var($folowgoogle,FILTER_SANITIZE_NUMBER_INT);
                 $ffacebook = $_POST['ffacebook'];
                   if (empty($ffacebook)) { array_push($errors, "folow facebook link is required"); }
                   $ffacebook = filter_var($ffacebook,FILTER_SANITIZE_NUMBER_INT);
                 $folowyoutube = $_POST['folowyoutube'];
                   if (empty($folowyoutube)) { array_push($errors, "youtube folow numbw link is required"); }
                   $folowyoutube = filter_var($folowyoutube,FILTER_SANITIZE_NUMBER_INT);
                 $folowtwitter = $_POST['folowtwitter'];
                   if (empty($folowtwitter)) { array_push($errors, "twitter folow number link is required"); }
                   $folowtwitter = filter_var($folowtwitter,FILTER_SANITIZE_NUMBER_INT);
                 
 
 $update = "UPDATE social set google='$google',facebook='$facebook',youtube='$youtube',twitter='$twitter',Instagram='$Instagram',pinterest='$pinterest',folowfacebook='$ffacebook',folowgoogle='$folowgoogle',folowyoutube='$folowyoutube',folowtwitter='$folowtwitter' where id='1' ";
 if(mysqli_query($conn,$update)){
 	echo "good" ;
 	}else{
 	echo "فشل";
 	
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
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_link'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['Links-to-your-social-networking-sites'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="social.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['googleplus'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" required class="form-control" id="name" placeholder="<?php echo $lang['googleplus'] ?>" name="google" value="<?php echo $social['google'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook" class="col-sm-3 col-form-label"><b><?php echo $lang['faecbook-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="facebook" placeholder="<?php echo $lang['faecbook-link'] ?>" name="facebook" value="<?php echo $social['facebook'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="youtube" class="col-sm-3 col-form-label"><b><?php echo $lang['youtube-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="name_author" placeholder="<?php echo $lang['youtube-link'] ?>" name="youtube" value="<?php echo $social['youtube'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="insta" class="col-sm-3 col-form-label"><b><?php echo $lang['instagram-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="insta" placeholder="<?php echo $lang['instagram-link'] ?>" name="Instagram" value="<?php echo $social['Instagram'] ;?>" dir="auto">
                            </div>
                        </div>                    
                     <div class="form-group row">
                            <label for="url" class="col-sm-3 col-form-label"><b><?php echo $lang['twitter-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="url" placeholder="<?php echo $lang['twitter-link'] ?>" name="twitter" value="<?php echo $social['twitter'] ;?>" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-3 col-form-label"><b>pinterest</b></label>
                            <div class="col-sm-9">
                                <input type="url"  class="form-control" id="tag" placeholder="<?php echo $lang['link'] ?>" name="pinterest" dir="auto" value="<?php echo $social['pinterest'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f" class="col-sm-3 col-form-label"><b><?php echo $lang['number_of_your_followers'] . " : " . $lang['facebook'];?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="f" placeholder="<?php echo $lang['number_of_your_followers'] . " : " .  $lang['facebook'];?>" name="ffacebook" dir="auto" value="<?php echo $social['folowfacebook'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="y" class="col-sm-3 col-form-label"><b><?php echo $lang['number_of_your_followers'] . " : " . $lang['youtube'];?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="y" placeholder="<?php echo $lang['number_of_your_followers'] . " : " . $lang['youtube'];?>" name="folowyoutube" dir="auto" value="<?php echo $social['folowyoutube'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="t" class="col-sm-3 col-form-label"><b><?php echo $lang['number_of_your_followers'] . " : " . $lang['twitter'];?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="t" placeholder="<?php echo $lang['number_of_your_followers'] . " : " . $lang['twitter'];?>" name="folowtwitter" dir="auto" value="<?php echo $social['folowtwitter'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="g" class="col-sm-3 col-form-label"><b><?php echo $lang['number_of_your_followers'] . " : " . $lang['googleplus'];?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="g" placeholder="<?php echo $lang['number_of_your_followers'] . " : " . $lang['googleplus'];?>" name="folowgoogle" dir="auto" value="<?php echo $social['folowgoogle'] ;?>">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>