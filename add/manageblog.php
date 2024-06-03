<?php require_once 'header.php' ?>
<?php
  
	$role = $row['role'];
	$idstatus = $_GET['ids'];
	if(isset($idstatus)){
		$idcate = $idstatus;
		}
		$iddelet = $_GET['delet'];
	if(isset($iddelet)){
		$idcate = $iddelet;
		}
		$adspro = $_GET['adspro'];
	if(isset($adspro)){
		$idcate = $adspro;
		}
		
		if(isset($_POST['id'])){
			$idcate = $_POST['id'];
			}
  if($role == 1 OR $role == 2){
  	if(isset($iddelet)){   
   $q="DELETE FROM blog where id='$iddelet' ";
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
		$sql = "UPDATE  blog set status='$status'
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
		//ads pro posts
		if($adspro){
		$type = $_GET['type'];
		$sql = "UPDATE  blog set type='$type'
where id='$adspro' ";
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
		
  	}else{
  	?>
  	
  <?php	}
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
                            <th><?php echo $lang['admin'] ?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        
                        <?php
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	elseif(isset($_GET['tag'])){
    $tag = $_GET['tag'];
    $search_keyword = $tag;
}
     define("ROW_PER_PAGE",2000);
require_once('../db.php');
	$sql =' SELECT * FROM blog WHERE id LIKE :keyword OR username LIKE :keyword  ORDER BY id DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_GET["page"])) {
		$page = $_GET["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .='<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '"</a>'. $i . '</li>';
				} else {
					$per_page_html .= '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '"</a>' .$lang['The-next']. '</li>';
				}
			}
		}
		
	}
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
                        
                            <tr>
                                <td scope="row"><?php echo ++$i?></td>
                                <td><?php echo substr($row['title'],0,40)?></td>
                              <?php  $idc = $row['cat_id'];
                              $ids = $row['section'];
                              $section = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM section where id='$ids' ")); 
                                $categories = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idc' ")); 
?>
                                <td><?php echo $section['name']?></td>
                                <td><?php echo $categories['name']?></td>
                                <td><img style="width: 50px" src="../upload/images/blog/<?php echo $row['image']?>" alt=""></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['status'] == 1 ? '<span class="badge badge-pill badge-success">'.$lang['Active'].'</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="manageblog.php?ids=<?= $row['id']?>&status=0" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="manageblog.php?ids=<?= $row['id']?>&status=1" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <?php
                                    if($row['type'] == 1) { ?>
                                    
                                    	
                                        <a href="manageblog.php?adspro=<?= $row['id']?>&type=0" class="btn btn-sm btn-dark"><i class="fa  fa-hand-o-down"></i><?php echo $lang['normal'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="manageblog.php?adspro=<?= $row['id']?>&type=1" class="btn btn-sm btn-secondary"><i class="fa  fa-hand-o-up"></i><?php echo $lang['special'] ?></a>
                                    <?php } ?>
                                    	<form action="editblog.php" method="POST">
                                    	<input type="hidden" name="id" value="<?php echo $row['id'] ;?>"> 
                                    	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-pencil-square-o"></i><?php echo $lang['edit'] ?></button>
                                    	</form>
                                    
                                 
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?php echo $row['id'] ;?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a>
                                    <a href="../single.php?id=<?php echo $row['id'] ;?>" class="btn btn-sm btn-primary" name="id" value="2" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-eye"></i><?php echo $lang['view'] ?></a>
                                    
                                    
                                    <a href="manageblog.php?delet=<?= $row['id']?>" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
                                </td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
$sql = "SELECT * FROM blog   ORDER BY id DESC";
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
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden" dir="auto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['title-p'] ;?>: <?= $row['title']?></h5>
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
                            <th><?php echo $lang['Role'] ?></th>
                            <?php
                            $info = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='".$row['iduser']."';")); 
                            ?>
                            <td><?php if($info['role'] == 1){
echo $lang['admin'];
}elseif($info['role'] == 2){
	echo $lang['supervisor'];
}
elseif($info['role'] == 3){
	echo $lang['edits'];
}elseif($info['role'] == 4){
	echo $lang['demo'];
}
else{
	echo $lang['user'];
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
                            <th><?php echo $lang['title-p'] ?></th>
                            <td><?= strtoupper($row['title'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php
echo $lang['title_short'] ?></th>
                            <td><?= $row['title_blog']?></td>
                        </tr>
                        <tr>
                            
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">' . $lang['Active'] . '</span>' : '<span class="badge badge-pill badge-danger">' .$lang['Inactive'].'</span>' ?></td>
                        </tr>
                       
                        
                            
                        
                        <?php  $idc = $row['cat_id'];
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
                        
                            
                        <tr>
                            <th><?php echo $lang['date'] ?></th>
                            <td><?= $row['date']?></td>
                        </tr>
                        
                        <tr>
                            <th><?php echo $lang['summary'] ?></th>
                            <td><?= $row['summary']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Content'] ?></th>
                            <td><?= $row['content']?></td>
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
                            <th><?php echo $lang['visit'] ?></th>
                            <td><?= $row['view']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['downloads'] ?></th>
                            <td><?= $row['download']?></td>
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