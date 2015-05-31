<?php

$token="CAAZAatKCQfR0BAOCMELSVBZAkkJms3usEGgQgSyShdeVWhkijtuUhDE12ZA2ZCR0awpT5hZB4Xom2lhOZCreAgGupDZCnN93ltWMJGoeBzxTBiA08r8QXlbXeS1WuRSxlny8s0a6frcZAJILzZAOni8S8ORZA4fs3oy1KoM40VAdqU5dfjYziYcF8o";

$myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
<title>Ask Facebook App</title>
<h1 id="fb-welcome"></h1>
<div id="refresh"></div>
<div id="posting">
<script>

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

</body>

</html>

MYHTMLSAFEOUTPUT;

// Read the json from facebook containing all the information

  $url="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BANacLZBh68l9l5cJArxItfvcOp8cEzjcs2E5acFz9HU5qKwAvZCi6Dp6KbdmwxKVDvizkE6IvgpVutuTzuvAOIWgUl978v7XYghoJoTeCcMhNgLbJUQxGNeM1OpBMlvS41lFSperx6oy9fv61qptOkMCTXrB663kLsQNCDAZBZAFBbjZA7ZCY2rJzsQy9tX9snNjIobh6n";
  $data = file_get_contents($url);
 
echo $myOutput; 

// Decode the json and extract all the necessary information

$json_o = json_decode($data);
$i=0;
$a=array();
$b=array();
$questionids=array();

if($json_o->data!=null)
{
  foreach($json_o->data as $p)
  {
    $questionids[]=$p->id;
    {
      if(isset($p->message))

      if(isset($p->comments))

      {
        $obj1=$p->comments->data;
        echo '<br /></b>Question: </b>';

        echo $p->message.' ';
        $q_id=$p->id;
        echo $q_id;
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
        $q_id=$p->id;
      }
    }
  }
}



?>