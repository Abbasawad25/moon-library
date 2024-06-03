<?php 
require_once 'server.php';
session_start();
  include 'languages/langConfig.php';
  
 require_once 'ads.php';
 if(!isset($_SESSION['username'])) {

}
else{
    $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";
    $user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
}
 $social = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM social where id='1' "));
$site =  mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM site where id='1' "));  
$pagedownload = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM downloadpage where id='1' "));
		
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
$title = '';
if($page == 'index.php'){
    $title = $lang['home'] ;
    $description = $lang['description'];
}
elseif ($page == 'single.php'){
	
  $idbook = $_GET['id'];
 if(isset($idbook)){
 $idbook = filter_var($idbook,FILTER_SANITIZE_NUMBER_INT);
 $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idbook' ")); 
   $idsbook = $book['id'];
   $keywords =    $book['keywords'];
    $autho = $book['username'];
    $description = $book['summary'];
     }
 $sar = $_GET['tag'];
 if(isset($sar)){
 $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where tag='%$sar%' ")); 
   $idsbook = $book['id'];
   
   
     }
     $idauthor = $book['iduser'];
     $author_link = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user_link where iduser='$idauthor' ")); 
    $title =  $book['name'];
    $keywords =    $book['keywords'];
    $autho = $book['username'];
    $description = $book['summary'];
}
elseif ($page == 'contact.php'){
    $title = $lang['Contact'];
}
elseif ($page == 'page.php'){
    $idpage = $_GET['page'];
 $pagesite  = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM page where id='$idpage' "));
 $title = pagesite['title'];
 $keywords =    $pagesite['keywords'];
    $description = $book['description'];
}


elseif ($page == 'author.php'){
   
  $idauthor = $_GET['id'];
  $idauthor = filter_var($idauthor,FILTER_SANITIZE_NUMBER_INT);
 if(isset($idauthor)){
 	
$author =  mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$idauthor' "));
$idauthor = $author['id'];
$author_link = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user_link where iduser='$idauthor' "));  
}
$title = $author['name'];
$description = $author['bio'];
  $ads = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM ads" ));
  
 if(isset($idauthor)){
 $idbook = filter_var($idbook,FILTER_SANITIZE_NUMBER_INT);
 $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where iduser='$idauthor' ")); 
   $idsbook = $book['id'];
   $autho = $book['username'];
     }
}
elseif ($page == 'download.php'){
	$idbook = $_GET['id'];
 if(isset($idbook)){
 $idbook = filter_var($idbook,FILTER_SANITIZE_NUMBER_INT);
 $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idbook' ")); 
   $idsbook = $book['id'];
     }
    $title = $lang['download']  . " " .$book['name'] ;
    $keywords =    $book['keywords'];
    $autho = $book['username'];
    $description = $book['summary'];
}
$propost = $stm['view_special_posts'];
$more_down_post = $stm['view_more_loaded_posts'];
$more_view_post = $stm['view_more_posts'];
$view_paid = $stm['view_paid'];
$view_reviews = $stm['view_reviews'];
$status_post = $stm['view_post'];
if($status_post == 2){
	$logc = "!=";
	}else{
		$logc = "=";
		}
  

?>

<!DOCTYPE html>
<html lang="<?php echo $lang['lang'] ;?>" >

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1>
    
    <!-- Site Metas -->
    <title>موقع مكتبة موون</title>
    <meta name="keywords" content="موون">
    <meta name="description" content="نوقع مكتبة">
    <meta name="author" content="عباس عوض">
    	
  <meta property="og:url" content="http://moonlibrary.22web.org"> 
  <meta property="og:type" content="books.book.blogs.blog"> 
  <meta property="og:title" content="موون"> 
  <meta property="og:description" content="$description"> 
  <meta property="og:image" content="http://moonlibrary.22web.org/book/images/logo.png"> 
  
  
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico"> 
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico"> 
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico"> 
  <meta name="msapplication-TileColor" content="#ffffff"> 
  <meta name="msapplication-TileImage" content="images/favicon.ico"> 
  <meta name="theme-color" content="#45b09e"> 
  <meta name="application-name" content="<?php echo $lang['namesite'] ;?>"> 
  <meta name="msapplication-config" content="images/favicon.ico"> 
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="upload/images/site/<?php echo $site['icon'] ;?>">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="css/version/tech.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

.panel{
	display: none;
} </style>
</head>
<body>
	