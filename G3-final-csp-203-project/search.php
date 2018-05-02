<?php
include 'session.php';
?>
  
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
  <link rel="stylesheet" href="alumni_table.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

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



 
    <center>
      <h3 style='margin-top:20px;'>Looking for alumni? </h3>
<form action="search.php" class="form-inline" role = "form" align="center" method="post">
      <p>Just apply the filters below!</p>

      <div class="form-group">
      <input type="text" name="byName" placeholder="Name">
<!--
      <select name="byName">
        <option value="none">Name</option>;
     <?php
          include('connect.php');
          $result = mysqli_query($conn,"SELECT DISTINCT Name FROM `alumni` WHERE 1");
           while ($row = $result->fetch_assoc()) {
              echo "<option value = \"".$row["Name"]."\">".$row["Name"]."</option>";
              //echo "Hello World!!";
             // echo $row["year"] + 'b<r>';
           }
      ?>
      -->
    </div>
    </select> 


      <div class="form-group">
      <select name="byYear">

        <option value="none">Year</option>;
     <?php
          include('connect.php');
          $result = mysqli_query($conn,"SELECT DISTINCT year FROM `alumni` WHERE 1");
           while ($row = $result->fetch_assoc()) {
              echo "<option value = \"".$row["year"]."\">".$row["year"]."</option>";
              //echo "Hello World!!";
             // echo $row["year"] + 'b<r>';
           }
      ?>
      <!-- 

      <option value="">Your year</option>         
      <option value="1">1st year</option>
      <option value="2">2nd year</option>
      <option value="3">3rd year</option>
      <option value="4">4th year</option>
      -->
    </select> 
  </div>
  <div class="form-group">
      <select name="byBranch">

        <option value="none">Branch</option>;
          <?php
          include('connect.php');
          $result = mysqli_query($conn,"select DISTINCT Department from alumni where 1");
           while ($row = $result->fetch_assoc()) {
              echo "<option value = \"".$row["Department"]."\">".$row["Department"]."</option>";
              //echo "Hello World!!";
             // echo $row["year"] + 'b<r>';
           }
      ?>

        <!--
      <option value="">Branch</option>
      <option value="cse">Computer Science</option>
      <option value="ee">Electrical Engg.</option>
      <option value="me">Mechanical Engg.</option>
      <option value="ce">Civil Engg.</option>
    -->
    </select> 
  </div>
  <div class="form-group">
      <select name="byCompany">

        <option value="none">Company</option>;
          <?php
          include('connect.php');
          $result = mysqli_query($conn,"select DISTINCT Company from alumni where 1");
           while ($row = $result->fetch_assoc()) {
              echo "<option value = \"".$row["Company"]."\">".$row["Company"]."</option>";
              //echo "Hello World!!";
             // echo $row["year"] + 'b<r>';
           }
      ?>

        <!--
      <option value="">Branch</option>
      <option value="cse">Computer Science</option>
      <option value="ee">Electrical Engg.</option>
      <option value="me">Mechanical Engg.</option>
      <option value="ce">Civil Engg.</option>
    -->
    </select> 
   
<div class="form-group">
  <input type="submit" value="Submit">
</div>
</form>
    </center>

<br><br>
<center>
  <div class="table-users">
    <div class="header">Alumni</div>
 <table width="100%" cellspacing="0">
  <tr>
    <th>Name</th>
    <th>Department</th>
    <th>Year</th>
    <th>Email</th>
    <th>Company</th>
    <th>Post</th>
    <th>Address</th>
    <th>PhoneNumber</th>
  </tr>

  <?php

    if(isset($_POST['byName']) AND isset($_POST['byBranch']) AND isset($_POST['byYear']) AND isset($_POST['byCompany'])){
        $nm = $_POST['byName'];
        $bb = $_POST['byBranch'];
        $by = $_POST['byYear'];
        $cm = $_POST['byCompany'];

        include('connect.php');
        $que = "select * from alumni where 1";
        if($nm != "none"){
          $que .= " and Name Like '%".$nm."%'";
        }


        if($bb != "none"){
          $que .= " and Department = '".$bb."'";
        }


        if($by != "none"){
          $que .= " and Year = ".$by;
        }

        if($cm != "none"){
          $que .= " and Company = '".$cm."'";
        }

        //echo $que;

          $result = mysqli_query($conn,$que);
           while ($row = $result->fetch_assoc()) {
              //echo "<option value = \"".$row["Department"]."\">".$row["Department"]."</option>";
              //echo "Hello World!!";
             // echo $row["year"] + 'b<r>';
              $name1 = $row["Name"];
              $Department1 = $row["Department"];
              $Year1 = $row["Year"];
              $Email1 = $row["Email"];
              $Company1 = $row["Company"];
              $Post1 = $row["Post"];
              $Address1 = $row["Address"];
              $Phone1 = $row["Phone Number"];
              echo "<tr> ";
              echo "<td>".$name1."</th>";
              echo "<td>".$Department1."</th>";
              echo "<td>".$Year1."</th>";
              echo "<td>".$Email1."</th>";
              echo "<td>".$Company1."</th>";
              echo "<td>".$Post1."</th>";
              echo "<td>".$Address1."</th>";
              echo "<td>".$Phone1."</th>";


              echo "</tr>";
           }
         }
  ?>

  
</table> 
</div>
</center>
<center>
  <br>
                  <h3 style='margin-top:20px;'>Are you an alumnus?</h3>
                  <a href='add.php' style="font-size:25px;">Fill in your details here</a>
                </center>

<?php
include 'footer.php';
?>
