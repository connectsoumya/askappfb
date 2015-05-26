<?php

// header("Refresh: 10;");

session_start();
 
require_once 'facebook-php-sdk/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication('1788581694700829', 'd95dde9374fe7d3715007c27db6a74a4');

$helper = new FacebookRedirectLoginHelper('https://askappfb.herokuapp.com/index2.php');
$loginUrl = $helper->getLoginUrl();
$token="CAAZAatKCQfR0BAOCMELSVBZAkkJms3usEGgQgSyShdeVWhkijtuUhDE12ZA2ZCR0awpT5hZB4Xom2lhOZCreAgGupDZCnN93ltWMJGoeBzxTBiA08r8QXlbXeS1WuRSxlny8s0a6frcZAJILzZAOni8S8ORZA4fs3oy1KoM40VAdqU5dfjYziYcF8o";
$app_token="1788581694700829|_5PkyXJZJDhhDAD1DizCqP-DNdo";

try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
if ($session) {
  // Logged in
}

$session = new FacebookSession($token);
$request = new FacebookRequest(
  $session,
  'GET',
  '/1608260672741284/notifications'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
$album =  $graphObject->getProperty('data');
$album_data = $album->asArray();
foreach($album_data as $row){
    $q_id=$row->object->id;
    }

require 'vendor/autoload.php';
use Flintstone\Flintstone;

// Set options
$options = array('dir' => '/home/soumya/askappfb/web');
// Load the databases
$q_map = Flintstone::load('q_map', $options);
// Retrieve keys
$user = $q_map->get($q_id);
print_r ($user);





$urlsend='http://smartsociety.u-hopper.com/message/';
$ch=curl_init($urlsend);

$answer = array(
  'type' => $parts[3] , 
  'subtype' => "answer",
  'content' => $reply,
  'sender' => $parts[7],
  'conversation' => $parts[9] ,
  'language' => $parts[11],
  'securityToken' => $parts[13]
  );

$answer_json=json_encode($answer);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $answer_json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$result=curl_exec($ch);


?>