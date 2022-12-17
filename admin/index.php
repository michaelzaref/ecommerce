<?PHP session_start();
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
    
    if($_SESSION['admin']=="true"){
        include('includes/navbar.php');
    ?>
    

<div style="min-height: calc(100vh - 155px);" class="row" id="row">
    
        <?php 
            include('includes/side.php');
            $users ="SELECT COUNT(*) FROM users;";
            $no_users =mysqli_fetch_array(mysqli_query($conn, $users));

            $products ="SELECT COUNT(*) FROM product;";
            $no_products =mysqli_fetch_array(mysqli_query($conn, $products));

            $active_users ="SELECT COUNT(DISTINCT email)
            FROM sessions";
            $no_active_users =mysqli_fetch_array(mysqli_query($conn, $active_users));

        ?>
        

    <div id="content" class="col-lg-9 col-md-9 col-sm-12">
        <div class="row" id="row">
                <button class="shadow  d-flex col-3 m-3 justify-content-center btn align-items-center" style="border-width: 2px; border-color: #433f6c; border-radius: 10px; height: 20vh; background-color: #e6dadd;">
                    no. of users : <br>
                    <?php echo $no_users[0];?>
                </button>
                <button class="shadow  d-flex col-3 m-3 justify-content-center btn align-items-center" style="border-width: 2px; border-color: #433f6c; border-radius: 10px; height: 20vh; background-color: #e6dadd;">
                    active users : <br>
                    <?php echo $no_active_users[0];?>
                </button>
            
                <button class="shadow  d-flex col-3 m-3 justify-content-center btn align-items-center" style="border-width: 2px; border-color: #433f6c; border-radius: 10px; height: 20vh; background-color: #e6dadd;">
                    no. of products : <br>
                    <?php echo $no_products[0];?>
                </button>
                
        </div>
    </div> 
    
    
</div>
<?php
    include('includes/footer.php');
}else{
    header("Location: login.php");
}
?>




    



<script src="js/all.min.js" ></script>
<script src="js/js.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>