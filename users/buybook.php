<?php require_once 'header.php' ?>

    
    
<?php
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if ($_SERVER['REQUEST_METHOD'] !== "POST") {
	echo "good";
	header("Location: ../404.php");
	exit;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
session_start();
	$idpost = $_POST['id'];
	 $idk = $_POST['idk'];
     
?>
	<?php
	$max_image = $stm['max_image'];
	$book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idpost' ")); 
$iduser = $row['id'];
$a = $_POST['reg_user'];
   if(isset($a)) {
   	$book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idk' ")); 
                   $idbook = $book['id'];
                   $idauthor = $book['iduser'];
                      $price = $book['price'];
                      $namebook = $book['name'];
                      $nameuser = $row['name'];
                      $authorbook = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='$idauthor' "));
                 $nameauthor = $book['author'];
                   $type = $_POST['type'];
                   $portal_payment = $_POST['portal_payment'];
                   $buy = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM portal_payment where id='$type' ")); 
                   $namepay = $buy['name'];
                   
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
				$fileDestination = '../upload/images/saccharine/pay/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				
				$sql = "INSERT INTO sales(iduser,idbook,idauthor,image,price,status,typepay,account,namebook,nameuser,nameauthor)
VALUES ('$iduser','$idbook', '$idauthor','$imgName','$price','0','$type','$namepay','$namebook','$nameuser','$nameauthor')";
if ($conn->query($sql) === TRUE) { ?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
$last_id = $conn->name;
   
} else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
  echo "Error: " . $sql . "<br>" . $conn->error;
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
                    <h3 style="display: inline-block;margin-right: 25px;" dir="auto"><?php echo $lang['buy_book'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['deposit'] ;?></b>
                <p><?php echo $lang['you_can_invoke_money_in_the_wallet'] ;?></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="buybook.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_book'] ?></b></label>
                            <div class="col-sm-9">
                            	<input type="hidden" value="<?php echo $book['id'] ;?>" name="idk">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_book'] ?>" name="title" value="<?php echo $book['name'];?>" readonly dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label" dir="auto"><b dir="auto"><?php echo $lang['name_author'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['name_author'] ?>" name="title" value="<?php echo $book['author'];?>" readonly dir="auto">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['payment_method'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="type" id="skil" class="form-control">
                                <?php	$sql = "SELECT * FROM portal_payment";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
  	?>
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
                                    </option>
                                    <?php
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
                                <b dir="auto"><?php echo $lang['price'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="money" class="form-control" value="<?php echo $book['price'] ;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                            	<b><?php echo $lang['you_can_pay_through_the_following_methods'] ;?></b>
                            <br>
                                
                            </div>
                               
                            
                        </div>
                     <?php   $sq = "SELECT * FROM portal_payment ";
$resul = $conn->query($sq);
$siteData = mysqli_fetch_assoc($resul);

if ($resul->num_rows > 0) {
 
  while($row = $resul->fetch_assoc()) {
  	
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
    <?php 
    }else{
    	echo 509;
    	}; ?>
<?php require_once 'footer.php' ?>