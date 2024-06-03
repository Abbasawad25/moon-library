<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>
	<?
	include('../server.php');
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';")); 
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pays where username='".$_SESSION['username']."';")); 
   ?>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="">
                    <img 
src="../upload/images/users/<?php echo $row['image']?>" alt="">
                </a>
                <h1><?php echo $row['name']?></h1>
                <p><?php echo $row['username'];?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i><?php echo $lang['Profile'] ?></a></li>
                <li class="nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i><?php echo $lang['Edit-Profile'] ?></a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="card">
            <div class="bio-graph-heading">
                <?php echo $row['bio'] ?>
            </div>
            <div class="card-body bio-graph-info">
                <h1><?php echo $lang['Your-information'] ?></h1>
                <div class="row">
                    <div class="bio-row">
                      <p><?php echo $row['name'] ?></p>
                    </div>
                 
                    </div>
                    <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['account_number'] ;?></span><br><?php echo $row['account_number']?> </p>
                    </div>
                         </div>
                    <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['email'] ;?></span><?php echo $row['email']?> </p>
                    </div>
                         </div>
                         <div class="row">
                    <div class="bio-row">
                        <p><?php echo $lang['username'] ?> : <?php echo $row['username'] ?></p>
                    </div>
                         </div>
                         <div class="row">
                         <div class="bio-row">
                        <p><span><?php echo $lang['Telephone-number'] ?></span><?php echo $row['num']?></p>
                    </div>
                         </div>
                         <div class="row">
                    <div class="bio-row">
                        <p> <?php echo $lang['organic_type'] ;?> :
                            <?php
                            if($ro['status'] == 1){
                                echo $lang['payusers'];
                            }else{
                                echo $lang['organic_free'];
                            }
                            ?> 
                        </p>
                    </div>
                         </div>
                         <div class="row">
                    <div class="bio-row">
                        <p> <?php echo $lang['six'] ;?> : <?php if($row['sex'] == 1){
                        echo	$lang['male'];
}else{
	echo $lang['female'];
}?></p>
                    </div>                 
                         </div>
                      <div class="row">   
                    <div class="bio-row">
                        <p><?php echo $lang['country'] ;?> : <?php echo $row['country'];?></p>
                    </div> 
     </div>                  
     <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['state'] ;?></span><br><?php echo $row['state']?> </p>
                    </div>
                         </div>
                    <div class="row">
                    <div class="bio-row">
                        <p> <?php echo $lang['city'] ;?> : <?php echo $row['city'] ?></p>
                             </div>
                                  </div>
                                  <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['street_address'] ;?></span><br> : <?php echo $row['street_address']?> </p>
                    </div>
                         </div>
                         <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['living'] ;?></span><br> : <?php echo $row['living']?> </p>
                    </div>
                         </div>
                                  
                <div class="bio-row">
                        <p><span><?php echo $lang['bron'] ?> : </span> <br> <?php echo $row['date']?></p>
                    </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="red"><?php echo $lang['the_date_of_activation_of_your_membership'] ;?></h4>
                                <p><?php echo $lang['I-started:-July'] ?> <br> <span> <?php echo $ro['date'];?> </span></p>
                                <p><?php echo $lang['Deadline:-August'] ?> <br> <span><?php echo $ro['dateend'];?> </span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="terques"><?php echo $lang['date_of_join'] ;?></h4>
                                <p><?php echo $lang['I-started:-July'] ?><br> <span><?php echo $row['dateg'];?> </span></p>
                                <p><?php echo $lang['Deadline:-August'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</div>
<?php require_once 'footer.php'?>
