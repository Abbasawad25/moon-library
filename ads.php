<?php
include"server.php";
if (!isset($_SESSION['username'])) {
$ads = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM ads" )); 
}
else{
       $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";

$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pays where username='".$_SESSION['username']."';")); 
$a = $row['status'];
 if($a == 1){
       
}
 else{
 	$ads = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM ads" )); 
   
}
}