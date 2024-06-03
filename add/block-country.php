<?php require_once 'header.php' ?>

    
    
<?php
     $a = $_POST['reg_user'];
     $iduser = $row['id'];
    if(isset($a)){
    $country = $_POST['country'];
    $country = filter_var($country,FILTER_SANITIZE_STRING);
    $block_ip = $_POST['ip'];
    $api_key = $_POST[api_key];
    $typeid = $_POST['typeid'];
    $typeid = filter_var($typeid,FILTER_SANITIZE_NUMBER_INT);
    
    $status = $_POST['status'];
    $status  = filter_var($status,FILTER_SANITIZE_NUMBER_INT);
    $user_check_query = "SELECT * FROM api WHERE iduser='$iduser' OR api_key='$api_key' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['api_key'] === $api_key) {
 
    $sql = "INSERT INTO block_countrys(ip,country,api_key) VALUES('$block_ip','$country','$api_key')";
    if(mysqli_query($conn,$sql)){
    	echo $lang['It_was_successful'];
    	}
    else{
    	echo $lang['there_was_a_problem'];
    	}
    }
	
	else{
		echo "This Api key does not exit هذا المفتاح لايوجد";
		}
		}
    }else{
    	}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['create_driven_membership'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['country'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="country" id="" class="form-control" Multiple >
                                    <option value="sudan">sudan السودان</option>
                                    </option>
                                    <option value="مصر">مصر</option>
                                    <option value="تركيا">تركيا</option>
                                    <option value="بريطانيا">بريطانيا</option>
                             <option value="روسيا"> روسيا</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['the_days'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="time" id="" class="form-control">
                                    <option value="1"><?php echo $lang['day'] ;?></option>
                                    </option>
                                    <option value="7"><?php echo $lang['week'] ;?></option>
                                    <option value="30"><?php echo $lang['month'] ;?></option>
                                    <option value="360"><?php echo $lang['year'] ;?></option>
                                </select>
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['link_web'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="link" required class="form-control" id="web" placeholder="<?php echo $lang['api_key'] ?>" name="api_key" value="<?php echo $editapp['api_key'] ;?>">
                            </div>
                        </div>                                                                                                                           
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="ip" id="" cols="30" rows="10" class="summernote">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['amount'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="amount" class="form-control">
                            </div>
                        </div>                                                                                 
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                        	<?php echo $lang['Inactive'] ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['save'] ;?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>