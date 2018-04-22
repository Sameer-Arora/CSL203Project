<?php

include ('session.php');

$doc_added=false;

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+first");
}

$fileName = $_FILES["fileToUpload"]["name"];//the files name takes from the HTML form
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];//file in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"];//the type of file 
$fileSize = $_FILES["fileToUpload"]["size"];//file size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"];//0 for false and 1 for true
$target_path = "/var/www/html/CSL203Project/TnpCell/uploads/" . basename( $_FILES["fileToUpload"]["name"]); 

echo "file name: $fileName </br> temp file location: $fileTmpLoc<br/> file type: $fileType<br/> file size: $fileSize<br/> file upload target: $target_path<br/> file error msg: $fileErrorMsg<br/>";

//START PHP Image Upload Error Handling---------------------------------------------------------------------------------------------------

 putenv('HOME=/var/www/html/CSL203Project/TnpCell/uploads');

    if(!$fileTmpLoc)//no file was chosen ie file = null
    {
        $message="ERROR: Please select a file before clicking submit button.";
        echo "ERROR: Please select a file before clicking submit button.";
        
    }
    // Check if file already exists
	else{

		if( file_exists($target_path)) {
         
            $moveResult = move_uploaded_file($fileTmpLoc,$target_path);

            //Check to make sure the result is true before continuing
            if($moveResult != true)
            {
                $message="ERROR: File not uploaded. Please Try again.";
                echo "ERROR: File not uploaded. Please Try again.";
                        unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                    }
                    else
                    {
                        //Display to the page so you see what is happening 
                        echo "The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                        echo "It is <strong>$fileSize</strong> bytes.<br/><br/>";
                        echo "It is a <strong>$fileType</strong> type of file.<br/><br/>";
                        echo "The Error Message output for this upload is: $fileErrorMsg";

                        include('./test/Databaseconnection.php');

                        function run_query($connection,$query) {
                            $strSQL=mysqli_query($connection,$query);
                            $executed=false;
                            if( $strSQL ){
                                $executed=true;
                                echo "Error".$connection->error;
                                echo "exec<br>";
                            }else{
                                echo "Error".$connection->error;
                            }
                            return $executed;
                        }

                        $output=array();
                        $result_var;

                        //putenv('PATH=/usr/bin/unoconv');
                        //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');



                        $fileName=escapeshellcmd($fileName);
                        echo $fileName."<br>";
                        
                        list($Name,$ext)=preg_split("/[.]+/",$fileName);

                        $command = ' pandoc -s -o ~/%s.pdf %s 2>~/output.txt';

                        $command = sprintf($command,$Name,$target_path);
                        echo $command;

                        exec($command, $output, $result_var);

                        //exec("cd uploads/; unoconv -vvv -f pdf ".$fileName, $output,$result_var);

                        echo $result_var."<br>";

                        foreach($output as $value){
                            echo $value . "<br>";
                        }  

                        if($result_var!=0){
                            $message="Cannot process request";
                        }
                        else{

                            $my_file = "/var/www/html/CSL203Project/TnpCell/uploads/".$Name.".pdf";


                            echo exec("convert ~/".$Name.".pdf[0] ~/".$Name.".jpeg", $output,$result_var );

                            $imagePath="./uploads/".$Name.".jpeg";

                            echo $imagePath;
                            echo $result_var."<br>";

                            foreach($output as $value){
                                echo $value."<br>";
                            }    

                            if($result_var!=0){
                                $message="Cannot process request";
                            }
                            else{

                                $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                $fileName= mysqli_real_escape_string($connection,$fileName);
                                $path   = mysqli_real_escape_string($connection,$target_path);
                                
                                

                                $query ="UPDATE cv set time_updated = now(), image='".$imagePath."' where person_id=".$person_id." and file_link='".$path."'";

                                $execute=run_query($connection,$query);

                                if($execute==false){
                                    $message = "cannot execute insert!! ";
                                    echo $message;
                                }else{
                                   $message="Updated, file already exists.";
                                    echo "Updated, file already exists.";
                                    $cv_id=mysqli_insert_id($connection);
                                    $doc_added=true;
                                }
                            }   
                        }

                    }

                }

    else{
        if (!$fileSize > 16777215)//if file is > 16MB (Max size of MEDIUMBLOB)
        {
            echo "ERROR: Your file was larger than 16 Megabytes";
            $message="ERROR: Your file was larger than 16 Megabytes";

            unlink($fileTmpLoc);//remove the uploaded file from the PHP folder
        }
        else{
            if(!preg_match("/\.(docx|odt|pdf)$/i", $fileName))//this codition allows only the type of files listed to be uploaded
            {
                echo "ERROR: Your file was not .docx, .odt, .pdf or .png";
                $message="ERROR: Your file was not .docx, .odt, .pdf or .png";
                unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
            }
            else {
                if($fileErrorMsg == 1)//if file uploaded error key = 1 ie is true
                {
                    $message="ERROR: An error occured while processing the file. Please try again.";
                    echo "ERROR: An error occured while processing the file. Please try again.";
                }
                else{

                    //END PHP Image Upload Error Handling---------------------------------------------------------------------------------------------------------------------


                    //Place it into your "uploads" folder using the move_uploaded_file() function
                    $moveResult = move_uploaded_file($fileTmpLoc,$target_path);

                    //Check to make sure the result is true before continuing
                    if($moveResult != true)
                    {
                        $message="ERROR: File not uploaded. Please Try again.";
                        echo "ERROR: File not uploaded. Please Try again.";
                        unlink($fileTmpLoc);//remove the uploaded file from the PHP temp folder
                    }
                    else
                    {
                        //Display to the page so you see what is happening 
                        echo "The file named <strong>$fileName</strong> uploaded successfully.<br/><br/>";
                        echo "It is <strong>$fileSize</strong> bytes.<br/><br/>";
                        echo "It is a <strong>$fileType</strong> type of file.<br/><br/>";
                        echo "The Error Message output for this upload is: $fileErrorMsg";

                        include('./test/Databaseconnection.php');

                        function run_query($connection,$query) {
                            $strSQL=mysqli_query($connection,$query);
                            $executed=false;
                            if( $strSQL ){
                                $executed=true;
                                echo "Error".$connection->error;
                                echo "exec<br>";
                            }else{
                                echo "Error".$connection->error;
                            }
                            return $executed;
                        }

                        $output=array();
                        $result_var;

                        //putenv('PATH=/usr/bin/unoconv');
                        //putenv('PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/opt/node/bin');

                       

                        $fileName=escapeshellcmd($fileName);
                        echo $fileName."<br>";
                        
                        list($Name,$ext)=preg_split("/[.]+/",$fileName);

                        $command = ' pandoc -s -o ~/%s.pdf %s 2>~/output.txt';

                        $command = sprintf($command,$Name,$target_path);
                        echo $command;

                        exec($command, $output, $result_var);

                        //exec("cd uploads/; unoconv -vvv -f pdf ".$fileName, $output,$result_var);

                        echo $result_var."<br>";

                        foreach($output as $value){
                            echo $value . "<br>";
                        }  

                        if($result_var!=0){
                            $message="Cannot process request";
                        }
                        else{
                            
                            $my_file = "/var/www/html/CSL203Project/TnpCell/uploads/".$Name.".pdf";


                            echo exec("convert ~/".$Name.".pdf[0] ~/".$Name.".jpeg", $output,$result_var );

                            $imagePath="./uploads/".$Name.".jpeg";

                            echo $imagePath;
                            echo $result_var."<br>";

                            foreach($output as $value){
                                echo $value."<br>";
                            }    

                            if($result_var!=0){
                                $message="Cannot process request";
                            }
                            else{

                                $person_id   = mysqli_real_escape_string($connection,$_SESSION['person_id']);
                                $department   = mysqli_real_escape_string($connection,$_POST['department']);
                                $type   = mysqli_real_escape_string($connection,$_POST['type']);
                                $fileName= mysqli_real_escape_string($connection,$fileName);
                                $path   = mysqli_real_escape_string($connection,$target_path);
                                
                                

                                $query ="INSERT INTO cv (time_updated, person_id, file_link, department, type , title,image) values( now() ,".$person_id.",'".$path."','".$department."','".$type."','".$fileName."','".$imagePath."')";



                                $execute=run_query($connection,$query);

                                if($execute==false){
                                    $message = "cannot execute insert!! ";
                                    echo $message;
                                }else{
                                    $message = "Added document successfully!! ";
                                    echo $message;
                                    $cv_id=mysqli_insert_id($connection);
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
<script>

    function redirect(url,method, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = method;
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}
    
</script>


<?php 
$author=$_SESSION['name'];

if($doc_added){
    ?>
<script>
redirect("./cvmaker_home.php",'post',{doc_added:'true',message:'<?php echo $message;?>',name:'<?php echo $author;?>',cv_id:'<?php echo $cv_id;?>',last_update:'<?php echo time();?>',imagePath:'<?php echo $imagePath;?>'} );
</script>   

<?php }
else {
    ?>

    <script>
    redirect("./cvmaker_home.php",'post',{message:'<?php echo $message;?>'});
    </script>

<?php } ?>