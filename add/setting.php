<?php require_once 'header.php' ?>

    
    
<?php
/*
include ('../UserInformation.php');
include ('../get.php');
*/
  $date = date('Y:m:d h:i:s');
  $ip = UserInfo::get_ip();
  $uos = substr($uos,30,13);
  $os = $uos;
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$role =  $row['role']; 
$id    =     $row['id'];
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM stm where id='1' ")); 
$setting = $_POST['setting'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
if(isset($setting) and $role == 1 OR $role == 2){
	$web = $_POST['web'];
	$code = $_POST['code'];
	$auto_post = $_POST['auto_post'];
	$view_post = $_POST['view_post'];
	$sql = "UPDATE stm set trs='$trs',web='$web',code='$code',view_post='$view_post',auto_post='$auto_post',ip='$ip',os='$os',date='$date' where id='1' ";
	if(mysqli_query($conn,$sql)){
		?>
			<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
			<?php
		}else{ ?>
			<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
			<?php
			}
	}else{ ?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php }
		}else{
			}

?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['setting_site'] ?></h3>
                    <span style="font-weight: bold"></span>
                    <span style="font-weight: bold"></span>
                </header>
                <div class="card-body">
                    <form action="setting.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="web" class="col-sm-3 col-form-label"><b><?php echo $lang['location-status'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="web" id="web" class="form-control">
                                    <option value="1" <?php if($ro['web'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['web'] == 0){ echo 'selected'; }?> ><?php echo $lang['Inactive'] ?></option>                                                           
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label"><b><?php echo $lang['check-by-email'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="code" id="codr" class="form-control">
                                    
                                    <option value="1" <?php if($ro['code'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['code'] == 0){ echo 'selected'; }?> ><?php echo $lang['Inactive'] ?></option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sudani" class="col-sm-3 col-form-label"><b><?php echo $lang['automatic_approval_of_publications'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="auto_post" id="auto_post" class="form-control">
                                    <option value="1" <?php if($ro['auto_post'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['auto_post'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ?></option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zain" class="col-sm-3 col-form-label"><b><?php echo $lang['view_publications'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="view_post" id="view_post" class="form-control">
                                    <option value="1" <?php if($ro['view_post'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="2" <?php if($ro['view_post'] == 2){ echo 'selected'; }?>><?php echo $lang['all'] ?></option>
                                    <option value="0" <?php if($ro['view_post'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ?></option>
                                   
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="trf" class="col-sm-3 col-form-label"><b><?php echo $lang['freefire-shipping-Service'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="trf" id="trf" class="form-control">
                                    <option value="1" <?php if($ro['trf'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['trf'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ?></option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trb" class="col-sm-3 col-form-label"><b><?php echo $lang['bu-shipping-Service'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="trb" id="trb" class="form-control">
                                    <option value="1" <?php if($ro['trb'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['trb'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ?></option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trs" class="col-sm-3 col-form-label"><b><?php echo $lang['conversion-services'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="trs" id="trs" class="form-control">
                                    <option value="1" <?php if($ro['trs'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ?></option>
                                    <option value="0" <?php if($ro['trs'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ?></option>
                                  
                                   
                                </select>
                            </div>
                        </div>
                        
                 
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="setting" value="<?php echo $lang['send'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>