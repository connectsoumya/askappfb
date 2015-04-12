<?php include 'index.php';

ob_start();
  $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n";
  $data = file_get_contents($url);
  file_put_contents("details_test.json",$data);
  print_r( json_decode($data, true) );
ob_end_clean();

echo $myOutput; 
  
  // $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BADrIHdqaYu4u4aiPo2Ighq3vqMmqghiAkp1L84m8CLSh6Fla70OfqfdNBHfLZBXVTFf4rlF5XjEkqVDKD3qBCBbglMwA8kOzNiCRrqj787UtCRXYgmi9e7sBrZBs1rGBQ3omZBkMCttiogdfM3MiX3SdJZBvmwarMXpKKOEo8U8pk81CjY4ZD";
  // $data = file_get_contents($url);
  // file_put_contents("details.json",$data);
  // print_r( json_decode($data, true) );

$json = file_get_contents('https://askappfb.herokuapp.com/details_test.json');
$json_o = json_decode($json);
$i=1;
$a=array();
$b=array();

if($json_o->data!=null)
{
foreach($json_o->data as $p)
{





{if(isset($p->message))

if(isset($p->comments))


{
$obj1=$p->comments->data;
echo 'Question: ';

echo $p->message.' ';
echo 'Answer: ';
foreach($obj1 as $p1)
{
  
  
  echo $p1->message.'=';
  echo $p1->like_count.'   ';
  $a[$i]=$p1->message;
  $b[$i]=$p1->like_count;
  $i++;
  

  
  
  
}
echo 'Best Answer:  ';
echo $a[array_search(max($b), $b)].'<br />';
}
}
}
}



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