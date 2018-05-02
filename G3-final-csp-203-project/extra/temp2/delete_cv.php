<?php

include ('session.php');

$doc_deleted=false;
$message=""; 

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

if(isset($_POST['cv_id'])){

   #echo "fsag"; 

  include('./test/Databaseconnection.php');

  $cv_id   = mysqli_real_escape_string($connection,$_POST['cv_id']);

  $query ="Select * from cv  where cv_id=".$cv_id;

  #echo $cv_id;

  $strSQL=mysqli_query($connection,$query);

  if( $strSQL ){
      $executed=true;
      #echo "<br>"."exec<br>";
    }
    else{
      #echo "<br>"."Error".$connection->error;
    }
  $resultset=mysqli_fetch_array($strSQL);
    
  if( count($resultset)==0){

    $message = "cannot execute delete no such id !! ";
    #echo "<br>".$message;

  }
  else{
    
    $Name=$resultset['title'];
    list($Name,$ext)=preg_split("/\./",$Name);
    $Name=escapeshellcmd($Name);

    #echo "<br>"."$Name";

    putenv('HOME=/var/www/html/CSL203Project/TnpCell/uploads/'.$_SESSION['name'].$_SESSION['person_id']."/cv/");
    #echo 'HOME=/var/www/html/CSL203Project/TnpCell/uploads/'.$_SESSION['name'].$_SESSION['person_id']."/cv/";
    $command = ' rm ~/%s* ; perror $?';

    $command = sprintf($command,$Name);
    
    #echo "<br>".$command;

    exec($command, $output, $result_var);

    #echo "<br>".$result_var."<br>";

    foreach($output as $value){
        #echo "<br>".$value . "<br>";
    }  

    if($result_var!=0){
        $message="Cannot delete into pdf request";
        #echo "<br>".$message;
    }
    else{

        $query ="delete from ratings where cv_id=".$cv_id;

        $strSQL=mysqli_query($connection,$query);
        
        if( $strSQL ){
            $executed=true;
            #echo "<br>"."exec<br>";

            $query ="delete from cv  where cv_id=".$cv_id;

            $strSQL=mysqli_query($connection,$query);

            if( $strSQL ){
              $executed=true;
              #echo "<br>"."Error".$connection->error;
              #echo "<br>"."exec<br>";
              $message="deleted ";
              #echo "<br>".$message;
              $doc_deleted=true;

            }
            else{
              #echo "<br>"."Error".$connection->error;
            }


          }
       else{
            #echo "<br>"."Error".$connection->error;
          }

    }

  }
}
 
?>

<?php 

if($doc_deleted){
   echo "message=$message&cv_id=".$_POST['cv_id'];
   }
else {
   echo "message=$message";

 } ?>
