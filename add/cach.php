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

 //update status
	if($idstatus){
		$status = $_GET['status'];
		$sql = "UPDATE  cach set status='$status'
where id='$idstatus' ";
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
		
	if(isset($update)){
		$name = $_POST['name'];
                      $name = filter_var($name,FILTER_SANITIZE_STRING);
                      if (empty($name)) { array_push($errors, "name is required"); }
     $section = $_POST['section'];
                       if (empty($section)) { array_push($errors, "section is required"); }
                       $section = filter_var($section,FILTER_SANITIZE_NUMBER_INT);
                       $idcategory = $_POST['id'];
                      $sql = "UPDATE categories set name='$name',iduser='$iduser',section_id='$section'
where id='$idcategory' ";
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
			<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
			<?php 
echo "bacuse admin just" ;
}
	?>
		<?php
		$reg_sea = $_POST['reg_sea'];
		if(isset($reg_sea) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$sea_status = $_POST['sea_status'];
		$sea_username = $_POST['sea_username'];
		if (empty($sea_status)) { array_push($errors, $lang['sea_status']); }
   $sea_status = filter_var($sea_status,FILTER_SANITIZE_NUMBER_INT);
   if(filter_var($sea_status,FILTER_VALIDATE_INT) == false){
   	array_push($errors, $lang['status']);
   	}
   }else{
   	}
		?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['Manage-Categories'] ;?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
             <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['status'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="sea_status" id="" class="form-control">
                                    <option value="1"><?php echo $lang['Active'] ;?></option>
                                    </option>
                                    <option value="0"><?php echo $lang['Inactive'] ;?></option>
                                    </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['username'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="sea_username" value="">
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-warning btn-block" name="reg_sea"  class="text-white"><?php echo $lang['search'] ;?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['username'] ?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['money'] ?></th>
                            
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody> 

                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM cach where status='$sea_status' or username LIKE '%$sea_username%' ORDER BY id DESC ";
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
                                <td scope="row"><?= strtoupper($row['username'])?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">'.$lang['Active'].'</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                                <td><?php echo $row['money'] ;?></td>
                                
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="cach.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="cach.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i><?php echo $lang['freeing'] ?></a>
                                    <a href="managecach.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
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
<?php
$sql = "SELECT * FROM cach   ORDER BY id DESC";
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
    <!-- VIEW POST Modal -->
<div class="modal fade " id="id<?php echo $row['id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['username'] ;?>: <?= $row['username']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                    	<tr>
                            <th><?php echo $lang['username'] ?></th>
                            <td><?= $row['username']?></td>
                        </tr>
                    	<tr>
                            <th><?php echo $lang['payment_method'] ?></th>
                            <td><?= $row['type']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['account_number'] ?></th>
                            <td><?= strtoupper($row['account'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php
echo $lang['money'] ?></th>
                            <td><?= $row['money']?></td>
                        </tr>
                        
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">' . $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">' .$lang['Inactive'].'</span>' ?></td>
                        </tr>
                       
                        
                            
                        
                        <tr>
                            <th><?php echo $lang['date'] ?></th>
                            <td><?= $row['date']?></td>
                        </tr>
                        
                        
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['Close'] ;?></button>
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
