<?php

include ('../session.php');

if( isset($_SESSION['name']) );
else{
    header("Location:../login.php?message=Please+login+session+timed+out");
}

include('Databaseconnection.php');

global $connection;

# either return ratings, or process a vote
if (isset($_POST['cv_id']) ) {
    
    $share=$_POST['share'];
    $cv_id=$_POST['cv_id'];
    
    if ($share==1 ) {

        $query = mysqli_query($connection," UPDATE cv set share_option=1 where cv_id=".$_POST['cv_id'] );

        if( $query ) {
            echo "shared=1&cv_id=".$cv_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 


    } 
    else{
    

        $query = mysqli_query($connection," UPDATE cv set share_option=0 where cv_id=".$_POST['cv_id'] );

        if( $query ) {
            echo "shared=0&cv_id=".$cv_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 
    }
}
 
?>
