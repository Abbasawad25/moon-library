<?php 
require_once 'header.php';
session_start();
  
  
?>
<?php
require_once 'nav.php';
     ?>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $book['name'] ;?></li>
                                </ol>
<?php	
$idcat = $book['categories'];
                                	$cat = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idcat' ")); 
?>
                                <span class="color-orange"><a href="category.php?tag=<?php echo $cat['id'] ;?>" title=""><?php echo $cat['name'] ;?></a></span>

                                <h3><?php echo $book['name'] ;?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="index.php?tag=<?php echo $row['date'] ;?>" title=""><?php echo $book['date'] ;?></a></small>
                                    <?php	
$iduser = $book['iduser'];
                                	$author = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$iduser' ")); 
?>
                                    <small><a href="author.php?id=<?php echo $author['id'] ;?>" title=""><?php echo $author['name'] ;?></a></small>
                                    <small><a href="index.php?tag=<?php echo $row['view'] ;?>" title=""><i class="fa fa-eye"></i> <?php echo $book['view'] ;?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="upload/images/book/<?php echo $book['image'] ;?>" alt="" class="img-fluid">
                            </div><!-- end media -->
<?php
/*
$bookn = $book['name'];
$bookt = $book['id'];
$bookd = $book['id'];
$bookv = $book['view'];
$bookv++;

 if(isset($_COOKIE[$bookn])){
 	}else{
 	setcookie($bookn,$bookt,time() + 60*60*168);
	mysqli_query($conn, "update book set view='$bookv' where id='$bookd' ");
 	}
 $bookn = "download" . $book['name'];
 if(isset($_COOKIE[$bookn])){
 	}else{
 	setcookie($bookn,$bookt,time() + 60);
	mysqli_query($conn, "update book set download='$bookv' where id='$bookd' ");
 	}
 */
?>
                            <div class="blog-content">  
                                <div class="pp">
                                <?php	
$ids = $book['section'];
                                	$se = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM section where id='$ids' ")); 
?>
                                    <p dir="auto"><?php echo $lang['section'] . "<br>";?><?php echo $se['name'] ;?><a href="section?id=<?php echo $book['section'] ;?>"><?php echo $lang['go_page'] ;?></a><?php echo $lang['view_page'] ;?></p>

                                    <h3 dir="auto"><strong><?php echo $book['name'] ;?></strong></h3>

                                    <p dir="auto"><?php echo $book['summary'] ;?></p>

                                    <h3 dir="auto"><?php echo $lang['author_of_the_book'] ;?><?php echo $book['author'] ;?><strong> <a href="index.php?tag=<?php echo $book['author'] ;?>"><?php echo $lang['view_books'] ;?></a>,<?php echo $lang['view_all_book'] ;?></strong></h3>
