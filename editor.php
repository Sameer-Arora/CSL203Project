<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }

    #editor {
        width: 50%;
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
  </style>
  <style>
.button {
    background-color:  #08597a;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    margin-left: 40px;
    margin-bottom: 20px;
    cursor: pointer;
    border-radius: 12px;
    width: 12%;
}

/* Split the screen in half */
.split {
  height: 100%;
  width: 42.5%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
}

.middle{
  left: 42.5%;
  right: 42.5%;
  width: 15%;

}
/* Control the right side */
.right {
  right: 0;
}

/* If you want the content centered horizontally and vertically */
}
</style>

</head>
<body>



<div class="split left">
  <div id="file-content" style="display: none;"></div>
    <pre id="editor" style="width:100%;">\usepackage{amsmath}
\title{\LaTeX}
\date{}
\begin{document}
  \maketitle
  \LaTeX{} is a document preparation system for the \TeX{}
  typesetting program. It offers programmable desktop publishing
  features and extensive facilities for automating most aspects of
  typesetting and desktop publishing, including numbering and
  cross-referencing, tables and figures, page layout, bibliographies,
  and much more. \LaTeX{} was originally written in 1984 by Leslie
  Lamport and has become the dominant method for using \TeX; few
  people write in plain \TeX{} anymore. The current version  is
  \LaTeXe.
 
  % This is a comment; it will not be shown in the final output.
  % The following shows a little of the typesetting power of LaTeX:
  \begin{align}
    E &= mc^2                              \\
    m &= \frac{m_0}{\sqrt{1-\frac{v^2}{c^2}}}
  \end{align}
\end{document}
}</pre>
</div>

<!--<div class="split middle">
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

listFolderFiles('/var/www/html/csp/fonts');

?>
</div>
-->

<div class="split right">
  <a href="#" class="button">Save</a>
  <a href="#" class="button">Compile</a>
  <input type="file" id="file-input" class="open" />
<embed src="lesson2.pdf" type="application/pdf"   height="100%" width="100%">
</div> 

<!--
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

document.getElementById('file-input')
  .addEventListener('change', readSingleFile, false);


function initAceEditor() {
var editor = ace.edit("editor");
editor.setTheme("ace/theme/clouds_midnight");
    editor.session.setMode("ace/mode/latex");
    editor.setOptions({
      highlightActiveLine: true,
      fontSize: 16,
      showLineNumbers: true,
      vScrollBarAlwaysVisible: true,
      hScrollBarAlwaysVisible: true,
    });
editor.setValue($("#file-content").text());

}

</script>
-->

<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="ace/ext-language_tools.js"></script>
<script>
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    var code = editor.getValue();
    editor.setTheme("ace/theme/clouds_midnight");
    editor.session.setMode("ace/mode/latex");
    editor.setOptions({
      highlightActiveLine: true,
      fontSize: 16,
      showLineNumbers: true,
      vScrollBarAlwaysVisible: true,
      hScrollBarAlwaysVisible: true,
    });
</script>

</body>
</html>
