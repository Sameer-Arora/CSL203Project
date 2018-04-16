

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo htmlspecialchars_decode( "<h2>" .$row["title"]."</h2>". "<b>ISBN:</b> " . $row["ISBN"]."<br><b>Author: </b>"  . $row["nameF"]." ".$row["nameL"]."<br><b>Category: </b>".$row["CategoryName"].$row["description"]);
    }
} else {
    echo "0 results";
}
$conn->close();
?>