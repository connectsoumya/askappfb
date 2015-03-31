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
 		FB.api('/me/askmmnet', 'post', {message: 'Hello, world!'});
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

<p>First, we'll need the <code>publish_actions</code> permission to make this publishing request, so we'll insert a Login button which requests the correct permissions (click on this if you haven't already granted the permission):</p>

<div class="fb-login-button" data-scope="publish_actions" data-max-rows="1" data-size="medium"></div>

<h2>Using FB.api()</h2>

<div id="publishBtn" style="padding-top: 20px">Click me to publish a "Hello, World!" post to Facebook.</div>

<script>
document.getElementById('publishBtn').onclick = function() {
  FB.api('/me/askmmnet', 'post', {message: 'Hello, world!'}, function(response) {
    Log.info('API response', response);
    document.getElementById('publishBtn').innerHTML = 'API response is ' + response.id;
  });
  return false;
}  
</script>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>

  </body>
</html>
MYHTMLSAFEOUTPUT;

echo $myOutput; 

// get page access token
$access_token = (new FacebookRequest( $session, 'GET', '/' . $page_id, array( 'fields' => 'access_token' ) ))
->execute()->getGraphObject()->asArray();
// save access token in variable for later use
$access_token = $access_token['access_token']; 

// post to page
$page_post = (new FacebookRequest( $session, 'POST', '/'. $page_id .'/feed', array(
'access_token' => $access_token,
'name' => 'Facebook API: Posting As A Page using Graph API v2.x and PHP SDK 4.0.x',
'link' => 'https://www.webniraj.com/2014/08/23/facebook-api-posting-as-a-page-using-graph-api-v2-x-and-php-sdk-4-0-x/',
'caption' => 'The Facebook API lets you post to Pages you administrate via the API. This tutorial shows you how to achieve this using the Facebook PHP SDK v4.0.x and Graph API 2.x.',
'message' => 'Check out my new blog post!',
) ))->execute()->getGraphObject()->asArray();
// return post_id
print_r( $page_post ); 

?>