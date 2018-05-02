
<html>
<head>
    <meta charset="UTF-8">
<?php

		//header('Set-Cookie: fileDownload=true; path=/');
		header('Cache-Control: max-age=60, must-revalidate');
		
 ?>
    <title>Title</title>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.fileDownload.js"></script>
    <script type="text/javascript">

	$(document).ready(function(){
       /* $(".dd").on("click", function () {
             
                           var $preparingFileModal = $("#preparing-file-modal");

                           $preparingFileModal.dialog({ modal: true });
							
                           $.fileDownload($("#report").prop('href'), {
                               successCallback: function (url) {
                                   $preparingFileModal.dialog('close');
								   document.location = url;
                               },
                               failCallback: function (responseHtml, url) {

                                   $preparingFileModal.dialog('close');
                                   
								   $("#error-modal").html(responseHtml);
								   $("#error-modal").dialog({ modal: true });
                               }
                           });
						   
                           return false; //this is critical to stop the click event which will trigger a normal file download!
                       });*/
					   
$(document).on("click", "a.fileDownloadCustomRichExperience", function () {
 
        var $preparingFileModal = $("#preparing-file-modal");
 
        $preparingFileModal.dialog({ modal: true });
 
        $.fileDownload($(this).prop('href'), {
            successCallback: function (url) {
                //alert(url);
                $preparingFileModal.dialog('close');
            },
            failCallback: function (responseHtml, url) {
 
                $preparingFileModal.dialog('close');
                $("#error-modal").dialog({ modal: true });
            }
        });
        return false; //this is critical to stop the click event which will trigger a normal file download!
    });
					   
					   
                   });
        


   </script>


</head>

<body>
    <div id="preparing-file-modal" style="display:none">Rog asteptati!...</div>
    <div id="error-modal" style="display:none">Eroare incarcare! ...</div>
    <a  class="fileDownloadCustomRichExperience" href="/download.php?filename=test.pdf">download file with fileDownloader</a> <br>
    <a  class="fileDownloadCustomRichExperience" href="/download.php?filename=Tranzactii_bf.pdf"> download second file with fileDownloader</a><br>
    <a id="report" href="/test.pdf">Anchor download</a>

</body>
</html>
