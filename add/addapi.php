<?php require_once 'header.php' ?>
<?php

$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
?>
	<?php
	
$iduser = $row['id'];
$username = $row['username'];
$a = $_POST['reg_user'];
if ($role == 1 OR $role == 2) {
   if(isset($a)) {
                   
                 
                   $name = $_POST['name_page'];
                   if (empty($name)) { array_push($errors, "name english is required"); }
                   $name = filter_var($name,FILTER_SANITIZE_STRING);
                   
                   $keywords = $_POST['keywords'];
                      $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);             
				$sql = "INSERT INTO api_key(name,api_key,iduser) VALUES('$name','$keywords','$iduser')";
if ($conn->query($sql) === TRUE) {
echo    $lang['it_was_successfully'] . 
$last_id = $conn->name;

} else {
	echo $lang['This-problem-has-happened-please-retry'] ;
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			                       
   }
   }else{
   	}
   
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_page'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['add_page'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_page'] ;?>" name="name_page" value="">
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="keywords" placeholder="keywords" name="keywords" value="">
                            </div>
                        </div>
                           

                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>