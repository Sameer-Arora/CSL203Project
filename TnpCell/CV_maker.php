<?php

include ('session.php');

$doc_added=false;

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

if(isset($_POST['cv_id'])){
  include('./test/Databaseconnection.php');

  function run_query($connection,$query) {
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if( $strSQL ){
      $executed=true;
      echo "<br>"."Error".$connection->error;
      echo "<br>"."exec<br>";
    }else{
      echo "<br>"."Error".$connection->error;
    }
    return $executed;
  }

  $cv_id   = mysqli_real_escape_string($connection,$_POST['cv_id']);
  $query ="Select * from cv  where cv_id='".$cv_id;

  $execute=run_query($connection,$query);

  if($execute==false){
    $message = "cannot execute insert!! ";
    echo "<br>".$message;
  }else{
    $message="Updated, file already exists.";
    echo "<br>"."Updated, file already exists.";
    putenv('HOME=/var/www/html/CSL203Project/TnpCell/uploads/'.$_SESSION['name'].$_SESSION['person_id']."/cv/");


  }



}

?>


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
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=r67knjg64nu28dm3xphpc1vtt89whaxzywux529he8gynb75'></script>
        <link href="css/content.css" rel="stylesheet" type="text/css"/>
        <link href="css/document.css" rel="stylesheet" type="text/css"/>
        <script>
        tinymce.init({
          selector: '#mytextarea',
          
          autoresize_min_height:800,
          // apply skin skin_url:'https://tinymceplugins.com/plugins/pepper-grinder-skin',
            plugins: [
           'autoresize advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
           'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
           'save table contextmenu directionality emoticons template paste textcolor','code'
         ],
         menubar:"file save edit view insert format tools table",
         toolbar: 'insertfile save undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor |code',
               image_list: [
            {title: 'My image 1', value: 'https://www.tinymce.com/my1.gif'},
            {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
          ], 
      autoresize_bottom_margin: 50,  autoresize_max_height: 10000,
      autoresize_overflow_padding: 50,autoresize_on_init: false,
      image_caption:true, 
      browser_spellcheck: true,
      contextmenu: true, 
      init_instance_callback : function(editor) {
        console.log("Editor: " + editor.id + " is now initialized.");
        var init_data=;

      },
      branding: false
      });
        </script>
    </head>
    <body> 
   <!--  <div>
        <div class="box" id="<?php echo ""; ?>">
                <div class="image fit">
                        <?php if($row['image_url'] == null) { ?>
                        <img src="images/pic02.jpg" alt="" id="news-image1" class="img-thumbnail img-responsive"/>
                        <?php } else{?>
                                <img src="<?php echo $row['image_url']; ?>" alt="" id="news-image1"/>	
                        <?php } ?>
                </div>
                <div class="content">
                        <header class="align-center">
                        
                                <h2 id="news-title1"><?php echo $row['title']; ?></h2>
                        </header>
                        <p id="news-content1"> <?php echo substr($row['content'], 0, 200); ?> . . .</p>
                        <footer class="align-center">
                                <a href="<?php echo $row['url']; ?>" class="button alt" id="news-link1">Learn More</a>
                        </footer>
                </div>
        </div>
    </div> 
  -->
        <form method="post" class="document" action="save_doc.php" >
            <textarea id="mytextarea" name="file_text" >Hello, World!</textarea>
          </form>
    </body>
</html>
