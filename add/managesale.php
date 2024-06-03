<?php require_once 'header.php' ?>
	<?php
	$role = $row['role'];
	$descount = $stm['descount'];
	if($role == 1 OR $role == 2 OR $role == 3){
		$typestatus = $_GET['status'];
		$idpay = $_GET['id'];
		$sale = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM sales where id='$idpay' ")); 
		$prcie =  $sale['price'];
		$idauthor = $sale['idauthor'];
		$idusersale = $sale['$iduser'];
		$ussale = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$idauthor' ")); 
		if(isset($idpay) and $sale['status'] == 0){
			$sql = "UPDATE sales set status='$typestatus'
where id='$idpay' ";
if ($conn->query($sql) === TRUE) {
	if($typestatus == 1 AND $sale['status'] == 0){
		$money = $prcie - $descount;
		$sql = "UPDATE users set money=money+$money
where id='$idauthor' ";
$s= "INSERT INTO profits(iduser,idsale,idusersale,amount) VALUES('$idauthor','$idpay','$idusersale','$descount') ";
if ($conn->query($sql) === TRUE and $conn->query($s) === TRUE) {
	}
		}
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
		
		
		}
	?>
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
<?php echo $lang['manage_purchasing'] ?> <span style="color: red"><b></b></span>
                <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped table-hover" id="dynamic-table">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['name_book'] ?></th>
                            <th><?php echo $lang['name_author'] ?></th>
                            <th><?php echo $lang['name_of_buyer'] ?></th>
                            <th><?php echo $lang['name_of_seller'] ?></th>
                            <th><?php echo $lang['price'] ?></th>
                             <th><?php echo $lang['payment_method'] ?></th>
                            <th><?php echo $lang['image_of_conversion_notice'] ?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <?php
                        
                        $sql = "SELECT * FROM sales ORDER BY id DESC limit 40";
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
                            <tr>
                                <td scope="row"><?= $num?></td>
                                <td><?php echo $row['namebook'];?></td>
                                <td><?= $row['nameauthor']?></td>
                                <td><?= $row['nameuser']?></td>
                                <?= 
                                $idauthor = $row['idauthor'];
                                $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$idauthor' ")); 
?>
                                <td><?= $ro['name']?></td>
                                <td><?= $row['price']?></td>
                                <td><?= $row['account']?></td>
                                <td><img style="width: 50px" src="../upload/images/saccharine/pay/<?php echo  $row['image']?>" alt=""></td>
                                
                                <td><?php if($row['status'] == 1){
echo  '<span class="badge badge-pill badge-success">'.$lang['Active'].'</span>'; }
elseif($row['status'] == 3){
echo  '<span class="badge badge-pill badge-danger">'.$lang['denied'].'</span>'; }
else{
echo '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>'; }?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                    	
                                        <a href="managesale.php?id=<?= $row['id']?>&status=0" class="btn btn-sm btn-success" ><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a  href="managesale.php?id=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                        
                                    <?php } ?>
                                    	
                                    
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?php echo $row['id'] ;?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a>
                                    <a href="updatepost.php?id=<?= $row['id']?>&updatepost" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i><?php echo $lang['freeing'] ?></a>
                                    <a href="managesale.php?id=<?= $row['id']?>&status=3" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i class="fa fa-trash-o"></i><?php echo $lang['denied'] ?></a>
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
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
$sql = "SELECT * FROM sales   ORDER BY id DESC limit 40";
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['name_book'] ;?>: <?= $row['namebook']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                        <tr>
                            <th><?php echo $lang['name_author'] ?></th>
                            <td><?= strtoupper($row['nameauthor'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php 
$book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='".$row['idbook']."';")); 
echo $lang['edition_language'] ?></th>
                            <td><?= $book['edition_language']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['version_book'] ?></th>
                            <td><?= $book['version']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['publisher'] ?></th>
                            <td><?= $book['publisher']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['ISBN'] ?></th>
                            <td><?= $book['isbn']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['book_format'] ?></th>
                            <td><?= $book['book_format']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['name_of_buyer'] ?></th>
                            <td><?= ucwords($row['nameuser'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['name_of_seller'] ?></th>
               <?php             $idauthor = $row['idauthor'];
                            $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$idauthor' ")); ?>
                            <td><?= $ro['name']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['price'] ?></th>
                            <td><?= $row['price']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['payment_method'] ?></th>
                            <td><?= $row['account']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['date'] ?></th>
                            <td><?= $row['date']?></td>
                        </tr>
                        <tr>
                            <td><?php echo $lang['image_of_conversion_notice'] ?></td>
                            <td class="text-center"><img width="200px" src="../upload/images/saccharine/pay/<?= $row['image']?>" alt=""></td>
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
