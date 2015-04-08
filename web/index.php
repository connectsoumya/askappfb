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

<?php include "/extract_details.php"; ?>
</body>

</html>
MYHTMLSAFEOUTPUT;

echo $myOutput; 

?>