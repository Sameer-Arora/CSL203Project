<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TnP &mdash; Student Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.html"></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>
						<li class="has-dropdown">
							<a href="latest_feeds.php">Latest Feed</a>
							<ul class="dropdown">
								<li><a href="post_new.html">Post New</a></li>
								<li><a href="followed_posts.php">Followed Posts</a></li>
								<li><a href="posted_posts.php">Your Posts</a></li>
							</ul>
						</li>
						<li><a href="about.html">Alumni Connect</a></li>
						<li class="has-dropdown">
							<a href="contact.html">Student</a>
							<ul class="dropdown">
								<li><a href="#">Off-Campus Placement</a></li>
								<li><a href="#">Internship Opportunities</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="#">Internship Tools</a>
							<ul class="dropdown">
								<li><a href="#">LOM</a></li>
								<li><a href="#">CV Maker</a></li>
								<li><a href="#">Cover Letter</a></li>
							</ul>
						</li>
						<li><a href="preparation_zone.html">preparation Zone</a></li>
						<li class="btn-cta"><a href="#"><span>Login</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/Elegant_Background-9.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>preparation Zone</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	



<!-- 	<div class="fh5co-contact-info col-md-4 col-sm-4 col-xs-4 col-md-push-4">
		<h3>Companies</h3>
		<p>
			<ul>
				<center><li><a href="https://www.geeksforgeeks.org/" target="_blank">GeeksforGeeks</a></li></center>
			</ul>
		</p>
	</div> -->






<!-- <div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>List of companies</h3>
						<ul>
							<li class="octicon-arrow-right"><a href="tel://1881-227078">+91-1881-227078</a></li>
							<li class="octicon-arrow-right"><a href="mailto:shreyanshushekhar7@gmail.com">contact us</a></li>
							<li class="octicon-arrow-right"><a href="http://www.iitrpr.ac.in/" target="_blank">iitrpr.ac.in</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
				</div>
			</div>
			
		</div>
	</div>
</div> -->






<?php 
@ob_start();
// session_start();
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






$sql = "SELECT DISTINCT company_id,company_name, company_link, apply_date, interview_date, branch, message FROM company ORDER BY company_id DESC";
$result = $connection->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row    

	echo '
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>List of companies</h3>
						<ul>
	';

	$count = 0;
    while($row = $result->fetch_assoc()) 
    {
        // echo "id: " . $row['post_id']. " - Subject: " . $row['subject']. " -body " . $row['body']. " -link " . $row['link']. "<br>";

    	$count = $count + 1;

    	// $_SESSION['subject'] = $row['subject'];
    	// $_SESSION['body'] = $row['body'];


    	// $div_id = $row['post_id'];

    	echo '<li class="octicon-arrow-right"><a target = "_blank" href="'  . $row['company_link']. '">'  . $row['company_name']. '</a></li>';;
    	echo "<p>Last apply date is : " . $row['apply_date']. "</p>";
    	echo "<p>Interview starts from : " . $row['interview_date']. "</p>";
    	echo "<p>Branch : " . $row['branch']. "</p>";
    	echo "<p>" . $row['message']. "</p>";
    	echo '


			<button id="myBtn'.$row['company_id'].'" class="btn">More</button>

			<div id="myModal'.$row['company_id'].'" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <span class="close">&times;</span>
			    <p>'.$row['company_id'].'</p>
			  </div>

			</div>




			<script>

			var modal'.$row['company_id'].' = document.getElementById("myModal'.$row['company_id'].'");

			var btn'.$row['company_id'].' = document.getElementById("myBtn'.$row['company_id'].'");

			var span = document.getElementsByClassName("close")[0];

			btn'.$row['company_id'].'.onclick = function() {
			    modal.style.display = "block";
			}

			span.onclick = function() {
			    modal.style.display = "none";
			}

			window.onclick = function(event) {
			    if (event.target == modal'.$row['company_id'].') {
			        modal.style.display = "none";
			    }
			}

			</script>


    	';



    }

	    echo '
	    						</ul>
							</div>
						</div>
						<div class="col-md-6 animate-box">
						</div>
					</div>			
				</div>
			</div>
		</div>

	    ';
} 

else 
{
    echo "0 results";
}





/*
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

*/


 ?>


<!-- <script type="text/javascript">
	
	$('btn bttn').on('click', function() {
    if ($('p').attr('name') !== undefined) {
        alert($('p').attr('name'));
    }
})
</script>
 -->




<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>




<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn" class="btn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>


<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn1" class="btn">Open Modal</button>

<!-- The Modal -->
<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>





<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



// Get the modal
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal.style.display = "none";
    }
}
</script>



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
						<li><a href="preparation_zone.html">preparation Zone</a></li>
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

