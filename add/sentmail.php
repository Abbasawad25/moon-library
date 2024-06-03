<?php
require "sendemail.php";
include "../server.php";
$username = "info.oneplusfree@gmail.com";
$password = "oauttkvnlcaxlset";
$sender_name = "oneplus ون بلس";

$subject = "مرحبا بكم";
$title = "مقال عن كيفية إستخدام الموقع";
$text = "مرحبا بك عزيزي المستخدم
نشكرك على استخدام موقعنا نتمنى ان يعجبك الموقع";

$res = send_email($username, $password, $sender_name, "rixabbasawad"."@gmail.com",$subject, $title, $text);
var_dump($res);

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
  	$emailto = $row['email'];
     $nameto = $row['name'];
  
 $res = send_email($username, $password, $sender_name,$emailto,$subject, $title, $text);
var_dump($res);
  }
}
 else {
  echo "0 results";
 }              

