<?php 

include 'index.php';

$string=file_get_contents("php://input");
$parts = explode('"', $string);

// post question

file_put_contents('data.txt', $parts[16]);

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



// $myOutput = <<<MYHTMLSAFEOUTPUT

// <!DOCTYPE html>
// <html>
// <head>

// <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
// <script>

// type="$type";
// message="KoI near Piazza Mosna";
// sender="$sender";
// conversation="$con_id";
// securityToken="$sec_token";
// language="$lang";

// $(document).ready(function(){
//       $.post("http://smartsociety.u-hopper.com/message/",

//         {  
//          "type": type
//          "subtype": "answer",
//          "content": message,
//          "sender": sender,
//          "conversation": conversation,
//          "language":  language,
//          "securityToken":  securityToken
//         },

//       function(data){
//           alert("Data: " + data);
//         });
// });
// </script>

// </head>
// </html>

// MYHTMLSAFEOUTPUT;
// echo $myOutput; 

// echo $type;
// echo $sender;
// echo $con_id;
// echo $lang;
// echo $sec_token;
// echo $content;

?>

<!-- include 'index.php'; -->