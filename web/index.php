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
 		FB.api('/1608260672741284/feed', 'post', {message: 'Hello, world!'});
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
  FB.api('/1608260672741284/feed', 'post', {message: 'Hello, world!'}, function(response) {
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

<div id='fb-root'></div>
<script src='http://connect.facebook.net/en_US/all.js'></script>
<p>
    <a href="javascript:;" onclick='postToFeed(); return false;'>Post to Group</a>
</p>
<p id='msg'></p>

<script> 
  FB.init({appId: "1788581694700829", status: true, cookie: true});
  function postToFeed() {
  FB.api('/1608260672741284/feed', 'post', 
             { 
                 message     : "It's awesome ...",
                 link        : 'http://csslight.com',
                 picture     : 'http://csslight.com/application/upload/WebsitePhoto/567-grafmiville.png',
                 name        : 'Featured of the Day',
                 from: '1608260672741284',
                 description : 'CSS Light is a showcase for web design encouragement, submitted by web designers of all over the world. We simply accept the websites with high quality and professional touch.'
         }, 
         function(response) {
             alert(JSON.stringify(response));
         });
  }
  </script>

  </body>
</html>
MYHTMLSAFEOUTPUT;

echo $myOutput; 


?>