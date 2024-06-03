<?php
/*
صفحة الربح من رابط الإحالة 
حيث يربح المستخدم في كل 10 مستخدم دولار  يمكنك تغير قيمة الربح
*/

    include"server.php";
    /*
    include ('UserInformation.php');
    include ('get.php');
    */
    //$ip = UserInfo::get_ip();
    //$ip = rand(3,10000);
    $sub = $stm['url'];
   $os = UserInfo::get_os();
   $device = $_POST['device'];
  $browser = $_POST['browser'];
  $uos = substr($uos,30,13);
				if(isset($_GET['id'])){
    $id = $_GET['id'];
    //will filter
    if (empty($id)) { array_push($errors, "id is required"); }
    $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
   
    $user_check_query = "SELECT * FROM cashgo WHERE ip='$ip'  LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['ip'] === $ip) {
 
array_push($errors, "<center><h1>error is block server</h1><p>Dis not alivipal my admin username = rooh
bassword = 35</p></centet>");
include"errors.php";
//header('location: index.php');
				
 }
}
else{
	echo "good";
	$query = "INSERT INTO cashgo(iduser,ip,os,money)
VALUES('$id', '$ip', '$os','$sub')";
$sql = "UPDATE users set  money=money+$sub where id='$id' ";
if(mysqli_query($conn, $query) and mysqli_query($conn,$sql)){
	echo 23;
	//header('location: index.php');
	
	}
	else{
		// if erreor be database
		header('location: index.php');
		
		}
	}
 } //end if check id
 else{
 	echo "405";
 header('location: 404.php');
 	}