<?php

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

	$file = fopen("companies_data.txt","r");
	while(! feof($file)){
		$line = fgets($file);
		$line = preg_split('#\s+#', $line, 6);
		$name = $line[0];
		$link = $line[1];
		$apply_date = $line[2];
		$interview_date = $line[3];
		$branch = $line[4];
		$message = $line[5];


		$sql = "INSERT INTO company(company_name,company_link,apply_date,interview_date,branch,message) VALUES('$name','$link','$apply_date','$interview_date', '$branch','$message')";
		$executed=run_query($connection,$sql);

	}

fclose($file);


function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("preparation_zone.php")




?>