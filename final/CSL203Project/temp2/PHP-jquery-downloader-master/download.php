<?php



include ('session.php');

$doc_added=false;

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

ignore_user_abort(true);
set_time_limit(0); 
$path = "/absolute_path_to_your_files/";
 
$secret = 'your-secret-string';
 
if (isset($_POST['cv_id']) ) {

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
  #print_r($resultset);

  if( mysqli_num_rows($strSQL)!=1){

    $message = "cannot execute delete no such id !! ";
    #echo "<br>".$message;

  }
  else{

    $fullPath = $resultset['file_link'];
    $title=$resultset['title'];

    /*
        Do some parameters checks, database data collection, etc. etc. here
    */
    // Force a download dialog on the user's browser:
    //$filepath = 'SCJP Sun Certified Programmer for Java 6 Exam 310-065SCJP Sun Certified Programmer for Java 6 Exam 310-065.pdf';
    $filepath = $fullPath;


//header("Content-Type: application/pdf");


    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Content-Length: '.filesize($filepath));
    //ob_clean();
    //flush();
	try{
		$page = file_get_contents($filepath);
		echo $page;
		header('Set-Cookie: fileDownload=true; path=/');
	}catch(Exception $e){
		header('Set-Cookie: fileDownload=false; path=/');	
	}
    
    exit();

}
?>

