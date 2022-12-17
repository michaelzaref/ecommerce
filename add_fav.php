<?php
session_start();
include('db.php');
$log = fopen("log.txt", "a");
if(isset($_GET['id'])){
    if ($conn->connect_error) {
        fwrite($log, die("Connection failed: " . $conn->connect_error)."\n");
    }
    $sql = "INSERT INTO fav_".$_SESSION['fav-id']." (id)
    VALUES ('".$_GET["id"]."')";
    if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location:index.php");
}
else{
    die("Connection failed: " . $conn->connect_error);
}
}

fclose($log);
?>