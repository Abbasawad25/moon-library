<?php require_once 'header.php' ?>
	<?php
	$iduser = $row['id'];
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
                            <th><?php echo $lang['price'] ?></th>
                             
                            
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <?php
                        
                        $sql = "SELECT * FROM sales where iduser='$iduser' ORDER BY id DESC limit 40";
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
                                
                             
                                
                                <td><?= $row['price']?></td>
                                
                                
                                
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">' . $lang['Active'] . '</span>  ' : '<span class="badge badge-pill badge-danger">' . $lang['Inactive'] . '</span>' ?>
   <?php
   $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='".$row['idbook']."';")); 
if($row['status'] == 1) { ?>
	
	 <a style="margin-top: 25px;" href="../upload/book/<?php echo $book['location']?>" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i ></i><?php echo $lang['download'] ?></a>
	<?php }?>
</td>

                                <td class="text-center">
                                 
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
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
$sql = "SELECT * FROM sales   where iduser='$iduser' ORDER BY id DESC limit 40";
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
                            <th><?php echo $lang['name_book'] ?></th>
                            <td><?= $row['namebook']?></td>
                        </tr>
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
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">' . $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">' .$lang['Inactive'].'</span>' ?></td>
                        </tr>
                        <tr>
                            
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
                            <th><?php echo $lang['download'] ?></th>
                            <td><?php
   $book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='".$row['idbook']."';")); 
if($row['status'] == 1) { ?>
	
	 <a style="margin-top: 25px;" href="../upload/book/<?php echo $book['location']?>" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i ></i><?php echo $lang['download'] ?></a>
	<?php }?></td>
                        </tr>
                        <tr>
                            <td><?php echo $lang['image_of_conversion_notice'] ?></td>
                            <td class="text-center"><img width="200px" src="../upload/images/saccharine/pay/<?= $row['image']?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلق</button>
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
