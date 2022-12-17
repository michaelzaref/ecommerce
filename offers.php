<?php
session_start();
include('db.php');
include('func.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >
    <title>your products</title>
</head>
<body>
<div id="container">
    <div class="row">
        <?php
            include('navbar.php');
        ?>
    </div>
    <div id="row" style="min-height: calc(100vh - 155px);" class="c-side-h row">
        
            <?php 
                include('side.php');
            ?>
            
        
        <div id="content"  class="col-lg-9 col-md-9 col-sm-12">

        <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="row">
        <?php

    $get_cat_i = "SELECT * FROM `offers` ";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i))
    {
      $name = $row_cat_i['name'];
      $precent = $row_cat_i['precent'];
      $img = $row_cat_i['img'];
      $code = $row_cat_i['code'];   
      $id = $row_cat_i['id'];
?>

<div class="col col-lg-3 col-md-6 my-2 my-1">
    <div style="height: 30rem;">
    <div class="card ms-1 d-flex justify-content-center align-items-center">
        <img style="height: 13rem; width: 10rem;" src="offers/<?php echo($img); ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo($name); ?></h5>
            <p style="height: 6rem;width: 10rem;" class="card-text">use code :<?php echo "$code";?></p>
            <p class="card-text">up to  :  <?php echo($precent); ?>%</p></div>
    </div>
    </div>

</div>
<?php
}
?>
        </div> 
        
        
    </div>
    </div>
    </div>
    <div >
<?php
    include('footer.php');
?>
</div>
    
</div>
<script src="js/all.min.js" ></script>
<script src="js/js.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>