<?php

include ('session.php');

$doc_added=false;

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

$fileName = $_FILES["fileToUpload"]["name"];//the files name takes from the HTML form
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];//file in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"];//the type of file 
$fileSize = $_FILES["fileToUpload"]["size"];//file size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"];//0 for false and 1 for true

$zipfileName = $_FILES["latexfile"]["name"];//the files name takes from the HTML form
$zipfileTmpLoc = $_FILES["latexfile"]["tmp_name"];//file in the PHP tmp folder
$zipfileType = $_FILES["latexfile"]["type"];//the type of file 
$zipfileSize = $_FILES["latexfile"]["size"];//file size in bytes
$zipfileErrorMsg = $_FILES["latexfile"]["error"];//0 for false and 1 for true

$command = 'mkdir -p uploads/%s%s/cv_letter/';

$command = sprintf($command,$_SESSION['name'],$_SESSION['person_id']);
#echo "<br>".$command;

exec($command, $output, $result_var);

#echo "<br>".$result_var."<br>";

foreach($output as $value){
    #echo "<br>".$value . "<br>";
}


$target_path = "/var/www/html/CSL203Project/TnpCell/uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/". basename( $_FILES["fileToUpload"]["name"]); 

$ziptarget_path = "/var/www/html/CSL203Project/TnpCell/uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/". basename( $_FILES["latexfile"]["name"]); 

#echo "<br>"."file name: $fileName </br> temp file location: $fileTmpLoc<br/> file type: $fileType<br/> file size: $fileSize<br/> file upload target: $target_path<br/> file error msg: $fileErrorMsg<br/>";

