<?PHP session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/css.css" rel="stylesheet" >
    <link href="css/product.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>e-commerce</title>
</head>
<body>
    <div >
        <?php
            include('includes/navbar.php');
        ?>
    </div>
<div style="min-height: calc(100vh - 155px);" id="row" class="row">
        
            <?php 
                include('includes/side.php');
            ?>
            
            <div id="content" class="col-lg-9 col-md-9 col-sm-12">
            <?PHP 
include('includes/db.php');

if(isset($_GET['id'])){
    $get_cat_i = "SELECT * FROM `product` WHERE `id` = ".$_GET['id'];
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    if($run_cat_i = mysqli_query($conn, $get_cat_i)){
        if($row_cat_i = mysqli_fetch_array($run_cat_i)){
 
        $name = $row_cat_i['name'];
        $disc = $row_cat_i['disc'];
        $img = $row_cat_i['image'];
        $price = $row_cat_i['price'];
        $trader = $row_cat_i['trader'];
        
       
?>
 
    <div class="col-lg-9 col-md-9 col-sm-12">
    <div  class="   row ">
    
    <div class="ms-1 justify-content-center align-items-center col-md-4">
        
        <div class="d-flex justify-content-center align-items-center pt-4">
            <div class="mt-2  justify-content-center align-items-center">
                <img style="height: 10rem; max-width: 12rem;" src="../images/<?php echo($img) ?>" alt="">
                <div class="my-5">
                    <h5 class="text-uppercase mb-0"><?php echo($trader) ?></h5>
                    <h1 class="main-heading mt-0"><?php echo($name) ?></h1>
                    <div class="d-flex flex-row user-ratings">
                        <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                        <h6 class="text-muted ml-1">4/5</h6>
                    </div>
                    <span><?php echo($price) ?> $</span>
                    <p><?php echo($disc) ?></p>
                    <a href="add_fav.php?id=<?php echo $_GET['id'];?>" class="btn main-btn" style="color: white;"><i class="fa-regular fa-bookmark"></i></a>
                    <a href="add_cart.php?id=<?php echo $_GET['id'];?>&count=1" class="btn main-btn" style="color: white;"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
            
        </div>
     
        
    </div> 
    
    <div  class="mt-4 shadow-sm pe-4 ms-4 col col-sm-12 col-md-6">
        <div>
            <div class=""><p>comments</p></div>

<div class="c_comment">
<?php
    $get_cat_i = "SELECT * FROM `comments` WHERE `product`= '".$_GET['id']."'";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i))
    {
      $name = $row_cat_i['name'];
      $comment = $row_cat_i['comment'];
    


?>
<div class="shadow-sm p-1 my-3 rounded c-section">
                <span><?php echo $name; ?></span>
                <p><?php echo $comment; ?></p>
</div> 
<?php
}?>

</div>






             
        </div>
        <div class="mt-5"  style="
    
    bottom: 0;
    
">
        <div class=" input-group mb-3">
            <form action="add_comment.php">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="text" name="comment" class="form-control" placeholder="add comment" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button  class="btn main-btn" type="submit" id="button-addon2">add</button>
            </form>
  
</div>
</div>
    </div>
    
</div>
        
</div> 
        
    

<?php
 }else{
    echo'<div class="col-lg-9 col-md-9 col-sm-12">
    <div style="height:30rem ;" class=" d-flex ">
not found


</div>
    </div>';
 }
        
}

}else{?>
        <div class="col-lg-9 col-md-9 col-sm-12">
    <div style="height:30rem ;" class=" d-flex ">
not found 1


</div>
</div> 
<?php }?>

</div>  
</div> 

<?php

    include('includes/footer.php');
?>


<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js" ></script>
<script src="js/jquery-3.6.1.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script></body>
</html>