<p dir="auto"><?php echo $lang['date_create_book'] . " : " ;?><?php echo $book['date_create'] ;?></p>
<p dir="auto"><?php echo $lang['version_book'] . " : " ;?><?php echo $book['version'] ;?></p>
                                </div><!-- end pp -->

                            <!--    <img src="upload/tech_menu_09.jpg" alt="" class="img-fluid img-fullwidth"> -->
          <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads1'] ;?></div>
	<?php }
        ?>
                                <div class="pp">
                       <p dir="auto"><?php echo $book['subject'] ;?></p>             <h3><strong><?php echo $book['title'] ;?></strong></h3>

                                    <p dir="auto"></p>
                               
                                        <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads2'] ;?></div>
	<?php }
        ?>                           <h3><strong><?php echo $lang['download'] . $book['name'] ;?></strong></h3>
        <p><?php echo $pagedownload['subject'] ;?></p> <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads5'] ;?></div>
	<?php }
        ?>
        <p><?php echo $pagedownload['down_how'] ;?></p>
        <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads4'] ;?></div>
	<?php }
        ?>
        <p><?php echo $pagedownload['down_before'] ;?></p>
        
          <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads3'] ;?></div>
	<?php }
        ?>
        <?php	if($book['type_book'] == 1){ ?>
        	<p dir="auto"><?php echo $lang['typebook'] ;?> :  <?php echo $lang['pay'] ;?></p>
   <center> <div style="padding:20px;width:200px;background:gold;text-align: center;font-size: 26px;border-radius: 30px;"><a href="pay/index.php?id=<?php echo $book['id'] ;?>"><?php echo $lang['buy_the_book'] ;?></div></center> 
   <? }
   else{ ?>
   	<p dir="auto"><?php echo $lang['type_book'] ;?> :  <?php echo $lang['free'] ;?></p>
   <p><?php echo $lang['you_will_be_redirected_to_the_desired_link_after'] ;?><span id="countdown"><?php echo $stm['waiting_counter'] ;?> <?php echo $lang['seconds'] ;?></span></p>
 <script>
        var remainingTime = <?php echo $stm['waiting_counter'] ;?>;
        
        function showLink() {
            var linkElement = document.getElementById("link");
            linkElement.classList.remove("hidden");
        }
        
        function countdown() {
            var countdownElement = document.getElementById("countdown");
            countdownElement.textContent = remainingTime + " <?php echo $lang['second'] ;?> ";
            remainingTime--;
            
            if (remainingTime < 0) {
                showLink();
                document.getElementById("link").style.display = "block";
                
            } else {
                setTimeout(countdown, 1000); // Update countdown every 1 second
            }
        }
        
        setTimeout(countdown, 10000); // Start countdown after 30 seconds
        
    </script>
    
    <center id="link" class="hidden" style="display: none;"> <div style="padding:20px;width:200px;background:gold;text-align: center;font-size: 26px;border-radius: 30px;"><a href="upload/book/<?php echo $book['location'] ;?>" ><?php echo $lang['download'] ;?></a></div></center> 
   <?php }
 file_get_contents("http://localhost:8088/single.php");
 ?>
                                   <p><?php echo $pagedownload['after'] ;?></p>
  <?php  if($a == 1){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads1'] ;?></div>
	<?php }
        ?>
                                    

                                    
                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span><?php echo $lang['tags'] ;?></span>
                                    <?php
                                    $tag = $book['tag'];
                                   // echo $tag;
