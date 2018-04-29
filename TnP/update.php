						

<?php 
@ob_start();
session_start();
include ("update1.html");
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



';

}

?>




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
    document.getElementsById('message').setAttribute('required','required');
}
</script>

<!-- 	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Lets Get Started</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-md-offset-3 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Get In Touch</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

<footer id="fh5co-footer" role="contentinfo" style="background-image:url(images/Elegant_Background-7.jpg);">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>TnP Student Portal</h3>
					<p>A platform where you can share you exprience.  Explore more...</p>
					<p><a href="#">Register Yourself</a></p>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="index.html">Home</a></li>
						<li><a href="latest_feeds.php">Latest Feeds</a></li>
						<li><a href="#">Alumni Connect</a></li>
						<li><a href="preparation_zone.php">preparation Zone</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Student</a></li>
						<li><a href="#">Off-Campus Placement</a></li>
						<li><a href="#">Internship Opportunities</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Internship Tools</a></li>
						<li><a href="#">CV Maker</a></li>
						<li><a href="#">LOM</a></li>
						<li><a href="#">Cover Letter</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Help</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
			
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2018 TnP@IITRopar. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://github.com/Sameer-Arora/CSL203Project" target="_blank">IIT Ropar 2<sup>nd</sup> year team</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="https://github.com/Sameer-Arora/CSL203Project" target="_blank"><i class="icon-github"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>

	</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

