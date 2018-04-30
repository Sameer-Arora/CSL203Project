<div id="sahilfile-content" style="display: none;"></div>
<?php

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';
    foreach($ffs as $ff){
        echo '<li id="file-content">'.$ff;
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        echo '</li>';
    }
    echo '</ol>';
}

listFolderFiles('fonts');

?>

<script>
var editor;

function readSingleFile(e) {
  var file = e.target.files[0];
  if (!file) {
    return;
  }
  var reader = new FileReader();
  reader.onload = function(e) {
    var contents = e.target.result;
    displayContents(contents);
  };
  reader.readAsText(file);
}

function displayContents(contents) {
  var element = document.getElementById('file-content');
  element.innerText = contents;
  initAceEditor()
}

document.getElementById('file-content')
  .addEventListener('click', readSingleFile, false);


function initAceEditor() {
var editor = ace.edit("aceEditor");
editor.setTheme("ace/theme/solarized_light");
editor.getSession().setMode("ace/mode/html");
editor.setFontSize("15px") ;
editor.setPrintMarginColumn(false);
editor.setValue($("#file-content").text());
editor.setOptions({
maxLines: 20
});

/* Save to File */
$("#btn-save").click( function() {
  var text = editor.getValue();
  var orgFileName = (document.getElementById("file-input").files[0].name);
  var filename = orgFileName;
  var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
  saveAs(blob, filename);
});

}


</script>















<!--<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (is_uploaded_file($_FILES['my_upload']['tmp_name']))
  {
    //First, Validate the file name
    if(empty($_FILES['my_upload']['name']))
    {
        echo " File name is empty! ";
        exit;
    }
 
    $upload_file_name = $_FILES['my_upload']['name'];
    //Too long file name?
    if(strlen ($upload_file_name)>100)
    {
        echo " too long file name ";
        exit;
    }
 
    //replace any non-alpha-numeric cracters in th file name
    $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
 
    //set a limit to the file upload size
    if ($_FILES['my_upload']['size'] > 1000000)
    {
        echo " too big file ";
        exit;       
    }

    //Save the file

    $dest=__DIR__.'/latexUploads/'.$upload_file_name;
    echo $dest;
    if (move_uploaded_file($_FILES['my_upload']['tmp_name'], $dest))
    {
        echo 'File Has Been Uploaded !';
    }else{
        echo "error in uploading file!";
    }

  }
}

?>-->