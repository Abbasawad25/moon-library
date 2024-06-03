<?php 
  session_start();
  include '../languages/langConfig.php';
?>
<?php

//include"header.php";
   include('../server.php');
   
    
    $ip = UserInfo::get_ip();
   //$os = UserInfo::get_os();
   $device = $_POST['device'];
  $browser = $_POST['browser'];
  $uos = substr($uos,30,13);
  $os = $uos;
   $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $username =  $row['account_number'];
                   $name =  $row['name'];
                      
                      $rixpay = $_POST['rixpay'];
                      $id = $row['id'];
                      $account_number = $_POST['usernamem'];
         if (empty($account_number)) { array_push($errors, "nav is required"); }            
                 $account_number = filter_var($account_number,FILTER_SANITIZE_STRING);    
                    
                      $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where account_number='$account_number' ")); 
                      
    $nameto=" : " . $ro['name'];
    $nametos = $ro['name'];
    $numberto =" " . $ro['num'];
   $mos= $ro['money'];
   $ids = $ro['id'];
                      
                       $money = $_POST['money'];
                       $mo = $row['money'];
                       $usernamem = $account_number;
// first check the database to make sure
if (empty($money)) { array_push($errors, "money is required"); }
 $money = filter_var($money,FILTER_SANITIZE_NUMBER_INT);
$money = str_replace(array("+",'-'),"",$money) ;
 if (filter_var($money,FILTER_VALIDATE_INT) == false) { array_push($errors, "404"); }                                           
                      ?>
                      	

  

    
    <!DOCTYPE html>
<html lang="<?php echo $lang['lang'];?>" dir="rtl">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $lang['description'];?>">
    <meta name="author" content="abbasawad25">

    <title><?php echo $lang['title'];?></title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body  class="bg-dark"  >

  
  	<?php
  $min = $stm['mintr'];
  $max = $stm['maxtr'];
  $opr = rand(1,1000000) . random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000);
  $descount = $stm['descount'];
  /*
  ## الحد الأدنى للمعاملات مع وضع شروط
  */
  
  $block = $stm['tr'];
  if($block == 1){
  //if1
  if($money >= $min and $money <= $max){
  	//echo " goods is ";
  //if 2
     if($mo >= $money){
     	//echo "do";
     $user_check_query = "SELECT * FROM users WHERE account_number='$account_number'  LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['account_number'] === $account_number) {
 /*
 في حالة وجد الحساب
 */
 $k = $mos + $money;
     $k = str_replace(array("+",'-'),"",$k) ;
   	$sql = "UPDATE users set  money='$k' where id='$ids' ";
   	$sqld = "INSERT INTO send (username,usernamem,money,name,ip,os,number_the_process,nameto)
VALUES ('$username','$usernamem','$money','$name','$ip','$os','$opr','$nametos')";
$profit = $descount;
$profit = str_replace(array("+",'-'),"",$profit) ;
$profits = "INSERT INTO profits (account,iduser,type,amount,ip,os,number_the_process)
VALUES ('$username','$id','send','$profit','$ip','$os','$opr')";
$u = $mo - $money - $descount;
$u = str_replace(array("+",'-'),"",$u) ;
$sqb = "UPDATE users set  money='$u' where id='$id' ";
if ($conn->query($sql) and $conn->query($profits) and $conn->query($sqld) and $conn->query($sqb) === TRUE) { 

?>
	<div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="direction: rtl;text-align: center" ><?php echo $lang['transactions'] ;?>
        <p style="text-align: center;"><?php echo $lang['send-money'] ;?></div>
        <div class="card-body">
          <div class="text-center mb-4" style="direction: rtl;">
            <h4><?php echo $lang['operation-accomplished-successfully'] ;?></h4>
            
            <p style="text-align: right;"><?php echo $lang['from-an-account'] ;?><span style="text-align: center;"><?php echo $username;?></span></p>
            
            <p style="text-align: right;"><?php echo $lang['to-an-account'] ;?><span style="text-align: center;margin-right: 5px;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-name-of-the-sender'] ;?><span style="text-align: center;"><?php echo $nameto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-amount'] ;?><span style="text-align: center;"><?php echo $money;?></span></p>
            <p style="text-align: right;"><?php echo $lang['date-the-process'] ;?><span style="text-align: center;"><?php echo date('Y-m-d H:i:s');?></span></p>
            <p style="text-align: right;"><?php echo $lang['mobile-number'] ;?><span style="text-align: center;"><?php echo $numberto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['number-the-process'] ;?><span style="text-align: center;"><?php echo $opr;?></span></p>
            
            
          </div>
          
          <div class="text-center">
          	<a class="btn btn-primary btn-block" href="rmoney.php"><?php echo $lang['notices-page'] ;?></a>
            <a class="btn btn-primary btn-block" href="index.php"><?php echo $lang['back'] ;?></a>
            <button class="btn btn-primary btn-block" onclick="window.print()"><?php echo $lang['print'] ;?></button>
          </div>
        </div>
      </div>
    </div>
	<?php
	}
	else{
		/*
		في حالة حدث خطا ما
		*/
		}
	
} // end 3
else{
	echo 90;
	}
}
else{
	/*
	في حالة لم يجد الحساب
	*/
	?>
		<div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="direction: rtl;text-align: center" ><?php echo $lang['transactions'] ;?>
        <p style="text-align: center;"><?php echo $lang['send-money'] ;?></div>
        <div class="card-body">
          <div class="text-center mb-4" style="direction: rtl;">
            <h4><?php echo $lang['the-process-failed'] ;?></h4>
            <p style="text-align: right;"><?php echo $lang['this-account-does-not-exist'] ;?><span style="text-align: center;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['from-an-account'] ;?><span style="text-align: center;"><?php echo $username;?></span></p>
            
            <p style="text-align: right;"><?php echo $lang['to-an-account'] ;?><span style="text-align: center;margin-right: 5px;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-name-of-the-sender'] ;?><span style="text-align: center;"><?php echo $nameto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-amount'] ;?><span style="text-align: center;"><?php echo $money;?></span></p>
            <p style="text-align: right;"><?php echo $lang['date-the-process'] ;?><span style="text-align: center;"><?php echo date('Y-m-d H:i:s');?></span></p>
            <p style="text-align: right;"><?php echo $lang['mobile-number'] ;?><span style="text-align: center;"><?php echo $numberto;?></span></p>
            
            
          </div>
          
          <div class="text-center">
          	<a class="btn btn-primary btn-block" href="rmoney.php"><?php echo $lang['notices-page'] ;?></a>
            <a class="btn btn-primary btn-block" href="index.php"><?php echo $lang['back'] ;?></a>
            <button class="btn btn-primary btn-block" onclick="window.print()"><?php echo $lang['print'] ;?></button>
          </div>
        </div>
      </div>
    </div>
		<?php
	}
     
     
     	} //end if 2
