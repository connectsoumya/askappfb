<?php

// Read and decode the post request

$string=file_get_contents("php://input");
// $string='{
//     "id": "4a11c9f1-a603-11e4-b25d-0e784dbb1c61",
//     "content": "{\"question\":\"Is it successful?\",\"type\":\"DIRECT\",\"timestamp\":1422349376846}",
//     "type": "ask",
//     "subtype": "question",
//     "sender": "ask",
//     "conversation": "4a11c9f0-a603-11e4-b25d-0eesddbb1c61",
//     "ttl": "0"
// }';
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

// require '../vendor/autoload.php';
// use Flintstone\Flintstone;

// // Set options
// $options = array('dir' => '../');
// // Load the databases
// $q_map = Flintstone::load('q_map', $options);
// // Set keys
// $q_map->set($q_id, array('ask_con' => $ask_conversation, 'ask_id' => $ask_id, 'ask_type' => $ask_type, 'ask_sender' => $ask_sender));


// Create seed data
$seedData = array(
    array(
        'ask_con' => $ask_conversation, 
        'ask_id' => $ask_id,
        'ask_type' => $ask_type, 
        'ask_sender' => $ask_sender
    ),
);

// connect to mongolab

$uri = "mongodb://pritam.b.:pritam@1@ds037262.mongolab.com:37262/ask";
$options = array("connectTimeoutMS" => 30000);
$client = new MongoClient($uri, $options );
$db = $client->selectDB("ask");

$ask_data = $db->ask_data;
$ask_data->batchInsert($seedData);












// output in the browser

// ob_start();
//   $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n";
//   $data = file_get_contents($url);
//   file_put_contents("details.json",$data);
//   print_r( json_decode($data, true) );
// ob_end_clean();
  
  // $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BADrIHdqaYu4u4aiPo2Ighq3vqMmqghiAkp1L84m8CLSh6Fla70OfqfdNBHfLZBXVTFf4rlF5XjEkqVDKD3qBCBbglMwA8kOzNiCRrqj787UtCRXYgmi9e7sBrZBs1rGBQ3omZBkMCttiogdfM3MiX3SdJZBvmwarMXpKKOEo8U8pk81CjY4ZD";
  // $data = file_get_contents($url);
  // file_put_contents("details.json",$data);
  // print_r( json_decode($data, true) );

// $json = file_get_contents('https://askappfb.herokuapp.com/details.json');
// $json_o = json_decode($json);
// $i=0;
// $a=array();
// $b=array();
// $questionids=array();
// if($json_o->data!=null)
// {
// foreach($json_o->data as $p)
// {
//   // $questionids[]=$p->id;
//   // print_r($questionids);

// {if(isset($p->message))

// if(isset($p->comments))

// {
// $obj1=$p->comments->data;
// echo '<br /></b>Question: </b>';

// echo $p->message.' ';
// echo '<br /><b>Answer: </b>';
// $i=0;
// foreach($obj1 as $p1)
// {
  
//   echo $p1->message.'<b> Votes=</b>';
//   echo $p1->like_count.'   ';
//   $a[$i]=$p1->message;
//   $b[$i]=$p1->like_count;
//   $i=$i+1;
  

  
  
  
// }
// echo '<br /><b>Best Answer: </b>';
// echo $a[array_search(max($b), $b)].'<br />';
// $b_reply=$a[array_search(max($b), $b)];

// }
// }
// }
// }


?>