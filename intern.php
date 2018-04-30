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
       
    Website:         http://freehtml5.co/
    Email:             info@freehtml5.co
    Twitter:         http://twitter.com/fh5co
    Facebook:         https://www.facebook.com/fh5co

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
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="drp-dwn.css">

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
                        <li><a href="latest_feeds.php">Latest Feeds</a></li>
                        <li><a href="about.html">Alumni Connect</a></li>
                        <li class="has-dropdown">
                            <a href="services.html">Student</a>
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
                        <li><a href="contact.html">Prepration Zone</a></li>
                        <li class="btn-cta"><a href="#"><span>Login</span></a></li>
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
              <h1>Internship opportunities</h1>
              <div class="row">
                <form class="form-inline" id="fh5co-header-subscribe">
                  <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                      <!-- <input type="text" class="form-control" id="email" placeholder="Enter your email"> -->
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
                    




<div id="fh5co-core-feature" style="width:100%;">
    <div class="container" style="width:100%;">
      <div class="row" style="width:100%;">
        <center>
                    <form action="internAfterFilter.php" align="center" style="margin-bottom:10px;">
                          <!--<p> SORT BY: </p>-->
                          <div id="search_categories">
                        <select name="byYear">
                          <option value="">--Year--</option>        
                          <option value="1">1st year</option>
                          <option value="2">2nd year</option>
                          <option value="3">3rd year</option>
                          <option value="4">4th year</option>
                        </select>
                        <select name="byMonth">
                          <option value="">--Duration--</option>        
                          <option value="1">1 month</option>
                          <option value="2">2 months</option>
                          <option value="3">3 months</option>
                          <option value="4">4 months</option>
                        </select>
                          <select name="byBranch">
                          <option value="">--Branch--</option>
                          <option value="cse">Computer Science</option>
                          <option value="ee">Electrical Engg.</option>
                          <option value="me">Mechanical Engg.</option>
                          <option value="ce">Civil Engg.</option>
                        </select>
                        <select name="summerORwinter">
                          <option value="">--Summer/Winter--</option>
                          <option value="1">Summer Internship</option>
                          <option value="0">Winter Internship</option>
                        </select>
                        <select name="abroadORnot">
                          <option value="">--Abroad/Domestic--</option>
                          <option value="1">Abroad internship</option>
                          <option value="0">Domestic internship</option>
                        </select>
                        </div>
                      <button type="submit" class="btn btn-default" style="margin-top:20px;margin-bottom:20px;">Submit</button>
                    </form>
                        
                     <table id="sahilTable" width="80%">
                       
                      <tr>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Location</th>
                        <th>Summer/Winter</th>
                        <th>Website</th>
                      </tr>
                      <?php
                          include('databaseConnection.php');
                          $result = mysqli_query($connection,"select * from `internshipTable`");
                          while ($row = $result->fetch_assoc()) {
                              $name = $row['name'];
                              $duration = $row['duration'];
                              $department = $row['department'];
                              $year = $row['year'];
                              $place = $row['place'];
                              $time = $row['time'];
                              $website = $row['website'];
                              if($duration=='1')    $duration = $duration." month";
                              else $duration = $duration." months";
                              if($year=='1')    $year = $year."st year";
                              else if($year=='2')    $year = $year."nd year";
                              else if($year=='3')    $year = $year."rd year";
                              else if($year=='4')    $year = $year."th year";
                              if($time=='1')    $time = "Summer";
                              elseif($time=='0')    $time = "Winter";
                           

                                  echo "<tr>";
                                  echo "<td>" . $name . "</td>";
                                  echo "<td>" . $duration . "</td>";
                                  echo "<td>" . $department . "</td>";
                                  echo "<td>" . $year . "</td>";
                                  echo "<td>" . $place . "</td>";
                                  echo "<td>" . $time . "</td>";
                                  echo "<td><a href='" . $website . "'>" . $website . "</a></td>";

                                  echo "</tr>";

                      
                        }
                      ?>
                    </table>
                </center>
                <center>
                  <h3 style='margin-top:20px;'>Got an internship detail?</h3>
                  <a href='addtodb.php' style="font-size:25px;">click here</a>
                </center>
      </div>
    </div>
  </div>




<div id="fh5co-servicessahil" class="fh5co-bg-sectionsahil">
        <div class="containersahil" style="margin-top:200px;margin-bottom:200px;">
            <div class="rowsahil" >
                    
            </div>
        </div>
</div>











    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-4 fh5co-widget">
                    <h3>King.</h3>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p><a href="#">Learn More</a></p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Meetups</a></li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Handbook</a></li>
                        <li><a href="#">Held Desk</a></li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">Find Designers</a></li>
                        <li><a href="#">Find Developers</a></li>
                        <li><a href="#">Teams</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>
            </div>

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    </div>

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

