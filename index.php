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
    <div id="search" class="d-md-none d-flex justify-content-end">
        <form method="GET" action="index.php" style="width: 85%;" class="  d-flex  align-items-center me-1 mt-1">
            <input class="form-control rounded-pill me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn main-btn rounded-pill" type="submit"><i class="fa-solid fa-magnifying-glass ps-3 pe-3"></i></button>
        </form>
    </div>
    
<div style="min-height: calc(100vh - 155px);" class="row" id="row">
        
            <?php 
                include('side.php');
            ?>
            

        <div id="content" class="col-lg-9 col-md-9 col-sm-12">
            <?php 

                if(isset($_GET['search'])){
                    include('section.php');

                }else{
                    include('landing.php');
                    include('section.php');
                }
                
            ?>
        </div> 
        
        
    </div>

    <div class="my-3" ></div>

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