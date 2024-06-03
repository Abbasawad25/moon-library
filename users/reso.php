<?php
include"header.php";
include"../con.php";


if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from users ;"));
        

}



          
          #updateusers
          
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.php">Dashboard</a>
</li>
<li class="breadcrumb-item active">لوحة عمليات التحويل</li>
</ol>
<form action="" method="POST">
	<div class="card mb-3 bg-warning">
		<div class="card-header">
                	<input type="text" name="number" dir="auto" style="color:red;" placeholder="أدخل رقم المعاملة">
                	<div>
                	</div>
                	<br>
                	<label for="username" class="col-sm-3 col-form-label"><b>رقم المعاملة</b></label>
                	<input type="date" name="date" dir="auto" style="color:red;">             	
                	</div>
                <div class="form-group row">
                            <label for="web" class="col-sm-3 col-form-label"><b> العرض</b></label>
                            <div class="col-sm-9">
                                <select name="sat" class="form-control">
                                    <option value="1"> تمت الموافقة</option>
                                    <option value="0">لم تمت الموافقة</option>
                                     <option value="2">تم رفضها</option>
                                     <option value="4">الكل</option>
                                      
                                   
                                </select>
                            </div>
                        </div>
                <div class="form-group row">
                            <label for="web" class="col-sm-3 col-form-label"><b> العرض</b></label>
                            <div class="col-sm-9">
                                <select name="limit" id="web" class="form-control">
                                    <option value="10" <?php if($ro['web'] == 1){ echo 'selected'; }?>> 10</option>
                                    <option value="25" <?php if($ro['web'] == 0){ echo 'selected'; }?> >25</option>
                                     <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >50</option>
                                      <option value="75" <?php if($ro['web'] == 0){ echo 'selected'; }?> >75</option>
                                       <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >100</option>
                                                               
                                </select>
                            </div>
                        </div>
                <button type="submit" style="background:red;border: none;width:250px;padding: 10px;margin:auto;border-radius: 10px;color:white;font-size: 16px;" name="send">Update</button>
                </div>
           
                	</form>
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
            $send = $_POST['send'];
            $limit = 1;
            if(isset($send)){
            	$number = $_POST['number'];
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $sat = $_POST['sat'];
            $numbe =    filter_var($numbr,FILTER_SANITIZE_STRING);
         $limit = filter_var($limit,FILTER_SANITIZE_NUMBER_INT);
         if(filter_var($limit,FILTER_VALIDATE_INT) == false){
         	echo "يرجى أدخال رقم";
         	}
         $date = filter_var($date,FILTER_SANITIZE_NUMBER_INT);
            
            	}
            if($sat == 4){
            	$opt = "!=";
            	}
            else{
            	$opt = "=";
            	}
                        
            $username =  $row['account_number'];
            	$sql = "SELECT * FROM payment  where username='$username'  AND number_process LIKE '%$number%' && date LIKE '%$date%' AND site $opt'$sat' order by id DESC  limit $limit ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th>نوع الخدمة</th>
                <th><?php echo $lang['number'] ;?></th>
                <th><?php echo $lang['amount'] ;?></th>
                <th><?php echo $lang['date'] ;?></th>
                <th>ادخل هذا الرقم في العداد</th>                                                       <th><?php echo $lang['site'] ;?></th>
                <th><?php echo $lang['number-the-process'] ;?></th> 
                <th>تاريخ نجاح العملية</th>                                           
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="pays.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $num++;?></td>
            
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['sar'];?> </td>                              <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['type'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['meng'];?> </td>
               
              <td><i class=\"fas fa-user fa-fw\"></i><?php if($row['site'] == 1){
               echo $lang['approved'];
}
elseif($row['site'] == 0){
	echo $lang['not_approved'];
}
else{
	echo $lang['It_was_rejected'];
}?></td>                                                 
<td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['number_process'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date_off'] ;?></td>
                            
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
