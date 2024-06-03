
<div class="row state-overview">
	<div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $d  = mysqli_query($conn,"SELECT SUM(amount) as amount FROM profits"); 
    $num_inc = mysqli_fetch_assoc($d); 
    //print_r($num_inc[view]);
echo $num_inc['amount'];          ?>
                </h1>
                <p><?php echo $lang['total-profits'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-bars"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php $query = $conn->query("SELECT * FROM categories"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING);
?>
                </h1>
                <p><?php echo $lang['Total-categories'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-bars"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php $query = $conn->query("SELECT * FROM section "); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING);
?>
                </h1>
                <p><?php echo $lang['total-section'] ?></p>
            </div>
        </section>
    </div>
  
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class=" fa fa-thumb-tack"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    <?php $query = $conn->query("SELECT * FROM blog"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?>
                </h1>
                <p><?php echo $lang['total-blogs'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class=" fa fa-thumb-tack"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    <?php $query = $conn->query("SELECT * FROM book"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?>
                </h1>
                <p><?php echo $lang['total-books'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol yellow">
                <i class="fa fa-users"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    <?php $query = $conn->query("SELECT * FROM users"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?>
                </h1>
                <p><?php echo $lang['Total-users'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $query = $conn->query("SELECT * FROM sales"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?>
                </h1>
                <p><?php echo $lang['total-sale'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $vi = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM visit")); 
echo  $vi['total_count']; ?>
                </h1>
                <p><?php echo $lang['total-visits'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $d  = mysqli_query($conn,"SELECT SUM(view) as view FROM book  "); 
    $num_inc = mysqli_fetch_assoc($d); 
    //print_r($num_inc[view]);
echo $num_inc['view'];         ?>
                </h1>
                <p><?php echo $lang['total-view-books'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $d  = mysqli_query($conn,"SELECT SUM(view) as view FROM blog"); 
    $num_inc = mysqli_fetch_assoc($d); 
    //print_r($num_inc[view]);
echo $num_inc['view'];          ?>
                </h1>
                <p><?php echo $lang['total-view-blogs'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $d  = mysqli_query($conn,"SELECT SUM(download) as download FROM book"); 
    $num_inc = mysqli_fetch_assoc($d); 
    //print_r($num_inc[view]);
echo $num_inc['download'];          ?>
                </h1>
                <p><?php echo $lang['Total-book-downloads'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $d  = mysqli_query($conn,"SELECT SUM(download) as download FROM blog"); 
    $num_inc = mysqli_fetch_assoc($d); 
    //print_r($num_inc[view]);
echo $num_inc['view'];          ?>
                </h1>
                <p><?php echo $lang['Total-downloads'] ?></p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    <?php $query = $conn->query("SELECT * FROM comments"); echo filter_var($query->num_rows, FILTER_SANITIZE_STRING); ?>
                </h1>
                <p><?php echo $lang['total-comments'] ?></p>
            </div>
        </section>
    </div>
    
</div>

<!--state overview end-->
<div class="row">
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(1).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(3).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
</div>

