<?php

$servername = "localhost";
$username = "root";
$password = "openubuntu";
$dbname="sahil_csp";

$connection = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
else{
    echo "";
}

?>