
</section>
</section>
<!--main content end-->

<!-- Right Slidebar start -->
<div class="sb-slidebar sb-right sb-style-overlay" id="Notio">
    <h5 class="side-title"><?php echo $lang['notifications'] ?></h5>
    <ul class="quick-chat-list">
    	<?php
    $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
    $iduser = $ro['id'];
    $sql = "SELECT * FROM notifications  where status='1' ORDER BY id DESC limit 2";
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
    	   <li class="online">
            <div class="media">
                <a href="#" class="">
                    <img alt="" src="../upload/images/nav/<?php echo $row['image'] ;?>" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                	<div class="media-status">
                	<span class=" badge bg-important"><?php echo $row['date'];?></span>
                </div>
                <br>
                    <strong><?php echo $row['title'] ;?></strong>
                    
                    <small><?php echo $row['subject'] ;?></small>
                    
                </div>
            </div><!-- media -->
        </li>
          <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
	<?php
    $sql = "SELECT * FROM infousers where username='$iduser' ORDER BY id DESC limit 3";
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
    	   <li class="online">
            <div class="media">
                <a href="manage-sessions.php" class="">
                    <img alt="" src="../upload/images/users/<?php echo $ro['image'] ;?>" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                	<div class="media-status">
                	<span class=" badge bg-important"><?php echo $row['date'];?></span>
                </div>
                <br>
                	<br>
                    <strong> <a href="manage-sessions.php" class=""><p><?php echo $lang['a_security_official_has_been_recorded_from_a_device'] ;?> </p></a><?php echo $row['os'] ;?></strong>
                    
                    <small dir="auto"><?php echo $lang['type_of_device'] ;?> : <?php echo $row['device'] ;?></small>
                    <small dir="auto"><?php echo $lang['ip_address'] ;?> : <?php echo $row['ip'] ;?></small>
                    
                </div>
            </div><!-- media -->
        </li>
          <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
    		<?php
    $w = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 



$sql = "SELECT * FROM book   ORDER BY id DESC limit 3";
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
        <li class="online">
            <div class="media">
                <a href="../single.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title'] ;?>" class="">
                    <img alt="" src="../upload/images/book/<?php echo $row['image'] ;?>">
                </a>
                <div class="media-body">
                	<div class="media-status">
                	<span class=" badge bg-important"><?php echo $row['date'];?></span>
                </div>
                	<b><?php echo $lang['name_book'] ;?></b>
                <br>
                    <strong><?php echo $row['name'];?></strong>
                    <br>
                    <b><?php echo $lang['author'] ;?></b>
                    <small><?php echo $row['author'];?></small>
                    
                   
                </div>
            </div><!-- media -->
        </li>
        <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
		<?php
		 
$bidauthor = $ro['id'];
echo $idauthor;
$sql = "SELECT * FROM comments  where idauthor='$bidauthor' ORDER BY id DESC limit 3";
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
        <li class="online">
            <div class="media">
                <a href="../file.php?id=<?php echo $row['id']; ?>" class="">
                    <img alt="" src="../upload/images/users/<?php echo $row['image'];?>" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-important"><?php echo $row['date'];?></span>
                    </div>
                    <strong><?php echo $row['name'];?></strong>
                    <small><?php echo $row['coment'] ;?></small>
                </div>
            </div><!-- media -->
        </li>
<?php
}
  }
}
 else {
  echo "0 results";
 }              

?>
	<?php
	$sql = "SELECT * FROM blog ORDER BY id DESC limit 4";
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
        <li class="online">
            <div class="media">
                <a href="../viewblog.php?id=<?php echo $row['id'] ;?>&<?php echo $row['title'] ;?>" class="">
                    <img alt="" src="../upload/images/blog/<?php echo $row['image'] ;?>" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge badge-success"><?php echo $row['view'] ;?></span>
                    </div>
                    <strong><?php echo $row['title'] ;?></strong>
                    <small><?php echo $row['username'] ;?></small>
                </div>
            </div><!-- media -->
        </li>
          <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
     
        <li class="online">
            <div class="media">
                <a href="#" class="">
                    <img alt="" src="img/mail-avatar.jpg" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-warning">7</span>
                    </div>
                    <strong>خالد</strong>
                    <small>مصر</small>
                </div>
            </div><!-- media -->
        </li>
    </ul>
    <h5 class="side-title"><?php echo $lang['Tasks-in-waiting'] ?></h5>
    <ul class="p-task tasks-bar">
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc"><?php echo $lang['Dashboard-V1.3'] ?></div>
                    <div class="percent">40%</div>
                </div>
                <div class="progress">
                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-striped bg-success">
                        <span class="sr-only"><?php echo $lang['Macro-success-45%'] ?></span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc"><?php echo $lang['Update-database'] ?></div>
                    <div class="percent">60%</div>
                </div>
                <div class="progress">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-striped bg-warning">
                        <span class="sr-only"><?php echo $lang['Macro-30-Danger'] ?></span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc"><?php echo $lang['mobileapplication'] ?></div>
                    <div class="percent">87%</div>
                </div>
                <div class="progress">
                    <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-striped bg-info">
                        <span class="sr-only">النجاح</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc"><?php echo $lang['mobileapplication'] ?></div>
                    <div class="percent">33%</div>
                </div>
                <div class="progress">
                    <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-striped bg-danger">
                        <span class="sr-only"><?php echo $lang['Macro-30-Danger'] ?></span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc"><?php echo $lang['Dashboard-V1.3'] ?></div>
                    <div class="percent">45%</div>
                </div>
                <div class="progress">
                    <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-striped">
                        <span class="sr-only">النجاح</span>
                    </div>
                </div>

            </a>
        </li>
        <li class="external">
            <a href="#"><?php echo $lang['See-all-tasks'] ?></a>
        </li>
    </ul>
</div>
<!-- Right Slidebar end -->

<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        <?php echo $lang['copyr'] ?>
        <a href="" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>
<script src="js/respond.min.js" ></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>
<!--dynamic table initialization -->
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="js/dynamic_table_init.js"></script>
<!--common script for all pages-->
<script src="js/common-scripts5e1f.js?v=2"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/count.php"></script>
<!--summernote-->
<script src="assets/summernote/dist/summernote.min.js"></script>
<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    $(window).on("resize",function(){
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });

</script>
<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });
    });

</script>
</body>
</html>

