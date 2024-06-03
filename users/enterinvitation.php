<?php require_once 'header.php' ?>

    
    
<?php
/*
include ('../UserInformation.php');

    include ('../get.php');
    include"../server.php";
    */
    $ids = $row['id'];
  $ip = UserInfo::get_ip();
  $uos = substr($uos,30,13);
  $os = $uos;
  $sub = $stm['meetb'];
  $sup = $stm['meetview'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$id = $row['id'];
$a = $_POST['r'];
   if(isset($a) and $_SERVER['REQUEST_METHOD'] == "POST") {
   	$code = $_POST['code'];
   if (empty($code)) { array_push($errors, "bankk is required"); }
   $code = filter_var($code,FILTER_SANITIZE_STRING);
   $ca = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM meeting where code='$code' ")); 
   $iduser = $ca['iduser'];
   $user_check_query = "SELECT * FROM meeting WHERE codeid='$code' AND idview='$id'  LIMIT 1";
   $result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
   if ($user) { // if user exists
 
if ($user['codeid'] === $code and $user['idview'] === $id) {
 
array_push($errors, $lang['i_have_introduced_this_code_before']);
//header('location: index.php');
				
 }
}
else{
	$user_check_query = "SELECT * FROM meeting WHERE code='$code'   LIMIT 1";
   $result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
   if ($user) { // if user exists
 
if ($user['code'] === $code) {
 
$query = "INSERT INTO meeting(iduser,idview,codeid,ip,os,money)
VALUES('$iduser','$id','$code','$ip','$os','$sup')";
$sql = "UPDATE users set  money=money+$sup where id='$id' ";
$sq = "UPDATE users set  money=money+$sub where id='$iduser' ";
if(mysqli_query($conn, $query) and mysqli_query($conn,$sql)and mysqli_query($conn,$sq)){
	array_push($errors, $sub . " " . $lang['It_was_successful']);
	}
	else{
		// if erreor be database
		//header('location: index.php');
		array_push($errors, $lang['This-problem-has-happened-please-retry']);
		
		}
				
 }else{
 	array_push($errors, $lang['This-problem-has-happened-please-retry']);
 	}
} else{
	array_push($errors, $lang['this_invitation_code_does_not_exist']);
	}
	
		}
   	}
   //end

   //s
   
   
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"> <?php echo $lang['profit_by_entering_the_invitation_code'] ;?></h3>
                    <p><?php echo $lang['you_can_win_by_entering_the_invitation_code'] . $sup;?>
</p>
<?php include"../errors.php"; ?>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                	
                    
                
                	<form action="enterinvitation.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['enter_the_invitation_code'] ;?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['enter_the_invitation_code'] ;?>" name="code">
                            </div>
                        </div>
                      
              
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="r" value="<?php echo $lang['save'] ?>">
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
                        $sql = "SELECT * FROM  meeting where idview='$ids' ORDER BY id DESC";
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
                                <th><?php echo $row['date'] ?></th>

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