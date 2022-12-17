<?php
include('db.php');
session_start(); 
$del=0;

if(isset($_GET['id']) and isset($_SESSION['cart-id'])){
    // $get = "SELECT * FROM `cart_".$_SESSION['cart-id']."` WHERE `id`='".$_GET['id']."';";
    // echo $get;
    // $id= mysqli_fetch_array(mysqli_query($conn, $get))['session'];

      // echo($session_id);
    
        
        $get = "DELETE FROM `cart_".$_SESSION['cart-id']."` WHERE `id`='".$_GET['id']."';";
        if(mysqli_query($conn, $get))
        {
            echo '<script type="text/javascript">
            window.location = "cart.php"
            </script>';
        }
    }

?>