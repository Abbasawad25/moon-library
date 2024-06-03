<?php
include"header.php";

date_default_timezone_set('Africa/Khartoum');

if(isset($_GET['tempdelete'])){
$row = mysqli_fetch_array(mysqli_query($conn, "Select * from users ;"));
          $row['username'];

}


if(isset($_GET['delete'])){   
   $q="DELETE FROM service where id=".$_GET['delete'];
          if(mysqli_query($conn,$q)){
      
						  echo "تم الحذف";
            }
            
           }
              
          else{
              echo "فشل حذف المستخدم";
             
          }
          
          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          	$site = $_POST['site'];
          $date = '2023-08-03 04:16:11';
          $id = $_POST['id'];
          $sq = "UPDATE service set  site='$site' , dateend='$date' where id='$id' ";
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
<a href="index.html">Dashboard</a>
</li>
<li class="breadcrumb-item active">my admin</li>
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
            
                        
            
            	$sql = "SELECT * FROM service";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
            	 
            <thead>
                <th>#</th>
                <th>العنوان</th> 
<th>المحتوى</th>               
                <th>tag</th>
                <th>money</th>
                <th>الرابط</th>
                <th>النوع</th>
                <th>نوع العملة</th>              
                <th>الايام</th>
              <th>الصورة</th>         
              <th>حذف</th>                                                 
                <th>حفظ</th>  
            </thead>
        <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                  	
 <tr>
 	<form action="" method="POST" enctype="multipart/form-data">
                <td><?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                <td><i class=\"fas fa-file fa-fw\"></i><?php echo $row['name'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['content'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['tag'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['url'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['type'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['a'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['days'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><img src="../images/<?php echo $row['image'];?>"> </td>
                
                
                <td><i class=\"fas fa-user fa-fw\"></i><a href="editservice.php?delete=<?php echo $row['id'] ?>"><i class='fas fa-trash fa-fw'>dele</a></td>
                
           
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
