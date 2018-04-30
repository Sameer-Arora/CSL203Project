<?php

include ('../session.php');

if( isset($_SESSION['name']) );
else{
    header("Location:../login.php?message=Please+login+session+timed+out");
}

include('Databaseconnection.php');

global $connection;

# either return ratings, or process a vote
if (isset($_POST['cv_letter_id']) ) {
    
    $share=$_POST['share'];
    $cv_letter_id=$_POST['cv_letter_id'];
    
    if ($share==1 ) {

        $query = mysqli_query($connection," UPDATE cv_letter set share_option=1 where cv_letter_id=".$_POST['cv_letter_id'] );

        if( $query ) {
            echo "shared=1&cv_letter_id=".$cv_letter_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 


    } 
    else{
    

        $query = mysqli_query($connection," UPDATE cv_letter set share_option=0 where cv_letter_id=".$_POST['cv_letter_id'] );

        if( $query ) {
            echo "shared=0&cv_letter_id=".$cv_letter_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 
    }
}
 
?>
