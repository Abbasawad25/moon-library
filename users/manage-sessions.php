<?php require_once 'header.php'

?>
	<?php
	$iduser = $row['id'];
	$rol = $_POST['role'];
if(isset($rol)){ 
	$sql = "UPDATE infousers set role='1' where id='$rol' ";
	if(mysqli_query($conn,$sql)){
		?>
			<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
			<?php
		}
		else{
			?>
				<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
				<?php
			}
}else{
}  

          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          	$site = $_POST['site'];
          
          $id = $_POST['id'];
          $sq = "UPDATE infouser set  where id='$id' ";
        if ($conn->query($sq) === TRUE) {
  echo "New record created successfully";
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}
          }
	?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['manage_sessions'] ;?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['name_of_the_device'] ?></th>
                            <th><?php echo $lang['name_of_browser'] ?></th>
                            <th><?php echo $lang['date'] ?></th>
                            
                            
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody> 

                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM infousers  where username='$iduser' ORDER BY id DESC limit 40";
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
                                <td scope="row"><?= strtoupper($row['os'])?></td>
                                <td scope="row"><?= strtoupper($row['browser'])?></td>
                                <td><?php echo $row['date'] ;?></td>
                                
                                
                                <td class="text-center">
                                    
                                    	<form action="" method="POST">
                                        <button type="submit" name="role" value="<?php echo $row['id'] ;?>" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['logout'] ?></button>
                                        </form>
                                    
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?php echo $row['id'] ;?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a> 
                                    
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
$sql = "SELECT * FROM infousers   where username='$iduser' ORDER BY id DESC limit 40";
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
<div class="modal fade " id="id<?php echo $row['id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" dir="auto">
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['name_of_the_device'] ;?>: <?= $row['os']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                    	<tr>
                            <th><?php echo $lang['name_of_the_device'] ?></th>
                            <td><?= $row['os']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['name_of_browser'] ?></th>
                            <td><?= strtoupper($row['browser'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php
echo $lang['type_of_device'] ?></th>
                            <td><?= $row['device']?></td>
                        </tr>
                        
                        <tr>
                            <th><?php echo $lang['ip_address'] ?></th>
                            <td><?= $row['ip']?></td>
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
<?php require_once 'footer.php' ?>
