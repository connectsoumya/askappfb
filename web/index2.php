<?php

header("Refresh: 10;");

$string=file_get_contents("php://input");
$parts = explode('"', $string);
$token="CAAZAatKCQfR0BAOCMELSVBZAkkJms3usEGgQgSyShdeVWhkijtuUhDE12ZA2ZCR0awpT5hZB4Xom2lhOZCreAgGupDZCnN93ltWMJGoeBzxTBiA08r8QXlbXeS1WuRSxlny8s0a6frcZAJILzZAOni8S8ORZA4fs3oy1KoM40VAdqU5dfjYziYcF8o";

// post question

file_put_contents('data.txt', $parts[16]);

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('1788581694700829', 'd95dde9374fe7d3715007c27db6a74a4');

$helper = new FacebookRedirectLoginHelper('https://askappfb.herokuapp.com/index2.php');
$loginUrl = $helper->getLoginUrl();
$helper = new FacebookRedirectLoginHelper();
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

$helper = new FacebookCanvasLoginHelper();
try {
  $session = $helper->getSession();
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
if ($session) {
  // Logged in
}

$session = new FacebookSession($token);

// $request = new FacebookRequest($session, 'GET', '/1608260672741284/feed?fields=message,comments,likes');
// $response = $request->execute();
// $graphObject = $response->getGraphObject();

if($session) {
  try {
    $response = (new FacebookRequest(
      $session, 'POST', '/1608260672741284/feed', array(
        'link' => 'www.example.com',
        'message' => 'User provided message'
      )
    ))->execute()->getGraphObject();
    echo "Posted with id: " . $response->getProperty('id');
  } catch(FacebookRequestException $e) {
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
  }   
}

// output in the browser

ob_start();
  $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n";
  $data = file_get_contents($url);
  file_put_contents("details.json",$data);
  print_r( json_decode($data, true) );
ob_end_clean();

echo $myOutput; 
  
  // $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BADrIHdqaYu4u4aiPo2Ighq3vqMmqghiAkp1L84m8CLSh6Fla70OfqfdNBHfLZBXVTFf4rlF5XjEkqVDKD3qBCBbglMwA8kOzNiCRrqj787UtCRXYgmi9e7sBrZBs1rGBQ3omZBkMCttiogdfM3MiX3SdJZBvmwarMXpKKOEo8U8pk81CjY4ZD";
  // $data = file_get_contents($url);
  // file_put_contents("details.json",$data);
  // print_r( json_decode($data, true) );

$json = file_get_contents('https://askappfb.herokuapp.com/details.json');
$json_o = json_decode($json);
$i=0;
$a=array();
$b=array();
$questionids=array();
if($json_o->data!=null)
{
foreach($json_o->data as $p)
{
  $questionids[]=$p->id;
  print_r($questionids);

{if(isset($p->message))

if(isset($p->comments))

{
$obj1=$p->comments->data;
echo '<br /></b>Question: </b>';

echo $p->message.' ';
$q_id=$p->id;
echo '<br /><b>Answer: </b>';
$i=0;
foreach($obj1 as $p1)
{
  
  echo $p1->message.'<b> Votes=</b>';
  echo $p1->like_count.'   ';
  $a[$i]=$p1->message;
  $b[$i]=$p1->like_count;
  $i=$i+1;
  

  
  
  
}
echo '<br /><b>Best Answer: </b>';
echo $a[array_search(max($b), $b)].'<br />';
$b_reply=$a[array_search(max($b), $b)];

}
}
}
}

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


// <div id="publishBtn" style="padding-top: 10px"> Click me to publish a "Hello, World!" post to Facebook. </div> 
// <script>
// document.getElementById('publishBtn').onclick = function() {
//   FB.api('/1608260672741284/feed', 'post', {message: 'Hello, world!', access_token: 'CAAZAatKCQfR0BAO8JaBcFJXRns5whf4CyNhjA6EJ1tWwUSPOTLB99XldBMwXJOXpAsIIvHOjhkKMnuo4dpkNJMZBgvZBkEHqK3EIReb3vJoyavKYZBBxG5OuddAwo48jTo6HF0ieSX3XEzrZAqGSRLemMJxtV2SNYCoGfvR6UmmmZCoNanU6rf1YjZCH0vv3dBwixAyFR5lsAZDZD'}, function(response) {
//     Log.info('API response', response);
//     document.getElementById('publishBtn').innerHTML = 'API response is ' + response.id;
//   });
//   return false;
// }  
// </script>

?>