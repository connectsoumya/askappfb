<?php

$myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js">
  <script type="text/javascript">
    setInterval("my_function();",5000);
    function my_function(){
      $('#refresh').load(location.href + ' #posting');
    }
  </script>

</head>
  <title>Ask Facebook App</title>
  <body>

<h1 id="fb-welcome"></h1>
<div id="refresh"></div>
<div id="posting">
<script>
var message_body;

function readfilefunc()
{
      if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                message_body= xmlhttp.responseText;
        
            }
      
        }
        xmlhttp.open("GET","readfile.php",true);
        xmlhttp.send();
}


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1788581694700829',
      xfbml      : true,
      version    : 'v2.3'
    });

    FB.login(function(){

          if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var message_body = xmlhttp.responseText;
                alert(message_body);
                document.write(message_body);
              }
            }
        xmlhttp.open("GET","readfile.php",true);
        xmlhttp.send();

      FB.api('/1608260672741284/feed', 'post', {message: 'hello, how are u?', access_token: 'CAAZAatKCQfR0BAGpxDtvc0AZBlQFRzl59Byvk6MdVR6wtZABv2cl8vHy5UvLGFpGIZCBtniVLsPc8ElHaPwFYarBRjBZAT9sF7Ypqh5b0H01wuCVoi6JjVUvFfH3kBi9lyngcOoq2BwyzF27V8mF3UFwV3A27qqZBvd9Ql1bqFczgZBjKXsNUyYlZAQFwPEeupou2jVxpYcJXN0eZB3p8xHSv'});
		}, {scope: 'publish_actions'});


    function onLogin(response) {
  		if (response.status == 'connected') {
    	 FB.api('/me?fields=first_name', function(data) {
      	var welcomeBlock = document.getElementById('fb-welcome');
      	welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
        });
      } 
    }

FB.getLoginStatus(function(response) {

  // Check login status on load, and if the user is
  // already logged in, go directly to the welcome message.

  if (response.status == 'connected') {
    onLogin(response);
  } else {
    // Otherwise, show Login dialog first.
    FB.login(function(response) {
      onLogin(response);
    }, {scope: 'user_friends, email'});
  }
});

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</div>

<div class="fb-login-button" data-scope="publish_actions" data-max-rows="1" data-size="medium"></div>

<p>Now we'll show you how you can use the JavaScript SDK to make a simple "Hello, world!" post on your Facebook profile.</p>

<a href="https://askappfb.herokuapp.com/details.json">View the JSON file (This link is for u Pritam)</a><br>
<a href="https://askappfb.herokuapp.com/details_test.json">View the JSON file (This link is for me)</a>

</body>

</html>

MYHTMLSAFEOUTPUT;

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
echo '<br />Question: ';

echo $p->message.' ';
echo '<br />Answer: ';
foreach($obj1 as $p1)
{
  
  echo $p1->message.' Votes=';
  echo $p1->like_count.'   ';
  $a[$i]=$p1->message;
  $b[$i]=$p1->like_count;
  $i++;
  

  
  
  
}
echo '<br />Best Answer:  ';
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