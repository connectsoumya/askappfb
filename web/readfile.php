<?php
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
$contents=fread($myfile,filesize("data.txt"));
echo $contents;
fclose($myfile);
?>