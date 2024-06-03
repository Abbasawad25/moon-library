<?php require_once 'header.php' ?>

    
    
<?php
$status = $stm['auto_post'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 



?>
	<?php
$iduser = $row['id'];
$a = $_POST['reg_user'];
   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST") {
                   
                      $name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
     $section = $_POST['section'];
                       if (empty($section)) { array_push($errors, "section is required"); }
                       $section = filter_var($section,FILTER_SANITIZE_NUMBER_INT);
                       
 
$sql = "INSERT INTO categories(name,name_en,iduser,status,section_id)
VALUES ('$name','null','$iduser','$status','$section')";
if ($conn->query($sql) === TRUE) { ?>
   <script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php } else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }
                   
   }
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_categorie'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['add_categorie'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="category.php" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['Name-of-category'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['Name-of-category'] ?>" name="name">
                            </div>
                        </div>
                                     
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['add_section'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="section" id="se" class="form-control">
                                <?php	$sql = "SELECT * FROM section  where status='1' ORDER BY id DESC";
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
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
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