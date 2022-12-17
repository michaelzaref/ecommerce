<section class=" mx-3">
<div class="row">

<?php
include('db.php');
function get_words($sentence, $count =7 ) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    echo $matches[0];
  }

if(isset($_GET['search'])){
    echo'<h5 class="ms-5 card-title">results for : '.$_GET["search"].'</h5>';
    $get_cat_i = "SELECT * FROM `product` WHERE `name`LIKE '%".$_GET['search']."%';";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i)){
         $name = $row_cat_i['name'];
         $disc = $row_cat_i['disc'];
         $img = $row_cat_i['image'];
         $price = $row_cat_i['price'];
  ?>
  
    <div class="col col-lg-3 col-md-6 my-1">
        <div class="card ms-1">
            <img src="../images/<?php echo($img); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo($name); ?></h5>
                <p class="card-text"><?php echo($disc); ?></p>
                <p class="card-text">price :  <?php echo($price); ?></p>
                <a href="product.php?id= <?php echo($id); ?>" class="btn main-btn">see more</a>
                
                <a href="add_fav.php?id=<?php echo $id;?>" class="btn main-btn" style="color: white;"><i class="fa-regular fa-bookmark"></i></a>
                <a href="add_cart.php?id=<?php echo $id;?>&count=1" class="btn main-btn" style="color: white;"><i class="fa-solid fa-cart-shopping"></i></a>

            </div>
        </div>
    </div>

<?php
}}else{
?>
<?php



$get_cat_i = "SELECT * FROM `product` WHERE 1";
$run_cat_i = mysqli_query($conn, $get_cat_i);
while($row_cat_i = mysqli_fetch_array($run_cat_i))
{
  $name = $row_cat_i['name'];
  $disc = $row_cat_i['disc'];
  $img = $row_cat_i['image'];
  $price = $row_cat_i['price'];
  $id = $row_cat_i['id'];   

?>

<div class="col col-lg-4 col-md-6 my-1 ">

    <div style="height: 30rem;">
    <div class="card  d-flex justify-content-center align-items-center">
        <img style="height: 13rem; width: 10rem;" src="../images/<?php echo($img); ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo($name); ?></h5>
            <p style="height: 5rem;width: 90%" class="card-text"><?php get_words($disc);  ?></p>
            <p class="card-text">price :  <?php echo($price); ?></p>
            <a href="product.php?id=<?php echo($id); ?>" class="btn main-btn">see more</a>
            <a href="add_fav.php?id=<?php echo $id;?>" class="btn main-btn" style="color: white;"><i class="fa-regular fa-bookmark"></i></a>
            <a href="add_cart.php?id=<?php echo $id;?>&count=1" class="btn main-btn" style="color: white;"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="delete_pro.php?id=<?php echo $id;?>" class="btn main-btn" style="color: white;"><i class="fa-solid fa-trash"></i></a>

        </div>
    </div>
    </div>

</div>

<?php
}}
?>
    
</div>
</section> 