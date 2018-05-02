<?php 
// include("post_new.html");

include ("db_conn.php");

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

// date_default_timezone_set('Asia/Kolkata');
// $date_time =  date('d-m-Y H:i:sa');


$subject    = mysqli_real_escape_string($connection,$_POST['subject']);
$message    = mysqli_real_escape_string($connection,$_POST['message']);
$link       = mysqli_real_escape_string($connection,$_POST['message']);
$person_id  = $_SESSION['person_id'];

$message = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br>",$message);
// $link = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br>",$link);

$sql = "INSERT INTO posts (person_id, subject, link, body) VALUES ('".$person_id."','".$subject."','".$link."','".$message."')"; 
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

redirect("latest_feeds.php")



 ?>