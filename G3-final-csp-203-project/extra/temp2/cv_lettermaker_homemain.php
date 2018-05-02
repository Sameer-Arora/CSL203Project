
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title>Cover Letter Maker:Text Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>

<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<link rel="stylesheet" type="text/css" href="css/dropify.css"/>

<link rel="stylesheet" type="text/css" href="css/cvmaker_home.css"/>

<link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

  <!-- jQuery UI Widget and Effects Core (custom download)
     You can make your own at: http://jqueryui.com/download -->
  <script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
  
  <!-- Latest version of jQuery Mouse Wheel by Brandon Aaron
     You will find it here: http://brandonaaron.net/code/mousewheel/demos -->
  <script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>

  <!-- jQuery Kinetic - for touch -->
  <script src="js/jquery.kinetic.min.js" type="text/javascript"></script>

  <!-- Smooth Div Scroll 1.3 minified -->
  <script src="js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>


<script src="cv_lettermaker_home.js" type="text/javascript"></script>
<script src="js/ratingcv_letter.js" type="text/javascript"></script> 
<script src="js/sharingcv_letter.js" type="text/javascript"></script> 
<script src="./js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/dropify.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="slick/slick.min.js"></script>


</head>
  <body>        
<!-- 
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>
 -->

<div class="alert alert-danger alert-dismissible fade show hide " role="alert">
  <strong id="status" ></strong> <span id="message"></span>
  <button type="button" class="close" data-hide="alert"  aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!--Navbar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Search for Cover Letter's</a>
    </div>

    <form class="navbar-form navbar-right form" role="search" method ="get" action="">

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li>
            <div class="group">
            <select class="select"  name ="department" required>
             <option value = "" ><center>--Department--</center></option>
             <option value = "CSE" >CSE</option>
             <option value = "ME" >ME</option>
             <option value = "ME Dual" >ME Dual</option>
             <option value = "EE" >EE</option>
             <option value = "CE" >CE</option>
             <option value = "CH" >CH</option>
            </select>
            </div>
         </li>
         <li>
          <div class="group">
            
          <select class="select"  name ="type" required>
           <option value = "" >--Type--</option>
           <option value = "Latex" >Latex</option>
           <option value = "Docx" >Docx</option>
         </select>
          </div>

       </li>

       <li class="form-group active">
        <input type="text" name="author" class="form-control" placeholder="Search by Author Name">
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <button type="submit" class="btn btn-default">Submit</button>
    </ul>

  </form>

    </div>
  </div>
</nav>
    
    <div class="container-fluid">
      <span id="" class="heading"  ><center><h1 class="intro-header" data-aos="fade-up">Your Templates</h1>           
</center></span>
      <div id="your" class="row flex-row flex-nowrap scroll" >
        
          <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body">

                    <form class="form" id="upload" action="upload_cv_letter.php" method="post" enctype="multipart/form-data">

                      <div class="group">
                      <label for="department" class="label">Department</label>
                      <select class="select department"  name ="department" required>
                       <option value = "CSE" >CSE</option>
                       <option value = "ME" >ME</option>
                       <option value = "ME Dual" >ME Dual</option>
                       <option value = "EE" >EE</option>
                       <option value = "CE" >CE</option>
                       <option value = "CH" >CH</option>
                     </select>
                      </div>

                      <div class="group">
                      <label for="type" class="label">Type</label>
                      <select class="select type"   name ="type" required>
                       <option value = "Docx" >Docx</option>
                       <option value = "Latex" >Latex</option>
                     </select>
                      </div>


                      <div class="group">
                      <label for="fileToUpload" class="label">Select to upload docx file:</label>
                      <input type="file" class="dropify"
                      name="fileToUpload" id="fileToUpload" data-max-file-size="3M" max-height="10em" required pattern="^[a-zA-Z0-9_]+$" title="Enter a valid filename with no spaces." data-allowed-file-extensions="docx pdf" >
                    <input type="submit" class="button" value="Upload" name="submit">
                      </div>

                    <div class="group added" >
                      <label for="latexfile" class="label">Upload zip latex files :</label>
                      <input type="file" class="dropify"
                      name="latexfile" id="latexfile" data-max-file-size="9M" max-height="8em" pattern="^[a-zA-Z0-9_]+$" title="Enter a valid filename with no spaces." data-allowed-file-extensions="zip tar.gz">
                    </div>

                      
                  </form>
                  </div>
                </div>
              </div>
          </div>

          <?php
          include ('test/Databaseconnection.php');

          $strSQL=mysqli_query($connection,$query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { 
             #echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             ?>
            
            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><i class="fa fa-trash fa-2x "></i></li>
                          <?php if($row['type']=='Docx'){?>
                            <li><form action="CV_maker.php" method="post"><i class="fa fa-edit fa-2x "></i></form></li>
                          <?php }?>
                          <li> Share
                            <label class="switch">
                              <?php 
                              $checked="";
                              if($row['share_option']==1)
                                $checked="checked";
                              ?>
                              <input type="checkbox" <?php echo $checked; ?> >
                              <span class="slider round"></span>
                            </label>
                           </li> 
                          </ul>
                    </div><!-- /.container-fluid -->

                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <p class="card-text">last uploaded:-  <span class="meta_info"><?php echo $row['time_updated'] ?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }
          }
          ?>

      </div>
    </div>

          <!-- <button class="slick-prev slick-arrow" aria-label="Previous" type="button" aria-disabled="false" style="">Previous</button>
        
        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="" aria-disabled="false">Next</button>
        
           -->

