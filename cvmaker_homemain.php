
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title>CV Maker:Text Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>

<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<link rel="stylesheet" type="text/css" href="css/dropify.css"/>

<link rel="stylesheet" type="text/css" href="css/cvmaker_home.css"/>

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


<script src="cvmaker_home.js" type="text/javascript"></script>
<script src="js/rating.js" type="text/javascript"></script> 
<script src="./js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="js/dropify.min.js" type="text/javascript"></script> 


</head>
  <body>        
<?php
          include ('test/Databaseconnection.php');

          $strSQL=mysqli_query($connection,$query);

          if( $strSQL ){
            while($row=mysqli_fetch_array($strSQL) ) {
              echo "<br>".$row['cv_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
            }

            echo "Error".$connection->error;
            echo "exec<br>";

          }
          else{
            echo "Error".$connection->error;

          }
?>
<!-- 
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>
 -->


<!--Navbar-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="Home" src=""></a>
    </div>

        
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
      <li>
        <label for="department" class="label">Department</label>
        <select class="select"  name ="department" required>
         <option value = "CSE" >CSE</option>
         <option value = "ME" >ME</option>
         <option value = "ME Dual" >ME Dual</option>
         <option value = "EE" >EE</option>
         <option value = "CE" >CE</option>
         <option value = "CH" >CH</option>
       </select>
     </li>
     <li>
      <label for="type" class="label">Type</label>
      <select class="select"  name ="type" required>
       <option value = "Reasearch" >Reasearch</option>
       <option value = "Industry" >Industry</option>
     </select>

     </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--/.Navbar-->

<div class="alert alert-danger alert-dismissible fade show hide " role="alert">
  <strong id="status" ></strong> <span id="message"></span>
  <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


    <div class="container-fluid">
      <span id="" class="heading"  >Your Templates</span>
      <div class="row flex-row flex-nowrap scroll  scroll" >
        

          <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body">
                    <form class="form" action="upload.php" method="post" enctype="multipart/form-data">
                      <div class="group">
                      <label for="department" class="label">Department</label>
                      <select class="select"  name ="department" required>
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
                      <select class="select"  name ="type" required>
                       <option value = "Reasearch" >Reasearch</option>
                       <option value = "Industry" >Industry</option>
                     </select>
                      </div>


                      <div class="group">
                      <label for="fileToUpload" class="label">Select file to upload:</label>
                      <input type="file" class="dropify"
                      name="fileToUpload" id="fileToUpload" data-max-file-size="3M" max-height="10em" required >

                      <input type="submit" class="button" value="Upload" name="submit">
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
            while($row=mysqli_fetch_array($strSQL) ) { ?>
             <!--  echo "<br>".$row['cv_id']." ".$row['time_updated']." ".$row['file_link']." ".$row['image']." ";
             -->
            <div class="col-3">
              <div class="card card-block ">
                <div class="card-content">
                  <div class="card-body" id="<?php echo $row['cv_id'];?>" >
                    <div class="container">
                      <div class="item">
                        <img class="card-img-top img-fluid" src="<?php echo $row['image']; ?>" alt="Card image cap">
                      </div>
                    </div>
                    <div class="options">
                        <ul class="option">
                          <li><i class="far fa-edit fa-2x "></i></li>
                          <li><i class="fa fa-trash fa-2x "></i></li>
                          <li><i class="far fa-edit fa-2x"></i></li>
                          <li> Share
                            <label class="switch">
                              <input type="checkbox">
                              <span class="slider round"></span>
                            </label>
                           <li> 

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
                    <p class="card-text">last updated<span class="meta_info"></span></p>
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

      </div>
      <span id="" class="heading" >CSE Templates</span>
       <form action="test.php" method="post">
      <div class="row flex-row flex-nowrap scroll ">
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          
      </div>
      <span id="" class="heading" >EE Templates</span>
       <form action="test.php" method="post">
      <div class="row flex-row flex-nowrap scroll ">
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          
      </div>                      </form>

      <span id="" class="heading" >ME Templates</span>
       <form action="test.php" method="post">
      <div class="row flex-row flex-nowrap scroll ">
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
                                </div>
      </div>
      <span id="" class="heading" >CE Templates</span>
       <form action="test.php" method="post">
      <div class="row flex-row flex-nowrap scroll ">
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          
      </div>                      </form>
      <span id="" class="heading" >CH Templates</span>
       <form action="test.php" method="post">
      <div class="row flex-row flex-nowrap scroll ">
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
             </div>
          <div class="col-3">
              <div class="card card-block"><div class="card" >
                  <img class="card-img-top img-fluid" src="" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">CV4 </h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in
                      to additional content.</p>
                    <p class="card-text">

                      <small class="text-muted">3 </small>
                      
           
                    </p>
                  </div>
                </div>
              </div>
          </div>
      </div>    
    </form>
  </div>


 </body>

</html>
