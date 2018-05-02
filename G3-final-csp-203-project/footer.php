<footer id="fh5co-footer" role="contentinfo" style="background-image:url(images/Elegant_Background-7.jpg);">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>TnP Student Portal</h3>
					<p>A platform where you can share you exprience.  Explore more...</p>
					<p>
						<?php if(isset($_SESSION['name'])): echo $_SESSION['name']; ?>
						<?php else: ?>
							<a href="login.php">Register Yourself</a></p>
						<?php endif; ?>
				</div>


				<?php if(isset($_SESSION['person_id'])): ?>
					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="index.php">Home</a></li>
							<li><a href="search.php">Alumni Connect</a></li>
							<li><a href="placement.php">Off-Campus Placement</a></li>
							<li><a href="intern.php">Internship Opportunities</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="latest_feeds.php">Latest Feeds</a></li>
							<li><a href="post_new.php">Post New</a></li>
							<li><a href="followed_posts.php">Followed Posts</a></li>
							<li><a href="posted_posts.php">Your Posts</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="TnpCell/lommaker_home.php">CV Maker</a></li>
							<li><a href="TnpCell/cvmaker_home.php">LOM</a></li>
							<li><a href="TnpCell/cv_lettermaker_home.php">Cover Letter</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="preparation_zone.php">preparation Zone</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				<?php else: ?>
					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="index.php">Home</a></li>
							<li><a href="search.php">Alumni Connect</a></li>
							<li><a href="placement.php">Off-Campus Placement</a></li>
							<li><a href="intern.php">Internship Opportunities</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="TnpCell/login.php">Latest Feeds</a></li>
							<li><a href="TnpCell/login.php">Post New</a></li>
							<li><a href="TnpCell/login.php">Followed Posts</a></li>
							<li><a href="TnpCell/login.php">Your Posts</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="TnpCell/login.php">CV Maker</a></li>
							<li><a href="TnpCell/login.php">LOM</a></li>
							<li><a href="TnpCell/login.php">Cover Letter</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="preparation_zone.php">preparation Zone</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			


			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2018 TnP@IITRopar. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="about.php">IIT Ropar 2<sup>nd</sup> year team</a></small>
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

