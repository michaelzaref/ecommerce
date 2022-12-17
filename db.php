<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'ecommerce';
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
mysqli_set_charset($conn,'utf8');
?>