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
        

    <div id="content" class="col-lg-9 col-md-9 col-sm-12 " >
    <table class="table caption-top "  >
    <p class="d-flex justify-content-center align-items-center">your cart :</p>
    <?php if(isset($_SESSION['cart-id'])){ ?>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">image</th>
          <th scope="col">discription</th>
          <th scope="col">price</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=1;
        $cart="SELECT `id` FROM `cart_".$_SESSION['cart-id']."`";
        $run_cat_i = mysqli_query($conn, $cart);
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
        <tr>
          <th scope="row"><?php echo $i;?></th>
          <td><?php echo $name;?></td>
          <td><img style="width: 5rem;" src="images/<?php echo $img;?>" alt="img"></td>
          <td><?php echo $disc;?></td>
          <td><?php echo $price;?>$</td>
          <td><a href="delete_from_cart.php?id=<?php echo($id); ?>" class="btn main-btn">delete</a>   </td>
        </tr>
        <?php
         }
        $i++;}?>
      </tbody>
</table>
    </div> 
    
    
</div>
<?php
    }else{
      echo '<script type="text/javascript">
      window.location = "login.php"
      </script>';
    }
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