<?php include('server.php'); 

if(isset($_POST['login_user'])) 
{ 
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	if (empty($username)) 
	{
		array_push($errors, "Username is required");
	}
	
	if(empty($password)) 
	{
		array_push($errors, "Password is required");
	}
	
	if (count($errors) == 0) 
	{
		$password = md5($password);
	
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	
		$results = mysqli_query($conn, $query);
	
		if (mysqli_num_rows($results) == 1) 
		{
			$_SESSION['username'] = $username;

			/* Create separate session if the user is perticularly admin */
			$role = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'"))['role'];
			if($role == 1)
				$_SESSION['role'] = "admin";
			if($role == 0)
				$_SESSION['role'] = "user";

			$_SESSION['success'] = "You are now logged in";
			$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
			
			$id = $row['id'];
			$w = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM infousers where ip='$ip' ")); 
			if($w['ip'] !== $ip or $w['browser'] !== $browser){
			
			$in = "INSERT INTO infousers(username,ip,os,device,browser,nameos) VALUES('$id','$ip','$os','$device','$browser','$nameos')";
			mysqli_query($conn, $in);
			}
			else{
				}
			header('location: users/index.php');
		}
		else
		{
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>
	<?php 
  session_start();
  include 'languages/langConfig.php';
?>
 
<!DOCTYPE html>
 
<html lang="<?php echo $lang['lang'];?>">
 
<head>
 
 <meta charset="utf-8">
 
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<title>صفحة تسجيل الدخول | <?php echo $lang['title']?></title>
     <meta name="keywords" content="<?php echo $lang['keywords'] ?>">
     	<meta name="site" content="<?php echo $lang['namesite'] ?>">
     	<meta name="oneplusfreenet:site" content="<?php echo $lang['namesite'] ?>">
     	
    <meta name="description" content="<?php echo $lang['description'] ?>">
    <link rel="shortcut icon" href="images/<?php echo $result['icon'] ?>">  
<meta name="card" content="<?php $result['icon']?>"> 
 <meta name="image" content="<img src="images/<?php $result['logo']?>" />   
<link rel="shortcut icon" href="<?php $result['icon']?>">      
    <meta name="author" content="<?php echo $lang['author'] ?>">
 
 <!-- Bootstrap core CSS-->
 
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom fonts for this template-->
 
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
 <!-- Custom styles for this template-->
 
 <link href="css/sb-admin.css" rel="stylesheet">
 
</head>
 
<body class="bg-danger" dir="<?php echo $lang['dir'] ?>>
 
 <div class="container">
 
   <div class="card card-login mx-auto mt-5 bg-danger ">
 
     <div class="card-header text-center text-bold"><img src="login.png" width="60px" height="60px"></div>
 
     <div class="card-body">
 
       <form method="post" action="login.php">
 
          <?php include('errors.php'); ?>
 
         <div class="form-group">
 
           <label for="exampleInputEmail1" style="color:white;">إسم المستخدم</label>
 
           <input class="form-control"  type="text" name="username">
 
         </div>
 
         <div class="form-group">
 
           <label for="exampleInputPassword1" style="color:white;">كلمة السر</label>
 
           <input class="form-control"  type="password" name="password">
 
         </div>
 
       
 
         <button type="submit" class="btn btn-warning btn-block" name="login_user">تسجيل دخول</button>
 
       </form>
 
       <div class="text-center">
 
         <a class="d-block small mt-3" href="register.php" style="color:white;">إنشاء حساب جديد</a>
         <a class="d-block small" href="forgot-password.php">هل نسيت كلمة السر</a>
 
       </div>
 
     </div>
 
   </div>
 
 </div>
 
 <!-- Bootstrap core JavaScript-->
 
 <script src="vendor/jquery/jquery.min.js"></script>
 
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
 <!-- Core plugin JavaScript-->
 
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
</body>
 
</html>