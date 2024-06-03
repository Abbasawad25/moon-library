<?php require_once 'header.php' ?>

    
    
<?php
     $a = $_POST['reg_user'];
     if(isset($a) and $row['role'] == 1 or $row['role'] == 2) {
    if(isset($a)){
     $name = $_POST['name'];
     $name_en = $_POST['name_en'];
    $typeid = $_POST['typeid'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $account_number = $_POST['account_number'];
    $type = $_POST['type'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $sql = "INSERT INTO portal_payment(typeid,type,name,account_number,status,subject,name_en) VALUES('$typeid','$type','$name','$email','$username','$account_number','$status','$content','$name_en')";
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
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add-new-portal_payment'] ?></h3>
                    <span style="font-weight: bold"></span>
                    <span style="font-weight: bold"></span>
                </header>
                <div class="card-body">
                    <form action="portal_payment.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['type_portal_payment'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="typeid" id="" class="form-control">
                                    <option value="1"><?php echo $lang['bank_transfer'] ;?></option>
                                    </option>
                                    <option value="2"><?php echo $lang['electronic_payment_portal'] ;?></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['type_portal_payment'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="type" id="" class="form-control">
                                    <option value="1"><?php echo $lang['username'] ;?></option>
                                    </option>
                                    <option value="2"><?php echo $lang['email'] ;?></option>
                                    <option value="3"><?php echo $lang['the_number'] ;?></option>
                                    
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
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_en'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="name_en" value="">
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
                                <b><?php echo $lang['account_number'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="account_number" class="form-control">
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