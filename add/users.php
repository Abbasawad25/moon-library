<?php
include"header.php";
if($row['role'] == 1 or $row['role'] == 2 or $row['role'] == 5){
	}
	else{
		echo "<center> غير مسموح لك بالدخول</center>";
		header('REFRESH:0.1;url=index.php');
		exit;
		}
if($row['role'] == 1 or $row['role'] == 2 ){
if(isset($_GET['delete'])){   
   $q="DELETE FROM users where id=".$_GET['delete'];
          if(mysqli_query($conn,$q)){
      
						  echo "تم الحذف";
            }
            
           }
              
          else{
              echo "فشل حذف المستخدم";
             
          }
          
          #updateusers
          $a = $_POST['reg_user'];
          if(isset($a)) {
          	$name = $_POST['name'];
          $password = $_POST['password'];
          $role = $_POST['role'];
          $money = $_POST['money'];
          $id = $_POST['id'];
          $checkuser = $_POST['checkuser'];
          $sq = "UPDATE users set  money='$money',role='$role',checkuser='$checkuser' where id='$id' ";
        if ($conn->query($sq) === TRUE) {
  echo "New record created successfully";
$last_id = $conn->name;

  echo "New record created successfully. Last inserted ID is: " . $last_id;
  
} else {
  echo "Error: " . $sq . "<br>" . $conn->error;
}
          }
           }
?>
<ol class="breadcrumb bg-warning">
<li class="breadcrumb-item">
<a href="index.html">Dashboard</a>
</li>
<li class="breadcrumb-item active">إدارة المستخدمين</li>
&nbsp;&nbsp;&nbsp;&nbsp;
<li><form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="users.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
          <input type="search" class="form-control"  name="search" value="" id="keyword" placeholder="Search file..." >
          <div class="input-group-append">
            <button class="btn btn-warning" type="submit" name="keywor">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
