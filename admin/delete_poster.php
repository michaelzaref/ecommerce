<?php
include('includes/db.php'); 
session_start();
if(isset($_GET['id']) and $_SESSION['admin']=="true"){
    
$get_cat_i = "DELETE FROM `posters` WHERE `id` ='".$_GET['id']."';";
$run_cat_i = mysqli_query($conn, $get_cat_i);
header("Location: poster.php ");
}
?>