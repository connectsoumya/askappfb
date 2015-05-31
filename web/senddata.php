<?php

//Refresh session after 10 seconds

header("Refresh: 10;");

// Start session

session_start();
require_once 'facebook-php-sdk/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
FacebookSession::setDefaultApplication('1788581694700829', 'd95dde9374fe7d3715007c27db6a74a4');
$helper = new FacebookRedirectLoginHelper('index.php');
$loginUrl = $helper->getLoginUrl();
$token="CAAZAatKCQfR0BAOCMELSVBZAkkJms3usEGgQgSyShdeVWhkijtuUhDE12ZA2ZCR0awpT5hZB4Xom2lhOZCreAgGupDZCnN93ltWMJGoeBzxTBiA08r8QXlbXeS1WuRSxlny8s0a6frcZAJILzZAOni8S8ORZA4fs3oy1KoM40VAdqU5dfjYziYcF8o";

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


// Retrieve details from database

require '../vendor/autoload.php';
use Flintstone\Flintstone;
// Set options
$options = array('dir' => '../');
// Load the databases
$q_map = Flintstone::load('q_map', $options);
// Retrieve keys
$keys=$q_map->getKeys();

//Post JSON file to endpoint if best answer of any question changes

$url="https://graph.facebook.com/1608260672741284/feed?fields=message%2Ccomments%2Clikes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n&__mref=message_bubble";
 $data = file_get_contents($url);
 $json_o = json_decode($data);
 $a=array();
 $b=array();
 if($json_o->data!=null)
 {
 foreach($json_o->data as $p)
 {
	 if(isset($p->message))
     if(isset($p->comments))
{
	$obj1=$p->comments->data; 
	 $q_id=$p->id;
	 	 if (in_array($q_id, $keys))
	 {
		 $user=$q_map->get($q_id);
		 $answer=$user['ask_answer'];
		 $i=0;
 foreach($obj1 as $p1)
 {
    $a[$i]=$p1->message;
   $b[$i]=$p1->like_count;
   $i=$i+1;
  }
 
 $b_reply=$a[array_search(max($b), $b)];
 //echo "the answer is  ".$b_reply.'<br />';
		if(strcmp($answer,$b_reply)!=0)
		{
			$urlsend='test.php';//'http://smartsociety.u-hopper.com/message/';
			$q_map->set($q_id, array('ask_con' => $user['ask_con'], 'ask_id' =>$user['ask_id'] , 'ask_type' => $user['ask_type'], 'ask_sender' => $user['ask_sender'],'ask_answer' => $b_reply));
			$ch=curl_init($urlsend);
			$answer = array(
			  'type' => $user['ask_type'] , 
			  'subtype' => "answer",
			  'content' => $b_reply,
			  'sender' => $user['ask_sender'],
			  'conversation' => $user['ask_con'] ,
			  'language' => '',
			  'securityToken' =>''
			);

print_r($answer);
$answer_json=json_encode($answer);
curl_setopt($ch, CURLOPT_URL, $urlsend);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $answer_json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result=curl_exec($ch);
			 }
			}
	 }
 }
 }

?>