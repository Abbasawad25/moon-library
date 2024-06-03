
    
                
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 dir="auto"><?php echo $lang['the_most_views'] ;?> <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                
                                    	<?php
                                $s  = mysqli_query($conn,"SELECT MAX(view) FROM book ORDER BY id DESC"); 
    $num = mysqli_fetch_assoc($s); 
   // print_r($num);
  $sd = implode(" d ",$num);
  


	$sql = "SELECT * FROM book  where view <= $sd  AND status='$status' ORDER BY view DESC LIMIT $more_view_post";
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
        <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title="">
                                                <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width: 350px;height: 250px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
                                    <div class="blog-meta big-meta col-md-8">
                                    	
                                        <h4 dir="auto"><a href="single.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title=""><?php echo $row['name'] ;?></a></h4>
                                        <p dir="auto"><?php echo $row['summary'] ;?></p>
                                        <? 
$idca = $row['categories'];
 $g = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idca' AND status='1' ")); 
 ?>    
                                        <small class="firstsmall" dir="auto"><a class="bg-orange" href="category.php?tag=<?php echo $g['id'] ;?>" title=""><?php echo $g['name'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?tag=<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                  <? 
$iduser = $row['iduser'];
 $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$iduser' ")); 
 ?>      <small dir="auto"><a href="author.php?id=<?php echo $row['iduser'] ;?>" title=""><?php echo $ro['username'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?tag=<?php echo $row['view'] ;?>" title=""><i class="fa fa-eye"></i><?php echo " " . $row['view'] . " ";?></a></small>
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
                             
                         <!-- end blog-box -->
                                <hr class="invis">

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                            	<!--ads banner-->
                                            	<?php  if($a == "yes"){
       
}else{ ?>
                                            	<?php  echo $ads['ads1'] ;
}?>
                                    <!--            <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                                -->            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
</div>
 </div><!-- end page-wrapper -->            
<hr class="invis">
        
                   </div> <!-- end col -->
                        
                        <hr class="invis">

                <!-- start the most download -->
    
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 dir="auto"><?php echo $lang['the_most_download'] ;?> <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                
                                    	<?php
                                $s  = mysqli_query($conn,"SELECT MAX(download) FROM book ORDER BY id DESC"); 
    $num = mysqli_fetch_assoc($s); 
   // print_r($num);
  $sd = implode(" d ",$num);


	$sql = "SELECT * FROM book  where download <= $sd  AND status='$status' ORDER BY download DESC LIMIT $more_down_post";
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
        <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title="">
                                                <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width: 350px;height: 250px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
                                    <div class="blog-meta big-meta col-md-8">
                                    	
                                        <h4 dir="auto"><a href="single.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title=""><?php echo $row['name'] ;?></a></h4>
                                        <p dir="auto"><?php echo $row['summary'] ;?></p>
                                        <? 
$idca = $row['categories'];
 $g = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idca' ")); 
 ?>    
                                        <small class="firstsmall" dir="auto"><a class="bg-orange" href="category.php?tag=<?php echo $g['id'] ;?>" title=""><?php echo $g['name'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                  <? 
$iduser = $row['iduser'];
 $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$iduser' ")); 
 ?>      <small dir="auto"><a href="author.php?id=<?php echo $row['iduser'] ;?>" title=""><?php echo $ro['username'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?tag=<?php echo $row['view'] ;?>" title=""><i class="fa fa-eye"></i><?php echo " " . $row['view'] . " ";?></a></small>
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
                             
                         <!-- end blog-box -->
                                <hr class="invis">

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                            	<!--ads banner-->
                                            	<?php  if($a == "yes"){
       
}else{ ?>
                                            	<?php  echo $ads['ads1'] ; 
}?>
                                    <!--            <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                                -->            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
</div>
 </div><!-- end page-wrapper -->            
<hr class="invis">
        
                   </div> <!-- end col -->
                    <!-- end the most download-->
    