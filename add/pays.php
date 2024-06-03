<?php
include"header.php";
date_default_timezone_set('Africa/Khartoum');
$iduser = $row['id'];
if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from users ;"));
          $row['username'];

}



          
          #updateusers
          $a = $_POST['reg_user'];
          if($row['role'] == 1 or $row['role'] == 2) {
          if(isset($a)) {
          
          	$status = $_POST['status'];
              $id = $_POST['id'];
              $pays = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pays where id='$id' ")); 
$r = $row['account_number'];
          $ds = $pays['time'];
          $st = $pays['status'];
          if(!empty($ds)){
          	if($ds == 360){
          	$date = strtotime('+1 year');
          $date = date("Y:m:d h:i:s",$date);
          
          }
          elseif($ds == 30){
          	$date = strtotime('+1 month');
          $date = date("Y:m:d h:i:s",$date);
          
          }
          if($ds == 7){
          	$date = strtotime('+1 week');
          $date = date("Y:m:d h:i:s",$date);
          
          }
          if($ds == 1){
          	$date = strtotime('+1 day');
          $date = date("Y:m:d h:i:s",$date);
          
          }
          	
          }
          if($pays['status'] == 0){
          $sq = "UPDATE pays set  status='$status',editip='$ip',editos='$os',editid='$iduser',dateend='$date' where id='$id' ";
        if ($conn->query($sq) === TRUE) {
  ?>
  	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
  <?php
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
}
}
else{
	?>
		
		<?php
	}
          }
          }
          else{
          	}
    
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.html"><?php echo $lang['Dashboard'] ;?></a>
</li>
<li class="breadcrumb-item active"><?php echo $lang['admin'] ;?></li>
</ol>


<div class="card mb-3 bg-warning">
            <div class="card-header">
              <i class="fas fa-table"></i><?php echo $lang['membership_requests'] ;?></div>
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
            
                        
            
            	$sql = "SELECT * FROM pays  ORDER BY id DESC";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th><?php echo $lang['username'] ;?></th>
                <th><?php echo $lang['email'] ;?></th>
                <th><?php echo $lang['amount'] ;?></th>
                <th><?php echo $lang['payment_method'] ;?></th>
                           
                <th>تاريخ التفعيل</th>
                
                <th>تاريخ الإنتهاء</th>
                <th>الأيام</th>
                <th><?php echo $lang['image_of_conversion_notice'] ;?></th>  
              <th><?php echo $lang['site'] ;?></th>                    
             
                <th><?php echo $lang['edit'] ;?></th>  
                
                <th><?php echo $lang['save'] ;?></th>  
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="pays.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                <td><i class=\"fas fa-file fa-fw\"></i><?php echo $row['username'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['email'];?> </td>
                
               <td><i class=\"fas fa-user fa-fw\"></i><input type="hidden" name="ds" value="<?php echo $row['pay'];?> "><?php echo $row['pay'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['portal_payment'];?> </td>
              
                <td><i class=\"fas fa-user fa-fw\"></i><input type="hidden" name="date" value="<?php echo $row['date'];?> "><?php echo $row['date'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['dateend'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['days'];?></td>
                <td><i class=\"fas fa-user fa-fw\"></i><img src="../upload/images/saccharine/pay/<?php echo $row['image'];?>" width="150" hieght="150"> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php if($row['status'] == 1){
               echo $lang['approved'];
}
elseif($row['status'] == 0){
	echo $lang['not_approved'];
}
else{
	echo $lang['It_was_rejected'];
}?></td>
                <td><i class=\"fas fa-user fa-fw\"></i><select name="status">
             	<option value="1" <?php if($row['status'] == 1){ echo 'selected'; }?>><?php echo $lang['approval'] ;?></option>
             <option value="2" <?php if($row['status'] == 2){ echo 'selected'; }?>><?php echo $lang['denied'] ;?></option>            
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
