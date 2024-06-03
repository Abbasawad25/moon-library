<?php
include"header.php";
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$r = $row['account_number'];

if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from send ;"));
          $row['username'];

}



          
          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          	$site = $_POST['site'];
          
          $id = $_POST['id'];
          $sq = "UPDATE pays set  site='$site' where id='$id' ";
        if ($conn->query($sq) === TRUE) {
  echo "New record created successfully";
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}
          }
           if(isset($_GET['site'])){
    $si = $_GET['site']; }
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.php"><?php echo $lang['home'] ;?></a>
</li>
<li class="breadcrumb-item active"><?php echo $lang['send_the_money'] ;?></li>
</ol>

<form action="" method="POST">
	<div class="card mb-3 bg-warning">
		<div class="card-header">
                	<input type="text" name="number" dir="auto" style="color:red;" placeholder="<?php echo $lang['enter_the_transaction_number'] ;?>">
                	<div>
                	</div>
                	<br>
                	<label for="username" class="col-sm-3 col-form-label"><b><?php echo $lang['enter_the_transaction_date'] ;?></b></label>
                	<input type="date" name="date" dir="auto" style="color:red;">             	
                	</div>
                <div class="form-group row">
                            <label for="web" class="col-sm-3 col-form-label"><b><?php echo $lang['show_style'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="limit" id="web" class="form-control">
                                    <option value="10" <?php if($ro['web'] == 1){ echo 'selected'; }?>> 10</option>
                                    <option value="25" <?php if($ro['web'] == 0){ echo 'selected'; }?> >25</option>
                                     <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >50</option>
                                      <option value="75" <?php if($ro['web'] == 0){ echo 'selected'; }?> >75</option>
                                       <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >100</option>
                                    </option>
                                   
                                </select>
                            </div>
                        </div>
                <button type="submit" style="background:red;border: none;width:250px;padding: 10px;margin:auto;border-radius: 10px;color:white;font-size: 16px;" name="send"><?php echo $lang['send'] ;?></button>
                </div>
           
                	</form>
<div class="card mb-3 bg-warning">
            <div class="card-header">
              <i class="fas fa-table"></i>
  <?php echo $lang['money_the_send'] ;?></div>
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
            $send = $_POST['send'];
            $limit = 1;
            if(isset($send)){
            	$number = $_POST['number'];
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $number =    filter_var($number,FILTER_SANITIZE_STRING);
         $limit = filter_var($limit,FILTER_SANITIZE_NUMBER_INT);
         if(filter_var($limit,FILTER_VALIDATE_INT) == false){
         	echo "يرجى أدخال رقم";
         	}
         $date = filter_var($date,FILTER_SANITIZE_NUMBER_INT);
            
            	}
              $num = 1;
            
            	$sql = "SELECT * FROM send  where username='$r' AND number_the_process LIKE '%$number%' && date LIKE '%$date%' order by id DESC limit $limit ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th><?php echo $lang['account_number'] ;?></th>
                <th><?php echo $lang['name_of_sender'] ;?></th>
                <th><?php echo $lang['the_amount'] ;?></th>
                <th><?php echo $lang['date-the-process'] ;?></th>
                <th><?php echo $lang['number-the-process'] ;?></th>  
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){
                  	$numid = $row['account_number'];
        
 ?>
                  	
                  	

 <tr>
 	<form action="pays.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $num++;?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['usernamem'];?> </td>
             
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['nameto'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['number_the_process'] ;?></td>            
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
