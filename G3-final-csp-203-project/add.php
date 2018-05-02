
<?php
include 'session.php';
?>

<!DOCTYPE html>
<html>
  
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
    
  Website:    http://freehtml5.co/
  Email:      info@freehtml5.co
  Twitter:    http://twitter.com/fh5co
  Facebook:     https://www.facebook.com/fh5co

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity=" sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
					<div id="fh5co-logo">
						<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>
					</div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<?php if(isset($_SESSION['person_id'])): ?>
							<li class="has-dropdown">
								<a href="latest_feeds.php">Latest Feed</a>
								<ul class="dropdown">
									<li><a href="post_new.php">Post New</a></li>
									<li><a href="followed_posts.php">Followed Posts</a></li>
									<li><a href="posted_posts.php">Your Posts</a></li>
								</ul>
							</li>
							<li><a href="search.php">Alumni Connect</a></li>
							<li class="has-dropdown">
								<a href="#">Student</a>
								<ul class="dropdown">
									<li><a href="placement.php">Off-Campus Placement</a></li>
									<li><a href="intern.php">Internship Opportunities</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="#">Internship Tools</a>
								<ul class="dropdown">
									<li><a href="TnpCell/lommaker_home.php">LOM</a></li>
									<li><a href="TnpCell/cvmaker_home.php">CV Maker</a></li>
									<li><a href="TnpCell/cv_lettermaker_home.php">Cover Letter</a></li>
								</ul>
							</li>
							<li><a href="preparation_zone.php">preparation Zone</a></li>
						<?php else: ?>
							<li class="has-dropdown">
								<a href="TnpCell/login.php">Latest Feed</a>
								<ul class="dropdown">
									<li><a href="TnpCell/login.php">Post New</a></li>
									<li><a href="TnpCell/login.php">Followed Posts</a></li>
									<li><a href="TnpCell/login.php">Your Posts</a></li>
								</ul>
							</li>
							<li><a href="search.php">Alumni Connect</a></li>
							<li class="has-dropdown">
								<a href="#">Student</a>
								<ul class="dropdown">
									<li><a href="placement.php">Off-Campus Placement</a></li>
									<li><a href="intern.php">Internship Opportunities</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="TnpCell/login.php">Internship Tools</a>
								<ul class="dropdown">
									<li><a href="TnpCell/login.php">LOM</a></li>
									<li><a href="TnpCell/login.php">CV Maker</a></li>
									<li><a href="TnpCell/login.php">Cover Letter</a></li>
								</ul>
							</li>
							<li><a href="preparation_zone.php">preparation Zone</a></li>
						<?php endif; ?>


						<?php if(!isset($_SESSION['person_id'])): ?>
							<li class="btn-cta"><a href="TnpCell/login.php" id="login"><span>Login</span></a></li>
						<?php else: ?>
							<li class="btn-cta"><a href="TnpCell/logout.php" id="logout"><span>Logout</span></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/Elegant_Background-9.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>TnP Portal</h1>
							<!-- <h2>Get latest updates on <a href="index.php" target="_blank">TnP Portal</a></h2> -->
							<div class="row">
								<form class="form-inline" id="fh5co-header-subscribe">
									<div class="col-md-8 col-md-offset-4">
										<div class="form-group">
											<!-- <input type="text" class="form-control" id="email" placeholder="Enter your email"> -->
											<div class="col-md-6 col-sm-6">
												<?php if(isset($_SESSION['person_id'])): ?>
												<?php else: ?>
													<a href="TnpCell/login.php" class="btn btn-default btn-block">Register Now</a>
												<?php endif; ?>
											</div>										
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>s
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div>

        <div class="containerakshat" style="margin-top:200px;margin-bottom:200px;">
            <div class="rowakshat">
<div id='formakshat'><center>

                <form  style = "width: 60%" action="" method="Post" id="formakshat">
                    <div class="form-group">
                      <h3>Please fill your details below</h3>
                    <input type="text" class = "form-control" id="exampleFormControlInput1" name="idName" placeholder="Enter name" value ="" required>
                    </div>
                    <div class="form-group">
                    <input type="text" class = "form-control"  name="idYear" placeholder="Year of Passing" value ="" required>
                  </div>
                      <div class="form-group">
                        <select name="idBranch" class="form-control" id="exampleFormControlSelect1" value ="" required>
                          <option value="">--Department--</option>
                          <option value="CSE">Computer Science and Engineering</option>
                          <option value="EE">Electrical Engineering</option>
                          <option value="ME">Mechanical Engineering</option>
                          <option value="CE">Civil Engineering</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class = "form-control" name="idEmail" placeholder="Email" value ="" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class = "form-control"  name="idCompany" placeholder="Company" value ="" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class = "form-control"  name="idPost" placeholder="Post" value ="" required>
                      </div>
                      <div class="form-group">
                       <input type="text" class = "form-control" name="idAddress" placeholder="Address"  value ="" required>
                        </div>
                        <div class="form-group">
                        <input type="text" name="idPhone" class = "form-control" placeholder="Contact Number" value ="" required>
                  </div>
                    <input type="submit" class = "btn btn-primary" name="update" value="Submit" value ="" required>
                </form>
            </center>
            
    </div>
</div>
</div>
</div>


<?php
    include 'footer.php';
   include('connect.php'); 
              if($_SERVER["REQUEST_METHOD"]=="POST")
              {
                      if($_POST["update"]){ 
                        $query = "insert into alumni values('" . $_POST['idName'] . "','" . $_POST['idBranch'] . "'," . $_POST['idYear'] . ",'" . $_POST['idEmail'] . "','" . $_POST['idCompany'] . "','" . $_POST['idPost'] . "','" . $_POST['idAddress'] ."','" . $_POST['idPhone']. "')";

                        $query_dup = "select * from `alumni` where `Name` ='" . $_POST['idName'] . "' and `Department`='" .$_POST['idBranch'] . "' and `Year`=" .$_POST['idYear'] . " and Email='" .$_POST['idEmail'] . "' and `Company`='" .$_POST['idCompany'] . "' and `Post`='" .$_POST['idPost'] . "' and `Address`='" .$_POST['idAddress'] . "' and `Phone Number`=" .$_POST['idPhone'] . "";
                        #echo $query_dup;
                        $result_dup = mysqli_query($conn,$query_dup);
                        if(mysqli_num_rows($result_dup)!=0)
                        {
                           echo "<script type='text/javascript'>alert('This entry already exists')</script>";
                        }
                        else
                        {
                           $result = mysqli_query($conn,$query);
                           echo "<script type='text/javascript'>alert('Submitted successfully!')</script>";
                        }

              }}
            ?>

