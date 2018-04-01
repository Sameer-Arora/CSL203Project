<?php 
// include ("latest_feeds.html");
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

include ("latest_feeds_1.html");

session_start();

$sql = "SELECT post_id, subject, body, link FROM posts";
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
											<p><a href='test.php' class='btn btn-lg btn-primary'>Read More</a></p>
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
											<p><a href='test.php' class='btn btn-lg btn-primary'>Read More</a></p>
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


include ("latest_feeds_2.html");




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
