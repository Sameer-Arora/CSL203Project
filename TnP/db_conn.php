<?php
// mysql account
$servername = "localhost";
$username = "root";
$password = "";
$dbname="tnp_cell";
$connection = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
else{
    // echo "Connected Successfully";
}
?>