//START PHP Image Upload Error Handling---------------------------------------------------------------------------------------------------

 putenv('HOME=/var/www/html/CSL203Project/TnpCell/uploads/'.$_SESSION['name'].$_SESSION['person_id']."/cv_letter/");

    if(!$fileTmpLoc)//no file was chosen ie file = null
    {
        $message="ERROR: Please select a file before clicking submit button.";
        #echo "<br>"."ERROR: Please select a file before clicking submit button.";
        
    }
    // Check if file already exists
	else{
        if($zipfileName==""){

    		if( file_exists($target_path)) {

                #echo "<br> file already exits.";
             
                $moveResult = move_uploaded_file($fileTmpLoc,$target_path);

                //Check to make sure the result is true before continuing
                if($moveResult != true)
                {
                    $message="ERROR: File not uploaded. Please Try again.";
                    #echo "<br>"."ERROR: File not uploaded. Please Try again.";
                            unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                        }
                        else
                        {   

                            
                            //Display to the page so you see what is happening 
                            #echo "<br>"."The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                            #echo "<br>"."It is <strong>$fileSize</strong> bytes.<br/><br/>";
                            #echo "<br>"."It is a <strong>$fileType</strong> type of file.<br/><br/>";
                            #echo "<br>"."The Error Message output for this upload is: $fileErrorMsg";

                            include('./test/Databaseconnection.php');

                            function run_query($connection,$query) {
                                $strSQL=mysqli_query($connection,$query);
                                $executed=false;
                                if( $strSQL ){
                                    $executed=true;
                                    #echo "<br>"."Error".$connection->error;
                                    #echo "<br>"."exec<br>";
                                }else{
                                    #echo "<br>"."Error".$connection->error;
                                }
                                return $executed;
                            }

                            $output=array();
                            $result_var;

                            //putenv('PATH=/usr/bin/unoconv');
                            //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');


                            
                            list($Name,$ext)=preg_split("/[.]+/",$fileName);

                            $Name=escapeshellcmd($Name);
                            $target_path=escapeshellcmd($target_path);
                            
                            #echo "<br>".$Name."<br>";

                            #converting docs to html.
                            $command = ' soffice --headless --convert-to html:"XHTML Writer File" ~/%s --outdir ~';

                            $command = sprintf($command,$fileName);
                            #echo "<br>".$command;

                            exec($command, $output, $result_var);

                            #echo "<br>".$result_var."<br>";

                            foreach($output as $value){
                                #echo "<br>".$value . "<br>";
                            }  



                            $command = ' pandoc -s -o ~/"%s.pdf" "%s" 2>~/output.txt';

                            $command = sprintf($command,$Name,$target_path);
                            #echo "<br>".$command;

                            exec($command, $output, $result_var);

                            #echo "<br>".$result_var."<br>";

                            foreach($output as $value){
                                #echo "<br>".$value . "<br>";
                            }  

                            if($result_var!=0){
                                $message="Cannot convert into pdf request";
                                #echo "<br>".$message;

                            }
                            else{

                                

                                exec("convert ~/\"".$Name.".pdf[0]\" ~/\"".$Name.".jpeg\" ", $output,$result_var );
                                
                                exec("touch ~/".$Name.".css ", $output,$result_var );

                                $imagePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".jpeg";

                                $filePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".docx";
                                $htmlfilePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".html";
                                $cssfilePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".css";

                                #echo "<br>".$imagePath;
                                #echo "<br>".$result_var."<br>";

                                foreach($output as $value){
                                    #echo "<br>".$value."<br>";
                                }    

                                if($result_var!=0){
                                    $message="Cannot convert into image request";
                                }
                                else{

                                    # getting css for html.
                                    $text= file_get_contents($htmlfilePath);
                                    
                                    
                                    preg_match('/<style.*?>[\s\S]*?<\/style>/', $text, $matches, PREG_OFFSET_CAPTURE);
                                    #print_r($matches);
                                    $css= $matches[0][0];
                                    $css=preg_replace('/<\/?style.*?>/',"",$css );
                                    #echo $css;
                                    $fp=fopen($cssfilePath,"w");
                                    file_put_contents($cssfilePath,$css);

                                    $command = 'chmod -R 777 ~';

                                    #echo "<br>".$command;

                                    exec($command, $output, $result_var);

                                
                                     #echo "<br>".$result_var."<br>";

                                    foreach($output as $value){
                                        #echo "<br>".$value . "<br>";
                                    }

                                    /*preg_match('/<body.*?>[\s\S]*?<\/body>/', $text, $matches, PREG_OFFSET_CAPTURE);
                                    $html= $matches[0][0];
                                    $html=preg_replace('/"[ ]*\/>/','/"[ ]*>/',$html );
                                    #echo $html;
                                    file_put_contents($htmlfilePath, $html);
*/
                                    
                                    $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                    $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                    $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                    $fileName= mysqli_real_escape_string($connection,$fileName);
                                    $path   = mysqli_real_escape_string($connection,$filePath);
                                    
                                    

                                    $query ="UPDATE cv_letter set time_updated = now(), image='".$imagePath."', load_file='".$htmlfilePath."' where person_id=".$person_id." and file_link='".$path."'";

                                    $execute=run_query($connection,$query);

                                    if($execute==false){
                                        $message = "cannot execute insert!! ";
                                        #echo "<br>".$message;
                                    }else{
                                        
                                      $query ="Select cv_letter_id from cv_letter  where file_link='".$path."'";

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

                                      $cv_letter_id=$resultset['cv_letter_id'];
                                      #echo $cv_letter_id;
                                       $message="Updated, file already exists.";
                                        #echo "<br>"."Updated, file already exists.";
                                        
                                        $doc_added=true;
                                    }
                                }   
                            }

                        }

                    }
            ## if file doesnt exists.
            else{
                if (!$fileSize > 16777215)//if file is > 16MB (Max size of MEDIUMBLOB)
                {
                    #echo "<br>"."ERROR: Your file was larger than 16 Megabytes";
                    $message="ERROR: Your file was larger than 16 Megabytes";

                    unlink($fileTmpLoc);//remove the uploaded file from the PHP folder
                }
                else{
                    if(!preg_match("/\.(docx|odt|pdf)$/i", $fileName))//this codition allows only the type of files listed to be uploaded
                    {
                        #echo "<br>"."ERROR: Your file was not .docx, .odt, .pdf or .png";
                        $message="ERROR: Your file was not .docx, .odt, .pdf or .png";
                        unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                    }
                    else {
                        if($fileErrorMsg == 1)//if file uploaded error key = 1 ie is true
                        {
                            $message="ERROR: An error occured while processing the file. Please try again.";
                            #echo "<br>"."ERROR: An error occured while processing the file. Please try again.";
                        }
                        else{

                            //END PHP Image Upload Error Handling---------------------------------------------------------------------------------------------------------------------

                            //Place it into your "uploads" folder using the move_uploaded_file() function
                            $moveResult = move_uploaded_file($fileTmpLoc,$target_path);

                            //Check to make sure the result is true before continuing
                            if($moveResult != true)
                            {
                                $message="ERROR: File not uploaded. Please Try again.";
                                #echo "<br>"."ERROR: File not uploaded. Please Try again.";
                                unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                            }
                            else
                            {

                                //Display to the page so you see what is happening 
                                #echo "<br>"."The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                                #echo "<br>"."It is <strong>$fileSize</strong> bytes.<br/><br/>";
                                #echo "<br>"."It is a <strong>$fileType</strong> type of file.<br/><br/>";
                                #echo "<br>"."The Error Message output for this upload is: $fileErrorMsg";

                                include('./test/Databaseconnection.php');

                                function run_query($connection,$query) {
                                    $strSQL=mysqli_query($connection,$query);
                                    $executed=false;
                                    if( $strSQL ){
                                        $executed=true;
                                        #echo "<br>"."Error".$connection->error;
                                        #echo "<br>"."exec<br>";
                                    }else{
                                        #echo "<br>"."Error".$connection->error;
                                    }
                                    return $executed;
                                }

                                $output=array();
                                $result_var;

                                //putenv('PATH=/usr/bin/unoconv');
                                //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');

                                list($Name,$ext)=preg_split("/[.]+/",$fileName);

                                $Name=escapeshellcmd($Name);
                                $target_path=escapeshellcmd($target_path);
                                
                                #echo "<br>".$Name."<br>";
                                $command = ' soffice --headless --convert-to html:"XHTML Writer File" ~/%s --outdir ~';

                                $command = sprintf($command,$fileName);
                                #echo "<br>".$command;

                                exec($command, $output, $result_var);

                                #echo "<br>".$result_var."<br>";

                                foreach($output as $value){
                                    #echo "<br>".$value . "<br>";
                                }  

                                $command = ' pandoc -s -o ~/"%s.pdf" "%s" 2>~/output.txt';

                                $command = sprintf($command,$Name,$target_path);
                                #echo "<br>".$command;

                                exec($command, $output, $result_var);


                                #echo "<br>".$result_var."<br>";

                                foreach($output as $value){
                                    #echo "<br>".$value . "<br>";
                                }  

                                if($result_var!=0){
                                    $message="Cannot convert into pdf request";
                                    #echo "<br>".$message;
                                }
                                else{

                                    

                                    exec("convert ~/\"".$Name.".pdf[0]\" ~/\"".$Name.".jpeg\" ", $output,$result_var );

                                    $imagePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".jpeg";
                                    $filePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".docx";
                                    $htmlfilePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".html";
                                    $cssfilePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".css";

                                    #echo "<br>".$imagePath;
                                    #echo "<br>".$result_var."<br>";

                                    foreach($output as $value){
                                        #echo "<br>".$value."<br>";
                                    }    

                                    if($result_var!=0){
                                        $message="Cannot conevt into image request";
                                    }
                                    else{

                                            # getting css for html.
                                        $text= file_get_contents($htmlfilePath);
                                        
                                        

                                        preg_match('/<style.*?>[\s\S]*?<\/style>/', $text, $matches, PREG_OFFSET_CAPTURE);
                                        #print_r($matches);
                                        $css= $matches[0][0];
                                        $css=preg_replace('/<\/?style.*?>/',"",$css );
                                        #echo $css;
                                        $fp=fopen($cssfilePath,"w");
                                        file_put_contents($cssfilePath,$css);

                                        $command = 'chmod -R 777 ~';

                                        #echo "<br>".$command;

                                        exec($command, $output, $result_var);

                                    
                                         #echo "<br>".$result_var."<br>";

                                        foreach($output as $value){
                                            #echo "<br>".$value . "<br>";
                                        }
                                        
                                        /*preg_match('/<body.*?>[\s\S]*?<\/body>/', $text, $matches, PREG_OFFSET_CAPTURE);
                                        $html= $matches[0][0];
                                        $html=preg_replace('/"[ ]*\/>/','">',$html );
                                        #echo $html;
                                        file_put_contents($htmlfilePath, $html);
*/
                                        $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                        $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                        $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                        $fileName= mysqli_real_escape_string($connection,$fileName);
                                        $path   = mysqli_real_escape_string($connection,$filePath);
                                        
                                        

                                        $query ="INSERT INTO cv_letter (time_updated, person_id, file_link, department, type , title,image,load_file,css_file) values( now() ,".$person_id.",'".$path."','".$department."','".$type."','".$fileName."','".$imagePath."','".$htmlfilePath."','".$cssfilePath."')";



                                        $execute=run_query($connection,$query);

                                        if($execute==false){
                                            $message = "cannot execute insert!! ";
                                            #echo "<br>".$message;
                                        }else{
                                            $message = "Added document successfully!! ";
                                            #echo "<br>".$message;
                                            $cv_letter_id=mysqli_insert_id($connection);
                                            $doc_added=true;
                                        }
                                     }   
                                }

                            }
                        }
                    }
                }
                }
        }
        else{

            if( file_exists($target_path) && file_exists($ziptarget_path) ) {

                #echo "<br> file already exits.";
             
                $moveResult = move_uploaded_file($fileTmpLoc,$target_path);
                $zipmoveResult = move_uploaded_file($zipfileTmpLoc,$ziptarget_path);

                //Check to make sure the result is true before continuing
                if($moveResult != true || $zipmoveResult != true)
                {
                    $message="ERROR: File not uploaded. Please Try again.";
                    #echo "<br>"."ERROR: File not uploaded. Please Try again.";
                            unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                            unlink($zipfileTmpLoc);//remove the uploaded file from the PHP temp folder
                        }
                        else
                        {   

                            
                            //Display to the page so you see what is happening 
                            #echo "<br>"."The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                            #echo "<br>"."It is <strong>$fileSize</strong> bytes.<br/><br/>";
                            #echo "<br>"."It is a <strong>$fileType</strong> type of file.<br/><br/>";
                            #echo "<br>"."The Error Message output for this upload is: $fileErrorMsg";

                            include('./test/Databaseconnection.php');

                            function run_query($connection,$query) {
                                $strSQL=mysqli_query($connection,$query);
                                $executed=false;
                                if( $strSQL ){
                                    $executed=true;
                                    #echo "<br>"."Error".$connection->error;
                                    #echo "<br>"."exec<br>";
                                }else{
                                    #echo "<br>"."Error".$connection->error;
                                }
                                return $executed;
                            }

                            $output=array();
                            $result_var;

                            //putenv('PATH=/usr/bin/unoconv');
                            //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');


                            
                            list($Name,$ext)=preg_split("/[.]+/",$fileName);

                            $Name=escapeshellcmd($Name);
                            $target_path=escapeshellcmd($target_path);

                            exec("convert ~/\"".$Name.".pdf[0]\" ~/\"".$Name.".jpeg\" ", $output,$result_var );

                            $imagePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".jpeg";

                            $filePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$zipfileName;

                            #echo "<br>".$imagePath;
                            #echo "<br>".$result_var."<br>";

                            foreach($output as $value){
                                #echo "<br>".$value."<br>";
                            }    

                            if($result_var!=0){
                                $message="Cannot conevt into image request";
                            }
                            else{

                                $command = 'chmod -R 777 ~';

                                $command = sprintf($command,$_SESSION['name'],$_SESSION['person_id']);
                                #echo "<br>".$command;

                                exec($command, $output, $result_var);

                            
                                 #echo "<br>".$result_var."<br>";

                                foreach($output as $value){
                                    #echo "<br>".$value . "<br>";
                                }

                                $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                $fileName= mysqli_real_escape_string($connection,$fileName);
                                $path   = mysqli_real_escape_string($connection,$filePath);
                                
                                

                                $query ="UPDATE cv_letter set time_updated = now(), image='".$imagePath."' where person_id=".$person_id." and file_link='".$path."'";

                                $execute=run_query($connection,$query);

                                if($execute==false){
                                    $message = "cannot execute insert!! ";
                                    #echo "<br>".$message;
                                }else{
                                    
                                  $query ="Select cv_letter_id from cv_letter  where file_link='".$path."'";

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

                                  $cv_letter_id=$resultset['cv_letter_id'];
                                  #echo $cv_letter_id;
                                   $message="Updated, file already exists.";
                                    #echo "<br>"."Updated, file already exists.";
                                    
                                    $doc_added=true;
                                }
                            }   
                    

                        }

                    }
            ## if file doesnt exists.
            else{
                if (!$fileSize > 16777215)//if file is > 16MB (Max size of MEDIUMBLOB)
                {
                    #echo "<br>"."ERROR: Your file was larger than 16 Megabytes";
                    $message="ERROR: Your file was larger than 16 Megabytes";

                    unlink($fileTmpLoc);//remove the uploaded file from the PHP folder
                }
                else{
                    if(!preg_match("/\.(docx|odt|pdf)$/i", $fileName) )//this codition allows only the type of files listed to be uploaded
                    {
                        #echo "<br>"."ERROR: Your file was not .docx, .odt, .pdf or .png";
                        $message="ERROR: Your file was not .docx, .odt, .pdf or .png";
                        unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                    }
                    else {
                        if($fileErrorMsg == 1)//if file uploaded error key = 1 ie is true
                        {
                            $message="ERROR: An error occured while processing the file. Please try again.";
                            #echo "<br>"."ERROR: An error occured while processing the file. Please try again.";
                        }
                        else{

                            //END PHP Image Upload Error Handling---------------------------------------------------------------------------------------------------------------------

                            //Place it into your "uploads" folder using the move_uploaded_file() function
                            $moveResult = move_uploaded_file($fileTmpLoc,$target_path);
                            $zipmoveResult = move_uploaded_file($zipfileTmpLoc,$ziptarget_path);

                            //Check to make sure the result is true before continuing
                            if($moveResult != true || $zipmoveResult!=true )
                            {
                                $message="ERROR: File not uploaded. Please Try again.";
                                #echo "<br>"."ERROR: File not uploaded. Please Try again.";
                                unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                                unlink($zipfileTmpLoc);//remove the uploaded file from the PHP temp folder
                            }
                            else
                            {

                                //Display to the page so you see what is happening 
                                #echo "<br>"."The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                                #echo "<br>"."It is <strong>$fileSize</strong> bytes.<br/><br/>";
                                #echo "<br>"."It is a <strong>$fileType</strong> type of file.<br/><br/>";
                                #echo "<br>"."The Error Message output for this upload is: $fileErrorMsg";

                                include('./test/Databaseconnection.php');

                                function run_query($connection,$query) {
                                    $strSQL=mysqli_query($connection,$query);
                                    $executed=false;
                                    if( $strSQL ){
                                        $executed=true;
                                        #echo "<br>"."Error".$connection->error;
                                        #echo "<br>"."exec<br>";
                                    }else{
                                        #echo "<br>"."Error".$connection->error;
                                    }
                                    return $executed;
                                }

                                $output=array();
                                $result_var;

                                //putenv('PATH=/usr/bin/unoconv');
                                //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');

                                list($Name,$ext)=preg_split("/[.]+/",$fileName);

                                $Name=escapeshellcmd($Name);
                                $target_path=escapeshellcmd($target_path);
                                

                                

                                exec("convert ~/\"".$Name.".pdf[0]\" ~/\"".$Name.".jpeg\" ", $output,$result_var );

                                $imagePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$Name.".jpeg";
                                $filePath="./uploads/".$_SESSION['name'].$_SESSION['person_id']."/cv_letter/".$zipfileName;

                                #echo "<br>".$imagePath;
                                #echo "<br>".$result_var."<br>";

                                foreach($output as $value){
                                    #echo "<br>".$value."<br>";
                                }    

                                if($result_var!=0){
                                    $message="Cannot conevt into image request";
                                }
                                else{

                                    $command = 'chmod -R 777 ~';

                                    $command = sprintf($command,$_SESSION['name'],$_SESSION['person_id']);
                                    #echo "<br>".$command;

                                    exec($command, $output, $result_var);

                                
                                     #echo "<br>".$result_var."<br>";

                                    foreach($output as $value){
                                        #echo "<br>".$value . "<br>";
                                    }

                                    $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                    $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                    $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                    $fileName= mysqli_real_escape_string($connection,$fileName);
                                    $path   = mysqli_real_escape_string($connection,$filePath);
                                    
                                    

                                    $query ="INSERT INTO cv_letter (time_updated, person_id, file_link, department, type , title,image) values( now() ,".$person_id.",'".$path."','".$department."','".$type."','".$fileName."','".$imagePath."')";



                                    $execute=run_query($connection,$query);

                                    if($execute==false){
                                        $message = "cannot execute insert!! ";
                                        #echo "<br>".$message;
                                    }else{
                                        $message = "Added document successfully!! ";
                                        #echo "<br>".$message;
                                        $cv_letter_id=mysqli_insert_id($connection);
                                        $doc_added=true;
                                    }
                                 }   

                            }
                        }
                    }
                }
                }
        }

}


?>

<?php 
$author=$_SESSION['name'];

if($doc_added){
  
    echo "doc_added=true&message=".$message."&name=".$author."&cv_letter_id=".$cv_letter_id."&last_update=".date(DATE_RFC822)."&imagePath=".$imagePath."&title=".$fileName."&type=".$type ;
}
else {
   
   echo "message=".$message;
 } 

 ?>
