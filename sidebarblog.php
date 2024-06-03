<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                    	<?php  if($a == 1){
       
}else{ ?>
	<?php echo $ads['ads5'] ;
}?>
                                        
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget" dir="<?php echo $lang['dir'] ;?>">
                                <h2 class="widget-title"><?php echo $lang['trend_blog'] ;?></h2>
                                <div class="trend-videos">
                                <?php
                                $s  = mysqli_query($conn,"SELECT MAX(view) FROM blog ORDER BY id DESC"); 
    $num = mysqli_fetch_assoc($s); 
   // print_r($num);
  $sd = implode(" d ",$num);
  


	$sql = "SELECT * FROM blog  where view <= $sd AND status$logc'$status_post' ORDER BY view DESC limit $more_view_post";
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
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="viewblog.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title_blog'] ;?>" title="">
                                                <img src="upload/images/blog/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width:800px; height:460px;">
                                                <div class="hovereffect">
                                                    <span class="videohove"></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="viewblog.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title_blog'] ;?>" title=""><?php echo $row['title'] ;?></a></h4>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                    	<hr class="invis">
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                    <hr class="invis">

                                    <div class="blog-box">
                                        <div class="post-media">
                                            <div >
                                               <?php  if($a == 1){
       
}else{ ?>
	<?php echo $ads['ads1'] ;?>
	<?php }
        ?>
                                                <div class="hovereffec">
                                                    <span class="videohover"></span>
                                                </div><!-- end hover -->
                                            </div>
                                        </div><!-- end media -->
                                        
                                    </div><!-- end blog-box -->

                                    <hr class="invis">

                                    
                                </div><!-- end videos -->
                            </div><!-- end widget -->

                            <div class="widget" dir="<?php echo $lang['dir'] ;?>">
                                <h2 class="widget-title"><?php echo $lang['popular_posts'] ;?></h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    	<?php
                                $s  = mysqli_query($conn,"SELECT MAX(download) FROM blog ORDER BY id DESC"); 
    $num = mysqli_fetch_assoc($s); 
   // print_r($num);
  $sd = implode(" d ",$num);
  


	$sql = "SELECT * FROM blog  where download <= $sd AND status$logc'$status_post' ORDER BY download DESC limit $more_down_post";
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
                                        

                                        <a href="viewblog.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title_blog'] ;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/images/blog/<?php echo $row['image'] ;?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1" dir="auto"><?php echo $row['title'] ;?></h5>
                                                <small dir="auto"><?php echo $row['date'] ;?></small>
                                            </div>
                                        </a>
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 last-item justify-content-between">
                                                
                                  <?php  if($a == 1){
       
}else{ ?>
	<?php echo $ads['ads3'] ;?>
	<?php }
        ?>                                  </div>
                                                                                         </div>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget" dir="<?php echo $lang['dir'] ;?>">
                                <h2 class="widget-title"><?php echo $lang['recent_reviews'] ;?></h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php	$sql = "SELECT * FROM blog  where status$logc'$status_post' ORDER BY id DESC limit $view_reviews";
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
                                        <a href="viewblog.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title_blog'] ;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/images/blog/<?php echo $row['image'] ;?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $row['title'] ;?></h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                
                                                <?php  if($a == 1){
       
}else{ ?>
	 <?php echo $ads['ads2'] ;?>
	<?php }
        ?>
                                                
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title" dir="auto"><?php echo $lang['follow_us'] ;?></h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $social['facebook'] ;?>" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                            <p><?php echo $social['folowfacebook'] ;?></p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $social['twitter'] ;?>" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                            <p><?php echo $social['folowtwitter'] ;?></p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $social['google'] ;?>" class="social-button google-button">
                                            <i class="fa fa-google-plus"></i>
                                            <p><?php echo $social['folowgoogle'] ;?></p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $social['youtube'] ;?>" class="social-button youtube-button">
                                            <i class="fa fa-youtube"></i>
                                            <p><?php echo $social['folowyoutube'] ;?></p>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end widget -->

                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <?php  if($a == 1){
       
}else{ ?>
	<?php echo $ads['ads4'] ;?>
	<?php }
        ?>
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>