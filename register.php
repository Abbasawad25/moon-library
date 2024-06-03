<?php 
  session_start();
  include 'languages/langConfig.php';
?>
 
<?php include('server.php'); 
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users order by id DESC "));
$account_number = $ro['account_number'] + 1;
 
if (isset($_POST['reg_user'])) {
 
// receive all input values from the form
 
$username = mysqli_real_escape_string($conn, $_POST['username']);
 
$email = mysqli_real_escape_string($conn, $_POST['email']);
 
$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
 
$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
 $name = mysqli_real_escape_string($conn, $_POST['name']);
$num = $_POST['num'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$co = $_POST['co'];
$city = $_POST['site'];
$nav = $_POST['nav'];

// form validation: ensure that the form is correctly filled ...
 
// by adding (array_push()) corresponding error unto $errors array
 
if (empty($username)) { array_push($errors, "اسم المستخدم مطلوب"); }
 
if (empty($email)) { array_push($errors, "Email is required"); }
 
if (empty($password_1)) { array_push($errors, "Password is required"); }
if (empty($name)) { array_push($errors, "اسمك مطلوبك"); }
if (empty($date)) { array_push($errors, "تاريخ ميلادك"); }
if (empty($sex)) { array_push($errors, "الجنس او النوع مطلوب"); }
if (empty($co)) { array_push($errors, "الدولة مطلوبة"); }

if (empty($num)) { array_push($errors, "رقم الهاتف مطلوب"); }
 if (empty($city)) { array_push($errors, " اسم مدينتك"); }
 if (empty($nav)) { array_push($errors, "nav is required"); }
if ($password_1 != $password_2) {
 
array_push($errors, "The two passwords do not match");
 
}
 
// first check the database to make sure
 // filter
$name = filter_var($name,FILTER_SANITIZE_STRING);
$username = filter_var($username,FILTER_SANITIZE_STRING);
$password = filter_var($password,FILTER_SANITIZE_STRING);
$email = filter_var($email,FILTER_SANITIZE_STRING);
$co = filter_var($co,FILTER_SANITIZE_STRING);
$num = filter_var($num,FILTER_SANITIZE_STRING);
$site = filter_var($site,FILTER_SANITIZE_STRING);
 if (filter_var($email,FILTER_VALIDATE_EMAIL) == false) { array_push($errors, " البريد الالكتروني ليس صحيح"); }
 $username = str_replace(" ","",$username);
 $username = strtolower($username);
 if (strlen($username) >= 20) { array_push($errors,  "اسم المستخدم طويل يجب ان يكون اقل من 20"); }
// a user does not already exist with the same username and/or email

 
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['username'] === $username) {
 
array_push($errors, "إسم المستخدم موجد الرجاء كتابة اسم غيره");
 
}
 
if ($user['email'] === $email) {
 
array_push($errors, "هذا البريد موجد بالفعل الرجاء كتابة بريد آخر");
 
}
 
}
 $new = date('Y');
// Finally, register user if there are no errors in the form
 if($new - $date >= 10 ){
if (count($errors) == 0) {
 
$password = md5($password_1);//encrypt the password before saving in the database
 

 
$query = "INSERT INTO users(username,email,password,date,name,country,num,sex,city,role,money,nav,checkuser,account_number)
VALUES('$username', '$email', '$password','$date','$name','$co','$num','$sex','$city','0','1','$nav','0','$account_number')";

mysqli_query($conn, $query);
//mysqli_query($conn, $in);
 
 
$_SESSION['username'] = $username;
 
$_SESSION['success'] = "You are now logged in";
 
header('location: index.php');
 
}
} //end if else
else {
 	array_push($errors, "يجب ان يكون عمرك أكبر 13 سنة");
} 
//end else date
 
}?>
 
<!DOCTYPE html>
 
<html lang="<?php echo $lang['lang'] ;?>">
 
<head>
 
 <meta charset="utf-8">   
 	 <title>إنشاء حساب | <?php echo $lang['title']?></title>
     <meta name="keywords" content="<?php echo $lang['keywords'] ?>">
     	<meta name="site" content="<?php echo $lang['namesite'] ?>">
     	<meta name="oneplusfreenet:site" content="<?php echo $lang['namesite'] ?>">     	
    <meta name="description" content="<?php echo $lang['description'] ?>">    
<link rel="shortcut icon" href="images/logo.png">      
    <meta name="author" content="<?php echo $lang['author'] ?>">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     
     
 <!-- Bootstrap core CSS-->
 
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom fonts for this template-->
 
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
 <!-- Custom styles for this template-->
 
 <link href="css/sb-admin.css" rel="stylesheet">
 
</head>
 
