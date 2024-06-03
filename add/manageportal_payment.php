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
	
 
if ($role == 1 OR $role == 2 OR $role == 3) {
 
//delet category
if(isset($iddelet)){   
   $q="DELETE FROM portal_payment where id='$iddelet' ";
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
		$sql = "UPDATE  portal_payment set status='$status'
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
		$name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
     $name_en = $_POST['name_en'];
                       if (empty($name_en)) { array_push($errors, "name  is required"); }
                       $name_en = filter_var($name_en,FILTER_SANITIZE_NUMBER_INT);
                       $account_number = $_POST['account_number'];
                       if (empty($account_number)) { array_push($errors, "name  is required"); }
                       $account_number = filter_var($account_number,FILTER_SANITIZE_STRING);
                       $subject = $_POST['content'];
                       
                       $idpa = $_POST['id'];
                      $sql = "UPDATE portal_payment set name='$name',name_en='$name_en',account_number='$account_number',subject='$subject'
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
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['manage_portal_payment'] ;?></h3>
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
                            <th><?php echo $lang['account_number'] ?></th>
                            
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody> 

                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM portal_payment ORDER BY id DESC";
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
echo $row['account_number']?></td>
                                
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="manageportal_payment.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="manageportal_payment.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i><?php echo $lang['freeing'] ?></a>
                                    <a href="manageportal_payment.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger"onclick='return confirm("<?php echo $lang['are_you_sure'] ;?>")'><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
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
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['update-portal_payment'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['type_portal_payment'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="typeid" id="" class="form-control">
                                    <option value="1" <?php if($row['typeid'] == 1){ echo 'selected'; }?>><?php echo $lang['bank_transfer'] ;?></option>
                                    </option>
                                    <option value="2" <?php if($row['typeid'] == 2){ echo 'selected'; }?>><?php echo $lang['electronic_payment_portal'] ;?></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['type_portal_payment'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="type" id="" class="form-control">
                                    <option value="1" <?php if($row['type'] == 1){ echo 'selected'; }?>><?php echo $lang['username'] ;?></option>
                                    </option>
                                    <option value="2" <?php if($row['type'] == 2){ echo 'selected'; }?>><?php echo $lang['email'] ;?></option>
                                    <option value="3" <?php if($row['type'] == 3){ echo 'selected'; }?>><?php echo $lang['the_number'] ;?></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="name" value="<?php echo $row['name'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_en'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="name_en" value="<?php echo $row['name_en'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" class="summernote">
                                	<?php echo $row['subject'] ;?>
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['account_number'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="account_number" class="form-control" value="<?php echo $row['account_number'] ;?>">
                            </div>
                        </div>
             
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
