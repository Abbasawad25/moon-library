<?php require_once 'header.php'

?>
	<?php
	$iduser = $row['id'];
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
	$user_check_query = "SELECT * FROM section WHERE id='$idcate' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['iduser'] == $iduser) {
 
//delet category
if(isset($_GET['delet'])){   
   $q="DELETE FROM section where id=".$_GET['delet'];
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
		$sql = "UPDATE  section set status='$status'
where id='$idstatus' ";
if ($conn->query($sql) === TRUE) { ?>
<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
   
<?php } else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }
		}
		
	if(isset($update)){
		$name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
     $section = $_POST['section'];
                       if (empty($section)) { array_push($errors, "section is required"); }
                       $section = filter_var($section,FILTER_SANITIZE_NUMBER_INT);
                       $idsection = $_POST['id'];
                      $sql = "UPDATE section set name='$name',iduser='$iduser'
where id='$idsection' ";
if ($conn->query($sql) === TRUE) {
?>
   <script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
<?php } else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
<?php }
		
		}
		}else{
			
			}
		}else{
			
			}
	?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['sections'] ;?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['name'] ?> <?php echo $lang['section'] ;?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            
                            
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody> 

                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM section  where iduser='$iduser' ORDER BY id DESC limit 10000";
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
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">'. $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                                
                                
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="managesection.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="managesection.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i><?php echo $lang['freeing'] ?></a>
                                    <a href="managesection.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
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
<?php $sql = "SELECT * FROM section where iduser='$iduser' ORDER BY id DESC limit 10000";
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['update'] ?> <?php echo $lang['section'] ;?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['name'] ?></b></label>
                            <input  type="text" class="form-control" value="<?= $row['name']?>" name="name">
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
