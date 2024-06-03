<?php require_once 'header.php' ?>

    
    
<?php
     $a = $_POST['reg_user'];
     $iduser = $row['id'];
     if(isset($a) and $row['role'] == 1 or $row['role'] == 2) {
    if(isset($a)){
    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $typeid = $_POST['typeid'];
    $typeid = filter_var($typeid,FILTER_SANITIZE_NUMBER_INT);
    $time = $_POST['time'];
    $time = filter_var($time,FILTER_SANITIZE_NUMBER_INT);
    $amount = $_POST['amount'];
    $amount = filter_var($amount,FILTER_SANITIZE_NUMBER_INT);
    $content = $_POST['content'];
    $status = $_POST['status'];
    $status  = filter_var($status,FILTER_SANITIZE_NUMBER_INT);
    $sql = "INSERT INTO plan(typeid,name,amount,time,status,subject,ip,os,iduser) VALUES('$typeid','$name','$amount','$time','$status','$content','$ip','$os','$iduser')";
    if(mysqli_query($conn,$sql)){
    	echo $lang['It_was_successful'];
    	}
    else{
    	echo $lang['there_was_a_problem'];
    	}
    }else{
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
                    <form action="addplan.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['organic_type'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="typeid" id="" class="form-control">
                                    <option value="1"><?php echo $lang['golden'] ;?></option>
                                    </option>
                                    <option value="2"><?php echo $lang['platinum'] ;?></option>
                                    <option value="3"><?php echo $lang['distinctive'] ;?></option>
                                    <option value="4"><?php echo $lang['bronze'] ;?></option>
                             <option value="5"><?php echo $lang['normal'] ;?></option>
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
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" class="summernote">
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
                       
                    
                                 
                  
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0"><b><?php echo $lang['The-status'] ?></b></legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                        	<?php echo $lang['Active'] ?>
                                        </label>
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