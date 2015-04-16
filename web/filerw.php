<?php

$userName = array();
$tutorial = array();
$myFile = "data.txt";
$fh = fopen($myFile,'r');
while( !feof($myFile) ){
    $userName[] = array(fgets($fh));//Save first line content
    $tutorial[] = array(fgets($fh));//Save second line content
}
fclose($myFile);
echo "$userName";
echo "$tutorial";
?>