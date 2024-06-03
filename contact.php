<!-- include header-->
	<?php require_once 'header.php';?>
    <?php
require_once 'nav.php';

     ?>

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?php echo $lang['home'] ;?></a></li>
                            <li class="breadcrumb-item active">Contact</li>
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
                                    <h4>Who we are</h4>
                                    <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                   
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
             
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                                <?php
                                $co = $_POST['co'];
                                if(isset($co)){
                                	$nameco = $_POST['nameco'];
                                $nameco =filter_var($nameco,FILTER_SANITIZE_STRING);
                                $subject = $_POST['subject'];
                               $subject = filter_var($subject,FILTER_SANITIZE_STRING);
                               $message = $_POST['message'];
                               $message = filter_var($message,FILTER_SANITIZE_STRING);
                                $number = $_POST['number'];
                                $number = filter_var($number,FILTER_SANITIZE_NUMBER_INT);
                                	$emailco = $_POST['emailco'];
                                
                                $emailco = filter_var($emailco,FILTER_SANITIZE_EMAIL);
                                if(filter_var($emailco,FILTER_VALIDATE_EMAIL) == false){
                                	echo $lang['This-problem-has-happened-please-retry'];
                                	}
                                
                               else{
                                 $subc = "INSERT INTO contact(name,subject,message,number,email) VALUES('$nameco','$subject','$message','$numberco','$emailco')";
                                if(mysqli_query($conn,$subc)){
                                	echo $lang['it_was_successfully'];
                                	}else{
                                	echo $lang['This-problem-has-happened-please-retry'];
                                	}
                                	
                                }
                                	}
                                ?>
                                <div class="col-lg-7">
                                    <form class="form-wrapper" action="" method="POST">
                                        <input type="text" class="form-control" placeholder="<?php echo $lang['name'] ;?>" name="nameco" dir="auto">
                                        <input type="email" class="form-control" placeholder="<?php echo $lang['email'] ;?>" name="emailco" dir="auto">
                                        <input type="number" class="form-control" placeholder="<?php echo $lang['number'] ;?>" name="numberco" dir="auto">
                                        <input type="text" class="form-control" placeholder="<?php echo $lang['subject'] ;?>" name="subject" dir="auto">
                                        <textarea class="form-control" placeholder="Your message" name="message" dir="auto"></textarea>
                                        <button type="submit" class="btn btn-primary" name="co"><?php echo $lang['send'] ;?> <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<!-- include footer-->
	<?php require_once 'footer.php';?>