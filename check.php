<?php


include('server.php'); 

session_start();
include 'languages/langConfig.php';
 error_reporting(0);
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$checkid = $row['id'];
$checkc = $row['checkuser'];
$checkemail = $row['email'];
$seemail = $checkemail;
echo $seemail;
$activecheck = $stm['code'];
$user = $_SESSION['username'];

if($checkc == 1 and $activecheck == 1 or $activecheck == 0){
	header ("Location: index1.php");
	exit;
	}
if($checkc == 0 and $activecheck == 1){
	
	}
	 
   $code = rand(1, 900000);
   $_SESSION['codeds'] = $code;
   if (empty($seemail)) { array_push($errors, "email is required"); }
   $seemail = filter_var($seemail,FILTER_SANITIZE_EMAIL);
   if(filter_var($seemail,FILTER_VALIDATE_EMAIL) == false){
   	array_push($errors, "email already exists");
   	}
   $_SESSION['email'] = $seemail;
   $query = "UPDATE users set code='$code' where email='$seemail' ";
  
if(mysqli_query($conn, $query))
{

	}
	else{
		?>
			<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
			<?php
		}
                   
                      $title = $code . "تم أكيد حسابك وهذا هو رمز تأكيد حسابك لى متصة" . $lang['namesite'];
                   $seemail = $checkemail;
                   $content = $lang['dear_user_you_have_to_confirm_your_account_to_continue_using_the_site'];
                   $date = date('Y-m-d h:i:s');
                   
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
                      <img src="http://moon-library.kesug.com/book/images/logo.png" width="140" aria-hidden="true" style="margin-bottom:16px" alt="صورة" class="CToWUd" data-bit="iit">
                      <div style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom-width:thin;border-bottom-style:solid;line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word;border-bottom-color:rgb(218,220,224);color:rgba(0,0,0,0.87)">
                        <div style="font-size:24px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif"> عزيزي المستخدم يتوجب عليك تأكيد حسابك لمتابعة إستخدام منصة موون و التمتع بمميزات المنصة و لقد أرسلنا لنا رمز التحقق لتأكيد حسابك </div>
                        <p><p>
                        <table align="center" style="margin-top:8px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                          <tbody style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                            <tr style="line-height:normal;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                              <td style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                                <a style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;color:rgba(0,0,0,0.87)">مرحبا</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;padding-top:20px;text-align:left;color:rgba(0,0,0,0.87)">
                        <p style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif">'.$_POST['name'].'</p>
                      </div>
                      <div style="padding-top:20px;font-size:12px;line-height:16px;letter-spacing:0.3px;text-align:center;color:rgb(95,99,104)"><p>هذا هو رمز تأكيد حسابك على منصة موون</p>'.$_SESSION['codeds'].'<br>
                        <a style="text-decoration:inherit;color:rgba(0,0,0,0.87)"  href="http://moon-library.kesug.com">زيارة موقعنا</a>
                         <p>'.$_POST['date'].'</p>
                        <p>نشكرك على إستخدام موقعنا</p>
                        
                      </div>
                    </div>
                    <div style="text-align:left">
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:11px;line-height:18px;padding-top:12px;text-align:center;color:rgba(0,0,0,0.54)">
                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif">You received this email to let you know about important changes to your Account and services.</div>
                         <p>جميع الحقوق المحفوظة بواسطة منصة موون 2024©</p>
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
      $logo = "http://moon-library.kesug.com/book/images/logo.png";
      $site_name = "من مكتبة موون";
      $site = "http://moon-library.kesug.com";

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
?>
    
<!DOCTYPE html>
<html lang="<?php echo $lang['lang'];?>" dir="<?php echo $lang['dir'];?>">

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
        <div class="card-body">
          <div class="text-center mb-4">
            <h4> يتوجب عليك تأكيد حسابك </h4>
            <p> سوف نرسل لك رمز التحقق </p>
          </div>
          <?php if(empty($seemail)){ ?>
          <form method="post" action="">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus" name="seemail">
               
                <label for="inputEmail"><?php echo $lang['Enter-email-address'];?></label>
              </div>
            </div>
             <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'] ;?></button>
          </form>
          <?php  } ?>
          	<?php if(!empty($seemail)){ ?>
          <form method="post" action="checkemail.php">
            <div class="form-group">
              <div class="form-label-group">
              	<p> متابعة وأدخال رمز التحقق</p>
                <input type="hidden" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus" name="seemail" value = "<?php echo $seemail; ?>">
               <!--
                <label for="inputEmail"><?php echo $lang['Enter-email-address'];?></label> -->
              </div>
            </div>
             <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"> <?php echo $lang['send'];?></button>
          </form>
          <?php  } ?>
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
    <?php
    $username = "info.oneplusfree@gmail.com";
$password = "oauttkvnlcaxlset";
$sender_name = "منصة مكتبة موون";
$do = $_POST['seemail'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where email='$seemail' ")); 
$subject = " مرحبا بك " . $ro['name'] . " لقد أرسلنا لك رمز تأكيد حسابك على منصة موون";
$title = "مقال عن كيفية إستخدام الموقع";
$text = "مرحبا بك عزيزي المستخدم
نشكرك على استخدام موقعنا نتمنى ان يعجبك الموقع";
$res = send_email($username, $password, $sender_name,$seemail,$subject, $title, $text);


?>