else{
	//echo "مبلغك ليس كافي";
	?>
		<div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="direction: rtl;text-align: center" ><?php echo $lang['transactions'] ;?>
        <p style="text-align: center;"><?php echo $lang['send-money'] ;?></div>
        <div class="card-body">
          <div class="text-center mb-4" style="direction: rtl;">
            <h4><?php echo $lang['the-process-failedm'] ;?></h4>
            <p style="text-align: right;"><?php echo $lang['your-amount-is-not-enough'] ;?><span style="text-align: center;"><?php echo $mo;?></span></p>
            <p style="text-align: right;"><?php echo $lang['from-an-account'] ;?><span style="text-align: center;"><?php echo $username;?></span></p>
            
            <p style="text-align: right;"><?php echo $lang['to-an-account'] ;?><span style="text-align: center;margin-right: 5px;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-name-of-the-sender'] ;?><span style="text-align: center;"><?php echo $nameto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-amount'] ;?><span style="text-align: center;"><?php echo $money;?></span></p>
            <p style="text-align: right;"><?php echo $lang['date-the-process'] ;?><span style="text-align: center;"><?php echo date('Y-m-d H:i:s');?></span></p>
            <p style="text-align: right;"><?php echo $lang['mobile-number'] ;?><span style="text-align: center;"><?php echo $numberto;?></span></p>
            
            
            
          </div>
          
          <div class="text-center">
          	<a class="btn btn-primary btn-block" href="rmoney.php"><?php echo $lang['notices-page'] ;?></a>
            <a class="btn btn-primary btn-block" href="index.php"><?php echo $lang['back'] ;?></a>
            <button class="btn btn-primary btn-block" onclick="window.print()"><?php echo $lang['print'] ;?></button>
          </div>
        </div>
      </div>
    </div>
		<?php
}
  	} //end if 1
