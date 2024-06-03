<?php require_once 'header.php' ?>

    
    
<?php
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
	echo "stop eerore 404";
	header("Location: ../404.php");
	exit;
}
$namesite = $lang['namesite'];
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));
$idbook = $_POST['id'];
if(isset($idbook)){
$book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idbook' ")); 
}else{
	$idbook = $_POST['idbook'];
$book = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM book where id='$idbook' ")); 
	}

if (isset($_POST['reg_user'])) {
}
?>
	<?php
$max_image = $stm['max_image'];
$max_file = $stm['max_file'];
$status = $stm['auto_post'];
$iduser = $row['id'];
$username = $row['username'];
$a = $_POST['reg_user'];
   if(isset($a)) {
                   $name = $_POST['name'];
                   if (empty($name)) { array_push($errors, "name book is required"); }
                   $name = filter_var($name,FILTER_SANITIZE_STRING);
                   
                      $author = $_POST['author'];
                      $author = filter_var($author,FILTER_SANITIZE_STRING);
                      $title = $_POST['title'];
                      if(!empty($title)){
                      	$title = filter_var($title,FILTER_SANITIZE_STRING);
                      $title = str_replace(array("",' '),"-",$title);
                      $title .= ".html";
                      	}
                      else{
                      	$title = $name .".html";
                           $title = str_replace(array(" ",'  '),"-",$title) ;
                      	}
                    $pay = $_POST['pay'];
                    $price = $_POST['price'];
if($pay == 1){
	$price = $_POST['price'];
	$price = filter_var($price,FILTER_SANITIZE_NUMBER_INT);
	$price = str_replace(array("+",'-'),"",$price);
                    	}
                    else{
                    	$price = 0;
                    	}
                    $pay = $_POST['pay'];
                   $summary = $_POST['summary'];
                   if (empty($summary)) { array_push($errors, "summary book is required"); }
                   $summary = filter_var($summary,FILTER_SANITIZE_STRING);
                   $subject = $_POST['subject'];
                   if (empty($subject)) { array_push($errors, "subject book is required"); }
                   $date_create = $_POST['date_create'];
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
                   
                   $version = $_POST['version'];
                   $version = filter_var($version,FILTER_SANITIZE_STRING);
                   $publisher = $_POST['publisher'];
                   $publisher = filter_var($publisher,FILTER_SANITIZE_STRING);
                   $book_format = $_POST['book_format'];
                   $book_format = filter_var($book_format,FILTER_SANITIZE_STRING);
                   $edition_language = $_POST['edition_language'];
                   $edition_language = filter_var($edition_language,FILTER_SANITIZE_STRING);
                $isbn = $_POST['isbn'];
                   $isbn = filter_var($isbn,FILTER_SANITIZE_STRING);
                   $idsbook = $_POST['idbook'];
      
                
	
                   //book img
                  
                   if(!empty($_FILES['image']['name'])){
                   $imgName = $_FILES['image']['name'];
	$imgTmpName =$_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	$imgError = $_FILES['image']['error'];
	$imgExt = explode('.', $imgName);
    
	$actualFileExt = strtolower(end($imgExt));
	$imgName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) ."-" . $namesite ."." . $actualFileExt;
	$allowed = array('jpg','jpeg','png');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < $max_image) {
				$fileDestination = '../upload/images/book/'. $imgName;
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
   	$imgName = $book['image'];
   	}
	//uploadbook
	if(!empty($_FILES['book']['name'])){
                   $bookName = $_FILES['book']['name'];
	$bookTmpName =$_FILES['book']['tmp_name'];
	$bookSize = $_FILES['book']['size'];
	$bookError = $_FILES['book']['error'];
	$bookExt = explode('.', $bookName);
    
	$bookactualFileExt = strtolower(end($bookExt));
	$bookName = random_int(4,56). base64_encode("yk") . str_shuffle("oneplus") . rand(1,100000) . "-" . $namesite . "-" . $_FILES['book']['name'] ."." . $bookactualFileExt ;
	$bookallowed = array('pdf','text','txt');

	if (in_array($bookactualFileExt, $bookallowed)) {
		if ($bookError === 0) {
			if ($bookSize < $max_file) {
				$bookfileDestination = '../upload/book/'. $bookName;
				move_uploaded_file($bookTmpName, $bookfileDestination);
				
				} else {
				echo $lang['the_book_size_is _too_large'];
			}
		}else{
			echo $lang['line_to_raise_the_book'];
		}
	}else {
			echo $lang['book_type_is_unknown'];
	}
	}
				else{
   	$bookName = $book['location'];
   	}
		$sql = "UPDATE book set name='$name',title='$title',image='$imgName',location='$bookName',subject='$subject',summary='$summary',author='$author',version='$version',date_create='$date_create',tag='$tag',keywords='$keywords',categories='$categories',section='$section',type_book='$pay',price='$price',username='$username',iduser='$iduser',status='$status',isbn='$isbn',book_format='$book_format',edition_language='$edition_language',publisher='$publisher' where id='$idsbook' ";

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
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['edit_book'] ?></h3>
                    <span style="font-weight: bold"><?= isset($_SESSION['extError']) ? $_SESSION['extError'] : ''?></span>
                    <span style="font-weight: bold"><?= isset($_SESSION['postInsert']) ? $_SESSION['deposit'] : ''?></span>
                </header>
                <div class="card-body">
                	<b><?php echo $lang['edit_book'] ;?></b>
                <p></p>
              <p><?php include('../errors.php'); ?></p>
                    <form action="" method="POST" enctype="multipart/form-data">
