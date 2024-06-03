<?php require_once 'header.php' ?>

    
    
<?php
$status = $stm['auto_post'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 


if (isset($_POST['reg_user'])) {
}
?>
	<?php

$iduser = $row['id'];
$a = $_POST['reg_user'];
   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST") {
                   
                      $name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
                      
				$sql = "INSERT INTO section(name,iduser,status)
VALUES ('$name','$iduser','$status')";
if ($conn->query($sql) === TRUE) { ?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
} else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }
			
                   
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_section'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['add_section'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="section.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_section'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_section'] ?>" name="name">
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