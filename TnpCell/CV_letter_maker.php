<?php

include ('session.php');

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}
$_SESSION['cv_letter_id']=$_POST['cv_letter_id'];


$query ="SELECT * from cv_letter where cv_letter_id=".$_SESSION['cv_letter_id'];
#echo $_POST['cv_letter_id'];

?>

      <?php if(isset($_POST['cv_letter_id'])) { 
        include ('test/Databaseconnection.php');

          $strSQL=mysqli_query($connection,$query);

          if( $strSQL ){
            #echo "<br>"."exec<br>";
            $row=mysqli_fetch_array($strSQL);

            $css=$row['css_file'];

            $load=$row['load_file'];
            #echo $row['load_file'];
            
            $_SESSION['html_file']=$row['load_file'];

            if($load!=""){
              $text= file_get_contents($load);
              
              /*preg_match('/.\n/', $text, $matches, PREG_OFFSET_CAPTURE);
              
              $char= $matches[0][0];
              $char= str_replace('/\n/', '', $char);
*/
              $text=preg_replace('/\n/','',$text );

              ##echo $text;
           }
         else{
      #echo "<br>"."Error".$connection->error;
         }
          }
        ?>


      <?php } ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>CV_letter Maker:Text Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=r67knjg64nu28dm3xphpc1vtt89whaxzywux529he8gynb75'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

        <link href="css/content.css" rel="stylesheet" type="text/css"/>
        <link href="css/document.css" rel="stylesheet" type="text/css"/>
        <script>
        tinymce.init({
          selector: '#mytextarea',
          autoresize_min_height:800,
            plugins: [
           'fullpage autoresize advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
           'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
           'save table contextmenu directionality emoticons template paste textcolor ','code'
         ],
         menubar:"file save edit view insert format tools table",
         toolbar: 'insertfile save undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor |code fullpage',
               image_list: [
            {title: 'My image 1', value: 'https://www.tinymce.com/my1.gif'},
            {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
          ], 
           templates: [
    {title: 'Some title 1', description: 'Some desc 1', content: 'My content'},
    {title: 'Some title 2', description: 'Some desc 2', url: ''}
      ], 
      autoresize_bottom_margin: 50,  autoresize_max_height: 10000,
      autoresize_overflow_padding: 50,autoresize_on_init: false,
      image_caption:true, 
      browser_spellcheck: true,
      content_css : '<?php echo $css;?>',
      contextmenu: true,
      init_instance_callback : function(editor) {
        console.log("Editor: " + editor.id + " is now initialized.");
        editor.setContent('<?php echo $text;?>');
      }, 
      save_onsavecallback: function(data) {
                alert('saving data');
                var data =tinyMCE.get('mytextarea').getContent();
                console.log(data);
        
                $.ajax({
                    type:       'POST',
                    cache:      false,
                    url:        'save_doc_cv_letter.php',
                    data:       'file_text='+escape(data),
                    success:    function(dat){
                                alert(dat);
                                console.log("Updates have successfully been ajaxed");
                    }
                });
                
        },
      branding: false
      });
        </script>
    </head>
    <body style="background-image: url('images/book.jpg');"> 
        <form method="post" class="document" action="save_doc.php" >
            <textarea id="mytextarea" name="file_text" >Hello, World!</textarea>
          </form>

    </body>
</html>
