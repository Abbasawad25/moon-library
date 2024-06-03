<?php require_once 'header.php'?>

<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;">All Users</h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       // require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM users ORDER BY id DESC limit 10";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $i = 0;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= strtoupper($row['username'])?></td>
                                <th scope="row">
                                    <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">'.$lang['admin'].'</span>';
                                    }elseif ($row['role'] == 0){
                                        echo '<span class="badge badge-pill badge-danger">Blocked</span>';
                                    }elseif ($row['role'] == 3){
                                        echo '<span class="badge badge-pill badge-warning">'.$lang['Edit'].'</span>';
                                    }
                                    ?>
                                </th>
                                <th scope="row">
                                    <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">'.$lang['admin'].'</span>'; ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-down"></i> Demote</a>
                                    <?php  }elseif ($row['role'] == 0){ ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-up"></i> Unblock</a>
                                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"><i class="fa  fa-trash-o"></i> Delete</a>
                                    <?php  }elseif ($row['role'] == 2){ ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&block" class="btn btn-sm btn-danger"><i class="fa  fa-hand-o-down"></i> Block</a>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&admin" class="btn btn-sm btn-info"><i class="fa  fa-hand-o-up"></i> Admin</a>
                                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"><i class="fa  fa-trash-o"></i> Delete</a>
                                    <?php      }
                                    ?>
                                    	     <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?php echo $row['id'] ;?>"><i class="fa fa-eye"></i><?php echo $lang['Preview'] ?></a>
                                </th>

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
<?php $sql = "SELECT * FROM users ORDER BY id DESC limit 10";
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
    <div class="modal fade " id="id<?php echo $row['id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" dir="<?php echo $lang['dir'] ;?>">
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
                            <th><?php echo $lang['name'] ?></th>
                            <td><?= strtoupper($row['name'])?></td>
                        </tr>
                        <tr>
                        
                            <th><?php 
echo $lang['username'] ?></th>
                            <td><?= $row['username']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['email'] ?></th>
                            <td><?= $row['email']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['number'] ?></th>
                            <td><?= $row['num']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['sex'] ?></th>
                            <td><?php if($row['sex'] == 1){
                            	echo $lang['male'];
}else{
	echo $lang['female'];
}?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['Role'] ?></th>
                            <td><?php if($row['role'] == 1){
                            	echo $lang['admin'];
}elseif($row['role'] == 2){
                            	echo $lang['supervisor'];
}elseif($row['role'] == 3){
                            	echo $lang['edits'];
}elseif($row['role'] == 4){
                            	echo $lang['demo'];
}else{
	echo $lang['user'];
}?></td>

                        </tr>
                        <tr>
                            <th><?php echo $lang['The-status'] ?></th>
                            <td><?= $row['checkuser'] == 1 ? '<span class="badge badge-pill badge-success">'.$lang['Active'].'</span>' : '<span class="badge badge-pill badge-danger">'.$lang['Inactive'].'</span>' ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['bron'] ?></th>
                            <td><?= ucwords($row['date'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['country'] ?></th>
               
                            <td><?= $row['country']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['state'] ?></th>
                            <td><?= $row['state']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['city'] ?></th>
                            <td><?= $row['city']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['street_address'] ?></th>
                            <td><?= $row['street_address']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['living'] ?></th>
                            <td><?= $row['living']?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo $lang['date_of_join'] ?></th>
                            <td><?= $row['dateg']?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['amount'] ?></th>
                            <td><?= $row['money']?></td>
                            
                        </tr>
                        <tr>
                            <td><?php echo $lang['image'] ?></td>
                            <td class="text-center"><img width="200px" src="../upload/images/users/<?= $row['image']?>" alt=""></td>
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