<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['name_book'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name" placeholder="<?php echo $lang['name_book'] ?>" name="name" dir="auto" value="<?php echo $book['name'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['title_short'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tilte" placeholder="<?php echo $lang['title_short'] ?>" name="title" dir="auto" value="<?php echo $book['summary'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_author" class="col-sm-3 col-form-label"><b><?php echo $lang['name_author'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name_author" placeholder="<?php echo $lang['name_author'] ?>" name="author" dir="auto" value="<?php echo $book['author'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="version" class="col-sm-3 col-form-label"><b><?php echo $lang['version_book'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="version" placeholder="<?php echo $lang['version_book'] ?>" name="version" dir="auto" value="<?php echo $book['version'] ;?>">
                                	     <input type="hidden" class="form-control" name="idbook" value="<?php echo $book['id'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><b><?php echo $lang['date_create_book'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="date"  class="form-control" id="date" name="date_create" value="<?php echo $book['date_create'] ;?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['section'] ;?></b></label>
                            <div class="col-sm-9">
                                <select name="section" id="sr" class="form-control">
                                <?php	$sql = "SELECT * FROM section where status='1' ";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
  	?>
                                    <option value="<?php echo $row['id'] ;?>" <?php if($row['id'] == $book['section']){ echo 'selected'; }?>><?php echo $row['name'] ;?></option>
                                    </option>
                                    <?php
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
                                    <option value="<?php echo $row['id'] ;?>" <?php if($row['id'] == $book['categories']){ echo 'selected'; }?>><?php echo $row['name'] ;?></option>
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
                                	<?php echo $book['summary'] ;?>
                                </textarea>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['Content'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="subject" id="" cols="30" rows="10" class="summernote" dir="auto">
                                	<?php echo $book['subject'] ;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edbo" class="col-sm-3 col-form-label"><b><?php echo $lang['edition_language'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="edbo" placeholder="<?php echo $lang['edition_language'] ;?>" name="edition_language" dir="auto" value="<?php echo $book['edition_language'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="book_format" class="col-sm-3 col-form-label"><b><?php echo $lang['book_format'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="book_format" placeholder="<?php echo $lang['book_format'] ;?>" name="book_format" dir="auto" value="<?php echo $book['book_format'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isbn" class="col-sm-3 col-form-label"><b><?php echo $lang['ISBN'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="isbn" placeholder="<?php echo $lang['ISBN'] ;?>" name="isbn" dir="auto" value="<?php echo $book['isbn'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><b><?php echo $lang['publisher'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="publisher" placeholder="<?php echo $lang['publisher'] ;?>" name="publisher" value="<?php echo $book['publisher'] ;?>" dir="auto">
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><b><?php echo $lang['Tagged'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="keywords"  class="form-control" id="keywords" placeholder="keywords" name="keywords" dir="auto" value="<?php echo $book['keywords'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-3 col-form-label"><b><?php echo $lang['tag'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="tag" placeholder="<?php echo $lang['tag'] ?>" name="tag" dir="auto" value="<?php echo $book['tag'] ;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                        	
                            <label for="skil" class="col-sm-3 col-form-label"><b><?php echo $lang['type_book'] ;?></b></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pay" id='keyword'>
                                <option value="0"><?php echo $lang['free'] ;?></option>
        	<option value="1"><?php echo $lang['pay'] ;?></option>
                          </select>
                                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><b><?php echo $lang['enter_price'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number"  class="form-control" id="name" placeholder="<?php echo $lang['enter_price'] ?>" name="price" dir="auto">
                            </div>
                        </div>
   
                        <div class="form-group row">
                            <div class="col-sm-3">
                            	<div class="img-box bg-primary" style="display: inline-block">
            <img src="../upload/images/book/<?php echo $book['image']?>" alt="" class="img-fluid">
        </div>
                                <b><?php echo $lang['image_app'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['file'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="book">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="img-box bg-primary" style="display: inline-block">
                            	<?php
                            if(!empty($book['location'])){ ?>
            <img src="../upload/pdf.png" alt="" class="img-fluid">
            <?php } ?>
        </div>
                        </fieldset>
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