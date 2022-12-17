<?php
include('db.php');
session_start();
$sql = "INSERT INTO `comments`(`product`, `name`, `date`, `time`, `comment`, `email`) 
VALUES ('".$_GET['id']."','".$_SESSION['name']."','".date("Y/m/d")."','".date("h:i:sa")."','".$_GET['comment']."','".$_SESSION['email']."')";

print_r($_GET);
echo $sql;


// product.php?id=3
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
           window.location = "product.php?id='.$_GET["id"].'"
</script>';
}else{
    echo 'error';
}

?>