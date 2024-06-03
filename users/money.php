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
   	<style>
.k2-copy-button svg{margin-right: 10px;vertical-align: top;}  
.k2-copy-button{
  height: 45px; width: 155px; color: #fff; background: #265df2; outline: none; border: none; border-radius: 8px; font-size: 17px; font-weight: 400; margin: 8px 0; cursor: pointer; transition: all 0.4s ease;}
.k2-copy-button:hover{background: #2ECC71;}
@media (max-width: 48px) {#k2button{width: 100%;}}
</style>
    <div class="row">
        <div class="col-lg-12">
        	<section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['profit_through_the_participation_of_the_referral _link'] ?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
            	<div class="form-group row">
                            <div class="col-sm-3">
                            	<b><?php echo $lang['win_together'] . " " . $stm['url'];?></b>
                            <br>
                                <b><?php echo $lang['by_sharing_your_referral_link'] ;?></b>
                                <br>
                                <b><?php echo $lang['how_to_profit'] ;?></b>
                                <br>
                                <b><?php echo $lang['copy_your_referral_link'] ;?></b>
                                <br>
                                <b><?php echo $lang['share_your_referral_link_with'] ;?></b>
                                <br>
                                <b><?php echo $lang['through_the_referra_link_you_can_withdraw_profits_or_purchase_driven_membership_from_the_site_or_purchase_books'] ;?></b>
                            </div>
                            </div>
                <div class="form-group row">
                            <div class="col-sm-3">
                            
                            	<b><?php echo $lang['connector_your_referral'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                    <div style="background:#ffffff;">
           <button  id="myInput" class="form-control"><?php $site = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM site where id='1' "));  echo  $site['url'].'/'.'cash.php'.'?'.'id='.$row['id']; ?></button>
           </div>
               <button class="k2-copy-button" id="k2button"><svg aria-hidden="true" height="1em" preserveaspectratio="xMidYMid meet" role="img" viewbox="0 0 24 24" width="1em" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g fill="none"><path d="M13 6.75V2H8.75A2.25 2.25 0 0 0 6.5 4.25v13a2.25 2.25 0 0 0 2.25 2.25h9A2.25 2.25 0 0 0 20 17.25V9h-4.75A2.25 2.25 0 0 1 13 6.75z" fill="currentColor"><path d="M14.5 6.75V2.5l5 5h-4.25a.75.75 0 0 1-.75-.75z" fill="currentColor"><path d="M5.503 4.627A2.251 2.251 0 0 0 4 6.75v10.504a4.75 4.75 0 0 0 4.75 4.75h6.494c.98 0 1.813-.626 2.122-1.5H8.75a3.25 3.25 0 0 1-3.25-3.25l.003-12.627z" fill="currentColor"></path></path></path></g></svg><?php echo $lang['copy'] ;?></button>
 </div>
            
                </div>
            </div>
        </section>
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['deposit'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['buy_driven_membership_or_clouds'] ;?></b>
                <p><?php echo $lang['you_can_buy_driven_membership_hrough_your_profits'] ;?></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="cashmoney.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="pro">
 <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['skil'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="pay" id="skil" class="form-control">
                                <?php $sql = "SELECT * FROM plan ORDER BY id DESC";
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
                                    <?php if($row['time'] == 1){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?><?php echo $lang['day'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                                                   
                                	<?php if($row['time'] == 7){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?> <?php echo $lang['week'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                	<?php if($row['time'] == 30){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?> <?php echo $lang['month'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                	<?php if($row['time'] == 360){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?> <?php echo $lang['year'] ." ". $row['amount'];?></option>
                                <?php    } ?>
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
   <button type="submit" class="btn btn-danger btn-block" name="reg_user"><?php echo $lang['send'] ;?></button>
   <br>
   <div class="form-group row">
                            <div class="col-sm-3">
                            	<h6><?php echo $lang['pull_your_profits'] ;?></h6>
                            <br>                          	                               <b><?php echo $lang['you_can_pull_your_profits'] ?></b>
                            <br>
                                <b><?php echo $lang['where_the_minimum_withdrawal_is'] . " " .$stm['mincl'] ;?></b>
                                <br>
                                <b><?php echo $lang['the_maximum_pull_is'] . " " .$stm['maxcl'] ;?></b>
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
                            <br>
                                <b></b>
                            </div>
                               
                            <div class="col-sm-9">
                                <input type="text" name="money" placehoder="<?php echo $lang['amount'] ;?>" class="form-control">
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['account_number'] ;?></b>
                            </div>
                            <div class="col-sm-9">                          
                                <input type="text" name="account_number" class="form-control" placeholder="<?php echo $lang['account_number'] ;?>">                                
                            </div>
                        </div>
                        
                    
                        <fieldset class="form-group">
                            
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="sado"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>
       
            <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['profit_management'] ?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['amount'] ?></th>
                            <th><?php echo $lang['date'] ?></th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM  cashgo where iduser='$iduser' ORDER BY id DESC";
                        if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                              
                                <th scope="row">
                                    <?php echo $row['money'] ;?>
                                </th>
                                <th scope="row">
                                	<?php echo $row['date'] ;?>
                               
                                </th>
                                

                            </tr>
             <?php      }
  mysqli_free_result($result);
               } else{
                echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        </div>
    </div>
    <script>
  function copyFunction() {
  const copyText = document.getElementById("myInput").textContent;
  const textArea = document.createElement('textarea');
  textArea.textContent = copyText;
  document.body.append(textArea);
  textArea.select();
  document.execCommand("copy");
  k2button.innerText = "<?php echo $lang['text_copied'] ;?>";
    textArea.remove();
}
document.getElementById('k2button').addEventListener('click', copyFunction);
  </script>   
 <?php
include"footer.php";
?>
    
<?php require_once 'footer.php' ?>