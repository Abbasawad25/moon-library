<?php

 require_once 'server.php';
$sql = "SELECT * FROM  block_countrys ORDER BY id DESC";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
  	
  	if($ip == $row['ip']){
  	echo " دولتك محظورة";
  	exit;
  	}
  }
  mysqli_free_result($result);
               } else{
                echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);