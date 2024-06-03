<?php require_once 'header.php' ?>

    
    
<?php
   include('../server.php');

                   $name = $_POST['name'];
                      $title = $_POST['title'];
                   
                   $content = $_POST['content'];
                   $date = date('Y-m-d h:i:s');
                   
   echo " <p>wow ".$title."</p>" . $title . $name.$content.$date; ?>
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
                      <img src="https://wallpapers.com/images/featured-full/4k-oaax18kaapkokaro.jpg" width="140" aria-hidden="true" style="margin-bottom:16px" alt="ون بلس 24" class="CToWUd" data-bit="iit">
                      <div style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom-width:thin;border-bottom-style:solid;line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word;border-bottom-color:rgb(218,220,224);color:rgba(0,0,0,0.87)">
                        <div style="font-size:24px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">'.$_POST['title'].'</div>
                        <p><p>
                        <table align="center" style="margin-top:8px;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                          <tbody style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                            <tr style="line-height:normal;font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                              <td style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif">
                                <a style="font-family:&quot;Google Sans&quot;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;color:rgba(0,0,0,0.87)">info.oneplusfree@gmail.com</a>
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
                         <p>جميع الحقوق المحفوظة بواسطة ون بلس 2023 ©</p>
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
      $site_name = "one plus";
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
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add-new-post'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="sendemail" method="POST" enctype="multipart/form-data">
                      
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['title-p'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['title-post'] ?>" name="title" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" class="summernote">
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b>name</b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white">send</button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>