$sd =  explode(",",$tag);
 for($i = 0;$i < count($sd);$i++){ ?>
                                    <small><a href="index.php?tag=<?php echo $sd[$i] ;?>" title=""><?php echo $sd[$i] ;?></a></small>
                                    <?php } ?>
                                    
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                              <?php  if($a == 1){
       
}else{ ?>
	<div style="width:80px;height:90px;"> <?php echo $ads['ads4'] ;?></div>
	<?php }
        ?>
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                   <?php
                                $s  = mysqli_query($conn,"SELECT MAX(view) FROM book ORDER BY id DESC"); 
    $num = mysqli_fetch_assoc($s); 
   // print_r($num);
  $sd = implode(" d ",$num);
  


	$sql = "SELECT * FROM book  where view <= 910 ORDER BY view DESC";
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

                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid float-left">
                                                        <h5 class="mb-1" dir="auto"><?php echo $row['name'] ;?></h5>
                                                        <small><?php echo $lang['The_next'] ;?></small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    	  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title" dir="auto"><?php echo $lang['about_author'] ;?></h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/images/users/<?php echo $author['image'] ;?>" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4 dir="auto"><a href="author.php?id=<?php echo $author['id'] ;?>"><?php echo $author['name'] ;?></a></h4>
                                        <p dir="auto"><?php echo $lang['about_me'] ;?><a href="<?php echo $author_link['web'] ;?>"><?php echo $lang['visit_my_website'] ;?></a> <br> <?php echo $lang['about_me'] . " : "?> <?php echo $author['bio'] ;?></p>

                                        <div class="topsocial">
                                            <a href="<?php echo $author_link['facebook'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="<?php echo $author_link['youtube'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="<?php echo $author_link['pinterest'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="<?php echo $author_link['twitter'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="<?php echo $author_link['Instagram'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="<?php echo $author_link['web'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php echo $lang['you_may_also_like'] ;?></h4>
                                <div class="row">
                                	<?php
      $tagbook = $book['tag'];
     $bookname = $book['name'];
   	$sql = "SELECT * FROM book  where name LIKE '%$namebook%' OR tag LIKE '$sar%' ORDER BY id DESC limit 10";
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
                    
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                     
                                            <div class="post-media">
                                                <a href="single.php?id=<?php echo $row['id'] ;?>" title="">
                                                    <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width: 800px; height: 260px;">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4 dir="auto"><a href="single.php?id=<?php echo $row['id'] ;?>" title=""><?php echo $row['name'] ;?></a></h4>
                                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                                <small><a href="single.php?tag=<?php echo $row['book'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                
                                                    <?php echo $ads['ads1'] ;?>
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php echo $lang['comments'] ;?></h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                        <?php	$sql = "SELECT * FROM comments  where page='single' and idblog='$idsbook' ORDER BY id DESC limit 10";
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
                                            <div class="media">
                                                <a class="media-left" href="<?php echo $row['web'] ;?>">
                                                    <img src="upload/images/users/<?php echo $row['image'] ;?>" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name" dir="auto"><?php echo $row['name'] ;?> <br> <small><?php echo $row['date'] ;?></small></h4>
                                                    <p dir="auto"><?php echo $row['coment'] ;?></p>
                                                    <a href="#" class="btn btn-primary btn-sm"><?php echo $lang['reply'] ;?></a>
                                                </div>
                                            </div>
                                              <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                                                         
                                        </div> 
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php echo $lang['leave_a_reply'] ;?></h4>
                                <div class="row">
                                    <div class="col-lg-12">
  <?php
  $nud = $_POST['nud'];
     if(isset($nud)){
     	$name_co = $_POST['name_co'];
     if (empty($name_co)) { array_push($errors, "name book is required"); }
        $name_co = filter_var($name_co,FILTER_SANITIZE_STRING);
        
        
        $coment = $_POST['subject'];
        
        $coment = filter_var($coment,FILTER_SANITIZE_STRING);
        $link_co = $_POST['link_web'];
        if(!isset($user['id'])) {
        $iduser_co = 1;
        $image_co = "user.png";
}
else{
	$user_co = $user['id'];
	$image_co = $user['image'];
	}
	$page_co = "single";
        $email_co = $_POST['email_co'];
        if (empty($email_co)) { array_push($errors, "email book is required"); }
        $email_co = filter_var($email_co,FILTER_SANITIZE_EMAIL);
        
        $input_comment = "INSERT INTO comments(name,image,web,iduser,page,idblog,coment,email) VALUES('$name_co','$image_co','$link_co','$user_co','$page_co','$idsbook','$coment','$email_co')";
        if(mysqli_query($conn,$input_comment)){ ?>
        	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
        <?php	}else{ ?>
        	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script> <?php 
        echo "Error: " . $input_comment . "<br>" . $conn->error;
        	}
        
            }
   ?>
                                        <form class="form-wrapper" action="download.php?id=<?php echo $book['id'] ;?>" method="POST">
                                            <input type="text" class="form-control" placeholder="<?php echo $lang['name'] ;?>" name="name_co" dir="auto">
                                            <input type="email" class="form-control" placeholder="<?php echo $lang['email'] ;?>" name="email_co" >
                                            <input type="url" class="form-control" placeholder="<?php echo $lang['link_web'] ;?>" name="link_web" >
                                            <textarea class="form-control" name="subject" placeholder="<?php echo $lang['comment'] ;?>" dir="auto"></textarea>
                                            <button type="submit" class="btn btn-primary" name="nud"><?php echo $lang['send'] ;?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                  <?php
require_once 'sidebar.php';


     ?>
<!-- include footer-->
	<?php require_once 'footer.php';?>