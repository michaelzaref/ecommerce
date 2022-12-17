<?PHP session_start();
include('db.php');
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
        <?php 
        ?>
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