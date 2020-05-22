<?php
    $file_name= $_POST['filename'];
    $file_url = realpath($file_name);
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"".$file_name."\""); 
    readfile($file_url); // do the double-download-dance (dirty but worky)
?>