<?PHP

session_start();
include('includes/db.php');

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
        include('includes/navbar.php');
    ?>
    
<div style="min-height: calc(100vh - 155px);" class="row" id="row">
    
        <?php 
            include('includes/side.php');
        ?>
        
    <div id="content" class="col-lg-9 col-md-9 col-sm-12">
        

<div class="row">
    <?php
    function get_words($sentence, $count =7 ) {
        preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
        echo $matches[0];
    }


    $get_cat_i = "SELECT * FROM `users` WHERE 1";
    $run_cat_i = mysqli_query($conn, $get_cat_i);
    while($row_cat_i = mysqli_fetch_array($run_cat_i))
    {
    $name = $row_cat_i['name'];
    $disc = $row_cat_i['email'];
    $img = $row_cat_i['picture'];
    $price = $row_cat_i['phone'];
    $id = $row_cat_i['id'];
    ?>
    <div class="col col-lg-4 col-md-6 my-1 ">
        <div style="height: 30rem;">
            <div class="card  d-flex justify-content-center align-items-center">
                <img style="height: 13rem; width: 10rem;" src="../users-images/<?php if($img){echo($img);}else{echo"avatar.png";} ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo($name); ?></h5>
                    <p style="height: 5rem;width: 90%" class="card-text"><?php get_words($disc);  ?></p>
                    <p class="card-text">price :  <?php echo($price); ?></p>
                    <a href="delete_profile.php?id=<?php echo($id); ?>" class="btn main-btn">delete profile <i class="fa-solid fa-trash"></i> </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</div>
    </div> 
    
    
</div>
<?php
    include('includes/footer.php');
?>




    



<script src="js/all.min.js" ></script>
<script src="js/js.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


