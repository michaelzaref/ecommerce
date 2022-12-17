<?php
session_start();
include('db.php');
$log = fopen("log.txt", "a");
if(isset($_GET['id']) and isset($_GET['count'])){
    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $sql = "INSERT INTO cart_".$_SESSION['cart-id']." ( id, count)
    VALUES ('".$_GET["id"]."', '".$_GET["count"]."')";

    if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location:product.php?id=".$_GET['id']);
}
else{

    die("Connection failed: " . $conn->connect_error);
}
}

fclose($log);
?>