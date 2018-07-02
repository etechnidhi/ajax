<?php
header('Content-Type: application/json');
$file = fopen('data.json','r');
echo fread($file,filesize("data.json"));
fclose($file);
die;
?>