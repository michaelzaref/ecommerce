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
        
    </div>
<div class="row">
        <div class="d-none d-md-block col-3 c-side rounded">
           
            </div>

<div class="col-lg-9 col-md-9 col-sm-12">
<div style="height:30rem ;" class=" d-flex ">



</div>
</div>
<?PHP 
include('db.php');
if(isset($_GET['id']) and isset($_SESSION['email'])){
    $get="SELECT * FROM `product` WHERE `trader` ='".$_SESSION['email']."'"; 
    $run=mysqli_query($conn, $get);
    if(mysqli_fetch_array($run)['trader']==$_SESSION['email']){

   
        $get = "DELETE FROM `product` WHERE `id` = '".$_GET['id']."'";

        if(mysqli_query($conn, $get))
        {
            echo '<script type="text/javascript">
           window.location = "your_products.php"
      </script>';
        
    }
}
}?>
      

<?php

?>
    



<script src="js/js.js" ></script>
<script src="js/all.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>