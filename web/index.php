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
 		FB.api('/me/feed', 'post', {message: 'Hello, world!'});
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
  FB.api('/me/feed', 'post', {message: 'Hello, world!'}, function(response) {
    Log.info('API response', response);
    document.getElementById('publishBtn').innerHTML = 'API response is ' + response.id;
  });
  return false;
}  
</script>

<h3>Related Guides</h3>

<p>Read <a href="https://developers.facebook.com/docs/javascript/quickstart/#graphapi">our quickstart to using the JavaScript SDK for Graph API calls</a> for more info.</p>

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

// require('../vendor/autoload.php');

// $app = new Silex\Application();
// $app['debug'] = true;

// // Register the monolog logging service
// $app->register(new Silex\Provider\MonologServiceProvider(), array(
//   'monolog.logfile' => 'php://stderr',
// ));

// // Our web handlers

// $app->post('/', function() use($app) {
//   $app['monolog']->addDebug('logging output.');
//   return 'Hello, help me to make this app';
  
// });

// $app->run();


//  </body>
// </html>

?>