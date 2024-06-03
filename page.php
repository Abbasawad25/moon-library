<!-- include header-->
	<?php require_once 'header.php';?>
    <?php
require_once 'nav.php';

     ?>

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> <?php echo $pages['name'] ;?><small class="hidden-xs-down hidden-sm-down"> </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index"><?php echo $lang['home'] ;?></a></li>
                            <li class="breadcrumb-item active"><?php echo $pages['name'] ;?></li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                  <?php echo $pages['subject'] ;?>
                                </div>
                              
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<!-- include footer-->
	<?php require_once 'footer.php';?>