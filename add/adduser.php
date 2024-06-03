<?php require_once 'header.php' ?>

 
<?php 
  
?>
 
<?php 
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users order by id DESC "));
$account_number = $ro['account_number'] + 1;
 if(isset($a) and $row['role'] == 1 or $row['role'] == 2) {
if (isset($_POST['send'])) {
 
// receive all input values from the form
 
$username = mysqli_real_escape_string($conn, $_POST['username']);
 
$email = mysqli_real_escape_string($conn, $_POST['email']);
 
$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
 
$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
 $name = mysqli_real_escape_string($conn, $_POST['name']);
$num = $_POST['num'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$co = $_POST['country'];
$site = $_POST['city'];
$role_user = $_POST['role_user'];

// form validation: ensure that the form is correctly filled ...
 
// by adding (array_push()) corresponding error unto $errors array
 
if (empty($username)) { array_push($errors, "اسم المستخدم مطلوب"); }
 
if (empty($email)) { array_push($errors, "Email is required"); }
 
if (empty($password_1)) { array_push($errors, "Password is required"); }
if (empty($name)) { array_push($errors, "اسمك مطلوبك"); }
if (empty($date)) { array_push($errors, "تاريخ ميلادك"); }
if (empty($sex)) { array_push($errors, "الجنس او النوع مطلوب"); }
if (empty($co)) { array_push($errors, "الدولة مطلوبة"); }

if (empty($num)) { array_push($errors, "رقم الهاتف مطلوب"); }
 if (empty($site)) { array_push($errors, " اسم مدينتك"); }
 if (empty($role_user)) { array_push($errors, "nav is required"); }
if ($password_1 != $password_2) {
 
array_push($errors, "The two passwords do not match");
 
}
 
// first check the database to make sure
 // filter
$name = filter_var($name,FILTER_SANITIZE_STRING);
$username = filter_var($username,FILTER_SANITIZE_STRING);
$password = filter_var($password,FILTER_SANITIZE_STRING);
$email = filter_var($email,FILTER_SANITIZE_STRING);
$co = filter_var($co,FILTER_SANITIZE_STRING);
$num = filter_var($num,FILTER_SANITIZE_STRING);
$site = filter_var($site,FILTER_SANITIZE_STRING);
 if (filter_var($email,FILTER_VALIDATE_EMAIL) == false) { array_push($errors, " البريد الالكتروني ليس صحيح"); }
 $username = str_replace(" ","",$username);
 $username = strtolower($username);
 if (strlen($username) >= 20) { array_push($errors,  "اسم المستخدم طويل يجب ان يكون اقل من 20"); }
// a user does not already exist with the same username and/or email

 
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
 
$result = mysqli_query($conn, $user_check_query);
 
$user = mysqli_fetch_assoc($result);
 
if ($user) { // if user exists
 
if ($user['username'] === $username) {
 
array_push($errors, "إسم المستخدم موجد الرجاء كتابة اسم غيره");
 
}
 
if ($user['email'] === $email) {
 
array_push($errors, "هذا البريد موجد بالفعل الرجاء كتابة بريد آخر");
 
}
 
}
 $new = date('Y');
// Finally, register user if there are no errors in the form
 if($new - $date >= 10 ){
if (count($errors) == 0) {
 
$password = md5($password_1);//encrypt the password before saving in the database
 

 
$query = "INSERT INTO users(username,email,password,date,name,country,num,sex,city,role,money,nav,checkuser,account_number)
VALUES('$username','$email', '$password','$date','$name','$co','$num','$sex','$site','$role_user','1','1','0','$account_number')";

mysqli_query($conn, $query);
//mysqli_query($conn, $in);
 
 
$_SESSION['username'] = $username;
 
$_SESSION['success'] = "You are now logged in";
 
header('location: index.php');
 
}
} //end if else
else {
 	array_push($errors, "يجب ان يكون عمرك أكبر 13 سنة");
} 
//end else date
 
}
}else{
}?>
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['add_user'] ;?></h3>
                <span style="font-weight: bold"></span>
                <span style="font-weight: bold;color: red"></span>
            </header>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo $lang['name'] ;?></label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="inputEmail3" placeholder="<?php echo $lang['name'] ;?>" name="name" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label"><?php echo $lang['username'] ;?></label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="username" placeholder="<?php echo $lang['username'] ;?>" name="username" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Email3" class="col-sm-3 col-form-label"><?php echo $lang['email'] ;?></label>
                        <div class="col-sm-9">
                            <input type="email" required class="form-control" id="Email3" placeholder="<?php echo $lang['email'] ;?>" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number" class="col-sm-3 col-form-label"><?php echo $lang['number'] ;?></label>
                        <div class="col-sm-9">
                            <input type="number" required class="form-control" id="number" placeholder="<?php echo $lang['number'] ;?>" name="num" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label"><?php echo $lang['country'] ;?></label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="country" placeholder="<?php echo $lang['country'] ;?>" name="country" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo $lang['city'] ;?></label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="city" placeholder="<?php echo $lang['city'] ;?>" name="city" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="zain" class="col-sm-3 col-form-label"><b><?php echo $lang['sex'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="1"><?php echo $lang['male'] ?></option>
                                    <option value="2"><?php echo $lang['female'] ?></option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo $lang['bron'] ;?></label>
                        <div class="col-sm-9">
                            <input type="date" required class="form-control" id="date" placeholder="<?php echo $lang['join'] ;?>" name="date" dir="auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"><?php echo $lang['password'] ;?></label>
                        <div class="col-sm-9">
                            <input type="password" required class="form-control" id="password" placeholder="<?php echo $lang['password'] ;?>" name="password_1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Confirm-password" class="col-sm-3 col-form-label"><?php echo $lang['Confirm-password'] ;?></label>
                        <div class="col-sm-9">
                            <input type="password" required class="form-control" id="Confirm-password" placeholder="<?php echo $lang['Confirm-password'] ;?>" name="password_2">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="rolr" class="col-sm-3 col-form-label"><b><?php echo $lang['Role'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="role_user" id="role" class="form-control">
                                    <option value="1"><?php echo $lang['admin'] ?></option>
                                    <option value="2" ><?php echo $lang['supervisor'] ?></option>
                                    <option value="3"><?php echo $lang['edits'] ?></option>
                                    <option value="4" ><?php echo $lang['demo'] ?></option>
                                    <option value="0"><?php echo $lang['user'] ?></option>
                                                                                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label"><b><?php echo $lang['The-status'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="status_user" id="status" class="form-control">
                                    <option value="1"><?php echo $lang['Active'] ?></option>
                                    <option value="0"><?php echo $lang['Inactive'] ?></option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                    
                    
                    

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary btn-block" name="send" value="<?php echo $lang['send'] ;?>">
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<?php
    
?>
<?php require_once 'footer.php' ?>
