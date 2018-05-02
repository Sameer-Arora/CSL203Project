

<?php
$servername = "localhost";
$username = "root";
$password = "sameer";
$dbname = "tnp_cell";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
