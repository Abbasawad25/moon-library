<?php require_once 'header.php' ?>
<?php
  $iduser = $row['id'];
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
	$user_check_query = "SELECT * FROM book WHERE id='$idcate' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['iduser'] == $iduser) {
 
//delet category
if(isset($_GET['delet'])){   
   $q="DELETE FROM book where id=".$_GET['delet'];
          if(mysqli_query($conn,$q)){      ?>
						  <script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
         <?php   }             
          else{
              ?>
              	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
       <?php   }
          }
 //update status
	if($idstatus){
		$status = $_GET['status'];
		$sql = "UPDATE  book set status='$status'
where id='$idstatus' ";
if ($conn->query($sql) === TRUE) {
?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php   
} else { ?>
	<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
	<?php
	
}
		}
		
		}
		}else{
			
			}
	?>
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
<?php echo $lang['All-posts'] ?> <span style="color: red"><b></b></span>
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
                            <th><?php echo $lang['title-p'] ?></th>
                            <th><?php echo $lang['section'] ?></th>
                            <th><?php echo $lang['Categorie'] ?></th>
                            <th><?php echo $lang['image'] ?></th>
                            
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        
                  <?php      $sql = "SELECT * FROM book  where iduser='$iduser' ORDER BY id DESC limit 4000";
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
                                <td scope="row"><?php echo ++$i?></td>
                                <td><?php echo substr($row['name'],0,40)?></td>
                              <?php  $idc = $row['categories'];
                              $ids = $row['section'];
                              $section = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM section where id='$ids' ")); 
                                $categories = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idc' ")); 
?>
                                <td><?php echo $section['name']?></td>
                                <td><?php echo $categories['name']?></td>
                                <td><img style="width: 50px" src="../upload/images/book/<?php echo $row['image']?>" alt=""></td>
                                
                                <td><?php echo $row['status'] == 1 ? '<span class="badge badge-pill badge-success">'. $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="managebook.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="managebook.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <?php
                                    if($row['type'] == 1) { ?>
                                    	
                                   
                                        <span class="btn btn-sm btn-dark"><i class="fa  fa-hand-o-down"></i><?php echo $lang['special'] ?></span>
                                    <?php  }else{ ?>
                                        <a href="#" class="btn btn-sm btn-secondary"><i class="fa  fa-hand-o-up"></i><?php echo $lang['normal'] ?></a>
                                    <?php } ?>
                                    	<form action="editbook.php" method="POST">
                                    	<input type="hidden" name="id" value="<?php echo $row['id'] ;?>"> 
                                    	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-pencil-square-o"></i><?php echo $lang['edit'] ?></button>
                                    	</form>
                                   
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?php echo $row['id'] ;?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a> 
                                    <a href="../single.php?id=<?php echo $row['id'] ;?>" class="btn btn-sm btn-primary" name="id" value="2" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-eye"></i><?php echo $lang['view'] ?></a>                                                                                                                    
                                    <a href="managebook.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
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
$sql = "SELECT * FROM book   where iduser='$iduser' ORDER BY id DESC limit 4000";
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['name_book'] ;?>: <?= $row['name']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                    	<tr>
                            <th><?php echo $lang['name_book'] ?></th>
                            <td><?= $row['name']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['name_author'] ?></th>
                            <td><?= strtoupper($row['author'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php
echo $lang['edition_language'] ?></th>
                            <td><?= $row['edition_language']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['version_book'] ?></th>
                            <td><?= $row['version']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['publisher'] ?></th>
                            <td><?= $row['publisher']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['ISBN'] ?></th>
                            <td><?= $row['isbn']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['book_format'] ?></th>
                            <td><?= $row['book_format']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">' . $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">' .$lang['Inactive'].'</span>' ?></td>
                        </tr>
                       
                        
                            
                        <tr>
                            <th><?php echo $lang['type_book'] ?></th>
                            <td><?php if($row['type_book'] == 1){
                            	echo $lang['pay'];
}else{
	echo $lang['free'];
}?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['type_post'] ?></th>
                         
                            <td><?php if($row['type'] == 1){
echo $lang['special'];
}
else{
	echo $lang['normal'];
}?></td>
                        </tr>
                   
                        <tr>
                            <th><?php echo $lang['price'] ?></th>
                            <td><?= $row['price']?></td>
                        </tr>
                        
                        <tr>
                            <th><?php echo $lang['date_create_book'] ?></th>
                            <td><?= $row['date_create']?></td>
                        </tr>
                        <?php  $idc = $row['categories'];
                              $ids = $row['section'];
                              $section = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM section where id='$ids' ")); 
                                $categories = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idc' ")); 
?>
	<tr>
                            <th><?php echo $lang['section'] ?></th>
                            <td><?= $section['name']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Categorie'] ?></th>
                            <td><?= $categories['name']?></td>
                        </tr>
                        
                            <th><?php echo $lang['download'] ?></th>
                            <td>
	
	 <a style="margin-top: 25px;" href="../upload/book/<?php echo $row['location']?>" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i ></i><?php echo $lang['download'] ?></a>
	</td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['date'] ?></th>
                            <td><?= $row['date']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['visit'] ?></th>
                            <td><?= $row['view']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['downloads'] ?></th>
                            <td><?= $row['download']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['title_short'] ?></th>
                            <td><?= $row['title']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['summary'] ?></th>
                            <td><?= $row['summary']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Content'] ?></th>
                            <td><?= $row['subject']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Tagged'] ?></th>
                            <td><?= $row['tag']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['tag'] ?></th>
                            <td><?= $row['keywords']?></td>
                        </tr>
                        
                        <tr>
                            <th><?php echo $lang['image'] ?></th>
                            <td><img src="../upload/images/book/<?= $row['image']?>" style="width:350px;height:150px;"></td>
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
