<?php  
date_default_timezone_set('Asia/Riyadh');
include('../server.php');
/*$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pays where username='".$_SESSION['username']."';"));
echo $row['id'];*/
  ?>
  	

            
            	<?php
include "../con.php";
$sql = "SELECT * FROM filenet ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
  	?>
  	<?php 
  $dateend = $row['dateend'];
  $da = $row['dateend'];
  $site = $row['site'];
  $das = "'$da'";
  
  
  $date = date(' Y-m-d h:i:s');
  if($site = "yes"){
  if(date('Y-m-d h:i:s') > $da){
  	$g = $das;
  
  	$m ="DELETE FROM filenet where dateend='$da' ";
          if(mysqli_query($conn,$m)){
      
						  echo "تم";
            }
            
           }
              }
              ?>
              <?php
  }
}
 else {
  echo "0 results";
 }              

?>
	