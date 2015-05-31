<?php

// Read and decode the post request

$string=file_get_contents("php://input");
//  $string='{
//     "id": "4a11c9f1-a603-11e4-b25d-0e784dbb1c62",
//     "content": "{\"question\":\"Is it suc?\",\"type\":\"DIRECT\",\"timestamp\":1422349376846}",
//     "type": "ask",
//      "subtype": "question",
//      "sender": "ask",
//      "conversation": "4a11c9f0-a603-11e4-b25d-0eesddbb1c61",
//      "ttl": "0"
//  }';
$string=json_decode($string,true);
$ask_id=$string['id'];
$ask_content=$string['content'];
$ask_conversation=$string['conversation'];
$ask_type=$string['type'];
$ask_sender=$string['sender'];

$con=json_decode($ask_content);
$ask_qstn=$con->question;

$token="CAAZAatKCQfR0BAOCMELSVBZAkkJms3usEGgQgSyShdeVWhkijtuUhDE12ZA2ZCR0awpT5hZB4Xom2lhOZCreAgGupDZCnN93ltWMJGoeBzxTBiA08r8QXlbXeS1WuRSxlny8s0a6frcZAJILzZAOni8S8ORZA4fs3oy1KoM40VAdqU5dfjYziYcF8o";


// Start the session

session_start();
require_once 'facebook-php-sdk/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
FacebookSession::setDefaultApplication('1788581694700829', 'd95dde9374fe7d3715007c27db6a74a4');
$helper = new FacebookRedirectLoginHelper('https://askappfb.herokuapp.com/index.php');
$loginUrl = $helper->getLoginUrl();
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


// Post the question

$session = new FacebookSession($token);
if($session) {
  try {
    $response = (new FacebookRequest(
      $session, 'POST', '/1608260672741284/feed', array(
        'message' => $ask_qstn
      )
    ))->execute()->getGraphObject();
    echo "Posted with id: " . $response->getProperty('id');
  } catch(FacebookRequestException $e) {
    http_response_code($e->getCode); 
    echo "Error: " . $e->getMessage();
    exit();
  }   
}

// Extract the post ID returned from facebook

$q_id=$response->getProperty('id');
$q_id=(string)$q_id;

require '../vendor/autoload.php';
use Flintstone\Flintstone;

// Set options
$options = array('dir' => '../');
// Load the databases
$q_map = Flintstone::load('q_map', $options);
// Set keys
$q_map->set($q_id, array('ask_con' => $ask_conversation, 'ask_id' => $ask_id, 'ask_type' => $ask_type, 'ask_sender' => $ask_sender,'ask_answer' => ''));
$a = $q_map->get($q_id);
print_r($a);

?>