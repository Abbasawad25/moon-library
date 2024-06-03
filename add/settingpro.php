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
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$role =  $row['role']; 
$id    =     $row['id'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM stm where id='1' ")); 
$mak = $ro['massage'];

$pro = $_POST['pro'];
if($role == 1 OR $role == 2 ){
if(isset($pro)){
	$updo = $_POST['massage'];
	$mg = $_POST['mg'];
	if (!empty($updo)) { 
   $massage = $_POST['massage'];
 }else{
 	$massage = $mg;
 	}
 
	$descount = $_POST['descount'];
	$clouds = $_POST['clouds'];
	$maxclouds = $_POST['maxclouds'];
	$view_special_posts = $_POST['view_special_posts'];
	$view_paid = $_POST['view_paid'];
	$view_more = $_POST['view_more'];
	$view_loaded = $_POST['more_loaded'];
	$view_reviews = $_POST['view_reviews'];
	$url = $_POST['url'];
	$meetb = $_POST['meetb'];
	$meetview = $_POST['meetview'];
	$waiting_counter = $_POST['waiting_counter'];
	$limit_registration = $_POST['limit_registration'];
	$g_map = $_POST['g_map'];
	$amount_re = $_POST['amount_re'];
	
	if (empty($descount)) { array_push($errors, "descount is required"); }
   $descount = filter_var($descount,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($descount,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "descount already exists");
   	}
   if (empty($clouds)) { array_push($errors, "clouds is required"); }
   $clouds = filter_var($clouds,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($clouds,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "clouds already exists");
   	}
   if (empty($maxclouds)) { array_push($errors, "maxclouds is required"); }
   $maxclouds = filter_var($maxclouds,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($maxclouds,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "maxclouds = already exists");
   	}
   if (empty($view_reviews)) { array_push($errors, $lang['view_reviews_max']); }
   $view_reviews = filter_var($view_reviews,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($view_reviews,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['view_reviews_max']);
   	}
   if (empty($view_special_posts)) { array_push($errors, "view_special_posts is required"); }
   $view_special_posts = filter_var($view_special_posts,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($view_special_posts,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "view_special_posts & already exists");
   	}
   if (empty($view_paid)) { array_push($errors, "view paid tr is required"); }
   $view_paid = filter_var($view_paid,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($view_paid,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "view_paid # already exists");
   	}
   if (empty($view_more)) { array_push($errors, $lang['view_more_view_posts_max']); }
   $view_more = filter_var($view_more,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($view_more,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['view_More_view_posts_max']);
   	}
//   if (empty($view_loaded) { array_push($errors, $lang['view_more_loaded_posts_max']); }
   $view_loaded = filter_var($view_loaded,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($view_loaded,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['view_more_loaded_posts_max']);
   	}
   if (empty($url)) { array_push($errors, "url is required"); }
   $url = filter_var($url,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($url,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "url already exists");
   	}
   if (empty($meetb)) { array_push($errors, "meetb is required"); }
   $meetb = filter_var($meetb,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($meetb,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "meetb = already exists");
   	}
   if (empty($meetview)) { array_push($errors, "meetview is required"); }
   $meetview = filter_var($meetview,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($meetview,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "THE meet vieew is not true");
   	}
   if (empty($waiting_counter)) { array_push($errors, $lang['enter_the_waiting_time_in_seconds']); }
   $waiting_counter = filter_var($waiting_counter,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($waiting_counter,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['enter_the_waiting_time_in_seconds'] . " already exists");
   	}
   if (empty($amount_re)) { array_push($errors, $lang['view_more_view_posts_max']); }
   $amount_re = filter_var($amount_re,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($amount_re,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['an_amount_when_registering']);
   	}
   if (empty($limit_registration)) { array_push($errors, $lang['limit_registration']); }
   $limit_registration = filter_var($limit_registration,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($limit_registration,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['limit_registration']);
   	}
   if (empty($g_map)) { array_push($errors, $lang['g_map']); }
   
   
   
	$sql = "UPDATE stm set descount='$descount',mincl='$clouds',maxcl='$maxclouds',view_reviews='$view_reviews',view_special_posts='$view_special_posts',view_paid='$view_paid',view_more_loaded_posts='$view_loaded',view_more_posts='$view_more',url='$url',meetb='$meetb',meetview='$meetview',waiting_counter='$waiting_counter',limit_registration='$limit_registration',amount_re='$amount_re',g_map='$g_map',massage='$massage',ip='$ip',os='$os',iduser='$id',date='$date' where id='1' ";
	if ($conn->query($sql) === TRUE) {
	?>
<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
$last_id = $conn->name;
   
} else {
 ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
 <?php echo "Error: " . $sql . "<br>" . $conn->error;
}
	}else{
		}
		}else{ ?>
			
			<?php }

?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['setting_site'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"></span>
                </header>
                <div class="card-body">
                    <form action="settingpro.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['descount'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['enter-value-descount'] ?>" name="descount" value="<?php echo $ro['descount'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clouds" class="col-sm-3 col-form-label"><b><?php echo $lang['minimum-clouds'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="clouds" placeholder="<?php echo $lang['enter-value-clouds'] ?>" name="clouds" value="<?php echo $ro['mincl'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maclouds" class="col-sm-3 col-form-label"><b><?php echo $lang['maximum-clouds'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxclouds" placeholder="<?php echo $lang['enter-value-clouds'] ?>" name="maxclouds" value="<?php echo $ro['maxcl'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxsms" class="col-sm-3 col-form-label"><b><?php echo $lang['view_reviews_max'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxsms" placeholder="<?php echo $lang['The-number-of-posts-you-want'] ?>" name="view_reviews" value="<?php echo $ro['view_reviews'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="mintr" class="col-sm-3 col-form-label"><b><?php echo $lang['view_special_posts_max'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="mintr" placeholder="<?php echo $lang['The-number-of-posts-you-want'] ?>" name="view_special_posts" value="<?php echo $ro['view_special_posts'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="maxtr" class="col-sm-3 col-form-label"><b><?php echo $lang['view_paid_max'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxtr" placeholder="<?php echo $lang['The-number-of-posts-you-want'] ?>" name="view_paid" value="<?php echo $ro['view_paid'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maclouds" class="col-sm-3 col-form-label"><b><?php echo $lang['view_More_view_posts_max'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="minsms" placeholder="<?php echo $lang['The-number-of-posts-you-want'] ?>" name="view_more" value="<?php echo $ro['view_more_posts'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="maxsms" class="col-sm-3 col-form-label"><b><?php echo $lang['view_more_loaded_posts_max'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxsms" placeholder="<?php echo $lang['The-number-of-posts-you-want'] ?>" name="more_loaded" value="<?php echo $ro['view_more_loaded_posts'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxsms" class="col-sm-3 col-form-label"><b><?php echo $lang['waiting_time_to_show'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxsms" placeholder="<?php echo $lang['enter_the_waiting_time_in_seconds'] ?>" name="waiting_counter" value="<?php echo $ro['waiting_counter'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="url" class="col-sm-3 col-form-label"><b><?php echo $lang['profit-through-the-participation-link'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="url" placeholder="<?php echo $lang['enter-value-clouds'] ?>" name="url" value="<?php echo $ro['url'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="meetb" class="col-sm-3 col-form-label"><b><?php echo $lang['profit-through-the-invitation-code-sharing'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="meetb" placeholder="<?php echo $lang['enter-value-clouds'] ?>" name="meetb" value="<?php echo $ro['meetb'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="meetview" class="col-sm-3 col-form-label"><b><?php echo $lang['profit-by-entering-the-invitation-code'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="maxclouds" placeholder="<?php echo $lang['enter-value-clouds'] ?>" name="meetview" value="<?php echo $ro['meetview'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="limit_registration" class="col-sm-3 col-form-label"><b><?php echo $lang['limit_registration'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="limit_registration" required class="form-control" id="limit_registration" placeholder="<?php echo $lang['limit_registration'] ?>" name="limit_registration" value="<?php echo $ro['limit_registration'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="g_map" class="col-sm-3 col-form-label"><b><?php echo $lang['g_map'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="g_map" placeholder="<?php echo $lang['g_map'] ?>" name="g_map" value="<?php echo $ro['g_map'] ;?>">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="meetview" class="col-sm-3 col-form-label"><b><?php echo $lang['an_amount_when_registering'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="amount_re" placeholder="<?php echo $lang['an_amount_when_registering'] ?>" name="amount_re" value="<?php echo $ro['amount_re'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['message-if-the-site-stops-working'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                            	
                                <textarea name="massage" id="" cols="30" rows="10" class="summernote">
                                	<?php echo $stm['massage'] ;?>
                                </textarea>
                                  <input type="hidden" name="mg" value="<?php echo $ro['massage'] ;?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="pro" value="<?php echo $lang['send'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>