<?php require_once 'header.php' ?>

    
    
<?php
if($row['role'] == 1 or $row['role'] == 2 or $row['role'] == 3 or $row['role'] = 4){
	}
	
$ads = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM ads where id='1' ")); 
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add-new-post'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="ins/ads.php" method="post" enctype="multipart/form-data">
                        
                          <div class="form-group row">
                            <label for="ads1" class="col-sm-3 col-form-label"><b>أضافة أعلان</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="ads1" placeholder="<?php echo $lang['title-post'] ?>" name="ads1" value="<?php echo $ads['ads1'];?>" style="height:100px;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ads2" class="col-sm-3 col-form-label"><b>الأعلان الثاني</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="ads2" placeholder="<?php echo $lang['title-post'] ?>" name="ads2" value="<?php echo $ads['ads2'];?>" style="height:100px;">
                            </div>
                        </div>
               <div class="form-group row">
                            <label for="ads3" class="col-sm-3 col-form-label"><b><?php echo $lang['ads-one'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="ads3" placeholder="<?php echo $lang['title-post'] ?>" name="ads3" value="<?php echo $ads['ads3'];?>" style="height:100px;">
                            </div>
                        </div>
         <div class="form-group row">
                            <label for="ads4" class="col-sm-3 col-form-label"><b><?php echo $lang['ads-one'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="ads4" placeholder="<?php echo $lang['title-post'] ?>" name="ads4" value="<?php echo $ads['ads4'];?>" style="height:100px;">
                            </div>
                        </div>
                <div class="form-group row">
                            <label for="ads5" class="col-sm-3 col-form-label"><b><?php echo $lang['ads-one'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="ads5" placeholder="<?php echo $lang['title-post'] ?>" name="ads5" value="<?php echo $ads['ads5'];?>" style="height:100px;">
                            </div>
                        </div>        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="reg_user" value="<?php echo $lang['send'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>