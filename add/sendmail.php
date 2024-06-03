<?php require_once 'header.php' ?>

    
    
<?php
   include('../server.php');
session_start();
  include '../languages/langConfig.php';
                   $name = $_POST['name'];
                      $title = $_POST['title'];
                   
                   $content = $_POST['content'];
                   $date = date('Y-m-d h:i:s');
                   $email_to = $_POST['email'];
                   $sql = "INSERT INTO ";
                   
   ?>
   <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$path_to = "PHPMailer";
require "$path_to/src/Exception.php";
require "$path_to/src/PHPMailer.php";
require "$path_to/src/SMTP.php";

function email_template($title, $text, $email, $logo, $site_name, $site) {
   $body = '<div style="margin:0px;padding:0px" bgcolor="#FFFFFF">
    <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="en">
      <tbody>
        <tr height="32" style="height:32px">
          <td></td>
        </tr>
        <tr align="center">
          <td>
            <div>
              <div></div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
              <tbody>
                <tr>
                  <td width="8" style="width:8px"></td>
                  <td>
                    <div style="border:thin solid rgb(218,220,224);border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;padding:40px 20px" align="center">
                      <img src="../upload/images/site/logo.png" width="140" aria-hidden="true" style="margin-bottom:16px" alt="مكتبة موون" class="CToWUd" data-bit="iit">
                      <div style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom-width:thin;border-bottom-style:solid;line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word;border-bottom-color:rgb(218,220,224);color:rgba(0,0,0,0.87)">
                        <div style="font-size:24px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">'.$_POST['title'].'</div>
                        <p><p>
                        <table align="center" style="margin-top:8px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                          <tbody style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                            <tr style="line-height:normal;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                              <td style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                                <a style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;color:rgba(0,0,0,0.87)">'.$stmp['email'] .'</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;padding-top:20px;text-align:left;color:rgba(0,0,0,0.87)">
                        <p style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif">'.$_POST['name'].'</p>
                      </div>
                      <div style="padding-top:20px;font-size:12px;line-height:16px;letter-spacing:0.3px;text-align:center;color:rgb(95,99,104)">'.$_POST['content'].'<br>
                        <a style="text-decoration:inherit;color:rgba(0,0,0,0.87)"  href="http://oneplus24.wuaze.com">زيارة موقعنا</a>
                         <p>'.$_POST['date'].'</p>
                        <p> نشكرك على إستخدام موقعنا </p>
                        
                      </div>
                    </div>
                    <div style="text-align:left">
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:11px;line-height:18px;padding-top:12px;text-align:center;color:rgba(0,0,0,0.54)">
                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif">You received this email to let you know about important changes to your Account and services.</div>
                         <p>'.$lang['title'] . '</p>
                      </div>
                    </div>
                  </td>
                  <td width="8" style="width:8px"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr height="32" style="height:32px">
          <td></td>
        </tr>
      </tbody>
    </table>
    </div>';
    return $body;
}

function send_email($username, $password, $sender_name, $to, $subject, $title, $text) {
   $mail = new PHPMailer();
   try {
      $mail->IsSMTP();
      $mail->SMTPDebug = 1;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465;
      $mail->IsHTML(true);
      $mail->Username = $username;
      $mail->Password = $password;
      $mail->SetFrom($mail->Username, $sender_name);
      $mail->Subject = $subject;
      $mail->CharSet = "UTF-8";
      $mail->addReplyTo($username, $sender_name);
      
      $email = $to;
      $logo = "https://wallpapers.com/images/featured-full/4k-oaax18kaapkokaro.jpg";
      $site_name = $lang['namesite'];
      $site = "http://oneplus24.wuaze.com/";

      $mail->Body = email_template($title, $text, $email, $logo, $site_name, $site);
      $mail->AddAddress($to);

      if(!$mail->Send()) {
         // echo "Mailer Error: " . $mail->ErrorInfo;
         return false;
      } else {
         // echo "Message has been sent";
         return true;
      }
   } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
   }
}

   
?>
<?php 
$username = "info.oneplusfree@gmail.com";
$password = "oauttkvnlcaxlset";
$sender_name = $lang['namesite'];

$subject = "مرحبا بكم";
$title = "مقال عن كيفية إستخدام الموقع";
$text = "مرحبا بك عزيزي المستخدم
نشكرك على استخدام موقعنا نتمنى ان يعجبك الموقع";

$res = send_email($username, $password, $sender_name, "noreply"."@facebookmail.com",$subject, $title, $text);

$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where email='".$_POST['email']."';")); 
  	$emailto = $_POST['email'];
     $nameto = $ro['name'];
  
$res = send_email($username, $password, $sender_name,$emailto,$subject, $title, $text);

     
?>
 