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
						<li><a href="preparation_zone.php">preparation Zone</a></li>
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



<?php
	include 'companies.php';
?>




	
	<div id="fh5co-services">
		<div class="container-fluid">
			<div class="col-sm-12 animate-box">
				<div class="feature-center">
					<div class="desc">
						<h3>Attire</h3>
						<ul>
							<li>Get your own one pair of formal shirts(prefered colors: white, light-blue, light-pink, etc..), one formal pant and formal shoes.</li>
							<li>Tie is optional.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-12 animate-box">
				<div class="feature-center">
					<div class="desc">
						<h3>Resume</h3>
						<ul>
							<li>Resume should be of one page only.</li>
							<li>Use only black and/or blue color font in resume.</li>
							<li>Make your resume in latex only.</li>

							<li>Put your github, linkedin profile links on resume.</li>
							<li>If you have good ratings on codechef or any other site, do mention your profile link.</li>
							<li>Mention at least 2 projects on resume so that you have something to discuss with interviewer.</li>
							<li>3 projects on resume looks ideal, 2 projects is also fine if you have done some internship.</li>
							<li>Make hyperlink to corresponding github repository for all the projects you mention in your resume.</li>

							<li>Keep your resume along with all grade sheets scanned on drive with link sharing on.</li>
							<li>Keep all your grade-sheets along with hard copy of resume in one file.</li>
							<li>Keep at least 3 printed hard-copy of resume ready.</li>


							<li>Don’t bluff in resume about anything you haven’t done or you don’t know, HRs are smarter than you think they are :p</li>
							<li>Know your resume well, without looking over your resume you should be able to tell what is mentioned where on resume.</li>
							<li>You should be blindly able to walk through your complete resume.</li>
							<li>Get your resume reviewed by at least three people, at least one of those three should be someone senior to you.</li>
							<li>Don’t leave any typo and/or grammatical error in your resume whatsoever.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-10 animate-box">
				<div class="feature-center">
					<div class="desc">
						<h3>Coding Round</h3>
						<ul>
							<li>For most of the top companies visiting our campus <a href="https://www.geeksforgeeks.org/">geeksforgeeks</a> is more than enough for practice.</li>
							<li>If you are aiming too high(off-campus) like codenation, google, tower research, etc… geeksforgeeks is not enough. Visit <a href="https://leetcode.com/">leetcode</a> and/or <a href="https://www.interviewbit.com/">interviewbit</a>.</li>

							<li>Generally coding round consists of only data structures and algorithm coding problems.</li>
							<li>Many companies do ask multiple choice questions from aptitude and core computer science.</li>
							<li>At most 50% weightage is given to multiple choice questions, at least 50% weightage is given to coding questions.</li>

							<li>Coding questions generally are function based problems, you just need to complete the function.</li>
							<li>Coding questions generally lies around arrays, linked list and binary tree.</li>
							<li>During coding round copy is blocked which means ctrl + c, ctrl + x, ctrl + v won’t work on their platforms.</li>
							<li>Carefully look over selected language before you start writing code as copying is blocked.</li>
							<li>Don’t try to open new tab or terminal or anything else, browser will detect that and that incident will be reported, it can backfire to you.</li>


							<li>Sometimes test cases are weak, brute force solution may pass. If you are unable to device efficient solution then there is no harm in trying brute force solution. Amaz*n is well known to give poor test cases :p</li>

							<li>Aptitude question generally lies closer to basic maths and some probability. GS and go-jek are well known for this.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-10 animate-box">
				<div class="feature-center">
					<div class="desc">
						<h3>Face to Face Technical Round</h3>
						<ul>
							<li>This round is aimed to check your thought process.</li>
							<li>Thinking out loud is must, you need to speak out every thought you are getting in your head. (This is key to clear this round)</li>
							<li>Ask all the questions you have related to the problem given to you. For ex. In what range input numbers will be, how many numbers, how big n will be, etc… Asking questions is a good sign.</li>
							<li>Getting a question about which you have no idea at first sight is very common in face to face round, don’t panic. Stay calm and have faith in yourself.</li>
							<li>Don’t give instant answer to the problem given to you.</li>
							<li>Always give a brute force solution first then give the optimized solution.</li>
							<li>Try to be as much polite as you can, tone matters here, don’t have a rude tone.</li> 
							<li>If you are not getting any idea of approaching the problem try asking for hints indirectly, it’s up to you how you ask for a hint from him :-) Interviewer generally gives at least one hint for all problems.</li>
							<li>This round goes for generally 45-60 minutes. Generally only 2 questions are asked.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-10 animate-box">
				<div class="feature-center">
					<div class="desc">
						<h3>Face to Face HR Round</h3>
						<ul>
							<li>Prepare answers for following questions:
								<ul>
									<li>Tell me about yourself.</li>
									<li>Why should we hire you.</li>
									<li>Why microsoft.</li>
								</ul>
							</li>
							<li>Don’t copy answer for these questions from quora or internet. Interviewer will easy catch copied answer. Having your own unique answers helps in standing you out from crowd.</li>
							<li>Prepare answers for following questions for each mentioned project in your resume
								<ul>
									<li>What portion of this project was done by you. (If it was a team project)</li>
									<li>What differences will be there if you do the same project today.</li>
								</ul>
							</li>
							<li>Try to show a genuine interest and passion to work for that particular company.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>



<!-- 	<div class="fh5co-contact-info">
		<p>
			<ul>
				<center><li><a href="https://www.geeksforgeeks.org/" target="_blank">GeeksforGeeks</a></li></center>
			</ul>
		</p>
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

