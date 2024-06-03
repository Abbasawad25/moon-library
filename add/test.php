<?php
require "sendemail.php";

$username = "info.oneplusfree@gmail.com";
$password = "oauttkvnlcaxlset";
$sender_name = "oneplus ون بلس";

$subject = "مرحبا بكم";
$title = "مقال عن كيفية إستخدام الموقع";
$text = "مرحبا بك عزيزي المستخدم
نشكرك على استخدام موقعنا نتمنى ان يعجبك الموقع";

$res = send_email($username, $password, $sender_name, "abbasawad916"."@gmail.com",$subject, $title, $text);
var_dump($res);

$res = send_email($username, $password, $sender_name,"info.oneplusfree"."@gmail.com",$subject, $title, $text);
var_dump($res);
$res = send_email($username, $password, $sender_name," rixhost390"."@gmail.com",$subject, $title, $text);
var_dump($res);
$res = send_email($username, $password, $sender_name,"rixabbasawad"."@gmail.com",$subject, $title, $text);
var_dump($res);
$res = send_email($username, $password, $sender_name,"rixfreehost"."@gmail.com",$subject, $title, $text);
var_dump($res);
