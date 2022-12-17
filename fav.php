<?PHP session_start();
include('db.php');
function get_words($sentence, $count =7 ) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    echo $matches[0];
  }

?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >
    <title>e-commerce</title>
</head>
<body style="overflow-x: hidden;">

    <?php
        include('navbar.php');
    ?>
    

<div style="min-height: calc(100vh - 155px);" class="row" id="row">
    
        <?php 
            include('side.php');
            
        ?>
        

    <div id="content" class="col-lg-9 col-md-9 col-sm-12">
    <p class="d-flex justify-content-center align-items-center">your favorites :</p>
    <div class="row">
        <?php
        if(isset($_SESSION['id'])){
        $fav="SELECT `id` FROM `fav_".$_SESSION['fav-id']."`";
        $run_cat_i = mysqli_query($conn, $fav);
        while($row_cat_i = mysqli_fetch_array($run_cat_i)){
            $id = $row_cat_i['id'];
            $sql ="SELECT * FROM `product` WHERE `id` =".$id ;
            $row = mysqli_query($conn, $sql);
            while($row_cat_i = mysqli_fetch_array($row)){
                $name = $row_cat_i['name'];
                $disc = $row_cat_i['disc'];
                $img = $row_cat_i['image'];
                $price = $row_cat_i['price'];
                $trader = $row_cat_i['trader'];
            

        ?>
    <div class="col col-lg-4 col-md-6 my-1 ">

<div style="height: 30rem;">
<div class="card  d-flex justify-content-center align-items-center">
    <img style="height: 13rem; width: 10rem;" src="images/<?php echo($img); ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo($name); ?></h5>
        <p style="height: 5rem;width: 90%" class="card-text"><?php get_words($disc);  ?></p>
        <p class="card-text">price :  <?php echo($price); ?></p>
        <a href="product.php?id=<?php echo($id); ?>" class="btn main-btn">see more</a>
        <a href="delete_from_fav.php?id=<?php echo($id); ?>" class="btn main-btn"><i class="fa-solid fa-circle-xmark"></i></a>
    </div>
</div>
</div>

</div>

        
        <?php
         }
}
        }
else{
    echo '<script type="text/javascript">
            window.location = "login.php"
            </script>';
}
?>
       </div> 
    </div> 
    
    
</div>
<?php
    include('footer.php');
?>

<script src="js/all.min.js" ></script>
<script src="js/js.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>