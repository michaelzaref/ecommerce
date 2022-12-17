<?PHP session_start(); 
$del=0;
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
    <link href="css/product.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>e-commerce</title>
</head>
<body>
    <div class="row">
        <?php
            include('includes/navbar.php');
        ?>
    </div>
<div class="row">
        <div class="d-none d-md-block col-3 c-side rounded">
            <?php 
                include('includes/side.php');
            ?>
            </div>

<div class="col-lg-9 col-md-9 col-sm-12">
<div style="height:30rem ;" class=" d-flex ">



</div>
</div>
<?PHP 
include('includes/db.php');
if(isset($_GET['id']) and $_SESSION['admin']=="true"){
    $get = "SELECT * FROM `users` WHERE `id`='".$_GET['id']."';";
    $id= mysqli_fetch_array(mysqli_query($conn, $get))['session'];

      // echo($session_id);
    
        
        $get = "DELETE FROM `users` WHERE `id` = '".$_GET['id']."'";

        if(mysqli_query($conn, $get))
        {
            echo '<script type="text/javascript">
           window.location = "all_users.php"
      </script>';
        
    }
}?>
      

<?php

    include('includes/footer.php');
?>
    



<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>