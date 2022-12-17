<?php
session_start();
include('includes/db.php');
$log = fopen("log.txt", "a");
if(isset($_GET['id'])){
    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $sql = "INSERT INTO fav_".$_SESSION['fav-id']." (id)
    VALUES ('".$_GET["id"]."')";
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