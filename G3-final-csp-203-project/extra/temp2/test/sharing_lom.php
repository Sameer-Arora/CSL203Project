<?php

include ('../session.php');

if( isset($_SESSION['name']) );
else{
    header("Location:../login.php?message=Please+login+session+timed+out");
}

include('Databaseconnection.php');

global $connection;

# either return ratings, or process a vote
if (isset($_POST['lom_id']) ) {
    
    $share=$_POST['share'];
    $lom_id=$_POST['lom_id'];
    
    if ($share==1 ) {

        $query = mysqli_query($connection," UPDATE lom set share_option=1 where lom_id=".$_POST['lom_id'] );

        if( $query ) {
            echo "shared=1&lom_id=".$lom_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 


    } 
    else{
    

        $query = mysqli_query($connection," UPDATE lom set share_option=0 where lom_id=".$_POST['lom_id'] );

        if( $query ) {
            echo "shared=0&lom_id=".$lom_id;
        }
        else {
            echo "<br>"."Error".$connection->error;
        } 
    }
}
 
?>
