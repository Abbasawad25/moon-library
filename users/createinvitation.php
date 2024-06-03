<?php require_once 'header.php' ?>

    
    
<?php
/*
include ('../UserInformation.php');
    include ('../get.php');
    */
    include"../server.php";
   $ip = UserInfo::get_ip();
  $uos = substr($uos,30,13);
  $os = $uos;
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$ido = $row['id'];
$a = $_POST['r'];
   if(isset($a)) {
   $code = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000);
   
  $user_check_query = "SELECT * FROM meeting WHERE iduser='$ido'  LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
   if ($user) { // if user exists
 
if ($user['iduser'] === $ido) {
 
array_push($errors, $lang['the_code_has_been_generated_formerly']);

//header('location: index.php');
				
 }
 else{
 	array_push($errors, $lang['This-problem-has-happened-please-retry']);
 	}
}
else{
	$query = "INSERT INTO meeting(iduser,code,ip,os)
VALUES('$ido','$code','$ip','$os')";
if(mysqli_query($conn, $query) ){
	//echo "<";
	array_push($errors, $lang['the_code_has_been_generated_successfully']);
	
	}
	else{
		// if erreor be database
		//header('location: index.php');
		array_push($errors, "enter save already exists");
		
		}
		}
   	}
   //end

   //s
   $r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM meeting where iduser='$ido' ")); 
  // echo $r['codemett'];
   $mycode = $r['code'];
   
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['profit_through_the_participation_of_your_invitation_code'] ;?></h3>
                    
                    
                   <?php include"../errors.php"; ?>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                	
                    <form action="createinvitation.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['your_invitation_code'] ;?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" name="tite" value="<?php echo $mycode;?>" readonly>
                            </div>
                        </div>
                      
              
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="r" value="<?php echo $lang['generate_invitation_code'] ;?>">
                            </div>
                        </div>
                    </form>
                
       
                    
                </div>
            </section>
            <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['profit_management'] ?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['invitation_code'] ?></th>
                            <th><?php echo $lang['amount'] ?></th>
                            <th><?php echo $lang['date'] ?></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM  meeting where codeid='$mycode' ORDER BY id DESC";
                        if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                              
                                <th scope="row">
                                    <?php echo $row['codeid'] ;?>
                                </th>
                                <th scope="row">
                                	<?php echo $row['money'] ;?>
                               
                                </th>
                                <th scope="row">
                                	<?php echo $row['date'] ;?>
                               
                                </th>

                            </tr>
             <?php      }
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
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>