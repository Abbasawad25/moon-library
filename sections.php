<?php 
            include "header.php"         
 ?>
 	<!-- include footer-->
	<?php require_once 'nav.php';?>

        <?php require_once 'advanced.php';?>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left" dir="auto"><?php echo $lang['the_most_recent'] ;?> <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                
                                    	<?php
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	elseif(isset($_GET['id'])){
    $id = $_GET['id'];
    $search_keyword = $id;
}
     define("ROW_PER_PAGE",2);
require_once('db.php');
	$sql =' SELECT * FROM book WHERE section LIKE :keyword  ORDER BY id DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_GET["page"])) {
		$page = $_GET["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .='<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '"</a>'. $i . '</li>';
				} else {
					$per_page_html .= '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '"</a>' .$lang['The-next']. '</li>';
				}
			}
		}
		
	}
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
        <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php?id=<?php echo $row['id'] ;?>" title="">
                                                <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width: 350px;height: 250px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
                                    <div class="blog-meta big-meta col-md-8">
                                    	
                                        <h4 dir="auto"><a href="single.php?id=<?php echo $row['id'] ;?>" title=""><?php echo $row['name'] ;?></a></h4>
                                        <p dir="auto"><?php echo $row['summary'] ;?></p>
                                        <? 
$idca = $row['categories'];
 $g = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories where id='$idca' ")); 
 ?>    
                                        <small class="firstsmall" dir="auto"><a class="bg-orange" href="tech-category-01.html" title=""><?php echo $g['name'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                  <? 
$iduser = $row['iduser'];
 $ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where id='$iduser' ")); 
 ?>      <small dir="auto"><a href="author.php?id=<?php echo $row['iduser'] ;?>" title=""><?php echo $ro['username'] ;?></a></small>
                                        <small dir="auto"><a href="index.php?tag=<?php echo $row['view'] ;?>" title=""><i class="fa fa-eye"></i><?php echo " " . $row['view'] . " ";?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
<hr class="invis">
               
                                    	
  <?php
		}
	}
	else{
		echo "not found لايوجد";
		}
	?>
                             
                         <!-- end blog-box -->
                                <hr class="invis">

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                            	<!--ads banner-->
                                            	<?php  echo $ads['ads1'] ;?>
                                    <!--            <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                                -->            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
</div>
 </div><!-- end page-wrapper -->            
<hr class="invis">
        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        
                                        
            <?php echo $per_page_html; ?>
            	
            
          
                                        
                                        <li class="page-item" style="display: none;">
                                            <a class="page-link" href="#" style="display: none;"></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                   </div> <!-- end col -->
                        
                        <hr class="invis">

                    
                    <!-- include sidebar -->
	<?php require_once 'sidebar.php';?>
<!-- end sidebar-->
       <!-- include footer-->
	<?php require_once 'footer.php';?>