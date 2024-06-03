<?php require_once 'header.php' ?>

    
    
<?php

$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if (isset($_POST['reg_user'])) {
}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['payusers'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="pay.php" method="POST" enctype="multipart/form-data">
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
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['payment_method'] ;?></label>
                            <div class="col-sm-9">
                            	
                                <select name="portal_payment" id="skil" class="form-control">
                              <?php  	$sql = "SELECT * FROM  portal_payment ORDER BY id DESC";
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
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['skil'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="pay" id="skil" class="form-control">
                                <?php	$sql = "SELECT * FROM plan ORDER BY id DESC";
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
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $lang['day'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                                                   
                                	<?php if($row['time'] == 7){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $lang['week'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                	<?php if($row['time'] == 30){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $lang['month'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                	<?php if($row['time'] == 360){ ?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $lang['year'] ." ". $row['amount'];?></option>
                                <?php    } ?>
                                
  <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>                                                                                     </select>
                                    </div>
                        </div>
                                 	
                        <div class="form-group row">
                            <div class="col-sm-3">
                            	<b><?php echo $lang['you_can_pay_through_the_following_methods'] ;?></b>
                            <br>
                                
                            </div>
                            <div class="col-sm-9">
                                <input type="hidden" name="<?php echo $row['name'] ;?>" class="form-control" value="<?php echo $row['name'] ;?>" readonly>
                            </div>
                        </div>
                   <?php  $sql = "SELECT * FROM portal_payment ORDER BY id DESC";
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
                            	
                            	
                             
                                <?php if($row['typeid'] == 2){
                            	?>
                                <input type="email" name="paypal" class="form-control" value="<?php echo $row['email'] ;?>" readonly>
                                <?php	} ?>
                                	<?php if($row['typeid'] == 1){
                            	?>
                                <input type="number" name="<?php echo $row['name'] ;?>" class="form-control" value="<?php echo $row['number'] ;?>" readonly>
                                <?php	} ?>
                                
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