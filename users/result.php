<?php
include"header.php";



if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from users ;"));
        

}



          
          #updateusers
          $money = $row['money'];
          $idre = $row['id'];
          $descount = $stm['descount'];
          $a = $_POST['reg_user'];
      // $a =   filter_var($a,FILTER_SANITIZE_STRING);
          if(isset($a)) {
          $site = $_POST['site'];          
          $resultid = $_POST['id'];
           /*
           سوف نفلتر القيم 
           */
           $site = filter_var($site,FILTER_SANITIZE_NUMBER_INT);
           if(filter_var($site,FILTER_VALIDATE_INT) == false){
           	echo "يجب ان يكون رقم";
           	}
          $resultid = filter_var($resultid,FILTER_SANITIZE_NUMBER_INT);
          if(filter_var($resultid,FILTER_VALIDATE_INT) == false){
          	echo "يجب ان يكون رقم";
          	}
          $result = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM sendr where id='$resultid' ")); 
          $resultsite = $result['site'];
          $resultmoney = $result['money'];
          $resultmoney = filter_var($resultmoney,FILTER_SANITIZE_NUMBER_INT);
          $resultmoney = str_replace(array("+",'-'),"",$resultmoney) ;
          $fromuser = $result['username1'];
          $touser = $result['username'];
         
          
          if($money >= ($resultmoney + $descount ) ){          	
          	$profit = $descount;
$profit = str_replace(array("+",'-'),"",$profit) ;
          
          /*
          في حالة الحالة يساوي صفر سوف يتحقق الشرط
          */
          if($resultsite == 0){
          	if($site == 1){
         $sq = "UPDATE sendr set  site='$site' where id='$resultid' ";
          $sqld = "UPDATE users set  money=money+'$resultmoney' where account_number='$touser' ";
         $dk = $money - $resultmoney - $descount;
         $dk = str_replace(array("+",'-'),"",$dk) ;
          $sds = "UPDATE users set  money='$dk' where account_number='$fromuser' ";
          $profits = "INSERT INTO profits (account,iduser,type,amount,ip,os,number_the_process)
VALUES ('$fromuser','$idre','request','$profit','$ip','$os','$resultid')";
        if ($conn->query($sq) and $conn->query($sqld) and $conn->query($sds) or $conn->query($profits)=== TRUE) {
  echo "New record created successfully";
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
} 
} //end if
elseif($site = 2){
	$sd = "UPDATE sendr set site='$site' where id='$resultid' ";
	if(mysqli_query($conn,$sd)){
		echo "go";
		}
		else{
			echo "4";
			}
	}
} // end if 3
else{
	echo "فشل";
	}
} // end if 2
else{
	echo "مبلغك ليس كافي";
	}
          }
           
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.php"><?php echo $lang['home'] ;?></a>
</li>
<li class="breadcrumb-item active"><?php echo $lang['request_to_page'] ;?></li>
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
                            <label for="web" class="col-sm-3 col-form-label"><b> <?php echo $lang['site'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="sat" class="form-control">
                            <option value="1"><?php echo $lang['approved'] ;?></option>
                                    <option value="0"><?php echo $lang['not_approved'] ;?></option>
                                     <option value="2"><?php echo $lang['It_was_rejected'] ;?></option>
                                     <option value="4" selected><?php echo $lang['all'] ;?></option>
                                      
                                   
                                </select>
                            </div>
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
                                                               
                                </select>
                            </div>
                        </div>
                <button type="submit" style="background:red;border: none;width:250px;padding: 10px;margin:auto;border-radius: 10px;color:white;font-size: 16px;" name="send"><?php echo $lang['send'] ;?></button>
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
            $number =    filter_var($number,FILTER_SANITIZE_STRING);
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
            	$sql = "SELECT * FROM sendr  where username1='$username' AND number_the_process LIKE '%$number%' && date LIKE '%$date%' AND site $opt'$sat' order by id DESC limit $limit ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>               
                <th><?php echo $lang['request_to'] ;?></th>
                <th><?php echo $lang['amount'] ;?></th>
                <th><?php echo $lang['date'] ;?></th> 
                <th><?php echo $lang['number-the-process'] ;?></th> 
                <th><?php echo $lang['site'] ;?></th> 
                <th><?php echo $lang['edit'] ;?></th> 
                <th><?php echo $lang['save'] ;?></th>                                          </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="result.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $num++;?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['username'];?></td>                                 
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
           
            <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['number_the_process'];?></td>   
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
             	<option value="1"><?php echo $lang['approval'] ;?></option>
             <option value="2"><?php echo $lang['denied'] ;?></option>
             
             
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