else{
  	//echo 404;
  ?>
 <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="direction: rtl;text-align: center" ><?php echo $lang['transactions'] ;?>
        <p style="text-align: center;"><?php echo $lang['send-money'] ;?></div>
        <div class="card-body">
          <div class="text-center mb-4" style="direction: rtl;">
            <h4><?php echo $lang['the-process-faileds'] ;?></h4>
            <center><?php echo $lang['The-process-failed-because-of-the-following'] ;?></center>
            <p style="text-align: right;"><?php echo $lang['minimum-transactions'] ;?><span style="text-align: center;"><?php echo $min;?></span></p>
            <p style="text-align: right;"><?php echo $lang['maximum-transaction'] ;?><span style="text-align: center;"><?php echo $max;?></span></p>
            <p style="text-align: right;"><?php echo $lang['from-an-account'] ;?><span style="text-align: center;"><?php echo $username;?></span></p>
            
            <p style="text-align: right;"><?php echo $lang['to-an-account'] ;?><span style="text-align: center;margin-right: 5px;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-name-of-the-sender'] ;?><span style="text-align: center;"><?php echo $nameto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-amount'] ;?><span style="text-align: center;"><?php echo $money;?></span></p>
            <p style="text-align: right;"><?php echo $lang['date-the-process'] ;?><span style="text-align: center;"><?php echo date('Y-m-d H:i:s');?></span></p>
            <p style="text-align: right;"><?php echo $lang['mobile-number'] ;?><span style="text-align: center;"><?php echo $numberto;?></span></p>
            
            
            
          </div>
          
          <div class="text-center">
          	<a class="btn btn-primary btn-block" href="rmoney.php"><?php echo $lang['notices-page'] ;?></a>
            <a class="btn btn-primary btn-block" href="index.php"><?php echo $lang['back'] ;?></a>
            <button class="btn btn-primary btn-block" onclick="window.print()"><?php echo $lang['print'] ;?></button>
          </div>
        </div>
      </div>
    </div>
    <?php
  //if min and max
  	}
  //rnd if 0
  }
  else{
  	/*
  في حالة الخدمة لاتعمل
  */
  	?>
  	<div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="direction: rtl;text-align: center" ><?php echo $lang['transactions'] ;?>
        <p style="text-align: center;"><?php echo $lang['send-money'] ;?></div>
        <div class="card-body">
          <div class="text-center mb-4" style="direction: rtl;">
            <h4><?php echo $lang['the-process-failedo'] ;?></h4>
            <p style="text-align: right;"><?php echo $lang['sorry-transactions-please-try-later'] ;?><span style="text-align: center;"><?php echo " ";?></span></p>
            <p style="text-align: right;"><?php echo $lang['from-an-account'] ;?><span style="text-align: center;"><?php echo $username;?></span></p>
            
            <p style="text-align: right;"><?php echo $lang['to-an-account'] ;?><span style="text-align: center;margin-right: 5px;"><?php echo $usernamem;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-name-of-the-sender'] ;?><span style="text-align: center;"><?php echo $nameto;?></span></p>
            <p style="text-align: right;"><?php echo $lang['the-amount'] ;?><span style="text-align: center;"><?php echo $money;?></span></p>
            <p style="text-align: right;"><?php echo $lang['date-the-process'] ;?><span style="text-align: center;"><?php echo date('Y-m-d H:i:s');?></span></p>
            <p style="text-align: right;"><?php echo $lang['mobile-number'] ;?><span style="text-align: center;"><?php echo $numberto;?></span></p>
            
            
            
          </div>
          
          <div class="text-center">
          	<a class="btn btn-primary btn-block" href="rmoney.php"><?php echo $lang['notices-page'] ;?></a>
            <a class="btn btn-primary btn-block" href="index.php"><?php echo $lang['back'] ;?></a>
            <button class="btn btn-primary btn-block" onclick="window.print()"><?php echo $lang['print'] ;?></button>
          </div>
        </div>
      </div>
    </div>
  	<?php
  	}
  
  } // all tr
  
  else{
  	/*
  في حالة دخول الصفحة مباشر من غير post  
  سوف يتم إعادة توجية المستخدم
  */
  	header('location: ../404.php');
  	}
   
   