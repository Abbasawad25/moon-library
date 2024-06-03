<?php require_once 'header.php' ?>

    
    
<?php
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
	echo "stop eerore 404";
	header('REFRESH:0.1;url=index.php');
	exit;
}
$namesite = $lang['namesite'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$idblog = $_POST['id'];
if(isset($idblog)){
$blog = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM blog where id='$idblog' ")); 
}else{
	 $idblog = $_POST['idpost'];
$blog = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM blog where id='$idblog' ")); 
	}

if (isset($_POST['reg_user'])) {
}
?>
	<?php
	$idpost = $_POST['idpost'];
	$max_image = $stm['max_image'];
	$max_file = $stm['max_file'];
$status = $stm['auto_post'];
$iduser = $row['id'];
$username = $row['username'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $title_blog = $_POST['title'];
                   if (empty($title_blog)) { array_push($errors, "title_blog book is required"); }
                   $title_blog = filter_var($title_blog,FILTER_SANITIZE_STRING);
                   
                      
                      $title_short = $_POST['title_blog'];
                      if(!empty($title_short)){
                      	$title_short = filter_var($title_short,FILTER_SANITIZE_STRING);
                      $title_short = str_replace(array("",' '),"-",$title_short);
                      $title_short .= ".html";
                      	}
                      else{
                      	$title_short = $title_blog .".html";
                           $title_short = str_replace(array(" ",'  '),"-",$title_short) ;
                      	}
              
                   $summary = $_POST['summary'];
                   if (empty($summary)) { array_push($errors, "summary book is required"); }
                   $summary = filter_var($summary,FILTER_SANITIZE_STRING);
                   $subject = $_POST['subject'];
                   if (empty($subject)) { array_push($errors, "subject book is required"); }
                   
                   $tag = $_POST['tag'];
                   if (empty($tag)) { array_push($errors, "tag book is required"); }
                   $tag = filter_var($tag,FILTER_SANITIZE_STRING);
                   $keywords = $_POST['keywords'];
                   if (empty($keywords)) { array_push($errors, "keywords book is required"); }
                   $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);
   
                      $categories = $_POST['categories'];
                      if (empty($categories)) { array_push($errors, "categories is required"); }
 $categories = filter_var($categories,FILTER_SANITIZE_NUMBER_INT);
                      $section = $_POST['section'];
                      if (empty($section)) { array_push($errors, "section is required"); }
 $section = filter_var($section,FILTER_SANITIZE_NUMBER_INT);            
                   
                   
                   //book img
                  
                   if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = "logo" ."." . $actualFileExt ;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < $max_image) {
				$fileDestination = '../upload/images/blog/'. $imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
				} else {
				echo $lang['the_image_size_is _too_large'];
			}
		}else{
			echo $lang['line_to_raise_the_image'];
		}
	}else {
			echo $lang['image_type_is_unknown'];
	}
	}
				else{
   	$imgName = $blog['image'];
   	}
	
	
		$sql = "UPDATE blog set title='$title_blog',title_blog='$title_short',summary='$summary',content='$subject',tag='$tag',keywords='$keywords',image='$imgName',cat_id='$categories',section='$section',iduser='$iduser',username='$username' where id='$idpost' ";

			if ($conn->query($sql) === TRUE) {
?>
	<script>alert("<?php echo $lang['it_was_successfully'] ;?>")</script>
	<?php
$last_id = $conn->name;
   
} else {
	?>
		<script>alert("<?php echo $lang['This-problem-has-happened-please-retry'] ;?>")</script>
		<?php
  echo "Error: " . $sql . "<br>" . $conn->error;
}
			
	     }          
   ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['edit_blog'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['edit_blog'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_blog'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_book'] ?>" name="title" dir="auto" value="<?php echo $blog['title'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title_short'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tilte" placeholder="<?php echo $lang['title_short'] ?>" name="title_blog" dir="auto" value="<?php echo $blog['title_blog'] ;?>">
                                	<input type="hidden" class="form-control" name="idpost" value="<?php echo $blog['id'] ;?>">
                            </div>
                        </div>
                      
                        
                                	     
                            
                        
                        
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['section'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="section" id="sr" class="form-control">
                                <?php	$sql = "SELECT * FROM section  where status='1' ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  
  	?>
                                    <option value="<?php echo $row['id'] ;?>" <?php if($row['id'] == $blog['section']){ echo 'selected'; }?> ><?php echo $row['name'] ;?></option>
                                    </option>
                                   <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                                                                                           </select>
                                    </div>
                        </div>
                        <div class="form-group row">
                        	
                            <label for="categories" class="col-sm-3 col-form-label"><b><?php echo $lang['categorie'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="categories" id="categories" class="form-control">
                                <?php	$sql = "SELECT * FROM categories  where status='1' ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 1;
                  while($row = mysqli_fetch_array($result)){ 
/* if ($result->num_rows >= 0) {
 
  while($row = $result->fetch_assoc()) { */
  	?>
  	?>
                                    <option value="<?php echo $row['id'] ;?>" <?php if($row['id'] == $blog['cat_id']){ echo 'selected'; }?>><?php echo $row['name'] ;?></option>
                                    </option>
                                      <?php
  }
}
}
 else {
  echo "0 results";
 }              

?>
                                                                                                           </select>
                                    </div>
                        </div>
                            <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['summary'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="summary" id="" cols="30" rows="10"  dir="auto">
                                	<?php echo $blog['summary'] ;?>
                                </textarea>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="subject" id="" cols="30" rows="10" class="summernote" dir="auto">
                                	<?php echo $blog['content'] ;?>
                                </textarea>
                            </div>
                        </div>
                        
                     <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="keywords"  class="form-control" id="keywords" placeholder="keywords" name="keywords" dir="auto" value="<?php echo $blog['keywords'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-3 col-form-label"><b><?php echo $lang['tag'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tag" placeholder="<?php echo $lang['tag'] ?>" name="tag" dir="auto" value="<?php echo $blog['tag'] ;?>">
                            </div>
                        </div>
                        
   
                        <div class="form-group row">
                            <div class="col-sm-3">
                            	<div class="img-box bg-primary" style="display: inline-block">
            <img src="../upload/images/blog/<?php echo $blog['image']?>" alt="" class="img-fluid">
        </div>
                                <b><?php echo $lang['image_app'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="reg_user"  class="text-white"><?php echo $lang['send'];?></button>
                    </form>
                </div>
            </section>

        </div>
    </div>
    
<?php require_once 'footer.php' ?>