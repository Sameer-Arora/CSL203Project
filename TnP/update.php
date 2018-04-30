						

<?php 
include 'session.php';
include ("header.php");
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





$sql = "SELECT subject, body FROM posts WHERE post_id =  " . $_SESSION['post_id']. ""; 
$result = $connection->query($sql);

while($row = $result->fetch_assoc()) 
{

	//      "\r\n","\r","\n","\\r","\\n","\\r\\n"

	$message = $row['body'];

	$pattern = "/[\n,]+/";
	$replacement = "";
	// Replace spaces, newlines and tabs
	$message =  preg_replace($pattern, $replacement, $message);


	$pattern = '/[<b\\r>]+/';
	$replacement = "<b\\r>";
	// Replace spaces, newlines and tabs
	// $message =  preg_replace($pattern, $replacement, $message);

	$message = preg_replace("/(<br\/>)+/", "\n\n", $message);
	$message = preg_replace("/(<br>)+/", "\n\n", $message);


		// $message = str_replace("<br>",("\n"),$message);

	echo '
	<div id="fh5co-contact">
						<div class="container">
							<div class="row">
								<div class="col-md-2 col-md-push-1 animate-box">
									

								</div>
								<div class="col-md-8 animate-box">
									<h3>Write Your Content Here</h3>
									<form action="update2.php" method="post">



							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="subject">Subject</label> -->
									<input name="subject" type="text" id="subject" class="form-control" placeholder="Subject of this message" value="'  . $row['subject']. '" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="message">Message</label> -->
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Main content" value="" required>'  . $message. '</textarea>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<input name="link" type="text" id="link" class="form-control" placeholder="Drop your google drive link" value="">
								</div>
							</div>



							<div class="form-group">
								<input type="submit" value="Update" class="btn btn-primary">
							</div>

						</form>		
					</div>
				</div>
				
			</div>
		</div>



		<script type="text/javascript">
			window.onload = function() 
			{ 
		    document.getElementsById(\'message\').setAttribute(\'required\',\'required\');
		}
		</script>


	';

}

include 'footer.php';

?>


