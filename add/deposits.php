<?php
include"header.php";


date_default_timezone_set('Africa/Khartoum');

if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from users ;"));
          $row['username'];
          
          

}



          
          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          $id = $_POST['id'];
          $site = $_POST['site'];
          $de = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM deposits where id='$id' ")); 
$r = $row['account_number'];
          	$money = $de['money'];
          $st = $de['site'];
          $username = $de['username'];
          if($de['site'] == 0){
          $ro = mysqli_fetch_array(mysqli_query($conn, "SELECT * from users where username='$username';"));
          $mo = $ro['money'];
          $iduser = $ro['id'];
          $al = $money + $mo;
          $ssq = "UPDATE users set  money='$al' where username='$username' ";
          $sqd = "UPDATE deposits set  site='$site',editip='$ip',editid='$iduser',editos='$os' where id='$id' ";
        if ($conn->query($ssq) === TRUE and $conn->query($sqd) === TRUE) {
  echo "New record created successfully";
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}
}
else{
	echo "error تعذر التحديث";
	}
          }
          
           if(!empty($_GET['site'])){
   $si = $_GET['site'];
$all = 'WHERE '.'site='."'$si'"; }
elseif(empty($_GET['site'])){
    $si = $_GET['site'];
$all = ''; }
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.php"><?php echo $lang['home'] ;?></a>
</li>
<li class="breadcrumb-item active"><?php echo $lang['deposit_page'] ;?></li>
</ol>


<div class="card mb-3 bg-warning">
            <div class="card-header">
              <i class="fas fa-table"></i>
              الطلبيات</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
    	<?php

            
            
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            	// Attempt select query execution
            	// SELECT * FROM myTable ORDER BY id DESC LIMIT 1
            
                        
            
            	$sql = "SELECT * FROM deposits  $all ORDER BY id DESC";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th><?php echo $lang['username'] ;?></th>
                <th><?php echo $lang['email'] ;?></th>
                <th><?php echo $lang['payment_method'] ;?></th>
                <th><?php echo $lang['amount'] ;?></th>
                <th><?php echo $lang['date'] ;?></th>                                                  
                <th><?php echo $lang['image_of_conversion_notice'] ;?></th>  
<th><?php echo $lang['site'] ;?></th>                    
              
                <th><?php echo $lang['edit'] ;?></th>  
                
                <th><?php echo $lang['save'] ;?></th>  
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="deposits.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                <td><i class=\"fas fa-file fa-fw\"></i><input type="hidden" name="username" value="<?php echo $row['username'];?> "><?php echo $row['username'];?></td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['email'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['type'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><input type="hidden" value="<?php echo $row['money'];?>" name="money"> <?php echo $row['money'] ;?></td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><img src="../upload/images/saccharine/des/<?php echo $row['image'];?>" width='150px' hieght='150px'>
</td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php if($row['site'] == 1){
               echo $lang['approved'];
}
elseif($row['site'] == 0){
	echo $lang['not_approved'];
}
else{
	echo $lang['It_was_rejected'];
}?></td>
                
                
             
             <td><i class=\"fas fa-user fa-fw\"></i><select name="site">
             	<option value="1" <?php if($row['site'] == 1){ echo 'selected'; }?>><?php echo $lang['approval'] ;?></option>
             <option value="2" <?php if($row['site'] == 1){ echo 'selected'; }?>><?php echo $lang['denied'] ;?></option>            
             </select> </td>        
                <td><button type="submit" class="btn btn-danger btn-block" name="reg_user"><?php echo $lang['update'] ;?></button></dt>
                
                 </form>
            </tr>
    <?php    } ?>

        </table>
        <?php 
               
               
               	
               
               // Free result set
               mysqli_free_result($result);
               } else{
                echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);
               ?>

</table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated Result.</div>
          </div>
<?php
include"../footer.php";
?>
