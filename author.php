<?php
require_once 'header.php';
session_start();

     ?>
<?php
require_once 'nav.php';
     ?>     	
    
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2 dir="auto"><i class="fa fa-star bg-orange"></i><?php echo $lang['author_by'] ;?> <?php echo $author['username'] ;?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home'] ;?></a></li>
                            <li class="breadcrumb-item"><a href="author.php?id=<?php echo $author['id'] ;?>"><?php echo $lang['author'] ;?></a></li>
                            <li class="breadcrumb-item active"><?php echo $author['name'] ;?></li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title" dir="auto"><?php echo $lang['about_author'] ;?></h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/images/users/<?php echo $author['image'] ;?>" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4 dir="auto"><a href="author.php?<?php echo $author['id'] ;?>"><?php echo $author['name'] ;?></a></h4>
                                        <p dir="auto"><?php echo $lang['about_me'] ;?> <a href="<?php echo $author_link['web'] ;?>"><?php echo $lang['visit_my_website'] ;?></a> <?php echo $author['bio'] ;?></p>

                                        <div class="topsocial">
                                            <a href="<?php echo $author_link['facebook'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="<?php echo $author_link['youtube'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="<?php echo $author_link['pinterest'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="<?php echo $author_link['twitter'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="<?php echo $author_link['Instagram'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="<?php echo $author_link['web'] ;?>" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">
                            	  <?php  if($a == "yes"){
       
}else{ ?>
	<div style="width:350px;height:200px;"> <?php echo $ads['ads1'] ;?></div>
	<?php }
        ?>
                    <div class="blog-list clearfix">
                            	<?php
	$search_keyword = '';
	
	if(isset($idauthor)){
   
    $search_keyword = $idauthor;
}
     define("ROW_PER_PAGE",5);
require_once('db.php');
	$sql =' SELECT * FROM book WHERE iduser LIKE :keyword ORDER BY id DESC ';
	
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
					$per_page_html .= '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '"</a>next</li>';
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
                                                <img src="upload/images/book/<?php echo $row['image'] ;?>" alt="" class="img-fluid" style="width: 450px;height: 350px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4 dir="auto"><a href="single.php?id=<?php echo $row['id'] ;?>" title=""><?php echo $row['name'] ;?></a></h4>
                                        <p dir="auto" dir="auto"><?php echo $row['summary'] ;?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Reviews</a></small>
                                        <small><a href="index.php?tag=<?php echo $row['date'] ;?>" title=""><?php echo $row['date'] ;?></a></small>
                                        <small><a href="author.php?id=<?php echo $author['id'] ;?>" title="">by <?php echo $author['username'] ;?></a></small>
                                        <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i><?php echo " " . $row['view'] ;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                	<hr class="invis">

<?php
}
}
?>
                                                                                           
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                       <?php echo $per_page_html; ?>
                                        <li class="page-item" style="display: none;">
                                          <a class="page-link" href="#" style="display: none;"><?php echo $lang['next'] ;?></a>  
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                
 <!-- include sidebar-->
	<?php require_once 'sidebar.php';?>
		<!-- end sidebar-->
<!-- include footer-->
	<?php require_once 'footer.php';?>
        