</li>
</ol>
<div class="row">
        <div class="col-lg-12">
            <section class="card">
            	<header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;">اضافة حساب درويد</h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['postInsert'] : ''?></span>
                </header>
                <div class="card-body">
                    <form action="users.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['username'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="co" class="col-sm-3 col-form-label"><b><?php echo $lang['Country'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="country" id="" class="form-control">
                                    <option value="السودان">السودان</option>
                                    </option>
                                    <option value="مصر">مصر</option>
                                    </option>
                                    <option value="لبيبا">ليبيا</option>
                                    <option value="العراق">العراق</option>
                                    </option>
                                    <option value="اليمن">اليمن</option>
                                    </option>
                                    <option value="سوريا">سوريا</option>
                                    <option value="المغرب">المغرب</option>
                                    </option>
                                    <option value="تونس">تونس</option>
                                    </option>
                                    <option value="الجزائر">الجزائر</option>
                                    <option value="قطر">قطر</option>
                                    </option>
                                    <option value="البحرين">البحرين</option>
                                    </option>
                                    
                                    <option value="تركيا">تركيا</option>
                                    </option>
                                    <option value="السعودية">السعودية</option>
                                    </option>
                                    <option value="الكويت">الكويت</option>
                                    </option>
                                    <option value="فلسطين">فلسطين</option>
                                    </option>
                                   
                                </select>
                            </div>
                        </div>
                      <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['name'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" dir="auto">
                            </div>
                        </div>
                    <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['email'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['city'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                        	<label for="2" class="col-sm-3 col-form-label"><b><?php echo $lang['site'] ;?></b></label>
                          <div class="col-sm-9">
                                <select name="sat" id="type" class="form-control">
                                    <option value="1"><?php echo $lang['Active'] ;?></option>
                                    <option value="0"><?php echo $lang['Inactive'] ;?></option>
                                     <option value="2"><?php echo $lang['block'] ;?></option>
                                     <option value="4"><?php echo $lang['all'] ;?></option>                                                           
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        	<label for="2" class="col-sm-3 col-form-label"><b><?php echo $lang['show'] ;?></b></label>
                          <div class="col-sm-9">
                                <select name="limit" id="type" class="form-control">
                                    <option value="10" <?php if($ro['web'] == 1){ echo 'selected'; }?>> 10</option>
                                    <option value="25" <?php if($ro['web'] == 0){ echo 'selected'; }?> >25</option>
                                     <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >50</option>
                                      <option value="75" <?php if($ro['web'] == 0){ echo 'selected'; }?> >75</option>
                                       <option value="100" <?php if($ro['web'] == 0){ echo 'selected'; }?> >100</option>
<option value="1000">1000</option>
                                    <option value="10000">10000</option>
                                     <option value="50000">50000</option>
                                     <option value="100000">100000</option>                                                           
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['number'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="number" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b>رقم الحساب</b>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="account" class="form-control" dir="auto" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b> تاريخ الميلاد</b>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b>تاريخ الأنضمام</b>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="datenew" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['six'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                            	<select name="sex" id="sex" class="form-control">
                                <option value="أنثى">أنثى</option>
                                    <option value="ذكر"> ذكر</option>
                                     </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-warning btn-block" name="send"  class="text-white">حفظ</button>
                    </form>
                </div>
                </section>

        </div>
    </div>
    
<div class="card mb-3 bg-warning">
            <div class="card-header">
              <i class="fas fa-table"></i>
              إجمالى المستخدمين <?php 
              $k = $_POST['keywor'];
	if(isset($k)){
		
		$search = $_POST['search'];
		$keyword = $_POST['keyword'];
		$dd = $search . $keyword;
		$all = 'WHERE '.'id='.$search .' OR username='.$search .' OR email='.$search .' OR co='.$search; 
}
	elseif(empty($_POST['search']['keyword'])){
		
		$all = '';
}

$query = $conn->query("SELECT * FROM users $all "); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php
if(isset($_GET['q']))
{
$sql ="SELECT * FROM users";

}else
{
  $d ="SELECT * FROM users";

}

		$send = $_POST['send'];
            $limit = 1;
            if(isset($send)){
            	$username = $_POST['username'];
            	$number = $_POST['number'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $sat = $_POST['sat'];
            $numbe =    filter_var($numbr,FILTER_SANITIZE_STRING);
         $limit = filter_var($limit,FILTER_SANITIZE_NUMBER_INT);
         if(filter_var($limit,FILTER_VALIDATE_INT) == false){
         	echo "يرجى أدخال رقم";
         	}
         $date = filter_var($date,FILTER_SANITIZE_NUMBER_INT);
            
            	}
            if($sat == 4){
            	$opt = "!=";
            	}
            else{
            	$opt = "=";
            	}
	$sql = "SELECT * FROM users   where name='%$name%' or checkuser $opt'$sat' or username LIKE '%$username%' OR country LIKE '%country%' AND city LIKE '%city%' or date LIKE '%date%' or sex LIKE '%$sex%' or state LIKE '%$state%' order by id DESC limit $limit";
	
	
 $num = 1;
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){ ?>
    	
            <thead>
                <th>#</th>
                <th><?php echo $lang['image'] ;?></th>
                <th><?php echo $lang['name'] ;?></th>
                
                <th><?php echo $lang['username'] ;?></th>
                <th><?php echo $lang['email'] ;?></th>
                <th><?php echo $lang['number'] ;?></th>
                <th><?php echo $lang['six'] ;?></th>
                <th><?php echo $lang['country'] ;?></th>
                <th><?php echo $lang['city'] ;?></th>
                <th><?php echo $lang['state'] ;?></th>
                <th><?php echo $lang['date_of_pirth'] ;?></th>
                <th><?php echo $lang['amount'] ;?></th>
                <th>الإشعارات</th>
                <th><?php echo $lang['date_of_join'] ;?></th>
                
                <th><?php echo $lang['site'] ;?></th>
                <th><?php echo $lang['role'] ;?></th>
                <th><?php echo $lang['save'] ;?></th>
                <th><?php echo $lang['delet'] ;?></th>            
            </thead>
        <?php while($row = mysqli_fetch_array($result)){
           ?>
 <tr>
 	<form action="users.php" method="POST" enctype="multipart/form-data">
                <td><?php echo $num++;?> <input type="hidden" name="id" value="<?php echo $row['id'];?> "></td>
                <td><i class=\"fas fa-user fa-fw\"></i><img src="../upload/images/users/<?php echo $row['image'];?> " style="border-radius: 15px;width:105px;height:50px;"></td>
                <td><i class=\"fas fa-file fa-fw\"></i><?php echo $row['name'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['username'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['email'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['num'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['sex'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['country'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['city'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['state'];?> </td>
                 <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['date'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['money'];?></td>
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['nav'];?> </td>
                
                <td><i class=\"fas fa-user fa-fw\"></i><?php echo $row['dateg'];?> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><select name="role">
             	<option value="1" <?php if($row['checkuser'] == 1){ echo 'selected'; }?>><?php echo $lang['Active'] ;?></option>
             <option value="0" <?php if($row['checkuser'] == 0){ echo 'selected'; }?>><?php echo $lang['Inactive'] ;?></option>
             <option value="2" <?php if($row['checkuser'] == 3){ echo 'selected'; }?>><?php echo $lang['block'] ;?></option>
             
             </select> </td>
                <td><i class=\"fas fa-user fa-fw\"></i><select name="role">
             	<option value="1" <?php if($row['role'] == 1){ echo 'selected'; }?> ><?php echo $lang['admin'] ;?></option>
             <option value="2" <?php if($row['role'] == 2){ echo 'selected'; }?>><?php echo $lang['supervisor'] ;?> </option>
             <option value="3" <?php if($row['role'] == 3){ echo 'selected'; }?>><?php echo $lang['edits'] ;?></option>
             <option value="4" <?php if($row['role'] == 4){ echo 'selected'; }?>><?php echo $lang['demo'] ;?></option>
             <option value="0" <?php if($row['role'] == 0){ echo 'selected'; }?>><?php echo $lang['user'] ;?></option>
                 
             </select> </td>
                        
                <td><button type="submit" class="btn btn-danger btn-block" name="reg_user"><?php echo $lang['update'] ;?></button></dt>
                
                 </form>
            </tr>
    <?php    } ?>

        </table>
        
<?php
        // Free result set

        mysqli_free_result($result);

    } else{

        echo "No Files found.";

    }

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
 $conn->close(); 

?></table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated Result.</div>
          </div>
          
    
<?php
include"footer.php";
?>
