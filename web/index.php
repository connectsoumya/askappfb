<?php

$myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
  <title>PHP Example</title>
  <body>

<h1 id="fb-welcome"></h1>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1788581694700829',
      xfbml      : true,
      version    : 'v2.3'
    });



    FB.login(function(){

      FB.api('/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAAZAatKCQfR0BANDfu63WDp5q4ybS9GG5ZCAIjXt7BxVwbP3KIOSpDt4Qf5BTZAm8tIB5fiB5O8qa8IRNwkW7NopLEUw16nrSpNdLCgZClGWqQn2yma4tZBq7fj2ZAAbP9UYH835QZBgeIRRZBgS255l8n0ZCaqFixIO6ohKukWx5l92tm8OaAZBzeP6xZCLvUAZAt4ZD

 		   FB.api('/1608260672741284/feed', 'post', {message: 'Hello, World !!!', access_token: 'CAAZAatKCQfR0BAO8JaBcFJXRns5whf4CyNhjA6EJ1tWwUSPOTLB99XldBMwXJOXpAsIIvHOjhkKMnuo4dpkNJMZBgvZBkEHqK3EIReb3vJoyavKYZBBxG5OuddAwo48jTo6HF0ieSX3XEzrZAqGSRLemMJxtV2SNYCoGfvR6UmmmZCoNanU6rf1YjZCH0vv3dBwixAyFR5lsAZDZD'});
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


<h1>Publishing to the Graph API</h1>

<p>Now we'll show you how you can use the JavaScript SDK to make a simple "Hello, world!" post on your Facebook profile.</p>

<h2>Adding Publishing Permissions</h2>

<div class="fb-login-button" data-scope="publish_actions" data-max-rows="1" data-size="medium"></div>

<h2>Using FB.api()</h2>

<div id="publishBtn" style="padding-top: 10px"> Click me to publish a "Hello, World!" post to Facebook. </div> 

<script>
document.getElementById('publishBtn').onclick = function() {
  FB.api('/1608260672741284/feed', 'post', {message: 'Hello, world!', access_token: 'CAAZAatKCQfR0BAO8JaBcFJXRns5whf4CyNhjA6EJ1tWwUSPOTLB99XldBMwXJOXpAsIIvHOjhkKMnuo4dpkNJMZBgvZBkEHqK3EIReb3vJoyavKYZBBxG5OuddAwo48jTo6HF0ieSX3XEzrZAqGSRLemMJxtV2SNYCoGfvR6UmmmZCoNanU6rf1YjZCH0vv3dBwixAyFR5lsAZDZD'}, function(response) {
    Log.info('API response', response);
    document.getElementById('publishBtn').innerHTML = 'API response is ' + response.id;
  });
  return false;
}  
</script>

</body>

</html>

$url = $_POST['https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAAZAatKCQfR0BANDfu63WDp5q4ybS9GG5ZCAIjXt7BxVwbP3KIOSpDt4Qf5BTZAm8tIB5fiB5O8qa8IRNwkW7NopLEUw16nrSpNdLCgZClGWqQn2yma4tZBq7fj2ZAAbP9UYH835QZBgeIRRZBgS255l8n0ZCaqFixIO6ohKukWx5l92tm8OaAZBzeP6xZCLvUAZAt4ZD'];
$token = file_get_contents($url);
$fbinit="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&";
$result = $fbinit . $token;
$data = file_get_contents($result);
file_put_contents("details.json",$data);
print_r( json_decode($data, true) );
echo $data
MYHTMLSAFEOUTPUT;

echo $myOutput; 

?>