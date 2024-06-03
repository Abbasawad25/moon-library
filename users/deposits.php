<?php require_once 'header.php' ?>

    
    
<?php
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if (isset($_POST['reg_user'])) {
}
?>
	<?php
$max_image = $stm['max_image'];
$iduser = $row['id'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $username = $row['username'];
                      $email = $row['email'];
                      $money = $_POST['money'];
                      if (empty($money)) { array_push($errors, "money is required"); }
 $money = filter_var($money,FILTER_SANITIZE_NUMBER_INT);
$money = str_replace(array("+",'-'),"",$money) ;
 if (filter_var($money,FILTER_VALIDATE_INT) == false) { array_push($errors, "404"); }                  
                   $day = $_POST['pay'];
                   $type = $_POST['type'];
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
                   //upimag
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
				$fileDestination = '../upload/images/saccharine/des/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				
				$sql = "INSERT INTO deposits(username,email,type,image,site,money,iduser,ip,os)
VALUES ('$username','$email', '$type','$imgName','no','$money','$iduser','$ip','$os')";
if ($conn->query($sql) === TRUE) { ?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
   
} else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
  <?php 
}
			} else {
				echo $lang['the_image_size_is _too_large'];
			}
		}else{
			echo $lang['line_to_raise_the_image'];
		}
	}else {
			echo $lang['image_type_is_unknown'];
	}
	
                   
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['deposit'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['deposit'] ;?></b>
                <p><?php echo $lang['you_can_invoke_money_in_the_wallet'] ;?></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="deposits.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['username'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['username'] ?>" name="title" value="<?php echo $row['username'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['email'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['email'] ?>" name="title" value="<?php echo $row['email'];?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['payment_method'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="type" id="skil" class="form-control">
                                <?php $sql = "SELECT * FROM portal_payment ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
                                    <option value="<?php echo $row['name'] ;?>"><?php echo $row['name'] ;?></option>
                                    </option>
                                  <?php
    }
  }
}
 else {
  echo "0 results";
 }              

?>
                                                                                                           </select>
                                    </div>
                        </div>
   <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['amount'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="money" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                            	<b><?php echo $lang['you_can_pay_through_the_following_methods'] ;?></b>
                            <br>
                                <b></b>
                            </div>
                               
                            <div class="col-sm-9">
                                <input type="hidden" name="bankk" class="form-control" value="رقم الهاتف 0998812457" readonly>
                            </div>
                        </div>
                     <?php   $sql = "SELECT * FROM portal_payment ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $row['name'] ;?></b>
                            </div>
                            <div class="col-sm-9">                          
                                <input type="email" name="paypal" class="form-control" value="<?php echo $row['account_number'] ;?>" readonly>                                
                            </div>
                        </div>
                        <?php
    }                    
  }
}
 else {
  echo "0 results";
 }              

?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image_of_conversion_notice'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    
<?php require_once 'footer.php' ?>