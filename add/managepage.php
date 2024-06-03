<?php require_once 'header.php'

?>
	<?php
	$iduser = $row['id'];
	$role = $row['role'];
	$update = $_POST['update-cat'];
	$idstatus = $_GET['ids'];
	if(isset($idstatus)){
		$idcate = $idstatus;
		}
		$iddelet = $_GET['delet'];
	if(isset($iddelet)){
		$idcate = $iddelet;
		}
		
		if(isset($_POST['id'])){
			$idcate = $_POST['id'];
			}
	
 
if ($role == 1 OR $role == 2) {
 
//delet category
if(isset($iddelet)){   
   $q="DELETE FROM page where id='$iddelet' ";
          if(mysqli_query($conn,$q)){      ?>
						  <script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
           <?php }             
          else{ ?>
              <script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
         <?php }
          }
 //update status
	if($idstatus){
		$status = $_GET['status'];
		$sql = "UPDATE  page set status='$status',iduser='$iduser'
where id='$idstatus' ";
if ($conn->query($sql) === TRUE) {
	?>
<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php
$last_id = $conn->name;
   
} else {
 ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
 <?php echo "Error: " . $sql . "<br>" . $conn->error;
}
		}
		
	if(isset($update)){
		$name = $_POST['name_page'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
     $title_page = $_POST['title_page'];
                       if (empty($title_page)) { array_push($errors, "name  is required"); }
                       $title_page = filter_var($title_page,FILTER_SANITIZE_STRING);
                       $description = $_POST['description'];
                       if (empty($description)) { array_push($errors, "description  is required"); }
                       $description = filter_var($description,FILTER_SANITIZE_STRING);
                       $keywords = $_POST['keywords'];
                       if (empty($keywords)) { array_push($errors, "keywords  is required"); }
                       $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);
                
                       
                       $subject = $_POST['subject'];
                       
                       $idpa = $_POST['id'];
                       $pagd = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM page where id='$idpa' ")); 
                       if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."-" . $namesite ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 5000000) {
				$fileDestination = '../upload/images/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
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
				else{
   	$imgName = $pagd['image'];
   	}
                      $sql = "UPDATE page set name='$name',title='$title_page',description='$description',keywords='$keywords',subject='$subject',image='$imgName',iduser='$iduser'
where id='$idpa' ";
if ($conn->query($sql) === TRUE) {
?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
$last_id = $conn->name;
   
} else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		
		}
		
		}else{ ?>
			
		
				<?php
			}
	?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['manage_page'] ;?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['name'] ?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['title-p'] ?></th>
                            
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody> 

                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM page ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $i = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= strtoupper($row['name'])?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">'.$lang['Active'].'</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                                <td><?php
echo $row['title']?></td>
                                
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="managepage.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="managepage.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i><?php echo $lang['freeing'] ?></a>
                                    <a href="managepage.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger"onclick='return confirm("<?php echo $lang['are_you_sure'] ;?>")'><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
                                </td>
                            </tr>
                          <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $sql = "SELECT * FROM page ORDER BY id DESC";
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
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['update-page'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                   <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_page'] ;?>" name="name_page" value="<?php echo $row['name'] ;?>">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['title_page'] ;?>" name="title_page" value="<?php echo $row['title'] ;?>">
                            </div>
                        </div>
                       
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['description_page'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="description" placeholder="<?php echo $lang['description_page'] ;?>" name="description" value="<?php echo $row['description'];?>">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="keywords" placeholder="keywords" name="keywords" value="<?php echo $row['keywords'];?>">
                            </div>
                        </div>
                           
<div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="subject" id="" cols="30" rows="10" class="summernote" dir="auto">
                               <?php echo $row['subject'] ;?>
                                </textarea>
                            </div>
                        </div>
                        
                                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        
                      
                        <fieldset class="form-group">
                            <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../upload/images/page/<?php echo $row['image']?>" alt="" class="img-fluid">
        </div>
    </div>
                        </fieldset>
                        
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="<?php echo $lang['update'] ?>" class="btn btn-block btn-success" name="update-cat">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['Close'] ?></button>
                </div>
            </div>
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

<?php require_once 'footer.php'?>
