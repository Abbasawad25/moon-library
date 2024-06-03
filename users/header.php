<?php 
  
?>

<?php
require_once '../block-countrys.php';
include"../server.php";
  //include"a.php";
 $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
 $ro = $row['role'];
if(!isset($_SESSION['username'])) {
header('Location: ../login.php');
}
else{
    $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";
}

?>
<?php
session_start();
  include '../languages/langConfig.php';
$checkid = $row['id'];
$checkc = $row['checkuser'];
if($stm['web'] == 0 and $row['role'] == "admin"){
	
	}
	elseif($stm['web'] == 0 and $row['role'] !== "admin"){
		header('location: ../stop' . '.php');
		exit;
		}
		
$activecheck = $stm['code'];
if($checkc == 1 and $activecheck == 1){
	
	}
if($checkc == 0 and $activecheck == 1){
	header("Location: ../check.php");
	exit;
	}
require_once 'vendor/autoload.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);

$title = '';
if($page == 'home.php'){
    $title = $lang['home'];
}elseif($page == 'addbook.php'){
    $title = $lang['add_book'];
}
elseif($page == 'editbook.php'){
    $title = $lang['edit_book'];
}
elseif($page =='managebook.php'){
    $title = $lang['manage_book'];
}
elseif($page =='blog.php'){
    $title = $lang['add_blog'];
}
elseif($page =='editblog.php'){
    $title = $lang['edit_blog'];
}
elseif($page =='manageblog.php'){
    $title = $lang['manage_blog'];
}
 elseif($page =='category.php'){
    $title = $lang['Add-a-category'];
}
elseif($page =='managecategory.php'){
    $title = $lang['Manage-Categories'];
}
elseif($page =='enterinvitation.php'){
    $title = $lang['you_can_win_by_entering_the_invitation_code'];
}
elseif($page =='createinvitation.php'){
    $title = $lang['profit_through_the_participation_of_your_invitation_code'];
}
elseif($page =='money.php'){
    $title = $lang['profit_through_the_participation_of_the_referral _link'];
}
elseif($page =='deposits.php'){
    $title = $lang['deposit_money_in_the_wallet'];
}
elseif($page =='paypro.php'){
    $title = $lang['paid_membership'];
}
elseif($page == 'inbox.php' || $page =='sentmail.php' || $page =='draft.php' || $page =='strash.php'){
    $title = 'Mail';
}
elseif($page == 'section.php'){
    $title = $lang['add_section'];
}
elseif($page == 'managesection.php'){
    $title = $lang['manage_section'];
}
elseif($page == 'managepay.php'){
    $title = $lang['manage_purchasing'];
}
elseif($page == 'managesale.php'){
    $title = $lang['manage_sale'];
}
else{
    $title = $lang['home'];
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang['lang'] ?>">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title><?php echo $lang['title'] ?> - <?php echo $title ;?></title>
    <meta name="keywords" content="<?php echo $lang['keywords'] ?>">
    <meta name="description" content="<?php echo $lang['description'] ?>">
    <meta name="title" content="<?=$lang['title']?>">
    <meta property="og:site_name" content="<?=$lang['sitname']?>"/>
    <meta property="og:image" content="<img src="uploads/<?= $siteData['logo']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta property="og:locale" content="<?php echo $lang['lang'] ?>"/>
    <meta property="og:title" content="<?=$lang['title']?>"/>
    <meta property="og:description" content="<?php echo $lang['description'] ?>"/>
    <meta property="og:image" content="<img src="uploads/<?= $siteData['logo']?>"/>
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="twitter:site" content="<?=$lang['sitname']?>"/>
    <meta name="twitter:title" content="<?=$lang['title']?>"/> 
    <meta name="twitter:card" content="<?= $siteData['icon']?>">
    <meta name="twitter:description" content="<?php echo $lang['description'] ?>"/>
    <meta name="twitter:image" content="<img src="uploads/<?= $siteData['logo']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="<?= $siteData['sitelink']?>"/>
	<meta name="google-site-verification" content="Wq-n-QaxUP6b3GbKML3-IfS6tPC3lK5rHmsxmuMAktw"/>
    <link rel="shortcut icon" href="<?= $siteData['icon']?>">
    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6116353004302810"
     crossorigin="anonymous"></script>
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><span><?php echo $lang['namesite'] ?></span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge badge-success">6</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green"><?php echo $lang['You-have-6-hanging-tasks'] ?></p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $lang['Dashboard-V1.3'] ?></div>
                                    <div class="percent">40%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">Macro-success-45%</span>
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
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only"><?php echo $lang['Macro-30-Danger'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Phone-developer</div>
                                    <div class="percent">87%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
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
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
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
                                    <div class="progress-bar progress-bar-striped"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                        <span class="sr-only">Complete-47%</span>
                                    </div>
                                </div>

                            </a>
                        </li>
                        <li class="external">
                            <a href="#"><?php echo $lang['See-all-tasks'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-danger">h</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red"><?php echo $lang['You-have-a'] ?><?php echo $lang['New-messages'] ?></p>
                        </li>
                        
                        <li>
                            <a href="">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini.jpg"></span>
                                <span class="subject">
                                    
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="inbox.php"><?php echo $lang['See-all-messages'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning">7</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow"><?php echo $lang['You-have-7-new-notifications'] ?></p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <?php echo $lang['Server-number-3-busy'] ?>
                                <span class="small italic"><?php echo $lang['34-minutes'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                <?php echo $lang['Server-No-10-is-not-responded'] ?>
                                <span class="small italic"><?php echo $lang['1-hour'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <?php echo $lang['The-damage-database'] ?>
                                <span class="small italic"><?php echo $lang['Four-hours'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="fa fa-plus"></i></span>
                                <?php echo $lang['New-User-Recorder'] ?>
                                <span class="small italic"><?php echo $lang['In-this-moment'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                <?php echo $lang['Error-in-the-application'] ?>
                                <span class="small italic"><?php echo $lang['Ten-minutes'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><?php echo $lang['See-all-notices'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="<?php echo $lang['Search'] ?>">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="../upload/images/users/<?php echo $row['image'] ;?>" style="width: 35px">
                        <span class="username"><?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="profile.php"><i class=" fa fa-suitcase"></i><?php echo $lang['Profile'] ?></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i><?php echo $lang['setting'] ?></a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i><?php echo $lang['Notice'] ?></a></li>
                        <li><a href="logout.php"><i class="fa fa-key"></i><?php echo $lang['Log-out'] ?></a></li>
                    </ul>
                </li>
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a  href="index.php" <?= $page == 'index.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-dashboard"></i>
                        <span><?php echo $lang['home'] ;?></span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'paypro.php' ? 'class="active"' : '' ?> 
<?= $page == 'deposits.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['deposit_of_financial_and_purchase'] ;?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'deposits.php' ? 'class="active"' : '' ?>><a  href="deposits.php"> <?php echo $lang['deposit_money_in_the_wallet'] ;?></a></li>
                        <li <?= $page == 'paypro.php' ? 'class="active"' : '' ?>><a  href="paypro.php"><?php echo $lang['paid_membership'] ;?></a></li> 
                        
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'money.php' ? 'class="active"' : '' ?> <?= $page == 'createinvitation.php' ? 'class="active"' : '' ?> <?= $page == 'enterinvitation.php' ? 'class="active"' : '' ?> >
                    	
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['profit_management'] ;?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'money.php' ? 'class="active"' : '' ?>><a  href="money.php"><?php echo $lang['profit_through_the_participation_of_the_referral _link'] ;?></a></li>
                        <li <?= $page == 'createinvitation.php' ? 'class="active"' : '' ?>><a  href="createinvitation.php"> <?php echo $lang['profit_through_the_invitation_code_sharing'] ;?></a></li> 
                        <li <?= $page == 'enterinvitation.php' ? 'class="active"' : '' ?>><a  href="enterinvitation.php"> <?php echo $lang['profit_by_entering_the_invitation_code'] ;?></a></li> 
                                             
                    </ul>
                </li>
              
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'managepay.php' ? 'class="active"' : '' ?> <?= $page == 'managesale.php' ? 'class="active"' : '' ?>
                    
>
                        <i class="fa fa-thumb-tack"
></i>
                        <span><?php echo $lang['manage_sale_and_purchasing'] ;?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'managepay.php' ? 'class="active"' : '' ?>><a  href="managepay.php"><?php echo $lang['manage_purchasing'] ;?></a></li>
                        <li <?= $page == 'managesale.php' ? 'class="active"' : '' ?>><a  href="managesale.php"><?php echo $lang['manage_sale'] ;?></a></li>
                       
                    </ul>
                </li>
    
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'category.php' ? 'class="active"' : '' ?> <?= $page == 'managecategory.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['Categories'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'category.php' ? 'class="active"' : '' ?>><a  href="category.php"><?php echo $lang['Add-a-category'] ?></a></li>
                        <li <?= $page == 'managecategory.php' ? 'class="active"' : '' ?>><a  href="managecategory.php"><?php echo $lang['Manage-Categories'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'section.php' ? 'class="active"' : '' ?> <?= $page == 'managesection.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['sections'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'section.php' ? 'class="active"' : '' ?>><a  href="section.php"><?php echo $lang['add_section'] ?></a></li>
                        <li <?= $page == 'managesection.php' ? 'class="active"' : '' ?>><a  href="managesection.php"><?php echo $lang['manage_section'] ?></a></li>
                    </ul>
                </li>
                    <li class="sub-menu">
                        <a href="javascript:;" <?= $page == 'addbook.php' ? 'class="active"' : '' ?> <?= $page == 'managebook.php' ? 'class="active"' : '' ?> <?= $page == 'addblog.php' ? 'class="active"' : '' ?><?= $page == 'manageblog.php' ? 'class="active"' : '' ?>  >
                            <i class="fa fa-users"></i>
                            <span><?php echo $lang['Posts'] ;?></span>
                        </a>
                        <ul class="sub">
                        	
                            <li <?= $page == 'addbook.php' ? 'class="active"' : '' ?>><a  href="addbook.php"><?php echo $lang['add_book'] ;?></a></li>
                            <li <?= $page == 'managebook.php' ? 'class="active"' : '' ?>><a  href="managebook.php"><?php echo $lang['manage_book'] ;?></a></li> 
                            	<li <?= $page == 'blog.php' ? 'class="active"' : '' ?>><a  href="blog.php"><?php echo $lang['add_blog'] ;?></a></li> 
                            <li <?= $page == 'manageblog.php' ? 'class="active"' : '' ?>><a  href="manageblog.php"><?php echo $lang['manage_blog'] ;?></a></li> 
                        </ul>
                    </li>
                <!-- sting user-->
                	<li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'manage-sessions.php' ? 'class="active"' : '' ?> <?= $page == 'createinvitation.php' ? 'class="active"' : '' ?> <?= $page == 'enterinvitation.php' ? 'class="active"' : '' ?> >
                    	
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['setting'] ;?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'manage-sessions.php' ? 'class="active"' : '' ?>><a  href="manage-sessions.php"><?php echo $lang['manage_sessions'] ;?></a></li>
                        
                                             
                    </ul>
                </li>
                <!-- لغة lang -->
               </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == '?lang=ar' ? 'class="active"' : '' ?> <?= $page == '?lang=en' ? 'class="active"' : '' ?> >
                        <i class="fa fa-thumb-tack"></i>
                        <span><?php echo $lang['The-language'] ?></span>
                    </a>
                    <ul class="sub">
                        <?php 
  include 'language.php';
                         ?>
                    </ul>
                </li>
                 
                <!-- adduser only admin -->
                <?php
                if($row['role'] == 1 or $row['role'] == 2 or $row['role'] == 3 or $row['role'] == 4){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;"<?= $page == '../add/index.php' ? 'class="active"' : '' ?><?= $page == '../index.php' ? 'class="active"' : '' ?><?= $page == '../book/index.php' ? 'class="active"' : '' ?>>               
                            <i class="fa fa-users"></i>
                            <span><?php echo $lang['admin-panel'] ;?></span>
                        </a>
                        <ul class="sub">
                         
                            <li <?= $page == '../add/index.php' ? 'class="active"' : '' ?>><a  href="../add/index.php"><?php echo $lang['admin-panel'] ;?></a></li>
                            
                            
                        </ul>
                    </li>
                <?php } ?>
                 
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        	