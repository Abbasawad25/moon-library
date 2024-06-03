<?php include('con.php'); ?>
<?php

   
$a = $_POST['droid'];
   if(isset($a)) {
                   $likedroid = $_POST['likedroid'];                
                   $iddroid = $_POST['iddroid'];
                   $home1 = $_POST['home1'];
                   
                $sql = "UPDATE droid set  lik='$likedroid'+1 where id='$iddroid' ";


if ($conn->query($sql) === TRUE) {
  #echo "New record created successfully";
$last_id = $conn->name;
if(4 + 4 == 8){ 
if("home1" == $home1){
 header('REFRESH:0.1;url=home1.php');
 }
 elseif("droid" == $home1){
 header('REFRESH:0.1;url=droid.php');
 }
 }
 # echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
   } ?>
   	<?php

   #file like
$file = $_POST['savelikefile'];
   if(isset($file)) {
                   $likefile = $_POST['likefile'];                
                   $idfile = $_POST['idfile'];
                   $home1 = $_POST['home1'];
                   
                $sq = "UPDATE filenet set  lik='$likefile'+1 where id='$idfile' ";


if ($conn->query($sq) === TRUE) {
  #echo "New record created successfully";
$last_id = $conn->name;
if(4 + 4 == 8){ 
if("home1" == $home1){
 header('REFRESH:0.1;url=home1.php');
 }
 elseif("file" == $home1){
 header('REFRESH:0.1;url=file.php');
 }
 }
 # echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}
   } ?>
   	<?php

   #app like
$app = $_POST['app'];
   if(isset($app)) {
                   $likeapp = $_POST['likeapp'];                
                   $idapp = $_POST['idapp'];
                   $home1 = $_POST['home1'];
                   
                $applike = "UPDATE app set  lik='$likeapp'+1 where id='$idapp' ";


if ($conn->query($applike) === TRUE) {
  #echo "New record created successfully";
$last_id = $conn->name;
if("home1" == $home1){
 header('REFRESH:0.1;url=home1.php');
 }
 # echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $applike . "<br>" . $conn->error;
}
   } ?>
   	
   	