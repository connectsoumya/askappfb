<?php

header("Refresh: 10;");

session_start();
require_once 'facebook-php-sdk/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

// Start session

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

// Get Notification

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
    {
        $link=$row->link;
        $link1=explode("/",$link);
        $link2=explode("?",$link1[5]);
        $link3=explode("=",$link2[1]);
        $x=(string)$link2[0];
        $y=(string)$link3[1];
        $comment_id=$x.'_'.$y;
    }
}


// Retrieve the Reply

$json = file_get_contents('https://graph.facebook.com/1608260672741284/feed?fields=message%2Ccomments%2Clikes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n&__mref=message_bubble');
$json_o = json_decode($json);
if($json_o->data!=null)
{
    foreach($json_o->data as $p)
        {
        if(isset($p->message))
        if(isset($p->comments))
            {
            $obj1=$p->comments->data;
            foreach($obj1 as $p1)
                {
                $a=$p1->id;
                if($a==$comment_id)
                    {
                    $reply=$p1->message;
                    $reply_like=$p1->like_count;
                         
                    }  
                }
            }
        }
}

echo $reply;

// Retrieve details from database

require 'vendor/autoload.php';
use Flintstone\Flintstone;
// Set options
$options = array('dir' => '/home/soumya/askappfb/web');
// Load the databases
$q_map = Flintstone::load('q_map', $options);
// Retrieve keys
$user = $q_map->get($q_id);


// Post the JSON

// $urlsend='https://askappfb.herokuapp.com/test.php';//'http://smartsociety.u-hopper.com/message/';
// $ch=curl_init($urlsend);
// $answer = array(
//   'type' => $user['ask_type'] , 
//   'subtype' => "answer",
//   'content' => $reply,
//   'sender' => $user['ask_sender'],
//   'conversation' => $user['ask_con'] ,
//   'language' => '',
//   'securityToken' =>''
//   );
// $answer_json=json_encode($answer);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $answer_json);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// $result=curl_exec($ch);

$answer = array(
  'type' => $user['ask_type'] , 
  'subtype' => "answer",
  'content' => $reply,
  'sender' => $user['ask_sender'],
  'conversation' => $user['ask_con'] ,
  'language' => '',
  'securityToken' =>''
  );
$answer_json=json_encode($answer);
print_r($answer);
# Form our options
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $answer_json
    )
);

# Create the context
$context = stream_context_create($opts);

# Get the response (you can use this for GET)
$result = file_get_contents('http://askappfb.herokuapp.com/test.php', false, $context);

?>