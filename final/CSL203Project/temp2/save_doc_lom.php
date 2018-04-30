<?php

include ('session.php');

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

$filename=$_SESSION['html_file'];

$html=$_POST['file_text'];
echo $html;
$added=file_put_contents($filename, $html);

echo $added;

putenv('HOME=/var/www/html/CSL203Project/TnpCell/uploads/'.$_SESSION['name'].$_SESSION['person_id']."/lom/");

#converting html to docs.
$command = ' pandoc -f html %s.html -t docx -o %s.docx';

list($null,$Name,$ext)=preg_split("/[.]+/",$filename);

$Name=escapeshellcmd($Name);
$Name='.'.$Name;
                            
$command = sprintf($command,$Name,$Name);

echo "<br>".$command;

exec($command, $output, $result_var);

echo "<br>".$result_var."<br>";

foreach($output as $value){
    echo "<br>".$value . "<br>";
}  


$command = ' pandoc -s -o %s.pdf %s.docx 2>~/output.txt';

$command = sprintf($command,$Name,$Name);
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

	exec("convert ".$Name.".pdf[0] ".$Name.".jpeg ", $output,$result_var );

	foreach($output as $value){
                                        #echo "<br>".$value."<br>";
	}    

	if($result_var!=0){
		$message="Cannot conevt into image request";
	}
	else{


		$command = 'chmod -R 777 ~';

		#echo "<br>".$command;

		exec($command, $output, $result_var);

		echo "Addeed Sucessfully!!";

	}	

}

?>