<body class="bg-danger">
 
 <div class="container">
 
   <div class="card card-register mx-auto mt-5 bg-danger">
 
     <div class="card-header text-center"><img src="login.png" width="60px" height="60px"></div>
 
     <div class="card-body">
 
       <form method="post" action="register.php">
 
         <?php include('errors.php'); ?>
  <div class="form-group">
 
           <div class="form-row">
 
             <div class="col-md-12">
 
               <label for="exampleInputName"  class="text-white"><?php echo $lang['nameall'] ;?></label>
 
               <input class="form-control" id="exampleInputName" type="text"   name="name">
 
             </div>
 
           </div>
 
         </div>
 
 <div class="form-group">
 
           <label for="username"  class="text-white"><?php echo $lang['username'] ;?></label>
 
           <input   class="form-control" id="username" type="text" aria-describedby="username" name="username">
           	
           	
 
         </div>
          
         <div class="form-group">
 
           <label for="exampleInputEmail1"  class="text-white"><?php echo $lang['email'] ;?></label>
 
           <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" name="email"  >
 
         </div>
         <div class="form-group">
 
           <label for="number"  class="text-white"><?php echo $lang['number'] ;?></label>
 
           <input class="form-control" id="number" type="number" name="num"  required>
 
         </div>
         
         <div class="form-group">
 
           
  <input type="radio" name="sex" value="1"> <?php echo $lang['male'] ;?> <br>
                           <input type="radio" name="sex" value="2"> <?php echo $lang['female'] ;?> <br>
                           	<label  class="text-white"><?php echo $lang['six'] ;?></label>
         </div>
         <div class="form-group">
          <select  id='co' required name="co" >
          	<option value="مصر">مصر</option>
					<option value="السودان" selected>السودان</option>
					<option value="تركيا"> تركيا</option>
					<option value="قطر"> قطر</option>
					<option value="السعودية"> السعودية</option>
						<option value="تونس" > تونس</option>
					<option value="ليبيا"> ليبيا</option>
					<option value="لبنان"> لبنان</option>
					<option value="المغرب"> المغرب</option>
						<option value="الكويت" > الكويت</option>
					<option value="فلسطين"> فلسطين</option>
					<option value="العراق"> العراق</option>
					<option value="الأردن"> الأردن</option>
				</select>
           <label for="co"  class="text-white"><?php echo $lang['Countrys'] ;?></label>
         </div>
          <div class="form-group">
 
           <label for="site"  class="text-white">المدينة </label>
 
           <input class="form-control" id="site" type="text" name="site"  required>
 
         </div>
         <div class="form-group">
 <select class="header-domains border-0 outline-0" name="date" id='keyword' required>
 	<?php for ($m = 2014;$m >= 1920; $m--){
                                	echo '<option value=" '; echo $m; echo ' ">' ;echo $m; echo '</option>';
} ?>
                                </option>
                                </select>
           <label for="date"  class="text-white"><?php echo $lang['bron'] ;?></label>
 
          <select class="header-domains border-0 outline-0" name="month" id='keyword' required>
 	<?php for ($m = 1;$m <= 12; $m++){
                                	echo '<option value=" '; echo $m; echo ' ">' ;echo $m; echo '</option>';
} ?>
                                </option>
                                </select>
           <label for="date"  class="text-white">الشهر</label>
 <select class="header-domains border-0 outline-0" name="day" id='keyword' required>
 	<?php for ($m = 1;$m <= 31; $m++){
                                	echo '<option value=" '; echo $m; echo ' ">' ;echo $m; echo '</option>';
} ?>
                                </option>
                                </select>
           <label for="date"  class="text-white">اليوم</label>
 
                
 
         </div>
 
         <div class="form-group">
 
           <div class="form-row">
 
             <div class="col-md-6">
 
               <label for="exampleInputPassword1" style="color:white;"><?php echo $lang['password'] ;?></label>
 
               <input class="form-control" id="exampleInputPassword1" type="password" name="password_1" >
 
             </div>
 
            <div class="col-md-6">
 
               <label for="exampleInputPassword1"  class="text-white"><?php echo $lang['Confirm-password'] ;?></label>
 
               <input class="form-control" id="exampleInputPassword2" type="password" name="password_2" >
 
             </div>
 
           </div>
 
         </div>
       <div class="form-group">
 
           <input type="radio" name="nav" value="yes"> أوافق <br>
                           <input type="radio" name="nav" value="no"> لا <br>
                           	<label  class="text-white">إستلام الإشعارات عبر البريد الالكتروني</label>
 
         </div>
       
 
 
          <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'] ;?></button>
       </form>
 
       <div class="text-center" >
 
         <a class="d-block small mt-3" href="login.php" style="color:white;" ><?php echo $lang['Login'] ;?></a>
         <h5><?php echo $lang['The-language'] ;?></h5>
         <form action="register.php" method="GET" >
         	<div class="form-group"> 
         <select name="lang" id="skil" class="form-control">
         	<option value="ar"> العربية</option>
         <option value="en">English</option>
         	<select>
         
         </div>
         <button type="submit" class="btn btn-warning btn-block" name="d"  class="text-white"><?php echo $lang['send'] ;?></button>
         	</form>
         
 
       <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
 
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