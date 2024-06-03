<?php
include"header.php";
include"../con.php";

$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$r = $row['username'];

if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from send ;"));
          $row['username'];

}


if(isset($_GET['delete'])){   
   $q="DELETE FROM sendr where id=".$_GET['delete'];
          if(mysqli_query($conn,$q)){
      
						  echo "تم الحذف";
            }
            
           }
              
          else{
              #echo "فشل حذف المستخدم";
             
          }
          
          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          	$site = $_POST['site'];
          
          $id = $_POST['id'];
          $sq = "UPDATE sendr set  site='$site' where id='$id' ";
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
<a href="index.html">لوحة ارسال المال و الأستلام</a>
</li>
<li class="breadcrumb-item active">طلب مال و الرد على طلبك</li>
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
            
                        
            
            	$sql = "SELECT * FROM sendr  where username='$r' ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th>إسم المستخدم المرسل</th>
                <th>إسم المرسل</th>
               
                <th>لقد استلمت مبلغ</th>
                <th>تاريخ الإرسال</th>
                        
                <th>حذف الطلب</th>
                  <th>حفظ</th>
                
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="pays.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                <td><i class=\"fas fa-file fa-fw\"></i><?php echo $row['name'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['username'];?> </td>
                
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><a href="rmoney.php?delete=<?php echo $row['id'] ?>"><i class='fas fa-trash fa-fw'>dele</a></td>
                
             
           
                <td><button type="submit" class="btn btn-danger btn-block" name="reg_user">Update</button></dt>
                
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