<?php if(isset($_GET['department'])){?>
    
      <span id="" class="heading"  ><center><h1 class="intro-header" data-aos="fade-up">Search Results</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
      <?php
          include ('test/Databaseconnection.php');

          $strSQL=mysqli_query($connection,$search_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>
             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->
             <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="<?php echo $row['file_link']; ?>" class="downloads" ><i class="fa fa-download fa-2x "></i></a></form></li>
                        </ul>
                    </div>
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated: <?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>
            
            <?php }
          }
          ?>

      </div>

<?php } ?>
    

      <span id="" class="heading" ><center><h1 class="intro-header" data-aos="fade-up">CSE Templates</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
          <?php
          
          $strSQL=mysqli_query($connection,$cse_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>

             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->

            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="<?php echo $row['file_link']; ?>" class="downloads" ><i class="fa fa-download fa-2x "></i></a></form></li>
                        </ul>
                    </div><!-- /.container-fluid -->
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated: <?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          }
          ?>

          
      </div>

      <span id="" class="heading" ><center><h1 class="intro-header" data-aos="fade-up">EE Templates</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
          <?php
          
          $strSQL=mysqli_query($connection,$ee_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>

             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->

            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="" class="downloads"><i class="fa fa-download fa-2x "></i></a></form></li>
                          </ul>
                    </div><!-- /.container-fluid -->
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated:<?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          }
          ?>
      </div>
          
                   

      <span id="" class="heading" ><center><h1 class="intro-header" data-aos="fade-up">ME Templates</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
          <?php
          
          $strSQL=mysqli_query($connection,$me_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>

             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->

            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="" class="downloads"><i class="fa fa-download fa-2x "></i></a></form></li>
                          </ul>
                    </div><!-- /.container-fluid -->
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated:<?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          }
          ?>
      </div>
      
      <span id="" class="heading" ><center><h1 class="intro-header" data-aos="fade-up">CH Templates</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
          <?php
          
          $strSQL=mysqli_query($connection,$ch_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>

             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->

            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="" class="downloads"><i class="fa fa-download fa-2x "></i></a></form></li>
                          </ul>
                    </div><!-- /.container-fluid -->
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated:<?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          }
          ?>
      </div>
      
      <span id="" class="heading" ><center><h1 class="intro-header" data-aos="fade-up">MED Templates</h1></center></span>
      <div class="row flex-row flex-nowrap scroll ">
          <?php
          
          $strSQL=mysqli_query($connection,$med_query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) { ?>

             <!--  echo "<br>".$row['cv_letter_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->

            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_letter_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><form method="post" action="download_cv_letter.php" class="download"><a href="" class="downloads"><i class="fa fa-download fa-2x "></i></a></form></li>
                          </ul>
                    </div><!-- /.container-fluid -->
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div  class="rate_widget" >
                      <img class=" ratings_stars img-responsive star_1" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_2" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_3" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_4" src="./images/star.png" ></img>
                      <img class="img-responsive  ratings_stars star_5" src="./images/star.png" ></img>
                      <div class="total_votes"></div>
                    </div>
                    <p class="card-text">last updated:<?php echo $row['time_updated']?> </p>
                  </div>
                </div>
              </div>
            </div>

            <?php }
          }
          ?>
      </div>
      
  </div>

<?php include('footer.php'); ?>

 </body>

</html>
