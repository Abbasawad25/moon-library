<?php 
  session_start();
  include 'languages/langConfig.php';
  
?>
<!DOCTYPE html>
<html lang="<?php echo $lang['lang'];?>" dir="<?php echo $lang['dir'];?>">
<?php include('server.php'); 

$dns = $_POST['reg_use'];
if(isset($dns)){
$codet = $_POST['codeone'];
if (empty($codet)) { array_push($errors, "code is required"); }
   $codet = filter_var($codet,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($codet,FILTER_VALIDATE_INT) == false){
   	array_push($errors, "code already exists");
   	}
//$d = $_POST['code'];
//$emd =  $_POST['seemail'];
//echo $emd;
$ids = $_SESSION['email'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where email='$ids'"));
$d = $ro['code'];
$id = $ro['id']; 



$array = array($emd,$id,$d);
if ($d == $codet) {
 
// receive all input values from the form

 $query = "UPDATE users set checkuser='1' where id='$id' ";
  
if(mysqli_query($conn, $query))
{
$_SESSION['username'] = $username;
 array_push($errors, $lang["the-password-has-been-successfully-changed"]);
 ?>
 <script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
 header('REFRESH:0.5;url=login.php');

if(isset($_SESSION['email'])){
    	
	unset($_SESSION['email']);
	$_SESSION=array();
	session_destroy();
	//header("Location: login.php");
}
else{
	array_push($errors, $lang["you-have-changed-the-password-before"]);
	}
 }else
 {
  array_push($errors, $lang["this-problem-has-happened-please-retry"]);
 }

}
else
 {
  array_push($errors, $lang["The-verification-code-is-not-true"]);
   
  
 }
 }

?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $lang['description'];?>">
    <meta name="author" content="">

    <title><?php echo $lang['title'];?></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body  class="bg-dark"  >

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">تأكيد حسابك</div>
        <center><p><?php include"errors.php"; ?></p></center>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4> يتوجب عليك تأكيد حسابك لمتابعة أستخدام الموقع</h4>
            <p><?php echo $eo;?></p>
            <p> أدخل رمز التحقق الذي تم أرساله لك</p>
          </div>
          <form method="post" action="">
            <div class="form-group">
            	    <label for="inputEmail"><?php echo $lang['verification'] ;?></label>
              <div class="form-label-group">
              	    
                <input type="number" id="inputEmail" class="form-control" name="codeone" placeholder="code">
                
                             
              </div>
            </div>
            
            
            <button type="submit" class="btn btn-primary btn-block" name="reg_use"  class="text-white"><?php echo $lang['send'] ;?></button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php"><?php echo $lang['Register-an-Account'];?></a>
            <a class="d-block small" href="login.php"><?php echo $lang['Login-Page'];?></a>
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
