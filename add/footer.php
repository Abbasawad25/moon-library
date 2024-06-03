
</section>
</section>
<!--main content end-->

<!-- Right Slidebar start -->
<div class="sb-slidebar sb-right sb-style-overlay">
    <h5 class="side-title"><?php echo $lang['Online-clients'] ?></h5>
    <ul class="quick-chat-list">
    		<?php
    include"../server.php";
$account_number = 1001;
echo $row['account_number'];
$sql = "SELECT * FROM blog ORDER BY id DESC";
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	   
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
        <li class="online">
            <div class="media">
                <a href="#" class="">
                    <img alt="" src="img/chat-avatar2.jpg" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                	<b>أرسل إليك</b>
                <br>
                    <strong><?php echo $row['name']?></strong>
                    <small>لقد استلمت <?php echo $row['money']?> </small>
                    <b>من <b>
                    <small><?php echo $row['name']?></small>
                    <small>يوم  <?php echo $row['date']?></small>
                </div>
            </div><!-- media -->
        </li>
        <li class="online">
            <div class="media">
                <a href="#" class="">
                    <img alt="" src="img/chat-avatar.jpg" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-important">3</span>
                    </div>
                    <strong>احمد سعداوي</strong>
                    <small>السودان</small>
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
                    <img alt="" src="img/pro-ac-1.png" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge badge-success">5</span>
                    </div>
                    <strong>إلينا</strong>
                    <small>الكويت</small>
                </div>
            </div><!-- media -->
        </li>
        <li class="online">
            <div class="media">
                <a href="#" class="">
                    <img alt="" src="img/avatar1.jpg" class="mr-3 rounded-circle">
                </a>
                <div class="media-body">
                    <strong>ميمافي</strong>
                    <small>تركيا</small>
                </div>
            </div><!-- media -->
        </li>
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

