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

   
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>

<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<link rel="stylesheet" type="text/css" href="css/cvmaker_home.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">



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

<script src="./js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

<script src="cvmaker_home.js" type="text/javascript"></script>
<script src="js/rating.js" type="text/javascript"></script> 


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>


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
<div class="alert alert-danger alert-dismissible fade show " role="alert">
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
                  <img class="card-img-top img-fluid" src="" alt="Upload Files">
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
                      <input type="file" class="button"
                      name="fileToUpload" id="fileToUpload" required >

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
                  <img id="zooming" class="card-img-top img-fluid" height="120%" width="120%"  src="<?php echo $row['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <div id="" class="rate_widget">
                      <img class="star_1 ratings_stars img-responsive" src="./images/star.png" ></img>
                      <img class="img-responsive star_2 ratings_stars" src="./images/star.png" ></img>
                      <img class="img-responsive star_3 ratings_stars" src="./images/star.png" ></img>
                      <img class="img-responsive star_4 ratings_stars" src="./images/star.png" ></img>
                      <img class="img-responsive star_5 ratings_stars" src="./images/star.png" ></img>
                    </div>
                    <br>
                    <br>
                    <br>
                    <p class="card-text">last updated</p>
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
