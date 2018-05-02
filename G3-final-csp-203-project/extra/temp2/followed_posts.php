<?php 
include ("session.php");
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



include ("header.php");



$sql = "SELECT DISTINCT posts.post_id, subject, body, link FROM followed_posts INNER JOIN posts ON followed_posts.post_id = posts.post_id WHERE followed_posts.person_id = '".$person_id."' ORDER BY post_id DESC";
$result = $connection->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row    

	echo "
			<div class='feds'>
				<div id='fh5co-core-feature'>
					<div class='container'>
						<div class='row'>
							<div class='features'>
	";

	$count = 0;
    while($row = $result->fetch_assoc()) 
    {
        // echo "id: " . $row['post_id']. " - Subject: " . $row['subject']. " -body " . $row['body']. " -link " . $row['link']. "<br>";

    	$count = $count + 1;

    	$_SESSION['subject'] = $row['subject'];
    	$_SESSION['body'] = $row['body'];


    	$div_id = $row['post_id'];

    	if ($count % 2 == 0) 
    	{
    		// header("location:http://localhost/TnP/test.php");

    		echo " 
								<div class='col-half animate-box' data-animate-effect='fadeInRight'>
									<div class='table-c'>
										<div class='desc'>
											<span>"  . $row['subject']. "</span>
											<h3>"  . $row['subject']. "</h3>
											<p>"  . $row['link']. "...</p>
											<p class='author'><cite>&mdash; "  . $row['post_id']. "</cite></p>
											<p><a class='btn btn-lg btn-primary' href='?" .$div_id ."'>Read More</a></p>
										</div>
									</div>
								</div>
			";
    	}
    	else 
    	{
    		echo " 
								<div class='col-half animate-box' data-animate-effect='fadeInLeft'>
									<div class='table-c'>
										<div class='desc'>
											<span>"  . $row['subject']. "</span>
											<h3>"  . $row['subject']. "</h3>
											<p>"  . $row['link']. "...</p>
											<p class='author'><cite>&mdash; "  . $row['post_id']. "</cite></p>
											<p><a class='btn btn-lg btn-primary' href='?" .$div_id ."'>Read More</a></p>
										</div>
									</div>
								</div>
			";
    	}

    }

    echo "
    						</div>
						</div>
					</div>
				</div>
			</div>	
	";
} 

else 
{
    echo "0 results";
}


include ("footer.php");

// $time_now=mktime(date('h')+5,date('i')+30,date('s'));
// $date = date('d-m-Y h:i:sa', $time_now);
// echo $date;

// date_default_timezone_set("Asia/Bangkok");
// echo date_default_timezone_get();
// echo "The time is " . date("h:i:sa");




$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// echo $actual_link;
$query_string = parse_url($actual_link, PHP_URL_QUERY);
// echo $query_string;
$sql = "SELECT post_id, subject, body, link FROM posts WHERE post_id = " . $query_string ;
$result = $connection->query($sql);
while($row = $result->fetch_assoc()){
	$_SESSION['subject'] = $row['subject'];
	$_SESSION['body'] = $row['body'];
}


function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


$_SESSION['post_id'] = $query_string ;

redirect("test.php");



/*$result = mysql_query('SELECT post_id, subject, body, link FROM posts');
if (!$result) 
{
    die('Invalid query: ' . mysql_error());
} 
else 
{
    $data = array();
    while ($row = mysql_fetch_array($result)) 
    {          
        $data[] = $row;           
    }
    echo json_encode($data);
}*/


 ?>
