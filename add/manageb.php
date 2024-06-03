<?php require_once 'header.php' ?>

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
     define("ROW_PER_PAGE",5);
require_once('../db.php');
	$sql =' SELECT * FROM categories WHERE id LIKE :keyword OR iduser LIKE :keyword  ORDER BY id DESC ';
	
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
                                <td><?php echo substr($row['name'],0,40)?></td>
                              <?php  $idc = $row['categories'];
                              $ids = $row['section'];
                              $section = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM section where id='$ids' ")); 
                                $categories = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idc' ")); 
?>
                                <td><?php echo $section['name']?></td>
                                <td><?php echo $categories['name']?></td>
                                <td><img style="width: 50px" src="../upload/images/book/<?php echo $row['image']?>" alt=""></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&inactive" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&active" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></a>
                                    <?php } ?>
                                    <?php
                                    if($row['rate'] == 1) { ?>
                                    	<td>
                                    	<form action="editbook.php" method="POST">
                                    	<input type="hidden" name="id" value="<?php echo $row['id'] ;?>"> <input type="submit" value="send">
                                    	</form>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&makedown" class="btn btn-sm btn-dark"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Down'] ?></a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&maketop" class="btn btn-sm btn-secondary"><i class="fa  fa-hand-o-up"></i><?php echo $lang['top'] ?></a>
                                    <?php } ?>
                                    	<form action="editbook.php" method="POST">
                                    	<input type="hidden" name="id" value="<?php echo $row['id'] ;?>"> 
                                    	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-pencil-square-o"></i><?php echo $lang['edit'] ?></button>
                                    	</form>
                                    <a href="../single.php?id=<?php echo $row['id'] ;?>" class="btn btn-sm btn-primary" name="id" value="2" data-toggle="modal" data-target="<?php echo  $row['id']?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a>
                                    
                                    
                                    <a href="delete.php?id=<?= $row['id']?>&managepost" class="btn btn-sm btn-danger"onclick="return confirm('<?php echo $lang['Are-you-sure'] ?>')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
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
  echo $_POST['id'];
?>
    <!-- VIEW POST Modal -->
<div class="modal fade " id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Title : <?= $row['title']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                    	<tr>
                            <th><?php echo $lang['section'] ?></th>
                            <td><?php echo strtoupper($section['name'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Categorie'] ?></th>
                            <td><?php echo strtoupper($categories['name'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['author'] ?></th>
                            <td><?= ucwords($row['username'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Delete'] ?></th>
                            <td><?= $row['date']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Tagged'] ?></th>
                            <td><?= $row['tag']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['summary'] ?></th>
                            <td><?php echo $row['summary']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Content'] ?></th>
                            <td><?php echo $row['subject']?></td>
                        </tr>
                        <tr>
                            <td><?php echo $lang['image'] ?></td>
                            <td class="text-center"><img width="200px" src="../upload/images/book/<?php echo  $row['image']?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلق</button>
                </div>
            </div>
        </div>
    </div>



<?php require_once 'footer.php' ?>
