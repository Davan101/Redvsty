<?php
$server = "127.0.0.1";
$user = "root";
$pass = "Trinix@123";
$database = "my_login";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
