<?php
 include"../server.php";
include"header.php";
echo $_SESSION['app'];
$sd = $_SESSION['app'];
   $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
 $username =  $row['username'];
 $iduser = $row['id'];
 
                      $number = $_POST['number'];
                      
                      $id = $row['id'];
 $d = $_POST['sado'];
$a = $_POST['reg_user'];
   if(isset($a) AND $_SERVER['REQUEST_METHOD'] == "POST") {                   
                      $type = $_POST['type'];                 
                       $money = $_POST['money'];
                       if (empty($money)) { array_push($errors, "money is required"); }
 $money = filter_var($money,FILTER_SANITIZE_NUMBER_INT);
$money = str_replace(array("+",'-'),"",$money) ;
 if (filter_var($money,FILTER_VALIDATE_INT) == false) { array_push($errors, "404"); }                  
                       
                       $mo = $row['money'];
                     
                     if($type = "pro"){
                   $pay = $_POST['pay'];
                   $portal_payment = $_POST['portal_payment'];
                   $plan = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM plan where id='$pay' ")); 
                   $days = $plan['time'];
                   $amount = $plan['amount'];
                   if($days == 1){
                   $day = "يوم";
                   $h = strtotime('+1 day');
                   
}
elseif($days == 7){
	$day = "إسبوع";
	$h = strtotime('+1 week');
}
elseif($days == 30){
	$day = "شهر";
	$h = strtotime('+1 month');
}
elseif($days == 360){
	$day = "سنة";
	$h = strtotime('+1 year');
}
               
$dateend = date('Y-m-d h:i:s' , $h);
                                                
                   	$pro = "pro";
 $n = $row['money'];

if($amount <= $mo){
                $sql = "INSERT INTO pays (username,pay,status,type,days,dateend)
VALUES ('$username','$amount','1','1','$day','$dateend')";

		$o = $n - $amount;
$sq = "UPDATE users set  money='$o' where id='$id' ";
$sqlpro = "INSERT INTO cach (iduser,username,type,days,status)
VALUES ('$iduser','$username','1','$day','1')";
if ($conn->query($sql) and  $conn->query($sq) and $conn->query($sqlpro) === TRUE) {
  #echo "New record created successfully";
#$last_id = $conn->name;
?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
header('REFRESH:0.1;url=money.php');
  #echo "New record created successfully. Last inserted ID is: " . $last_id;
  
 } 
}

else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
	header('REFRESH:0.1;url=money.php');
  #echo "Error: " . $sql . $sq. #$sqlpro . "<br>" . $conn->error;

   }
   }
   }
   if(isset($d)){
 $type = $_POST['type'];                 
                       $money = $_POST['money'];
                       $account_number = $_POST['account_number'];
                       if (empty($money)) { array_push($errors, "money is required"); }
 $money = filter_var($money,FILTER_SANITIZE_NUMBER_INT);
$money = str_replace(array("+",'-'),"",$money) ;
 if (filter_var($money,FILTER_VALIDATE_INT) == false) { array_push($errors, $lang['This-problem-has-happened-please-retry']);
}                 
                       
                       $mo = $row['money'];
		$mob = $money;
        if($money >= $stm['mincl'] AND $money <= $stm['maxcl'] ){ 
   	if($money <= $mo){
   	$sqld = "INSERT INTO cach (iduser,username,type,account,status,money)
VALUES ('$iduser','$username','$type','$account_number','0','$money')";
$u = $mo - $mob;
$sqb = "UPDATE users set  money='$u' where id='$id' ";

if ($conn->query($sqld) and $conn->query($sqb) === TRUE) { ?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
header('REFRESH:0.5;url=money.php');
$last_id = $conn->name; 
}
else {
?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
	<?php
header('REFRESH:0.5;url=money.php');
}
}
}
else{
	echo $lang['This-problem-has-happened-please-retry'] . " <br>";
	echo $lang['where_the_minimum_withdrawal_is'] . " " .$stm['mincl'] ." <br>";
	echo $lang['the_maximum_pull_is'] . " " .$stm['maxcl']  . " <br>";
	
	
	
	}
 }
 include"footer.php";