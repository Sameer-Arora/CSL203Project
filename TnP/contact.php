<?php 
// include("post_new.html");

// mysql account
$servername = "localhost";
$username = "root";
$password = "";
$dbname="feedback";
$connection = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
else{
    // echo "Connected Successfully";
}


/*echo "string";
echo "subject : ".$_POST['subject'];
echo "message : ".$_POST['message'];
echo "link : ".$_POST['link'];*/

function run_query($connection,$query){
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if($strSQL){
        $exectued=true;
    }else{
        echo "Error".$connection->error;
    }
          
    return $executed;
}


$name       = mysqli_real_escape_string($connection,$_POST['name']);
$email      = mysqli_real_escape_string($connection,$_POST['email']);
$message = mysqli_real_escape_string($connection,$_POST['message']);

$sql = "INSERT INTO feedbacks (name, email, content) VALUES ('".$name."','".$email."','".$message."')"; 
$executed=run_query($connection,$sql);



/*$sql = "SELECT post_id, subject, body, link FROM posts";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row['post_id']. " - Subject: " . $row['subject']. " -body " . $row['body']. " -link " . $row['link']. "<br>";
    }
} else {
    echo "0 results";
}
*/

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("contact.html")



 ?>