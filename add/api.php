<?php require_once 'header.php' ?>

    
    
<?php
     $key = rand(1000,100006) . random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000);
  $_SESSION['api_key'] = $key;
  $api_key = $_SESSION['api_key'];
     $a = $_POST['reg_user'];
     $iduser = $row['id'];
    if(isset($a)){
    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $company = $_POST['company'];
    $company = filter_var($company,FILTER_SANITIZE_STRING);
     $city = $_POST['city'];
    $city = filter_var($city,FILTER_SANITIZE_STRING);
    $country = $_POST['country'];
    $country = filter_var($country,FILTER_SANITIZE_STRING);
    $state = $_POST['state'];
    $state = filter_var($state,FILTER_SANITIZE_STRING);
    $street_address = $_POST['street_address'];
    $street_address = filter_var($street_address,FILTER_SANITIZE_STRING);
    $content = $_POST['content'];
    $content = filter_var($content,FILTER_SANITIZE_STRING);
    $link_web = $_POST['link_web'];
    $link_web = filter_var($link_web,FILTER_SANITIZE_STRING);
    
    $sql = "INSERT INTO api(company,name,api_key,iduser,link_web,country,state,city,info,street_address) VALUES('$company','$name','$api_key','$iduser','$link_web','$country','$state','$city','$content','$street_address')";
    if(mysqli_query($conn,$sql)){
    	echo $lang['It_was_successful'];
    	}
    else{
    	echo $lang['there_was_a_problem'];
    	}
    }else{
    	}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['create_api_key'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="api.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['company'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['company'] ?>" name="company" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['api_key'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['api_key'] ?>" name="api_key" value="<?php echo $api_key ;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['link_web'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="link" required class="form-control" id="web" placeholder="<?php echo $lang['link_web'] ?>" name="link_web" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_web'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name'] ?>" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="co" class="col-sm-3 col-form-label"><b><?php echo $lang['country'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="co" placeholder="<?php echo $lang['country'] ?>" name="country" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label"><b><?php echo $lang['city'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="city" placeholder="<?php echo $lang['city'] ?>" name="city" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-sm-3 col-form-label"><b><?php echo $lang['state'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="state" placeholder="<?php echo $lang['state'] ?>" name="state" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-sm-3 col-form-label"><b><?php echo $lang['street_address'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="street_address" placeholder="<?php echo $lang['street_address'] ?>" name="street_address" value="">
                            </div>
                        </div>                                           
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="content" id="" cols="30" rows="10" >
                                </textarea>
                            </div>
                        </div>
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