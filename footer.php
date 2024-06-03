
<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-left">
                                <a href="index.php"><img src="upload/images/site/<?php echo $site['logo'] ;?>" alt="" class="img-fluid"></a>
                                <p dir="auto"><?php echo $lang['description'] ;?></p>
                                <div class="social">
                                    <a href="<?php echo $social['facebook'] ;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['facebook'] ;?>"><i class="fa fa-facebook"></i></a>              
                                    <a href="<?php echo $social['twitter'] ;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['twitter'] ;?>"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php echo $social['Instagram'] ;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['Instagram'] ;?>"><i class="fa fa-instagram"></i></a>
                                    <a href="<?php echo $social['google'] ;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['googleplus'] ;?>"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-left">
                                	<?php
                                $sub = $_POST['send'];
                                if(isset($sub)){
                                	$email = $_POST['email'];
                                
                                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                                if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                                	echo $lang['This-problem-has-happened-please-retry'];
                                	}
                                else{
                                
                $subc = "INSERT INTO subscribers(email) VALUES('$email')";
                                if(mysqli_query($conn,$subc)){
                                	echo $lang['it_was_successfully'];
                                	}else{
                                	echo $lang['This-problem-has-happened-please-retry'];
                                	}
                                	}
                                
                                	}
                                ?>
                                    <form class="form-inline" action="" method="POST">
                                        <input type="text" class="form-control" placeholder="Enter your email address" name="email">
                                        <button type="submit" class="btn btn-primary" name="send" value="good"><?php echo $lang['send'] ;?></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title" dir="auto"><?php echo $lang['sections'] ;?></h2>
                            <div class="link-widget">
                                <ul>
                                	<?php $sql = "SELECT * FROM section  ORDER BY id DESC limit 10";
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
                                    <li dir="auto"><a href="sections.php?id=<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?> <span>(21)</span></a></li>
                                    
                                      <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title" dir="auto"><?php echo $lang['Copyright-and-publishing'] ;?></h2>
                            <div class="link-widget">
                                <ul>
                                    <li dir="auto"><a href="contact.php" dir="auto"><?php echo $lang['About-us'] ;?></a></li>
                                     <?php $sql = "SELECT * FROM page";
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
                                    <li><a href="page.php?page=<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></a></li>
                                      <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                    <li dir="auto"><a href="users" dir="auto"><?php echo $lang['Write-About-us'] ;?></a></li>
                                    
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright" dir="auto">&copy; <?php echo $lang['Footer-Text'] ;?> : <a href="#"><?php echo $lang['namesite'] ;?></a></div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    	
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>