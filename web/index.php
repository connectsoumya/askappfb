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

// // modification starts here
//   <p id="demo">Demo</p>
//   function onLogin(response) {  
//     FB.api('me?fields=posts.limit(2){message}', function(qstn) {
//       var question = document.getElementById('demo');
//       question.innerHTML = 'qstn.posts.limit(2){message}';
//   });
// }

// // modification ends here

//     FB.login(function(){
//  		FB.api('/1608260672741284/feed', 'post', {message: 'question.innerHTML', access_token: 'CAAZAatKCQfR0BAFPZA2iybnKTxlZBZBspYyGHfvdZB0T10KrD0KSiJ1y8PUkp527stTYCPCnP3nUa0UaSOqZClqpPXneL1gwFZAgF4cV8kGCKg0NoZCE8YHLvTN2nBdjBFeBqnATDt45ghZCj6T0Jk4fOnbM1h01whvdEpLZBajkjxiFGruVIeIHq9MmZCFRRfWmSMZD'});
// 		}, {scope: 'publish_actions'});

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

  <p id="demo">Demo</p>

<script>
// modification starts here

  function onLogin(response) {  
    FB.api('me?fields=posts.limit(2){message}', function(qstn) {
      var question = document.getElementById('demo');
      question.innerHTML = 'qstn.posts.limit(2){message}';
  });
}

// modification ends here

    FB.login(function(){
    FB.api('/1608260672741284/feed', 'post', {message: 'question.innerHTML', access_token: 'CAAZAatKCQfR0BAFPZA2iybnKTxlZBZBspYyGHfvdZB0T10KrD0KSiJ1y8PUkp527stTYCPCnP3nUa0UaSOqZClqpPXneL1gwFZAgF4cV8kGCKg0NoZCE8YHLvTN2nBdjBFeBqnATDt45ghZCj6T0Jk4fOnbM1h01whvdEpLZBajkjxiFGruVIeIHq9MmZCFRRfWmSMZD'});
    }, {scope: 'publish_actions'});
</script>

// <h1>Publishing to the Graph API</h1>

// <p>Now we'll show you how you can use the JavaScript SDK to make a simple "Hello, world!" post on your Facebook profile.</p>

// <h2>Adding Publishing Permissions</h2>

// <div class="fb-login-button" data-scope="publish_actions" data-max-rows="1" data-size="medium"></div>

// <h2>Using FB.api()</h2>

// <div id="publishBtn" style="padding-top: 10px"> Click me to publish a "Hello, World!" post to Facebook. </div> 

// <script>
// document.getElementById('publishBtn').onclick = function() {
//   FB.api('/1608260672741284/feed', 'post', {message: 'Hello, world!', access_token: 'CAAZAatKCQfR0BAFPZA2iybnKTxlZBZBspYyGHfvdZB0T10KrD0KSiJ1y8PUkp527stTYCPCnP3nUa0UaSOqZClqpPXneL1gwFZAgF4cV8kGCKg0NoZCE8YHLvTN2nBdjBFeBqnATDt45ghZCj6T0Jk4fOnbM1h01whvdEpLZBajkjxiFGruVIeIHq9MmZCFRRfWmSMZD'}, function(response) {
//     Log.info('API response', response);
//     document.getElementById('publishBtn').innerHTML = 'API response is ' + response.id;
//   });
//   return false;
// }  
// </script>

</body>

</html>
MYHTMLSAFEOUTPUT;

echo $myOutput; 

?>