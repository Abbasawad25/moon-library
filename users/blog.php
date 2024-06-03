<?php require_once 'header.php' ?>
	<?php
	$a = $_POST['reg_user'];
	$iduser = $row['id'];
	$max_image = $stm['max_image'];
	$username= $row['username'];
   if(isset($a)) {
                   $status = $_POST['status'];
                   
                   $title_blog = $_POST['title_blog'];
                   $title_blog = filter_var($title_blog,FILTER_SANITIZE_STRING);
                   $tag = $_POST['tag'];
                   $tag = filter_var($tag,FILTER_SANITIZE_STRING);
                   $content = $_POST['content'];
                   
                   $keywords = $_POST['keywords'];
                   $keywords = filter_var($keywords,FILTER_SANITIZE_STRING);
                   $name = $row['username'];
                   $iduser = $row['id'];
                   $summary = $_POST['summary'];
                   $summary = filter_var($summary,FILTER_SANITIZE_STRING);
                   $title = $_POST['title'];
                      if(!empty($title)){
                      	$title = filter_var($title,FILTER_SANITIZE_STRING);
                      $title = str_replace(array("",' '),"-",$title);
                      $title .= ".html";
                      	}
                      else{
                      	$title = $title_blog .".html";
                           $title = str_replace(array(" ",'  '),"-",$title_blog) ;
                      	}
                      
   
                      $categories = $_POST['categories'];
                      if (empty($categories)) { array_push($errors, "categories is required"); }
 $categories = filter_var($categories,FILTER_SANITIZE_NUMBER_INT);
                      $section = $_POST['section'];
                      if (empty($section)) { array_push($errors, "section is required"); }
 $section = filter_var($section,FILTER_SANITIZE_NUMBER_INT);            
                
                   
                   $type = $_POST['type'];
                $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."." . $actualFileExt ;
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
	
                $sql = "INSERT INTO blog (username,title,content,tag,keywords,status,type,image,summary,cat_id,section,title_blog,iduser)
VALUES ('$name','$title_blog','$content','$tag','$keywords','$status','$type','$imgName','$summary','$categories','$section','$title','$iduser')";
//

//
if ($conn->query($sql) === TRUE) {
  echo $lang['it_was_successfully'];
$last_id = $conn->name;
 header('REFRESH:0.1;url=../blog.php');
  echo $lang['it_was_successfully'] . $last_id;
  
} else {
  echo "Error: " . $sql . "<br>" . $lang['This-problem-has-happened-please-retry'];
}

   }
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
                    <form action="blog.php" method="POST" enctype="multipart/form-data">
                    
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title-p'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['title-post'] ?>" name="title_blog" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title_short'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tilte" placeholder="<?php echo $lang['title_short'] ?>" name="title" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary" class="col-sm-3 col-form-label"><b><?php echo $lang['summary'] ;?></b></label>
                            <div class="col-sm-9">
                                <textarea name="summary" id="" cols="30" rows="10"  dir="auto">
                                </textarea>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                             <textarea name="content" id="elm1" cols="30" rows="10" class="summernote" dir="auto">
                                </textarea>
                            </div>
                        </div>
                   
                       
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Tagged'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="keywords" class="form-control" dir="auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['tag'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="tag" class="form-control" dir="auto">
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
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
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
                                <?php $sql = "SELECT * FROM categories  where status='1' ORDER BY id DESC";
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
                                    <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
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
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" >
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
    <script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Othercharts js-->
		<script src="assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--ckeditor js-->
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>

		<!--Scripts js-->
		<script src="assets/js/formeditor.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
<?php require_once 'footer.php' ?>