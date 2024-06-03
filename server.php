<?php
 
session_start();
 
$errors = array();
error_reporting(0);
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname  = 'noor';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
date_default_timezone_set("Africa/Khartoum");
   include_once ('UserInformation.php');
    include_once ('get.php');
    $lan =  $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $lan = substr($lan,0,2);
    $_SESSION['lang'] = $lan;
    $browser = $_SERVER['HTTP_SEC_CH_UA'];
    $browse = explode(" ",$browser);
    $brows = in_array("Google Chrome",$browse);
    if($brows == 0){
    $browser = substr($browser,40.5,16);
    $browser = substr($browser,3,13);
    }
    //echo $lang;
    
   $ip = UserInfo::get_ip();
    
$os = UserInfo::get_os();
$device = UserInfo::get_device();
$browser = UserInfo::get_browser();
$os = substr($uos,30,13);

$stm = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM stm where id='1' ")); 
  
    
//echo $_SERVER['HTTP_REFERER'];
include ('block.php');
 $usv = $_SESSION['username'];
$stop = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='$usv' ")); 
/* if($stm['web'] == 0 and $stop['role'] == "admin"){
	
	}
	elseif($stm['web'] == 0 and $stop['role'] !== "admin"){
		header('location: ../stop' . '.php');
		exit;
		}
		
		*/
	
?>