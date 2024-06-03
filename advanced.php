
        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    
                    	<!-- blog pro -->
                    	<?php
                    $maxpro = $stm['view_special_posts'];
                    $sql = "SELECT * FROM book  where type='1' ORDER BY id DESC limit 1";
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
  	  <div class="first-slot">
                        <div class="masonry-box post-media">
                        	<? 
$idca = $row['categories'];
 $g = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idca' AND status='1' ")); 
 ?>    
                             <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width:550px;height:400px;">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="category.php?tag=<?php echo $g['id'] ;?>" title=""><?php echo $g['name'] ;?></a></span>
                                        <h4><a href="single.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title=""><?php echo $row['name'] ;?></a></h4>
                                        <small><a href="index.php?tag=<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                        <small><a href="author.php?id=<?php echo $row['iduser'] ;?>" title=""><?php echo $row['username'] ;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end first-side -->
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
	<!-- blog pro -->
                    	<?php
                    $maxpro = $stm['view_special_posts'];
                    $sql = "SELECT * FROM blog  where type='1' ORDER BY id DESC limit 1";
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
  	  <div class="first-slot">
                        <div class="masonry-box post-media">
                        	<? 
$idca = $row['cat_id'];
 $g = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idca' AND status='1' ")); 
 ?>    
                             <img src="upload/images/blog/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width:550px;height:400px;">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="category.php?tag=<?php echo $g['id'] ;?>" title=""><?php echo $g['name'] ;?></a></span>
                                        <h4><a href="viewblog.php?id=<?php echo $row['id'] ;?>&title=<?php echo $row['title'];?>" title=""><?php echo $row['title'] ;?></a></h4>
                                        <small><a href="blog.php?tag=<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                        <small><a href="author.php?id=<?php echo $row['iduser'] ;?>" title=""><?php echo $row['username'] ;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end first-side -->
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                    <div class="second-slot">
                        <div class="masonry-box post-media">
                             <?php  if($a == 1){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads1'] ;?></div>
	<?php }
        ?>
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->

               
                </div><!-- end masonry -->
            </div>
        </section>      