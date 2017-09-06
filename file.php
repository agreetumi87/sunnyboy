<?php

$file = $data['document'];

header('Content-Description: File Transfer');
header('Content-Type: application'); 
header('Content-Disposition: attachment; filename="'.$file['filename'].'"');
header('Expires: 0');
header('Pragma: public');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: public');     
header('Content-Length: ' . filesize($file['document_location']));

readfile($file['document_location']);