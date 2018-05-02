<?php 
// include("post_new.html");
session_start();
include ("db_conn.php");


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


$person_id  = $_SESSION['person_id'];
$post_id = $_SESSION['post_id'];

$sql = "DELETE FROM followed_posts WHERE post_id = '".$post_id."' AND person_id = '".$person_id."'";

// $sql = "INSERT INTO followed_posts (post_id, person_id) VALUES ('".$post_id."','".$person_id."')"; 

$executed=run_query($connection,$sql);


?>