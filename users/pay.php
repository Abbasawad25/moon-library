<?php

   
   include('../server.php');
   session_start();
  include '../languages/langConfig.php';
   
   $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$a = $_POST['reg_user'];
$max_image = $stm['max_image'];
   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST") {
                   $username = $row['username'];
                     $email = $row['email'];
                   $pay = $_POST['pay'];
                   $iduser = $row['id'];
                   $portal_payment = $_POST['portal_payment'];
                   $plan = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM plan where id='$pay' ")); 
                   $days = $plan['time'];
                   $amount = $plan['amount'];
$r = $row['account_number'];
                   if($days == 1){
                   $day = "يوم";
                   
}
elseif($days == 7){
	$day = "إسبوع";
}
elseif($days == 30){
	$day = "شهر";
}
elseif($days == 360){
	$day = "سنة";
}
                   
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < $max_image) {
				$fileDestination = '../upload/images/saccharine/pay/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				
				$sql = "INSERT INTO pays (username,email,pay,image,days,status,iduser,portal_payment,ip,os,time)
VALUES ('$username','$email', '$amount','$imgName','$day','0','$iduser','$portal_payment','$ip','$os','$days')";
//

//
if ($conn->query($sql) === TRUE) {
	$s = $lang['save'];
	?>
		<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
		<?php
 header('REFRESH:0.1;url=paypro.php');
  
  
} else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }
			} else {
				echo $lang['the_image_size_is _too_large'];
				
 header('REFRESH:0.1;url=paypro.php');
			}
		}else{
			echo $lang['line_to_raise_the_image'];
			
		}
	}else {
			echo $lang['image_type_is_unknown'];
	
	}
	


 
               
   }