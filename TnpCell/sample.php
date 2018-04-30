<?php
// starting word
#phpinfo();
        editor.setContent('<?php echo $text; ?>')

//FUNCTION :: read a docx file and return the string
function readDocx($filePath) {
    // Create new ZIP archive
    $zip = new ZipArchive;
    $dataFile = 'word/document.xml';
    // Open received archive file
    if (true === $zip->open($filePath)) {
        // If done, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            // If found, read it to the string
            $data = $zip->getFromIndex($index);
            // Close archive file
            $zip->close();
            // Load XML from a string
            // Skip errors and warnings
            $dom = new DOMDocument();
            $xml = $dom->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            
            // Return data without XML formatting tags

            $contents = strip_tags($data, '<w:p><w:u><w:i><w:b>');
            $contents = preg_replace("/(<(\/?)w:(.)[^>]*>)\1*/", "<$2$3>", $contents);

            $dom = new DOMDocument;
            @$dom->loadHTML($contents, LIBXML_HTML_NOIMPLIED  | LIBXML_HTML_NODEFDTD);
            $contents = $dom->saveHTML();

            $contents = preg_replace('~<([ibu])>(?=(?:\s*<[ibu]>\s*)*?<\1>)|</([ibu])>(?=(?:\s*</[ibu]>\s*)*?</?\2>)|<p></p>~s', "", $contents);

            echo $contents;
            return $contents;
   
            $contents = explode('\n',strip_tags($dom->saveXML()));
            $text = '';
            foreach($contents as $i=>$content) {
                $text .= $contents[$i];
                echo $text;
            }
            return $text;
        }
        $zip->close();
    }
    // In case of failure return empty string
    return "";
}

readDocx('Readme.docx');

?>